<?php

namespace Realtyna\MustRename;

use Realtyna\MvcCore\StartUp;

class Main extends StartUp
{

    public function init()
    {
        // TODO: Implement init() method.
    }

    public function components()
    {
        // TODO: Implement components() method.
    }

    public function onAdmin()
    {
        // TODO: Implement onAdmin() method.
    }

    public function api()
    {
        // TODO: Implement api() method.
    }

    public function activation()
    {
        $this->phinx->migrate();
        $this->phinx->seed();
        $pluginVersion = get_plugin_data($this->config->get('path.plugin-file-path'))['Version'];
        update_option('realtyna_must_rename_version', $pluginVersion);


        //Custom activation START
        //Custom activation END
    }

    public function deactivation()
    {

        //Custom deactivation START
        //Custom deactivation END
    }

    public function uninstallation()
    {
        $this->phinx->rollback();

        //Custom uninstallation START
        //Custom uninstallation END
    }

    public function onUpdate()
    {
        if (!function_exists('get_plugin_data')) {
            require_once(ABSPATH . 'wp-admin/includes/plugin.php');
        }

        $currentPluginVersion = get_plugin_data($this->config->get('path.plugin-file-path'))['Version'];
        $lastRegisteredPluginVersion = get_option('realtyna_must_rename_version');

        if ($currentPluginVersion != $lastRegisteredPluginVersion) {
            $this->phinx->migrate();
            $this->phinx->seed();
            update_option('realtyna_must_rename_version', $currentPluginVersion);
        }
    }
}