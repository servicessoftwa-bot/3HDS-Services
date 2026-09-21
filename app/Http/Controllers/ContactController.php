<?php

namespace App\Http\Controllers;

use App\Mail\NewEnquiry;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $back = route('home').'#contact';
        $thanks = "Thanks, your message has been sent. We'll reply by email.";

        // Honeypot: real visitors never fill in the hidden "website" field
        if (filled($request->input('website'))) {
            return redirect()->to($back)->with('contact_success', $thanks);
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'need' => ['required', 'string', Rule::in(config('site.enquiry_types'))],
            'message' => ['required', 'string', 'max:5000'],
        ], [
            'name.required' => 'Enter your name.',
            'email.required' => 'Enter an email address we can reply to.',
            'email.email' => 'Check the email address. It should look like name@example.com.',
            'need.in' => 'Choose what you need from the list.',
            'message.required' => 'Add a few details about the project.',
        ]);

        if ($validator->fails()) {
            return redirect()->to($back)->withErrors($validator)->withInput();
        }

        // Optional Google reCAPTCHA, only when keys are configured
        $secret = config('services.recaptcha.secret_key');
        if ($secret) {
            $passed = false;
            $token = (string) $request->input('g-recaptcha-response');

            if ($token !== '') {
                try {
                    $passed = (bool) Http::asForm()->timeout(10)->post('https://www.google.com/recaptcha/api/siteverify', [
                        'secret' => $secret,
                        'response' => $token,
                        'remoteip' => $request->ip(),
                    ])->json('success');
                } catch (\Throwable $e) {
                    report($e);
                }
            }

            if (! $passed) {
                return redirect()->to($back)
                    ->withErrors(['captcha' => 'Please tick the box to confirm you are not a robot, then send again.'])
                    ->withInput();
            }
        }

        $data = $validator->validated();

        $contact = Contact::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'subject' => $data['need'],
            'message' => $data['message'],
        ]);

        // Email the team. The enquiry is already saved, so a mail problem never loses it.
        if ($to = Setting::get('site_email')) {
            try {
                Mail::to($to)->send(new NewEnquiry($contact));
            } catch (\Throwable $e) {
                report($e);
            }
        }

        return redirect()->to($back)->with('contact_success', $thanks);
    }
}
