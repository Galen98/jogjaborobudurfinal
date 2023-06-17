<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class region extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "region";
    protected $fillable = ['namaregion','shortdescription','image','slugregion']; 
}
