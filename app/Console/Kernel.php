<?php namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Override some of the default Artisan commands to use my stubs.
        Commands\MakeController::class,
        Commands\MakeModel::class,
        Commands\MakeMigration::class,

        // The commands associated with admin users.
        Commands\MakeAdmin::class,

        // A helper command that wraps the controller, model, and migration.
        Commands\MakeApiModel::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule) {

    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands() {
        require base_path('routes/console.php');
    }
}
