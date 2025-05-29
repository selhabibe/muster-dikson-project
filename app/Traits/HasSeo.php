<?php

namespace App\Traits;

use App\Services\SeoService;
use Illuminate\Support\Str;

trait HasSeo
{
    /**
     * Get SEO meta tags for this model
     */
    public function getSeoMetaTags(array $defaults = []): array
    {
        $seoService = app(SeoService::class);
        return $seoService->generateMetaTags($this, $defaults);
    }

    /**
     * Get structured data for this model
     */
    public function getStructuredData(): array
    {
        $seoService = app(SeoService::class);
        return $seoService->generateStructuredData($this);
    }

    /**
     * Get optimized title for SEO
     */
    public function getSeoTitle(): string
    {
        if (!empty($this->seo_title)) {
            return $this->seo_title;
        }

        if (isset($this->title) && !empty($this->title)) {
            return $this->title;
        }

        if (isset($this->name) && !empty($this->name)) {
            return $this->name;
        }

        return 'Muster & Dikson';
    }

    /**
     * Get optimized description for SEO
     */
    public function getSeoDescription(): string
    {
        if (!empty($this->seo_description)) {
            return $this->seo_description;
        }

        if (isset($this->description) && !empty($this->description)) {
            return Str::limit(strip_tags($this->description), 160);
        }

        if (isset($this->content) && !empty($this->content)) {
            return Str::limit(strip_tags($this->content), 160);
        }

        return 'Découvrez les produits professionnels Muster & Dikson pour coiffeurs et esthéticiennes.';
    }

    /**
     * Get SEO-friendly URL slug
     */
    public function getSeoSlug(): string
    {
        if (isset($this->slug) && !empty($this->slug)) {
            return $this->slug;
        }

        if (isset($this->title) && !empty($this->title)) {
            return Str::slug($this->title);
        }

        if (isset($this->name) && !empty($this->name)) {
            return Str::slug($this->name);
        }

        return Str::slug($this->id);
    }

    /**
     * Get keywords for this model
     */
    public function getSeoKeywords(): string
    {
        $keywords = ['Muster', 'Dikson', 'coiffure professionnelle', 'produits capillaires', 'beauté'];

        // Add model-specific keywords
        if (isset($this->name)) {
            $keywords[] = $this->name;
        }

        if (isset($this->title)) {
            $keywords[] = $this->title;
        }

        // Add brand keywords for products
        if (method_exists($this, 'brand') && $this->brand) {
            $keywords[] = $this->brand->name;
        }

        // Add category keywords for products
        if (method_exists($this, 'categories') && $this->categories) {
            foreach ($this->categories as $category) {
                $keywords[] = $category->name;
            }
        }

        // Add tag keywords for posts
        if (method_exists($this, 'tags') && $this->tags) {
            foreach ($this->tags as $tag) {
                $keywords[] = $tag->name;
            }
        }

        return implode(', ', array_unique($keywords));
    }

    /**
     * Get canonical URL for this model
     */
    public function getCanonicalUrl(): string
    {
        $modelClass = class_basename($this);

        switch ($modelClass) {
            case 'Product':
                return route('products.show', $this->id);
            case 'Category':
                return route('categories.show', $this->id);
            case 'Post':
                return route('posts.show', $this->id);
            default:
                return url()->current();
        }
    }

    /**
     * Get social media image for this model
     */
    public function getSocialImage(): string
    {
        // For products with media
        if (method_exists($this, 'getFirstMediaUrl') && $this->getFirstMediaUrl('product-images')) {
            return $this->getFirstMediaUrl('product-images');
        }

        // For posts with images
        if (isset($this->image) && !empty($this->image)) {
            return asset('storage/' . $this->image);
        }

        // Default social media image
        return asset('images/front/social-share-default.jpg');
    }

    /**
     * Check if model has custom SEO data
     */
    public function hasCustomSeo(): bool
    {
        return !empty($this->seo_title) || !empty($this->seo_description);
    }

    /**
     * Generate auto SEO data based on model content
     */
    public function generateAutoSeo(): array
    {
        $title = $this->getSeoTitle();
        $description = $this->getSeoDescription();

        return [
            'seo_title' => Str::limit($title, 60),
            'seo_description' => Str::limit($description, 160),
        ];
    }

    /**
     * Update SEO fields if they are empty
     */
    public function updateSeoIfEmpty(): void
    {
        $autoSeo = $this->generateAutoSeo();
        $updated = false;

        if (empty($this->seo_title)) {
            $this->seo_title = $autoSeo['seo_title'];
            $updated = true;
        }

        if (empty($this->seo_description)) {
            $this->seo_description = $autoSeo['seo_description'];
            $updated = true;
        }

        if ($updated) {
            $this->save();
        }
    }
}
