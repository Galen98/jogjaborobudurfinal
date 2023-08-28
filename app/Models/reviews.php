<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    use HasFactory;
    protected $table = "review";
    protected $fillable = ['image','image2','image3','image4','image5','paketwisata','country','name','surname','traveldate','comments','star_rating','wisata_id','token','booking_id'];
    public function booking()
    {
        return $this->belongsTo('App\Models\booking');
    } 
    
}
