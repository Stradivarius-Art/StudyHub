<?php

namespace App\Providers;

use App\Actions\CertificateAction;
use App\Actions\PaymentAction;
use App\Contracts\AuthInterface;
use App\Contracts\CertificateInterface;
use App\Contracts\CourseInterface;
use App\Contracts\OrderInterface;
use App\Contracts\PaymentInterface;
use App\Services\AuthService;
use App\Services\CourseService;
use App\Services\OrderService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthInterface::class, AuthService::class);
        $this->app->bind(CourseInterface::class, CourseService::class);
        $this->app->bind(OrderInterface::class, OrderService::class);
        $this->app->bind(PaymentInterface::class, PaymentAction::class);
        $this->app->bind(CertificateInterface::class, CertificateAction::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}