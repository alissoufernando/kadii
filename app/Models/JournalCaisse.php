<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalCaisse extends Model
{
    use HasFactory;
        /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $table = 'journal_caisses';
    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'description_operation',
        'entree',
        'sortie',
        'montont_operation',
        'compte_tiers_id',
        'solde',
    ];

    protected $casts = [
        'created_at' => 'date:d/m/Y',
        'updated_at' => 'date:d/m/Y',
    ];
}
