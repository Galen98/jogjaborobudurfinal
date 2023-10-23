<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\travel;
use App\Models\Rate;
use App\Models\includes;
use App\Models\corporate;
use App\Models\travelagent;
use App\Models\excludes;
use App\Models\influencer;
use App\Models\message;
use App\Models\rating;
use App\Models\countrating;
use App\Models\destination;
use App\Models\highlight;
use App\Models\tambahdestinasi;
use App\Models\tambahseason;
use App\Models\hargachild;
use App\Models\affiliate;
use App\Models\region;
use App\Models\province;
use App\Models\tambahlocation;
use App\Models\tambahprovince;
use App\Models\selltours;
use App\Models\platform;
use Illuminate\Http\Request;
// use Illuminate\Http\Request::server();
use App\Models\harga;
use App\Models\bahasa;
use App\Models\season;
use App\Models\subwisata;
use App\Models\waktu;
use App\Models\reviews;
use App\Models\importants;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Intervention\Image\ImageManagerStatic as Image;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class TravelController extends Controller
{
   public function inserttravel(Request $request){
        $season = Request('season');
        $province = Request('province');
        $region = Request('region');
        $namawisata = request('namawisata');
        $durasi = request('durasi');
        $label = request('label');
        $important = request('important');
        $isieng = request('isieng');
        $harga = request('idr');
        // $hargachild = request('idrchild');
        $student = request('student');
        $kitas = request('kitas');
        $airport = request('airport');
        $shortdescription = request('shortdescription'); 
        $child = request('child');
        $city = request('city');
        $bahasa = request('bahasa');
        $highlight = request('highlight');
        $includes = request('include');
        $time = request('time');
        $excludes = request('exclude');
        $wherepickup = request('where');
        $destinasi= request('category');
        $kategories= request('person');
        $person= request('singleperson');
        $range= request('to');
        $price= request('harga');
        $childs= request('singlechild');
        $rangechild= request('tochild');
        $pricechild= request('hargachild');
        $childrange= request('singlechildrange');
        $pricerange= request('hargarange');
        $pricechildrange= request('hargachildrange');
        $personrange= request('singlepersonrange');
        $group=request('group');
        $grouprange=request('togroup');
        $pricegroup=request('hargagroup');
        $capacity=Request('capacity');
        $subwisata=Request('namaoption');
        $childoption=Request('childoption');
        $subdescription=Request('shortoption');
        $personoption=Request('personoption');
        // $request->validate([
        //  'image' => 'required|mimes:jpeg,png,jpg'
        // ]);
        $img= request('image');
        // $nama_file = time()."_".$img->getClientOriginalName();
		// $tujuan_upload = 'public/img';
        // $img->move($tujuan_upload,$nama_file);
        $image = Image::make($img->getRealPath());
        $image->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $nama_file = time() . "_" . $img->getClientOriginalName();
        $tujuan_upload = 'public/img';
        $image->encode('webp', 80)->save(public_path($tujuan_upload . '/' . pathinfo($nama_file, PATHINFO_FILENAME) . '.webp'));
		 
        //  $request->validate([
        //  'image2' => 'required|mimes:jpeg,png,jpg'
        // ]);
        $img2= request('image2');
        $image2 = Image::make($img2->getRealPath());
        $image2->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $nama_file2 = time() . "_" . $img2->getClientOriginalName();
        $tujuan_upload2 = 'public/img';
        $image2->encode('webp', 80)->save(public_path($tujuan_upload2 . '/' . pathinfo($nama_file2, PATHINFO_FILENAME) . '.webp'));

        //  $request->validate([
        //  'image3' => 'required|mimes:jpeg,png,jpg'
        // ]);
        $img3= request('image3');
        $image3 = Image::make($img3->getRealPath());
        $image3->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $nama_file3 = time() . "_" . $img3->getClientOriginalName();
        $tujuan_upload3 = 'public/img';
        $image3->encode('webp', 80)->save(public_path($tujuan_upload3 . '/' . pathinfo($nama_file3, PATHINFO_FILENAME) . '.webp'));

        //  $request->validate([
        //  'image4' => 'required|mimes:jpeg,png,jpg'
        // ]);
        $img4= request('image4');
        $image4 = Image::make($img4->getRealPath());
        $image4->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $nama_file4 = time() . "_" . $img4->getClientOriginalName();
        $tujuan_upload4 = 'public/img';
        $image4->encode('webp', 80)->save(public_path($tujuan_upload4 . '/' . pathinfo($nama_file4, PATHINFO_FILENAME) . '.webp'));
         
        //   $request->validate([
        //  'image5' => 'required|mimes:jpeg,png,jpg'
        // ]);
        $img5= request('image5');
        $image5 = Image::make($img5->getRealPath());
        $image5->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $nama_file5 = time() . "_" . $img5->getClientOriginalName();
        $tujuan_upload5 = 'public/img';
        $image5->encode('webp', 80)->save(public_path($tujuan_upload5 . '/' . pathinfo($nama_file5, PATHINFO_FILENAME) . '.webp'));


        $data = [
            'namawisata'  => $namawisata,
            'shortdescription' => $shortdescription,
            'durasi' => $durasi,
            'label' => $label,
            'deskripsi_english' =>$isieng,
            'IDR' => $harga,
            'student'=>$student,
            'kitas'=>$kitas,
            'pickup'=>$airport,
            // 'highlight'=>$highlight,
            'child'=>'yes',
            'city'=>$city,
            'student'=>'yes',
            'kitas'=>'yes',
            'image'=>pathinfo($nama_file, PATHINFO_FILENAME) . '.webp',
            'image2'=>pathinfo($nama_file2, PATHINFO_FILENAME) . '.webp',
            'image3'=>pathinfo($nama_file3, PATHINFO_FILENAME) . '.webp',
            'image4'=>pathinfo($nama_file4, PATHINFO_FILENAME) . '.webp',
            'image5'=>pathinfo($nama_file5, PATHINFO_FILENAME) . '.webp',
            // 'IDRchild'=>$hargachild,
            'wherepickup'=>$wherepickup,
            'kategories'=>$kategories,
            'capacity'=>$capacity,
            'bahasa'=>$bahasa,
            'discount'=>'no',
            'slug'=>\Str::slug($request->namawisata)
        ];
        
        
        $travel=travel::create($data);

        $data = [
            'wisata_id'=>$travel->id,
            'season_id'=>$season
        ];
        foreach($season as $index){
            $data['season_id']=$index;
            tambahseason::create($data);
            }

            $data = [
                'wisata_id' => $travel->id,
                'namaprovince' => $province,
                'slugprovince'=>\Str::slug($request->province)
            ];
            $provinsi = tambahprovince::create($data);

            $data = [
                'wisata_id' => $travel->id,
                'tambahprovince_id' => $provinsi->id,
               
            ];

            foreach($region as $index){
                $data['namaregion']=$index;
                $data['slugregion']=Str::slug($data['namaregion'], '-');
                tambahlocation::create($data);
            }

        
        $data = [
            'wisata_id'=> $travel->id,
            'include'=>$includes,
            ];
    
            foreach($includes as $index){
            $data['include']=$index;
            includes::create($data);
            }

            $data = [
            'wisata_id'=> $travel->id,
            'destinasi_id'=>$destinasi,
            ];
            foreach($destinasi as $index){
            $data['destinasi_id']=$index;
            tambahdestinasi::create($data);
            }
            

            $data = [
            'wisata_id'=> $travel->id,
            'highlight'=>$highlight,
            ];
    
            foreach($highlight as $index){
            $data['highlight']=$index;
            highlight::create($data);
            }

            $data = [
                'wisata_id'=> $travel->id,
                'importantinformation'=>$important,
                ];
        
                foreach($important as $index){
                $data['importantinformation']=$index;
                importants::create($data);
                }
    

            $data = [
                'wisata_id'=> $travel->id,
                'exclude'=>$excludes,
                
                ];
        
                foreach($excludes as $index){
                $data['exclude']=$index;
                excludes::create($data);
        
                }

            $data = [
                'wisata_id' => $travel->id,
                'judulsub' => $subwisata,
                'short'=>$subdescription,
                'kategories'=>$personoption,
                'child'=>$childoption
            ];

            $option=subwisata::create($data);

                $data = [
                'wisata_id'=> $travel->id,
                'subwisata_id' => $option->id,
                'time'=>$time,  
                ];

                foreach($time as $index){
                $data['time']=$index;
                waktu::create($data);
                }

                if ($childoption == 'yes') {

                $data = [
                'wisata_id'=> $travel->id,
                'subwisata_id' => $option->id,
                'min'=>$childrange,
                'maks'=>$rangechild,
                'harga'=>$pricechildrange,
                ];
        
                foreach($childrange as $index => $row){
                $data['min'] = $row;
                $data['maks'] = $rangechild[$index];
                $data['harga'] = $pricechildrange[$index];

                hargachild::create($data);
                
                }
                }

              
                $data = [
                'wisata_id'=> $travel->id,
                'subwisata_id' => $option->id,
                'min'=>$personrange,
                'maks'=>$range,
                'harga'=>$pricerange,
                'kategories' =>  $option->kategories
                ];
        
                foreach($personrange as $index => $row){
                $data['min'] = $row;
                $data['maks'] = $range[$index];
                $data['harga'] = $pricerange[$index];
                $hargas=harga::create($data);
                }            

        Alert::success('Berhasil');
        return redirect('/paketwisata/diskon/'.$travel->id);

    }

    public function booking(Request $request, $idpilihan){
        $waktu = Request('waktu');
        $idtravel = Request('idtravel');
        $paketwisata = Request('paketwisata');
        $namawisata=Request('namawisata');
        $adult=Request('dewasa');
        $child=Request('anak');
        $reviews=Request('review');
        $group=Request('groupe');
        $total=Request('totharga');
        $idoption=Request('idoption');
        $totalgroup=Request('tothargagroup');
        $tanggaltravel=Request('tanggaltravel');
        $country=DB::table('country')->get();
        $ratingGet=countrating::where('wisata_id', $idtravel)->first();
        if($ratingGet == null){
            $rating = null;
        } else{
        $rating=$ratingGet->totalrating;
    }
        return view('frontend.booking',compact('rating','namawisata','reviews','total','tanggaltravel','adult','child','group','totalgroup','country','waktu','idoption','idtravel','paketwisata'));
    }

    public function viewtraveladmin($idtravel){
        $travel = travel::where('wisata_id',$idtravel)->get();
        $includes= includes::where('wisata_id',$idtravel)->get();
        $excludes= excludes::where('wisata_id',$idtravel)->get();
        $highlight = highlight::where('wisata_id',$idtravel)->get();
        return view('viewtravel', compact('travel','includes','excludes','highlight'));
    }


    public function categorydestination(Request $request,$idcategory){
        $season = season::get();
        $bahasa=bahasa::get();
         $lang=$request->server('HTTP_ACCEPT_LANGUAGE');
         $langs=Str::substr($lang, 0,2);
    if ($langs == 'id') {
        $sessions = session()->get("bahasa") ?? "Bahasa";
        
    }elseif ($langs == 'en-US'){
        $sessions = session()->get("bahasa") ?? "English";
        
    }elseif ($langs == 'en'){
        $sessions = session()->get("bahasa") ?? "English";
    }
    elseif ($langs == 'ms'){
        $sessions = session()->get("bahasa") ?? "Malay";
    }
    else{
        $sessions = session()->get("bahasa") ?? "English";     
    }
        
        $rateIDR = Rate::where("currency", "IDR")->first()->rate;
        $rateSGD = Rate::where("currency", "SGD")->first()->rate;
        $rateMYR = Rate::where("currency", "MYR")->first()->rate;
        $rateEUR = Rate::where("currency", "EUR")->first()->rate;
        $destinate = destination::get();
        $destinasi  = destination::where('id',$idcategory)->get();
        $destinasiid = destination::where('id',$idcategory)->first();
        if ($destinasiid == null) {
            $bahasa=bahasa::get();
         $lang=$request->server('HTTP_ACCEPT_LANGUAGE');
         $langs=Str::substr($lang, 0,2);
        if ($langs == 'id') {
        $sessions = session()->get("bahasa") ?? "Bahasa";
        
        }elseif ($langs == 'en-US'){
        $sessions = session()->get("bahasa") ?? "English";
        
        }elseif ($langs == 'en'){
        $sessions = session()->get("bahasa") ?? "English";
        }
        elseif ($langs == 'ms'){
        $sessions = session()->get("bahasa") ?? "Malay";
        }
        else{
        $sessions = session()->get("bahasa") ?? "English";     
        }
            $city=region::get();
            $province=province::get();
            $season = season::get();
            $destination=destination::get();
            $rateIDR = Rate::where("currency", "IDR")->first()->rate;
            $rateSGD = Rate::where("currency", "SGD")->first()->rate;
            $rateMYR = Rate::where("currency", "MYR")->first()->rate;
            $rateEUR = Rate::where("currency", "EUR")->first()->rate;
            // get session user
            $session = session()->get("rate") ?? "USD";
            return view('errors.404', compact('bahasa','session','sessions','province','city','season','destination'));
        } else {
        $categoryid = $destinasiid->id; 
        $seasonactive=[];
        // get session user
        $session = session()->get("rate") ?? "USD";
        $province=province::get();
        $city=region::get();
        $category = destination::where('id', $idcategory)->get();
        $count = tambahdestinasi::where('destinasi_id',$idcategory)->get();
        //$other = travel::where('bahasa', $sessions)->paginate(4);
        $destination = DB::table('tambahdestinasi')
            ->where('destinasi_id',$idcategory)
            ->where('bahasa',$sessions)
            ->leftJoin('wisata', 'tambahdestinasi.wisata_id', '=', 'wisata.wisata_id')
            ->select('wisata.wisata_id','wisata.namawisata', 'wisata.label','wisata.durasi','wisata.IDR','wisata.image2','wisata.discount','wisata.kategories','wisata.capacity','wisata.IDR_awal','wisata.slug')
            ->leftJoin('countrating', 'wisata.wisata_id', '=', 'countrating.wisata_id')
            ->select('wisata.created_at','wisata.wisata_id','wisata.namawisata','wisata.image','countrating.totalrating', 'wisata.label','wisata.durasi','wisata.IDR','wisata.image2','wisata.discount','wisata.kategories','wisata.capacity','wisata.IDR_awal','wisata.slug')
            ->orderBy('countrating.totalrating','DESC')
            ->paginate(8);

         // $getCategoryId = tambahdestinasi::where('wisata_id', '!=', $wisatacategoryId)->pluck('wisata_id');
        // $wisataIds = $getCategoryId->toArray();
        $categoryids = tambahdestinasi::where('destinasi_id', $idcategory)->pluck('wisata_id');
        $wisatacategoryId = $categoryids->toArray();
        $other = DB::table('wisata')
        ->where('wisata.wisata_id','!=' , $wisatacategoryId)
        ->where('wisata.bahasa', $sessions)
        ->leftJoin('countrating', 'wisata.wisata_id', '=', 'countrating.wisata_id')
        ->select('wisata.created_at', 'wisata.wisata_id', 'wisata.namawisata', 'wisata.image', 'wisata.label', 'wisata.durasi', 'wisata.IDR', 'wisata.image2', 'wisata.discount', 'wisata.kategories', 'wisata.capacity', 'wisata.IDR_awal', 'wisata.slug', 'countrating.totalrating')
        ->orderBy('countrating.totalrating', 'DESC')
        ->get()
        ->take(4);
        return view('frontend.destinationcategory', compact('categoryids','categoryid','seasonactive','city','province','category','count','destination','other','rateEUR','rateIDR','rateSGD','rateMYR','session','destinate','destinasi','season','bahasa','session','sessions'));
        }
    }

    // public function province(Request $request,$idcategory){

    // }

    public function seasons(Request $request,$idseason){
        $seasones = season::get();
        $bahasa=bahasa::get();
        $seasonactive=$idseason;
        $province=province::get();
         $lang=$request->server('HTTP_ACCEPT_LANGUAGE');
         $langs=Str::substr($lang, 0,2);
    if ($langs == 'id') {
        $sessions = session()->get("bahasa") ?? "Bahasa";
        
    }elseif ($langs == 'en-US'){
        $sessions = session()->get("bahasa") ?? "English";
        
    }elseif ($langs == 'en'){
        $sessions = session()->get("bahasa") ?? "English";
    }
    elseif ($langs == 'ms'){
        $sessions = session()->get("bahasa") ?? "Malay";
    }
    else{
        $sessions = session()->get("bahasa") ?? "English";     
    }
        $rateIDR = Rate::where("currency", "IDR")->first()->rate;
        $rateSGD = Rate::where("currency", "SGD")->first()->rate;
        $rateMYR = Rate::where("currency", "MYR")->first()->rate;
        $rateEUR = Rate::where("currency", "EUR")->first()->rate;
        $destinate = destination::get();
        // get session user
        $session = session()->get("rate") ?? "USD";
        $city=region::get();
        $season = season::where('id', $idseason)->get();
        if ($season == null) {
            $bahasa=bahasa::get();
         $lang=$request->server('HTTP_ACCEPT_LANGUAGE');
         $langs=Str::substr($lang, 0,2);
        if ($langs == 'id') {
        $sessions = session()->get("bahasa") ?? "Bahasa";
        
        }elseif ($langs == 'en-US'){
        $sessions = session()->get("bahasa") ?? "English";
        
        }elseif ($langs == 'en'){
        $sessions = session()->get("bahasa") ?? "English";
        }
        elseif ($langs == 'ms'){
        $sessions = session()->get("bahasa") ?? "Malay";
        }
        else{
        $sessions = session()->get("bahasa") ?? "English";     
        }
            $city=region::get();
            $province=province::get();
            $season = season::get();
            $destination=destination::get();
            $rateIDR = Rate::where("currency", "IDR")->first()->rate;
            $rateSGD = Rate::where("currency", "SGD")->first()->rate;
            $rateMYR = Rate::where("currency", "MYR")->first()->rate;
            $rateEUR = Rate::where("currency", "EUR")->first()->rate;
            // get session user
            $session = session()->get("rate") ?? "USD";
            return view('errors.404', compact('bahasa','session','sessions','province','city','season','destination'));
        } else {
        $count = tambahseason::where('season_id',$idseason)->get();
        // $other = travel::where('bahasa', $sessions)->paginate(4);
        $seasonids = tambahseason::where('season_id', $idseason)->pluck('wisata_id');
        $wisataseasonId = $seasonids->toArray();
        $other = DB::table('wisata')
        ->where('wisata.wisata_id','!=' , $wisataseasonId)
        ->where('wisata.bahasa', $sessions)
        ->leftJoin('countrating', 'wisata.wisata_id', '=', 'countrating.wisata_id')
        ->select('wisata.created_at', 'wisata.wisata_id', 'wisata.namawisata', 'wisata.image', 'wisata.label', 'wisata.durasi', 'wisata.IDR', 'wisata.image2', 'wisata.discount', 'wisata.kategories', 'wisata.capacity', 'wisata.IDR_awal', 'wisata.slug', 'countrating.totalrating')
        ->orderBy('countrating.totalrating', 'DESC')
        ->get()
        ->take(4);

        $seasons = DB::table('tambahseason')->where('season_id',$idseason)
        ->where('bahasa', $sessions)
        ->leftJoin('wisata','tambahseason.wisata_id', '=', 'wisata.wisata_id')
        ->select('wisata.wisata_id','wisata.namawisata', 'wisata.label','wisata.durasi','wisata.IDR','wisata.image2','wisata.discount','wisata.kategories','wisata.capacity','wisata.IDR_awal','wisata.slug')
        ->leftJoin('countrating', 'wisata.wisata_id', '=', 'countrating.wisata_id')
        ->select('wisata.created_at','wisata.wisata_id','wisata.namawisata','wisata.image','countrating.totalrating', 'wisata.label','wisata.durasi','wisata.IDR','wisata.image2','wisata.discount','wisata.kategories','wisata.capacity','wisata.IDR_awal','wisata.slug')
        ->orderBy('countrating.totalrating','DESC')
        ->paginate(8);
        return view('frontend.season', compact('seasonactive','city','province','seasones','other','rateEUR','rateIDR','rateSGD','rateMYR','session','destinate','season','seasons','count','bahasa','session','sessions'));
        }
    }

    public function destinations(Request $request){
    $seasones = season::get();
    $bahasa=bahasa::get();
    $lang=$request->server('HTTP_ACCEPT_LANGUAGE');
    $langs=Str::substr($lang, 0,2);
    if ($langs == 'id') {
        $sessions = session()->get("bahasa") ?? "Bahasa";
        
    }elseif ($langs == 'en-US'){
        $sessions = session()->get("bahasa") ?? "English";
        
    }elseif ($langs == 'en'){
        $sessions = session()->get("bahasa") ?? "English";
    }
    elseif ($langs == 'ms'){
        $sessions = session()->get("bahasa") ?? "Malay";
    }
    else{
        $sessions = session()->get("bahasa") ?? "English";     
    }
    $destinate= destination::get();
    $rateIDR = Rate::where("currency", "IDR")->first()->rate;
    $rateSGD = Rate::where("currency", "SGD")->first()->rate;
    $rateMYR = Rate::where("currency", "MYR")->first()->rate;
    $rateEUR = Rate::where("currency", "EUR")->first()->rate;
    // get session user
    $session = session()->get("rate") ?? "USD";
    $city = region::get();
  
    // $English = travel::where("bahasa",$sessions)->first()->bahasa;
    $province=province::get();
    $travel=travel::orderBy('created_at','DESC')
    ->where('bahasa',$sessions)
    ->leftJoin('countrating', 'wisata.wisata_id', '=', 'countrating.wisata_id')
    ->select('wisata.created_at','wisata.wisata_id','wisata.namawisata','wisata.image','countrating.totalrating', 'wisata.label','wisata.durasi','wisata.IDR','wisata.image2','wisata.discount','wisata.kategories','wisata.capacity','wisata.IDR_awal','wisata.slug')
    ->orderBy('countrating.totalrating','DESC')
    ->paginate(8);
    $destination = province::all()->take(3);
    return view('frontend.destination', compact('city','seasones','travel','rateIDR','rateMYR','rateSGD','session','rateEUR','destination','destinate','bahasa','sessions','session','province'));
    }

    public function itemtravel(Request $request,$slug){
        $provinces=province::get();
        $bahasa=bahasa::get();
        $lang=$request->server('HTTP_ACCEPT_LANGUAGE');
        $langs=Str::substr($lang, 0,2);
    if ($langs == 'id') {
        $sessions = session()->get("bahasa") ?? "Bahasa";
        
    }elseif ($langs == 'en-US'){
        $sessions = session()->get("bahasa") ?? "English";
        
    }elseif ($langs == 'en'){
        $sessions = session()->get("bahasa") ?? "English";
    }
    elseif ($langs == 'ms'){
        $sessions = session()->get("bahasa") ?? "Malay";
    }
    else{
        $sessions = session()->get("bahasa") ?? "English";     
    }
        $idtravel=travel::where('slug', $slug)->pluck('wisata_id');
        $idslug=travel::where('slug', $slug)->first();
        if ($idslug == null) {
            $city=region::get();
            $province=province::get();
            $season = season::get();
            $destination=destination::get();
            $rateIDR = Rate::where("currency", "IDR")->first()->rate;
            $rateSGD = Rate::where("currency", "SGD")->first()->rate;
            $rateMYR = Rate::where("currency", "MYR")->first()->rate;
            $rateEUR = Rate::where("currency", "EUR")->first()->rate;
            // get session user
            $session = session()->get("rate") ?? "USD";
            return view('errors.404', compact('bahasa','session','sessions','province','city','season','destination'));
        } 
        else {   
        $option = subwisata::where('wisata_id', $idtravel)->get();
        $options = subwisata::where('wisata_id', $idtravel)->get('id');
        $important = importants::where('wisata_id', $idtravel)->get();
        //$hargaoption = harga::where('wisata_id',$idtravel)->get();
        $pilihan = subwisata::whereIN('id', $options)->get();
        $harganew = harga::whereIN('subwisata_id', $options)->get();
        $hargachildnew = hargachild::whereIN('subwisata_id', $options)->get();
        $destinasi=DB::table('tambahdestinasi')->where('wisata_id',$idtravel)
            ->leftJoin('destination', 'tambahdestinasi.destinasi_id', '=', 'destination.id')
            ->select('destination.destination','destination.id')->paginate(1);
        $season=DB::table('tambahseason')->where('wisata_id',$idtravel)
            ->leftJoin('season', 'tambahseason.season_id', '=', 'season.id')
            ->select('season.namaseason','season.id')->paginate(1);
        $rangeharga = harga::where('wisata_id', $idtravel)->get();
        $province = tambahprovince::where('wisata_id', $idtravel)
        ->leftJoin('province', 'tambahprovince.namaprovince', '=', 'province.namaprovince')
        ->select('province.id','province.slugprovince','province.namaprovince')->paginate(1);
        $region = tambahlocation::where('wisata_id', $idtravel)->get();
        $hargachild  = hargachild::where('wisata_id', $idtravel)->get();
        $childoption = hargachild::where('wisata_id', $idtravel)->get();
        $rateIDR = Rate::where("currency", "IDR")->first()->rate;
        $rateSGD = Rate::where("currency", "SGD")->first()->rate;
        $rateMYR = Rate::where("currency", "MYR")->first()->rate;
        $rateEUR = Rate::where("currency", "EUR")->first()->rate;
        // get session user
        $session = session()->get("rate") ?? "USD";
        
        // $English = travel::where("bahasa",$sessions)->first()->bahasa;
        $destinate=destination::get();
        $seasones = season::get();
        $highlight=highlight::where('wisata_id',$idtravel)->get();
        $harga = harga::where('wisata_id',$idtravel)->get();
        $destination=destination::get();
        $city=region::get();
        $travel = travel::where('slug',$slug)->get();
        $includes= includes::where('wisata_id',$idtravel)->get();
        $excludes= excludes::where('wisata_id',$idtravel)->get();
        $jam= waktu::where('wisata_id',$idtravel)->get();
        $value=reviews::where('wisata_id',$idtravel)->where('token', null)->paginate(5);
        $jumlahreview = reviews::where('wisata_id', $idtravel)->where('token', null)->count();
        $jumlahrating = reviews::where('wisata_id', $idtravel)->where('token', null)->avg('star_rating');
        // $other=travel::where('label','Likely to sell out')->where('bahasa',$sessions)->paginate(4);
        $travelgetId=travel::where('slug', $slug)->first();
        $cityTravel=tambahlocation::where('wisata_id', $travelgetId->wisata_id)->first();
        $cityGet=tambahlocation::where('namaregion',$cityTravel->namaregion)->pluck('wisata_id');
        $wisataIds = $cityGet->toArray();
        $getLastwisataId = travel::whereIn('wisata_id', $wisataIds)->where('wisata_id', '!=', $idtravel)
        ->pluck('wisata_id')->toArray();
        $other = DB::table('wisata')
        ->whereIn('wisata.wisata_id', $getLastwisataId)
        ->where('wisata.bahasa', $sessions)
        ->leftJoin('countrating', 'wisata.wisata_id', '=', 'countrating.wisata_id')
        ->select('wisata.created_at', 'wisata.wisata_id', 'wisata.namawisata', 'wisata.image', 'wisata.label', 'wisata.durasi', 'wisata.IDR', 'wisata.image2', 'wisata.discount', 'wisata.kategories', 'wisata.capacity', 'wisata.IDR_awal', 'wisata.slug', 'countrating.totalrating')
        ->orderBy('countrating.totalrating', 'DESC')
        ->paginate(4);

        return view('frontend.travelitem', compact('cityGet','jumlahrating','important','city','seasones','provinces','travel','childoption','includes','excludes','other','value','jumlahreview',"rateIDR","rateMYR","rateSGD","session","rateEUR",'highlight','harga','destination','rangeharga','hargachild','jam','destinate','option','pilihan','harganew','options','hargachildnew','destinasi','season','bahasa','session','sessions','region','province')); 
    }
    }

    public function itemprovince(Request $request,$slugprovince,$slug){
        $provinces=province::get();
        $bahasa=bahasa::get();
        $lang=$request->server('HTTP_ACCEPT_LANGUAGE');
        $langs=Str::substr($lang, 0,2);
    if ($langs == 'id') {
        $sessions = session()->get("bahasa") ?? "Bahasa";
        
    }elseif ($langs == 'en-US'){
        $sessions = session()->get("bahasa") ?? "English";
        
    }elseif ($langs == 'en'){
        $sessions = session()->get("bahasa") ?? "English";
    }
    elseif ($langs == 'ms'){
        $sessions = session()->get("bahasa") ?? "Malay";
    }
    else{
        $sessions = session()->get("bahasa") ?? "English";     
    }
        $idtravel=travel::where('slug', $slug)->pluck('wisata_id');
        $idslug=travel::where('slug', $slug)->first();
        if ($idslug == null) {
            $city=region::get();
            $province=province::get();
            $season = season::get();
            $destination=destination::get();
            $rateIDR = Rate::where("currency", "IDR")->first()->rate;
            $rateSGD = Rate::where("currency", "SGD")->first()->rate;
            $rateMYR = Rate::where("currency", "MYR")->first()->rate;
            $rateEUR = Rate::where("currency", "EUR")->first()->rate;
            // get session user
            $session = session()->get("rate") ?? "USD";
            return view('errors.404', compact('bahasa','session','sessions','province','city','season','destination'));
        } else {
        $option = subwisata::where('wisata_id', $idtravel)->get();
        $options = subwisata::where('wisata_id', $idtravel)->get('id');
        //$hargaoption = harga::where('wisata_id',$idtravel)->get();
        $pilihan = subwisata::whereIN('id', $options)->get();
        $harganew = harga::whereIN('subwisata_id', $options)->get();
        $hargachildnew = hargachild::whereIN('subwisata_id', $options)->get();
        $destinasi=DB::table('tambahdestinasi')->where('wisata_id',$idtravel)
            ->leftJoin('destination', 'tambahdestinasi.destinasi_id', '=', 'destination.id')
            ->select('destination.destination','destination.id')->paginate(1);
        $season=DB::table('tambahseason')->where('wisata_id',$idtravel)
            ->leftJoin('season', 'tambahseason.season_id', '=', 'season.id')
            ->select('season.namaseason','season.id')->paginate(1);
        $rangeharga = harga::where('wisata_id', $idtravel)->get();
        $province = tambahprovince::where('wisata_id', $idtravel)
        ->leftJoin('province', 'tambahprovince.namaprovince', '=', 'province.namaprovince')
        ->select('province.id','province.slugprovince','province.namaprovince')->paginate(1);
        $region = tambahlocation::where('wisata_id', $idtravel)->get();
        $important = importants::where('wisata_id', $idtravel)->get();
        $hargachild  = hargachild::where('wisata_id', $idtravel)->get();
        $childoption = hargachild::where('wisata_id', $idtravel)->get();
        $rateIDR = Rate::where("currency", "IDR")->first()->rate;
        $rateSGD = Rate::where("currency", "SGD")->first()->rate;
        $rateMYR = Rate::where("currency", "MYR")->first()->rate;
        $rateEUR = Rate::where("currency", "EUR")->first()->rate;
        // get session user
        $session = session()->get("rate") ?? "USD";
        $seasones = season::get();
        // $English = travel::where("bahasa",$sessions)->first()->bahasa;
        $destinate=destination::get();
        $city=region::get();
        $highlight=highlight::where('wisata_id',$idtravel)->get();
        $harga = harga::where('wisata_id',$idtravel)->get();
        $destination=destination::paginate(3);
        $travel = travel::where('slug',$slug)->get();
        $includes= includes::where('wisata_id',$idtravel)->get();
        $excludes= excludes::where('wisata_id',$idtravel)->get();
        $jam= waktu::where('wisata_id',$idtravel)->get();
        $value=rating::where('wisata_id',$idtravel)->paginate(8);
        $jumlahreview=rating::where('wisata_id',$idtravel)->count();
        $other=travel::where('label','Likely to sell out')->where('bahasa',$sessions)->paginate(4);
        return view('frontend.travelitem', compact('important','city','seasones', 'provinces','travel','childoption','includes','excludes','other','value','jumlahreview',"rateIDR","rateMYR","rateSGD","session","rateEUR",'highlight','harga','destination','rangeharga','hargachild','jam','destinate','option','pilihan','harganew','options','hargachildnew','destinasi','season','bahasa','session','sessions','region','province')); 
        }
    }

    public function itemcity(Request $request,$slugcity,$slug){
        $provinces=province::get();
        $bahasa=bahasa::get();
        $lang=$request->server('HTTP_ACCEPT_LANGUAGE');
        $langs=Str::substr($lang, 0,2);
    if ($langs == 'id') {
        $sessions = session()->get("bahasa") ?? "Bahasa";
        
    }elseif ($langs == 'en-US'){
        $sessions = session()->get("bahasa") ?? "English";
        
    }elseif ($langs == 'en'){
        $sessions = session()->get("bahasa") ?? "English";
    }
    elseif ($langs == 'ms'){
        $sessions = session()->get("bahasa") ?? "Malay";
    }
    else{
        $sessions = session()->get("bahasa") ?? "English";     
    }
        $idtravel=travel::where('slug', $slug)->pluck('wisata_id');
        $idslug=travel::where('slug', $slug)->first();
        if ($idslug == null) {
            $city=region::get();
            $province=province::get();
            $season = season::get();
            $destination=destination::get();
            $rateIDR = Rate::where("currency", "IDR")->first()->rate;
            $rateSGD = Rate::where("currency", "SGD")->first()->rate;
            $rateMYR = Rate::where("currency", "MYR")->first()->rate;
            $rateEUR = Rate::where("currency", "EUR")->first()->rate;
            // get session user
            $session = session()->get("rate") ?? "USD";
            return view('errors.404', compact('bahasa','session','sessions','province','city','season','destination'));
        } else {
        $option = subwisata::where('wisata_id', $idtravel)->get();
        $options = subwisata::where('wisata_id', $idtravel)->get('id');
        //$hargaoption = harga::where('wisata_id',$idtravel)->get();
        $pilihan = subwisata::whereIN('id', $options)->get();
        $harganew = harga::whereIN('subwisata_id', $options)->get();
        $hargachildnew = hargachild::whereIN('subwisata_id', $options)->get();
        $destinasi=DB::table('tambahdestinasi')->where('wisata_id',$idtravel)
            ->leftJoin('destination', 'tambahdestinasi.destinasi_id', '=', 'destination.id')
            ->select('destination.destination','destination.id')->paginate(1);
        $season=DB::table('tambahseason')->where('wisata_id',$idtravel)
            ->leftJoin('season', 'tambahseason.season_id', '=', 'season.id')
            ->select('season.namaseason','season.id')->paginate(1);
        $rangeharga = harga::where('wisata_id', $idtravel)->get();
        $province = tambahprovince::where('wisata_id', $idtravel)
        ->leftJoin('province', 'tambahprovince.namaprovince', '=', 'province.namaprovince')
        ->select('province.id','province.slugprovince','province.namaprovince')->paginate(1);
        $region = tambahlocation::where('wisata_id', $idtravel)->get();
        $hargachild  = hargachild::where('wisata_id', $idtravel)->get();
        $childoption = hargachild::where('wisata_id', $idtravel)->get();
        $important = importants::where('wisata_id', $idtravel)->get();
        $rateIDR = Rate::where("currency", "IDR")->first()->rate;
        $rateSGD = Rate::where("currency", "SGD")->first()->rate;
        $rateMYR = Rate::where("currency", "MYR")->first()->rate;
        $rateEUR = Rate::where("currency", "EUR")->first()->rate;
        // get session user
        $session = session()->get("rate") ?? "USD";
        
        // $English = travel::where("bahasa",$sessions)->first()->bahasa;
        $destinate=destination::get();
        $city=region::get();
        $highlight=highlight::where('wisata_id',$idtravel)->get();
        $harga = harga::where('wisata_id',$idtravel)->get();
        $destination=destination::paginate(3);
        $travel = travel::where('slug',$slug)->get();
        $includes= includes::where('wisata_id',$idtravel)->get();
        $excludes= excludes::where('wisata_id',$idtravel)->get();
        $jam= waktu::where('wisata_id',$idtravel)->get();
        $value=rating::where('wisata_id',$idtravel)->paginate(8);
        $jumlahreview=rating::where('wisata_id',$idtravel)->count();
        $other=travel::where('label','Likely to sell out')->where('bahasa',$sessions)->paginate(4);
        return view('frontend.travelitem', compact('important','city','provinces','travel','childoption','includes','excludes','other','value','jumlahreview',"rateIDR","rateMYR","rateSGD","session","rateEUR",'highlight','harga','destination','rangeharga','hargachild','jam','destinate','option','pilihan','harganew','options','hargachildnew','destinasi','season','bahasa','session','sessions','region','province')); 
        }
    }

    public function viewprovince(Request $request,$slugprovince,$idprovince){
        $province=province::get();
        $city=region::get();
        $seasonactive=[];
        $slugprovince2=province::where('id',$idprovince)->first();
       
        if ($slugprovince2 == null) {
            $bahasa=bahasa::get();
         $lang=$request->server('HTTP_ACCEPT_LANGUAGE');
         $langs=Str::substr($lang, 0,2);
        if ($langs == 'id') {
        $sessions = session()->get("bahasa") ?? "Bahasa";
        
        }elseif ($langs == 'en-US'){
        $sessions = session()->get("bahasa") ?? "English";
        
        }elseif ($langs == 'en'){
        $sessions = session()->get("bahasa") ?? "English";
        }
        elseif ($langs == 'ms'){
        $sessions = session()->get("bahasa") ?? "Malay";
        }
        else{
        $sessions = session()->get("bahasa") ?? "English";     
        }
            $city=region::get();
            $province=province::get();
            $season = season::get();
            $destination=destination::get();
            $rateIDR = Rate::where("currency", "IDR")->first()->rate;
            $rateSGD = Rate::where("currency", "SGD")->first()->rate;
            $rateMYR = Rate::where("currency", "MYR")->first()->rate;
            $rateEUR = Rate::where("currency", "EUR")->first()->rate;
            // get session user
            $session = session()->get("rate") ?? "USD";
            return view('errors.404', compact('bahasa','session','sessions','province','city','season','destination'));
        } else {
        $slugprovince=$slugprovince2->slugprovince;
        $provinceid = $slugprovince2->id;
        $destination=destination::get();
        $provinces=province::where('id',$idprovince)->get();
        $season = season::get();
        $bahasa=bahasa::get();
         $lang=$request->server('HTTP_ACCEPT_LANGUAGE');
         $langs=Str::substr($lang, 0,2);
        if ($langs == 'id') {
        $sessions = session()->get("bahasa") ?? "Bahasa";
        
        }elseif ($langs == 'en-US'){
        $sessions = session()->get("bahasa") ?? "English";
        
        }elseif ($langs == 'en'){
        $sessions = session()->get("bahasa") ?? "English";
        }
        elseif ($langs == 'ms'){
        $sessions = session()->get("bahasa") ?? "Malay";
        }
        else{
        $sessions = session()->get("bahasa") ?? "English";     
        }
        
        $rateIDR = Rate::where("currency", "IDR")->first()->rate;
        $rateSGD = Rate::where("currency", "SGD")->first()->rate;
        $rateMYR = Rate::where("currency", "MYR")->first()->rate;
        $rateEUR = Rate::where("currency", "EUR")->first()->rate;
        // get session user
        $session = session()->get("rate") ?? "USD";
        $count = tambahprovince::where('slugprovince',$slugprovince)->get();
        // $other = travel::where('bahasa', $sessions)->get()->take(4);
        $travel = DB::table('tambahprovince')->where('slugprovince',$slugprovince)
        ->where('bahasa',$sessions)
        ->leftJoin('wisata', 'tambahprovince.wisata_id', '=', 'wisata.wisata_id')
        ->select('wisata.wisata_id','wisata.namawisata', 'wisata.label','wisata.durasi','wisata.IDR','wisata.image2','wisata.discount','wisata.kategories','wisata.capacity','wisata.IDR_awal','wisata.slug','tambahprovince.slugprovince')
        ->leftJoin('countrating', 'wisata.wisata_id', '=', 'countrating.wisata_id')
        ->select('wisata.created_at','wisata.wisata_id','wisata.namawisata','wisata.image','countrating.totalrating', 'wisata.label','wisata.durasi','wisata.IDR','wisata.image2','wisata.discount','wisata.kategories','wisata.capacity','wisata.IDR_awal','wisata.slug')
        ->orderBy('countrating.totalrating','DESC')
        ->paginate(8);

        $getIdprovince = tambahprovince::where('slugprovince', '!=' ,$slugprovince)->pluck('wisata_id');
        $wisataIds = $getIdprovince->toArray();
        $other = DB::table('wisata')
        ->whereIn('wisata.wisata_id', $wisataIds)
        ->where('wisata.bahasa', $sessions)
        ->leftJoin('countrating', 'wisata.wisata_id', '=', 'countrating.wisata_id')
        ->select('wisata.created_at', 'wisata.wisata_id', 'wisata.namawisata', 'wisata.image', 'wisata.label', 'wisata.durasi', 'wisata.IDR', 'wisata.image2', 'wisata.discount', 'wisata.kategories', 'wisata.capacity', 'wisata.IDR_awal', 'wisata.slug', 'countrating.totalrating')
        ->orderBy('countrating.totalrating', 'DESC')
        ->get()->take(4);

        return view('frontend.province', compact('seasonactive','provinceid','slugprovince','destination','city','provinces','province','bahasa','session','season','count','other','rateEUR','rateIDR','rateSGD','rateMYR','session','season','sessions','travel'));
    }
    }

    public function viewcity(Request $request,$slugcity){
        $province=province::get();
        $regions=region::where('slugregion',$slugcity)->get();
        $city=region::where('slugregion', $slugcity)->first();
        
        if ($city == null) {
            $bahasa=bahasa::get();
         $lang=$request->server('HTTP_ACCEPT_LANGUAGE');
         $langs=Str::substr($lang, 0,2);
        if ($langs == 'id') {
        $sessions = session()->get("bahasa") ?? "Bahasa";
        
        }elseif ($langs == 'en-US'){
        $sessions = session()->get("bahasa") ?? "English";
        
        }elseif ($langs == 'en'){
        $sessions = session()->get("bahasa") ?? "English";
        }
        elseif ($langs == 'ms'){
        $sessions = session()->get("bahasa") ?? "Malay";
        }
        else{
        $sessions = session()->get("bahasa") ?? "English";     
        }
            $city=region::get();
            $province=province::get();
            $season = season::get();
            $destination=destination::get();
            $rateIDR = Rate::where("currency", "IDR")->first()->rate;
            $rateSGD = Rate::where("currency", "SGD")->first()->rate;
            $rateMYR = Rate::where("currency", "MYR")->first()->rate;
            $rateEUR = Rate::where("currency", "EUR")->first()->rate;
            // get session user
            $session = session()->get("rate") ?? "USD";
            return view('errors.404', compact('bahasa','session','sessions','province','city','season','destination'));
        } else {
            $cityid=$city->id;
        $slugcity=$city->slugregion;
        $season = season::get();
        $bahasa=bahasa::get();
        $seasonactive=[];
        $city=region::get();
        $destination=destination::get();
        $lang=$request->server('HTTP_ACCEPT_LANGUAGE');
         $langs=Str::substr($lang, 0,2);
        if ($langs == 'id') {
        $sessions = session()->get("bahasa") ?? "Bahasa";
        
        }elseif ($langs == 'en-US'){
        $sessions = session()->get("bahasa") ?? "English";
        
        }elseif ($langs == 'en'){
        $sessions = session()->get("bahasa") ?? "English";
        }
        elseif ($langs == 'ms'){
        $sessions = session()->get("bahasa") ?? "Malay";
        }
        else{
        $sessions = session()->get("bahasa") ?? "English";     
        }
        
        $rateIDR = Rate::where("currency", "IDR")->first()->rate;
        $rateSGD = Rate::where("currency", "SGD")->first()->rate;
        $rateMYR = Rate::where("currency", "MYR")->first()->rate;
        $rateEUR = Rate::where("currency", "EUR")->first()->rate;
        // get session user
        $session = session()->get("rate") ?? "USD";
        $count = tambahlocation::where('slugregion',$slugcity)->get();
        // $other = travel::where('bahasa', $sessions)->get()->take(4);
        $travel = DB::table('tambahlocation')
        ->where('slugregion',$slugcity)
        ->where('bahasa',$sessions)
        ->leftJoin('wisata', 'tambahlocation.wisata_id', '=', 'wisata.wisata_id')
        ->select('wisata.wisata_id','wisata.namawisata', 'wisata.label','wisata.durasi','wisata.IDR','wisata.image2','wisata.discount','wisata.kategories','wisata.capacity','wisata.IDR_awal','wisata.slug','tambahlocation.slugregion')
        ->leftJoin('countrating', 'wisata.wisata_id', '=', 'countrating.wisata_id')
        ->select('wisata.created_at','wisata.wisata_id','wisata.namawisata','wisata.image','countrating.totalrating', 'wisata.label','wisata.durasi','wisata.IDR','wisata.image2','wisata.discount','wisata.kategories','wisata.capacity','wisata.IDR_awal','wisata.slug')
        ->orderBy('countrating.totalrating','DESC')
        ->paginate(8);
        
        $getIdother = tambahlocation::where('slugregion', '!=' ,$slugcity)->pluck('wisata_id');
        $wisataIds = $getIdother->toArray();
        $other = DB::table('wisata')
        ->whereIn('wisata.wisata_id', $wisataIds)
        ->where('wisata.bahasa', $sessions)
        ->leftJoin('countrating', 'wisata.wisata_id', '=', 'countrating.wisata_id')
        ->select('wisata.created_at', 'wisata.wisata_id', 'wisata.namawisata', 'wisata.image', 'wisata.label', 'wisata.durasi', 'wisata.IDR', 'wisata.image2', 'wisata.discount', 'wisata.kategories', 'wisata.capacity', 'wisata.IDR_awal', 'wisata.slug', 'countrating.totalrating')
        ->orderBy('countrating.totalrating', 'DESC')
        ->get()->take(4);
        return view('frontend.city', compact('slugcity','cityid','seasonactive','destination','city','regions','province','bahasa','session','season','count','other','rateEUR','rateIDR','rateSGD','rateMYR','session','season','sessions','travel'));
    }
    }

    public function insertcorporatediscount(Request $request){
        $website=Request('website');
        $address=Request('address');
        $name=Request('name');
        $email=Request('email');
        $job=Request('job');
        $phone=Request('phone');
        $message=Request('message');

        $data=[
            'website'=>$website,
            'address'=>$address,
            'name'=>$name,
            'job'=>$job,
            'email'=>$email,
            'phone'=>$phone,
            'message'=>$message
        ];
        corporate::create($data);
        Alert::success('Success');
        return redirect()->to('/companydiscount');
}

public function insertinfluencer(Request $request){
    $website=Request('website');
    $sosmed=Request('sosmed');
    $email=Request('email');
    $message=Request('message');

    $data=[
        'website'=>$website,
        'socialmedia'=>$sosmed,
        'email'=>$email,
        'message'=>$message
    ];
    influencer::create($data);
    Alert::success('Success');
    return redirect()->back();
}

public function inserttravelagent(Request $request){
    $website=Request('website');
    $sosmed=Request('sosmed');
    $address=Request('address');
    $name=Request('name');
    $email=Request('email');
    $job=Request('job');
    $phone=Request('phone');
    $message=Request('message');

    $data=[
        'website'=>$website,
        'socialmedia'=>$sosmed,
        'address'=>$address,
        'name'=>$name,
        'job'=>$job,
        'email'=>$email,
        'phone'=>$phone,
        'message'=>$message
    ];
    travelagent::create($data);
    Alert::success('Success');
    return redirect()->back();
}

public function insertaffiliate(Request $request){
    $website=Request('website');
    $sosmed=Request('sosmed');
    $address=Request('address');
    $name=Request('name');
    $email=Request('email');
    $job=Request('job');
    $phone=Request('phone');
    $message=Request('message');

    $data=[
        'website'=>$website,
        'socialmedia'=>$sosmed,
        'address'=>$address,
        'name'=>$name,
        'job'=>$job,
        'email'=>$email,
        'phone'=>$phone,
        'message'=>$message
    ];
    affiliate::create($data);
    Alert::success('Success');
    return redirect()->back();
}

public function insertselltours(Request $request){
    $website=Request('website');
    $sosmed=Request('sosmed');
    $address=Request('address');
    $name=Request('name');
    $email=Request('email');
    $job=Request('job');
    $phone=Request('phone');
    $message=Request('message');

    $data=[
        'website'=>$website,
        'socialmedia'=>$sosmed,
        'address'=>$address,
        'name'=>$name,
        'job'=>$job,
        'email'=>$email,
        'phone'=>$phone,
        'message'=>$message
    ];
    selltours::create($data);
    Alert::success('Success');
    return redirect()->back();
}

public function insertplatform(Request $request){
    $website=Request('website');
    $sosmed=Request('sosmed');
    $address=Request('address');
    $name=Request('name');
    $email=Request('email');
    $job=Request('job');
    $phone=Request('phone');
    $message=Request('message');

    $data=[
        'website'=>$website,
        'socialmedia'=>$sosmed,
        'address'=>$address,
        'name'=>$name,
        'job'=>$job,
        'email'=>$email,
        'phone'=>$phone,
        'message'=>$message
    ];
    platform::create($data);
    Alert::success('Success');
    return redirect()->back();
}

public function filtertravel(Request $request){
 $destination=destination::get();
 $student=Request('student');
 $kitas=Request('kitas');
 $child=Request('children');
 $destinate=destination::get();
 $rateIDR = Rate::where("currency", "IDR")->first()->rate;
    $rateSGD = Rate::where("currency", "SGD")->first()->rate;
    $rateMYR = Rate::where("currency", "MYR")->first()->rate;
    $rateEUR = Rate::where("currency", "EUR")->first()->rate;
    // get session user
    $session = session()->get("rate") ?? "USD";

 $travel=DB::table('wisata')->where('student',$student)->where('kitas',$kitas)
 ->where('child',$child)->paginate(9);

 return view('frontend.filter',compact('travel','destinate','rateIDR','rateMYR','rateSGD','session','rateEUR','destination'));
}


public function insertmessage(Request $request){
$name=Request('name');
$email=Request('email');
$message=Request('message');
$type=Request('type');

$data=[
'nama'=>$name,
'email'=>$email,
'type'=>$type,
'message'=>$message
];
message::create($data);
Alert::success('Success');
return redirect()->back();
}

public function insertrating(Request $request){
$rating=Request('rating');
$wisata_id=Request('wisata_id');
$comment=Request('comment');

$data=[
'wisata_id'=>$wisata_id,
'comments'=>$comment,
'star_rating'=>$rating
];
rating::create($data);
Alert::success('Success');
return redirect()->back();
}

// public function totalprice(Request $request){
    
// }

public function getrate()
    {
        // mengambil data dari api
        $request = Http::get("https://api.freecurrencyapi.com/v1/latest?apikey=GB7zuHPTkvFNaqZxWE3iTUtthdPnCpannRPgIE1A");
        $data = $request->json()["data"];
        // looping masukin ke database
        foreach ($data as $index => $row) {
            Rate::create([
                "currency" => $index,
                "rate" => $row
            ]);
        }
        // success
        return "ok";
    }

    public function getSearchprovince(Request $request)
    {
        $query = $request->input('query');

        $suggestions = DB::table('province')
            ->where('namaprovince', 'LIKE', $query . '%')
            ->pluck('namaprovince');

        return response()->json(['suggestions' => $suggestions]);
    }

    
    

    public function getSearchResults(Request $request)
    {
        try {
            $query = $request->input('query');
            $lang = $request->server('HTTP_ACCEPT_LANGUAGE');
            $langs = Str::substr($lang, 0, 2);
            if ($langs == 'id') {
                $sessions = session()->get("bahasa") ?? "Bahasa";
            } elseif ($langs == 'en-US') {
                $sessions = session()->get("bahasa") ?? "English";
            } elseif ($langs == 'en') {
                $sessions = session()->get("bahasa") ?? "English";
            } elseif ($langs == 'ms') {
                $sessions = session()->get("bahasa") ?? "Malay";
            } else {
                $sessions = session()->get("bahasa") ?? "English";
            }
    
           // Search provinces
$provinceResults = DB::table('province')
->where('namaprovince', 'LIKE', $query . '%')
->select([
    DB::raw('namaprovince COLLATE utf8mb4_general_ci as name'),
    DB::raw('slugprovince COLLATE utf8mb4_general_ci as slug'),
    'id',
    DB::raw("'province' as type")
]);

// Search regions
$regionResults = DB::table('region')
->where('namaregion', 'LIKE', $query . '%')
->select([
    DB::raw('namaregion COLLATE utf8mb4_general_ci as name'),
    DB::raw('slugregion COLLATE utf8mb4_general_ci as slug'),
    'id',
    DB::raw("'region' as type")
]);

$destinationResults = DB::table('destination')
->where('destination', 'LIKE', $query . '%')
->select([
    DB::raw('destination COLLATE utf8mb4_general_ci as name'),
    DB::raw('destination COLLATE utf8mb4_general_ci as slug'),
    'id',
    DB::raw("'destination' as type")
]);

$travelResults = DB::table('wisata')
->where('namawisata', 'LIKE', $query . '%')
->where('bahasa', $sessions)
->select([
    DB::raw('namawisata COLLATE utf8mb4_general_ci as name'),
    DB::raw('slug COLLATE utf8mb4_general_ci as slug'),
    'wisata_id as id',
    DB::raw("'trip' as type")
]);

    
            // Combine the results from provinces, regions, and destinations using UNION
            $results = $provinceResults->union($regionResults)->union($destinationResults)->union($travelResults)->get();
    
            return response()->json(['results' => $results]);
        } catch (\Exception $e) {
            // Handle the exception gracefully
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    



public function checkDestination(Request $request)
{
    $query = $request->input('query');

    // Search for a province
    $province = province::where('namaprovince', $query)->first();

    // Search for a region
    $region = region::where('namaregion', $query)->first();

    // Search for a destination
    $destination = destination::where('destination', $query)->first();

    $trip = travel::where('namawisata', $query)->first();

    if ($province) {
        return response()->json([
            'exists' => true,
            'slugprovince' => $province->slugprovince,
            'idprovince' => $province->id,
            'type' => 'province',
        ]);
    } elseif ($region) {
        return response()->json([
            'exists' => true,
            'slugregion' => $region->slugregion, // Adjust column name
            'idregion' => $region->id, // Adjust column name
            'type' => 'region',
        ]);
    } elseif ($destination) {
        return response()->json([
            'exists' => true,
            'slugdestination' => $destination->destination, // Adjust column name
            'iddestination' => $destination->id, // Adjust column name
            'type' => 'destination',
        ]);
    }elseif ($trip) {
        return response()->json([
            'exists' => true,
            'slugtrip' => $trip->slug, // Adjust column name
            'idtrip' => $trip->wisata_id, // Adjust column name
            'type' => 'trip',
        ]);
    } else {
        return response()->json(['exists' => false]);
    }
}

public function getTravelByProvinceAndSeason($province, $seasonId) {
    $travel = DB::table('tambahprovince')
        ->where('slugprovince', $province)
        ->where('bahasa', $sessions)
        ->leftJoin('wisata', 'tambahprovince.wisata_id', '=', 'wisata.wisata_id')
        ->leftJoin('tambahseason', 'wisata.wisata_id', '=', 'tambahseason.wisata_id')
        ->where('tambahseason.season_id', $seasonId)
        ->select('wisata.wisata_id', 'wisata.namawisata', 'wisata.label', 'wisata.durasi', 'wisata.IDR', 'wisata.image2', 'wisata.discount', 'wisata.kategories', 'wisata.capacity', 'wisata.IDR_awal', 'wisata.slug', 'tambahprovince.slugprovince')
        ->paginate(8);

    // Mengembalikan daftar travel yang sesuai dalam format JSON atau tampilan blade
    return response()->json(['travel' => $travel]);
}

public function filterseasonprovince($slugprovince, $namaseason,Request $request)
{
    $province=province::get();
        $city=region::get();
        $slugprovince2=province::where('slugprovince',$slugprovince)->first();
        $seasonactive=$namaseason;
        $slugprovince=$slugprovince2->slugprovince;
        $idprovince=$slugprovince2->id;
        $provinceid = $slugprovince2->id;
        $destination=destination::get();
        $provinces=province::where('id',$idprovince)->get();
        $season = season::get();
        $bahasa=bahasa::get();
         $lang=$request->server('HTTP_ACCEPT_LANGUAGE');
         $langs=Str::substr($lang, 0,2);
        if ($langs == 'id') {
        $sessions = session()->get("bahasa") ?? "Bahasa";
        
        }elseif ($langs == 'en-US'){
        $sessions = session()->get("bahasa") ?? "English";
        
        }elseif ($langs == 'en'){
        $sessions = session()->get("bahasa") ?? "English";
        }
        elseif ($langs == 'ms'){
        $sessions = session()->get("bahasa") ?? "Malay";
        }
        else{
        $sessions = session()->get("bahasa") ?? "English";     
        }
        
        $rateIDR = Rate::where("currency", "IDR")->first()->rate;
        $rateSGD = Rate::where("currency", "SGD")->first()->rate;
        $rateMYR = Rate::where("currency", "MYR")->first()->rate;
        $rateEUR = Rate::where("currency", "EUR")->first()->rate;
        // get session user
        $session = session()->get("rate") ?? "USD";
        $count = tambahprovince::where('slugprovince',$slugprovince)->get();
        $selectedSeason = $request->input('season');

    // Query untuk mengambil data travel berdasarkan musim dan provinsi
         $travel = DB::table('tambahprovince')
        ->where('slugprovince', $slugprovince)
        ->where('bahasa', $sessions)
        ->leftJoin('wisata', 'tambahprovince.wisata_id', '=', 'wisata.wisata_id')
        ->leftJoin('tambahseason', 'tambahprovince.wisata_id', '=', 'tambahseason.wisata_id')
        ->where('tambahseason.season_id', $namaseason)
        ->select('wisata.wisata_id', 'wisata.namawisata', 'wisata.label', 'wisata.durasi', 'wisata.IDR', 'wisata.image2', 'wisata.discount', 'wisata.kategories', 'wisata.capacity', 'wisata.IDR_awal', 'wisata.slug', 'tambahprovince.slugprovince')
        ->leftJoin('countrating', 'wisata.wisata_id', '=', 'countrating.wisata_id')
        ->select('wisata.created_at','wisata.wisata_id','wisata.namawisata','wisata.image','countrating.totalrating', 'wisata.label','wisata.durasi','wisata.IDR','wisata.image2','wisata.discount','wisata.kategories','wisata.capacity','wisata.IDR_awal','wisata.slug')
        ->orderBy('countrating.totalrating','DESC')
        ->paginate(8);

        $getIdprovince = tambahprovince::where('slugprovince', '!=' ,$slugprovince)->pluck('wisata_id');
        $wisataIds = $getIdprovince->toArray();
        $other = DB::table('wisata')
        ->whereIn('wisata.wisata_id', $wisataIds)
        ->where('wisata.bahasa', $sessions)
        ->leftJoin('countrating', 'wisata.wisata_id', '=', 'countrating.wisata_id')
        ->select('wisata.created_at', 'wisata.wisata_id', 'wisata.namawisata', 'wisata.image', 'wisata.label', 'wisata.durasi', 'wisata.IDR', 'wisata.image2', 'wisata.discount', 'wisata.kategories', 'wisata.capacity', 'wisata.IDR_awal', 'wisata.slug', 'countrating.totalrating')
        ->orderBy('countrating.totalrating', 'DESC')
        ->get()->take(4);

    // $travel = $travel->paginate(8);

    return view('frontend.province', compact('seasonactive','provinceid','slugprovince','destination','city','provinces','province','bahasa','session','season','count','other','rateEUR','rateIDR','rateSGD','rateMYR','session','season','sessions','travel'));
}

public function filterseasoncity($slugcity, $namaseason,Request $request)
{
    $province=province::get();
    $regions=region::where('slugregion',$slugcity)->get();
    $city=region::where('slugregion', $slugcity)->first();
    $cityid=$city->id;
    $slugcity=$city->slugregion;
    $season = season::get();
    $bahasa=bahasa::get();
    $seasonactive=$namaseason;
    $city=region::get();
    $destination=destination::get();
    $lang=$request->server('HTTP_ACCEPT_LANGUAGE');
     $langs=Str::substr($lang, 0,2);
    if ($langs == 'id') {
    $sessions = session()->get("bahasa") ?? "Bahasa";
    
    }elseif ($langs == 'en-US'){
    $sessions = session()->get("bahasa") ?? "English";
    
    }elseif ($langs == 'en'){
    $sessions = session()->get("bahasa") ?? "English";
    }
    elseif ($langs == 'ms'){
    $sessions = session()->get("bahasa") ?? "Malay";
    }
    else{
    $sessions = session()->get("bahasa") ?? "English";     
    }
    
    $rateIDR = Rate::where("currency", "IDR")->first()->rate;
    $rateSGD = Rate::where("currency", "SGD")->first()->rate;
    $rateMYR = Rate::where("currency", "MYR")->first()->rate;
    $rateEUR = Rate::where("currency", "EUR")->first()->rate;
    // get session user
    $session = session()->get("rate") ?? "USD";
    $count = tambahlocation::where('slugregion',$slugcity)->get();
    // $other = travel::where('bahasa', $sessions)->get()->take(4);
    $getIdother = tambahlocation::where('slugregion', '!=' ,$slugcity)->pluck('wisata_id');
        $wisataIds = $getIdother->toArray();
        $other = DB::table('wisata')
        ->whereIn('wisata.wisata_id', $wisataIds)
        ->where('wisata.bahasa', $sessions)
        ->leftJoin('countrating', 'wisata.wisata_id', '=', 'countrating.wisata_id')
        ->select('wisata.created_at', 'wisata.wisata_id', 'wisata.namawisata', 'wisata.image', 'wisata.label', 'wisata.durasi', 'wisata.IDR', 'wisata.image2', 'wisata.discount', 'wisata.kategories', 'wisata.capacity', 'wisata.IDR_awal', 'wisata.slug', 'countrating.totalrating')
        ->orderBy('countrating.totalrating', 'DESC')
        ->get()->take(4);

    $travel = DB::table('tambahlocation')
        ->where('slugregion',$slugcity)
        ->where('bahasa',$sessions)
        ->leftJoin('wisata', 'tambahlocation.wisata_id', '=', 'wisata.wisata_id')
        ->leftJoin('tambahseason', 'tambahlocation.wisata_id', '=', 'tambahseason.wisata_id')
        ->where('tambahseason.season_id', $namaseason)
        ->select('wisata.wisata_id','wisata.namawisata', 'wisata.label','wisata.durasi','wisata.IDR','wisata.image2','wisata.discount','wisata.kategories','wisata.capacity','wisata.IDR_awal','wisata.slug','tambahlocation.slugregion')
        ->leftJoin('countrating', 'wisata.wisata_id', '=', 'countrating.wisata_id')
        ->select('wisata.created_at','wisata.wisata_id','wisata.namawisata','wisata.image','countrating.totalrating', 'wisata.label','wisata.durasi','wisata.IDR','wisata.image2','wisata.discount','wisata.kategories','wisata.capacity','wisata.IDR_awal','wisata.slug')
        ->orderBy('countrating.totalrating','DESC')
        ->paginate(8);
        // $travel=$travel->paginate(8);
        return view('frontend.city', compact('slugcity','cityid','seasonactive','destination','city','regions','province','bahasa','session','season','count','other','rateEUR','rateIDR','rateSGD','rateMYR','session','season','sessions','travel'));

}

public function filterseasondestination($idcategory, $namaseason,Request $request){
    $season = season::get();
    $bahasa=bahasa::get();
    $lang=$request->server('HTTP_ACCEPT_LANGUAGE');
     $langs=Str::substr($lang, 0,2);
    if ($langs == 'id') {
    $sessions = session()->get("bahasa") ?? "Bahasa";
    
    }elseif ($langs == 'en-US'){
    $sessions = session()->get("bahasa") ?? "English";
    
    }elseif ($langs == 'en'){
    $sessions = session()->get("bahasa") ?? "English";
    }
    elseif ($langs == 'ms'){
    $sessions = session()->get("bahasa") ?? "Malay";
    }
    else{
    $sessions = session()->get("bahasa") ?? "English";     
    }
    
    $rateIDR = Rate::where("currency", "IDR")->first()->rate;
    $rateSGD = Rate::where("currency", "SGD")->first()->rate;
    $rateMYR = Rate::where("currency", "MYR")->first()->rate;
    $rateEUR = Rate::where("currency", "EUR")->first()->rate;
    // get session user
    $session = session()->get("rate") ?? "USD";
    $destinate = destination::get();
    $destinasi  = destination::where('id',$idcategory)->get();
    $destinasiid = destination::where('id',$idcategory)->first();
    $categoryid = $destinasiid->id; 
    $seasonactive=$namaseason;
    // get session user
    $session = session()->get("rate") ?? "USD";
    $province=province::get();
    $city=region::get();
    $category = destination::where('id', $idcategory)->get();
    $count = tambahdestinasi::where('destinasi_id',$idcategory)->get();
    // $other = travel::where('bahasa', $sessions)->paginate(4);
    $destination = DB::table('tambahdestinasi')
        ->where('destinasi_id',$idcategory)
        ->where('bahasa',$sessions)
        ->leftJoin('wisata', 'tambahdestinasi.wisata_id', '=', 'wisata.wisata_id')
        ->leftJoin('tambahseason', 'tambahdestinasi.wisata_id', '=', 'tambahseason.wisata_id')
        ->where('tambahseason.season_id', $namaseason)
        ->select('wisata.wisata_id','wisata.namawisata', 'wisata.label','wisata.durasi','wisata.IDR','wisata.image2','wisata.discount','wisata.kategories','wisata.capacity','wisata.IDR_awal','wisata.slug')
        ->leftJoin('countrating', 'wisata.wisata_id', '=', 'countrating.wisata_id')
        ->select('wisata.created_at','wisata.wisata_id','wisata.namawisata','wisata.image','countrating.totalrating', 'wisata.label','wisata.durasi','wisata.IDR','wisata.image2','wisata.discount','wisata.kategories','wisata.capacity','wisata.IDR_awal','wisata.slug')
        ->orderBy('countrating.totalrating','DESC')
        ->paginate(8);
        
        $categoryids = tambahdestinasi::where('destinasi_id', $idcategory)->pluck('wisata_id');
        $wisatacategoryId = $categoryids->toArray();
        $other = DB::table('wisata')
        ->where('wisata.wisata_id','!=' , $wisatacategoryId)
        ->where('wisata.bahasa', $sessions)
        ->leftJoin('countrating', 'wisata.wisata_id', '=', 'countrating.wisata_id')
        ->select('wisata.created_at', 'wisata.wisata_id', 'wisata.namawisata', 'wisata.image', 'wisata.label', 'wisata.durasi', 'wisata.IDR', 'wisata.image2', 'wisata.discount', 'wisata.kategories', 'wisata.capacity', 'wisata.IDR_awal', 'wisata.slug', 'countrating.totalrating')
        ->orderBy('countrating.totalrating', 'DESC')
        ->get()
        ->take(4);
        // $destination=$destination->paginate(8);
        return view('frontend.destinationcategory', compact('categoryid','seasonactive','city','province','category','count','destination','other','rateEUR','rateIDR','rateSGD','rateMYR','session','destinate','destinasi','season','bahasa','session','sessions'));

}



}