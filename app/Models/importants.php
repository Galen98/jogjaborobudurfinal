<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class importants extends Model
{
    use HasFactory;
    protected $table = "importants";
    protected $fillable = ['wisata_id','importantinformation']; 
}
