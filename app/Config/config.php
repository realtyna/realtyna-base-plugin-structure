<?php

/**
 * App configuration file.
 */
return [

    'namespace' => 'MustRename',
    'version' => '1.0.0',
    'plugin'  => [
        'name' => 'must_rename'
    ],
    'api' => [
        'namespace' => 'wpl'
    ],
    'path' => [
        'plugin-file-path'  => REALTYNA_MUST_RENAME_BASE_PATH . 'plugin.php',
        'validator-messages' => REALTYNA_MUST_RENAME_BASE_PATH . 'assets/langs/validation.php',
        'phinx' => [
            'conf'  => REALTYNA_MUST_RENAME_BASE_PATH . 'app/Config/phinx.php'
        ],
        'assets' => [
            'css' => plugin_dir_url(REALTYNA_MUST_RENAME_BASE_PATH . 'plugin.php') . '/assets/css',
            'js' => plugin_dir_url(REALTYNA_MUST_RENAME_BASE_PATH . 'plugin.php') . '/assets/js',
        ],
        'plugin_dir' => REALTYNA_MUST_RENAME_BASE_PATH,
        'view' => REALTYNA_MUST_RENAME_BASE_PATH . 'templates',
    ],
    'jwt_secret' => REALTYNA_JWT_SECRET,
    'license'    => [
	    'product_id' => 194915
    ]
];