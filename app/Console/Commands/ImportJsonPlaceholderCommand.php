<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;

class ImportJsonPlaceholderCommand extends Command
{

    protected $signature = 'import:jsonplaceholder';


    protected $description = 'Get data from json placeholder';



    public function handle()
    {
        $import = new ImportDataClient();
        $responce = $import->client->request('GET','posts');
        dd(json_decode($responce->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR));
    }
}
