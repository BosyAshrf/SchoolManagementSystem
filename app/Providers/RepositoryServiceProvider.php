<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repository\TeacherRepositoryInterface',
            'App\Repository\TeacherRepository');

        $this->app->bind(
            'App\Repository\StudentRepositoryInterface',
            'App\Repository\StudentRepository');

        $this->app->bind(
            'App\Repository\StudentPromotionRepositoryInterface',
            'App\Repository\StudentPromotionRepository');

        $this->app->bind(
            'App\Repository\StudentGratuatedRepositoryInterface',
            'App\Repository\StudentGratuatedRepository');

        $this->app->bind(
            'App\Repository\FeesRepositoryInterface',
            'App\Repository\FeesRepository'); 

        $this->app->bind(
            'App\Repository\FeesinvoicesRepositryInterface',
            'App\Repository\FeesinvoicesRepository'); 

        $this->app->bind(
            'App\Repository\ReceiptStudentsRepositoryInterface',
            'App\Repository\ReceiptStudentsRepository'); 

        $this->app->bind(
            'App\Repository\ProcessingFeesRepositoryInterface',
            'App\Repository\ProcessingFeesRepository'); 

        $this->app->bind(
            'App\Repository\PaymentsRepositryInterface',
            'App\Repository\PaymentsRepositry'); 
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
