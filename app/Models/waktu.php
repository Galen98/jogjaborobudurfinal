<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class waktu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "waktu";
    protected $fillable = ['wisata_id','subwisata_id','time']; 
    public function subwisata(){
    	return $this->belongsTo('App\Models\subwisata');
    }

}
