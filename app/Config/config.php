<?php

/**
 * App configuration file.
 */
return [

    'namespace' => 'MustRename',
    'version' => '1.0.0',
    'api' => [
        'namespace' => 'must-rename'
    ],
    'path' => [
        'plugin-file-path'  => __DIR__ . '/../../plugin.php',
        'validator-messages' => __DIR__ . '/../../assets/langs/validation.php',
        'phinx' => [
            'conf'  => __DIR__ . '/phinx.php'
        ],
        'assets' => [
            'css' => plugin_dir_url(__DIR__ . '/../../plugin.php') . '/assets/css',
            'js' => plugin_dir_url(__DIR__ . '/../../plugin.php') . '/assets/js',
        ],
        'plugin_dir' => __DIR__ . '/../../',
        'view' => __DIR__ . '/../../templates',
    ],
    'jwt_secret' => REALTYNA_JWT_SECRET,
];