<?php

namespace App\Providers;

use App\Models\Induk;
use App\Models\Unit;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::composer('*', function ($view) {
            $role = session('role');
            $user = session('user');
            $users = null;
    
            if ($role == 2) {
                $users = Unit::where('user_id', $user)->first();
            }elseif($role == 3){
                $users = Induk::where('user_id', $user)->first();
            }
    
            $view->with('users', $users);
        });
    }
}
