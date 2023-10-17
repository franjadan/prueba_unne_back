<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Vincula las interfaces de los repositorios con sus implementaciones concretas en el contenedor de servicios de Laravel.
        // Esto permite que Laravel resuelva automáticamente las dependencias cuando se soliciten estas interfaces en otros lugares del código.

        $this->app->bind(
            'App\Repositories\v1\Study\StudyRepositoryInterface',
            'App\Repositories\v1\Study\StudyRepository'
        );

        $this->app->bind(
            'App\Repositories\v1\Subject\SubjectRepositoryInterface',
            'App\Repositories\v1\Subject\SubjectRepository'
        );

        $this->app->bind(
            'App\Repositories\v1\Teacher\TeacherRepositoryInterface',
            'App\Repositories\v1\Teacher\TeacherRepository'
        );

        $this->app->bind(
            'App\Repositories\v1\SubjectTeacher\SubjectTeacherRepositoryInterface',
            'App\Repositories\v1\SubjectTeacher\SubjectTeacherRepository'
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
