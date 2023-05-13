<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    // declare table
    use HasFactory;
    protected $table = "blog";
    protected $fillable = ['judulblog','deskripsi','image','kategori','author','shortdescription','bahasa','slug']; 
    
}
