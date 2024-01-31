<?php

namespace App\Http\Controllers;
use App\Models\travel;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\dateAvailable;
use App\Models\tambahAvailable;
use App\Models\subwisata;
use App\Models\waktu;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // For manage date available in subwisata/options
    public function getTravel(){
       $travel = travel::orderBy('created_at', 'DESC')->paginate(10); 
       return view('dateAvailable', compact('travel'));
    }

    public function getTraveldate($slug){
        $wisataId = travel::where('slug', $slug)->first()->wisata_id;
        $namaWisata = travel::where('slug', $slug)->first()->namawisata;
        $travelOption = subwisata::where('wisata_id', $wisataId)->get();
        return view('dateAvailablepage', compact('travelOption', 'namaWisata'));
    }

    public function getTraveloption($id){
        $namaOption = subwisata::where('id', $id)->first()->judulsub;
        $ids = $id;
        $dateNow = date('Y-m-d');
        $getAvailable = dateAvailable::where('subwisata_id', $id)->whereDate('date', '>=', $dateNow)->get();
        return view('dateAvailablemanage', compact('namaOption', 'getAvailable', 'ids'));
    }

    public function createDateavailable($id){
        $ids=$id;
        $idtravel=subwisata::where('id', $ids)->first()->wisata_id;
        $jam=waktu::where('subwisata_id', $id)->get();
        return view('dateAvailablecreate', compact('jam', 'ids', 'idtravel'));
    }

    public function postAvailable(Request $request){
        $available = $request->available;
        $idtravel = $request->idtravel;
        $idsub = $request->idsub;
        $ids = $request->id;
        $date = $request->date;

        $dateAvail = dateAvailable::create([
            'date' => $date,
            'wisata_id' => $idtravel,
            'subwisata_id' => $idsub
        ]);

            $data = [
                'date_available_id'=> $dateAvail->id,
                'waktu_id' => $ids, 
                'subwisata_id' => $idsub,
                'available' => $available,
                ];
        
                foreach($available as $index => $row){
                $data['available']=$row;
                $data['waktu_id'] = $ids[$index];
                tambahAvailable::create($data);
                } 

                Alert::success('Berhasil');
                return redirect('/dateavailable/item/manage/'.$idsub);
        }

    public function cekAvailability(){
        $id = '102';
        $tanggal = '2024-02-01';
        $options = subwisata::where('wisata_id', $id)->get('id');
        $pilihan = subwisata::with('waktu')->with('harga')->whereIN('id', $options)->get();
        $check=dateAvailable::where('wisata_id', $id)->where('date', $tanggal)->exists();
        if($check){
            $idsub=dateAvailable::where('wisata_id', $id)->where('date', $tanggal)->pluck('id')->toArray();
            $time=tambahAvailable::where('date_available_id', $idsub)->where('available', 1)->get();
        } else {
            $time = subwisata::whereIN('id', $options)->get();
        }
        return response()->json([
            'time' => $time,
        ]);
    }
}
