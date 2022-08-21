<?php

namespace Bo\SideBar;

use Bo\SideBar\App\Facades\SideBarFacade;
use Bo\SideBar\App\Group\Group;
use Bo\SideBar\App\Item\Item;
use Bo\SideBar\App\SideBar;
use Illuminate\Support\ServiceProvider;

class SideBarServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->app->singleton('dashboard_sidebar', function () {
            return new SideBar();
        });

        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('SideBarDashBoard', SideBarFacade::class);
    }
}
