<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class platform extends Model
{
    use HasFactory;
    protected $table = "platform";
    protected $fillable = ['website','address','socialmedia','name','job','email','phone','message'];
}
