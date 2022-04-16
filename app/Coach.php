<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $table = "coachs";

    protected $fillable = [
        'name', 'text', 'subtext','photo','specialite','age'
    ];

   
    protected $hidden = [
        'created_at	', 'updated_at',
    ];
}
