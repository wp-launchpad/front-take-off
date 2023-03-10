<?php

return [
    'vfs_dir' => '/',
    'structure' => [
        'configs' => [
            'parameters.php' => file_get_contents(ROCKER_LAUNCHER_FRONT_TAKE_OFF_TESTS_FIXTURES_DIR . '/files/configs/parameters.php'),
        ]
    ],
    'test_data' => [
        'installReactShouldConfigureProject' => [
            'config' => [
                'files' => [
                    'configs/parameters.php' => [
                        'exists' => true,
                        'content' => file_get_contents(ROCKER_LAUNCHER_FRONT_TAKE_OFF_TESTS_FIXTURES_DIR . '/files/configs/parameters.php'),
                    ],
                    '_dev/package.json' => [
                        'exists' => false,
                    ],
                    '_dev/bud.config.js' => [
                        'exists' => false,
                    ],
                    '_dev/.npmrc' => [
                        'exists' => false,
                    ],
                    '_dev/.gitignore' => [
                        'exists' => false,
                    ],
                    '_dev/src/app.js' => [
                        'exists' => false,
                    ],
                    '_dev/src/App.jsx' => [
                        'exists' => false,
                    ],
                ]
            ],
            'expected' => [
                'files' => [
                    'configs/parameters.php' => [
                        'exists' => true,
                        'content' => file_get_contents(__DIR__ . '/files/configs/parameters.php'),
                    ],
                    '_dev/package.json' => [
                        'exists' => true,
                        'content' => file_get_contents(ROCKER_LAUNCHER_FRONT_TAKE_OFF_DIR . '/_dev/package.json' ),
                    ],
                    '_dev/bud.config.js' => [
                        'exists' => true,
                        'content' => file_get_contents(ROCKER_LAUNCHER_FRONT_TAKE_OFF_DIR . '/_dev/bud.config.js' ),
                    ],
                    '_dev/.npmrc' => [
                        'exists' => true,
                        'content' => file_get_contents(ROCKER_LAUNCHER_FRONT_TAKE_OFF_DIR . '/_dev/.npmrc' ),
                    ],
                    '_dev/.gitignore' => [
                        'exists' => true,
                        'content' => file_get_contents(ROCKER_LAUNCHER_FRONT_TAKE_OFF_DIR . '/_dev/.gitignore' ),
                    ],
                    '_dev/src/app.js' => [
                        'exists' => true,
                        'content' => file_get_contents(ROCKER_LAUNCHER_FRONT_TAKE_OFF_DIR . '/_dev/src/app.js' ),
                    ],
                    '_dev/src/App.jsx' => [
                        'exists' => true,
                        'content' => file_get_contents(ROCKER_LAUNCHER_FRONT_TAKE_OFF_DIR . '/_dev/src/App.jsx' ),
                    ],
                ]
            ]
        ],
        'installVanillaShouldConfigureProject' => [
            'config' => [],
            'expected' => []
        ],
        'installVueShouldConfigureProject' => [
            'config' => [],
            'expected' => []
        ],
    ],
];
