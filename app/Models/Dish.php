<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    public function dishType() {
        return $this->belongsTo(DishType::class);
    }

    public function discount() {
        return $this->hasMany(Discount::class);
    }

    public function sales() {
        return $this->belongsToMany(Sales::class);
    }
}
