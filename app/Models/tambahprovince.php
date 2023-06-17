<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tambahprovince extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "tambahprovince";
    protected $fillable = ['wisata_id','namaprovince','slugprovince']; 
    public function province(){
    	return $this->hasMany('App\Models\tambahlocation');
    }
     public function wisata(){
        return $this->belongsTo('App\Models\travel');
    }
}
