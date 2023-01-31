<?php

namespace Realtyna\MustRename\Settings;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class Setting extends \Realtyna\MvcCore\Setting
{

    public static function registerPluginOptions()
    {
        Container::make('theme_options', __('Realtyna Sample setting page'))
            ->add_tab( __( 'General' ), array(
                Field::make( 'text', 'crb_first_name', __( 'First Name' ) )->set_required(true),
            ) );
    }
}