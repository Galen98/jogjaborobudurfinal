@extends('frontend.form')
@section('header')
<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url({{asset('traveler')}}/images/about.jpg);height: 657px;">
    <div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					<div class="row row-mt-15em">

						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<h3 style="color: white;font-size:70px;">About Us</h3>
							<h2>“Jogja Borobudur Tours & Travel is a registered business based in Yogyakarta, Indonesia.”
								<br>
							Our vision is to deliver high quality travel services in order to give the best travel experience to our customers. </h2>	
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
</header>
@endsection
@section('content')
@include('sweetalert::alert')
						<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
							<span data-test-id="collection-title" class="collection-header_title" data-v-76e871e0 style="font-size: 40px;">
       Our Services
      </span>
      <ul style="margin-top: 10px;">
      	<li><span style="font-size: 30px;" data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
       1. Daily Tours
      </span></li>
      	<li><span style="font-size: 30px;" data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
       2. Multi-day Tour Packages
      </span></li>
      <li><span style="font-size: 30px;" data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
       3. Airport Transfers
      </span></li>
      <li><span style="font-size: 30px;" data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
       4. Hotels & Domestic Flight
      </span></li>
      <li><span style="font-size: 30px;" data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
       5. M.I.C.E
      </span></li>
      </ul>
     	
						</div>

						<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
							<span data-test-id="collection-title" class="collection-header_title" data-v-76e871e0 style="font-size: 40px;">
       Our Promises
      </span>
      <ul style="margin-top: 10px;">
      	<li><span style="font-size: 30px;" data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
       1. FLEXIBLE
      </span>
      <br>
      <p>is to be flexible to our customer needs in order to  deliver the best experience during the tours</p>
  		</li>

  		<li><span style="font-size: 30px;" data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
       2. RELIABLE
      </span>
      <br>
      <p>is to provide a valid & accurate information to our customers where they can rely on</p>
  		</li>

  		<li><span style="font-size: 30px;" data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
       3. RESPONSIBLE
      </span>
      <br>
      <p>is to deliver the best services to gain the satisfaction of the customer</p>
  		</li>
      </ul>
     	
						</div>

					<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
						<img src="{{asset('traveler')}}/images/logoabout.jpg" alt="" /><br>	
						<span style="font-size: 20px;" data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
				       Are you traveling for leisure or business ?
						Are you traveling alone or even with a big number of people?
						We can make your time more enjoyable, efficient and productive.
						We have been operating in Indonesia since 2007,
						providing unrivaled service in tours and travel operations.
						As an experienced tour & travel company, we provide 24/7
						real human customer service for any of your questions.
										      </span>
					</div>

					<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<span style="font-size: 30px;" data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
			       “Stop dreaming, start planning!”<br><br>
			       <a href="/">
            <button type="button" id="btn-booking-header" data-test-id="btn-booking-header" class="gtm-trigger__book-now-price-box-btn c-button c-button--medium c-button--filled-standard" data-v-46d2d245><!----> 
                        START EXPLORE
                      </button>
                      </a>
			      </span>
					</div>

@endsection