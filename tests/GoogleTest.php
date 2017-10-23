<?php

namespace Macki\tests;

use Macki\GoogleSheetsApiClient;
use PHPUnit\Framework\TestCase;

class GoogleTest extends TestCase
{
    protected $google;

    public function setUp()
    {
        parent::setUp();
    }

    public function testRun()
    {
        $sheetId = '1782GstMKjRjZ61Saq9EtTYaTia0Jx4FbgKKkiqhDALU';

        $client = new \Google_Client();
        $client->setApplicationName('test');
        $client->setScopes(\Google_Service_Sheets::SPREADSHEETS);
        $client->setAuthConfig(__DIR__ . '/client_secret.json');
        $client->setAccessType('online');

        //$service = new \Google_Service_Sheets($client);

        $google = new GoogleSheetsApiClient($client);
        $service = $google->getService();

        $response = $service->spreadsheets_values->get($sheetId, 'シート1!A1:D5');
        foreach ($response->getValues() as $index => $cols) {
            echo sprintf('#%d >> "%s"', $index + 1, implode('", "', $cols)) . PHP_EOL;
        }


//        $value = new \Google_Service_Sheets_ValueRange();
//        $value->setValues(['values' => ['ccccc', 'eeee']]);
//        $response = $service->spreadsheets_values->update($sheetId, 'シート1!B3', $value,
//            ['valueInputOption' => 'USER_ENTERED']);
    }
}