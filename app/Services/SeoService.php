<?php

namespace App\Services;

use App\Models\Shop\Product;
use App\Models\Shop\Category;
use App\Models\Shop\Brand;
use App\Models\Blog\Post;
use Illuminate\Support\Str;

class SeoService
{
    /**
     * Generate SEO meta tags for a given model
     */
    public function generateMetaTags($model, array $defaults = []): array
    {
        $title = $this->getTitle($model, $defaults['title'] ?? null);
        $description = $this->getDescription($model, $defaults['description'] ?? null);
        $canonical = $this->getCanonicalUrl($model);
        $image = $this->getImage($model);

        return [
            'title' => $title,
            'description' => $description,
            'canonical' => $canonical,
            'image' => $image,
            'keywords' => $this->getKeywords($model),
            'type' => $this->getType($model),
        ];
    }

    /**
     * Get optimized title for SEO
     */
    private function getTitle($model, ?string $default = null): string
    {
        if (isset($model->seo_title) && !empty($model->seo_title)) {
            return $model->seo_title . ' - Muster & Dikson';
        }

        if (isset($model->title) && !empty($model->title)) {
            return $model->title . ' - Muster & Dikson';
        }

        if (isset($model->name) && !empty($model->name)) {
            return $model->name . ' - Muster & Dikson';
        }

        return $default ?? 'Muster & Dikson - Produits Professionnels de Coiffure et Beauté';
    }

    /**
     * Get optimized description for SEO
     */
    private function getDescription($model, ?string $default = null): string
    {
        if (isset($model->seo_description) && !empty($model->seo_description)) {
            return $model->seo_description;
        }

        if (isset($model->description) && !empty($model->description)) {
            return Str::limit(strip_tags($model->description), 160);
        }

        if (isset($model->content) && !empty($model->content)) {
            return Str::limit(strip_tags($model->content), 160);
        }

        return $default ?? 'Découvrez les produits professionnels Muster & Dikson pour coiffeurs et esthéticiennes. Qualité et innovation depuis 1965.';
    }

    /**
     * Get canonical URL for the model
     */
    private function getCanonicalUrl($model): string
    {
        if ($model instanceof Product) {
            return route('products.show', $model->id);
        }

        if ($model instanceof Category) {
            return route('categories.show', $model->id);
        }

        if ($model instanceof Post) {
            return route('posts.show', $model->id);
        }

        return url()->current();
    }

    /**
     * Get image for social media sharing
     */
    private function getImage($model): ?string
    {
        if ($model instanceof Product && $model->getFirstMediaUrl('product-images')) {
            return $model->getFirstMediaUrl('product-images');
        }

        if ($model instanceof Post && isset($model->image)) {
            return asset('storage/' . $model->image);
        }

        // Default social media image
        return asset('images/front/social-share-default.jpg');
    }

    /**
     * Get keywords for the model
     */
    private function getKeywords($model): string
    {
        $keywords = ['Muster', 'Dikson', 'coiffure professionnelle', 'produits capillaires', 'beauté'];

        if ($model instanceof Product) {
            $keywords[] = $model->name;
            if ($model->brand) {
                $keywords[] = $model->brand->name;
            }
            foreach ($model->categories as $category) {
                $keywords[] = $category->name;
            }
        }

        if ($model instanceof Category) {
            $keywords[] = $model->name;
        }

        if ($model instanceof Brand) {
            $keywords[] = $model->name;
        }

        if ($model instanceof Post) {
            $keywords[] = 'blog beauté';
            if ($model->tags) {
                foreach ($model->tags as $tag) {
                    $keywords[] = $tag->name;
                }
            }
        }

        return implode(', ', array_unique($keywords));
    }

    /**
     * Get Open Graph type
     */
    private function getType($model): string
    {
        if ($model instanceof Product) {
            return 'product';
        }

        if ($model instanceof Post) {
            return 'article';
        }

        return 'website';
    }

    /**
     * Generate structured data (JSON-LD) for the model
     */
    public function generateStructuredData($model): array
    {
        if ($model instanceof Product) {
            return $this->generateProductStructuredData($model);
        }

        if ($model instanceof Post) {
            return $this->generateArticleStructuredData($model);
        }

        return $this->generateOrganizationStructuredData();
    }

    /**
     * Generate product structured data
     */
    private function generateProductStructuredData(Product $model): array
    {
        $data = [
            '@context' => 'https://schema.org/',
            '@type' => 'Product',
            'name' => $model->name,
            'description' => strip_tags($model->description ?? ''),
            'brand' => [
                '@type' => 'Brand',
                'name' => $model->brand->name ?? 'Muster & Dikson'
            ],
            'manufacturer' => [
                '@type' => 'Organization',
                'name' => 'Muster & Dikson'
            ]
        ];

        if ($model->getFirstMediaUrl('product-images')) {
            $data['image'] = $model->getFirstMediaUrl('product-images');
        }

        if ($model->sku) {
            $data['sku'] = $model->sku;
        }

        return $data;
    }

    /**
     * Generate article structured data
     */
    private function generateArticleStructuredData(Post $model): array
    {
        return [
            '@context' => 'https://schema.org/',
            '@type' => 'Article',
            'headline' => $model->title,
            'description' => Str::limit(strip_tags($model->content), 160),
            'author' => [
                '@type' => 'Person',
                'name' => $model->author->name ?? 'Muster & Dikson'
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Muster & Dikson',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('images/logo/M_D_Logo_white_font.png')
                ]
            ],
            'datePublished' => $model->published_at?->toIso8601String(),
            'dateModified' => $model->updated_at->toIso8601String(),
            'image' => $model->image ? asset('storage/' . $model->image) : asset('images/front/social-share-default.jpg')
        ];
    }

    /**
     * Generate organization structured data
     */
    private function generateOrganizationStructuredData(): array
    {
        return [
            '@context' => 'https://schema.org/',
            '@type' => 'Organization',
            'name' => 'Muster & Dikson',
            'description' => 'Distributeur de produits professionnels de coiffure et beauté au Maroc depuis 1965',
            'url' => url('/'),
            'logo' => asset('images/logo/M_D_Logo_white_font.png'),
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'contactType' => 'customer service',
                'availableLanguage' => 'French'
            ]
        ];
    }

    /**
     * Generate breadcrumb structured data
     */
    public function generateBreadcrumbStructuredData(array $breadcrumbs): array
    {
        $items = [];
        
        foreach ($breadcrumbs as $index => $breadcrumb) {
            $items[] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $breadcrumb['name'],
                'item' => $breadcrumb['url']
            ];
        }

        return [
            '@context' => 'https://schema.org/',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $items
        ];
    }
}
