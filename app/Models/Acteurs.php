<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acteurs extends Model
{
    use HasFactory;

    protected $table = 'acteurs';

    protected $fillable = [
        'prenom',
        'nom',
        'photo',
        'biographie',
        'naissance',
        'lieu_naissance',
    ];
}
