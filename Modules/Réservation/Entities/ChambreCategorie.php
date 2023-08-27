<?php

namespace Modules\Réservation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChambreCategorie extends Model
{
    use HasFactory;

    public $fillable = [
        'nom',
        'prix',
        'wifi',
        'petit_dej',
        'nbr_lit',
        'nbr_chb',
        'images',
        'description'
    ];
}