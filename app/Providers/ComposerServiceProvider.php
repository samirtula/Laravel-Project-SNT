<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\MainMessage;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.app', function($view) {
            $message = new MainMessage();
            $view->with(['meeting' => $message
                ->where('type', 'Общее собрание')
                ->orderBy('created_at', 'desc')
                ->first()]);
        });

    }
}
