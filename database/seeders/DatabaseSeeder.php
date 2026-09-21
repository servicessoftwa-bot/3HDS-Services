<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Starting data for a fresh install. No demo content and no default
     * admin account: create one with `php artisan app:create-admin`.
     */
    public function run(): void
    {
        $this->call([
            SiteSettingsSeeder::class,
            TeamSeeder::class,
        ]);
    }
}
