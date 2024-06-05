<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tambahAvailable extends Model
{
    use HasFactory;
    protected $table = "tambah_available";
    protected $fillable = ['date_available_id','subwisata_id','waktu_id', 'available']; 

    public function subwisata(){
    	return $this->belongsTo('App\Models\subwisata');
    }

    public function wisata(){
    	return $this->belongsTo('App\Models\travel');
    }

    public function waktu(){
    	return $this->belongsTo('App\Models\waktu');
    }
}
