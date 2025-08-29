<?php

use App\Http\Controllers\OrderController;
use Knuckles\Scribe\Extracting\Strategies;
use Knuckles\Scribe\Config\Defaults;
use Knuckles\Scribe\Config\AuthIn;
use function Knuckles\Scribe\Config\{removeStrategies, configureStrategy};

// Cấu hình Scribe cho Order API Documentation

return [
    // The HTML <title> for the generated documentation.
    'title' => 'Order API Documentation',

    // A short description of your API. Will be included in the docs webpage, Postman collection and OpenAPI spec.
    'description' => 'Tài liệu API cho quản lý Order (Đơn hàng).',

    // Text to place in the "Introduction" section, right after the `description`. Markdown and HTML are supported.
    'intro_text' => <<<INTRO
        Tài liệu này cung cấp thông tin chi tiết về API Order của hệ thống e-commerce.
        
        ## Xác thực
        API yêu cầu xác thực người dùng. Sử dụng session authentication hoặc token-based authentication.
        
        ## Phân quyền
        - **User**: Có thể xem và tạo đơn hàng của riêng mình
        - **Admin**: Có thể xem tất cả đơn hàng, cập nhật trạng thái và xem thống kê
        
        ## Trạng thái đơn hàng
        - `pending`: Chờ xử lý
        - `processing`: Đang xử lý
        - `completed`: Hoàn thành
        - `cancelled`: Đã hủy
        - `return`: Trả hàng

        <aside>Khi bạn cuộn, bạn sẽ thấy các ví dụ code để làm việc với API trong các ngôn ngữ lập trình khác nhau ở phía bên phải.</aside>
    INTRO,

    // The base URL displayed in the docs.
    'base_url' => config("app.url"),

    // Routes to include in the docs
    'routes' => [
        [
            'match' => [
                // Match only routes whose paths match this pattern
                'prefixes' => ['api/orders*'],

                // Match only routes whose domains match this pattern
                'domains' => ['*'],
            ],

            // Include these routes even if they did not match the rules above.
            'include' => [
                OrderController::class,
            ],

            // Exclude these routes even if they matched the rules above.
            'exclude' => [
                // 'orders.track' // Exclude web routes
            ],
        ],
    ],

    // The type of documentation output to generate.
    'type' => 'laravel',

    // See https://scribe.knuckles.wtf/laravel/reference/config#theme for supported options
    'theme' => 'default',

    'static' => [
        // HTML documentation, assets and Postman collection will be generated to this folder.
        'output_path' => 'public/docs/orders',
    ],

    'laravel' => [
        // Whether to automatically create a docs route for you to view your generated docs.
        'add_routes' => true,

        // URL path to use for the docs endpoint
        'docs_url' => '/docs/orders',

        // Directory within `public` in which to store CSS and JS assets.
        'assets_directory' => null,

        // Middleware to attach to the docs endpoint
        'middleware' => [],
    ],

    'external' => [
        'html_attributes' => []
    ],

    'try_it_out' => [
        // Add a Try It Out button to your endpoints
        'enabled' => true,

        // The base URL to use in the API tester.
        'base_url' => null,

        // [Laravel Sanctum] Fetch a CSRF token before each request
        'use_csrf' => false,

        // The URL to fetch the CSRF token from
        'csrf_url' => '/sanctum/csrf-cookie',
    ],

    // How is your API authenticated?
    'auth' => [
        // Set this to true if ANY endpoints in your API use authentication.
        'enabled' => true,

        // Set this to true if your API should be authenticated by default.
        'default' => true,

        // Where is the auth value meant to be sent in a request?
        'in' => AuthIn::BEARER->value,

        // The name of the auth parameter or header.
        'name' => 'Authorization',

        // The value of the parameter to be used by Scribe to authenticate response calls.
        'use_value' => env('SCRIBE_AUTH_KEY'),

        // Placeholder your users will see for the auth parameter in the example requests.
        'placeholder' => 'Bearer {YOUR_AUTH_TOKEN}',

        // Any extra authentication-related info for your users.
        'extra_info' => 'Bạn có thể lấy token bằng cách đăng nhập vào hệ thống. Sử dụng session-based authentication cho web hoặc token-based cho API.',
    ],

    // Example requests for each endpoint will be shown in each of these languages.
    'example_languages' => [
        'bash',
        'javascript',
        'php',
    ],

    // Generate a Postman collection (v2.1.0) in addition to HTML docs.
    'postman' => [
        'enabled' => true,

        'overrides' => [
            'info.name' => 'Order API Collection',
            'info.description' => 'Collection cho Order API endpoints',
        ],
    ],

    // Generate an OpenAPI spec (v3.0.1) in addition to docs webpage.
    'openapi' => [
        'enabled' => true,

        'overrides' => [
            'info.title' => 'Order API',
            'info.version' => '1.0.0',
            'info.description' => 'API endpoints cho quản lý đơn hàng',
        ],

        // Additional generators to use when generating the OpenAPI spec.
        'generators' => [],
    ],

    'groups' => [
        // Endpoints which don't have a @group will be placed in this default group.
        'default' => 'Order Management',

        // By default, Scribe will sort groups alphabetically, and endpoints in the order their routes are defined.
        // You can override this by listing the groups, subgroups and endpoints here in the order you want them.
        'order' => [],
    ],

    // Custom logo path.
    'logo' => false,

    // Customize the "Last updated" value displayed in the docs
    'last_updated' => 'Last updated: {date:F j, Y}',

    'examples' => [
        // Set this to any number to generate the same example values for parameters on each run
        'faker_seed' => 1234,

        // With API resources and transformers, Scribe tries to generate example models
        'models_source' => ['factoryCreate', 'factoryMake', 'databaseFirst'],
    ],

    // The strategies Scribe will use to extract information about your routes at each stage.
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
        'responses' => configureStrategy(
            Defaults::RESPONSES_STRATEGIES,
            Strategies\Responses\ResponseCalls::withSettings(
                only: ['GET *'],
                // Disable debug mode in response calls to avoid error stack traces
                config: [
                    'app.debug' => false,
                ]
            )
        ),
        'responseFields' => [
            ...Defaults::RESPONSE_FIELDS_STRATEGIES,
        ]
    ],

    // For response calls, API resource responses and transformer responses,
    // Scribe will try to start database transactions, so no changes are persisted to your database.
    'database_connections_to_transact' => [config('database.default')],

    'fractal' => [
        // If you are using a custom serializer with league/fractal, you can specify it here.
        'serializer' => null,
    ],
];
