<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Settings;

class ConfigServiceProvider extends ServiceProvider {

	/**
	 * Overwrite any vendor / package configuration.
	 *
	 * This service provider is intended to provide a convenient location for you
	 * to overwrite any "vendor" or package configuration that you may want to
	 * modify before the application handles the incoming request / command.
	 *
	 * @return void
	 */


	public function register()
	{
		$localSettings = \DB::select("select * from settings");
		foreach ($localSettings as $localSetting)			
		{
			$jmSettings[$localSetting->app_key] = $localSetting->app_value;
		}
		config([
			'jmSettings'=>$jmSettings
		]);
	}

}
