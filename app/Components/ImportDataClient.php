<?php
declare(strict_types=1);

namespace App\Components;


use GuzzleHttp\Client;

class ImportDataClient
{
    public $client;

    /**
     * @param $client
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com/',
            'timeout' => 2.0,
            'verify' => false,
        ]);
    }
}
