<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Shop\Product;
use App\Models\Shop\Category;
use App\Models\Shop\Brand;
use App\Models\Blog\Post;
use Carbon\Carbon;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate XML sitemap for the website';

    public function handle()
    {
        $this->info('Generating sitemap...');

        $sitemap = Sitemap::create();

        // Add static pages
        $this->addStaticPages($sitemap);

        // Add dynamic pages
        $this->addProducts($sitemap);
        $this->addCategories($sitemap);
        $this->addBrands($sitemap);
        $this->addBlogPosts($sitemap);

        // Save sitemap
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully at public/sitemap.xml');
    }

    private function addStaticPages(Sitemap $sitemap)
    {
        $staticPages = [
            ['url' => route('index'), 'priority' => 1.0, 'changefreq' => 'daily'],
            ['url' => route('products.index'), 'priority' => 0.9, 'changefreq' => 'daily'],
            ['url' => route('shop.index'), 'priority' => 0.9, 'changefreq' => 'daily'],
            ['url' => route('shop.muster'), 'priority' => 0.8, 'changefreq' => 'weekly'],
            ['url' => route('shop.dikson'), 'priority' => 0.8, 'changefreq' => 'weekly'],
            ['url' => route('about_us'), 'priority' => 0.7, 'changefreq' => 'monthly'],
            ['url' => route('contact'), 'priority' => 0.6, 'changefreq' => 'monthly'],
            ['url' => route('ourbrands'), 'priority' => 0.8, 'changefreq' => 'weekly'],
            ['url' => route('hairstyle'), 'priority' => 0.7, 'changefreq' => 'weekly'],
            ['url' => route('beauty'), 'priority' => 0.7, 'changefreq' => 'weekly'],
            ['url' => route('blog'), 'priority' => 0.8, 'changefreq' => 'daily'],
        ];

        foreach ($staticPages as $page) {
            $sitemap->add(
                Url::create($page['url'])
                    ->setLastModificationDate(Carbon::now())
                    ->setChangeFrequency($page['changefreq'])
                    ->setPriority($page['priority'])
            );
        }

        $this->info('Added static pages to sitemap');
    }

    private function addProducts(Sitemap $sitemap)
    {
        $products = Product::where('is_visible', true)
            ->where('published_at', '<=', now())
            ->get();

        foreach ($products as $product) {
            $sitemap->add(
                Url::create(route('products.show', $product->id))
                    ->setLastModificationDate($product->updated_at)
                    ->setChangeFrequency('weekly')
                    ->setPriority(0.8)
            );
        }

        $this->info("Added {$products->count()} products to sitemap");
    }

    private function addCategories(Sitemap $sitemap)
    {
        $categories = Category::where('is_visible', true)->get();

        foreach ($categories as $category) {
            $sitemap->add(
                Url::create(route('categories.show', $category->id))
                    ->setLastModificationDate($category->updated_at)
                    ->setChangeFrequency('weekly')
                    ->setPriority(0.7)
            );
        }

        $this->info("Added {$categories->count()} categories to sitemap");
    }

    private function addBrands(Sitemap $sitemap)
    {
        $brands = Brand::where('is_visible', true)->get();

        foreach ($brands as $brand) {
            // Add brand-specific routes if they exist
            if ($brand->slug === 'dikson') {
                $sitemap->add(
                    Url::create(route('brand.dikson'))
                        ->setLastModificationDate($brand->updated_at)
                        ->setChangeFrequency('weekly')
                        ->setPriority(0.7)
                );
            } elseif ($brand->slug === 'electric') {
                $sitemap->add(
                    Url::create(route('brand.electric'))
                        ->setLastModificationDate($brand->updated_at)
                        ->setChangeFrequency('weekly')
                        ->setPriority(0.7)
                );
            } elseif ($brand->slug === 'benexere') {
                $sitemap->add(
                    Url::create(route('brand.benexere'))
                        ->setLastModificationDate($brand->updated_at)
                        ->setChangeFrequency('weekly')
                        ->setPriority(0.7)
                );
            }
        }

        $this->info("Added {$brands->count()} brands to sitemap");
    }

    private function addBlogPosts(Sitemap $sitemap)
    {
        $posts = Post::where('published_at', '<=', now())
            ->whereNotNull('published_at')
            ->get();

        foreach ($posts as $post) {
            $sitemap->add(
                Url::create(route('posts.show', $post->id))
                    ->setLastModificationDate($post->updated_at)
                    ->setChangeFrequency('monthly')
                    ->setPriority(0.6)
            );
        }

        $this->info("Added {$posts->count()} blog posts to sitemap");
    }
}
