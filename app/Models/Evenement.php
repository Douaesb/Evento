<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'titre',
        'description',
        'date',
        'lieu',
        'places',
        'mode',
        'statut',
        'categorie_id',
        'user_id',
    ];

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}
