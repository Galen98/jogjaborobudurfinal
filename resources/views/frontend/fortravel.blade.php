<!DOCTYPE html>
@if($sessions == 'English')
<html lang="en-US" default-lang="en-US">
@endif
@if($sessions == 'Bahasa')
<html lang="id" default-lang="id">
@endif
@if($sessions == 'Malay')
<html lang="ms" default-lang="ms">
@endif
<head>
  @foreach($travel as $item)
  <meta charset="utf-8" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.css" integrity="sha512-FA9cIbtlP61W0PRtX36P6CGRy0vZs0C2Uw26Q1cMmj3xwhftftymr0sj8/YeezDnRwL9wtWw8ZwtCiTDXlXGjQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.css" integrity="sha512-/Jsoj+nRoCkEHw4HnymLk48dWblqtN+0rW+UMAanfbHZjzgphJipQOEuuOEdZ0IzSEYgK0NXCNda8r+4juGbPg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{asset('traveler')}}/css/themify-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/blitzer/jquery-ui.min.css" integrity="sha512-ibBo2Ns078qm7xZNTPbIrg5XP4pZ+Aujfmz0QFsce2f4LYpCnF1Esy6FkIRFBgXC9cY30XiS7Ui9+RpN8K7ICg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{asset('traveler')}}/css/bootstrap.css">
  <link href="{{asset('traveler')}}/css/blogs2.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="{{asset('traveler')}}/css/blogs.css" />
  <link rel="stylesheet" href="{{asset('traveler')}}/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('traveler')}}/css/style.css">
  <link rel="stylesheet" href="{{asset('traveler')}}/css/lightbox.min.css">
  <link rel="preload" href="{{asset('traveler')}}/css/new.css" as="style">
  <link rel="stylesheet" href="{{asset('traveler')}}/css/new2.css">
  <link rel="stylesheet" href="{{asset('traveler')}}/css/new3.css">
  <link rel="stylesheet" href="{{asset('traveler')}}/css/new7.css">
  <link rel="stylesheet" href="{{asset('traveler')}}/css/grids.css">
  <link rel="stylesheet" href="{{asset('traveler')}}/css/location.css"> 
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('spica')}}/images/favicon.png">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('spica')}}/images/favicon.png">
  <link rel="shortcut icon" href="favicon.png">
  <meta name="viewport"content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"
          />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<style type="text/css">
  @import url('https://fonts.cdnfonts.com/css/gt-eesti-display-trial');
.btn{
font-family: 'GT Eesti Display Trial', sans-serif;
font-family: 'GT Eesti Text Trial', sans-serif;    
}

.gtco-footer-links li{
  font-size: 18px;
}
</style>
<style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 48
}
.short-text, .full-text {
    display: none;
}

.show-short-text .short-text {
    display: inline;
}

.show-full-text .full-text {
    display: inline;
}
</style>
  <!-- google tag -->
  <meta name="title" content="{{$item->namawisata}}" />
  <meta name="description" content="{{$item->shortdescription}}"/>
  <link rel="canonical" href="https://www.jogjaborobudur.com/item/{{$item->slug}}">
  <link rel="canonical" href="https://jogjaborobudur.com/item/{{$item->slug}}">
  <meta name="author" content="Jogja borobudur tour & travel">
  <meta name="robots" content="index, follow">
  <!-- facebook tag -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="www.jogjaborobudur.com/item/{{$item->slug}}" />
  <meta property="og:title" content="{{$item->namawisata}}" />
  <meta property="og:description" content="{{$item->shortdescription}}" />
  <meta property="og:image" content="{{ url('public/img/'.$item->image) }}" />
  <title>{{$item->namawisata}}</title>  
@endforeach
    </head>

    <body>
@yield('content')


<footer id="gtco-footer" role="contentinfo" style="background-color:#fc2c04;padding:0px;">
    <div class="gtco-container">
      <div class="row row-p b-md">
        <div class="col-md-3"  style="margin-top:50px;">
          <div class="gtco-widget">
            <h1 style="font-weight:bold;color: white;margin-bottom: 15px;font-size: 20px;">Payment Method</h1>
            <img style="margin-bottom: 24px;" src="{{asset('spica')}}/images/logomini.png" height="80" width="100">
            <br/>
            <img style="margin-bottom: 10px;" src="{{asset('aset')}}/paypal_border.svg" height="24px" width="35px">
            <img style="margin-bottom: 10px;" src="{{asset('aset')}}/mastercard.svg" height="24px" width="35px">
            <img style="margin-bottom: 10px;" src="{{asset('aset')}}/visa.svg" height="24px" width="35px">
            <img style="margin-bottom: 10px;" src="{{asset('aset')}}/amex.svg" height="24px" width="35px">
            <img style="margin-bottom: 10px;" src="{{asset('aset')}}/discover.svg" height="24px" width="35px">
            <p> </p>
          </div>
        </div>
        <div class="col-md-3 col-md-push-1"  style="margin-top:50px;">
          <div class="gtco-widget">
            <h1 style="font-weight:bold;color: white;margin-bottom: 15px;font-size: 20px;">About Us</h1>
            <ul class="gtco-footer-links" style="color: white;">
              <li><a href="/about-us" style="color: white;">About Us</a></li>
              <li><a href="/blog" style="color: white;">Blog</a></li>
              <li><a href="/contact/contacts-us" style="color: white;">Contact</a></li>
              <li><a href="/terms-condition" style="color: white;">Terms & Condition</a></li>
              <li><a href="/privacy-policy" style="color: white;">Privacy Policy</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-md-push-1"  style="margin-top:50px;">
          <div class="gtco-widget">
            <h1 style="font-weight:bold;color: white;margin-bottom: 15px;font-size: 20px;">Partnership</h1>
            <ul class="gtco-footer-links">
              <li ><a style="color: white;" href="/travelagent/travelagent">Travel Agent</a></li>
              <li><a href="/onlinebooking/platform" style="color: white;">Booking Platform</a></li>
              <li><a href="/corporate/corporatediscount" style="color: white;">Corporate Event</a></li>
              <li><a href="/influencer/influencer" style="color: white;">Influencer</a></li>
              <li><a href="/affiliate/affiliateprogram" style="color: white;">Affiliate Program</a></li>
              <li><a href="/sellyourtours/sellyourtours" style="color: white;">Sell Your Tours</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-md-push-1"  style="margin-top:50px;">
          <div class="gtco-widget">
            <h1 style="font-weight:bold;color: white;margin-bottom: 15px;font-size: 20px;">Language</h1>
            <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle  dropdown-menu-wide" type="button" data-toggle="dropdown" aria-expanded="false" style="background-color: white;color: black;">
    Select Language
  </button>
  <div class="dropdown-menu">
    @foreach($bahasa as $item)
    <a class="dropdown-item" href="/change-language/{{$item->bahasa}}">{{$item->bahasa}}</a>
    @endforeach
  </div>
</div>
            <h1 style="font-weight:bold;color: white;margin-top: 10px;margin-bottom: 15px;font-size: 20px;">Currency</h1>
            <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle dropdown-menu-wide" type="button" data-toggle="dropdown" aria-expanded="false" style="background-color: white;color: black;">
              Select Currency
            </button>
            <div class="dropdown-menu ">
              <a class="dropdown-item" href="/change-session/USD">USD</a>
              <a class="dropdown-item" href="/change-session/IDR">IDR</a>
              <a class="dropdown-item" href="/change-session/MYR">MYR</a>
              <a class="dropdown-item" href="/change-session/SGD">SGD</a>
              <a class="dropdown-item" href="/change-session/EUR">EUR</a>
            </div>
          </div>
          <h1 style="color: white;margin-top:20px;font-size:15px;">Download our app:</h1>
          <a href="/"><img src="{{asset('aset')}}/download.png"></a>
          </div>
        </div>
        <div class="col-md-12">
          <p class="text-center">
            <small class="block" style="color: white;">&copy; {{ now()->year }} Jogja Borobudur Tour. All Rights Reserved.</small> 
          </p>
        </div>
      </div>
    </div>
  </footer>
  
  	@yield('scripts')
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  <div id="dialog" title="invalid value">
  <p>Please fill out all the required fields</p>
  </div>

  <div id="dialogs" title="invalid value">
  <p>Please fill out all the required fields</p>
  </div>   
  <script src="{{asset('traveler')}}/js/lightbox-plus-jquery.min.js"></script>
  <script src="{{asset('traveler')}}/js/jquery.min.js"></script>
  <script src="{{asset('traveler')}}/js/bootstrap.min.js"></script>
  <script src="{{asset('traveler')}}/js/jquery.waypoints.min.js"></script>
  <script src="{{asset('traveler')}}/js/owl.carousel.min.js"></script>
  <script src="{{asset('traveler')}}/js/jquery.countTo.js"></script>
  <script src="{{asset('traveler')}}/js/jquery.stellar.min.js"></script>
  <script src="{{asset('traveler')}}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{asset('traveler')}}/js/magnific-popup-options.js"></script>
  <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
  <script src="{{asset('traveler')}}/js/bootstrap-datepicker.min.js"></script>  
  <!-- Main -->
  <script> 
  var dateForm = function() {
		$('#date-start').datepicker({
			format: 'dd/mm/yyyy',
			startDate: new Date(),
			todayHighlight: true,
            autoclose: true,
            orientation: 'bottom',		
		});
	};
  $(function(){
    dateForm();
  });
</script>  
<script src="{{asset('traveler')}}/js/main.js"></script>
<script>
$(document).ready(function(){
  @foreach($value as $values)
  var comment{{$values->id}} = $('#comment{{$values->id}}').text();
    var shortText = comment{{$values->id}}.substr(0, 250);
    var fullText = comment{{$values->id}};
    var isTruncated = comment{{$values->id}}.length > 250;
    // alert(shortText)
    if (isTruncated) {
        $('#comment{{$values->id}}').html('<span class="short-text">' + shortText + '...</span><span class="full-text">' + fullText + '</span>');
        $('#comment{{$values->id}}').addClass('show-short-text');
    } else {
        $('#toggleComment{{$values->id}}').hide();
    }

    $('#toggleComment{{$values->id}}').click(function() {
        if ($('#comment{{$values->id}}').hasClass('show-short-text')) {
            $('#comment{{$values->id}}').removeClass('show-short-text').addClass('show-full-text');
            $(this).text('See Less');
        } else {
            $('#comment{{$values->id}}').removeClass('show-full-text').addClass('show-short-text');
            $(this).text('See More');
        }
    });
    @endforeach
})  
</script>
<!-- script total harga/ -->
<script type="text/javascript">
$("#dialog").css("display","none");
$("#dialogs").css("display","none");
  @foreach($pilihan as $p) $("#totals{{$p->id}}").css("display","none"); @endforeach
  $(document).ready(function(){
     const harganew = {!! $harganew !!}
     const hargachildnew = {!! $hargachildnew !!}
     const harga = {!!$rangeharga!!}
     const jam ={!! $jam !!}
     const hargachild = {!!$hargachild!!}
     const options = {!! $options !!}

     var spinnerIds = [
        @foreach($pilihan as $p)
            '#spiners{{$p->id}}',
        @endforeach
    ];
    var spinnerSelector = spinnerIds.join(',');
    $(spinnerSelector).hide();

    var bookbtn = [
      @foreach($pilihan as $p)
        '#bookbtn{{$p->id}}',
      @endforeach
    ]
    var bookbtnSelector = bookbtn.join(',')

    var bookbtndisabled = [
      @foreach($pilihan as $p)
      '.btnbook{{$p->id}}',
      @endforeach
    ]
    var bookbtndsbSelector = bookbtndisabled.join(',')

    $(window).on('beforeunload', function() {
        $(spinnerSelector).hide();
        $(bookbtnSelector).show()
    });

    $(window).on('pageshow', function() {
      $(spinnerSelector).hide();
      $(bookbtnSelector).show();
      $(bookbtndsbSelector).attr('disabled', false)
    });

    $("#cekharga").click(function(){
      let date=$("#date-start").val()
      let group=$("#group").val()
      let person=$("#adult").val()
      let personchild=$("#child").val()      
      let dates= $("#tanggal{{$p->id}}").val()
      @foreach($travel as $item)
      @if($item->kategories == 'Per Person')
      if($("#adult").val() === "0" ){
        // $( "#dialogs" ).dialog();
        $('.participants-control').next().toggle();
    }
    @else
    if($("#group").val() === "0" ){
        // $( "#dialogs" ).dialog();
        $('.participants-control').next().toggle();
    }
    @endif
    @endforeach
    else if($("#date-start").val().length === 0 ){
        // $( "#dialog" ).dialog();
        $("#date-start").focus();
    }
    else{
      @foreach($pilihan as $p) $("#totals{{$p->id}}").slideDown("fast"); 
     let subid{{$p->id}}=$("#subid{{$p->id}}").val()
     let hargaanak{{$p->id}}=0
     let hargadewasa{{$p->id}}=0
     let hargagroup{{$p->id}}=0
     @endforeach
      
      @foreach($pilihan as $p)
      if (date) {
        $("#tanggal{{$p->id}}").text("Travel Date: " + date)
        $("#tanggaltravel{{$p->id}}").val(date)
      }
      @endforeach

      @foreach($pilihan as $p)
      if (person > 0){
        harganew.forEach(function(item){
          if (item.kategories == 'Per Person' && person >= item.min && person <= item.maks && item.subwisata_id == subid{{$p->id}}){
            hargadewasa{{$p->id}} = item.harga * person 
            // const hargs = item.harga.toFixed(2)
            $("#jumlahdewasa{{$p->id}}").text("Adult: " + person + " x" + ' ' + convertrate(item.harga)) 
            $("#hargadewasa{{$p->id}}").text("Price: " + convertrate(item.harga))
            $("#dewasa{{$p->id}}").val(person)
          }

          else if (item.kategories == 'Per Group' && person >= item.min && person <= item.maks && item.subwisata_id == subid{{$p->id}}){
            hargadewasa{{$p->id}} = item.harga 
            // const hargs = item.harga.toFixed(2)
            $("#jumlahdewasa{{$p->id}}").text("Participants: " + person+ ' ' + convertrate(item.harga))
            $("#hargadewasa{{$p->id}}").text("Price: " + convertrate(item.harga))
            $("#dewasa{{$p->id}}").val(person)
          }

        })
      }else{
            $("#dewasa{{$p->id}}").val("")
            $("#jumlahdewasa{{$p->id}}").text("")
            $("#hargadewasa{{$p->id}}").text("")
          }
          @endforeach

          @foreach($pilihan as $p)
      if (group > 0){
        harganew.forEach(function(item){
          if (item.kategories == 'Per Group' && group >= item.min && group <= item.maks && item.subwisata_id == subid{{$p->id}}){
            hargagroup{{$p->id}} = item.harga 
            // const hargs = item.harga.toFixed(2)
            $("#jumlahgroup{{$p->id}}").text("Participants: " + group + ' Person')
            $("#totalgroup{{$p->id}}").text("Total: " + convertrate(item.harga))
            $("#groupe{{$p->id}}").val(group)
            $("#tothargagroup{{$p->id}}").val(convertrate(hargagroup{{$p->id}}))
            $("#amount{{$p->id}}").val(amount(hargagroup{{$p->id}}))
            $("#tothargagroupnoconvert{{$p->id}}").val((hargagroup{{$p->id}}))
          }

        })
      }else{
            $("#group{{$p->id}}").val("")
            $("#amount{{$p->id}}").val("")
            $("#jumlahgroup{{$p->id}}").text("")
            $("#hargagroup{{$p->id}}").text("")
          }
          @endforeach

          @foreach($pilihan as $p)
      if (personchild > 0) {
        hargachildnew.forEach(function(item){
          if (personchild >= item.min && personchild <= item.maks && item.subwisata_id == subid{{$p->id}}) {
            hargaanak{{$p->id}} = item.harga * personchild 
            $("#anak{{$p->id}}").val(personchild)
            $("#jumlahchild{{$p->id}}").text("Child: "+personchild + " x" + ' ' +convertrate(item.harga))
            $("#hargachild{{$p->id}}").text("Price (Child): "+convertrate(item.harga))
          }
        })
      }else{
        $("#anak{{$p->id}}").val("")
        $("#jumlahchild{{$p->id}}").text("")
        $("#hargachild{{$p->id}}").text("")
      }
      @endforeach

      @foreach($pilihan as $p)
      if (hargadewasa{{$p->id}} + hargaanak{{$p->id}} > 0) {
        $("#harga{{$p->id}}").text("Total: " + convertrate(hargadewasa{{$p->id}} + hargaanak{{$p->id}} ))
        $("#harganoconvert{{$p->id}}").text((hargadewasa{{$p->id}} + hargaanak{{$p->id}} ))
        $("#totharga{{$p->id}}").val(convertrate(hargadewasa{{$p->id}}  + hargaanak{{$p->id}} ))
        $("#amount{{$p->id}}").val(amount(hargadewasa{{$p->id}}  + hargaanak{{$p->id}} ))
        $("#totharganoconvert{{$p->id}}").val((hargadewasa{{$p->id}}  + hargaanak{{$p->id}} ))
      }
      else{
        $("#harga{{$p->id}}").text(" ")
        $("#totharga{{$p->id}}").val("")
        $("#amount{{$p->id}}").val("")
      }
      @endforeach 
    }
    })

$("input[data-code]").change(function(){
      let date=$("#date-start").val()
      let group=$("#group").val()
      let person=$("#adult").val()
      let personchild=$("#child").val()      
      let dates= $("#tanggal{{$p->id}}").val()
      @foreach($travel as $item)
      @if($item->kategories == 'Per Person')
      if($("#adult").val() === "0" ){
        // $( "#dialogs" ).dialog();
        $('.participants-control').next().toggle();
    }
    @else
    if($("#group").val() === "0" ){
        // $( "#dialogs" ).dialog();
        $('.participants-control').next().toggle();
    }
    @endif
    @endforeach
    else if($("#date-start").val().length === 0 ){
        // $( "#dialog" ).dialog();
        $("#date-start").focus();
    }
    else{
      @foreach($pilihan as $p) $("#totals{{$p->id}}").slideDown("fast"); 
     let subid{{$p->id}}=$("#subid{{$p->id}}").val()
     let hargaanak{{$p->id}}=0
     let hargadewasa{{$p->id}}=0
     let hargagroup{{$p->id}}=0
     @endforeach
      
      @foreach($pilihan as $p)
      if (date) {
        $("#tanggal{{$p->id}}").text("Travel Date: " + date)
        $("#tanggaltravel{{$p->id}}").val(date)
      }
      @endforeach

      @foreach($pilihan as $p)
      if (person > 0){
        harganew.forEach(function(item){
          if (item.kategories == 'Per Person' && person >= item.min && person <= item.maks && item.subwisata_id == subid{{$p->id}}){
            hargadewasa{{$p->id}} = item.harga * person 
            // const hargs = item.harga.toFixed(2)
            $("#jumlahdewasa{{$p->id}}").text("Adult: " + person + " x" + ' ' + convertrate(item.harga)) 
            $("#hargadewasa{{$p->id}}").text("Price: " + convertrate(item.harga))
            $("#dewasa{{$p->id}}").val(person)
          }

          else if (item.kategories == 'Per Group' && person >= item.min && person <= item.maks && item.subwisata_id == subid{{$p->id}}){
            hargadewasa{{$p->id}} = item.harga 
            // const hargs = item.harga.toFixed(2)
            $("#jumlahdewasa{{$p->id}}").text("Participants: " + person+ ' ' + convertrate(item.harga))
            $("#hargadewasa{{$p->id}}").text("Price: " + convertrate(item.harga))
            $("#dewasa{{$p->id}}").val(person)
          }

        })
      }else{
            $("#dewasa{{$p->id}}").val("")
            $("#jumlahdewasa{{$p->id}}").text("")
            $("#hargadewasa{{$p->id}}").text("")
          }
          @endforeach

          @foreach($pilihan as $p)
      if (group > 0){
        harganew.forEach(function(item){
          if (item.kategories == 'Per Group' && group >= item.min && group <= item.maks && item.subwisata_id == subid{{$p->id}}){
            hargagroup{{$p->id}} = item.harga 
            // const hargs = item.harga.toFixed(2)
            $("#jumlahgroup{{$p->id}}").text("Participants: " + group + ' Person')
            $("#totalgroup{{$p->id}}").text("Total: " + convertrate(item.harga))
            $("#groupe{{$p->id}}").val(group)
            $("#tothargagroup{{$p->id}}").val(convertrate(hargagroup{{$p->id}}))
            $("#amount{{$p->id}}").val(amount(hargagroup{{$p->id}}))
            $("#tothargagroupnoconvert{{$p->id}}").val((hargagroup{{$p->id}}))
          }

        })
      }else{
            $("#group{{$p->id}}").val("")
            $("#amount{{$p->id}}").val("")
            $("#jumlahgroup{{$p->id}}").text("")
            $("#hargagroup{{$p->id}}").text("")
          }
          @endforeach

          @foreach($pilihan as $p)
      if (personchild > 0) {
        hargachildnew.forEach(function(item){
          if (personchild >= item.min && personchild <= item.maks && item.subwisata_id == subid{{$p->id}}) {
            hargaanak{{$p->id}} = item.harga * personchild 
            $("#anak{{$p->id}}").val(personchild)
            $("#jumlahchild{{$p->id}}").text("Child: "+personchild + " x" + ' ' +convertrate(item.harga))
            $("#hargachild{{$p->id}}").text("Price (Child): "+convertrate(item.harga))
          }
        })
      }else{
        $("#anak{{$p->id}}").val("")
        $("#jumlahchild{{$p->id}}").text("")
        $("#hargachild{{$p->id}}").text("")
      }
      @endforeach

      @foreach($pilihan as $p)
      if (hargadewasa{{$p->id}} + hargaanak{{$p->id}} > 0) {
        $("#harga{{$p->id}}").text("Total: " + convertrate(hargadewasa{{$p->id}} + hargaanak{{$p->id}} ))
        $("#harganoconvert{{$p->id}}").text((hargadewasa{{$p->id}} + hargaanak{{$p->id}} ))
        $("#totharga{{$p->id}}").val(convertrate(hargadewasa{{$p->id}}  + hargaanak{{$p->id}} ))
        $("#amount{{$p->id}}").val(amount(hargadewasa{{$p->id}}  + hargaanak{{$p->id}} ))
        $("#totharganoconvert{{$p->id}}").val((hargadewasa{{$p->id}}  + hargaanak{{$p->id}} ))
      }
      else{
        $("#harga{{$p->id}}").text(" ")
        $("#totharga{{$p->id}}").val("")
        $("#amount{{$p->id}}").val("")
      }
      @endforeach 
    }
    })

    function amount(harga){
      let rateidr = {{$rateIDR}}
      let ratemyr = {{$rateMYR}}
      let ratesgd = {{$rateSGD}}
      let rateeur = {{$rateEUR}}
      let hargaconvert = 0
      @if($session == 'USD') 
      let hargaakhir = (harga / rateidr).toFixed(2)
      hargaconvert = hargaakhir
      @endif
      
      @if($session == 'IDR') 
      let hargaakhir = (harga / rateidr).toFixed(2)
      hargaconvert = hargaakhir
      @endif

      @if($session == 'MYR') 
      let hargaakhir = (harga / rateidr).toFixed(2)
      hargaconvert = hargaakhir
      @endif

      @if($session == 'SGD') 
      let hargaakhir = ((harga / rateidr)*ratesgd).toFixed(2)
      hargaconvert = hargaakhir
      @endif

      @if($session == 'EUR') 
      let hargaakhir = ((harga / rateidr)*rateeur).toFixed(2)
      hargaconvert = hargaakhir
      @endif

      return hargaconvert
    }

    function convertrate(harga){
      let rateidr = {{$rateIDR}}
      let ratemyr = {{$rateMYR}}
      let ratesgd = {{$rateSGD}}
      let rateeur = {{$rateEUR}}
      let hargaconvert = 0
      @if($session == 'USD') 
      let hargaakhir = (harga / rateidr).toFixed(2)
      hargaconvert = 'US$ '+ hargaakhir
      @endif 

      @if($session == 'IDR') 
      let hargaakhir = (harga).toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.")
      hargaconvert =  'Rp. '+ hargaakhir
      @endif 

      @if($session == 'MYR') 
      let hargaakhir = ((harga / rateidr)*ratemyr).toFixed(2)
      hargaconvert = 'MYR '+ hargaakhir
      @endif

      @if($session == 'SGD') 
      let hargaakhir = ((harga / rateidr)*ratesgd).toFixed(2)
      hargaconvert = 'SGD  '+ hargaakhir
      @endif

      @if($session == 'EUR') 
      let hargaakhir = ((harga / rateidr)*rateeur).toFixed(2)
      hargaconvert = '€  '+ hargaakhir
      @endif

      return hargaconvert
    }    
  })

</script>
<script src="{{asset('traveler')}}/js/number.js"></script>
<script src="{{asset('traveler')}}/js/picker.js"></script>

<script>
jQuery(function ($) {
    function makeLabel($control) {
        var $inputs = $control.next();
        var $container = $control.find('.participant-label-span');
        $container.empty();
        $inputs.find('input[data-code]')
        .each(function () {
            var label = $(this).data('code');
            var value = $(this).val();
            if (value > 0) {
                $('<span>' + label + ' ×' + value + ' ' + '<span>').appendTo($container);
            }  
        });
    }

    $('.participants-control').each(function () {
        var self = $(this);
        makeLabel(self);

        self.siblings('.participants-input-container')
        .find('input[data-code]')
        .numberInput()
        .change(function () {
            makeLabel(self);
        });

        return self;
    });


    $(document).mouseup(function (ev) {
        var $control = $('.participants-control');
        var $container = $('.participants-input-container');
        if ($control.is(ev.target) || $control.has(ev.target).length) {
            $control.next().toggle();
        }
        else if (! $container.is(ev.target) && $container.has(ev.target).length === 0) {
            $container.hide();
        }
    });
});
</script>

<script>
@foreach($pilihan as $p)
 $(document).ready(function () {
        var initialSelectedId = $('#waktu_{{$p->id}}').find(':selected').data('id');
        $('#id_waktu_{{$p->id}}').val(initialSelectedId);
        $('#waktu_{{$p->id}}').change(function(){
            var selectedId = $(this).find(':selected').data('id');
            $('#id_waktu_{{$p->id}}').val(selectedId);
        });


    function validateForm() {
    var dateStart = $('input[name="traveldate"]').val().trim();
    var timeSelected = $('select[name="waktu"]').val().trim();

    var dateParts = dateStart.split('/');
    var month = parseInt(dateParts[1], 10) - 1;
    var day = parseInt(dateParts[0], 10);
    var year = parseInt(dateParts[2], 10);

    var timeParts = timeSelected.split(':');
    var hours = parseInt(timeParts[0], 10);
    var minutes = parseInt(timeParts[1].split(' ')[0], 10);
    var period = timeParts[1].split(' ')[1];

    if (period === 'PM' && hours !== 12) {
        hours += 12;
    } else if (period === 'AM' && hours === 12) {
        hours = 0;
    }

    var datetimeSelected = new Date(year, month, day, hours, minutes);
    var currentDate = new Date();

    var timeDifference = datetimeSelected - currentDate;
    var hoursDifference = timeDifference / (1000 * 60 * 60);

    if (hoursDifference < 10) {
        Swal.fire({
            title: "",
            html: "<div style='text-align: center;'>Tour not available,<br/>please try another time slot or date.</div>",
            icon: "error"
        });
        return false;
    }

    return true;
}

function validateAvailable(id) {
        return new Promise(function(resolve, reject) {
        var dateStart = $('input[name="traveldate"]').val().trim();
        var isAvailable = true;

        function checkDateAvailability(id) {
            return $.ajax({
                type: "GET",
                url: "/checkdateavailability/" + id,
                async: true
            });
        }

        function checkTimeAvailability(id) {
            return $.ajax({
                type: "GET",
                url: "/checktimeavailability/" + id,
                async: true
            });
        }

        $.when(checkDateAvailability(id), checkTimeAvailability(id)).done(function(dateResponse, timeResponse) {
            var dates = dateResponse[0].date.map(index => index.date);
            var statuses = dateResponse[0].date.map(index => index.status);
            var dateavailabilityId = dateResponse[0].date.map(index => index.id);
            for (var i = 0; i < dates.length; i++) {
                if (dates[i] === dateStart && statuses[i] === 0) {
                    isAvailable = false;
                    break;
                }
            }

            if (isAvailable == true) {
                var times = $('#id_waktu_{{$p->id}}').val();
                var timeId = timeResponse[0].waktu_id.map(index => index.waktu_id);
                var available = timeResponse[0].waktu_id.map(index => index.available);
                var dateAvailabilityIds = timeResponse[0].waktu_id.map(index => index.date_available_id);
                var timeSlotAvailable = true;
                for (var i = 0; i < dates.length; i++) {
                if (dates[i] === dateStart) {
                    for (var j = 0; j < timeId.length; j++) {
                        if (dateAvailabilityIds[j] == dateavailabilityId[i] && timeId[j] == times) {
                            if (available[j] == 0) {
                                timeSlotAvailable = false;
                                break;
                            }
                        }
                    }
                }
                if (!timeSlotAvailable) {
                    break;
                }
            }
                isAvailable = timeSlotAvailable;
            }
            resolve(isAvailable);
        }).fail(function() {
            reject(false);
        });
    });
}

$('#{{$p->id}}').submit(function(event) {
    event.preventDefault();
    var formId = $(this).attr('id');

    if (validateForm()) {
        validateAvailable(formId).then(function(isAvailable) {
            if (isAvailable) {
              // $(".btnbook{{$p->id}}").attr('disabled','disabled')
              $(".btnbook{{$p->id}}").css('text-decoration','none')
              $("#bookbtn{{$p->id}}").hide()
              $('#spiners{{$p->id}}').show()
              $(".btnbook{{$p->id}}").attr('disabled', true)
                $('#' + formId)[0].submit();
            } else {
              Swal.fire({
              title: "",
              html: "<div style='text-align: center;'>Tour not available,<br/>please try another time slot or date.</div>",
              icon: "error"
             });
            }
        }).catch(function() {
            alert('Error checking availability.');
        });
    }
});

    });
    @endforeach
  </script>


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YTCCX40XDL"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YTCCX40XDL');
</script>
</body>