<?php
namespace App\Console\Commands;

use App\Models\Shop\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Str;

class StoreProductImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:store-product-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store product images in the media table';

    /**
     * Execute the console command.
     */
    public function handle2()
    {
        $productFolders = Storage::disk('public')->directories('products');
        foreach ($productFolders as $folder) {
            $files = Storage::disk('public')->files($folder);

            foreach ($files as $file) {
                $mimeType = Storage::disk('public')->mimeType($file);
                $size = Storage::disk('public')->size($file);
                $fileName = basename($file);
                $name = pathinfo($fileName, PATHINFO_FILENAME);
                $productInfo = explode('_', basename($folder));
                $productName = $productInfo[0];
                $productCode = $productInfo[1];

                $product =  $this->getProduct($productCode);
                if (!$product) {
                    $this->error('Product not found.');
                    return;
                }

//                dump($product);
//                $media = new Media();
//                $media->model_id = $product->id;
//                $media->model_type = Product::class;
//                $media->collection_name = 'product-images';
//                $media->name = $name;
//                $media->file_name = $fileName;
//                $media->mime_type = $mimeType;
//                $media->disk = 'public';
//                $media->size = $size;
//                $media->manipulations = json_encode([]);
//                $media->custom_properties = json_encode([]);
//                $media->generated_conversions = json_encode([]);
//                $media->responsive_images = json_encode([]);
//                $media->save();


//                // Create a folder using the media id
                $mediaFolder = storage_path('app/public/' . 76);
//                dump($mediaFolder);
//                if (!file_exists($mediaFolder)) {
                    dump('not exist');
//                    mkdir($mediaFolder, 0777, true);
//                }
//                dump('Exist');
//
//
                $newImagePath = $mediaFolder . '/' . basename($fileName);
//                dump($newImagePath);
//                dump("file:");
//                dump($file);
                dump($folder);
//                dump(Storage::disk('public'));

//                Storage::disk('public')->move($file, $newImagePath);

//                $this->info("Stored image for product: $productName");
            }
        }
    }

    public function handle()
    {
        // Get all product folders within 'products'
        $productFolders = Storage::disk('public')->directories('products');

        foreach ($productFolders as $folder) {
            // Retrieve all image files in each product directory
            $files = Storage::disk('public')->allFiles($folder);

            foreach ($files as $file) {
                $mimeType = Storage::disk('public')->mimeType($file);
                $size = Storage::disk('public')->size($file);
                $originalFileName = basename($file);
                $name = pathinfo($originalFileName, PATHINFO_FILENAME);

                $productInfo = explode('_', basename($folder));
                $productName = $productInfo[0];
                $productCode = $productInfo[1] ?? null;

                // Fetch product by SKU (assuming SKU is unique)
                $product = Product::where('sku', $productCode)->first();

                if (!$product) {
                    $this->error("Product not found for SKU: $productCode");
                    continue;
                }

                $media = new Media();
                $media->model_id = $product->id;
                $media->model_type = Product::class;
                $media->collection_name = 'product-images';
                $media->name = $name;
                $media->file_name = $originalFileName;
                $media->mime_type = $mimeType;
                $media->disk = 'public';
                $media->size = $size;
                $media->manipulations = json_encode([]);
                $media->custom_properties = json_encode([]);
                $media->generated_conversions = json_encode([]);
                $media->responsive_images = json_encode([]);
                $media->save();

                $mediaFolder = $media->id;

                $filename = Str::uuid() . '.jpg';

                $newImagePath = $mediaFolder . '/' . $originalFileName;

                Storage::disk('public')->move($file, $newImagePath);

                $this->info("Stored image for product: $productName in folder: $mediaFolder with filename: $originalFileName");
            }
        }

        $this->info("All images processed successfully.");
    }
    /**
     * Get the product ID based on the SKU (or code).
     *
     * @param string $sku
     * @return int|null
     */
    private function getProduct($sku)
    {
        $product = DB::table('shop_products')->where('sku', $sku)->first();
        return $product ? $product : null;
    }
}
