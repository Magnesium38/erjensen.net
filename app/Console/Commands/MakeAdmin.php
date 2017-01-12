<?php namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeAdmin extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an admin user';

    /**
     * Execute the console command.
     */
    public function handle() {
        $username = $this->ask("Username");
        $password = $this->secret("Password");

        User::create([
            'username' => $username,
            'password' => bcrypt($password),
        ]);

        $this->info("Admin user created.");
    }
}
