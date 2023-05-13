<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class background extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "background";
    protected $fillable = ['header','subheader','image','place'];
}
