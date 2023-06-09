<?php

namespace App\Providers;

use App\Models\Setting;
use Jenssegers\Agent\Agent;
use Intervention\Image\Facades\Image;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        if(strpos(\URL::full(),'amazonaws.com') !== false){
            \URL::forceScheme('https');
        }
        
        Validator::extend('base64image', function ($attribute, $value, $parameters, $validator) {
            try {
                $image = Image::make($value);
                $size = strlen(base64_decode($value));
                $size_kb = $size / 1024;
                return $size_kb <= $parameters[0];
            } catch (\Exception $e) {
                return false;
            }
        });

        Validator::replacer('base64image', function($message, $attribute, $rule, $parameters) {
            $base64image = $parameters[0];

            return str_replace(':base64image', $base64image, $message);
        });

        view()->share('settings', Setting::all());
        view()->share('agent', new Agent());
    }
}
