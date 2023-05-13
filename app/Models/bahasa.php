<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bahasa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "bahasa";
    protected $fillable = ['bahasa'];
}
