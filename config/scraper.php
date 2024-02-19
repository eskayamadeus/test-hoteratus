<?php

return [
    'channels' => [
        'expedia-hotel' => [
            'name' => 'Expedia - Hotel Only',
        ],

        'booking' => [
            'name' => 'Booking',
        ],

        'expedia-packages' => [
            'name' => 'Expedia Package',
        ],

        'airbnb' => [
            'name' => 'Airbnb',
        ],
    ],

    'node' => [
        'path' => env('SCRAPER_NODE_PATH', 'node'),
    ],

    'chrome' => [
        'path' => env('SCRAPER_CHROME_PATH'),
    ],
];
