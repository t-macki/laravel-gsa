<?php

namespace Macki\Facades;

use Illuminate\Support\Facades\Facade;

use Macki\GoogleSheetsApiClient;

class GoogleSheetsApi extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return GoogleSheetsApiClient::class;
    }
}
