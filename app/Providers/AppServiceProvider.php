<?php

namespace App\Providers;

use App\Payment\PaymentMethod;
use App\Payment\PaymentMethodCC;
use App\Payment\PaymentMethodSA;
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
        //contoh bind => akan buat object baru, menggunakan objek yang berbeda
        // $this->app->bind(PaymentMethod::class, function($app){
        //         return new PaymentMethod('SA');
        // });

         //contoh singleton => hanya membuat satu objet ( contoh untuk perubahan variable)
         // menggunakan objek yang sama
    //    $this->app->singleton(PaymentMethod::class, function($app){
    //             return new PaymentMethod('SA');
    //     });

            /**
             * example to change interface
             */

             $this->app->singleton(PaymentMethod::class, function($app){
                          //return new PaymentMethodCC();
                          //contoh http://127.0.0.1:8000/depedency?input_method=CC
                          if(request()->input_method == "CC")
                          {
                            return new PaymentMethodCC();
                          } else {
                            return new PaymentMethodSA();
                          }
            });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
