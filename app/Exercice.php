<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercice extends Model
{
    protected $table = "exercices";

    protected $fillable = [
        'title', 'text', 'subtext','video','categorie'
    ];

   
    protected $hidden = [
        'created_at	', 'updated_at',
    ];
}
