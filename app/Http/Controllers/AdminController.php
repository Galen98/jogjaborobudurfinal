<?php

namespace App\Http\Controllers;
use App\Models\travel;
use App\Models\message;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\dateAvailable;
use App\Models\tambahAvailable;
use App\Models\subwisata;
use App\Models\waktu;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // For manage date available in subwisata/options
    public function getTravel() {
       $travel = travel::orderBy('created_at', 'DESC')->paginate(10); 
       return view('dateAvailable', compact('travel'));
    }

    public function searchTravelAvailable(Request $request) {
        $search = $request->search;
        if($search == ''){
            return redirect()->to('dateavailable');
        } else {
        $travel = travel::where('namawisata', 'LIKE', '%'. $search .'%')->orderBy('created_at', 'DESC')->paginate(10);
        return view('dateAvailable', compact('travel'));
        }
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
        $dateNow = Carbon::now()->format('d/m/Y');
        $getAvailable = dateAvailable::where('subwisata_id', $id)
                                      ->whereDate('date', '>=', $dateNow)
                                      ->orderBy('date','ASC')
                                      ->with('tambahAvailable.waktu')
                                      ->get();
    
        //dd($getAvailable);
        return view('dateAvailablemanage', compact('namaOption', 'getAvailable', 'ids'));
    }

    public function createDateavailable($id) { 
        $ids = $id;
        $idtravel = subwisata::where('id', $ids)->first()->wisata_id;
        $jam = waktu::where('subwisata_id', $id)->get();
        $date = dateAvailable::where('subwisata_id', $ids)->get();
        return view('dateAvailablecreate', compact('jam', 'ids', 'idtravel', 'date'));
    }

    public function postAvailable(Request $request){
        $available = $request->avail_time;
        $idtravel = $request->idtravel;
        $idsub = $request->idsub;
        $ids = $request->waktu_id;
        $date = $request->date;
        $status = $request->status;

        if($status == "on"){
            $status = true;
        } else {
            $status = false;
        }

        $dateAvail = dateAvailable::create([
            'date' => $date,
            'wisata_id' => $idtravel,
            'subwisata_id' => $idsub,
            'status' => $status
        ]);

        $data = [
        'date_available_id'=> $dateAvail->id,
        'waktu_id' => $ids, 
        'subwisata_id' => $idsub,
        'available' => $available,
        ];

        //dd($available);
        
          foreach ($available as $index => $row) {
                $isAvailable = ($row == "true") ? true : false;
                $data = [
                    'date_available_id' => $dateAvail->id,
                    'waktu_id' => $ids[$index], 
                    'subwisata_id' => $idsub,
                    'available' => $isAvailable,
                ];
        
                tambahAvailable::create($data);
            }

         Alert::success('Berhasil');
         return redirect('/dateavailable/item/manage/'.$idsub);
        }
    
    public function deleteAvailability() {
        $dateNow = Carbon::now()->format('d/m/Y');
        $ids = dateAvailable::where('date', '<', $dateNow)->get();
        foreach($ids as $id) {
            tambahAvailable::where('date_available_id', $id->id)->delete();
        }
        dateAvailable::where('date', '<', $dateNow)->delete();
    }

    public function updateDateAvailability(Request $request, $id) {
        $status = $request->status;
        $isAvailable = ($status == "true") ? true : false;
        dateAvailable::where('id', $id)->update([
            'status' => $isAvailable
        ]);
    }

    public function updateTimeAvailability(Request $request, $id) {
         $availability = $request->availability;
         $isAvailable = ($availability == "true") ? true : false;
         tambahAvailable::where('id', $id)->update([
            'available' => $isAvailable
         ]);
    }

    public function checkDateAvailability($id) {
        $date = dateAvailable::where('subwisata_id', $id)->get();
        return response()->json([
            'date' => $date
        ]);
    }

    public function checkTimeAvailability($id) {
        $waktu = tambahAvailable::where('subwisata_id', $id)->get();
        return response()->json([
            'waktu_id' => $waktu
        ]);
    }

    public function cekAvailability(){
        $id = '102';
        $tanggal = '2024-02-01';
        $options = subwisata::where('wisata_id', $id)->get('id');
        $pilihan = subwisata::with('waktu')->with('harga')->whereIN('id', $options)->get();
        $check = dateAvailable::where('wisata_id', $id)->where('date', $tanggal)->exists();
        if($check){
            $idsub = dateAvailable::where('wisata_id', $id)->where('date', $tanggal)->pluck('id')->toArray();
            $time = tambahAvailable::where('date_available_id', $idsub)->where('available', 1)->get();
        } else {
            $time = subwisata::whereIN('id', $options)->get();
        }
        return response()->json([
            'time' => $time,
        ]);
    }

    //READ MESSAGE SUCCESS
    public function readMessage($id) {
        message::where('id', $id)->update([
            'status' => 0
        ]);
        return response()->json(['message' => 'Message status updated'], 200);
    }
}
