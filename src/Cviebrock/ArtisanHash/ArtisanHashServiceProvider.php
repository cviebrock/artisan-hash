<?php namespace Cviebrock\ArtisanHash;

use Illuminate\Support\ServiceProvider;
use Cviebrock\ArtisanHash\Commands\MakeHashCommand;

class ArtisanHashServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;


	/**
	 * Booting
	 */
	public function boot()
	{
		$this->package('cviebrock/artisan-hash');
	}

	/**
	 * Register the commands
	 *
	 * @return void
	 */
	public function register()
	{

		foreach(array(
			'MakeHash',
		) as $command)
		{
			$this->{"register$command"}();
		}
	}

	/**
	 * Register the hash::make command
	 */
	protected function registerMakeHash()
	{
		$this->app['artisanhash.make'] = $this->app->share(function($app)
		{
			return new MakeHashCommand;
		});

		$this->commands('artisanhash.make');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}