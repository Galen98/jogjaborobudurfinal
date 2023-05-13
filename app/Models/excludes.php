<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class excludes extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = "exclude";
    protected $fillable = ['wisata_id','exclude'];
}
