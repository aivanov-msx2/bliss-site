<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Illuminate\Http\Request;
use Laravel\Nova\Menu\Menu;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\NovaApplicationServiceProvider;
use app\Nova\BottleSize;
use app\Nova\Country;
use app\Nova\Grape;
use app\Nova\Hero;
use app\Nova\PackSize;
use app\Nova\PriceType;
use app\Nova\Region;
use app\Nova\User;
use app\Nova\Warehouse;
use app\Nova\Wine;
use app\Nova\Winery;
use app\Nova\WineryPhoto;
use app\Nova\WineType;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        
        Nova::mainMenu(function (Request $request) {
            return [
                MenuSection::make('Bliss Wine Imports', [
                    MenuItem::externalLink('Home', '/'),
                    MenuItem::externalLink('Admin', '/admin'),
                ])->icon('home'),

                MenuSection::make('Manage Content', [
                    MenuItem::resource(BottleSize::class),
                    MenuItem::resource(Country::class),
                    MenuItem::resource(Grape::class),
                    MenuItem::resource(Hero::class),
                    MenuItem::resource(PackSize::class),
                    MenuItem::resource(PriceType::class),
                    MenuItem::resource(Region::class),
                    MenuItem::resource(Warehouse::class),
                    MenuItem::resource(Wine::class),
                    MenuItem::resource(Winery::class),
                    MenuItem::resource(WineryPhoto::class),
                    MenuItem::resource(WineType::class),
                    MenuItem::resource(User::class),
                ])->icon('document-text')->collapsable(),
            ];
        });
   
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                'eringeyer@gmail.com',
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
