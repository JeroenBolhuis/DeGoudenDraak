<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'discount';
    
    public function dish() {
        return $this->belongsTo(Dish::class);
    }
}
