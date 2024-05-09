<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dateAvailable extends Model
{
    use HasFactory;
    protected $table = "date_availabe";
    protected $fillable = ['wisata_id','subwisata_id','date','status']; 

}
