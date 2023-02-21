<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Subsubcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcategory extends Model
{
    use HasFactory;
    public function category()
    {
        $this->belongsTo(Category::class);
    }

    public function subsubcategories()
    {
        return $this->hasMany(Subsubcategory::class, 'subcategory_id');
    }
}
