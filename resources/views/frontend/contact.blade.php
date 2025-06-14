<!DOCTYPE HTML>
<html>
	<head lang="en-US" default-lang="en-US">
  <meta charset="utf-8" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.css" integrity="sha512-FA9cIbtlP61W0PRtX36P6CGRy0vZs0C2Uw26Q1cMmj3xwhftftymr0sj8/YeezDnRwL9wtWw8ZwtCiTDXlXGjQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.css" integrity="sha512-/Jsoj+nRoCkEHw4HnymLk48dWblqtN+0rW+UMAanfbHZjzgphJipQOEuuOEdZ0IzSEYgK0NXCNda8r+4juGbPg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('traveler')}}/css/bootstrap.css">
  <link href="{{asset('traveler')}}/css/blogs2.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="{{asset('traveler')}}/css/blogs.css" />
  <link rel="preload" href="{{asset('traveler')}}/css/new.css" as="style">
  <link rel="stylesheet" href="{{asset('traveler')}}/css/style.css">
  <link rel="stylesheet" href="{{asset('traveler')}}/css/new2.css">
  <link rel="stylesheet" href="{{asset('traveler')}}/css/new7.css">    
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('spica')}}/images/logo.png">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('spica')}}/images/logo.png">
  <link rel="shortcut icon" href="{{asset('spica')}}/images/logo.png">
  <meta name="viewport"content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="{{asset('traveler')}}/css/grids.css">
  <link rel="stylesheet" href="{{asset('traveler')}}/css/activity.css">
   <!-- primary tag SEO -->
  <meta name="title" content="jogja Borobudur | Tour & Travel" />
  <meta name="description" content="JogjaBorobudur Tour and Travel. Explore borobudur, prambanan, and many more."/>
  <link rel="canonical" href="https://jogjaborobudur.com/contact/contacts-us">
  <link rel="canonical" href="https://www.jogjaborobudur.com/contact/contacts-us">
  <meta name="author" content="Jogja borobudur tour & travel">
  <!-- facebook tag -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="www.jogjaborobudur.com/contact/contacts-us" />
  <meta property="og:title" content="jogja borobudur tour & travel" />
  <meta property="og:description"
    content="Jogja Borobudur tour & travel Explore borobudur, prambanan, and many more free cancellation." />
  <meta property="og:image" content="{{ asset('traveler/images/gambarseo2.jpg') }}"/>
  <!-- end tag -->
  <title>Jogja Borobudur Tour & Travel</title>

  <style type="text/css">
    .gtco-footer-links li{
  font-size: 18px;
  }
  </style>
  {!! NoCaptcha::renderJs() !!}
	</head>
	<body>
		
	
	<!-- 
	<div id="page"> -->

	
	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			<div class="row">
      <div class="col-sm-4 col-xs-12">
					<a href="/">
					<div id="gtco-logo"><img src="{{asset('spica')}}/images/logomini.png" alt="logo" height="50" width="60" style="margin-left:5px;"/></div>
					</a>
				</div>
			
			</div>
			
		</div>
	</nav>
	
	@foreach($background as $item)
    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url({{ url('public/img/'.$item->image) }});height: 657px;" alt="{{$item->altimage}}">
    <div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					<div class="row row-mt-15em">

						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<h3 style="color: white;font-size:70px;">{{$item->header}}</h3>
              <h2>{{$item->subheader}}</h2>	
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
</header>
	@endforeach
	
<div class="gtco-section border-bottom" style="color: black;margin-top:-200px; ">
		<div class="gtco-container">
			<div class="row">
				@include('sweetalert::alert')
				<div class="col-md-12">
					<div class="col-md-6">
					<h2 class="activity-card__title" data-v-a1084d9e style="font-size: 24px;">Get In Touch</h2>
					<br>
					<form method="POST" action="{{url('insertmessage')}}" enctype="multipart/form-data">
						@csrf
						<div class="row form-group">
							<div class="col-md-12">
								<label class="sr-only" for="name">Name</label>
								<input type="hidden" name="type" value="contact">
								<input type="text" id="name" name="name" class="form-control" placeholder="Your firstname" required="">
							</div>
							
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label class="sr-only" for="email">Email</label>
								<input type="text" id="email" name="email" class="form-control" placeholder="Your email address" required="">
							</div>
						</div>


						<div class="row form-group">
							<div class="col-md-12">
								<label class="sr-only" for="message">Message</label>
								<textarea name="message" name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Write us something" required=""></textarea>
							</div>
						</div>
            {!! NoCaptcha::display() !!}
            @if ($errors->has('g-recaptcha-response'))
        <strong><p style="margin-top:10px;color:red;">{{ $errors->first('g-recaptcha-response') }}</p></strong>
          @endif
						<div class="form-group" style="margin-top:10px;">
							<button type="submit" class="cekharga js-check-availability gtm-trigger__adp-check-availability-btn avoid-close-dropdown-on-click c-button c-button--medium filbtn" data-v-dd428772><!---->
							    Submit
							  </button>
						</div>
					</form>		
				</div>
				<div class="col-md-5 col-md-push-1">
					
					<div class="gtco-contact-info">
						<h2 class="activity-card__title" data-v-a1084d9e style="font-size: 24px;">Contact Information</h2>
						<br>
						<ul>
							<li class="address"><h2 class="activity-card__title" data-v-a1084d9e>Yogyakarta, Indonesia</h2></li>
							<li class="phone"><h2 class="activity-card__title" data-v-a1084d9e>+62 856 2862 504</h2></li>
							<li class="email"><h2 class="activity-card__title" data-v-a1084d9e>care@jogjaborobudur.com</h2></li>
						</ul>
					</div>


				</div>
				</div>
			</div>
		</div>
	</div>	
		
	

	
	<!-- </div> -->

	
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
            <small class="block" style="color: white;">&copy; 2010 - {{ now()->year }} Jogja Borobudur Tour. All Rights Reserved.</small> 
          </p>
        </div>
      </div>
    </div>
  </footer>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="{{asset('traveler')}}/js/jquery.min.js"></script>
  <script src="{{asset('traveler')}}/js/bootstrap.min.js"></script>
	<script src="{{asset('traveler')}}/js/jquery.min.js"></script>
	<script src="{{asset('traveler')}}/js/jquery.waypoints.min.js"></script>
	<script src="{{asset('traveler')}}/js/owl.carousel.min.js"></script>
	<script src="{{asset('traveler')}}/js/jquery.magnific-popup.min.js"></script>
	<script src="{{asset('traveler')}}/js/magnific-popup-options.js"></script>
	<script src="{{asset('traveler')}}/js/main.js"></script>
	</body>
</html>

