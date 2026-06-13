<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function ingredients(){
        return $this->belongsToMany(Ingredient::class);
    }

    public function meals(){
        return $this->belongsToMany(Meal::class);
    }

}
