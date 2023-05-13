<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tambahdestinasi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "tambahdestinasi";
    protected $fillable = ['destinasi_id','wisata_id'];
}
