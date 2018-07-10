<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\InputArgument;

class UserCreaterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user-create 
    {name : Desired name}
    {email : Desired email} 
    {password : Desired password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rapidly create a new user';

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
    public function handle()
    {
        if ($this->validate()) {
            $name = $this->argument('name');
            $email = $this->argument('email');
            $password = Hash::make($this->argument('password'));

            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = $password;
            $user->save();

            $this->info('User created!');
        }
    }

    public function validate()
    {
        if (!filter_var($this->argument('email'), FILTER_VALIDATE_EMAIL)) {
            $this->error('Insert a valid email');
        } else if (strlen($this->argument('password')) < 6) {
            $this->error('Password should be at least 6 characters');
        }

        return true;
    }
}
