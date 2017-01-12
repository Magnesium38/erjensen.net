<?php namespace App\Console;

class MigrationCreator extends \Illuminate\Database\Migrations\MigrationCreator {
    /**
     * Get the path to the stubs.
     *
     * @return string
     */
    public function getStubPath() {
        return base_path("resources/stubs/migration");
    }
}
