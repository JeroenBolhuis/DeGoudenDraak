<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking'; // specify custom table name
    protected $fillable = ['deluxe_menu', 'table_idtable', 'datetime'];

    public function customers()
    {
        return $this->hasMany(Customer::class, 'booking_id');
    }

    public function table()
    {
        return $this->belongsTo(Table::class, 'table_idtable');
    }
}
