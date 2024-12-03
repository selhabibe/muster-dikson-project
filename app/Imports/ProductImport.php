<?php

namespace App\Imports;

use App\Models\Shop\Product;
use App\Services\TranslationService;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Storage;

class ProductImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {

        $folderName = $row['name'] . '_' . $row['sku'];
        $folderPath = 'products/' . $folderName;

        if (!Storage::disk('public')->exists($folderPath)) {
            Storage::disk('public')->makeDirectory($folderPath);
        }

        $slug = $row['slug'];
        $counter = 1;

        while (Product::where('slug', $slug)->exists()) {
            $slug = $row['slug'] . '-' . $counter;
            $counter++;
        }

        $descriptionTranslated = $this->updateDescription($row['description']);


       return  new Product([
            'shop_brand_id' => $row['shop_brand_id'],
            'name' => $row['name'],
            'slug' => $slug,
            'sku' => $row['sku'],
            'barcode' => $row['barcode'],
            'description' => $descriptionTranslated,
            'qty' => $row['qty'],
            'security_stock' => $row['security_stock'],
            'featured' => $row['featured'],
            'is_visible' => $row['is_visible'],
            'old_price' => $row['old_price'],
            'price' => $row['price'],
            'cost' => $row['cost'],
            'type' => $row['type'],
            'backorder' => $row['backorder'],
            'requires_shipping' => $row['requires_shipping'],
            'published_at' => $row['published_at'],
            'seo_title' => $row['seo_title'],
            'seo_description' => $row['seo_description'],
            'weight_value' => $row['weight_value'],
            'weight_unit' => $row['weight_unit'],
            'height_value' => $row['height_value'],
            'height_unit' => $row['height_unit'],
            'width_value' => $row['width_value'],
            'width_unit' => $row['width_unit'],
            'depth_value' => $row['depth_value'],
            'depth_unit' => $row['depth_unit'],
            'volume_value' => $row['volume_value'],
            'volume_unit' => $row['volume_unit'],
        ]);
    }

    public function updateDescription($description)
    {
        $translationService = new TranslationService();
        try {
            $translatedDescription = $translationService->translate($description);
            dd($translatedDescription);
            return $translatedDescription;
        } catch (\Exception $e) {
            return 'Translation failed: ' . $e->getMessage();
        }
    }

}
