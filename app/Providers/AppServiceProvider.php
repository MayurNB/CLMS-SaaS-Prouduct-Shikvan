<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <--- ADD THIS LINE
use Illuminate\Support\Facades\App; // <--- ADD THIS LINE (Good for checking environment)

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
        // <--- ADD CODE HERE
        // This checks if the application is running in a non-local environment (i.e., production/staging).
        // Since Cloud Run is production, this condition is met.
        if (App::environment(['production', 'staging', 'testing'])) {
            // This forces Laravel's URL generator (which the asset() helper uses) to always
            // generate links with the 'https' scheme, solving the mixed-content error.
            URL::forceScheme('https');
        }
        // <--- END OF ADDED CODE
    }
}