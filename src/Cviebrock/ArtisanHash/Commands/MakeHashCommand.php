<?php namespace Cviebrock\ArtisanHash\Commands;

use Symfony\Component\Console\Input\InputArgument;

class MakeHashCommand extends BaseCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'hash:make';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Hash a plaintext string';

	/**
	 * Execute the console command.
	 *
	 * @return string
	 */
	public function fire()
	{
		$string = $this->argument('string') ?: $this->secret('Enter the plaintext string to check:', null);
		if (!$string)
		{
			$this->error('No string given.');
			return;
		}

		$this->info( $this->hasher->make($string) );

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('string', InputArgument::OPTIONAL, 'The plaintext string to hash.'),
		);
	}

}