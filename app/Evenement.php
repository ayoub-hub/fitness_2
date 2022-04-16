<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $table = "evenements";

    protected $fillable = [
        'title', 'text', 'subtext','photo','date'
    ];

   
    protected $hidden = [
        'created_at	', 'updated_at',
    ];
}
