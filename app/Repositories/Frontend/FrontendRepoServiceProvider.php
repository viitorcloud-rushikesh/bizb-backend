<?php
namespace App\Repositories\Frontend;

use Illuminate\Support\ServiceProvider;

class FrontendRepoServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            'App\Repositories\Frontend\Access\User\UserInterface',
            'App\Repositories\Frontend\Access\User\UserRepository'
        );
    }
}
