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
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Intervention\Image\ImageManagerStatic as Image;
use Cviebrock\EloquentSluggable\Sluggable;

class TravelController extends Controller
{
   public function inserttravel(Request $request){
        $season = Request('season');
        $province = Request('province');
        $region = Request('region');
        $namawisata = request('namawisata');
        $durasi = request('durasi');
        $label = request('label');
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
        $nama_file = time()."_".$img->getClientOriginalName();
		$tujuan_upload = 'public/img';
        $img->move($tujuan_upload,$nama_file);
		 
        //  $request->validate([
        //  'image2' => 'required|mimes:jpeg,png,jpg'
        // ]);
        $img2= request('image2');
        $nama_file2 = time()."_".$img2->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'public/img';
        $img2->move($tujuan_upload,$nama_file2);

        //  $request->validate([
        //  'image3' => 'required|mimes:jpeg,png,jpg'
        // ]);
        $img3= request('image3');
        $nama_file3 = time()."_".$img3->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'public/img';
        $img3->move($tujuan_upload,$nama_file3); 

        //  $request->validate([
        //  'image4' => 'required|mimes:jpeg,png,jpg'
        // ]);
        $img4= request('image4');
        $nama_file4 = time()."_".$img4->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'public/img';
        $img4->move($tujuan_upload,$nama_file4); 
         
        //   $request->validate([
        //  'image5' => 'required|mimes:jpeg,png,jpg'
        // ]);
        $img5= request('image5');
        $nama_file5 = time()."_".$img5->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'public/img';
        $img5->move($tujuan_upload,$nama_file5);


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
            'image'=>$nama_file,
            'image2'=>$nama_file2,
            'image3'=>$nama_file3,
            'image4'=>$nama_file4,
            'image5'=>$nama_file5,
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
            'wisata_id'=> $travel->id,
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

        return view('frontend.booking',compact('namawisata','reviews','total','tanggaltravel','adult','child','group','totalgroup','country','waktu','idoption','idtravel','paketwisata'));
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
        // get session user
        $session = session()->get("rate") ?? "USD";
        $province=province::get();
        $category = destination::where('id', $idcategory)->get();
        $count = tambahdestinasi::where('destinasi_id',$idcategory)->get();
        $other = travel::where('bahasa', $sessions)->paginate(4);
        $destination = DB::table('tambahdestinasi')->where('destinasi_id',$idcategory)->where('bahasa',$sessions)
            ->leftJoin('wisata', 'tambahdestinasi.wisata_id', '=', 'wisata.wisata_id')
            ->select('wisata.wisata_id','wisata.namawisata', 'wisata.label','wisata.durasi','wisata.IDR','wisata.image2','wisata.discount','wisata.kategories','wisata.capacity','wisata.IDR_awal','wisata.slug')->get();
        return view('frontend.destinationcategory', compact('province','category','count','destination','other','rateEUR','rateIDR','rateSGD','rateMYR','session','destinate','destinasi','season','bahasa','session','sessions'));
    }

    public function province(Request $request,$idcategory){

    }

    public function seasons(Request $request,$idseason){
        $seasones = season::get();
        $bahasa=bahasa::get();
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
        $season = season::where('id', $idseason)->get();
        $count = tambahseason::where('season_id',$idseason)->get();
        $other = travel::where('bahasa', $sessions)->paginate(4);
        $seasons = DB::table('tambahseason')->where('season_id',$idseason)->where('bahasa', $sessions)
        ->leftJoin('wisata','tambahseason.wisata_id', '=', 'wisata.wisata_id')
        ->select('wisata.wisata_id','wisata.namawisata', 'wisata.label','wisata.durasi','wisata.IDR','wisata.image2','wisata.discount','wisata.kategories','wisata.capacity','wisata.IDR_awal','wisata.slug')->get();
        return view('frontend.season', compact('province','seasones','other','rateEUR','rateIDR','rateSGD','rateMYR','session','destinate','season','seasons','count','bahasa','session','sessions'));
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
  
    // $English = travel::where("bahasa",$sessions)->first()->bahasa;
    $province=province::get();
    $travel=travel::orderBy('created_at','DESC')->where('bahasa',$sessions)->paginate(8);
    $destination = province::all()->take(3);
    return view('frontend.destination', compact('seasones','travel','rateIDR','rateMYR','rateSGD','session','rateEUR','destination','destinate','bahasa','sessions','session','province'));
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
        $destination=destination::paginate(3);
        $travel = travel::where('slug',$slug)->get();
        $includes= includes::where('wisata_id',$idtravel)->get();
        $excludes= excludes::where('wisata_id',$idtravel)->get();
        $jam= waktu::where('wisata_id',$idtravel)->get();
        $value=rating::where('wisata_id',$idtravel)->paginate(8);
        $jumlahreview=rating::where('wisata_id',$idtravel)->count();
        $other=travel::where('label','Likely to sell out')->where('bahasa',$sessions)->paginate(4);
        return view('frontend.jajal', compact('seasones','provinces','travel','childoption','includes','excludes','other','value','jumlahreview',"rateIDR","rateMYR","rateSGD","session","rateEUR",'highlight','harga','destination','rangeharga','hargachild','jam','destinate','option','pilihan','harganew','options','hargachildnew','destinasi','season','bahasa','session','sessions','region','province')); 
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
        $rateIDR = Rate::where("currency", "IDR")->first()->rate;
        $rateSGD = Rate::where("currency", "SGD")->first()->rate;
        $rateMYR = Rate::where("currency", "MYR")->first()->rate;
        $rateEUR = Rate::where("currency", "EUR")->first()->rate;
        // get session user
        $session = session()->get("rate") ?? "USD";
        $seasones = season::get();
        // $English = travel::where("bahasa",$sessions)->first()->bahasa;
        $destinate=destination::get();
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
        return view('frontend.jajal', compact('seasones', 'provinces','travel','childoption','includes','excludes','other','value','jumlahreview',"rateIDR","rateMYR","rateSGD","session","rateEUR",'highlight','harga','destination','rangeharga','hargachild','jam','destinate','option','pilihan','harganew','options','hargachildnew','destinasi','season','bahasa','session','sessions','region','province')); 
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
        $rateIDR = Rate::where("currency", "IDR")->first()->rate;
        $rateSGD = Rate::where("currency", "SGD")->first()->rate;
        $rateMYR = Rate::where("currency", "MYR")->first()->rate;
        $rateEUR = Rate::where("currency", "EUR")->first()->rate;
        // get session user
        $session = session()->get("rate") ?? "USD";
        
        // $English = travel::where("bahasa",$sessions)->first()->bahasa;
        $destinate=destination::get();
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
        return view('frontend.jajal', compact('provinces','travel','childoption','includes','excludes','other','value','jumlahreview',"rateIDR","rateMYR","rateSGD","session","rateEUR",'highlight','harga','destination','rangeharga','hargachild','jam','destinate','option','pilihan','harganew','options','hargachildnew','destinasi','season','bahasa','session','sessions','region','province')); 
    }

    public function viewprovince(Request $request,$slugprovince,$idprovince){
        $province=province::get();
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
        $other = travel::where('bahasa', $sessions)->get()->take(4);
        $travel = DB::table('tambahprovince')->where('slugprovince',$slugprovince)->where('bahasa',$sessions)
        ->leftJoin('wisata', 'tambahprovince.wisata_id', '=', 'wisata.wisata_id')
        ->select('wisata.wisata_id','wisata.namawisata', 'wisata.label','wisata.durasi','wisata.IDR','wisata.image2','wisata.discount','wisata.kategories','wisata.capacity','wisata.IDR_awal','wisata.slug','tambahprovince.slugprovince')->paginate(8);
        
        return view('frontend.province', compact('provinces','province','bahasa','session','season','count','other','rateEUR','rateIDR','rateSGD','rateMYR','session','season','sessions','travel'));
    }

    public function viewcity(Request $request,$slugcity){
        $province=province::get();
        $regions=region::where('slugregion',$slugcity)->get();
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
        $count = tambahlocation::where('slugregion',$slugcity)->get();
        $other = travel::where('bahasa', $sessions)->get()->take(4);
        $travel = DB::table('tambahlocation')->where('slugregion',$slugcity)->where('bahasa',$sessions)
        ->leftJoin('wisata', 'tambahlocation.wisata_id', '=', 'wisata.wisata_id')
        ->select('wisata.wisata_id','wisata.namawisata', 'wisata.label','wisata.durasi','wisata.IDR','wisata.image2','wisata.discount','wisata.kategories','wisata.capacity','wisata.IDR_awal','wisata.slug','tambahlocation.slugregion')->paginate(8);
        
        return view('frontend.city', compact('regions','province','bahasa','session','season','count','other','rateEUR','rateIDR','rateSGD','rateMYR','session','season','sessions','travel'));
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

public function totalprice(Request $request){
    
}

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



}