<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subwisata extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "subwisata";
    protected $fillable = ['wisata_id','judulsub','short','kategories','child'];
     public function waktu(){
    	return $this->hasMany('App\Models\waktu');
    }

    public function harga(){
    	return $this->hasMany('App\Models\harga');
    }

    public function hargachild(){
    	return $this->hasMany('App\Models\hargachild');
    }
     public function wisata(){
        return $this->belongsTo('App\Models\travel');
    }
}
