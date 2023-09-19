<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\Kampus\KampusRepository;
use App\Repo\Kampus\KampusQueryRepository;
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(KampusRepository::class, KampusQueryRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
