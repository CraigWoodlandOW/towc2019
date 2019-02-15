<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Vanilla2\Core\Services\Asset\Assets;
use Vanilla2\Core\Services\Asset\Javascript;
use Vanilla2\Core\Services\Asset\Stylesheet;

class CmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Assets $assets)
    {
        $assets = resolve(Assets::class);

        $assets->frontend()
            ->append((new Stylesheet)->priority(1)->src('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css')->sri('sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm'))
            ->append((new Stylesheet)->priority(2)->src(asset('css/base-override.css')))
            ->append((new Stylesheet)->priority(3)->src('https://use.fontawesome.com/releases/v5.5.0/css/all.css')->sri('sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU'))
            ->append((new Stylesheet)->priority(75)->src(asset('css/custom.css')));

        $assets->frontend()
            ->append((new Javascript)->priority(1)->src('https://code.jquery.com/jquery-3.3.1.min.js')->sri('sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8='))
            ->append((new Javascript)->priority(2)->src('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js')->sri('sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q'))
            ->append((new Javascript)->priority(3)->src('https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js')->sri('sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T'))
            ->append((new Javascript)->priority(4)->src('https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js')->sri('sha384-u/bQvRA/1bobcXlcEYpsEdFVK/vJs3+T+nXLsBYJthmdBuavHvAW6UsmqO2Gd/F9'))
            ->append((new Javascript)->priority(75)->src(asset('js/custom.js')));
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
