<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "province";
    protected $fillable = ['namaprovince','shortdescription','image','slugprovince']; 
}
