<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('mp3_ogg_extension', function($attribute, $value, $parameters, $validator) {

            if(!empty($value->getClientOriginalExtension()) && ($value->getClientOriginalExtension() == 'mp3' || $value->getClientOriginalExtension() == 'ogg')){
                return true;
            }else{
                return false;
            }

        });
    }
}
