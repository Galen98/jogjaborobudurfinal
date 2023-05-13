<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coment extends Model
{
    // declare table
    use HasFactory;
    protected $table = "coment";
    protected $fillable = ['id','nama','komentar']; 
    
}
