<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class highlight extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "highlight";
    protected $fillable = ['wisata_id','highlight']; 
}
