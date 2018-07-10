<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/07/2018
 * Time: 08:46
 */

namespace Spacedog4\Commands;

use Illuminate\Support\ServiceProvider;


class CommandServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                UserCreaterCommand::class,
            ]);
        }
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}