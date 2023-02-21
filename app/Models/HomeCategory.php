<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeCategory extends Model
{
    use HasFactory;
    protected $table = 'home_categories';
    protected $fillable = [

        'name', 'firstname', 'email', 'password', 'last_seen',
    ];

}
