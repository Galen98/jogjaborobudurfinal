<?php

namespace App\Http\Controllers;
use Cviebrock\EloquentSluggable\Sluggable;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\blog;
use App\Models\travel;
use App\Models\tags;
use App\Models\tambahtags;
use App\Models\coment;
use App\Models\includes;
use App\Models\excludes;
use App\Models\highlight;
use App\Models\harga;
use App\Models\subwisata;
use App\Models\waktu;
use App\Models\background;
use App\Models\hargachild;
use App\Models\tambahdestinasi;
use App\Models\Rate;
use App\Models\bahasa;
use App\Models\tambahseason;
use App\Models\season;
use App\Models\rating;
use App\Models\booking;
use App\Models\destination;
// use Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function insertblog(Request $request){
        $judul = request('judulartikel');
        $bahasa=request('bahasa');
        $isi = request('isi');
        $gambar= request('image');
        $kategori= request('kategori');
        $tagx=request('tags');
        $author= request('author');
        $short=request('short');
        $nama_file = time()."_".$gambar->getClientOriginalName();
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'public/img';
        $gambar->move($tujuan_upload,$nama_file);
        
        $data=[
            'judulblog'=>$judul,
            'deskripsi'=>$isi,
            'image'=>$nama_file,
            'author'=>$author,
            'shortdescription'=>$short,
            'bahasa'=>$bahasa,
            'slug'=>\Str::slug($request->judulartikel)
        ];

        $blog=blog::create($data);

        //tags baru
        if ($kategori == null) {
            $data = [
            'idblog'=>$blog->id,
            'tags'=>$tagx
            ];
            foreach($tagx as $index){
            $data['tags']=$index;
            tambahtags::create($data);
            }
            
        } else{
           $data=[
            'tags'=>$kategori
        ];
        $tags=tags::create($data);
        
        $data=[
            'idblog'=>$blog->id,
            'tags'=>$tags->tags,
        ];
        $tambahtags=tambahtags::create($data); 
        }
    
        Alert::success('Blog Berhasil Ditambahkan');
        return redirect()->to('/blog');
    }
    
    public function hapusblog(Request $request,$idblog){
        $idblog=Request('idblog');
        DB::table('blog')->where('id',$idblog)->delete();
        DB::table('tambahtags')->where('idblog',$idblog)->delete();
        Alert::error('Blog Telah Dihapus');
        return redirect()->to('/blogadmin');
    }

    public function hapusinfluencer(Request $request,$idinfluencer){
        $idinfluencer=Request('idinfluencer');
        DB::table('influencer')->where('id',$idinfluencer)->delete();
        Alert::error('Sukses');
        return redirect()->back();
    }

    public function sharefacebookblog(){
        Share::currentPage()->whatsapp();
    }

    public function bookinglist(){
        // $booking=booking::orderBy('created_at','DESC')->paginate(10);

        $booking = DB::table('booking')
        ->join('wisata', 'wisata.wisata_id', '=', 'booking.wisata_id')
        ->select('wisata.image', 'booking.id', 'booking.paketwisata', 'booking.total','booking.traveldate','booking.namawisata','booking.name','booking.surname','booking.created_at','booking.phone','booking.code','booking.email','booking.country','booking.adult','booking.totalgroup','booking.child','booking.time','booking.request','booking.pickup')
        ->orderBy('created_at','DESC')
        ->paginate(10);
        return view('booking', compact('booking'));
    }

    public function showdetailbooking($BookingID){
        $Booking=DB::table('booking')->where('id',$BookingID)->first();
        return response()->json([
        'status'=>200,
        'Booking'=>$Booking
        ]);
    }

    public function hapusoption(Request $request,$idoption){
        $idoption=Request('idoption');
        DB::table('subwisata')->where('id',$idoption)->delete();
        DB::table('hargabaru')->where('subwisata_id',$idoption)->delete();
        DB::table('harga_child')->where('subwisata_id',$idoption)->delete();
        Alert::error('Sukses');
        return redirect()->back();
    }

    public function hapusmessage(Request $request,$idmessage){
        $idmessage=Request('idmessage');
        DB::table('message')->where('id',$idmessage)->delete();
        Alert::error('Sukses');
        return redirect()->back();
    }

    public function hapusbooking(Request $request,$bookingid){
        $bookingid=Request('bookingid');
        DB::table('booking')->where('id',$bookingid)->delete();
        Alert::error('Sukses');
        return redirect()->back();
    }


    public function hapusdiscount(Request $request,$idcorporate){
        $idcorporate=Request('idcorporate');
        DB::table('corporate')->where('id',$idcorporate)->delete();
        Alert::error('Berhasil Dihapus');
        return redirect()->back();
    }

    public function hapustravelagent(Request $request,$idtravelagent){
        $idtravelagent=Request('idtravelagent');
        DB::table('travelagent')->where('id',$idtravelagent)->delete();
        Alert::error('Berhasil Dihapus');
        return redirect()->back();
    }

    public function hapusinclude($idinclude){
        $include=includes::where('id',$idinclude)->delete();
        Alert::error('Berhasil Dihapus');
        return redirect()->back();
    }

    public function hapuswaktu($idtime){
        $waktu=waktu::where('id',$idtime)->delete();
        Alert::error('Berhasil Dihapus');
        return redirect()->back();
    }

    public function hapusexclude($idexclude){
        excludes::where('id',$idexclude)->delete();
        Alert::error('Berhasil Dihapus');
        return redirect()->back();
    }

     public function hapushighlight($idhighlight){
        highlight::where('id',$idhighlight)->delete();
        Alert::error('Berhasil Dihapus');
        return redirect()->back();
    }

    public function hapuswisata(Request $request,$idwisata){
        $idwisata=Request('idwisata');
        DB::table('wisata')->where('wisata_id',$idwisata)->delete();
        DB::table('include')->where('wisata_id',$idwisata)->delete();
        DB::table('exclude')->where('wisata_id',$idwisata)->delete();
        DB::table('tambahdestinasi')->where('wisata_id',$idwisata)->delete();
        DB::table('waktu')->where('wisata_id',$idwisata)->delete();
        DB::table('subwisata')->where('wisata_id',$idwisata)->delete();
        DB::table('hargabaru')->where('wisata_id',$idwisata)->delete();
        DB::table('hargachild')->where('wisata_id',$idwisata)->delete();
        DB::table('tambahseason')->where('wisata_id',$idwisata)->delete();

        //DB::table('highlight')->where('wisata_id',$idwisata)->delete();
        Alert::error('Berhasil Dihapus');
        return redirect()->back();
    }

    public function showhapusblog($BlogID){
        $Blog=DB::table('blog')->where('id',$BlogID)->first();
        return response()->json([
        'status'=>200,
        'Blog'=>$Blog
        ]);
    }

    public function showhapuslanguage($LanguageID){
        $Language=DB::table('bahasa')->where('id',$LanguageID)->first();
        return response()->json([
        'status'=>200,
        'Language'=>$Language
        ]);
    }

    public function showeditoption($OptionID){
        $Option=DB::table('subwisata')->where('id',$OptionID)->first();
        return response()->json([
        'status'=>200,
        'Option'=>$Option
        ]);
    }

    public function showeditdestination($DestinationID){
        $Destination=DB::table('destination')->where('id', $DestinationID)->first();
        return response()->json([
        'status'=>200,
        'Destination'=>$Destination
        ]);
    }

    public function showeditdestinasi($DestinasiID){
        $Destinasi=DB::table('tambahdestinasi')->where('id',$DestinasiID)->first();
        return response()->json([
        'status'=>200,
        'Destinasi'=>$Destinasi
        ]);
    }

    public function showeditseason($SeasonID){
        $Season=DB::table('tambahseason')->where('id',$SeasonID)->first();
        return response()->json([
        'status'=>200,
        'Season'=>$Season
        ]);
    }

    public function showeditharga($HargaID){
        $Harga=DB::table('hargabaru')->where('id',$HargaID)->first();
        return response()->json([
        'status'=>200,
        'Harga'=>$Harga
        ]);
    }

    public function showeditinclude($IncludeID){
        $Include=DB::table('include')->where('id',$IncludeID)->first();
        return response()->json([
        'status'=>200,
        'Include'=>$Include
        ]);
    }

    public function showeditjam($JamID){
        $Jam=DB::table('waktu')->where('id',$JamID)->first();
        return response()->json([
        'status'=>200,
        'Jam'=>$Jam
        ]);
    }

    public function showeditexclude($ExcludeID){
        $Exclude=DB::table('exclude')->where('id',$ExcludeID)->first();
        return response()->json([
        'status'=>200,
        'Exclude'=>$Exclude
        ]);
    }

    public function showedithighlight($HighlightID){
        $Highlight=DB::table('highlight')->where('id',$HighlightID)->first();
        return response()->json([
        'status'=>200,
        'Highlight'=>$Highlight
        ]);
    }

    public function updateharga(Request $request,$idharga){
        $idharga = Request('idharga');
       $Harga = harga::where('id', $idharga)
       ->update([
        'min' => $request->person,
        'maks' => $request->range,
        'harga' => $request->harga,
       ]);       
    }

    public function updatecategory(Request $request,$iddestination){
        $iddestination = Request('iddestination');
       $Destination = destination::where('id', $iddestination)
       ->update([
        'destination' => $request->destination,
        'shortdescription' => $request->short
       ]);       
    }

    public function updatetheme(Request $request,$idtheme){
        $idtheme = Request('idtheme');
       $Theme = season::where('id', $idtheme)
       ->update([
        'namaseason' => $request->theme,
       ]);       
    }

    public function updateoption(Request $request,$idoption){
        $idoption = Request('idoption');
        $Option = subwisata::where('id',$idoption)
        ->update([
            'judulsub'=>$request->judulsub,
            'short'=>$request->short,
            'kategories'=>$request->personoption
        ]);

        harga::where('subwisata_id', $idoption)
        ->update([
            'kategories'=>$request->personoption
        ]);
    }

    public function showedithargachild($ChildID){
        $Child=DB::table('harga_child')->where('id',$ChildID)->first();
        return response()->json([
        'status'=>200,
        'Child'=>$Child
        ]);
    }

    public function updatehargachild(Request $request,$idhargachild){
        $idhargachild = Request('idhargachild');
       $Child = hargachild::where('id', $idhargachild)
       ->update([
        'min' => $request->personchild,
        'maks' => $request->rangechild,
        'harga' => $request->hargachild,
       
       ]);
               
    }

    public function updateinclude(Request $request,$idinclude){
        $idinclude = Request('idinclude');
       $Include = includes::where('id', $idinclude)
       ->update([
        'include' => $request->include
       ]);
               
    }

    public function updatedestinasi(Request $request, $iddestination){
        $iddestination = Request('iddestination');
       $Destination = tambahdestinasi::where('id', $iddestination)
       ->update([
        'destinasi_id' => $request->destinasi
       ]);
               
    }

    public function updateseason(Request $request, $idseason){
        $idseason = Request('idseason');
       $Season = tambahseason::where('id', $idseason)
       ->update([
        'season_id' => $request->season
       ]);
               
    }

    public function updatetime(Request $request,$idtime){
        
        $idtime = Request('idtime');
       $Time = waktu::where('id', $idtime)
       ->update([
        'time' => $request->time
       ]);
               
    }

    public function updateexclude(Request $request,$idexclude){
        
        $idexclude = Request('idexclude');
       $Exclude = excludes::where('id', $idexclude)
       ->update([
        'exclude' => $request->exclude
       ]);
               
    }

    public function updatehighlight(Request $request,$idhighlight){
        
        $idhighlight = Request('idhighlight');
       $Highlight = highlight::where('id', $idhighlight)
       ->update([
        'highlight' => $request->highlight
       ]);
               
    }

    public function addinclude(Request $request){
        $idtravel=Request('idtravel');
        $include=Request('include');
        $data=[
            'wisata_id'=>$idtravel,
            'include'=>$include
        ];
        includes::create($data);
    }

    public function addtime(Request $request){
        $idtravel=Request('idtravel');
        $time=Request('time');
        $data=[
            'wisata_id'=>$idtravel,
            'time'=>$time
        ];
        waktu::create($data);
    }


    public function addexclude(Request $request){
        $idtravel=Request('idtravel');
        $exclude=Request('exclude');
        $data=[
            'wisata_id'=>$idtravel,
            'exclude'=>$exclude
        ];
        excludes::create($data);
    }

    public function addhighlight(Request $request){
        $idtravel=Request('idtravel');
        $highlight=Request('highlight');
        $data=[
            'wisata_id'=>$idtravel,
            'highlight'=>$highlight
        ];
        highlight::create($data);
    }

    public function showeditcurrency($RateID){
        $Rate=DB::table('rates')->where('id',$RateID)->first();
        return response()->json([
        'status'=>200,
        'Rate'=>$Rate
        ]);
    }

    public function showedittheme($ThemeID){
        $Theme=DB::table('season')->where('id',$ThemeID)->first();
        return response()->json([
        'status'=>200,
        'Theme'=>$Theme
        ]);
    }

    public function updatecurrency(Request $request,$idrate){
        $idrate = Request('idrate');
       $Rate = Rate::where('id', $idrate)
       ->update([
        'rate' => $request->rate,
       ]);
               
    }

    public function showhapuscorporate($CorporateID){
        $Corporate=DB::table('corporate')->where('id',$CorporateID)->first();
        return response()->json([
        'status'=>200,
        'Corporate'=>$Corporate
        ]);
    }

    public function showhapustravelagent($TravelagentID){
        $Travel=DB::table('travelagent')->where('id',$TravelagentID)->first();
        return response()->json([
        'status'=>200,
        'Travel'=>$Travel
        ]);
    }

    public function showhapusmessage($MessageID){
        $Message=DB::table('message')->where('id',$MessageID)->first();
        return response()->json([
        'status'=>200,
        'Message'=>$Message
        ]);
    }


    public function showhapusinfluencer($InfluencerID){
        $Influencer=DB::table('influencer')->where('id',$InfluencerID)->first();
        return response()->json([
        'status'=>200,
        'Influencer'=>$Influencer
        ]);
    }

    public function showhapuswisata($WisataID){
        $Travel=DB::table('wisata')->where('wisata_id',$WisataID)->first();
        return response()->json([
        'status'=>200,
        'Travel'=>$Travel
        ]);
    }



    public function viewblog($idblog){
        $blog = DB::table('blog')->where('id', $idblog)->get();
        return view('viewblog',compact('blog'));
    }

    public function editblog($idblog){
        $blog = DB::table('blog')->where('id', $idblog)->get();
        return view('editblog',compact('blog'));
    }

    public function editwisata($idwisata){
        $destinasi=destination::get();
        $seasonadd=season::get();
        $destination =DB::table('tambahdestinasi')->where('wisata_id',$idwisata)
            ->leftJoin('destination', 'tambahdestinasi.destinasi_id', '=', 'destination.id')
            ->select('destination.destination','tambahdestinasi.id')->get();
        $season =DB::table('tambahseason')->where('wisata_id',$idwisata)
            ->leftJoin('season', 'tambahseason.season_id', '=', 'season.id')
            ->select('season.namaseason','tambahseason.id')->get();
        $travel=DB::table('wisata')->where('wisata_id',$idwisata)->get();
        $include=DB::table('include')->where('wisata_id',$idwisata)->get();
        $exclude=DB::table('exclude')->where('wisata_id',$idwisata)->get();
        $highlight=DB::table('highlight')->where('wisata_id',$idwisata)->get();
        $jam=DB::table('waktu')->where('wisata_id',$idwisata)->get();
        $tambahseason=tambahseason::where('wisata_id',$idwisata)->get();

        return view('editwisata',compact('travel','include','exclude','destination','highlight','jam','destinasi','season','seasonadd'));
    }

    public function editblogproses(Request $request,$idblog){
        // $gambar= request('image');
        // $nama_file = time()."_".$gambar->getClientOriginalName();
      	//         // isi dengan nama folder tempat kemana file diupload
		// $tujuan_upload = 'public/img';
        // $gambar->move($tujuan_upload,$nama_file);
        DB::table('blog')->where('id',$idblog)
        ->update([
            'judulblog'=>$request->judulartikel,
            'deskripsi'=>$request->isi,
            'shortdescription'=>$request->short,
            'slug'=>\Str::slug($request->judulartikel)
            // 'image'=>$$nama_file
        ]);
        Alert::success('Berhasil','Berhasil Diupdate');
        return redirect()->to('/blog');
    }

    public function editproseswisata(Request $request,$idwisata){

        DB::table('wisata')->where('wisata_id',$idwisata)
        ->update([
            'namawisata'=>$request->namawisata,
            'durasi'=>$request->duration,
            'label'=>$request->label,
            'shortdescription'=>$request->shortdescription,
            'deskripsi_english'=>$request->isieng,
            'pickup'=>$request->airport,
            'wherepickup'=>$request->wherepickup,
            'capacity'=>$request->capacity,
            'slug'=>\Str::slug($request->namawisata)

        ]);
        Alert::success('Berhasil','Berhasil Diupdate');
        return redirect()->to('/paketwisata');
    }

    public function editprosesinclude(Request $request){
        
    }



    public function landingpageblog(Request $request){
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
        $banner=blog::orderBy('created_at','DESC')->where('bahasa',$sessions)->paginate(1);
        $blog2=DB::table('blog')->orderBy('created_at','DESC')->where('bahasa', $sessions)->paginate(6);
        $language=bahasa::get();
        $popular=DB::table('blog')->where('bahasa', $sessions)->paginate(4);
        $tags=DB::table('tags')->get();
        $today=blog::whereMonth(
        'created_at',
        Carbon::now()->format('m')
    )->where('bahasa', $sessions)->get();
        return view('blogjogjaborobudur.content', compact('blog2','today','popular','tags','language','banner'));
    }

    public function listblog(Request $request){
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
        $blog=DB::table('blog')->where('bahasa', $sessions)->paginate(6);
        $tagx=DB::table('tags')->get();
        $language=bahasa::get();
        return view('blogjogjaborobudur.allblog',compact('blog','tagx','language'));
    }

    public function detailblog(Request $request,$slug){
        $currentURL = $request->url();
        
        $idblog=blog::where('slug',$slug)->pluck('id');
        $shareButtons1 = \Share::page(
                    $currentURL
               )
               ->facebook()
               ->twitter()
               ->telegram()
               ->whatsapp(); 

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
        $blog=DB::table('blog')->where('id',$idblog)->get();
        $tagblog=DB::table('tambahtags')->where('idblog',$idblog)->get();
        $popular=blog::where('bahasa', $sessions)->paginate(4);
        $tags=DB::table('tags')->get();
         $language=bahasa::get();
        $today=blog::whereMonth(
            'created_at',
            Carbon::now()->format('m')
        )->where('bahasa', $sessions)->get();

        $similar=DB::table('tambahtags')->where('idblog',$idblog)->pluck('tags');
        //$similarity=tambahtags::whereIn('tags',$similar)->get();

        $similarblog=DB::table('blog')->select(['blog.id','blog.judulblog','blog.image','blog.created_at','blog.author','blog.slug'])
        ->join('tambahtags', 'tambahtags.idblog', '=', 'blog.id')
        ->where('tambahtags.tags',$similar)->where('bahasa', $sessions)
        ->get();

        return view('blogjogjaborobudur.view',compact('shareButtons1','blog','popular','tagblog','tags','today','popular','similarblog','language'));
    }

    public function tagsview(Request $request,$tagsid){
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
        $language=bahasa::get();
        $tagx=DB::table('tags')->get();
        $tags=DB::table('tags')->where('tags',$tagsid)->get('tags');
        $similarblog=DB::table('blog')->select(['blog.id','blog.judulblog','blog.image','blog.created_at','blog.author','blog.shortdescription','blog.slug'])
        ->join('tambahtags', 'tambahtags.idblog', '=', 'blog.id')
        ->where('tambahtags.tags',$tagsid)->where('bahasa', $sessions)
        ->paginate(8);
        return view('blogjogjaborobudur.tags',compact('tags','similarblog','tagx','language'));
    }

    public function insertcomment(Request $request){
        $idblog=$request->id;
        $nama=$request->nama;
        $komentar=$request->coment;
        $data=[
            'id'=>$idblog,
            'nama'=>$nama,
            'komentar'=>$komentar
        ];
        coment::create($data);
        return redirect()->back();
    }

    public function allblog(){
        $all=blog::paginate(5);
        $popular=DB::table('blog')->paginate(6);
        $today=Carbon::now();
        echo $today->month;
        $blogs=blog::whereMonth('created_at',$today)->paginate(6);
        return view('blogs.allblog',compact('all','popular','blogs'));

    }

    public function diskon($travelid){
        $option = subwisata::where('wisata_id', $travelid)->get();
        $options = subwisata::where('wisata_id', $travelid)->get('id');
        //$hargaoption = harga::where('wisata_id',$idtravel)->get();
        $pilihan = subwisata::whereIN('id', $options)->get();
        $harganew = harga::whereIN('subwisata_id', $options)->get();
        $hargachildnew = hargachild::whereIN('subwisata_id', $options)->get();
        $travel=travel::where('wisata_id',$travelid)->get();
        $harga=harga::where('wisata_id',$travelid)->get();
        $hargachild=hargachild::where('wisata_id',$travelid)->get();
        return view('diskon', compact('travel','harga','hargachild','pilihan','harganew','hargachildnew'));
    }

    public function buatoption($travelid){
        $idwisata=travel::where('wisata_id', $travelid)->get();
        return view('formoption',compact('idwisata'));
    }

    public function insertoption(Request $request){
        $travelid = Request('idtravel');
        $shortoption = Request('shortoption');
        $namaoption = Request('namaoption');
        $personoption = Request('personoption');
        $time = request('time');
        $personrange = request('singlepersonrange');
        $pricerange= request('hargarange');
        $range= request('to');
        $childoption=Request('childoption');
        $childrange= request('singlechildrange');
        $childrange= request('singlechildrange');

        $data = [
                'wisata_id' => $travelid,
                'judulsub' => $namaoption,
                'short'=>$shortoption,
                'kategories'=>$personoption,
                'child'=>$childoption
            ];

            $option=subwisata::create($data);
            

            $data = [
                'wisata_id'=> $travelid,
                'subwisata_id' => $option->id,
                'time'=>$time,  
                ];

                foreach($time as $index){
                $data['time']=$index;
                waktu::create($data);
                }

                if ($childoption == 'yes') {

                $data = [
                'wisata_id'=> $travelid,
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
                'wisata_id'=> $travelid,
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
                return redirect()->back();
    }

    public function diskonpost(Request $request,$travelid){
        $discount=Request('discount');
        $idr=Request('idr');
        $idrdiscount=Request('idrdiscount');
        $idtravel=travel::where('wisata_id',$travelid)->get();

        DB::table('wisata')->where('wisata_id',$travelid)
        ->update([
            'discount'=>$discount,
            'IDR_awal'=>$idr,
            'IDR'=>$idrdiscount
        ]);
        Alert::success('Berhasil','Berhasil Diupdate');
        return redirect()->back();
    }

    public function kelolarating(){
        $travel=travel::paginate(10);
        return view('rating',compact('travel'));
    }

    public function ratingwisata($idtravel){
        $travel=rating::where('wisata_id',$idtravel)->paginate(10);
        $namatravel=travel::where('wisata_id',$idtravel)->first('namawisata');
        return view('ratingwisata',compact('travel','namatravel'));
    }

    public function deleterating($idrating){
        $rating=rating::where('id',$idrating)->delete();
        Alert::error('Berhasil Dihapus');
        return redirect()->back();
    }

    public function deletetheme($idtheme){
        $theme=season::where('id',$idtheme)->delete();
        Alert::error('Berhasil Dihapus');
        return redirect()->back();
    }

    public function deletedestination($iddestination){
        $destination=destination::where('id',$iddestination)->delete();
        Alert::error('Berhasil Dihapus');
        return redirect()->back();
    }


    public function addbahasa(Request $request){
        $bahasa=Request('bahasa');
        $data=[
            'bahasa'=>$bahasa
        ];
        bahasa::create($data);
        Alert::success('Berhasil');
        return redirect()->back();
    }

    public function hapusbahasa(Request $request,$idlanguage){
        $idlanguage=$request->idlanguage;
        $bahasa=DB::table('bahasa')->where('id', $idlanguage)->delete();
        Alert::error('Berhasil Dihapus');
        return redirect()->back();
    }

    public function insertdestinationcategory(Request $request){
        $destination=$request->kategori;
        $short=$request->shortdescription;
        // $request->validate([
        //  'image' => 'required|mimes:jpeg,png,jpg'
        // ]);
        $img= request('image');
        $nama_file = time()."_".$img->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
        $gambar = Image::make($img);
        $gambar->resize(600,600);
        $tujuan_upload = 'public/img/';
        $gambar->save($tujuan_upload .$nama_file); 

        $data = [
            'destination'=>$destination,
            'shortdescription'=>$short,
            'image'=>$nama_file
        ];
        destination::create($data);
        Alert::success('Berhasil Ditambahkan');
        return redirect()->to('/destination-category');
        

    }

    public function insertseason(Request $request){
        $season = $request->namaseason;
        $data = [
            'namaseason'=>$season

        ];

        season::create($data);
        Alert::success('Berhasil Ditambahkan');
       return redirect()->to('/season');
    }

}