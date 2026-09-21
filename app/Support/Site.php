<?php

namespace App\Support;

use App\Models\Setting;

/**
 * Everything the public templates need from the settings table, in one place.
 */
class Site
{
    public static function data(): array
    {
        $settings = Setting::allValues();
        $value = fn (string $key) => trim((string) ($settings[$key] ?? ''));

        $regions = config('site.regions');

        $social = [];
        foreach (config('site.social') as $key => $label) {
            if ($url = $value("social_{$key}")) {
                $social[] = ['label' => $label, 'url' => $url];
            }
        }

        $company = [];
        if ($name = $value('company_legal_name')) {
            $company[] = $name;
        }
        if ($number = $value('company_uk_number')) {
            $company[] = 'Registered in '.($value('company_uk_registered_in') ?: 'the United Kingdom').', company number '.$number;
        }
        if ($office = $value('company_uk_office')) {
            $company[] = 'Registered office: '.$office;
        }
        if ($abn = $value('company_abn')) {
            $company[] = 'ABN '.$abn;
        }
        if ($ntn = $value('company_ntn')) {
            $company[] = 'NTN '.$ntn;
        }

        $offices = [];
        $pricing = [];
        foreach ($regions as $key => $region) {
            $offices[$key] = [
                'country' => $region['country'],
                'timezone' => $region['timezone'],
                'city' => $value("office_{$key}_city"),
                'address' => $value("office_{$key}_address"),
                'phone' => $value("office_{$key}_phone"),
                'whatsapp' => $value("office_{$key}_whatsapp"),
                'email' => $value("office_{$key}_email"),
            ];

            $prices = [];
            foreach (config('site.price_items') as $item => $details) {
                $raw = $settings["price_{$key}_{$item}"] ?? ($details['defaults'][$key] ?? 0);
                $prices[$item] = (int) $raw;
            }
            $pricing[$key] = ['label' => $region['name'], 'symbol' => $region['symbol'], 'prices' => $prices];
        }

        return [
            'email' => $value('site_email'),
            'whatsapp' => static::digits($value('site_whatsapp')),
            'logo' => $value('site_logo'),
            'analytics_token' => $value('cloudflare_analytics_token'),
            'social' => $social,
            'company_line' => $company ? implode('. ', $company).'.' : '',
            'offices' => $offices,
            'pricing' => $pricing,
        ];
    }

    /**
     * Format a price like "£1,500" or "Rs 60,000". Zero means "Custom quote".
     */
    public static function money(string $region, int $amount): string
    {
        if ($amount <= 0) {
            return 'Custom quote';
        }

        return config("site.regions.{$region}.symbol").number_format($amount);
    }

    /**
     * Keep only digits, for wa.me links (e.g. "+61 4XX" -> "614XX").
     */
    public static function digits(string $value): string
    {
        return preg_replace('/\D+/', '', $value) ?? '';
    }

    /**
     * Keep digits and a leading plus, for tel: links.
     */
    public static function tel(string $value): string
    {
        return preg_replace('/[^\d+]+/', '', $value) ?? '';
    }
}
