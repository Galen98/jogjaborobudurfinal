<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tambahtags extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "tambahtags";
    protected $fillable = ['tags','idblog']; 

}
