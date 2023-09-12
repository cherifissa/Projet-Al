<?php

namespace Modules\Réservation\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Réservation\Entities\Chambre;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    public $primaryKey = 'numero';
    protected $keyType = 'string';

    public $fillable = [
        'numero',
        'nbr_jour',
        'nbr_client',
        'status',
        'prix',
        'date_arrive',
        'date_depart',
        'paye',
        'client_id',
        'chambre_id',
    ];

    public function chambre()
    {
        return $this->belongsTo(Chambre::class, 'chambre_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
