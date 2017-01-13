<?php namespace App\Console\Commands;

use Illuminate\Routing\Console\ControllerMakeCommand;
use Symfony\Component\Console\Input\InputOption;

class MakeController extends ControllerMakeCommand {
    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub() {
        if ($this->option('api')) {
            return base_path('resources/stubs/controller/api.stub');
        } elseif ($this->option('model')) {
            return base_path('resources/stubs/controller/model.stub');
        } elseif($this->option('resource')) {
            return base_path('resources/stubs/controller/resource.stub');
        }

        return base_path('resources/stubs/controller/plain.stub');
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace) {
        if ($this->option('api')) {
            return $rootNamespace . '\Http\Controllers\Api';
        }
        return $rootNamespace . '\Http\Controllers';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions() {
        $options = parent::getOptions();

        $options[] = ['api', 'a', InputOption::VALUE_NONE, 'Generate an API controller class.'];

        usort($options, function ($a, $b) {
            return strcmp($a[0], $b[0]);
        });

        return $options;
    }
}
