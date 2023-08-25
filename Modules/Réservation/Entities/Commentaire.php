<?php

namespace Modules\Réservation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentaire extends Model
{
    use HasFactory;

    public $fillable = [
        'contenu',
        'client_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
