<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class MakeValidator extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'validator:make';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$filter = ucfirst($this->argument('name'));
		$name = $filter.'Validator';

		$myFile = __DIR__."/../validators/$name.php";
		$file = __DIR__."/stubs/validator.php";

		$stubFile = file_get_contents($file);
		$stubFile = str_replace('DummyClass', $name, $stubFile);
		$stubFile = str_replace('DummyFilter', $filter, $stubFile);

		file_put_contents($myFile, $stubFile);

		$this->info('Validador criado com sucesso!');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('name', InputArgument::REQUIRED, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('name', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
