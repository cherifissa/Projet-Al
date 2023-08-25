<?php

namespace Modules\Réservation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'email',
        'phone',
        'message'
    ];
}
