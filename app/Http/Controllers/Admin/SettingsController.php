<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    /**
     * Contact email, WhatsApp button, logo, social links, company details, analytics.
     */
    public function general()
    {
        return view('admin.settings.general', [
            'settings' => Setting::allValues(),
            'social' => config('site.social'),
        ]);
    }

    public function updateGeneral(Request $request)
    {
        $rules = [
            'site_email' => ['nullable', 'email', 'max:255'],
            'site_whatsapp' => ['nullable', 'string', 'max:30', 'regex:/^[+\d\s()-]*$/'],
            'logo' => ['nullable', 'file', 'mimes:png,jpg,jpeg,webp', 'max:1024'],
            'remove_logo' => ['nullable', 'boolean'],
            'cloudflare_analytics_token' => ['nullable', 'string', 'max:100', 'alpha_num'],
            'company_legal_name' => ['nullable', 'string', 'max:255'],
            'company_uk_number' => ['nullable', 'string', 'max:20'],
            'company_uk_registered_in' => ['nullable', 'string', 'max:100'],
            'company_uk_office' => ['nullable', 'string', 'max:255'],
            'company_abn' => ['nullable', 'string', 'max:20'],
            'company_ntn' => ['nullable', 'string', 'max:20'],
        ];
        foreach (array_keys(config('site.social')) as $network) {
            $rules["social_{$network}"] = ['nullable', 'url:https,http', 'max:255'];
        }

        $validated = $request->validate($rules, [
            'site_whatsapp.regex' => 'The WhatsApp number can only contain digits, spaces, +, - and brackets.',
        ]);

        $groups = ['site_' => 'general', 'cloudflare_' => 'general', 'company_' => 'company', 'social_' => 'social'];
        foreach ($validated as $key => $value) {
            if (in_array($key, ['logo', 'remove_logo'], true)) {
                continue;
            }
            $group = 'general';
            foreach ($groups as $prefix => $name) {
                if (str_starts_with($key, $prefix)) {
                    $group = $name;
                }
            }
            Setting::set($key, (string) ($value ?? ''), 'text', $group);
        }

        $oldLogo = Setting::get('site_logo');
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('site', 'public');
            Setting::set('site_logo', $path, 'image', 'general');
            if ($oldLogo) {
                Storage::disk('public')->delete($oldLogo);
            }
        } elseif ($request->boolean('remove_logo') && $oldLogo) {
            Storage::disk('public')->delete($oldLogo);
            Setting::set('site_logo', '', 'image', 'general');
        }

        return redirect()->route('admin.settings.general')->with('success', 'Settings saved. The website shows the changes straight away.');
    }

    /**
     * Starting prices per country.
     */
    public function pricing()
    {
        return view('admin.settings.pricing', [
            'settings' => Setting::allValues(),
            'regions' => config('site.regions'),
            'items' => config('site.price_items'),
        ]);
    }

    public function updatePricing(Request $request)
    {
        $rules = [];
        foreach (array_keys(config('site.regions')) as $region) {
            foreach (array_keys(config('site.price_items')) as $item) {
                $rules["price_{$region}_{$item}"] = ['required', 'integer', 'min:0', 'max:100000000'];
            }
        }

        $validated = $request->validate($rules, [
            '*.required' => 'Every price needs a number. Use 0 to show "Custom quote".',
            '*.integer' => 'Prices must be whole numbers without symbols or commas.',
        ]);

        foreach ($validated as $key => $value) {
            Setting::set($key, (string) (int) $value, 'number', 'pricing');
        }

        return redirect()->route('admin.settings.pricing')->with('success', 'Prices saved.');
    }

    /**
     * Contact details for the UK, Australia and Pakistan.
     */
    public function offices()
    {
        return view('admin.settings.offices', [
            'settings' => Setting::allValues(),
            'regions' => config('site.regions'),
        ]);
    }

    public function updateOffices(Request $request)
    {
        $rules = [];
        foreach (array_keys(config('site.regions')) as $region) {
            $rules["office_{$region}_city"] = ['nullable', 'string', 'max:100'];
            $rules["office_{$region}_address"] = ['nullable', 'string', 'max:500'];
            $rules["office_{$region}_phone"] = ['nullable', 'string', 'max:30', 'regex:/^[+\d\s()-]*$/'];
            $rules["office_{$region}_whatsapp"] = ['nullable', 'string', 'max:30', 'regex:/^[+\d\s()-]*$/'];
            $rules["office_{$region}_email"] = ['nullable', 'email', 'max:255'];
        }

        $validated = $request->validate($rules, [
            '*.regex' => 'Phone and WhatsApp numbers can only contain digits, spaces, +, - and brackets.',
        ]);

        foreach ($validated as $key => $value) {
            Setting::set($key, (string) ($value ?? ''), 'text', 'offices');
        }

        return redirect()->route('admin.settings.offices')->with('success', 'Contact details saved.');
    }
}
