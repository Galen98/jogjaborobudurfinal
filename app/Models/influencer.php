<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class influencer extends Model
{
    // declare table
    use HasFactory;
    protected $table = "influencer";
    protected $fillable = ['website','email','socialmedia','message']; 
    
}
