<?php

global $table_prefix;

return
    [
        'paths' => [
            'migrations' => '%%PHINX_CONFIG_DIR%%/../Database/migrations',
            'seeds' => '%%PHINX_CONFIG_DIR%%/../Database/seeds'
        ],
        'environments' => [
            'default_migration_table' => 'phinxlog',
            'default_environment' => 'production',
            'production' => [
                'adapter' => 'mysql',
                'host' => DB_HOST,
                'name' => DB_NAME,
                'user' => DB_USER,
                'pass' => DB_PASSWORD,
                'port' => '3306',
                'charset' => DB_CHARSET,
                'table_prefix' => $table_prefix,
            ],
            'development' => [
                'adapter' => 'mysql',
                'host' => DB_HOST,
                'name' => DB_NAME,
                'user' => DB_USER,
                'pass' => DB_PASSWORD,
                'port' => '3306',
                'charset' => DB_CHARSET,
                'table_prefix' => $table_prefix,
            ],
        ],
        'version_order' => 'creation'
    ];
