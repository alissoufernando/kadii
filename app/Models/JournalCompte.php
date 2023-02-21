<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalCompte extends Model
{
    use HasFactory;
    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    // protected $dateFormat = 'Y-m-d H:i:s:u';
    protected $table = 'journal_comptes';
    protected $fillable = [
        'libelle',
        'compte_id',
        'compte_tiers_id',
        'entree',
        'sortie',
        'solde',
    ];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    // protected $dateFormat = 'Y-m-d';

    protected $casts = [
        'created_at' => 'date:d/m/Y',
        'updated_at' => 'date:d/m/Y',
    ];



    public function compte()
    {
        return $this->belongsTo(Compte::class);
    }
}
