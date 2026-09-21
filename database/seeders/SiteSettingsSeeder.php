<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

/**
 * Creates the site settings with their starting values.
 * Safe to run again: settings already edited in the admin panel are left alone.
 */
class SiteSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General
            ['site_email', '', 'general'],
            ['site_whatsapp', '', 'general'],
            ['site_logo', '', 'general'],
            ['cloudflare_analytics_token', '', 'general'],

            // Company registration (shown in the footer when filled in)
            ['company_legal_name', '', 'company'],
            ['company_uk_number', '', 'company'],
            ['company_uk_registered_in', 'England and Wales', 'company'],
            ['company_uk_office', '', 'company'],
            ['company_abn', '', 'company'],
            ['company_ntn', '', 'company'],
        ];

        foreach (array_keys(config('site.social')) as $network) {
            $settings[] = ["social_{$network}", '', 'social'];
        }

        $cities = ['uk' => 'England', 'au' => 'Melbourne', 'pk' => ''];
        foreach (array_keys(config('site.regions')) as $region) {
            $settings[] = ["office_{$region}_city", $cities[$region] ?? '', 'offices'];
            foreach (['address', 'phone', 'whatsapp', 'email'] as $field) {
                $settings[] = ["office_{$region}_{$field}", '', 'offices'];
            }
        }

        foreach (config('site.price_items') as $item => $details) {
            foreach ($details['defaults'] as $region => $price) {
                $settings[] = ["price_{$region}_{$item}", (string) $price, 'pricing'];
            }
        }

        foreach ($settings as [$key, $value, $group]) {
            Setting::firstOrCreate(['key' => $key], ['value' => $value, 'type' => 'text', 'group' => $group]);
        }
    }
}
