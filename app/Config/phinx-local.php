<?php
return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/../Database/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/../Database/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'development' => [
            'adapter' => 'mysql',
            'host' => 'localhost',
            'name' => 'realtyna_local',
            'user' => 'root',
            'pass' => 'root',
            'port' => '3306',
            'charset' => 'utf8mb4',
            'table_prefix' => 'wp_',
        ]
    ],
    'version_order' => 'creation'
];
