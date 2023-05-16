<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\emailController;
use App\Models\blog;
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
use App\Models\bahasa;
use App\Models\hargachild;
use App\Models\highlight;
use App\Models\season;
use App\Models\tambahseason;
use Illuminate\Support\Str;

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


Route::get('/', function (Request $request) {
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
    
    //$English = travel::where("bahasa",$sessions)->first()->bahasa;
    $bahasa=bahasa::get();
    $destinate=destination::get();
    $destination=destination::paginate(3);
    $rateIDR = Rate::where("currency", "IDR")->first()->rate;
    $rateSGD = Rate::where("currency", "SGD")->first()->rate;
    $rateMYR = Rate::where("currency", "MYR")->first()->rate;
    $rateEUR = Rate::where("currency", "EUR")->first()->rate;
    $season = season::get();
    // get session user
    $session = session()->get("rate") ?? "USD";
    $traveltop=travel::where('bahasa',$sessions)->paginate(8);
    
    //$traveltop=travel::paginate(8);
    $other=travel::where('label','Likely to sell out')->where('bahasa', $sessions)->paginate(4);
    $blog=blog::orderBy('created_at','DESC')->where('bahasa', $sessions)->paginate(3);
    return view('frontend.index', compact('sessions','traveltop','other','blog',"rateIDR", "rateSGD", "rateMYR", "session","rateEUR","destination",'destinate','season','bahasa'));
});



Route::get('/paketwisata', function () {
    $travel=travel::orderBy('created_at','DESC')->paginate(9);
    return view('wisata',compact('travel'));
});

Route::get('/formss', function () {
    $destination=destination::get();
    return view('frontend.formnew',compact('destination'));
});

Route::get('/privacy-policy', function () {
    return view('frontend.privacypolicy');
});

Route::get('/journey', function () {
    return view('frontend.journey');
});

Route::get('/destination-category',function(){
$destination=destination::get();
return view('destinationcategory',compact('destination'));
});

Route::get('category-destination/{iddestination}',[App\Http\Controllers\TravelController::class,'categorydestination']);
Route::get('season/{idseason}',[App\Http\Controllers\TravelController::class,'seasons']);
Route::get('destination',[App\Http\Controllers\TravelController::class,'destinasi']);
Route::get('alltours',[App\Http\Controllers\TravelController::class,'destinations']);
// Route::get('items/category-destination/{iddestination}',[App\Http\Controllers\TravelController::class,'categorydestination']);

Route::get('/destination-category/form',function(){
return view('formcategory');
});


Route::get('/about-us', function(){
$bahasa=bahasa::get();
return view('frontend.about',compact('bahasa'));
});

Route::get('/paketwisata/diskon/{travelid}', [App\Http\Controllers\BlogController::class,'diskon']);
Route::get('/paketwisata/diskon/buatoption/{travelid}', [App\Http\Controllers\BlogController::class,'buatoption']);
Route::get('/paketwisata/edit/{idwisata}', [App\Http\Controllers\BlogController::class,'editwisata']);

Route::get('/blogadmin', function () {
    $blog=blog::orderBy('created_at','DESC')->paginate(7);
    return view('blog', compact('blog'));
});

Route::get('/background/change', function(){
return view('changebackground');
});

Route::get('/message/corporate', function () {
    $corporate=corporate::paginate(7);
    return view('corporate', compact('corporate'));
});

Route::get('/message/travelagent', function () {
    $travelagent=travelagent::paginate(7);
    return view('travelagent', compact('travelagent'));
});

Route::get('/message/influencer', function () {
    $influencer=influencer::paginate(7);
    return view('influencer', compact('influencer'));
});

Route::get('/message/message', function () {
    $message=message::orderBy('created_at','DESC')->paginate(10);
    return view('message', compact('message'));
});

Route::get('/message/affiliate', function () {
    $affiliate=affiliate::orderBy('created_at','DESC')->paginate(10);
    return view('affiliate', compact('affiliate'));
});

Route::get('/message/selltours', function () {
    $selltours=selltours::orderBy('created_at','DESC')->paginate(10);
    return view('selltours', compact('selltours'));
});

Route::get('/message/platform', function () {
    $platform=platform::orderBy('created_at','DESC')->paginate(10);
    return view('platform', compact('platform'));
});

Route::get('/blogadmin/formblog', function () {
    $tags=DB::table('tags')->get();
    $bahasa=bahasa::get();
    return view('formblog',compact('tags','bahasa'));
});


Route::get('/paketwisata/form', function () {
    $destination=destination::get();
    $bahasa=bahasa::get();
    $season=season::get();
    return view('frontend.forms',compact('destination','season','bahasa'));
});
Route::get('/rating', [App\Http\Controllers\BlogController::class,'kelolarating']);
Route::get('/data-booking', [App\Http\Controllers\BlogController::class,'bookinglist']);
Route::delete('deleterating/{idrating}', [App\Http\Controllers\BlogController::class,'deleterating']);
Route::delete('deletetheme/{idtheme}', [App\Http\Controllers\BlogController::class,'deletetheme']);
Route::delete('deletedestination/{iddestination}', [App\Http\Controllers\BlogController::class,'deletedestination']);
Route::delete('hapusinclude/{idinclude}', [App\Http\Controllers\BlogController::class,'hapusinclude']);
Route::delete('deleteoption/{idoption}', [App\Http\Controllers\BlogController::class,'hapusoption']);
Route::delete('hapuswaktu/{idtime}', [App\Http\Controllers\BlogController::class,'hapuswaktu']);
Route::delete('hapusexclude/{idexclude}', [App\Http\Controllers\BlogController::class,'hapusexclude']);
Route::delete('hapushighlight/{idhighlight}', [App\Http\Controllers\BlogController::class,'hapushighlight']);
Route::get('/rating/{idtravel}', [App\Http\Controllers\BlogController::class,'ratingwisata']);




// Route::get('/index', function () {
//     return view('admin');
// });
Route::get('/cekblog', function () {
    return view('blogjogjaborobudur.content');
});

//Routing Blog
Auth::routes();
Route::get('/showhapusblog/{BlogID}', [App\Http\Controllers\BlogController::class,'showhapusblog']);
Route::get('/showdetailbooking/{BookingID}', [App\Http\Controllers\BlogController::class,'showdetailbooking']);
Route::get('/showhapuslanguage/{LanguageID}', [App\Http\Controllers\BlogController::class,'showhapuslanguage']);
Route::get('/showeditcurrency/{RateID}', [App\Http\Controllers\BlogController::class,'showeditcurrency']);
Route::get('/showedittheme/{ThemeID}', [App\Http\Controllers\BlogController::class,'showedittheme']);
Route::get('/showeditdestination/{DestinationID}', [App\Http\Controllers\BlogController::class,'showeditdestination']);
Route::get('/showeditinclude/{IncludeID}', [App\Http\Controllers\BlogController::class,'showeditinclude']);
Route::get('/showeditjam/{JamID}', [App\Http\Controllers\BlogController::class,'showeditjam']);
Route::get('/showeditexclude/{ExcludeID}', [App\Http\Controllers\BlogController::class,'showeditexclude']);
Route::get('/showedithighlight/{HighlightID}', [App\Http\Controllers\BlogController::class,'showedithighlight']);
Route::get('/showhapusmessage/{MessageID}', [App\Http\Controllers\BlogController::class,'showhapusmessage']);
Route::get('/showmessage/{MessageID}', [App\Http\Controllers\BlogController::class,'showhapusmessage']);
Route::get('/detailcorporate/{CorporateID}', [App\Http\Controllers\BlogController::class,'showhapuscorporate']);
Route::get('/detailtravelagent/{TravelagentID}', [App\Http\Controllers\BlogController::class,'showhapustravelagent']);
Route::get('/detailaffiliate/{AffiliateID}', [App\Http\Controllers\BlogController::class,'showdetailaffiliate']);
Route::get('/detailselltours/{SelltoursID}', [App\Http\Controllers\BlogController::class,'showdetailselltours']);
Route::get('/detailplatform/{PlatformID}', [App\Http\Controllers\BlogController::class,'showdetailplatform']);
Route::get('/detailinfluencer/{InfluencerID}', [App\Http\Controllers\BlogController::class,'showhapusinfluencer']);
Route::delete('/hapusblog/{idblog}', [App\Http\Controllers\BlogController::class,'hapusblog']);
Route::delete('/hapusbooking/{bookingid}', [App\Http\Controllers\BlogController::class,'hapusbooking']);
Route::delete('/hapusbahasa/{idlanguage}', [App\Http\Controllers\BlogController::class,'hapusbahasa']);
Route::delete('/hapusmessage/{idmessage}', [App\Http\Controllers\BlogController::class,'hapusmessage']);
Route::delete('/hapusinfluencer/{idinfluencer}', [App\Http\Controllers\BlogController::class,'hapusinfluencer']);
Route::delete('/hapuscorporate/{idcorporate}', [App\Http\Controllers\BlogController::class,'hapusdiscount']);
Route::delete('/hapustravelagent/{idtravelagent}', [App\Http\Controllers\BlogController::class,'hapustravelagent']);
Route::delete('/hapusaffiliate/{idaffiliate}', [App\Http\Controllers\BlogController::class,'hapusaffiliate']);
Route::delete('/hapusselltours/{idselltours}', [App\Http\Controllers\BlogController::class,'hapusselltours']);
Route::delete('/hapusplatform/{idplatform}', [App\Http\Controllers\BlogController::class,'hapusplatform']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/viewblog', function(){
//     return view('viewblog');
// });
Route::get('/blogadmin/viewblog/{idblog}', [App\Http\Controllers\BlogController::class,'viewblog']);
Route::get('/data-booking/filter', [App\Http\Controllers\BlogController::class,'datefilter']);
Route::get('/blogadmin/editblog/{idblog}', [App\Http\Controllers\BlogController::class,'editblog']);
Route::patch('editblog/{idblog}', [App\Http\Controllers\BlogController::class,'editblogproses']);
Route::patch('editwisata/{idwisata}', [App\Http\Controllers\BlogController::class,'editproseswisata']);
Route::patch('diskonpost/{travelid}', [App\Http\Controllers\BlogController::class,'diskonpost']);
Route::get('/home/viewblog/{idblog}', [App\Http\Controllers\BlogController::class,'viewblog']);
Auth::routes();
Route::post('insertblog',[App\Http\Controllers\BlogController::class, 'insertblog']);
Route::post('insertseason',[App\Http\Controllers\BlogController::class, 'insertseason']);
Route::post('insertdestinationcategory',[App\Http\Controllers\BlogController::class, 'insertdestinationcategory']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//jogjaborobudur blog
Route::get('/blog', [App\Http\Controllers\BlogController::class,'landingpageblog']);
Route::get('/blog/list', [App\Http\Controllers\BlogController::class,'listblog']);
Route::get('/blog/{slug}', [App\Http\Controllers\BlogController::class,'detailblog']);
Route::get('/blog/allblogs', [App\Http\Controllers\BlogController::class,'allblog']);
Route::get('/blog/tag/{tagsid}', [App\Http\Controllers\BlogController::class,'tagsview']);
// Route::get('/about', function(){
//     return view('blogs.about');
// });
// Route::get('/contact', function(){
//     return view('blogs.contact');
// });
Route::get('/bahasa', function(){
    $bahasa=bahasa::get();
    return view('bahasa',compact('bahasa'));
});
Route::get('/season', function(){
    $season=season::get();
    return view('season',compact('season'));
});

Route::post('insertcoment', [App\Http\Controllers\BlogController::class,'insertcomment']);
Route::get('/facebookshare', [App\Http\Controllers\BlogController::class,'sharefacebookblog']);


//travel route admin
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
Route::get('/paketwisata/viewtravel/{idtravel}', [App\Http\Controllers\TravelController::class,'viewtraveladmin']);
Route::get('/showhapuswisata/{WisataID}', [App\Http\Controllers\BlogController::class,'showhapuswisata']);
Route::get('/showeditharga/{HargaID}', [App\Http\Controllers\BlogController::class,'showeditharga']);
Route::get('/showeditdestinasi/{DestinasiID}', [App\Http\Controllers\BlogController::class,'showeditdestinasi']);
Route::get('/showeditseason/{SeasonID}', [App\Http\Controllers\BlogController::class,'showeditseason']);
Route::get('/showeditoption/{OptionID}', [App\Http\Controllers\BlogController::class,'showeditoption']);
Route::get('/showedithargachild/{ChildID}', [App\Http\Controllers\BlogController::class,'showedithargachild']);
Route::delete('/hapuswisata/{idwisata}', [App\Http\Controllers\BlogController::class,'hapuswisata']);
Route::get('/formseason',function(){
    return view('formseason');
});

//customer
Route::get('/corporate/corporatediscount',function(){
    $bahasa=bahasa::get();
    return view('frontend.companydiscoun',compact('bahasa'));
});

Route::get('/influencer/influencer',function(){
    $bahasa=bahasa::get();
    return view('frontend.influencer',compact('bahasa'));
});
Route::get('/onlinebooking/platform',function(){
    $bahasa=bahasa::get();
    return view('frontend.bookingplatform',compact('bahasa'));
});
Route::get('/affiliate/affiliateprogram',function(){
    $bahasa=bahasa::get();
    return view('frontend.affiliateprogram',compact('bahasa'));
});
Route::get('/sellyourtours/sellyourtours',function(){
    $bahasa=bahasa::get();
    return view('frontend.sellyourtour',compact('bahasa'));
});
Route::get('/jajal',function(){
    return view('frontend.jajal');
});
Route::get('/travelagent/travelagent',function(){
    $bahasa=bahasa::get();
    return view('frontend.travelagent',compact('bahasa'));
});
Route::get('/contact/contacts-us',function(){
    $bahasa=bahasa::get();
    return view('frontend.contact',compact('bahasa'));
});
Route::get('/currency/currency',function(){
    $rate=Rate::get();
    $rateidr=Rate::where('currency','IDR')->get();
    $ratemyr=Rate::where('currency','MYR')->get();
    $ratesgd=Rate::where('currency','SGD')->get();
    $rateeur=Rate::where('currency','EUR')->get();
    return view('currency',compact('rateidr','ratemyr','ratesgd','rateeur'));
});
Route::patch('/updatecurrency/{idrate}',[BlogController::class,'updatecurrency']);
Route::patch('/updatetheme/{idtheme}',[BlogController::class,'updatetheme']);
Route::patch('/updatecategory/{iddestination}',[BlogController::class,'updatecategory']);
Route::patch('/updateharga/{idharga}',[BlogController::class,'updateharga']);
Route::patch('/updateoption/{idoption}',[BlogController::class,'updateoption']);
Route::patch('/updateinclude/{idinclude}',[BlogController::class,'updateinclude']);
Route::patch('/updatedestinasi/{iddestination}',[BlogController::class,'updatedestinasi']);
Route::patch('/updateseason/{idseason}',[BlogController::class,'updateseason']);
Route::patch('/updatetime/{idtime}',[BlogController::class,'updatetime']);
Route::patch('/updateexclude/{idexclude}',[BlogController::class,'updateexclude']);
Route::post('addinclude', [BlogController::class, 'addinclude']);
Route::post('addtime', [BlogController::class, 'addtime']);
Route::post('addexclude', [BlogController::class, 'addexclude']);
Route::post('addhighlight', [BlogController::class, 'addhighlight']);
Route::patch('/updatehighlight/{idhighlight}',[BlogController::class,'updatehighlight']);
Route::patch('/updatehargachild/{idhargachild}',[BlogController::class,'updatehargachild']);
Route::post('generatepdf',[App\Http\Controllers\emailController::class, 'sendPDF']);




Route::get('/item', function(){
    $other=travel::paginate(9);
     $destination = destination::get();
    $rateIDR = Rate::where("currency", "IDR")->first()->rate;
    $rateSGD = Rate::where("currency", "SGD")->first()->rate;
    $rateMYR = Rate::where("currency", "MYR")->first()->rate;
    $rateEUR = Rate::where("currency", "EUR")->first()->rate;
    // get session user
    $session = session()->get("rate") ?? "USD";
    return view('frontend.jajal', compact('other','rateIDR','rateMYR','rateSGD','session','rateEUR'));
});

Route::get("/change-session/{currency}", function ($currency) {
    session()->put("rate", $currency);
    // kembali ke welcome
    return back();
});


