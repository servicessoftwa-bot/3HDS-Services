<?php

/*
|--------------------------------------------------------------------------
| 3HDS site structure
|--------------------------------------------------------------------------
| Countries and price packages shown on the website. The prices themselves,
| contact details and other text are edited in the admin panel; this file
| only defines which countries and packages exist.
*/

return [

    'regions' => [
        'uk' => ['country' => 'United Kingdom', 'short' => 'UK', 'name' => 'the UK', 'symbol' => '£', 'timezone' => 'Europe/London'],
        'au' => ['country' => 'Australia', 'short' => 'Australia', 'name' => 'Australia', 'symbol' => 'A$', 'timezone' => 'Australia/Melbourne'],
        'pk' => ['country' => 'Pakistan', 'short' => 'Pakistan', 'name' => 'Pakistan', 'symbol' => 'Rs ', 'timezone' => 'Asia/Karachi'],
    ],

    // Region used when a visitor's location can't be guessed
    'default_region' => 'uk',

    'price_items' => [
        'business' => [
            'name' => 'Business software',
            'description' => 'A custom management system such as point of sale, accounting or stock control, for online use, offline use or both.',
            'includes' => ['Designed around your own processes', 'Staff accounts and permissions', 'Setup and staff training'],
            'monthly' => false,
            'defaults' => ['uk' => 5000, 'au' => 9500, 'pk' => 200000],
        ],
        'website' => [
            'name' => 'Business website',
            'description' => 'A fast, professional website for a service business, built to bring in enquiries.',
            'includes' => ['Custom design that works on phones', 'Contact form and WhatsApp enquiries', 'Hosting, domain and SSL set up'],
            'monthly' => false,
            'defaults' => ['uk' => 1500, 'au' => 2800, 'pk' => 60000],
        ],
        'platform' => [
            'name' => 'Web platform',
            'description' => 'Booking systems, customer portals and admin dashboards shaped around how you work.',
            'includes' => ['Staff logins and admin panel', 'Customer accounts and database', 'Security review before launch'],
            'monthly' => false,
            'defaults' => ['uk' => 6000, 'au' => 11000, 'pk' => 250000],
        ],
        'app' => [
            'name' => 'Mobile app',
            'description' => 'One Flutter app for Android and iOS, delivered with the backend that runs it.',
            'includes' => ['Customer app and admin tools', 'Push notifications and maps', 'Play Store and App Store release'],
            'monthly' => false,
            'defaults' => ['uk' => 12000, 'au' => 22000, 'pk' => 450000],
        ],
        'trading' => [
            'name' => 'Trading system',
            'description' => 'A MetaTrader 5 Expert Advisor coded from your strategy rules.',
            'includes' => ['Full .mq5 source code', 'Strategy Tester backtest report', 'Risk controls and a settings guide'],
            'monthly' => false,
            'defaults' => ['uk' => 500, 'au' => 950, 'pk' => 50000],
        ],
        'audit' => [
            'name' => 'Fix or audit',
            'description' => 'A review of an existing website, app or Expert Advisor, with the problems explained and fixes quoted.',
            'includes' => ['Code and security review', 'Written findings in plain language', 'Small fixes included'],
            'monthly' => false,
            'defaults' => ['uk' => 300, 'au' => 550, 'pk' => 25000],
        ],
        'support' => [
            'name' => 'Support plan',
            'description' => 'Keeps your software updated, backed up and working after launch.',
            'includes' => ['Security and software updates', 'Regular backups and monitoring', 'Fixes handled first'],
            'monthly' => true,
            'defaults' => ['uk' => 60, 'au' => 110, 'pk' => 10000],
        ],
    ],

    // Social profiles offered in the admin panel, in footer order
    'social' => [
        'linkedin' => 'LinkedIn',
        'github' => 'GitHub',
        'facebook' => 'Facebook',
        'instagram' => 'Instagram',
        'youtube' => 'YouTube',
        'x' => 'X',
        'mql5' => 'MQL5',
    ],

    // Options for "What do you need?" on the contact form
    'enquiry_types' => [
        'Business software (POS, accounting, stock, HR)',
        'Web platform or website',
        'Mobile app',
        'Trading system (MT5 Expert Advisor)',
        'Fix or audit an existing project',
        'Not sure yet',
    ],
];
