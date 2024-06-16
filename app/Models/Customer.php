<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'customer';
    protected $fillable = ['age', 'booking_id', 'name'];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}