<?php

namespace App;
use App\Nutrition;
use Illuminate\Database\Eloquent\Model;

class Nutrition extends Model
{
    protected $table = "nutritions";

    protected $fillable = [
        'name', 'text', 'subtext','photo'
    ];

   
    protected $hidden = [
        'created_at	', 'updated_at',
    ];
}
