<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();
        Broadcast::routes(['middleware' => 'auth:admin']);
        Broadcast::channel('users2', function ($message) {
            return $message;
        });
        require base_path('routes/channels.php');
    }
}
