<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['date'];

    public function dish() {
        return $this->belongsToMany(Dish::class, 'dish_has_sales')->withPivot('dish_id', 'sales_id', 'comment');
    }

    public function table() {
        return $this->belongsTo(Table::class);
    }
    
    public function getTotalAmount()
    {
        return $this->dish->sum('price');
    }
}
