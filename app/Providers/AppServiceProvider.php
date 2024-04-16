<?php

namespace App\Providers;

use App\Repositories\ExerciceRepository;
use App\Repositories\ExerciceRepositoryInterface;
use App\Repositories\SessionRepository;
use App\Repositories\SessionRepositoryInterface;
use App\Repositories\SkillRepository;
use App\Repositories\SkillRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            ExerciceRepositoryInterface::class,
            ExerciceRepository::class,
        );
        $this->app->bind(
            SessionRepositoryInterface::class,
            SessionRepository::class,
        );
        $this->app->bind(
            SkillRepositoryInterface::class,
            SkillRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
