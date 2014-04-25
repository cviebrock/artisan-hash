<?php namespace Cviebrock\ArtisanHash\Commands;

use Symfony\Component\Console\Input\InputArgument;

class CheckHashCommand extends BaseCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'hash:check';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Check a hash against a given plaintext string';

	/**
	 * Execute the console command.
	 *
	 * @return string
	 */
	public function fire()
	{

		$hash = $this->argument('hash') ?: $this->secret('Enter the hash:', null);
		if (!$hash)
		{
			$this->error('No hash given.');
			return;
		}


		$string = $this->argument('string') ?: $this->secret('Enter the plaintext string to check:', null);
		if (!$string)
		{
			$this->error('No string given.');
			return;
		}

		if ( !$this->hasher->check($string, $hash) )
		{
			$this->error('Hash does not match.');
			return;
		}


		$this->info('Hash matches.');
		if ( $this->hasher->needsRehash($hash) )
		{
			$this->info('Your hash needs to be rehashed.');
		}

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('hash',   InputArgument::OPTIONAL, 'The hash to check against.'),
			array('string', InputArgument::OPTIONAL, 'The plaintext string to check.'),
		);
	}

}