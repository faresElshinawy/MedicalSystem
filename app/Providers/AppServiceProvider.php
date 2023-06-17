<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use stdClass;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            Setting::get();
        } catch (\Illuminate\Database\QueryException $e) {
            abort(503);
        }
        $settings = Setting::get();
        $results = new stdClass;
        foreach($settings as $setting)
        {
            $results->{$setting->name} = $setting->value;
        }
        View::share('settings',$results);
    }
}
