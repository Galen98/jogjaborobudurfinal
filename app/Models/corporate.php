<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class corporate extends Model
{
    // declare table
    use HasFactory;
    protected $table = "corporate";
    protected $fillable = ['id','website','address','name','job','email','phone','message']; 
    
}