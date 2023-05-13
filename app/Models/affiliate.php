<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class affiliate extends Model
{
    use HasFactory;
     protected $table = "affiliate";
     protected $fillable = ['website','address','socialmedia','name','job','email','phone','message'];
}
