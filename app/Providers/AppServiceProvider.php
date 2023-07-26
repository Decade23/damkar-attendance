<?php

namespace App\Providers;

use App\Services\Dashboard\DashboardService;
use App\Services\Dashboard\DashboardServiceContract;
use App\Services\Province\ProvinceService;
use App\Services\Province\ProvinceServiceContract;
use App\Services\Subdistrict\SubdistrictService;
use App\Services\Subdistrict\SubdistrictServiceContract;
use App\Services\Category\CategoryService;
use App\Services\Category\CategoryServiceContract;
use App\Services\Posts\PostsService;
use App\Services\Posts\PostsServiceContract;
use App\Services\Media\MediaService;
use App\Services\Media\MediaServiceContract;
use App\Services\Group\GroupService;
use App\Services\Group\GroupServiceContract;
use App\Services\Register\RegisterService;
use App\Services\Register\RegisterServiceContract;
use App\Services\Login\LoginService;
use App\Services\Login\LoginServiceContract;
use App\Services\ChangePassword\ChangePasswordService;
use App\Services\ChangePassword\ChangePasswordServiceContract;
use App\Services\Account\AccountService;
use App\Services\Account\AccountServiceContract;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Services\Shortlink\ShortlinkService;
use App\Services\Shortlink\ShortlinkServiceContract;
use App\Services\Throttle\ThrottleService;
use App\Services\Throttle\ThrottleServiceContract;

#palembang-kito
use App\Services\PalembangKito\Advertisement\AdvertisementService;
use App\Services\PalembangKito\Advertisement\AdvertisementServiceContract;
use App\Services\PalembangKito\AdvertisementCustomer\AdvertisementCustomerService;
use App\Services\PalembangKito\AdvertisementCustomer\AdvertisementCustomerServiceContract;

#damkar
use App\Services\Damkar\Picket\PicketService;
use App\Services\Damkar\Picket\PicketServiceContract;

use App\Services\Damkar\Report\ReportService;
use App\Services\Damkar\Report\ReportServiceContract;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        date_default_timezone_set('Asia/Bangkok');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProvinceServiceContract::class,
            ProvinceService::class
        );

        $this->app->bind(
            SubdistrictServiceContract::class,
            SubdistrictService::class
        );

        $this->app->bind(
            DashboardServiceContract::class,
            DashboardService::class
        );

        $this->app->bind(
            CategoryServiceContract::class,
            CategoryService::class
        );

        $this->app->bind(
            MediaServiceContract::class,
            MediaService::class
        );

        $this->app->bind(
            PostsServiceContract::class,
            PostsService::class
        );

        $this->app->bind(
            GroupServiceContract::class,
            GroupService::class
        );

        $this->app->bind(
            RegisterServiceContract::class,
            RegisterService::class
        );

        $this->app->bind(
            LoginServiceContract::class,
            LoginService::class
        );

        $this->app->bind(
            ChangePasswordServiceContract::class,
            ChangePasswordService::class
        );

        $this->app->bind(
            AccountServiceContract::class,
            AccountService::class
        );

        $this->app->bind(
            ShortlinkServiceContract::class,
            ShortlinkService::class
        );

        $this->app->bind(
            ThrottleServiceContract::class,
            ThrottleService::class
        );

        #damkar
        $this->app->bind(
            PicketServiceContract::class,
            PicketService::class
        );

        $this->app->bind(
            ReportServiceContract::class,
            ReportService::class
        );

    }
}
