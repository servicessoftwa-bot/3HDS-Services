<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

/*
| Create (or reset) an admin account. There is no default admin password:
| run `php artisan app:create-admin` once after installing.
*/
Artisan::command('app:create-admin {email?} {--name=}', function (?string $email = null) {
    $email = $email ?: $this->ask('Admin email address');
    $name = $this->option('name') ?: $this->ask('Name', 'Admin');
    $password = $this->secret('Password (at least 12 characters)');
    $confirm = $this->secret('Type the password again');

    if ($password !== $confirm) {
        $this->error('The passwords do not match.');

        return 1;
    }

    $validator = Validator::make(
        ['email' => $email, 'password' => $password],
        ['email' => ['required', 'email', 'max:255'], 'password' => ['required', 'string', 'min:12']]
    );

    if ($validator->fails()) {
        foreach ($validator->errors()->all() as $message) {
            $this->error($message);
        }

        return 1;
    }

    $user = User::firstOrNew(['email' => $email]);
    $user->name = $name;
    $user->password = $password; // hashed automatically by the model
    $user->forceFill(['is_admin' => true])->save();

    $this->info("Admin account ready for {$email}. Log in at ".url('/login'));

    return 0;
})->purpose('Create or update an admin account');
