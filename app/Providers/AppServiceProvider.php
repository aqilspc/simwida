<?php

namespace App\Providers;

use \Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
//=====Kampus=====\\
use App\Http\Repo\Kampus\KampusRepository;
use App\Http\Repo\Kampus\KampusQuery;
//=====Jurusan=====\\
use App\Http\Repo\Jurusan\JurusanRepository;
use App\Http\Repo\Jurusan\JurusanQuery;
//=====Prodi=====\\
use App\Http\Repo\Prodi\ProdiRepository;
use App\Http\Repo\Prodi\ProdiQuery;
//=====Jadwal=====\\
use App\Http\Repo\Jadwal\JadwalRepository;
use App\Http\Repo\Jadwal\JadwalQuery;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       $this->app->bind(KampusRepository::class, KampusQuery::class);
       $this->app->bind(JurusanRepository::class, JurusanQuery::class);
       $this->app->bind(ProdiRepository::class, ProdiQuery::class);
       $this->app->bind(JadwalRepository::class, JadwalQuery::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
