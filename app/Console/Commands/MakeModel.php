<?php namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class MakeModel extends GeneratorCommand {
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Eloquent model class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Model';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire() {
        if (parent::fire() === false) {
            return;
        }

        if ($this->option('migration')) {
            $table = Str::plural(Str::snake(class_basename($this->argument('name'))));

            $this->call('make:migration', [
                'name' => "create_{$table}_table",
                '--create' => $table,
            ]);
        }

        if ($this->option('controller')) {
            $controller = Str::studly(class_basename($this->argument('name')));

            $this->call('make:controller', [
                'name' => "{$controller}Controller",
                '--resource' => $this->option('resource'),
                '--api' => $this->option('api'),
            ]);
        }
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub() {
        return base_path("resources/stubs/model/plain.stub");
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace) {
        return $rootNamespace . '\Models';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions() {
        return [
            ['api', 'a', InputOption::VALUE_NONE, 'Indicates if the generated controller should be an API controller'],
            ['migration', 'm', InputOption::VALUE_NONE, 'Create a new migration file for the model.'],
            ['controller', 'c', InputOption::VALUE_NONE, 'Create a new controller for the model.'],
            ['resource', 'r', InputOption::VALUE_NONE, 'Indicates if the generated controller should be a resource controller'],
        ];
    }
}
