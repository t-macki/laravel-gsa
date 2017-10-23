<?php
namespace Macki\Factory;

use Macki\GoogleSheetsApiClient;

class GoogleSheetApiFactory
{
    /**
     * @param array $config
     * @return GoogleSheetsApiClient
     */
    public static function createForConfig(array $config): GoogleSheetsApiClient
    {
        $client = new \Google_Client();
        $client->setApplicationName($config['application_name']);
        $client->setScopes(\Google_Service_Sheets::SPREADSHEETS_READONLY);
        $client->setAuthConfig($config['secret_path']);
        $client->setAccessType($config['access_type']);

        return new GoogleSheetsApiClient($client);
    }
}
