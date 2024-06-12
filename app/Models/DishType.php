<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishType extends Model
{
    use HasFactory;

    protected $primaryKey = 'type';
    public $incrementing = false;

    protected $keyType = 'string';
    protected $timestamps = false;

    public function dish() {
        return $this->hasMany(Dish::class);
    }
}
