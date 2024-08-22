<?php

namespace Modules\CompanyReviews\Providers;

use App;
use Illuminate\Support\ServiceProvider;

class CompanyReviewsServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'CompanyReviews';

    public function boot(): void
    {
        $this->mergeConfigFrom(
            module_path('CompanyReviews', 'config/settings.php'),
            'settings'
        );
        $this->loadMigrations();
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'company-reviews');
    }

    public function register(): void
    {
    }

    private function loadMigrations(): void
    {
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Migrations'));
    }
}
