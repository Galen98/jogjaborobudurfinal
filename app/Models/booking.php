<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    // public $timestamps = false;
    use HasFactory;
    protected $table = "booking";
    protected $fillable = ['wisata_id','name','code','phone','paketwisata','email','total','totalgroup','traveldate','adult','child','participants','time','pickup','updated_at','created_at','request','subwisata_id','namawisata','surname','country'];
}
