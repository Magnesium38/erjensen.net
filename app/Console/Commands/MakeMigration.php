<?php namespace App\Console\Commands;

use App\Console\MigrationCreator;
use Illuminate\Database\Console\Migrations\MigrateMakeCommand;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Composer;

class MakeMigration extends MigrateMakeCommand {
    /**
     * Create a new migration install command instance.
     *
     * @param Filesystem $files
     * @param  \Illuminate\Support\Composer $composer
     */
    public function __construct(Filesystem $files, Composer $composer) {
        $creator = new MigrationCreator($files);
        parent::__construct($creator, $composer);
    }
}
