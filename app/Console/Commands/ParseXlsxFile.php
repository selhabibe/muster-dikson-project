<?php

namespace App\Console\Commands;

use App\Services\XlsxParserService;
use Illuminate\Console\Command;

class ParseXlsxFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:xlsx';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse an XLSX file and fetch titles from URLs';

    protected $parserService;

    public function __construct(XlsxParserService $parserService)
    {
        parent::__construct();
        $this->parserService = $parserService;
    }


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filePath = 'C:\Users\ASUS\OneDrive\Bureau\projet\DYNAMIQUE git\m-d-project\muster-dikson-project\public\dikson_products_list1.xlsx';

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
