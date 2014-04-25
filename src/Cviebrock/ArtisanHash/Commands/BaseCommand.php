<?php namespace Cviebrock\ArtisanHash\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class BaseCommand extends Command {

	/**
	 * The hasher implementation.
	 *
	 * @var Illuminate\Hashing\HasherInterface
	 */
	protected $hasher;


	public function __construct()
	{
		parent::__construct();

		$this->hasher = \App::make('hash');
	}

}