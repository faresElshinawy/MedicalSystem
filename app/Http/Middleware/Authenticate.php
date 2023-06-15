<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if(!$request->expectsJson())
        {
            if(Route::is('admin.*'))
            {
                return redirect()->route('admin.login');
            }elseif(Route::is('doctor.*'))
            {
                return redirect()->route('doctor.login');
            }
            return route('login');
        }
        // return $request->expectsJson() ? null : route('login');
    }
}
