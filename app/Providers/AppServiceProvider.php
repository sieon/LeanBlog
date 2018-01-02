<?php

namespace App\Providers;

use App\Observers\UserObserver;
use App\Observers\PostObserver;
use App\Models\User;
use App\Models\Post;

use Illuminate\Support\ServiceProvider;

use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		    User::observe(UserObserver::class);
		    Post::observe(PostObserver::class);

        Carbon::setLocale('zh');
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
