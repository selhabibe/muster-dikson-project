<?php

namespace App\Models\Shop;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    /**
     * @var string
     */
    protected $table = 'shop_products';

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'featured' => 'boolean',
        'is_visible' => 'boolean',
        'backorder' => 'boolean',
        'requires_shipping' => 'boolean',
        'published_at' => 'date',
    ];

    /** @return BelongsTo<Brand,self> */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'shop_brand_id');
    }

    /** @return BelongsToMany<Category> */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'shop_category_product', 'shop_product_id', 'shop_category_id')->withTimestamps();
    }

    /** @return MorphMany<Comment> */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Check if the product is out of stock
     */
    public function isOutOfStock(): bool
    {
        return $this->qty <= 0;
    }

    /**
     * Check if the product has low stock
     */
    public function hasLowStock(): bool
    {
        return $this->qty > 0 && $this->qty <= $this->security_stock;
    }

    /**
     * Get stock status as string
     */
    public function getStockStatus(): string
    {
        if ($this->isOutOfStock()) {
            return 'out_of_stock';
        } elseif ($this->hasLowStock()) {
            return 'low_stock';
        }
        return 'in_stock';
    }

    /**
     * Get stock alert message
     */
    public function getStockAlertMessage(): ?string
    {
        if ($this->isOutOfStock()) {
            return 'Rupture de stock';
        } elseif ($this->hasLowStock()) {
            return 'Stock limité (' . $this->qty . ' restant' . ($this->qty > 1 ? 's' : '') . ')';
        }
        return null;
    }
}
