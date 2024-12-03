<?php

namespace App\Console\Commands;

use App\Services\XlsxParserService;
use Illuminate\Console\Command;

class ParseXlsxFile extends Command
{
    protected $signature = 'parse:product-list';

    protected $description = 'Parse an XLSX file and fetch titles from URLs';

    protected $parserService;

    public function __construct(XlsxParserService $parserService)
    {
        parent::__construct();
        $this->parserService = $parserService;
    }

    public function handle()
    {
        $year = date('Y');
        $month = date('m');

        $filePath = public_path("dikson_products_list4_{$year}_{$month}.xlsx");

        $this->info("Parsing file at: $filePath");
        $results = $this->parserService->parseXlsxFile($filePath);

        foreach ($results as $result) {
            $this->info("Photo: {$result['photo']}");
            $this->info("Drive URL: {$result['url_drive']}");
            $this->info("Muster&Dikson URL: {$result['url_muster_dikson']}");
            $this->info("Title: {$result['title']}");
            $this->info("Desc: {$result['desc']}");
            $this->info("-----------------------------");
        }

        $this->info('Parsing complete!');
    }

}
