<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //global counties array
        $countiesArray = array(
            ''  =>  '-- wybierz --',
            'dolnośląskie' => 'dolnośląskie',
            'kujawsko-pomorskie' => 'kujawsko-pomorskie',
            'lubelskie' => 'lubelskie',
            'lubuskie' => 'lubuskie',
            'łódzkie' => 'łódzkie',
            'małopolskie' => 'małopolskie',
            'mazowieckie' => 'mazowieckie',
            'opolskie' => 'opolskie',
            'podkarpackie' => 'podkarpackie',
            'podlaskie' => 'podlaskie',
            'pomorskie' => 'pomorskie',
            'śląskie' => 'śląskie',
            'świętokrzyskie' => 'świętokrzyskie',
            'warmińsko-mazurskie' => 'warmińsko-mazurskie',
            'wielkopolskie' => 'wielkopolskie',
            'zachodniopomorskie' => 'zachodniopomorskie'
        );
        //share counties variable globally for all views                       
        View::share('countiesArray', $countiesArray);
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
