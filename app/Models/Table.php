<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'table';
    protected $fillable = ['number', 'capacity', 'need_help'];

    public function bookings() {
        return $this->hasMany(Booking::class, 'table_idtable');
    }
}
