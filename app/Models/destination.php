<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class destination extends Model
{
     use HasFactory;
    public $timestamps = false;
    protected $table = "destination";
    protected $fillable = ['destination','shortdescription','image'];
}
