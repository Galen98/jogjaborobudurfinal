<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dateAvailable extends Model
{
    use HasFactory;
    protected $table = "date_availabe";
    protected $fillable = ['wisata_id','subwisata_id','date','status']; 

    public function tambahAvailable() {
    	return $this->hasMany('App\Models\tambahAvailable');
    }

    public function subwisata(){
    	return $this->belongsTo('App\Models\subwisata');
    }
    
    public function wisata(){
        return $this->belongsTo('App\Models\travel');
    }
}
