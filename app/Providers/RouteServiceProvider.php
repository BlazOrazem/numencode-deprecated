<?php

namespace Numencode\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the admin controller routes.
     *
     * @var string
     */
    protected $adminNamespace = 'Admin\Http';

    /**
     * This namespace is applied to the cms controller routes.
     *
     * @var string
     */
    protected $cmsNamespace = 'Cms\Http';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapPublicRoutes();

        $this->mapAuthRoutes();
    }

    /**
     * Define the "public" routes for the application.
     *
     * @return void
     */
    protected function mapPublicRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->cmsNamespace,
        ], function ($router) {
            require base_path('routes/public.php');
        });
    }

    /**
     * Define the "guest" routes for the application.
     *
     * @return void
     */
    protected function mapAuthRoutes()
    {
        Route::group([
            'middleware' => ['web', 'isGuest'],
            'namespace' => $this->cmsNamespace,
        ], function ($router) {
            require base_path('routes/auth.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace' => $this->cmsNamespace,
            'prefix' => 'api',
        ], function ($router) {
            require base_path('routes/api.php');
        });
    }
}
