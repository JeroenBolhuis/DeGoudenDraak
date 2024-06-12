<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    
    public function table() {
        return $this->belongsTo(Table::class);
    }

    public function customer() {
        return $this->hasMany(Customer::class);
    }
}
