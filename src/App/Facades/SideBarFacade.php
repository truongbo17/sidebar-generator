<?php

namespace Bo\SideBar\App\Facades;

use Illuminate\Support\Facades\Facade;

class SideBarFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'dashboard_sidebar';
    }
}
