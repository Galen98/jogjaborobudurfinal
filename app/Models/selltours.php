<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class selltours extends Model
{
    use HasFactory;
    protected $table = "selltour";
    protected $fillable = ['website','address','socialmedia','name','job','email','phone','message'];
}
