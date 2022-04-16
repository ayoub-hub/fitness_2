<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nutritionniste extends Model
{
    protected $table = "nutritionnistes";

    protected $fillable = [
        'nom', 'text', 'subtext','photo','adresse'
    ];

   
    protected $hidden = [
        'created_at	', 'updated_at',
    ];
}
