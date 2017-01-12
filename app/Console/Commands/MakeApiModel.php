<?php namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class MakeApiModel extends GeneratorCommand {
    /**
     * The name of the console command.
     *
     * @var string
     */
    protected $name = 'make:apimodel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Model for the API along with a migration and controller.';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub() {
        return base_path("resources/stubs/controller.stub");
    }

    public function handle() {
        $this->call("make:model", [
            "name" => $this->argument("name"),
            "-a" => true,
            "-c" => true,
            "-m" => true,
            "-r" => true,
        ]);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments() {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the class'],
        ];
    }
}
