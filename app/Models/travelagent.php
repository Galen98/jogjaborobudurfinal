<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class travelagent extends Model
{
    use HasFactory;
     protected $table = "travelagent";
     protected $fillable = ['website','address','socialmedia','name','job','email','phone','message'];
}
