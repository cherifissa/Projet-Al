<?php

namespace Modules\Réservation\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Réservation\Entities\ChambreCategorie;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chambre extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'status',
        'categorie_id'
    ];

    public function chambreCategorie()
    {
        return $this->belongsTo(ChambreCategorie::class, 'categorie_id');
    }
}
