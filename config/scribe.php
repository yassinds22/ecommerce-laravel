<?php

use Knuckles\Scribe\Extracting\Strategies;
use Knuckles\Scribe\Config\Defaults;
use Knuckles\Scribe\Config\AuthIn;

return [

    // HTML <title> للصفحة
    'title' => config('app.name') . ' API Documentation',

    // وصف قصير للـ API
    'description' => '',

    // إزالة الـ Introduction الافتراضي
    'intro_text' => '',

    // Base URL للـ API
    'base_url' => config("app.url"),

    // تحديد الـ routes لتضمينها في التوثيق
    'routes' => [
        [
            'match' => [
                'prefixes' => ['api/products*', 'api/categories*'], // شامل Products و Categories
                'domains' => ['*'],
            ],
            'include' => [
                // إضافة أي route آخر إذا رغبت
            ],
            'exclude' => [
                'api/user', // نستبعد فقط user
            ],
        ],
    ],

    // نوع التوثيق
    'type' => 'laravel',

    // Theme
    'theme' => 'default',

    'static' => [
        'output_path' => 'public/docs',
    ],

    'laravel' => [
        'add_routes' => true,
        'docs_url' => '/docs',
        'assets_directory' => null,
        'middleware' => [],
    ],

    'external' => [
        'html_attributes' => []
    ],

    'try_it_out' => [
        'enabled' => true,
        'base_url' => null,
        'use_csrf' => false,
        'csrf_url' => '/sanctum/csrf-cookie',
    ],

    'auth' => [
        'enabled' => false,
        'default' => false,
        'in' => AuthIn::BEARER->value,
        'name' => 'key',
        'use_value' => env('SCRIBE_AUTH_KEY'),
        'placeholder' => '{YOUR_AUTH_KEY}',
        'extra_info' => '',
    ],

    'example_languages' => [
        'bash',
        'javascript',
    ],

    'postman' => [
        'enabled' => false,
        'overrides' => [],
    ],

    'openapi' => [
        'enabled' => false,
        'overrides' => [],
        'generators' => [],
    ],

    'groups' => [
        'default' => 'API Endpoints',
        'order' => [],
    ],

    'logo' => false,
    'last_updated' => '', // إخفاء "Last updated"

    'examples' => [
        'faker_seed' => 1234,
        'models_source' => ['factoryCreate', 'factoryMake', 'databaseFirst'],
    ],

    'strategies' => [
        'metadata' => [
            ...Defaults::METADATA_STRATEGIES,
        ],
        'headers' => [
            ...Defaults::HEADERS_STRATEGIES,
            Strategies\StaticData::withSettings(data: [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ]),
        ],
        'urlParameters' => [
            ...Defaults::URL_PARAMETERS_STRATEGIES,
        ],
        'queryParameters' => [
            ...Defaults::QUERY_PARAMETERS_STRATEGIES,
        ],
        'bodyParameters' => [
            ...Defaults::BODY_PARAMETERS_STRATEGIES,
        ],
        'responses' => [
            ...Defaults::RESPONSES_STRATEGIES,
        ],
        'responseFields' => [
            ...Defaults::RESPONSE_FIELDS_STRATEGIES,
        ],
    ],

    'database_connections_to_transact' => [config('database.default')],
    'fractal' => [
        'serializer' => null,
    ],
];
