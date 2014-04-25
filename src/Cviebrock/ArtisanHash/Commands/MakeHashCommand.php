<?php namespace Cviebrock\ArtisanHash\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Hashing;

class MakeHashCommand extends Command {

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
	protected $description = 'Hash a given string';

	/**
	 * Execute the console command.
	 *
	 * @return string
	 */
	public function fire()
	{
		if (!$string = $this->argument('string'))
		{
			$string = $this->secret('Enter the string to hash:', null);
		}

		if (!$string)
		{
			$this->error('No string given.');
		}
		else
		{
			$hash = App:make('hash')->make($string);
			$this->info($hash);
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
			array('string', InputArgument::OPTIONAL, 'The string to hash.'),
		);
	}

}