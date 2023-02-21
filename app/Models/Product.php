<?php

namespace App\Models;

use id;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $fillable = [
        'brand_id', 'sku', 'name',
        'slug', 'short_description', 'description', 'quantity', 'status_stock',
        'weight', 'normal_price', 'sale_price', 'status', 'featured'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'quantity'  =>  'integer',
        'brand_id'  =>  'integer',
        'status'    =>  'boolean',
        'featured'  =>  'boolean'
    ];

    /**
     * @param $value
     */
    // public function setNameAttribute($value)
    // {
    //     $this->attributes['name'] = $value;
    //     $this->attributes['slug'] = Str::slug($value);
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categorie()
    {
        return $this->belongsTo(Category::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }

    public function subcategories()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class, 'product_id');
    }
}
