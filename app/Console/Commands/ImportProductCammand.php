<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;

class ImportProductCammand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-product {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports products from an Excel file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $file = $this->argument('file');

        if (!file_exists($file)) {
            $this->error('File not found.');
            return;
        }

        try {
            Excel::import(new ProductImport, $file);
            $this->info('Products imported successfully.');
        } catch (\Exception $e) {
            $this->error('Error importing file: ' . $e->getMessage());
        }
    }
}
