<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class HelperServiceProvider extends ServiceProvider
{

    public function boot()
    {

        $files = glob( app_path('Helpers/*.php') );
        foreach ($files as $file){
            require_once $file;
        }

    }
}
