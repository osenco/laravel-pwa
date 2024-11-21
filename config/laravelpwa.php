<?php

return [
    'name'     => 'ReviQuiz',
    'manifest' => [
        'name'             => env('APP_NAME', 'My PWA App'),
        'short_name'       => 'ReviQuiz',
        'description'      => 'This is a PWA app.',
        'start_url'        => '/',
        'background_color' => '#ffffff',
        'theme_color'      => '#000000',
        'display'          => 'standalone',
        'orientation'      => 'any',
        'status_bar'       => 'black',
        "screenshots"      => [
            [
                "src"         => '/images/icons/screenshot1.png',
                "sizes"       => "1290x2796",
                "type"        => "image/png",
                "form_factor" => "wide",
                "label"       => "Wonder Widgets",
            ],
            [
                "src"         => '/images/icons/screenshot2.png',
                "sizes"       => "1290x2796",
                "type"        => "image/png",
                "form_factor" => "narrow",
                "label"       => "Wonder Widgets",
            ],
        ],
        'icons'            => [
            '72x72'   => [
                'path'    => '/images/icons/icon-72x72.png',
                'purpose' => 'any',
            ],
            '96x96'   => [
                'path'    => '/images/icons/icon-96x96.png',
                'purpose' => 'any',
            ],
            '128x128' => [
                'path'    => '/images/icons/icon-128x128.png',
                'purpose' => 'any',
            ],
            '144x144' => [
                'path'    => '/images/icons/icon-144x144.png',
                'purpose' => 'any',
            ],
            '152x152' => [
                'path'    => '/images/icons/icon-152x152.png',
                'purpose' => 'any',
            ],
            '192x192' => [
                'path'    => '/images/icons/icon-192x192.png',
                'purpose' => 'any',
            ],
            '256x256' => [
                'path'    => '/images/icons/icon-256x256.png',
                'purpose' => 'any',
            ],
            '512x512' => [
                'path'    => '/images/icons/icon-512x512.png',
                'purpose' => 'any',
            ],
        ],
        'splash'           => [
            '640x1136'  => '/images/icons/splash-640x1136.png',
            '750x1334'  => '/images/icons/splash-750x1334.png',
            '828x1792'  => '/images/icons/splash-828x1792.png',
            '1125x2436' => '/images/icons/splash-1125x2436.png',
            '1242x2208' => '/images/icons/splash-1242x2208.png',
            '1242x2688' => '/images/icons/splash-1242x2688.png',
            '1536x2048' => '/images/icons/splash-1536x2048.png',
            '1668x2224' => '/images/icons/splash-1668x2224.png',
            '1668x2388' => '/images/icons/splash-1668x2388.png',
            '2048x2732' => '/images/icons/splash-2048x2732.png',
        ],
        'shortcuts'        => [
            [
                'name'        => 'Android App',
                'description' => 'Download from PlayStore',
                'url'         => 'https://play.android.com/store/apps/details?id=com.reviquiz',
                'icons'       => [
                    'src'     => '/images/icons/icon-96x96.png',
                    "purpose" => "any",
                    "sizes"    => "96x96",
                ],
            ],
            [
                'name'        => 'iOS App',
                'description' => 'Download from App Store',
                'url'         => 'https://apps.apple.com/us/app/reviquiz/id1552069100',
                'icons'       => [
                    'src'     => '/images/icons/icon-96x96.png',
                    'purpose' => 'any',
                    "sizes"    => "96x96",
                ],
            ],
        ],
        'custom'           => [],
    ],
];
