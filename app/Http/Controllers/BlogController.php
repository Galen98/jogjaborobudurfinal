<?php

namespace App\Http\Controllers;
use Cviebrock\EloquentSluggable\Sluggable;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\blog;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReviewSendLink;
use Illuminate\Support\Facades\Storage;
use App\Models\travel;
use App\Models\tags;
use Illuminate\Support\Facades\File; 
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
use App\Models\tambahprovince;
use App\Models\tambahlocation;
use App\Models\Rate;
use App\Models\bahasa;
use App\Models\importants;
use App\Models\tambahseason;
use App\Models\season;
use App\Models\rating;
use App\Models\booking;
use App\Models\destination;
use App\Models\affiliate;
use App\Models\platform;
use App\Models\region;
use App\Models\province;
use App\Models\reviews;
use App\Models\countrating;
// use Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
class BlogController extends Controller
{
    public function insertblog(Request $request){
        $tags=request('tags');
        $judul = request('judulartikel');
        $bahasa=request('bahasa');
        $isi = request('isi');
        $gambar= request('image');
        $kategori= request('kategori');
        $tagx=request('tags');
        $author= request('author');
        $short=request('short');
        $img= $request->image;
       
        if($gambar == null){
            $data=[
                'judulblog'=>$judul,
                'deskripsi'=>$isi,
                'image'=>"null",
                'author'=>$author,
                'shortdescription'=>$short,
                'bahasa'=>$bahasa,
                'slug'=>\Str::slug($request->judulartikel)
            ];
    
            $blog = blog::create($data);
        }
        else{
            $image = Image::make($img->getRealPath());
            $image->resize(500, 750, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $nama_file = time() . "_" . $img->getClientOriginalName();
            $tujuan_upload = 'public/img';
            // Konversi dan simpan ke format WebP
            $image->encode('webp', 80)->save(($tujuan_upload . '/' . pathinfo($nama_file, PATHINFO_FILENAME) . '.webp'));
        
        $data=[
            'judulblog'=>$judul,
            'deskripsi'=>$isi,
            'image'=>pathinfo($nama_file, PATHINFO_FILENAME) . '.webp',
            'author'=>$author,
            'shortdescription'=>$short,
            'bahasa'=>$bahasa,
            'slug'=>\Str::slug($request->judulartikel)
        ];

        $blog=blog::create($data);
        }
        

        $data = [
            'idblog'=> $blog->id,
            'tags'=>$tags,
        ];
        foreach($tags as $index){
            $data['tags']=$index;
            tambahtags::create($data);
            }
        
        // $data=[
        //     'idblog'=>$blog->id,
        //     'tags'=>$tags->tags,
        // ];
        // $tambahtags=tambahtags::create($data); 
        // }
    
        Alert::success('Blog Success Ditambahkan');
        return redirect()->to('/blogadmin');
    }
    
    public function hapusblog(Request $request,$idblog){
        $idblog=Request('idblog');
        $images=blog::where('id',$idblog)->first();
        File::delete('public/img/'.$images->image);
        blog::where('id',$idblog)->delete();
        // DB::table('blog')->where('id',$idblog)->delete();   
        DB::table('tambahtags')->where('idblog',$idblog)->delete();
        Alert::error('Blog Telah Dihapus');
        return redirect()->to('/blogadmin');
    }

    public function hapusprovince(Request $request,$idprovince){
        $idprovince=Request('idprovince');
        $namaprovince=Request('namaprovince');
        $images=province::where('id',$idprovince)->first();
        File::delete('public/img/'.$images->image);
        province::where('id',$idprovince)->delete();
        $provinsiid=tambahprovince::where('namaprovince',$namaprovince)->first();
        if($provinsiid !== null){
            tambahlocation::where('tambahprovince_id', $provinsiid->id)->delete();
        }
        tambahprovince::where('namaprovince',$namaprovince)->delete();
        Alert::error('Telah Dihapus');
        return redirect()->to('/province');
    }

    public function hapusregion(Request $request,$idregions){
        $idregions=Request('idregions');
        $namaregiones=Request('namaregiones');
        $images=region::where('id',$idregions)->first();
        File::delete('public/img/'.$images->image);
        region::where('id',$idregions)->delete();
        tambahlocation::where('namaregion', $namaregiones)->delete();
        Alert::error('Telah Dihapus');
        return redirect()->to('/region');
    }

    public function hapustag(Request $request,$idtags){
        $idtags=Request('idtags');
        $tagblog=tags::where('id',$idtags)->pluck('tags');
        tambahtags::where('tags', $tagblog)->delete();
        tags::where('id',$idtags)->delete();
        Alert::error('Tag Telah Dihapus');
        return redirect()->to('/tag-blog');
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
        $booking = booking::where('token', null)
        ->orderBy('created_at','DESC')
        ->paginate(10);

        foreach ($booking as $record) {
            $traveldate = Carbon::createFromFormat('d/m/Y', $record->traveldate);
            $record->travelStatus = $traveldate->isPast() ? 'done' : 'active';
        }
        return view('booking', compact('booking'));
    }

    public function showdetailbooking($BookingID){
        $Booking=DB::table('booking')->where('id',$BookingID)->first();
        return response()->json([
        'status'=>200,
        'Booking'=>$Booking
        ]);
    }

    public function showdeleteprovince($ProvinceID){
        $Province=DB::table('province')->where('id',$ProvinceID)->first();
        return response()->json([
        'status'=>200,
        'Province'=>$Province
        ]);
    }

    public function showdeleteregion($RegionID){
        $City=DB::table('region')->where('id',$RegionID)->first();
        return response()->json([
        'status'=>200,
        'City'=>$City
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

    public function deletetambahprovince($idprovince){
        tambahprovince::where('id', $idprovince)->delete();
        tambahlocation::where('tambahprovince_id', $idprovince)->delete();
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
        Alert::error('Success Dihapus');
        return redirect()->back();
    }

    public function hapustravelagent(Request $request,$idtravelagent){
        $idtravelagent=Request('idtravelagent');
        DB::table('travelagent')->where('id',$idtravelagent)->delete();
        Alert::error('Success Dihapus');
        return redirect()->back();
    }

    public function hapusaffiliate(Request $request,$idaffiliate){
        $idaffiliate=Request('idaffiliate');
        DB::table('affiliate')->where('id',$idaffiliate)->delete();
        Alert::error('Success Dihapus');
        return redirect()->back();
    }


    public function hapusselltours(Request $request,$idselltours){
        $idselltours=Request('idselltours');
        DB::table('selltour')->where('id',$idselltours)->delete();
        Alert::error('Success Dihapus');
        return redirect()->back();
    }

    public function hapusplatform(Request $request,$idplatform){
        $idplatform=Request('idplatform');
        DB::table('platform')->where('id',$idplatform)->delete();
        Alert::error('Success Dihapus');
        return redirect()->back();
    }

    public function hapusinclude($idinclude){
        $include=includes::where('id',$idinclude)->delete();
        Alert::error('Success Dihapus');
        return redirect()->back();
    }

    public function hapuswaktu($idtime){
        $waktu=waktu::where('id',$idtime)->delete();
        Alert::error('Success Dihapus');
        return redirect()->back();
    }

    public function hapusexclude($idexclude){
        excludes::where('id',$idexclude)->delete();
        Alert::error('Success Dihapus');
        return redirect()->back();
    }

     public function hapushighlight($idhighlight){
        highlight::where('id',$idhighlight)->delete();
        Alert::error('Success Dihapus');
        return redirect()->back();
    }

    public function hapusseason($idseason){
        tambahseason::where('id',$idseason)->delete();
        Alert::error('Success Dihapus');
        return redirect()->back();
    }

    public function hapusdestination($iddestination){
        tambahdestinasi::where('id',$iddestination)->delete();
        Alert::error('Success Dihapus');
        return redirect()->back();
    }

    public function hapusimportant($idimportant){
        importants::where('id',$idimportant)->delete();
        Alert::error('Success Dihapus');
        return redirect()->back();
    }

    public function hapuswisata(Request $request,$idwisata){
        $idwisata=Request('idwisata');
        $images=travel::where('wisata_id', $idwisata)->first();
        File::delete('public/img/'.$images->image);
        File::delete('public/img/'.$images->image2);
        File::delete('public/img/'.$images->image3);
        File::delete('public/img/'.$images->image4);
        File::delete('public/img/'.$images->image5);
        DB::table('wisata')->where('wisata_id',$idwisata)->delete();
        DB::table('include')->where('wisata_id',$idwisata)->delete();
        DB::table('exclude')->where('wisata_id',$idwisata)->delete();
        DB::table('tambahdestinasi')->where('wisata_id',$idwisata)->delete();
        DB::table('tambahlocation')->where('wisata_id',$idwisata)->delete();
        DB::table('tambahprovince')->where('wisata_id',$idwisata)->delete();
        DB::table('review')->where('wisata_id',$idwisata)->delete();
        DB::table('countrating')->where('wisata_id',$idwisata)->delete();
        DB::table('waktu')->where('wisata_id',$idwisata)->delete();
        DB::table('subwisata')->where('wisata_id',$idwisata)->delete();
        DB::table('hargabaru')->where('wisata_id',$idwisata)->delete();
        DB::table('harga_child')->where('wisata_id',$idwisata)->delete();
        DB::table('tambahseason')->where('wisata_id',$idwisata)->delete();
        DB::table('highlight')->where('wisata_id',$idwisata)->delete();
        Alert::error('Success Dihapus');
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

    public function showedittambahprovince($ProvinceID){
        $Province=DB::table('tambahprovince')->where('id',$ProvinceID)->first();
        return response()->json([
        'status'=>200,
        'Province'=>$Province
        ]);
    }

    public function showedittambahlocation($CityID){
        $City=DB::table('tambahlocation')->where('id',$CityID)->first();
        return response()->json([
        'status'=>200,
        'City'=>$City
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

    public function showaddjam($SubID){
        $Sub=DB::table('subwisata')->where('id',$SubID)->first();
        return response()->json([
        'status'=>200,
        'Sub'=>$Sub
        ]);
    }


    public function deletetime($idjam){
        waktu::where('id',$idjam)->delete();
        Alert::error('Success Dihapus');
        return redirect()->back();
    }

    public function deletehargaperson($idperson){
        harga::where('id', $idperson)->delete();
        Alert::error('Success Dihapus');
        return redirect()->back();
    }

    public function deletehargachild($idchild){
        hargachild::where('id', $idchild)->delete();
        Alert::error('Success Dihapus');
        return redirect()->back();
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

    public function showeditimportant($ImportantID){
        $Important=DB::table('importants')->where('id',$ImportantID)->first();
        return response()->json([
        'status'=>200,
        'Important'=>$Important
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

    public function updatediskon(Request $request,$idtravell){
       $idtravell = Request('idtravell');
       
       $Diskon = travel::where('wisata_id', $idtravell)
       ->update([
        'IDR' => $request->idrdiscoun,
        'IDR_awal' => $request->idr
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

    public function updateprovince(Request $request,$provinceid){
       $provinceid = Request('provinceid');
       $namaprovince=$request->namaprovinsi;
       $Province = province::where('id', $provinceid)
       ->update([
        'namaprovince' => $request->namaprovinces,
        'shortdescription' => $request->shorts,
        'slugprovince'=>\Str::slug($request->namaprovinces)
       ]);
       $addprovince = tambahprovince::where('namaprovince',$namaprovince)
       ->update([
        'namaprovince' => $request->namaprovinces,
        'slugprovince'=>\Str::slug($request->namaprovinces)
       ]);       
    }

    public function updateregion(Request $request,$regionid){
        $img= request('image');
        $regionid = Request('regionid');
        $namaregion=$request->namaregion;
        if($img == null){
            $nama_file=$request->namagambar;
        }
        else{
            $images = region::where('id', $regionid)->first();
            File::delete('public/img/'.$images->image);
            $nama_file = time()."_".$img->getClientOriginalName();
            $tujuan_upload = 'public/img';
            $img->move($tujuan_upload,$nama_file);
        }
        $Region = region::where('id', $regionid)
        ->update([
         'namaregion' => $request->namaregions,
         'shortdescription' => $request->shorts,
         'slugregion'=>\Str::slug($request->namaregions),
         'image'=>$nama_file
        ]);
        $addregion = tambahlocation::where('namaregion',$namaregion)
        ->update([
         'namaregion' => $request->namaregions,
         'slugregion'=>\Str::slug($request->namaregions)
        ]);       
        Alert::success('Success','Success Diupdate');
        return redirect()->to('/region');
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
            // 'kategories'=>$request->personoption
        ]);

        // harga::where('subwisata_id', $idoption)
        // ->update([
        //     'kategories'=>$request->personoption
        // ]);
    }

    public function updateAvailableOption(Request $request,$idoption){
        $option = subwisata::where('id', $idoption)
        ->update([
            'status' => $request->status
        ]);
    }

    public function updatetambahprovince(Request $request, $idprovince){
        $idprovince = Request('idprovince');
        $idtravels = Request('idtravels');
        $tambahprovince = Request('tambahprovince');
        $Province=tambahprovince::where('id', $idprovince)
        ->update([
            'namaprovince'=>$tambahprovince,
            'slugprovince'=>Str::slug($request->tambahprovince),
        ]);
    } 

    public function updatetambahlocation(Request $request, $idcity){
        $idcity = Request('idcity');
        $tambahlocation = Request('tambahlocation');
        $City=tambahlocation::where('id', $idcity)
        ->update([
            'namaregion'=>$tambahlocation,
            'slugregion'=>Str::slug($request->tambahlocation),
        ]);
    } 
    
    public function deletetambahlocation($idcity){
        tambahlocation::where('id', $idcity)->delete();
        Alert::error('Success');
        return redirect()->back();
    }

    public function showedithargachild($ChildID){
        $Child=DB::table('harga_child')->where('id',$ChildID)->first();
        return response()->json([
        'status'=>200,
        'Child'=>$Child
        ]);
    }

    public function showeditdiskon($WisataID){
        $Diskon = DB::table('wisata')->where('wisata_id',$WisataID)->first();
        return response()->json([
        'status'=>200,
        'Diskon'=>$Diskon
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

    public function updatetag(Request $request, $idtag){
       $idtag = Request('idtag');
       $namatag = Request('namatag');
       $Tag = tags::where('id', $idtag)
       ->update([
        'tags' => $request->tags
       ]);

       $Tagblog=tambahtags::where('tags', $namatag)
       ->update([
        'tags' => $request->tags
       ]);
               
    }

    public function updatetime(Request $request,$idtime){
        
        $idtime = Request('idtime');
       $Time = waktu::where('id', $idtime)
       ->update([
        'time' => $request->jam
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

    public function updateimportant(Request $request,$idimportant){
        $idimportant = Request('idimportant');
       $Important = importants::where('id', $idimportant)
       ->update([
        'importantinformation' => $request->important
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
        $idtraveljam=Request('idtraveljam');
        $idsubs=Request('idsubs');
        $time=Request('time');
        $data=[
            'wisata_id'=>$idtraveljam,
            'subwisata_id'=>$idsubs,
            'time'=>$time
        ];
        waktu::create($data);
    }


    public function addcity(Request $request){
        $idtambahprovinces = $request->idtambahprovinces;
        $idwisatas = $request->idwisatas;
        $tambahcity = $request->tambahcity;
        $data=[
            'wisata_id'=>$idwisatas,
            'tambahprovince_id'=>$idtambahprovinces,
            'namaregion'=>$tambahcity,
            'slugregion'=>\Str::slug($tambahcity),
        ];
        tambahlocation::create($data);
    }

    public function addhargaperson(Request $request){
        $idtravelperson=Request('idtravelperson');
        $idsubperson=Request('idsubperson');
        $min=Request('singlepersonrange');
        $to=Request('to');
        $harga=Request('hargaperson');
        $kategories=subwisata::where('id', $idsubperson)->first();
        $data=[
            'wisata_id'=>$idtravelperson,
            'subwisata_id'=>$idsubperson,
            'min'=>$min,
            'maks'=>$to,
            'harga'=>$harga,
            'kategories'=>$kategories->kategories
        ];
        harga::create($data);
    }

    public function addhargachild(Request $request){
        $idtravelchild=Request('idtravelchild');
        $idsubchild=Request('idsubchild');
        $min=Request('singlechildrange');
        $to=Request('tochild');
        $harga=Request('hargachild');

        $data=[
            'wisata_id'=>$idtravelchild,
            'subwisata_id'=>$idsubchild,
            'min'=>$min,
            'maks'=>$to,
            'harga'=>$harga,

        ];
        hargachild::create($data);
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

    public function addseason(Request $request){
        $idtravel=Request('idtravel');
        $season=Request('season');
        $data=[
            'wisata_id'=>$idtravel,
            'season_id'=>$season
        ];
        tambahseason::create($data);
    }

    public function adddestination(Request $request){
        $idtravel=Request('idtravel');
        $destination=Request('destinasi');
        $data=[
            'wisata_id'=>$idtravel,
            'destinasi_id'=>$destination
        ];
        tambahdestinasi::create($data);
    }

    public function addimportant(Request $request){
        $idtravel=Request('idtravel');
        $important=Request('important');
        $data=[
            'wisata_id'=>$idtravel,
            'importantinformation'=>$important
        ];
        importants::create($data);
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

    public function showedittag($TagID){
        $Tag=DB::table('tags')->where('id',$TagID)->first();
        return response()->json([
        'status'=>200,
        'Tag'=>$Tag
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

    public function showdetailaffiliate($AffiliateID){
        $Affiliate=DB::table('affiliate')->where('id',$AffiliateID)->first();
        return response()->json([
        'status'=>200,
        'Affiliate'=>$Affiliate
        ]);
    }

    public function showdetailselltours($SelltoursID){
        $Selltours=DB::table('selltour')->where('id',$SelltoursID)->first();
        return response()->json([
        'status'=>200,
        'Selltours'=>$Selltours
        ]);
    }

    public function showdetailplatform($PlatformID){
        $Platform=DB::table('platform')->where('id',$PlatformID)->first();
        return response()->json([
        'status'=>200,
        'Platform'=>$Platform
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
        $provinceadd=province::get();
        $regionadd=region::get();
        $province = tambahprovince::where('wisata_id', $idwisata)->get('id');
        $pilihan = tambahprovince::whereIN('id', $province)->get();
        // ->leftJoin('province', 'tambahprovince.province_id', '=', 'province.id')
        // ->select('province.namaprovince','tambahprovince.id')->get();
        
        

        $destination =DB::table('tambahdestinasi')->where('wisata_id',$idwisata)
            ->leftJoin('destination', 'tambahdestinasi.destinasi_id', '=', 'destination.id')
            ->select('destination.destination','tambahdestinasi.id')->get();
        $season =DB::table('tambahseason')->where('wisata_id',$idwisata)
            ->leftJoin('season', 'tambahseason.season_id', '=', 'season.id')
            ->select('season.namaseason','tambahseason.id')->get();
        $travel=DB::table('wisata')->where('wisata_id',$idwisata)->get();
        $bahasa=bahasa::get();
        $include=DB::table('include')->where('wisata_id',$idwisata)->get();
        $exclude=DB::table('exclude')->where('wisata_id',$idwisata)->get();
        $highlight=DB::table('highlight')->where('wisata_id',$idwisata)->get();
        $important = importants::where('wisata_id', $idwisata)->get();
        $jam=DB::table('waktu')->where('wisata_id',$idwisata)->get();
        $tambahseason=tambahseason::where('wisata_id',$idwisata)->get();

        return view('editwisata',compact('important','province','pilihan','regionadd','provinceadd','travel','include','exclude','destination','highlight','jam','destinasi','season','seasonadd','bahasa'));
    }

    public function editblogproses(Request $request,$idblog){
        $img= request('image');
        
        if($img == null){
            $nama_file=$request->namagambar;
        }
        else{
    $images = blog::where('id', $idblog)->first();
    File::delete('public/img/' . $images->image);
    $image = Image::make($img->getRealPath());
    $image->heighten(750);
    $nama_file = time() . "_" . $img->getClientOriginalName();
    $tujuan_upload = 'public/img';
    $image->encode('webp', 80)->save(($tujuan_upload . '/' . pathinfo($nama_file, PATHINFO_FILENAME) . '.webp'));
        }
        DB::table('blog')->where('id',$idblog)
        ->update([
            'judulblog'=>$request->judulartikel,
            'deskripsi'=>$request->isi,
            'shortdescription'=>$request->short,
            'slug'=>\Str::slug($request->judulartikel),
            'image'=>pathinfo($nama_file, PATHINFO_FILENAME) . '.webp',
        ]);
        Alert::success('Success','Success Diupdate');
        return redirect()->to('/blogadmin');
    }

    public function editproseswisata(Request $request,$idwisata){
        $status = $request->status;
        if($status == "on"){
            $status = true;
        } else {
            $status = false;
        }
        DB::table('wisata')->where('wisata_id',$idwisata)
        ->update([
            'namawisata'=>$request->namawisata,
            'durasi'=>$request->duration,
            'label'=>$request->label,
            'bahasa'=>$request->bahasa,
            'shortdescription'=>$request->shortdescription,
            'deskripsi_english'=>$request->isieng,
            'pickup'=>$request->airport,
            'wherepickup'=>$request->wherepickup,
            'capacity'=>$request->capacity,
            'slug'=>\Str::slug($request->namawisata),
            'status' => $status

        ]);
        Alert::success('Success','Success Diupdate');
        return redirect()->to('/paketwisata');
    }

    public function editprosesinclude(Request $request){
        
    }



    public function landingpageblog(Request $request){
        $lang=$request->server('HTTP_ACCEPT_LANGUAGE');
    $langs=Str::substr($lang, 0,2);
    if ($langs == 'id') {
        if(bahasa::where('bahasa', 'Bahasa')->exists()){
            $sessions = session()->get("bahasa") ?? "Bahasa";
        } else {
            $sessions = session()->get("bahasa") ?? "English";
        }
             
    }elseif ($langs == 'en-US'){
        if(bahasa::where('bahasa', 'English')->exists()){
            $sessions = session()->get("bahasa") ?? "English";
        }
    }elseif ($langs == 'en'){
        if(bahasa::where('bahasa', 'English')->exists()){
            $sessions = session()->get("bahasa") ?? "English";
       }
    }
    elseif ($langs == 'ms'){
        if(bahasa::where('bahasa', 'Malay')->exists()){
            $sessions = session()->get("bahasa") ?? "Malay";
       } else {
        $sessions = session()->get("bahasa") ?? "English";
    }   
    }
    else{
        $sessions = session()->get("bahasa") ?? "English";     
    }
        $banner=blog::orderBy('created_at','DESC')->where('bahasa',$sessions)->paginate(1);
        $blog2=DB::table('blog')->orderBy('created_at','DESC')->where('bahasa', $sessions)->paginate(8, ['*'], 'page', 1); 
        $language=bahasa::get();
        $popular=DB::table('blog')->where('bahasa', $sessions)->paginate(4);
        $tags=DB::table('tags')->get();
        $today=blog::whereMonth(
        'created_at',
        Carbon::now()->format('m')
    )->where('bahasa', $sessions)->get();
        return view('redesignblog.landingblog', compact('sessions','blog2','today','popular','tags','language','banner'));
    }

    public function listblog(Request $request){
        $lang=$request->server('HTTP_ACCEPT_LANGUAGE');
    $langs=Str::substr($lang, 0,2);
    if ($langs == 'id') {
        if(bahasa::where('bahasa', 'Bahasa')->exists()){
            $sessions = session()->get("bahasa") ?? "Bahasa";
        } else {
            $sessions = session()->get("bahasa") ?? "English";
        }
             
    }elseif ($langs == 'en-US'){
        if(bahasa::where('bahasa', 'English')->exists()){
            $sessions = session()->get("bahasa") ?? "English";
        }
    }elseif ($langs == 'en'){
        if(bahasa::where('bahasa', 'English')->exists()){
            $sessions = session()->get("bahasa") ?? "English";
       }
    }
    elseif ($langs == 'ms'){
        if(bahasa::where('bahasa', 'Malay')->exists()){
            $sessions = session()->get("bahasa") ?? "Malay";
       } else {
        $sessions = session()->get("bahasa") ?? "English";
    }   
    }
    else{
        $sessions = session()->get("bahasa") ?? "English";     
    }
        $blog=DB::table('blog')->where('bahasa', $sessions)->paginate(8);
        $tagx=DB::table('tags')->get();
        $language=bahasa::get();
        return view('redesignblog.allblog',compact('sessions','blog','tagx','language'));
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
        if(bahasa::where('bahasa', 'Bahasa')->exists()){
            $sessions = session()->get("bahasa") ?? "Bahasa";
        } else {
            $sessions = session()->get("bahasa") ?? "English";
            }
                
        }elseif ($langs == 'en-US'){
            if(bahasa::where('bahasa', 'English')->exists()){
                $sessions = session()->get("bahasa") ?? "English";
            }
        }elseif ($langs == 'en'){
            if(bahasa::where('bahasa', 'English')->exists()){
                $sessions = session()->get("bahasa") ?? "English";
        }
        }
        elseif ($langs == 'ms'){
            if(bahasa::where('bahasa', 'Malay')->exists()){
                $sessions = session()->get("bahasa") ?? "Malay";
        } else {
            $sessions = session()->get("bahasa") ?? "English";
        }   
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
        $similar=DB::table('tambahtags')->where('idblog',$idblog)->paginate(1);
        $similarex=DB::table('tambahtags')->where('idblog',$idblog)->count();
        $similare=$similar->pluck('tags');
        $similarity=tambahtags::whereIn('tags',$similare)->get();
        $str="<p>This is my text</p>";
        if ($similarex > 0){
            $similarblog=DB::table('blog')->select(['blog.id','blog.judulblog','blog.image','blog.created_at','blog.author','blog.slug'])
            ->join('tambahtags', 'tambahtags.idblog', '=', 'blog.id')
            ->where('tambahtags.tags',$similare)->where('bahasa', $sessions)
            ->get();
        }
        else{
            $similarblog = "<p>No Data</p>";   
        }
        $randomArticleIds = blog::inRandomOrder()->pluck('id')->take(2);
        $randomArticles = blog::whereIn('id', $randomArticleIds)->get();

        return view('redesignblog.content',compact('sessions','randomArticles','similarex','shareButtons1','blog','popular','similarblog','tagblog','tags','today','popular','language'));
    }

    public function tagsview(Request $request,$tagsid){
       $lang=$request->server('HTTP_ACCEPT_LANGUAGE');
    $langs=Str::substr($lang, 0,2);
    if ($langs == 'id') {
        if(bahasa::where('bahasa', 'Bahasa')->exists()){
            $sessions = session()->get("bahasa") ?? "Bahasa";
        } else {
            $sessions = session()->get("bahasa") ?? "English";
        }
             
    }elseif ($langs == 'en-US'){
        if(bahasa::where('bahasa', 'English')->exists()){
            $sessions = session()->get("bahasa") ?? "English";
        }
    }elseif ($langs == 'en'){
        if(bahasa::where('bahasa', 'English')->exists()){
            $sessions = session()->get("bahasa") ?? "English";
       }
    }
    elseif ($langs == 'ms'){
        if(bahasa::where('bahasa', 'Malay')->exists()){
            $sessions = session()->get("bahasa") ?? "Malay";
       } else {
        $sessions = session()->get("bahasa") ?? "English";
    }   
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
        ->orderBy('created_at','DESC')
        ->paginate(8);
        return view('redesignblog.tag',compact('sessions','tags','similarblog','tagx','language'));
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

    public function insertbackground(Request $request){
        $teks=$request->teks;
        $gambar=$request->image;
        $nama_file = time()."_".$gambar->getClientOriginalName();
		$tujuan_upload = 'public/img';
        $gambar->move($tujuan_upload,$nama_file);
        $data=[
            'header'=>$teks,
            'subheader'=>$request->tekssmall,
            'image'=>$nama_file,
            'place'=>'about'
        ];
        background::create($data);
        return redirect()->back();
    }

    public function editimagelanding(Request $request,$idimage){
        $img=request('image');
        
        if($img == null){
            $nama_file=$request->namagambar;
        }
        else{
            $images = background::where('id', $idimage)->first();
            File::delete('public/img/'.$images->image);
            $nama_file = time()."_".$img->getClientOriginalName();
            $tujuan_upload = 'public/img';
            $img->move($tujuan_upload,$nama_file);
        }
        DB::table('background')->where('id',$idimage)
        ->update([
            'header'=>$request->teks,
            'image'=>$nama_file,
            'place'=>'landingpage'
        ]);
        Alert::success('Success','Success Diupdate');
        return redirect()->to('/background/change');
    }

    public function insertimagelanding(Request $request){
        $img=request('image');
        $nama_file = time()."_".$img->getClientOriginalName();
        $tujuan_upload = 'public/img';
        $img->move($tujuan_upload,$nama_file);

        background::create([
            'place'=>'landingpage',
            'header'=>$request->teks,
            'image'=>$nama_file,
        ]);
        Alert::success('Success','Success Ditambahkan');
        return redirect()->to('/background/change');
    }

    public function editimageagent(Request $request,$idimage){
        $img= request('image');
        
        if($img == null){
            $nama_file=$request->namagambar;
        }
        else{
            $images = background::where('id', $idimage)->first();
            File::delete('public/img/'.$images->image);
            $nama_file = time()."_".$img->getClientOriginalName();
            $tujuan_upload = 'public/img';
            $img->move($tujuan_upload,$nama_file);
        }
        DB::table('background')->where('id',$idimage)
        ->update([
            'header'=>$request->teks,
            'image'=>$nama_file,
            'subheader'=>$request->tekssmall,
            'place'=>'agent'
        ]);
        Alert::success('Success','Success Diupdate');
        return redirect()->to('/background/change');
    }

    public function insertimageagent(Request $request){
        $img=request('image');
        $nama_file = time()."_".$img->getClientOriginalName();
        $tujuan_upload = 'public/img';
        $img->move($tujuan_upload,$nama_file);

        background::create([
            'header'=>$request->teks,
            'image'=>$nama_file,
            'subheader'=>$request->tekssmall,
            'place'=>'agent'
        ]);
        Alert::success('Success','Success Ditambahkan');
        return redirect()->to('/background/change');
    }

    public function editimageaffiliate(Request $request,$idimage){
        $img= request('image');
        
        if($img == null){
            $nama_file=$request->namagambar;
        }
        else{
            $images = background::where('id', $idimage)->first();
            File::delete('public/img/'.$images->image);
            $nama_file = time()."_".$img->getClientOriginalName();
            $tujuan_upload = 'public/img';
            $img->move($tujuan_upload,$nama_file);
        }
        DB::table('background')->where('id',$idimage)
        ->update([
            'header'=>$request->teks,
            'image'=>$nama_file,
            'subheader'=>$request->tekssmall,
            'place'=>'affiliate'
        ]);
        Alert::success('Success','Success Diupdate');
        return redirect()->to('/background/change');
    }

    public function insertimageaffiliate(Request $request){
        $img=request('image');
        $nama_file = time()."_".$img->getClientOriginalName();
        $tujuan_upload = 'public/img';
        $img->move($tujuan_upload,$nama_file);

        background::create([
            'header'=>$request->teks,
            'image'=>$nama_file,
            'subheader'=>$request->tekssmall,
            'place'=>'affiliate'
        ]);
        Alert::success('Success','Success Ditambahkan');
        return redirect()->to('/background/change');
    }

    public function editimageselltours(Request $request,$idimage){
        $img= request('image');
        
        if($img == null){
            $nama_file=$request->namagambar;
        }
        else{
            $images = background::where('id', $idimage)->first();
            File::delete('public/img/'.$images->image);
            $nama_file = time()."_".$img->getClientOriginalName();
            $tujuan_upload = 'public/img';
            $img->move($tujuan_upload,$nama_file);
        }
        DB::table('background')->where('id',$idimage)
        ->update([
            'header'=>$request->teks,
            'image'=>$nama_file,
            'subheader'=>$request->tekssmall,
            'place'=>'selltours'
        ]);
        Alert::success('Success','Success Diupdate');
        return redirect()->to('/background/change');
    }

    public function insertimageselltours(Request $request){
        $img=request('image');
        $nama_file = time()."_".$img->getClientOriginalName();
        $tujuan_upload = 'public/img';
        $img->move($tujuan_upload,$nama_file);

        background::create([
            'header'=>$request->teks,
            'image'=>$nama_file,
            'subheader'=>$request->tekssmall,
            'place'=>'selltours'
        ]);
        Alert::success('Success','Success Ditambahkan');
        return redirect()->to('/background/change');
    }

    public function editimageabout(Request $request,$idimage){
        $img= request('image');
        
        if($img == null){
            $nama_file=$request->namagambar;
        }
        else{
            $images = background::where('id', $idimage)->first();
            File::delete('public/img/'.$images->image);
            $nama_file = time()."_".$img->getClientOriginalName();
            $tujuan_upload = 'public/img';
            $img->move($tujuan_upload,$nama_file);
        }
        DB::table('background')->where('id',$idimage)
        ->update([
            'header'=>$request->teks,
            'image'=>$nama_file,
            'subheader'=>$request->tekssmall,
            'place'=>'about'
        ]);
        Alert::success('Success','Success Diupdate');
        return redirect()->to('/background/change');
    }

    public function insertimageabout(Request $request){
        $img=request('image');
        $nama_file = time()."_".$img->getClientOriginalName();
        $tujuan_upload = 'public/img';
        $img->move($tujuan_upload,$nama_file);

        background::create([
            'header'=>$request->teks,
            'image'=>$nama_file,
            'subheader'=>$request->tekssmall,
            'place'=>'about'
        ]);
        Alert::success('Success','Success Ditambahkan');
        return redirect()->to('/background/change');
    }

    public function editimageplatform(Request $request,$idimage){
        $img= request('image');
        
        if($img == null){
            $nama_file=$request->namagambar;
        }
        else{
            $images = background::where('id', $idimage)->first();
            File::delete('public/img/'.$images->image);
            $nama_file = time()."_".$img->getClientOriginalName();
            $tujuan_upload = 'public/img';
            $img->move($tujuan_upload,$nama_file);
        }
        DB::table('background')->where('id',$idimage)
        ->update([
            'header'=>$request->teks,
            'image'=>$nama_file,
            'subheader'=>$request->tekssmall,
            'place'=>'platform'
        ]);
        Alert::success('Success','Success Diupdate');
        return redirect()->to('/background/change');
    }

    public function insertimageplatform(Request $request){
        $img=request('image');
        $nama_file = time()."_".$img->getClientOriginalName();
        $tujuan_upload = 'public/img';
        $img->move($tujuan_upload,$nama_file);

        background::create([
            'header'=>$request->teks,
            'image'=>$nama_file,
            'subheader'=>$request->tekssmall,
            'place'=>'platform'
        ]);
        Alert::success('Success','Success Ditambahkan');
        return redirect()->to('/background/change');
    }

    public function editimagecorporate(Request $request,$idimage){
        $img= request('image');
        
        if($img == null){
            $nama_file=$request->namagambar;
        }
        else{
            $images = background::where('id', $idimage)->first();
            File::delete('public/img/'.$images->image);
            $nama_file = time()."_".$img->getClientOriginalName();
            $tujuan_upload = 'public/img';
            $img->move($tujuan_upload,$nama_file);
        }
        DB::table('background')->where('id',$idimage)
        ->update([
            'header'=>$request->teks,
            'image'=>$nama_file,
            'subheader'=>$request->tekssmall,
            'place'=>'corporate'
        ]);
        Alert::success('Success','Success Diupdate');
        return redirect()->to('/background/change');
    }

    public function insertimagecorporate(Request $request){
        $img=request('image');
        $nama_file = time()."_".$img->getClientOriginalName();
        $tujuan_upload = 'public/img';
        $img->move($tujuan_upload,$nama_file);

        background::create([
            'header'=>$request->teks,
            'image'=>$nama_file,
            'subheader'=>$request->tekssmall,
            'place'=>'corporate'
        ]);
        Alert::success('Success','Success Ditambahkan');
        return redirect()->to('/background/change');
    }

    public function editimagecontact(Request $request,$idimage){
        $img= request('image');
        
        if($img == null){
            $nama_file=$request->namagambar;
        }
        else{
            $images = background::where('id', $idimage)->first();
            File::delete('public/img/'.$images->image);
            $nama_file = time()."_".$img->getClientOriginalName();
            $tujuan_upload = 'public/img';
            $img->move($tujuan_upload,$nama_file);
        }
        DB::table('background')->where('id',$idimage)
        ->update([
            'header'=>$request->teks,
            'subheader'=>$request->tekssmall,
            'image'=>$nama_file,
            'place'=>'contact'
        ]);
        Alert::success('Success','Success Diupdate');
        return redirect()->to('/background/change');
    }

    public function insertimagecontact(Request $request){
        $img=request('image');
        $nama_file = time()."_".$img->getClientOriginalName();
        $tujuan_upload = 'public/img';
        $img->move($tujuan_upload,$nama_file);

        background::create([
            'header'=>$request->teks,
            'subheader'=>$request->tekssmall,
            'image'=>$nama_file,
            'place'=>'contact'
        ]);
        Alert::success('Success','Success Ditambahkan');
        return redirect()->to('/background/change');
    }

    public function editimageinfluencer(Request $request,$idimage){
        $img= request('image');
        
        if($img == null){
            $nama_file=$request->namagambar;
        }
        else{
            $images = background::where('id', $idimage)->first();
            File::delete('public/img/'.$images->image);
            $nama_file = time()."_".$img->getClientOriginalName();
            $tujuan_upload = 'public/img';
            $img->move($tujuan_upload,$nama_file);
        }
        DB::table('background')->where('id',$idimage)
        ->update([
            'header'=>$request->teks,
            'image'=>$nama_file,
            'subheader'=>$request->tekssmall,
            'place'=>'influencer'
        ]);
        Alert::success('Success','Success Diupdate');
        return redirect()->to('/background/change');
    }

    public function insertimageinfluencer(Request $request){
        $img=request('image');
        $nama_file = time()."_".$img->getClientOriginalName();
        $tujuan_upload = 'public/img';
        $img->move($tujuan_upload,$nama_file);

        background::create([
            'header'=>$request->teks,
            'image'=>$nama_file,
            'subheader'=>$request->tekssmall,
            'place'=>'influencer'
        ]);
        Alert::success('Success','Success Ditambahkan');
        return redirect()->to('/background/change');
    }

    public function editimagetravel(Request $request,$idtravel){
        $img=request('image');
        $img2=request('image2');
        $img3=request('image3');
        $img4=request('image4');
        $img5=request('image5');
        
        if($img == null){
            $nama_file=$request->img;
        }
        else if($img != null){
            $images = travel::where('wisata_id', $idtravel)->first();
            File::delete('public/img/' . $images->image);
            $image = Image::make($img->getRealPath());
            $image->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $nama_file = time() . "_" . $img->getClientOriginalName();
            $tujuan_upload = 'public/img';
            $image->encode('webp', 80)->save(($tujuan_upload . '/' . pathinfo($nama_file, PATHINFO_FILENAME) . '.webp'));
        }

        if($img2 == null){
            $nama_file2=$request->img2;
        }
        else if($img2 != null){
            $images2 = travel::where('wisata_id', $idtravel)->first();
            File::delete('public/img/' . $images2->image2);
            $image2 = Image::make($img2->getRealPath());
            $image2->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $nama_file2 = time() . "_" . $img2->getClientOriginalName();
            $tujuan_upload2 = 'public/img';
            $image2->encode('webp', 80)->save(($tujuan_upload2 . '/' . pathinfo($nama_file2, PATHINFO_FILENAME) . '.webp'));
        }

        if($img3 == null){
            $nama_file3=$request->img3;
        }
        else if($img3 != null){
            $images3 = travel::where('wisata_id', $idtravel)->first();
            File::delete('public/img/' . $images3->image3);
            $image3 = Image::make($img3->getRealPath());
            $image3->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $nama_file3 = time() . "_" . $img3->getClientOriginalName();
            $tujuan_upload3 = 'public/img';
            $image3->encode('webp', 80)->save(($tujuan_upload3 . '/' . pathinfo($nama_file3, PATHINFO_FILENAME) . '.webp'));
        }

        if($img4 == null){
            $nama_file4=$request->img4;
        }
        else if($img4 != null){
            $images4 = travel::where('wisata_id', $idtravel)->first();
            File::delete('public/img/' . $images4->image4);
            $image4 = Image::make($img4->getRealPath());
            $image4->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $nama_file4 = time() . "_" . $img4->getClientOriginalName();
            $tujuan_upload4 = 'public/img';
            $image4->encode('webp', 80)->save(($tujuan_upload4 . '/' . pathinfo($nama_file4, PATHINFO_FILENAME) . '.webp'));
        }

        if($img5 == null){
            $nama_file5=$request->img5;
        }
        else if($img5 != null){
            $images5 = travel::where('wisata_id', $idtravel)->first();
            File::delete('public/img/' . $images5->image5);
            $image5 = Image::make($img5->getRealPath());
            $image5->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $nama_file5 = time() . "_" . $img5->getClientOriginalName();
            $tujuan_upload5 = 'public/img';
            $image5->encode('webp', 80)->save(($tujuan_upload5 . '/' . pathinfo($nama_file5, PATHINFO_FILENAME) . '.webp'));
        }

        DB::table('wisata')->where('wisata_id',$idtravel)
        ->update([
            'image'=>pathinfo($nama_file, PATHINFO_FILENAME) . '.webp',
            'image2'=>pathinfo($nama_file2, PATHINFO_FILENAME) . '.webp',
            'image3'=>pathinfo($nama_file3, PATHINFO_FILENAME) . '.webp',
            'image4'=>pathinfo($nama_file4, PATHINFO_FILENAME) . '.webp',
            'image5'=>pathinfo($nama_file5, PATHINFO_FILENAME) . '.webp',
        ]);
        Alert::success('Success','Success Diupdate');
        return redirect()->back();
    }

    

    public function allblog(){
        $all=blog::paginate(5);
        $popular=DB::table('blog')->paginate(6);
        $today=Carbon::now();
        echo $today->month;
        $blogs=blog::whereMonth('created_at',$today)->paginate(6);
        return view('redesignblog.allblog',compact('all','popular','blogs'));

    }

    public function addtag(Request $request){
        $tag = Request('tag');
        $data = [
            'tags' => $tag
        ];
        tags::create($data);
        Alert::success('Success','Success Ditambah');
        return redirect()->back();
    }

    public function diskon($travelid){
        $option = subwisata::where('wisata_id', $travelid)->get();
        $options = subwisata::where('wisata_id', $travelid)->get('id');
        //$hargaoption = harga::where('wisata_id',$idtravel)->get();
        $pilihan = subwisata::whereIN('id', $options)->get();
        $harganew = harga::whereIN('subwisata_id', $options)->get();
        $hargachildnew = hargachild::whereIN('subwisata_id', $options)->get();
        $jam = waktu::whereIN('subwisata_id', $options)->get();
        $travel=travel::where('wisata_id',$travelid)->get();
        $harga=harga::where('wisata_id',$travelid)->get();
        $hargachild=hargachild::where('wisata_id',$travelid)->get();
        return view('diskon', compact('travel','harga','hargachild','pilihan','harganew','hargachildnew','jam'));
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
        //person
        $personrange = request('singlepersonrange');
        $pricerange= request('hargarange');
        $range= request('to');
        //child
        $childoption=Request('childoption');
        $childsinglerange= request('singlechildrange');
        $childrange= request('tochild');
        $pricechildrange=request('hargachildrange');

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
                'min'=>$childsinglerange,
                'maks'=>$childrange,
                'harga'=>$pricechildrange,
                ];
        
                foreach($childrange as $index => $row){
                $data['min'] = $row;
                $data['maks'] = $childrange[$index];
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

                Alert::success('Success');
                return redirect('/paketwisata/diskon/'.$option->wisata_id);
    }

    public function insertlocation(Request $request){
        $travelid=$request->idtravel;
        $province=$request->province;
        $region= $request->region;
        
        $data = [
            'wisata_id' => $travelid,
            'namaprovince' => $province,
            'slugprovince'=>\Str::slug($request->province)
        ];
        $provinsi = tambahprovince::create($data);

        $data = [
            'wisata_id' => $travelid,
            'tambahprovince_id' => $provinsi->id,
        ];

        foreach($region as $index){
            $data['namaregion']=$index;
            $data['slugregion']=Str::slug($data['namaregion'], '-');
            tambahlocation::create($data);
        }

        Alert::success('Success');
        return redirect('/paketwisata/edit/'.$travelid);
    }

    public function diskonpost(Request $request,$travelid){
        $discount=Request('discount');
        $idtravel=travel::where('wisata_id',$travelid)->get();
        $kategoriharga=Request('kategories');
        $updatesubwisata = subwisata::where('wisata_id',$travelid)
        ->update([
            'kategories'=>$kategoriharga
        ]);
        $updateharga = harga::where('wisata_id',$travelid)
        ->update([
            'kategories'=>$kategoriharga
        ]);
        DB::table('wisata')->where('wisata_id',$travelid)
        ->update([
            'discount'=>$discount,
            'kategories'=>$request->kategories,
            'capacity'=>$request->capacity
        ]);
        Alert::success('Success','Success Diupdate');
        return redirect()->back();
    }

    //review management
    public function kelolarating(){
        $travel=travel::paginate(10);
        return view('rating',compact('travel'));
    }

    public function editreview($idreview){
        $review=reviews::where('id', $idreview)->get();
        return view('formEditReview', compact('review'));
    }

    public function buatreview($idtravel){
        $review = travel::where('wisata_id', $idtravel)->first();
        $idwisata = $review->wisata_id;
        $country=DB::table('country')->get();
        return view('formCreateReview', compact('idwisata','country', 'review'));
    }

    public function sendreview(Request $request){
        $token = Str::random(40); 
        $email = $request->email;
        while (reviews::where('token', $token)->exists()) {
        $token = Str::random(40);
        }
        $data = [
        'email' => $email,
        'name' => $request->name,
        'country' => $request->country,
        'token'=>$token,
        'wisata_id'=>$request->idwisata
         ];
        $review=reviews::create($data);
        Mail::to($email)->send(new ReviewSendLink($review));
        Alert::success('Success');
        return redirect()->back();
    }

    public function insertreview(Request $request){
        $travelid = $request->idwisata;
        $name = $request->name;
        $country = $request->negaras;
        $rating = $request->rating;
        $review = $request->review;
        $imageColumns = ['image', 'image2', 'image3', 'image4', 'image5'];
        $images = $request->file('images');

        if($images){
            foreach ($images as $index => $image) {
                $nama_file = time() . '_' . $index . '.webp';
                Image::make($image->getRealPath())
                    ->encode('webp', 80)
                    ->save(('public/img/review/' . pathinfo($nama_file, PATHINFO_FILENAME) . '.webp'));
                $columnName = $imageColumns[$index];

                $data = [
                    'country' => $country,
                    'name' => $name,
                    'comments' => $review,
                    'star_rating' => $rating,
                    $columnName => $nama_file,
                    'wisata_id' => $travelid
                ];
                reviews::create($data);
            }
        } else{
            $data = [
                'country' => $country,
                'name' => $name,
                'comments' => $review,
                'star_rating' => $rating,
                'wisata_id' => $travelid
            ];
            reviews::create($data);
        }
        $rating = reviews::where('wisata_id', $travelid)
        ->where('token', null)
        ->avg('star_rating');

        $getwisataRating = countrating::where('wisata_id', $travelid)->first();
        if($getwisataRating == null){
            $data = [
                'wisata_id' => $travelid,
                'totalrating' => $rating
            ];
            countrating::create($data);
        } else{
            countrating::where('wisata_id', $travelid)->update([
                'totalrating' => $rating
            ]);
        }

        Alert::success('Success');
        return redirect()->to('/rating/' . $travelid);
    }

    public function ratingwisata($idtravel){
        $travel=reviews::where('wisata_id',$idtravel)
        ->where('token', null)
        ->paginate(10);
        $namatravel=travel::where('wisata_id',$idtravel)->first('namawisata');
        $wisataid=travel::where('wisata_id',$idtravel)->first('wisata_id');
        return view('ratingwisata',compact('travel','namatravel','wisataid'));
    }

    public function editreviewprocess(Request $request,$idreview){
        $getWisataIds=reviews::where('id', $idreview)->first();
        $idwisata = $getWisataIds->wisata_id;
        $review=reviews::where('id', $idreview)
        ->update([
            'star_rating' => $request->rating,
            'comments' => $request->review
        ]);
        Alert::success('Success');
        return redirect()->to('/rating/' . $idwisata);
    }

    public function deleterating($idrating){
        $images=reviews::where('id',$idrating)->first();
        $travelid=$images->wisata_id;
        if($images->image !== null){
        File::delete('public/img/review/'.$images->image);
        }
        if($images->image2 !== null){
            File::delete('public/img/review/'.$images->image2);
            }
        if($images->image3 !== null){
            File::delete('public/img/review/'.$images->image3);
            }
        if($images->image4 !== null){
            File::delete('public/img/review/'.$images->image4);
            }
        if($images->image5 !== null){
            File::delete('public/img/review/'.$images->image5);
            }
        $rating=reviews::where('id',$idrating)->delete();

        $ratings = reviews::where('wisata_id', $travelid)
        ->where('token', null)
        ->avg('star_rating');
        
        $getwisataRating = countrating::where('wisata_id', $travelid)->first();
        countrating::where('wisata_id', $travelid)->update([
        'totalrating' => $ratings
        ]);
       
        Alert::error('Success Dihapus');
        return redirect()->back();
    }

    public function deletetheme($idtheme){
        $theme=season::where('id',$idtheme)->delete();
        Alert::error('Success Dihapus');
        return redirect()->back();
    }

    public function deletedestination($iddestination){
        $images=destination::where('id',$iddestination)->first();
        File::delete('public/img/'.$images->image);
        $destination=destination::where('id',$iddestination)->delete();
        Alert::error('Success Dihapus');
        return redirect()->back();
    }


    public function addbahasa(Request $request){
        $bahasa=Request('bahasa');
        $data=[
            'bahasa'=>$bahasa
        ];
        bahasa::create($data);
        Alert::success('Success');
        return redirect()->back();
    }

    public function hapusbahasa(Request $request,$idlanguage){
        $idlanguage=$request->idlanguage;
        $bahasa=DB::table('bahasa')->where('id', $idlanguage)->delete();
        Alert::error('Success Dihapus');
        return redirect()->back();
    }

    public function insertdestinationcategory(Request $request){
        $destination=$request->kategori;
        $short=$request->shortdescription;
        $img= request('image');
        $nama_file = time()."_".$img->getClientOriginalName();
        $gambar = Image::make($img);
        $gambar->resize(600,600);
        $tujuan_upload = ('public/img/');
        $gambar->save($tujuan_upload .$nama_file); 

        $data = [
            'destination'=>$destination,
            'shortdescription'=>$short,
            'image'=>$nama_file
        ];
        destination::create($data);
        Alert::success('Success Ditambahkan');
        return redirect()->to('/destination-category');
    }

    public function insertregion(Request $request){
        $region=$request->region;
        $short=$request->shortdescription;
        $img= request('image');
        $nama_file = time()."_".$img->getClientOriginalName();
		$tujuan_upload = 'public/img';
        $img->move($tujuan_upload,$nama_file);

        $data = [
            'namaregion'=>$region,
            'shortdescription'=>$short,
            'image'=>$nama_file,
            'slugregion'=>\Str::slug($request->region)
        ];
        region::create($data);
        Alert::success('Success Ditambahkan');
        return redirect()->to('/region');
    }

    public function editregion(Request $request, $regionid){
        $region=region::where('id', $regionid)->get();
        return view('formeditregion', compact('region'));
    }

    public function insertprovince(Request $request){
        $region = $request->province;
        $short = $request->shortdescription;
        $img = request('image');
        $nama_file = time()."_".$img->getClientOriginalName();
        $gambar = Image::make($img);
        $gambar->resize(600,600);
        $tujuan_upload = ('public/img/');
        $gambar->save($tujuan_upload .$nama_file); 

        $data = [
            'namaprovince'=>$region,
            'shortdescription'=>$short,
            'image'=>$nama_file,
            'slugprovince'=>\Str::slug($request->province)
        ];
        province::create($data);
        Alert::success('Success Ditambahkan');
        return redirect()->to('/province');
    }

    public function formlocation($travelid){
        $idwisata=travel::where('wisata_id', $travelid)->get();
        $province=province::get();
        $region=region::get();
        return view('formlocation',compact('idwisata','province','region'));
    }

    public function insertseason(Request $request){
        $season = $request->namaseason;
        $data = [
            'namaseason'=>$season
        ];

        season::create($data);
        Alert::success('Success Ditambahkan');
       return redirect()->to('/season');
    }

public function datefilter(Request $request)
{
    $from = $request->from; 
    $to = $request->to;    

    if($from == null || $to == null){
        return redirect()->to('/data-booking');
    }else{
    $booking = booking::where('token', null)
        ->whereRaw("STR_TO_DATE(booking.traveldate, '%d/%m/%Y') BETWEEN STR_TO_DATE('$from', '%d/%m/%Y') AND STR_TO_DATE('$to', '%d/%m/%Y')")
        ->orderBy('created_at','DESC')
        ->paginate(10);

    foreach ($booking as $record) {
            $traveldate = Carbon::createFromFormat('d/m/Y', $record->traveldate);
            $record->travelStatus = $traveldate->isPast() ? 'done' : 'active';
            }
        
        return view('booking',compact('booking'));
    }

}
}