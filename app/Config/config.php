<?php

/**
 * App configuration file.
 */
return [

    'namespace' => 'RealtynaAPIv4',
    'version' => '1.0.0',
    'api' => [
        'namespace' => 'home-valuation'
    ],
    'path' => [
        'plugin-file-path'  => __DIR__ . '/../../plugin.php',
        'validator-messages' => __DIR__ . '/../../assets/langs/validation.php',
        'phinx' => [
            'conf'  => __DIR__ . '/../Config/phinx.php'
        ],
        'assets' => [
            'css' => __DIR__ . '/../../assets/css',
            'js' => __DIR__ . '/../../assets/js',
        ],
        'plugin_dir' => __DIR__ . '/../../',
        'views_dir' => __DIR__ . '/../../templates',
    ],
    'jwt_secret' => REALTYNA_JWT_SECRET,


];