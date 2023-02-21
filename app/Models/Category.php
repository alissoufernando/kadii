<?php

namespace App\Models;

use TypiCMS\NestableTrait;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    // use NestableTrait;
    protected $table = 'categories';

    protected $fillable = [
        'name', 'slug', 'description', 'parent_id', 'featured', 'menu', 'image',
    ];

    protected $casts = [
        'parent_id' =>  'integer',
        'featured'  =>  'boolean',
        'menu'      =>  'boolean'
    ];


    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'category_id');
    }
    
    public function subsubcategories()
    {
        return $this->hasMany(Subsubcategory::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
