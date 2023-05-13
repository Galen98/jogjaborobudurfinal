<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class harga extends Model
{

    use HasFactory;
    public $timestamps = false;
    protected $table = "hargabaru";
    protected $fillable = ['wisata_id','subwisata_id','min','maks','harga','kategories'];
    public function subwisata(){
    	return $this->belongsTo('App\Models\subwisata');
    }
}
