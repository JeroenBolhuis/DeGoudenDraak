<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishHasSale extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['sales_id', 'dish_id', 'comment'];
}
