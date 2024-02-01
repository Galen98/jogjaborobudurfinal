<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\emailController;
use App\Models\blog;
use App\Models\tags;
use App\Models\travel;
use App\Models\corporate;
use App\Models\travelagent;
use App\Models\influencer;
use App\Models\message;
use App\Models\affiliate;
use App\Models\selltours;
use App\Models\platform;
use App\Models\destination;
use App\Models\Rate;
use App\Models\harga;
use App\Models\province;
use App\Models\region;
use App\Models\bahasa;
use App\Models\hargachild;
use App\Models\highlight;
use App\Models\season;
use App\Models\background;
use App\Models\tambahseason;
use App\Models\tambahprovince;
use App\Models\tambahlocation;
use Illuminate\Support\Str;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Spatie\Analytics\Period;
use Analytics;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/change-language/{bahasa}", function ($bahasa) {
    session()->put("bahasa", $bahasa);
    return back();
});

Route::get("/change-bahasa/{bahasa}", function ($bahasa) {
    session()->put("bahasa", $bahasa);
    return back();
});

Route::get('/foo', function () {
    Artisan::call('storage:link');
});

Route::get('/', function (Request $request) {
    $lang=Request::server('HTTP_ACCEPT_LANGUAGE');
    $background=background::where('place','landingpage')->get();
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
    
    //$English = travel::where("bahasa",$sessions)->first()->bahasa;
    $bahasa=bahasa::get();
    $destinate=destination::get();
    $province=province::get();
    $provinces=province::paginate(3);
    $destination=destination::paginate(3);
    $rateIDR = Rate::where("currency", "IDR")->first()->rate;
    $rateSGD = Rate::where("currency", "SGD")->first()->rate;
    $rateMYR = Rate::where("currency", "MYR")->first()->rate;
    $rateEUR = Rate::where("currency", "EUR")->first()->rate;
    $season = season::get();
    $city = region::get();
    // get session user
    $session = session()->get("rate") ?? "USD";
    $traveltop=DB::table('wisata')
    // ->orderBy('created_at','DESC')
    ->where('bahasa',$sessions)
    ->leftJoin('countrating', 'wisata.wisata_id', '=', 'countrating.wisata_id')
    ->select('wisata.created_at','wisata.wisata_id','wisata.namawisata','wisata.image','countrating.totalrating', 'wisata.label','wisata.durasi','wisata.IDR','wisata.image2','wisata.discount','wisata.kategories','wisata.capacity','wisata.IDR_awal','wisata.slug')
    ->orderBy('countrating.totalrating','DESC')
    ->paginate(8);
    //$traveltop=travel::paginate(8);

    $other=DB::table('wisata')
    // ->orderBy('created_at','DESC')
    ->where('label', 'Likely to sell out')
    ->where('bahasa',$sessions)
    ->leftJoin('countrating', 'wisata.wisata_id', '=', 'countrating.wisata_id')
    ->select('wisata.created_at','wisata.wisata_id','wisata.namawisata','wisata.image','countrating.totalrating', 'wisata.label','wisata.durasi','wisata.IDR','wisata.image2','wisata.discount','wisata.kategories','wisata.capacity','wisata.IDR_awal','wisata.slug')
    ->orderBy('countrating.totalrating','DESC')
    ->paginate(4);
    $blog=blog::orderBy('created_at','DESC')->where('bahasa', $sessions)->paginate(3);
    return view('frontend.index', compact('city','provinces','province','sessions','traveltop','other','blog',"rateIDR", "rateSGD", "rateMYR", "session","rateEUR","destination",'destinate','season','bahasa','background'));
})->name('homepage');



Route::get('/paketwisata', function () {
    $travel=travel::orderBy('created_at','DESC')->paginate(9);
    $bahasa=bahasa::get();
    return view('wisata',compact('travel','bahasa'));
})->middleware('auth');;

Route::get('/paketwisata/filter', function (Request $request) {
    $bahasa=Request('bahasa');
    $travel=travel::where('bahasa',$bahasa)->orderBy('created_at','DESC')->paginate(9);
    $bahasa=bahasa::get();
    return view('wisata',compact('travel','bahasa'));
})->middleware('auth');;


Route::get('/privacy-policy', function () {
    return view('frontend.privacypolicy');
});

Route::get('/terms-condition', function () {
    return view('frontend.termscondition');
});


Route::get('/destination-category',function(){
$destination=destination::get();
return view('destinationcategory',compact('destination'));
});

//for travel web
Route::get('category-destination/{iddestination}',[App\Http\Controllers\TravelController::class,'categorydestination']);
Route::get('season/{idseason}',[App\Http\Controllers\TravelController::class,'seasons']);
Route::get('destination',[App\Http\Controllers\TravelController::class,'destinasi']);
Route::get('alltours',[App\Http\Controllers\TravelController::class,'destinations']);
// Route::get('items/category-destination/{iddestination}',[App\Http\Controllers\TravelController::class,'categorydestination']);

Route::get('/destination-category/form',function(){
return view('formcategory');
})->middleware('auth');;


Route::get('/about-us', function(){
$bahasa=bahasa::get();
$background=background::where('place', 'about')->get();
return view('frontend.about',compact('bahasa','background'));
});

Route::get('/paketwisata/diskon/{travelid}', [App\Http\Controllers\BlogController::class,'diskon'])->middleware('auth');
Route::get('/paketwisata/diskon/buatoption/{travelid}', [App\Http\Controllers\BlogController::class,'buatoption'])->middleware('auth');
Route::get('/paketwisata/edit/{idwisata}', [App\Http\Controllers\BlogController::class,'editwisata'])->middleware('auth');
Route::post('/testPayment', [App\Http\Controllers\PaymentController::class,'testPayment']);
Route::get('/blogadmin', function () {
    $blog=blog::orderBy('created_at','DESC')->paginate(7);
    return view('blog', compact('blog'));
})->middleware('auth');

Route::get('/background/change', function(){
return view('changebackground');
})->middleware('auth');

Route::get('/message/corporate', function () {
    $corporate=corporate::paginate(7);
    return view('corporate', compact('corporate'));
})->middleware('auth');

Route::get('/message/travelagent', function () {
    $travelagent=travelagent::paginate(7);
    return view('travelagent', compact('travelagent'));
})->middleware('auth');

Route::get('/message/influencer', function () {
    $influencer=influencer::paginate(7);
    return view('influencer', compact('influencer'));
})->middleware('auth');

Route::get('/message/message', function () {
    $message=message::orderBy('created_at','DESC')->paginate(10);
    return view('message', compact('message'));
})->middleware('auth');

Route::get('/message/affiliate', function () {
    $affiliate=affiliate::orderBy('created_at','DESC')->paginate(10);
    return view('affiliate', compact('affiliate'));
})->middleware('auth');

Route::get('/message/selltours', function () {
    $selltours=selltours::orderBy('created_at','DESC')->paginate(10);
    return view('selltours', compact('selltours'));
})->middleware('auth');

Route::get('/message/platform', function () {
    $platform=platform::orderBy('created_at','DESC')->paginate(10);
    return view('platform', compact('platform'));
})->middleware('auth');

Route::get('/blogadmin/formblog', function () {
    $tags=DB::table('tags')->get();
    $bahasa=bahasa::get();
    return view('formblog',compact('tags','bahasa'));
})->middleware('auth');

Route::get('/paketwisata/form', function () {
    $destination=destination::get();
    $bahasa=bahasa::get();
    $season=season::get();
    $province=province::get();
    $region=region::get();
    return view('frontend.forms',compact('destination','season','bahasa','province','region'));
})->middleware('auth');

Route::get('/rating', [App\Http\Controllers\BlogController::class,'kelolarating'])->middleware('auth');
Route::post('insertnewreview', [App\Http\Controllers\BlogController::class,'insertreview'])->middleware('auth');
Route::get('/rating/createreview/form/{idtravel}', [App\Http\Controllers\BlogController::class,'buatreview'])->middleware('auth');
Route::get('/data-booking', [App\Http\Controllers\BlogController::class,'bookinglist'])->middleware('auth');
Route::delete('deleterating/{idrating}', [App\Http\Controllers\BlogController::class,'deleterating'])->middleware('auth');
Route::delete('deletetheme/{idtheme}', [App\Http\Controllers\BlogController::class,'deletetheme'])->middleware('auth');
Route::delete('deletedestination/{iddestination}', [App\Http\Controllers\BlogController::class,'deletedestination'])->middleware('auth');
Route::delete('hapusinclude/{idinclude}', [App\Http\Controllers\BlogController::class,'hapusinclude'])->middleware('auth');
Route::delete('deleteoption/{idoption}', [App\Http\Controllers\BlogController::class,'hapusoption'])->middleware('auth');
Route::delete('hapuswaktu/{idtime}', [App\Http\Controllers\BlogController::class,'hapuswaktu'])->middleware('auth');
Route::delete('hapusexclude/{idexclude}', [App\Http\Controllers\BlogController::class,'hapusexclude'])->middleware('auth');
Route::delete('hapushighlight/{idhighlight}', [App\Http\Controllers\BlogController::class,'hapushighlight'])->middleware('auth');
Route::delete('hapusseason/{idseason}', [App\Http\Controllers\BlogController::class,'hapusseason'])->middleware('auth');
Route::delete('hapusdestination/{iddestination}', [App\Http\Controllers\BlogController::class,'hapusdestination'])->middleware('auth');
Route::delete('hapusimportant/{idimportant}', [App\Http\Controllers\BlogController::class,'hapusimportant'])->middleware('auth');
Route::get('/rating/{idtravel}', [App\Http\Controllers\BlogController::class,'ratingwisata'])->middleware('auth')->middleware('auth');
Route::get('/rating/edit/{idreview}', [App\Http\Controllers\BlogController::class,'editreview'])->middleware('auth')->middleware('auth');

//Routing Blog
Auth::routes();
Route::get('/showhapusblog/{BlogID}', [App\Http\Controllers\BlogController::class,'showhapusblog'])->middleware('auth');
Route::get('/showdetailbooking/{BookingID}', [App\Http\Controllers\BlogController::class,'showdetailbooking'])->middleware('auth');
Route::get('/showdeleteprovince/{ProvinceID}', [App\Http\Controllers\BlogController::class,'showdeleteprovince'])->middleware('auth');
Route::get('/showdeleteregion/{RegionID}', [App\Http\Controllers\BlogController::class,'showdeleteregion'])->middleware('auth');
Route::get('/showhapuslanguage/{LanguageID}', [App\Http\Controllers\BlogController::class,'showhapuslanguage'])->middleware('auth');
Route::get('/showeditcurrency/{RateID}', [App\Http\Controllers\BlogController::class,'showeditcurrency'])->middleware('auth');
Route::get('/showedittheme/{ThemeID}', [App\Http\Controllers\BlogController::class,'showedittheme'])->middleware('auth');
Route::get('/showedittag/{TagID}', [App\Http\Controllers\BlogController::class,'showedittag'])->middleware('auth');
Route::get('/showedittambahprovince/{ProvinceID}', [App\Http\Controllers\BlogController::class,'showedittambahprovince'])->middleware('auth');
Route::get('/showedittambahlocation/{CityID}', [App\Http\Controllers\BlogController::class,'showedittambahlocation'])->middleware('auth');
Route::get('/showeditdestination/{DestinationID}', [App\Http\Controllers\BlogController::class,'showeditdestination'])->middleware('auth');
Route::get('/showeditinclude/{IncludeID}', [App\Http\Controllers\BlogController::class,'showeditinclude'])->middleware('auth');
Route::get('/showeditjam/{JamID}', [App\Http\Controllers\BlogController::class,'showeditjam'])->middleware('auth');
Route::get('/showaddjam/{SubID}', [App\Http\Controllers\BlogController::class,'showaddjam'])->middleware('auth');
Route::get('/showeditexclude/{ExcludeID}', [App\Http\Controllers\BlogController::class,'showeditexclude'])->middleware('auth');
Route::get('/showedithighlight/{HighlightID}', [App\Http\Controllers\BlogController::class,'showedithighlight'])->middleware('auth');
Route::get('/showeditimportant/{ImportantID}', [App\Http\Controllers\BlogController::class,'showeditimportant'])->middleware('auth');
Route::get('/showhapusmessage/{MessageID}', [App\Http\Controllers\BlogController::class,'showhapusmessage'])->middleware('auth');
Route::get('/showmessage/{MessageID}', [App\Http\Controllers\BlogController::class,'showhapusmessage'])->middleware('auth');
Route::get('/detailcorporate/{CorporateID}', [App\Http\Controllers\BlogController::class,'showhapuscorporate'])->middleware('auth');
Route::get('/detailtravelagent/{TravelagentID}', [App\Http\Controllers\BlogController::class,'showhapustravelagent'])->middleware('auth');
Route::get('/detailaffiliate/{AffiliateID}', [App\Http\Controllers\BlogController::class,'showdetailaffiliate'])->middleware('auth');
Route::get('/detailselltours/{SelltoursID}', [App\Http\Controllers\BlogController::class,'showdetailselltours'])->middleware('auth');
Route::get('/detailplatform/{PlatformID}', [App\Http\Controllers\BlogController::class,'showdetailplatform'])->middleware('auth');
Route::get('/detailinfluencer/{InfluencerID}', [App\Http\Controllers\BlogController::class,'showhapusinfluencer'])->middleware('auth');
Route::post('/hapusblog/{idblog}', [App\Http\Controllers\BlogController::class,'hapusblog'])->middleware('auth');
Route::post('/hapustag/{idtags}', [App\Http\Controllers\BlogController::class,'hapustag'])->middleware('auth');
Route::delete('/hapusbooking/{bookingid}', [App\Http\Controllers\BlogController::class,'hapusbooking'])->middleware('auth');
Route::delete('/hapusbahasa/{idlanguage}', [App\Http\Controllers\BlogController::class,'hapusbahasa'])->middleware('auth');
Route::delete('/hapusmessage/{idmessage}', [App\Http\Controllers\BlogController::class,'hapusmessage'])->middleware('auth');
Route::delete('/hapusinfluencer/{idinfluencer}', [App\Http\Controllers\BlogController::class,'hapusinfluencer'])->middleware('auth');
Route::delete('/hapuscorporate/{idcorporate}', [App\Http\Controllers\BlogController::class,'hapusdiscount'])->middleware('auth');
Route::delete('/hapustravelagent/{idtravelagent}', [App\Http\Controllers\BlogController::class,'hapustravelagent'])->middleware('auth');
Route::delete('/hapusaffiliate/{idaffiliate}', [App\Http\Controllers\BlogController::class,'hapusaffiliate'])->middleware('auth');
Route::delete('/hapusselltours/{idselltours}', [App\Http\Controllers\BlogController::class,'hapusselltours'])->middleware('auth');
Route::delete('/hapusplatform/{idplatform}', [App\Http\Controllers\BlogController::class,'hapusplatform'])->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/home/analytics', function () {
    $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
    return view('analytic', ['analyticsData' => $analyticsData]);
})->middleware('auth');

Route::get('/blogadmin/viewblog/{idblog}', [App\Http\Controllers\BlogController::class,'viewblog'])->middleware('auth');
Route::get('/data-booking/filter', [App\Http\Controllers\BlogController::class,'datefilter'])->middleware('auth');
Route::get('/blogadmin/editblog/{idblog}', [App\Http\Controllers\BlogController::class,'editblog'])->middleware('auth');
Route::patch('editblog/{idblog}', [App\Http\Controllers\BlogController::class,'editblogproses'])->middleware('auth');
//edit background
Route::patch('editimagelanding/{idimage}', [App\Http\Controllers\BlogController::class,'editimagelanding'])->middleware('auth');
Route::post('insertimagelanding', [App\Http\Controllers\BlogController::class,'insertimagelanding'])->middleware('auth');
Route::patch('editimagecontact/{idimage}', [App\Http\Controllers\BlogController::class,'editimagecontact'])->middleware('auth');
Route::post('insertimagecontact', [App\Http\Controllers\BlogController::class,'insertimagecontact'])->middleware('auth');
Route::patch('editimageinfluencer/{idimage}', [App\Http\Controllers\BlogController::class,'editimageinfluencer'])->middleware('auth');
Route::post('insertimageinfluencer', [App\Http\Controllers\BlogController::class,'insertimageinfluencer'])->middleware('auth');
Route::patch('editimageplatform/{idimage}', [App\Http\Controllers\BlogController::class,'editimageplatform'])->middleware('auth');
Route::post('insertimageplatform', [App\Http\Controllers\BlogController::class,'insertimageplatform'])->middleware('auth');
Route::patch('editimagecorporate/{idimage}', [App\Http\Controllers\BlogController::class,'editimagecorporate'])->middleware('auth');
Route::post('insertimagecorporate', [App\Http\Controllers\BlogController::class,'insertimagecorporate'])->middleware('auth');
Route::patch('editimageagent/{idimage}', [App\Http\Controllers\BlogController::class,'editimageagent'])->middleware('auth');
Route::post('insertimageagent', [App\Http\Controllers\BlogController::class,'insertimageagent'])->middleware('auth');
Route::patch('editimageaffiliate/{idimage}', [App\Http\Controllers\BlogController::class,'editimageaffiliate'])->middleware('auth');
Route::post('insertimageaffiliate', [App\Http\Controllers\BlogController::class,'insertimageaffiliate'])->middleware('auth');
Route::patch('editimageselltours/{idimage}', [App\Http\Controllers\BlogController::class,'editimageselltours'])->middleware('auth');
Route::patch('insertimageselltours', [App\Http\Controllers\BlogController::class,'insertimageselltours'])->middleware('auth');
Route::patch('editimageabout/{idimage}', [App\Http\Controllers\BlogController::class,'editimageabout'])->middleware('auth');
Route::post('insertimageabout', [App\Http\Controllers\BlogController::class,'insertimageabout'])->middleware('auth');
Route::patch('editreview/{idreview}', [App\Http\Controllers\BlogController::class,'editreviewprocess'])->middleware('auth');
Route::patch('editwisata/{idwisata}', [App\Http\Controllers\BlogController::class,'editproseswisata'])->middleware('auth');
Route::patch('diskonpost/{travelid}', [App\Http\Controllers\BlogController::class,'diskonpost'])->middleware('auth');
Route::get('/home/viewblog/{idblog}', [App\Http\Controllers\BlogController::class,'viewblog'])->middleware('auth');
Auth::routes();
Route::post('insertblog',[App\Http\Controllers\BlogController::class, 'insertblog'])->middleware('auth');
Route::post('insertseason',[App\Http\Controllers\BlogController::class, 'insertseason'])->middleware('auth');
Route::post('insertdestinationcategory',[App\Http\Controllers\BlogController::class, 'insertdestinationcategory'])->middleware('auth');


//jogjaborobudur blog
Route::get('/blog', [App\Http\Controllers\BlogController::class,'landingpageblog']);
Route::get('/blog/list', [App\Http\Controllers\BlogController::class,'listblog']);
Route::get('/blog/{slug}', [App\Http\Controllers\BlogController::class,'detailblog']);
Route::get('/blog/allblogs', [App\Http\Controllers\BlogController::class,'allblog']);
Route::get('/blog/tag/{tagsid}', [App\Http\Controllers\BlogController::class,'tagsview']);
Route::get('/bahasa', function(){
    $bahasa=bahasa::get();
    return view('bahasa',compact('bahasa'));
});
Route::get('/season', function(){
    $season=season::get();
    return view('season',compact('season'));
});

Route::get('/tag-blog', function(){
    $tag=tags::get();
    return view('formtags',compact('tag'));
});
Route::post('addtag', [App\Http\Controllers\BlogController::class,'addtag']);

Route::post('insertcoment', [App\Http\Controllers\BlogController::class,'insertcomment']);
Route::get('/facebookshare', [App\Http\Controllers\BlogController::class,'sharefacebookblog']);


//travel route admin
Route::get('/get-search-recommendations', [App\Http\Controllers\TravelController::class,'getSearchprovince']);
Route::get('/get-search-results', [App\Http\Controllers\TravelController::class,'getSearchResults']);
Route::get('/check-destination', [App\Http\Controllers\TravelController::class,'checkDestination']);
Route::post('inserttravel', [App\Http\Controllers\TravelController::class,'inserttravel']);
Route::post('insertoption', [App\Http\Controllers\BlogController::class,'insertoption']);
Route::post('addbahasa', [App\Http\Controllers\BlogController::class,'addbahasa']);
Route::post('insertrating', [App\Http\Controllers\TravelController::class,'insertrating']);
Route::get('filtertravel', [App\Http\Controllers\TravelController::class,'filtertravel']);
Route::get('/booking/{idpilihan}', [App\Http\Controllers\TravelController::class,'booking']);
Route::post('inserttravelagent', [App\Http\Controllers\TravelController::class,'inserttravelagent']);
Route::post('insertaffiliate', [App\Http\Controllers\TravelController::class,'insertaffiliate']);
Route::post('insertplatform', [App\Http\Controllers\TravelController::class,'insertplatform']);
Route::post('insertselltours', [App\Http\Controllers\TravelController::class,'insertselltours']);
Route::post('insertmessage', [App\Http\Controllers\TravelController::class,'insertmessage']);
Route::post('insertcorporatediscount', [App\Http\Controllers\TravelController::class,'insertcorporatediscount']);
Route::post('insertinfluencer', [App\Http\Controllers\TravelController::class,'insertinfluencer']);
Route::get('/home/viewtravel/{idtravel}', [App\Http\Controllers\TravelController::class,'viewtraveladmin']);
Route::get('/item/{slug}', [App\Http\Controllers\TravelController::class,'itemtravel']);
Route::get('/location/{slugprovince}/item/{slug}', [App\Http\Controllers\TravelController::class,'itemprovince']);
Route::get('/city/{slugregion}/item/{slug}', [App\Http\Controllers\TravelController::class,'itemprovince']);
Route::get('/city/{slugcity}', [App\Http\Controllers\TravelController::class,'viewcity']);
Route::get('/location/{slugprovince}/{idprovince}', [App\Http\Controllers\TravelController::class,'viewprovince']);
Route::get('/paketwisata/viewtravel/{idtravel}', [App\Http\Controllers\TravelController::class,'viewtraveladmin']);
Route::get('/showhapuswisata/hapus/{WisataID}', [App\Http\Controllers\BlogController::class,'showhapuswisata']);
Route::get('/showeditharga/{HargaID}', [App\Http\Controllers\BlogController::class,'showeditharga']);
Route::get('/showeditdestinasi/{DestinasiID}', [App\Http\Controllers\BlogController::class,'showeditdestinasi']);
Route::get('/showeditseason/{SeasonID}', [App\Http\Controllers\BlogController::class,'showeditseason']);
Route::get('/showeditoption/{OptionID}', [App\Http\Controllers\BlogController::class,'showeditoption']);
Route::get('/showedithargachild/{ChildID}', [App\Http\Controllers\BlogController::class,'showedithargachild']);
Route::get('/showeditdiskon/{WisataID}', [App\Http\Controllers\BlogController::class,'showeditdiskon']);
Route::post('/hapuswisata/{idwisata}', [App\Http\Controllers\BlogController::class,'hapuswisata']);
Route::get('/formseason',function(){
    return view('formseason');
})->middleware('auth');

Route::get('/province/form',function(){
    return view('formprovince');
})->middleware('auth');
Route::post('insertprovince', [BlogController::class, 'insertprovince']);

Route::get('/region/form',function(){
    return view('formregion');
})->middleware('auth');

Route::post('insertregion', [BlogController::class, 'insertregion'])->middleware('auth');
Route::post('/hapusprovince/{idprovince}', [App\Http\Controllers\BlogController::class,'hapusprovince'])->middleware('auth');
Route::post('/hapusregion/{idregions}', [App\Http\Controllers\BlogController::class,'hapusregion'])->middleware('auth');
Route::patch('/updateprovince/{provinceid}',[BlogController::class,'updateprovince'])->middleware('auth');
Route::patch('/updateregion/{regionid}',[BlogController::class,'updateregion'])->middleware('auth');
Route::delete('/deletetambahprovince/{idprovince}',[BlogController::class,'deletetambahprovince'])->middleware('auth');
Route::delete('/deletetambahlocation/{idcity}',[BlogController::class,'deletetambahlocation'])->middleware('auth');
Route::get('/paketwisata/edit/buatlocation/{travelid}', [BlogController::class, 'formlocation'])->middleware('auth');
Route::post('insertlocation', [BlogController::class, 'insertlocation']);
Route::get('/region',function(){
    $region=region::get();
    return view('region', compact('region'));
})->middleware('auth');
Route::get('/region/edit/{regionid}', [BlogController::class,'editregion'])->middleware('auth');

Route::get('/province',function(){
    $province=province::get();
    return view('province', compact('province'));
})->middleware('auth');

//customer
Route::get('/corporate/corporatediscount',function(){
    $background=background::where('place', 'corporate')->get();
    $bahasa=bahasa::get();
    return view('frontend.companydiscoun',compact('bahasa','background'));
});

Route::get('/influencer/influencer',function(){
    $bahasa=bahasa::get();
    $background=background::where('place', 'influencer')->get();
    return view('frontend.influencer',compact('bahasa','background'));
});
Route::get('/onlinebooking/platform',function(){
    $background=background::where('place', 'platform')->get();
    $bahasa=bahasa::get();
    return view('frontend.bookingplatform',compact('bahasa','background'));
});
Route::get('/affiliate/affiliateprogram',function(){
    $bahasa=bahasa::get();
    $background=background::where('place', 'affiliate')->get();
    return view('frontend.affiliateprogram',compact('bahasa','background'));
});
Route::get('/sellyourtours/sellyourtours',function(){
    $bahasa=bahasa::get();
    $background=background::where('place', 'selltours')->get();
    return view('frontend.sellyourtour',compact('bahasa','background'));
});

Route::get('/travelagent/travelagent',function(){
    $bahasa=bahasa::get();
    $background=background::where('place', 'agent')->get();
    return view('frontend.travelagent',compact('bahasa','background'));
});
Route::get('/contact/contacts-us',function(){
    $bahasa=bahasa::get();
    $background=background::where('place','contact')->get();
    return view('frontend.contact',compact('bahasa','background'));
});
Route::get('/currency/currency',function(){
    $rate=Rate::get();
    $rateidr=Rate::where('currency','IDR')->get();
    $ratemyr=Rate::where('currency','MYR')->get();
    $ratesgd=Rate::where('currency','SGD')->get();
    $rateeur=Rate::where('currency','EUR')->get();
    return view('currency',compact('rateidr','ratemyr','ratesgd','rateeur'));
});
//display background change
Route::get('/background/change/landingpage',function(){
    $background=background::where('place', 'landingpage')->get();
    return view('formbackground',compact('background'));
})->middleware('auth');

Route::get('/background/change/agent',function(){
    $background=background::where('place', 'agent')->get();
    return view('backgroundagent',compact('background'));
})->middleware('auth');

Route::get('/background/change/affiliate',function(){
    $background=background::where('place', 'affiliate')->get();
    return view('backgroundaffiliate',compact('background'));
})->middleware('auth');

Route::get('/background/change/selltours',function(){
    $background=background::where('place', 'selltours')->get();
    return view('backgroundselltours',compact('background'));
})->middleware('auth');

Route::get('/background/change/about',function(){
    $background=background::where('place', 'about')->get();
    return view('backgroundabout',compact('background'));
})->middleware('auth');

Route::get('/background/change/corporate',function(){
    $background=background::where('place', 'corporate')->get();
    return view('backgroundcorporate',compact('background'));
})->middleware('auth');

Route::get('/background/change/contact',function(){
    $background=background::where('place', 'contact')->get();
    return view('backgroundcontact',compact('background'));
})->middleware('auth');

Route::get('/background/change/influencer',function(){
    $background=background::where('place', 'influencer')->get();
    return view('backgroundinfluencer',compact('background'));
})->middleware('auth');

Route::get('/background/change/platform',function(){
    $background=background::where('place', 'platform')->get();
    return view('backgroundplatform',compact('background'));
})->middleware('auth');

Route::get('/paketwisata/editimage/{idwisata}',function($idwisata){
    $gambar=travel::where('wisata_id',$idwisata)->get();
    return view('editimagetravel', compact('gambar'));
})->middleware('auth');

Route::patch('/editimagetravel/{idtravel}',[BlogController::class,'editimagetravel'])->middleware('auth');
Route::patch('/updatecurrency/{idrate}',[BlogController::class,'updatecurrency'])->middleware('auth');
Route::patch('/updatetheme/{idtheme}',[BlogController::class,'updatetheme'])->middleware('auth');
Route::patch('/updatecategory/{iddestination}',[BlogController::class,'updatecategory'])->middleware('auth');
Route::patch('/updateharga/{idharga}',[BlogController::class,'updateharga'])->middleware('auth');
Route::patch('/updateoption/{idoption}',[BlogController::class,'updateoption'])->middleware('auth');
Route::post('/updateavailableoption/{idoption}',[BlogController::class,'updateAvailableOption'])->middleware('auth');
Route::patch('/updatetambahprovince/{idprovince}',[BlogController::class,'updatetambahprovince'])->middleware('auth');
Route::patch('/updatetambahlocation/{idcity}',[BlogController::class,'updatetambahlocation'])->middleware('auth');
Route::patch('/updateinclude/{idinclude}',[BlogController::class,'updateinclude'])->middleware('auth');
Route::patch('/updatedestinasi/{iddestination}',[BlogController::class,'updatedestinasi'])->middleware('auth');
Route::patch('/updateseason/{idseason}',[BlogController::class,'updateseason'])->middleware('auth');
Route::patch('/updatetag/{idtag}',[BlogController::class,'updatetag'])->middleware('auth');
Route::patch('/updatetime/{idtime}',[BlogController::class,'updatetime'])->middleware('auth');
Route::patch('/updateexclude/{idexclude}',[BlogController::class,'updateexclude'])->middleware('auth');
Route::post('addinclude', [BlogController::class, 'addinclude'])->middleware('auth');
Route::post('addtime', [BlogController::class, 'addtime'])->middleware('auth');
Route::post('addcity', [BlogController::class, 'addcity'])->middleware('auth');
Route::post('addhargaperson', [BlogController::class, 'addhargaperson'])->middleware('auth');
Route::post('addhargachild', [BlogController::class, 'addhargachild'])->middleware('auth');
Route::delete('deletetime/{idjam}', [BlogController::class, 'deletetime'])->middleware('auth');
Route::delete('deletehargaperson/{idperson}', [BlogController::class, 'deletehargaperson'])->middleware('auth');
Route::delete('deletehargachild/{idchild}', [BlogController::class, 'deletehargachild'])->middleware('auth');
Route::post('insertbackgroundlanding', [BlogController::class, 'insertbackground'])->middleware('auth');
Route::post('addexclude', [BlogController::class, 'addexclude'])->middleware('auth');
Route::post('addhighlight', [BlogController::class, 'addhighlight'])->middleware('auth');
Route::post('addseason', [BlogController::class, 'addseason'])->middleware('auth');
Route::post('adddestination', [BlogController::class, 'adddestination'])->middleware('auth');
Route::post('addimportant', [BlogController::class, 'addimportant'])->middleware('auth');
Route::patch('/updatehighlight/{idhighlight}',[BlogController::class,'updatehighlight'])->middleware('auth');
Route::patch('/updateimportant/{idimportant}',[BlogController::class,'updateimportant'])->middleware('auth');
Route::patch('/updatehargachild/{idhargachild}',[BlogController::class,'updatehargachild'])->middleware('auth');
Route::patch('/updatediskon/{idtravell}',[BlogController::class,'updatediskon'])->middleware('auth');
Route::post('generatepdf',[App\Http\Controllers\emailController::class, 'sendPDF']);
Route::get("/change-session/{currency}", function ($currency) {
    session()->put("rate", $currency);
    // kembali ke welcome
    return back();
});

//post admin kirim link review
Route::post('/sendlinkreview/{idbooking}', [App\Http\Controllers\Reviewemail::class,'sendReviewLinks']);
Route::get('/automailreview', [App\Http\Controllers\Reviewemail::class,'autoSendReviewLinks']);
Route::get('/reviewtour/{token}', [App\Http\Controllers\Reviewemail::class,'reviewpage']);
Route::patch('insertreview', [App\Http\Controllers\Reviewemail::class,'insertReview']);
//filter season
Route::get('/locationfilter/{slugprovince}/{namaseason}', [App\Http\Controllers\TravelController::class,'filterseasonprovince'])->name('filter-season-province');
Route::get('/cityfilter/{slugregion}/{namaseason}', [App\Http\Controllers\TravelController::class,'filterseasoncity']);
Route::get('/destinationfilter/{categoryid}/{namaseason}', [App\Http\Controllers\TravelController::class,'filterseasondestination']);
//route fallback
Route::get('/cekpayment', [App\Http\Controllers\PaymentController::class,'testPayment']);
Route::get('/cobapayment',function(){
    return view('frontend.cobaPayment');
});

//date available admins
Route::get('/dateavailable', [App\Http\Controllers\AdminController::class,'getTravel'])->middleware('auth');
Route::get('/dateavailable/item/{slug}', [App\Http\Controllers\AdminController::class,'getTraveldate'])->middleware('auth');
Route::get('/dateavailable/item/manage/{id}', [App\Http\Controllers\AdminController::class,'getTraveloption'])->middleware('auth');
Route::get('/dateavailable/item/manage/create/{id}', [App\Http\Controllers\AdminController::class,'createDateavailable'])->middleware('auth');
Route::post('/dateavailable', [App\Http\Controllers\AdminController::class,'postAvailable'])->middleware('auth');
Route::get('/dateavailablecheck', [App\Http\Controllers\AdminController::class,'cekAvailability'])->middleware('auth');
//fallback
Route::fallback(function () {
 $bahasa=bahasa::get();
 $lang=Request::server('HTTP_ACCEPT_LANGUAGE');
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
    });
 
    Route::get('/sitemap', function(){
        $sitemap = Sitemap::create()
        ->add(Url::create('/')->setPriority(1.0))
        ->add(Url::create('/contact/contacts-us'))
        ->add(Url::create('/blog/list'))
        ->add(Url::create('/about-us'))
        ->add(Url::create('/alltours'))
        ->add(Url::create('/blog'))
        ->add(Url::create('/terms-condition'))
        ->add(Url::create('/privacy-policy'))
        ->add(Url::create('/onlinebooking/platform'))
        ->add(Url::create('/corporate/corporatediscount'))
        ->add(Url::create('/influencer/influencer'))
        ->add(Url::create('/affiliate/affiliateprogram'))
        ->add(Url::create('/sellyourtours/sellyourtours'));
        
        $itemwisata = travel::all();
        foreach ($itemwisata as $item) {
            $sitemap->add(Url::create("/item/{$item->slug}"));
        }

        $location = province::all();
        foreach ($location as $item) {
            $sitemap->add(Url::create("/location/{$item->slugprovince}/{$item->id}"));
        }

        $city = region::all();
        foreach ($city as $item) {
            $sitemap->add(Url::create("/city/{$item->slugregion}"));
        }

        $season = season::all();
        foreach ($season as $item) {
            $sitemap->add(Url::create("/season/{$item->id}"));
        }

        $tag = tags::all();
        foreach ($tag as $item) {
            $sitemap->add(Url::create("/blog/tag/{$item->tags}"));
        }

        $blog = blog::all();
        foreach ($blog as $item) {
            $sitemap->add(Url::create("/blog/{$item->slug}"));
        }

        $sitemap->writeToFile(('sitemap.xml'));
    }); 
