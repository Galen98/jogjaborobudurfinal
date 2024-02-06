<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    // public $timestamps = false;
    use HasFactory;
    protected $table = "booking";
    protected $fillable = ['wisata_id','name','code','phone','paketwisata','email','total','totalgroup','traveldate','adult','child','participants','time','pickup','updated_at',
    'created_at','request','subwisata_id','namawisata','surname','country','token','token_expired_at','cust_time', 'amount', 'currency', 'pay_id'];

    public function wisata(){
    return $this->belongsTo('App\Models\travel', 'wisata_id', 'wisata_id');
    }

    public function payment(){
        return $this->belongsTo('App\Models\Payment', 'id', 'booking_id');
    }
}
