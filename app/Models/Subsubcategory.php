<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsubcategory extends Model
{
    use HasFactory;
     public function category()
    {
        $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        $this->belongsTo(Subcategory::class);
    }
}
