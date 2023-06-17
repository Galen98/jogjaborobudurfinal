<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tambahlocation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "tambahlocation";
    protected $fillable = ['wisata_id','tambahprovince_id','namaregion','slugregion']; 
    public function region(){
    	return $this->hasMany('App\Models\region');
    }
    public function tambahprovince(){
    	return $this->belongsTo('App\Models\tambahprovince');
    }

}
