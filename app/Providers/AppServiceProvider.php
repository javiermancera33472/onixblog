<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
            view()->composer('app', function($view)
	    {
	    	$settings =  config('jmSettings');
	        $myApp = $settings['JM_SITE_NAME'];
	        $title = $settings['JM_SITE_NAME'];
                $siteDown = $settings['JM_IS_SITE_DOWN'];
                $url = $_SERVER['REQUEST_URI']; //returns the current URL
                $parts = explode('/',$url);
                $currentFolder = $parts[1];   
                $domainName = $settings['JM_DOMAIN'];                
	        $view->with(compact('title','myApp','currentFolder','domainName','siteDown'));
	    });
            
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
            
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
                $this->app->singleton('League\Glide\Server',function($app){
                   $filesystem = $app->make("Illuminate\Contracts\Filesystem\Filesystem");
                   
                    return \League\Glide\ServerFactory::create([
                        'source'    =>  $filesystem->getDriver(),
                        'cache'     =>  $filesystem->getDriver(),
                        'source_path_prefix'    =>  'images',
                        'cache_path_prefix'    =>  'images/.cache',
                        'base_url' => "image",
                    ]);
                });
	}

}
