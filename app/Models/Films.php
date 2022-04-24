<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    use HasFactory;

    protected $table = 'films';

    public $timestamps = false;

    protected $fillable = [
        'titre',
        'synopsis',
        'date_de_sortie',
        'duree',
        'affiche',
        'video_film',
        'a_la_une',
    ];
}
