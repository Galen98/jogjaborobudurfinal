<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class travel extends Model
{
    // declare table
    use HasFactory;
    protected $table = "wisata";
    // protected $primaryKey = 'wisata_id';
    protected $fillable = ['namawisata','durasi','discount','image','image2','image3','image4','image5','IDR','label','deskripsi_english','city','city','child','pickup','highlight','wherepickup',
    'student','kitas','kategories','shortdescription','capacity' ,'bahasa','slug', 'status']; 

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'namawisata'
            ]
        ];
    }
    public function subwisata(){
    	return $this->hasMany('App\Models\subwisata');
    }

    public function countratings()
    {
        return $this->hasMany('App\Models\countrating', 'wisata_id', 'id');
    }
}