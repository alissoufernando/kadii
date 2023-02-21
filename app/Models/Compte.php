<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;
    protected $table = 'comptes';
    protected $fillable = [
        'user_id', 'solde'
    ];

    protected $casts = [
        'created_at' => 'date:d/m/Y',
        'updated_at' => 'date:d/m/Y',
    ];



    public function journalComptes()
    {
        return $this->hasMany(JournalCompte::class);
    }
}
