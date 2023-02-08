<?php

namespace Realtyna\MustRename\Settings;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class Setting extends \Realtyna\MvcCore\Setting
{

	private $mainPage;

	/**
	 * @return void
	 */
	public function registerPluginOptions()
	{
		$this->registerMainPage();
	}

	private function registerMainPage()
	{
		$this->mainPage = Container::make('theme_options', __('Realtyna Sample Page', 'raeltyna-sample-page'));;
	}

}