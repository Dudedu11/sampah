<?php

namespace App\Providers;

use App\Models\Unit;
use App\Models\Induk;
use App\Models\Industri;
use App\Models\Role;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
            $role = session('role');
            $user = session('user');
            $users = null;
            $nama = "Bank Sampah";
            if ($role == 1) {
                $nama = "Forum Bank Jabar";
            } elseif ($role == 2) {
                $users = Unit::where('user_id', $user)->first();
                $nama = "Bank Sampah Unit";
            } elseif ($role == 3) {
                $users = Induk::where('user_id', $user)->first();
                $nama = "Bank Sampah Induk";
            } elseif ($role == 4) {
                $users = Industri::where('user_id', $user)->first();
                $nama = "Industri";
            }

            $view->with([
                'users' => $users,
                'nama' => $nama
            ]);
        });
    }
}
