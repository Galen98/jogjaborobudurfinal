<!DOCTYPE HTML>
<!--
	Traveler by freehtml5.co
	Twitter: http://twitter.com/fh5co
	URL: http://freehtml5.co
-->
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>JogjaBorobudur Tours</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="wisata jogja borobudur prambanan gunung kidul" />
	<meta name="author" content="" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.css" integrity="sha512-FA9cIbtlP61W0PRtX36P6CGRy0vZs0C2Uw26Q1cMmj3xwhftftymr0sj8/YeezDnRwL9wtWw8ZwtCiTDXlXGjQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.css" integrity="sha512-/Jsoj+nRoCkEHw4HnymLk48dWblqtN+0rW+UMAanfbHZjzgphJipQOEuuOEdZ0IzSEYgK0NXCNda8r+4juGbPg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('traveler')}}/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('traveler')}}/css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="{{asset('traveler')}}/css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('traveler')}}/css/bootstrap.css">
	<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('traveler')}}/css/magnific-popup.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('traveler')}}/css/bootstrap-datepicker.min.css">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{asset('traveler')}}/css/owl.carousel.min.css">
	<link rel="stylesheet" href="{{asset('traveler')}}/css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('traveler')}}/css/style.css">
	<link rel="stylesheet" href="{{asset('traveler')}}/css/lightbox.min.css">

	<!-- Modernizr JS -->
	<script src="{{asset('traveler')}}/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	
	
	<div id="page">

	
	<!-- <div class="page-inner"> -->
		<nav class="gtco-nav border-bottom" role="navigation" style="background-color: #182c4c">
		@include('sweetalert::alert')
		<div class="gtco-container "  style="margin-bottom: solid;margin-color:black;">
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					
					<div id="gtco-logo"><img src="{{asset('spica')}}/images/logomini.png" alt="logo"/></div>
					
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
                    <li class="has-dropdown">
							<a href="#" style="color: white; font-weight: bold;" >Currency <i class="fa-regular fa-dollar-sign"></i></a>
							<ul class="dropdown">
								<li><a href="/change-session/USD">USD</a></li>
								<li><a href="/change-session/IDR">IDR</a></li>
								<li><a href="/change-session/MYR">MYR</a></li>
								<li><a href="/change-session/SGD">SGD</a></li>
								<li><a href="/change-session/EUR">EUR</a></li>
							</ul>
						</li>
                        <li><a href="pricing.html" style="color: white; font-weight: bold;">Cart <i class="fa fa-shopping-cart"></i></a></li>
                        <li><a href="/destination" style="color: white; font-weight: bold;">Destination</a></li>
						<li><a href="contact.html" style="color: white; font-weight: bold;">Contact</a></li>
					</ul>	
				</div>
			</div>
		</div>
	</nav>
	
	<!-- @foreach($travel as $item)
    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url({{asset('traveler')}}/images/jogja.webp);margin-bottom:-34px; ">
    <div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					<div class="row row-mt-15em">
						<div class="col-md-7 mt-text " data-animate-effect="fadeInUp">
							<h1>{{$item->city}}</h1>	
						</div>
					</div>
				</div>
			</div>
		</div>
</header>
@endforeach -->

<div class="gtco-section" style="margin-top: 30px;">
		<div class="gtco-container">
			<p style="font-weight: bold;font-size: 13px;">Home > Destination > {{$item->namawisata}}</p>
			<h1 style="font-weight: bold;font-size: 36px;" >{{$item->namawisata}}</h1>
			<div class="container">
  <div class="row">
    <div class="col-4 col-md-4">
    	<div class="align-items-center" style="margin-bottom: 10px;">
							<div class="small-ratings">
								<!-- <p class="review-stat" style="color: black;font-weight: bolder;">{{$jumlahreview ?? ''}} Reviews</p> -->
								<i class="fa fa-star rating-color"></i>
								<i class="fa fa-star rating-color"></i>
								<i class="fa fa-star rating-color"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
						</div>
    </div>

    <div class="col-4 col-md-4">
    	<p style="color: black;font-weight: bolder;"> <img src="{{asset('traveler')}}/images/duration.png" width="20" height="20"> Duration: {{$item->durasi}}</p>
    </div>
  </div>
</div>


			
		@foreach($travel as $item)
		<div class="row">
			<div class="col-lg-6 mb-1" style="margin-right:-25px;">
				<a href="{{ url('public/img/'.$item->image) }}" data-lightbox="mygallery" data-title="">
					<img src="{{ url('public/img/'.$item->image) }}" style="height=1185px; width=616px;" class="img-fluid" >
				</a>
			</div>
			<div class="col-lg-6 px-0">
				<div class="col-lg-5 mb-1" style="margin-right:-25px; ">
					<a href="{{ url('public/img/'.$item->image2) }}" data-lightbox="mygallery" data-title="">
					<img src="{{ url('public/img/'.$item->image2) }}" class="img-fluid">
				</a>
				</div>

				<div class="col-lg-5 mb-1" style="margin-right:-25px; ">
					<a href="{{ url('public/img/'.$item->image3) }}" data-lightbox="mygallery" data-title="">
					<img src="{{ url('public/img/'.$item->image3) }}" class="img-fluid">
				</a>
				</div>
				<div class="col-lg-5 mb-1" style="margin-right:-25px; ">
					<a href="{{ url('public/img/'.$item->image4) }}" data-lightbox="mygallery" data-title="">
					<img src="{{ url('public/img/'.$item->image4) }}" class="img-fluid">
				</a>
				</div>
				<div class="col-lg-5 mb-1" style="margin-right:-25px; ">
					<a href="{{ url('public/img/'.$item->image5) }}" data-lightbox="mygallery" data-title="">
					<img src="{{ url('public/img/'.$item->image5) }}" class="img-fluid">
				</a>
				</div>
			</div>
			<div class="col-md-10" style="color: black;font-size: 16px;font-weight: bolder;">
			<p >{!! $item->shortdescription !!}</p>

		</div>
		</div>
		
	<br>
	<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
					<form action="#">
					<div class="row form-group">
							<div class="col-md-12">

								<h1 style="font-weight: bold;">About this activity</h1>
								<div class="row form-group">
							
							
						</div>
						<div class="row form-group">
							<div class="col-md-12" style="color: black;">
								<p style="color: black;font-size: 19px;font-weight: bold;"> Highlights :</p>
								<ul style="font-size: 16px;padding:0;margin:0;">
								@foreach($highlight as $item)
									<li style="margin-left: 20px;color: black;font-size: 16px;font-weight: bolder;"> {{$item->highlight}}</li>
									@endforeach
								</ul>
							</div>
						</div>
						<br>
								<p style="color: black;font-size: 17px;font-weight: bold;" > <img src="{{asset('traveler')}}/images/freecancel.png" width="27" height="27"> Free Cancellation
								<p style="color: black;font-weight: bolder;"> Cancel up to 24 hours in advance for a full refund </p> </p>
								<br>
								<p style="color: black;font-size: 17px;font-weight: bold;"> <img src="{{asset('traveler')}}/images/paylater.png" width="27" height="27"> Reserve now & pay later
								<p style="color: black; font-weight: bolder;"> Keep your travel plans flexible — book your spot and pay nothing today.</p> </p>
								<br>
								@if($item->pickup == 'yes')
								<p style="color: black;font-size: 17px;font-weight: bold;"> <img src="{{asset('traveler')}}/images/pickup.png" width="27" height="27"> Pickup included
								<p style="color: black;font-weight: bolder;"> {{$item->wherepickup}}</p> </p>
								@else
								<p></p>
								@endif
							</div>
						</div>
						@foreach($travel as $item)
						<div class="row form-group">
							<div class="col-md-12" style="color: black;font-weight: bolder;">
								<p style="color: black;font-size: 19px;font-weight: bold;margin-top: 15px;"> Full Description :</p>
								<p style="font-size: 16px;">{!! $item->deskripsi_english !!}</p>
							</div>
						</div>
						@endforeach

						
						@endforeach
						<div class="row form-group">
							<div class="col-md-12" style="color: black;border-top: solid;border-top-color: #e6e8eb;border-top-width: 1pt;font-weight: bolder;">
								<p style="color: black;font-size: 19px;font-weight: bold;margin-top: 15px;"> Include :</p>
								<ul style="font-size: 16px;list-style-type:none;padding:0;margin:0;">
								@foreach($includes as $item)
									<li><i style="color: green;" class="ti-check"></i> {{$item->include}}</li>
									@endforeach
								</ul>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12" style="color: black;border-top: solid;border-top-color: #e6e8eb;border-top-width: 1pt;font-weight: bolder;">
								<p style="color: black;font-size: 19px;font-weight: bold;margin-top: 15px;"> Exclude :</p>
								<ul style="font-size: 16px;list-style-type:none;padding:0;margin:0;">
								@foreach($excludes as $item)
									<li><i style="color: red;" class="ti-close"></i> {{$item->exclude}}</li>
									@endforeach
								</ul>
							</div>
						</div>
					</form>
					<br>
					<form action="#" method="GET" id="booking">
						<div class="row form-group" style="background-color: #182c4c; color: white;">
							<div class="col-md-12">
								<br>
								<h4 style="font-weight: bold;color: white;">Select participants and date</h4>

								<label  for="adult"><i class="ti-user"></i> Adult</label>
								<br>
								<input type="number" id="adult" class="form-control" placeholder="Select participant" style="background-color: white;" min="0" name="adultquantity">
								
							</div>
							@if($item->child == 'yes')
							<div class="col-md-12">
								<label  for="adult"><i class="ti-user"></i> Child</label>
								<br>
								<input type="number" id="adult" class="form-control" placeholder="Select participant" style="background-color: white;" min="0" name="childquantity">
							</div>
							@else
							<div class="col-md-12" style="margin-top: 10px;"> 
							</div>
							@endif
							<div class="col-md-12">
								<label for="date-start">Date Travel</label>
								<input type="text" name="traveldate" id="date-start" class="form-control" style="background-color: white;" placeholder="Select date">
							</div>
							<br>
							<div class="col-md-12">
							<!-- <input type="submit" class="btn btn-primary btn-block" style="margin-bottom: 20px;margin-top: 20px;" value="Booking Now"> -->
							<input type="submit" class="btn btn-block" style="margin-bottom: 20px;margin-top: 20px;color: white;background-color: #ff4c04;" value="Check Availability">
							</div>
							<br>							
						</div>
					</form>	
					<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Your Order
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      	@foreach($travel as $item)
        <h4 style="font-weight: bold;">{{$item->namawisata}}</h4>
        @endforeach
        <div class="row">
  		<div class="col-lg-4"><p style="color: black;font-size: 20px;">Total price :</p></div>
  		<div class="col-lg-4"><p style="color: #ff4e03;font-size: 20px;font-weight: bold;">$ 70</p> <p style="color: black;font-size: 12px;">All taxes and fees included</p></div>
		</div>
		<input type="submit" class="btn btn-block" style="margin-bottom: 20px;margin-top: 20px;color: white;background-color: #0f69fa;" value="Add to Cart">
      </div>
    </div>
  </div>
</div>	
				</div>
				<div class="col-md-5 col-md-push-1">
					
					<div class="gtco-contact-info">
						@foreach($travel as $item)
					<div class="row" style="text-align: left;background-color: white;border-top: solid;border-color: #182c4c;margin-top: 30px;border-bottom: solid;border-bottom-color:#e6e8eb;border-bottom-width: 2pt;border-top-width: 3pt;border-right: solid;border-right-color:#e6e8eb;border-right-width: 2pt;border-left: solid;border-left-color:#e6e8eb;border-left-width: 2pt;" >
							<div class="col-md-6" style="margin-top: 20px;">
								@if($item->label == 'Bestseller')
							<span class="label label-success" style="color:white;text-align:left;">Bestseller</span>
							<br>
							@elseif($item->label == 'Likely to sell out')
							<span class="label label-danger" style="color:white;">Likely to sell out</span>
							<br>
							@else
							<span></span>
							@endif
							@if($session == 'USD')
							<span style="color: black;font-weight: bold;">From : </span>
							<h2 style="font-weight: bold;font-size: 28px;">US$ {{number_format ($item->IDR/$rateIDR,1)}} </h2>
							<span style="color: black;font-weight: bold;font-size: 15px;">{{$item->kategories}}</span>
							@endif

							@if($session == 'MYR')
							<h2 class="name">From : MYR {{ number_format(($item->IDR / $rateIDR) * $rateMYR, 0, ',', '.') }}</h2>
							@endif

							@if($session == 'SGD')
							<h2 class="name">From : SGD {{ number_format(($item->IDR / $rateIDR) * $rateSGD, 0, ',', '.') }} </h2>
							@endif

							@if($session == 'EUR')
							<h2 class="name">From : € {{ number_format(($item->IDR / $rateIDR) * $rateEUR, 0, ',', '.') }} </h2>
							@endif

							@if($session == 'IDR')
							<h2 class="name">From : @currency($item->IDR) </h2>
							@endif
							
							
							
							
							</div>
							<div class="col-md-4" style="margin-top: 40px;"><a href="#booking">
							<button type="button" class="btn" style="background-color: #182c4c;color: white;">Book Now</button></div>

						</div>
						<div class="row">
							<div class="" style="margin-top: 20px;">						
									<p style="font-weight: bold;color: black;font-size: 18px;">Why book with us?</p>
									<p style="color: black;font-weight: bolder;font-size: 18px;"><i style="color: green;font-weight: bold;" class="ti-check"></i> We are local</p>
									<p style="color: black;font-weight: bolder;font-size: 18px;"><i style="color: green;font-weight: bold;" class="ti-check"></i> Provide real price with no portal commision</p>
									<p style="color: black;font-weight: bolder;font-size: 18px;"><i style="color: green;font-weight: bold;" class="ti-check"></i> Instant confirmation</p>	
									<p style="color: black;font-weight: bolder;font-size: 18px;"><i style="color: green;font-weight: bold;" class="ti-check"></i> Full refund cancellation up to 48 hours</p>
							</div>
						</div>
						@endforeach

					
					
</div>
</div>
</div>
</div>
						<br>
						<br>
				<!-- <div style="text-align: center;">
					<h2 style="font-weight: bold;font-size: 28px;">Rate Our Tour</h2>
				</div> -->
		</div>


@if(count($value) === 0)
<div></div>
@else
				<div class="container">
                                 <div class="row">
                                       <div class="col mt-4">
                                             <p class="font-weight-bold " style="color: black;font-size: 23px;">Review From Our Travelers</p> 
                                             </div>
                                         </div>
                                     </div>
@foreach($value as $values)
                                <div class="container">
                                    <div class="row">
                                       <div class="col mt-0">     
                                             <div class="form-group row">
                                               @foreach($travel as $item) <input type="hidden" name="wisata_id" value="{{ $item->wisata_id }}">@endforeach
                                                <div class="col">
                                                   <div class="rated">
                                                    @for($i=1; $i<=$values->star_rating; $i++)
                                                      {{-- <input type="radio" id="star{{$i}}" class="rate" name="rating" value=""/> --}}
                                                      <label class="star-rating-complete" title="text">{{$i}} stars</label>
                                                    @endfor
                                                    </div>
                                                </div>
                                             </div>
                                             <div class="form-group row mt-2">
                                                <div class="col">
                                                    <p style="color: black;">"{{ $values->comments }}"</p>
                                                </div>
                                             </div>
                                       </div>
                                    </div>

                                 </div>
                                @endforeach
                                @endif
                                <div class="container">
                                    <div class="row">
                                {{$value->links()}}

                            </div>
                        </div>
                        <br>
                                <div class="container">
                                    <div class="row">
                                       <div class="col mt-4">
                                          <form class="py-2 px-4" action="{{url('insertrating')}}" style="box-shadow: 0 0 20px 0 #ddd;" method="POST" autocomplete="off">
                                             @csrf
                                             <div class="form-group row">
                                             	<div class="col">
                                             		<div class="rate">
                                             <p class="font-weight-bold " style="color: black;font-size: 19px;">Insert Review</p>
                                         </div>
                                         </div>
                                     </div>
                                             <div class="form-group row">
                                                @foreach($travel as $item)<input type="hidden" name="wisata_id" value="{{ $item->wisata_id }}">@endforeach
                                                <div class="col">
                                                   <div class="rate">
                                                      <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                                                      <label for="star5" title="text">5 stars</label>
                                                      <input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
                                                      <label for="star4" title="text">4 stars</label>
                                                      <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                                                      <label for="star3" title="text">3 stars</label>
                                                      <input type="radio" id="star2" class="rate" name="rating" value="2">
                                                      <label for="star2" title="text">2 stars</label>
                                                      <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                                                      <label for="star1" title="text">1 star</label>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group row mt-4">
                                                <div class="col">
                                                   <textarea class="form-control" name="comment" rows="6 " placeholder="Comment" maxlength="200"></textarea>
                                                </div>
                                             </div>
                                             <div class="mt-3 text-right">
                                                <button type="submit" class="btn btn-sm py-2 px-3 btn-info">Submit
                                                </button>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>             
	</div>
</div>

<div class="gtco-section border-bottom">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12">
				<div class="col-md-6 ">
					<div class="container">
			<div class="row">
				<div>
					<h4 style="font-weight: bold;font-size: 23px;">You might also like..</h4>
					<p style="color: black;font-size: 17px;">Other travellers also book these tours</p>
				</div>
			</div>
		</div>
		</div>
</div>
	</div>
	<div class="containers swiper" style="padding-bottom: 40px;">
      <div class="slide-container">
        <div class="carde-wrapper swiper-wrapper">
		@foreach($other as $item)
          <div class="carde swiper-slide">
		  <a href="{{$item->wisata_id}}" target="_blank">
            <div class="image-box">
              <img src="{{ url('public/img/'.$item->image) }}" alt="" />
            </div>
            <div class="profile-details">
              <img src="{{asset('spica')}}/images/logomini.png" alt="" />
              <div class="name-job">
				<div class="align-items-center">
					<h4 style="font-weight: bold;">{{$item->namawisata}}</h4>
							<div class="small-ratings">
								<i class="fa fa-star rating-color"></i>
								<i class="fa fa-star rating-color"></i>
								<i class="fa fa-star rating-color"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
						</div>
				@if($session == 'USD')
				<h3 class="name">From : US$ {{number_format ($item->IDR/$rateIDR,1)}} </h3>
				@endif

				@if($session == 'MYR')
				<h3 class="name">From : MYR {{ number_format(($item->IDR / $rateIDR) * $rateMYR, 0, ',', '.') }}</h3>
				@endif

				@if($session == 'EUR')
				<h3 class="name">From : € {{ number_format(($item->IDR / $rateIDR) * $rateEUR, 0, ',', '.') }}</h3>
				@endif

				@if($session == 'SGD')
				<h3 class="name">From : SGD {{ number_format(($item->IDR / $rateIDR) * $rateSGD, 0, ',', '.') }} </h3>
				@endif

				@if($session == 'IDR')
				<h3 class="name">From : @currency($item->IDR) </h3>
				@endif
				<!-- <span class="label" style="background-color:#ff4c04;color:white;">{{$item->label}}</span> -->
              </div>
			</div>
				</a>
		  </div>
		  
		  @endforeach
		</div>
		
      </div>
      <div class="swiper-button-next swiper-navBtn"></div>
      <div class="swiper-button-prev swiper-navBtn"></div>
      <div class="swiper-pagination"></div>
    </div>


			</div>
			<div id="gtco-subscribe" style="background-image: url({{asset('traveler')}}/images/summer.jpeg)">
		<div class="gtco-container">
			<div class="row ">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2 style="font-weight: bold;">Subscribe</h2>
					<p style="font-weight: bold;">Be the first to know about the new destination.</p>

				</div>
			</div>
			<div class="row ">
				<div class="col-md-8 col-md-offset-2">
					<form class="form-inline"method="POST" action="{{url('insertmessage')}}" enctype="multipart/form-data">
						@csrf
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" name="email" class="form-control" id="email" placeholder="Your Email">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<button type="submit" style="background-color: green;"  class="btn btn-block">Subscribe</button>
						</div>
						<p style="color: white;font-size: 14px;">By subscribe, you agree to receive promotional emails on activities and insider tips. You can unsubscribe or withdraw your consent at any time with future effect. For more information, read our <a href="" style="color: blue;">Privacy statement</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>
		</div>

	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p b-md">
				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>Payment</h3>
						<p> </p>
					</div>
				</div>

				<div class="col-md-2 col-md-push-1">
					<div class="gtco-widget">
						<h3>Jogja Borobudur Tour & Travel</h3>
						<ul class="gtco-footer-links">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#">Contact & FAQ</a></li>
							<li><a href="#">Terms & Condition</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-2 col-md-push-1">
					<div class="gtco-widget">
						<h3>Partnership</h3>
						<ul class="gtco-footer-links">
							<li><a href="#">Travel Agent</a></li>
							<li><a href="#">Online Booking Platform</a></li>
							<li><a href="#">Corporate Discount</a></li>
							<li><a href="#">Social Media Influencer</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-md-push-1">
					<div class="gtco-widget">
						<h3>Get In Touch</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> </a></li>
							<li><a href="#"><i class="icon-mail2"></i> </a></li>
							<li><a href="#"><i class="icon-chat"></i> </a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; 2022 JogjaBorobudur Tour. All Rights Reserved.</small> 
					</p>
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i style="color: #182c4c;" class="icon-facebook"></i></a></li>
							<li><a href="#"><i style="color: #182c4c;" class="icon-linkedin"></i></a></li>
							<li><a href="#"><i style="color: #182c4c;" class="icon-instagram"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	<!-- </div> -->

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="{{asset('traveler')}}/js/lightbox-plus-jquery.min.js"></script>
	<script src="{{asset('traveler')}}/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="{{asset('traveler')}}/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="{{asset('traveler')}}/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="{{asset('traveler')}}/js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="{{asset('traveler')}}/js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="{{asset('traveler')}}/js/jquery.countTo.js"></script>

	<!-- Stellar Parallax -->
	<script src="{{asset('traveler')}}/js/jquery.stellar.min.js"></script>

	<!-- Magnific Popup -->
	<script src="{{asset('traveler')}}/js/jquery.magnific-popup.min.js"></script>
	<script src="{{asset('traveler')}}/js/magnific-popup-options.js"></script>
	
	<!-- Datepicker -->
	<script src="{{asset('traveler')}}/js/bootstrap-datepicker.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

	<!-- Main -->
	<script src="{{asset('traveler')}}/js/main.js"></script>
	<script>
	var swiper = new Swiper(".slide-container", {
  slidesPerView: 4,
  spaceBetween: 20,
  sliderPerGroup: 4,
  loop: true,
  centerSlide: "true",
  fade: "true",
  grabCursor: "true",
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    520: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    1000: {
      slidesPerView: 4,
    },
  },
});
	</script>
	
	
	</body>
</html>

