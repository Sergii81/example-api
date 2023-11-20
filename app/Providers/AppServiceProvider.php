<?php

namespace App\Providers;

use App\Interfaces\Repositories\DomainRepositoryInterface;
use App\Interfaces\Repositories\LanguageRepositoryInterface;
use App\Interfaces\Repositories\PwaRepositoryInterface;
use App\Interfaces\Repositories\ReviewRepositoryInterface;
use App\Interfaces\Repositories\SettingRepositoryInterface;
use App\Interfaces\Repositories\TemplateRepositoryInterface;
use App\Interfaces\Repositories\TotalLogRepositoryInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Interfaces\Repositories\WhitepageRepositoryInterface;
use App\Interfaces\Services\CloudflareApiServiceInterface;
use App\Interfaces\Services\OnesignalCreateAppApiServiceInterface;
use App\Interfaces\Services\PwaApiServiceInterface;
use App\Repositories\DomainRepository;
use App\Repositories\LanguageRepository;
use App\Repositories\PwaRepository;
use App\Repositories\ReviewRepository;
use App\Repositories\SettingRepository;
use App\Repositories\TemplateRepository;
use App\Repositories\TotalLogRepository;
use App\Repositories\UserRepository;
use App\Repositories\WhitepageRepository;
use App\Services\CloudflareApiService;
use App\Services\OnesignalCreateAppApiService;
use App\Services\PwaApiService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->registerRepositories();
        $this->registerServices();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    public function registerRepositories(): void
    {
        $this->app->bind(DomainRepositoryInterface::class, DomainRepository::class);
        $this->app->bind(TotalLogRepositoryInterface::class, TotalLogRepository::class);
        $this->app->bind(PwaRepositoryInterface::class, PwaRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
        $this->app->bind(WhitepageRepositoryInterface::class, WhitepageRepository::class);
        $this->app->bind(TemplateRepositoryInterface::class, TemplateRepository::class);
        $this->app->bind(LanguageRepositoryInterface::class, LanguageRepository::class);
        $this->app->bind(ReviewRepositoryInterface::class, ReviewRepository::class);
    }

    public function registerServices(): void
    {
        $this->app->bind(OnesignalCreateAppApiServiceInterface::class, OnesignalCreateAppApiService::class);
        $this->app->bind(PwaApiServiceInterface::class, PwaApiService::class);
        $this->app->bind(CloudflareApiServiceInterface::class, CloudflareApiService::class);
    }
}
