<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        \DB::listen(function ($query) {
            \Log::info($query->sql);
            \Log::info($query->bindings);
        });

        $this->app->singleton("fake_students",function(){
            $faker=app(\Faker\Generator::class);

            return collect()->times(100)->map(function() use($faker){
                return [
                    "reg_no"=>$faker->bothify("16/U/####").collect(['','/PS','/EVE'])->random(),
                    "student_name"=>$faker->name,
                ];
            });
        });
    }

    /**
     * Register any application services.
     */
    public function register()
    {
    }
}
