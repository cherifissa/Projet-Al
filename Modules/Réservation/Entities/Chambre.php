<?php

namespace Modules\Réservation\Entities;

use Illuminate\Database\Eloquent\Model;
use servation\Database\factories\ChambreFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chambre extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'status',
        'categorie_id'
    ];

    // protected static function newFactory()
    // {
    //     return \Modules\RéChambreFactory::new();
    // }
}
