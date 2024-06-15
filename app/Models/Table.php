<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'table';

    public function booking() {
        return $this->hasOne(Booking::class);
    }

}
