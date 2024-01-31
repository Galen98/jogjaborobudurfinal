<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tambahAvailable extends Model
{
    use HasFactory;
    protected $table = "tambah_available";
    protected $fillable = ['date_available_id','subwisata_id','waktu_id', 'available']; 
}
