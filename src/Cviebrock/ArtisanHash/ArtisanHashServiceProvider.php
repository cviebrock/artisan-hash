<?php namespace Cviebrock\ArtisanHash;

use Illuminate\Support\ServiceProvider;
use Cviebrock\ArtisanHash\Commands\MakeHashCommand;
use Cviebrock\ArtisanHash\Commands\CheckHashCommand;

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
			'CheckHash',
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
		$this->app['artisan-hash.make'] = $this->app->share(function($app)
		{
			return new MakeHashCommand;
		});

		$this->commands('artisan-hash.make');
	}

	/**
	 * Register the hash::check command
	 */
	protected function registerCheckHash()
	{
		$this->app['artisan-hash.check'] = $this->app->share(function($app)
		{
			return new CheckHashCommand;
		});

		$this->commands('artisan-hash.check');
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