<?php

namespace Modules\Réservation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DemandeReservation extends Model
{
    use HasFactory;

    protected $table = 'demande_reservations';

    protected $fillable = [
        'nom_client',
        'email_client',
        'date_arrive',
        'date_depart',
        'type_chambre',
        'nombre_adulte',
        'nombre_enfant'
    ];
}