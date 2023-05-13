<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tambahseason extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "tambahseason";
    protected $fillable = ['season_id','wisata_id'];
}
