<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countrating extends Model
{
    use HasFactory;
    protected $table = "countrating";
    protected $fillable = ['wisata_id','totalrating']; 

    public function wisata()
    {
        return $this->belongsTo('App\Models\travel', 'wisata_id', 'id');
    }
}
