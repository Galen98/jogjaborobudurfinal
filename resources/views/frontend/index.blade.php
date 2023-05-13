@extends('frontend.forindex')

@section('header')
	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)) ,url({{asset('traveler')}}/images/logins.jpg);height: 643px;overflow: hidden;">
    <!-- <div class="overlay"></div> -->
    <div>
      <div>
    <div class="page-header__content" data-v-3a2bcacc >
  <a href="/" data-test-id="page-header-logo" class="page-header__logo-link" data-v-3a2bcacc style="margin-top: 10px;">
  <!-- <img src="{{asset('spica')}}/images/logomini.png" alt="logo" height="50" width="100" /> -->
  </a> 
  
  
  <nav data-test-id="page-header-nav" class="navigation page-header__navigation light" data-v-3a2bcacc >
  <ul class="navigation__list">
  <li data-test-id="header-navigation-search" class="navigation__list-item-parent item__search">
  <div class="dropdown drops">
            <button class="btn btn-secondary" type="button" data-toggle="dropdown" aria-expanded="false" style="background-color:#fc2c04;color: white;border-color:#fc2c04;">
             <span class="material-symbols-outlined" style="font-size: 26px;">
            language
            </span>
            </button>
            <div class="dropdown-menu">
              @foreach($bahasa as $item)
              <a class="dropdown-item" href="/change-language/{{$item->bahasa}}">{{$item->bahasa}}</a>
              @endforeach
            </div>
          </div>
  </li> 

  <li data-test-id="header-navigation-search" class="navigation__list-item-parent item__search" style="margin-left:-35px;" >
  <div class="dropdown drops">
            <button class="btn btn-sm btn-secondary" type="button" data-toggle="dropdown" aria-expanded="false" style="background-color:#fc2c04;color: white;border-color:#fc2c04;" >
            <span class="material-symbols-outlined" style="font-size: 26px;">
            paid
            </span>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/change-session/USD">USD</a>
              <a class="dropdown-item" href="/change-session/IDR">IDR</a>
              <a class="dropdown-item" href="/change-session/MYR">MYR</a>
              <a class="dropdown-item" href="/change-session/SGD">SGD</a>
              <a class="dropdown-item" href="/change-session/EUR">EUR</a>
            </div>
          </div>
  </li>

  <li data-test-id="header-navigation-search" class="navigation__list-item-parent item__search" style="margin-left:-35px;margin-right:-15px;" >
  <div class="dropdown drops">
            <button class="btn btn-sm btn-secondary" type="button" data-toggle="dropdown" aria-expanded="false" style="background-color:#fc2c04;color: white;border-color:#fc2c04;" >
            <span class="material-symbols-outlined" style="font-size: 26px;">
            explore
            </span>
            </button>
            <div class="dropdown-menu">
              @foreach($destinate as $item)
              <a class="dropdown-item" href="{{'/category-destination/' .$item->id}}">{{$item->destination}}</a>
              @endforeach
            </div>
          </div>
  </li>

  
  <li tabindex="0" data-test-id="header-navigation-pickers" class="item__dropdown item__dropdown--language js-navigation-language-dropdown hide-language">
     <div class="dropdown drops">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" style="background-color:#fc2c04;color: white;border-color:#fc2c04;" >
             <i class="fa fa-language" aria-hidden="true" style="font-size:20px;"></i> Language ({!! $sessions !!})
            </button>
            <div class="dropdown-menu">
              @foreach($bahasa as $item)
              <a class="dropdown-item" href="/change-language/{{$item->bahasa}}">{{$item->bahasa}}</a>
              @endforeach
            </div>
          </div>
  </li> 

  <li tabindex="0" data-test-id="header-navigation-pickers" class="item__dropdown item__dropdown--language js-navigation-language-dropdown hide-language" style="margin-left:-36px; ">
     <div class="dropdown drops" >
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" style="background-color:#fc2c04;color: white;border-color:#fc2c04;">
              <i class="fa fa-usd" aria-hidden="true" style="font-size: 20px;"></i> Currency ({!! $session !!})
            </button>
            <div class="dropdown-menu">
           <a class="dropdown-item" href="/change-session/USD">USD</a>
              <a class="dropdown-item" href="/change-session/IDR">IDR</a>
              <a class="dropdown-item" href="/change-session/MYR">MYR</a>
              <a class="dropdown-item" href="/change-session/SGD">SGD</a>
              <a class="dropdown-item" href="/change-session/EUR">EUR</a>
            </div>

          </div>


  </li> 

    <li tabindex="0" data-test-id="header-navigation-pickers" class="item__dropdown item__dropdown--language js-navigation-language-dropdown hide-language" style="margin-left:-36px; ">
     <div class="dropdown drops">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" style="background-color:#fc2c04;color: white;border-color:#fc2c04;">
             <i class="fa fa-compass" aria-hidden="true" style="font-size:20px;"></i> Destinations
            </button>
            <div class="dropdown-menu">
              @foreach($destinate as $item)
          <a class="dropdown-item" href="{{'/category-destination/' .$item->id}}">{{$item->destination}}</a>
              @endforeach
            </div>
          </div>
  </li>

  <li tabindex="0" data-test-id="header-navigation-pickers" class="item__dropdown item__dropdown--language js-navigation-language-dropdown hide-language" style="margin-left:-36px; ">
     <div>
      <form action="/contact/contacts-us" method="GET">
            <button class="btn btn-secondary" type="submit" data-toggle="dropdown" aria-expanded="false" style="background-color:transparent !important;color: white;border-color:transparent !important;">
            Contact
            </button>
           </form>
          </div>
  </li> 
    </ul>
    </nav>
    </div>
  </div>
  </div>
		
		<div class="gtco-container">
			<div class="row">
				<div class="row-mt-15em" style="margin-top:100px; ">
						<div class="col-md-7 mt-text" style="margin-top:-10px;margin-left: 30px; ">
							<h1>Explore Borobudur, Prambanan, Yogyakarta, and many more.</h1><br>
              <form action="/alltours" method="GET">
              <button type="submit" class="js-check-availability gtm-trigger__adp-check-availability-btn avoid-close-dropdown-on-click c-button c-button--medium filbtn" data-test-id="checkout-submit-btn" id="tess">Learn More</button></form>
						</div>
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight" style="margin-top: -180px;">
						</div>
					</div>
				</div>
			</div>
      
		
	</header>
	@endsection
	@section('content')
@include('sweetalert::alert')
   <div class="wrapper" style="margin-left: 30px;">
      <div class="icon"><i id="left" class="fa-solid fa-angle-left"></i></div>
      <ul class="tabs-box">
        @foreach($season as $item)
        <a href="{{'/season/' .$item->id}}" class="tabhref"><li class="tab">{{$item->namaseason}}</li></a>
        @endforeach
      </ul>
      <div class="icon"><i id="right" class="fa-solid fa-angle-right"></i></div>
    </div>


  <div id="gyg" data-server-rendered="true"> 
  <div class="new-homepage-layout main-wrapper  partner-left-layout" data-v-1e9f5217><!----> <!----> <!----> <!----> 
  <a href="#main-content" class="skip-link">Skip to content</a> 
  <main id="main-content" class="home-page">
<div class="activities" data-v-680034d2 data-v-1e9f5217>
    <section data-test-id="activity-picks" class="collection-container container activities__cards" data-v-76e871e0 data-v-680034d2>
    <div class="collection-header" data-v-76e871e0><div class="collection-header--title-container" data-v-76e871e0>
    <span data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
        Our Top Tour
      </span> <!---->
    </div> <!---->
    </div> 
    <div class="collection-body" data-v-76e871e0>
    <div class="collection-body--horizontal" data-v-76e871e0>
    <div class="vertical-activity-cards__grid" data-v-76e871e0>
      @foreach($traveltop as $item)
    <article data-test-id="vertical-activity-card" class="vertical-activity-card" data-v-76e871e0>
    <div class="vertical-activity-card__content-wrapper">
    <a href="{{'/item/'.$item->slug}}" role="contentinfo" data-activity-id="62214" target="_blank" class="vertical-activity-card__container gtm-trigger__card-interaction">
    <div class="vertical-activity-card__top-wrapper">
    <div class="vertical-activity-card__top">
    <div class="vertical-activity-card__photo">
    <picture>
    <source srcset="{{ url('public/img/'.$item->image) }}" type="image/webp"> 
    <img src="{{ url('public/img/'.$item->image) }}" alt="{{$item->namawisata}}">
    </picture>
    </div> 
    <div class="vertical-activity-card__badge"><!---->
    </div>
    </div> 
    <header class="vertical-activity-card__header">
    <div class="vertical-activity-card__activity-type-wrapper">
      </div> 
      <p data-test-id="activity-card-title" class="vertical-activity-card__title">
            {{$item->namawisata}}
          </p> <!----></header> 
      <div class="vertical-activity-card__body">
      <ul class="activity-attributes__container" data-v-33ad6115>
      <li class="activity-attributes__attribute" data-v-33ad6115>
      <span data-v-33ad6115>Duration: {{$item->durasi}}
      </span>
      </li>
      </ul>
      @if($item->label == 'Likely to sell out') 
      <span class="vertical-activity-card__badges">
      <span class="vertical-activity-card__ltso-badge c-marketplace-badge c-marketplace-badge--primary">
              Likely to sell out
            </span> <!----> <!----> <!---->
      </span>
      @elseif($item->label == 'Bestseller')
      <span class="vertical-activity-card__badges">
      <span class="vertical-activity-card__ltso-badge c-marketplace-badge c-marketplace-badge--primary" style="background-color: green;">
              Bestseller
            </span> <!----> <!----> <!---->
      </span>
      @endif
      </div>
      </div> 
      <div class="vertical-activity-card__details">
      <footer class="vertical-activity-card__footer">
      <div class="rating-overall__container">
      <div class="rating-overall__rating"><!----> 
      <div class="rating-star rating-overall__rating-stars">
        <div class="" style="margin-bottom: 10px;">
              <div class="small-ratings">
                <!-- <p class="review-stat" style="color: black;font-weight: bolder;">{{$jumlahreview ?? ''}} Reviews</p> -->
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
              </div>
            </div>
      </div> 
  </div> 
  <div class="rating-overall__reviews">
  </div>
  </div> 
  <div class="baseline-pricing" data-v-23fc334c>
  <div class="baseline-pricing__container" data-v-23fc334c>
  	@if($item->discount == 'yes' && $session == 'USD')
  	<div class="baseline-pricing__value" data-v-23fc334c style="text-decoration: line-through;color: red;">
      	US$ {{number_format ($item->IDR_awal/$rateIDR,1)}}
      </div>
      @endif

      @if($item->discount == 'yes' && $session == 'IDR')
  	<div class="baseline-pricing__value" data-v-23fc334c style="text-decoration: line-through;color: red;">
      	@currency($item->IDR_awal)
      </div>
      @endif

      @if($item->discount == 'yes' && $session == 'MYR')
  	<div class="baseline-pricing__value" data-v-23fc334c style="text-decoration: line-through;color: red;">
      	MYR {{ number_format(($item->IDR_awal / $rateIDR) * $rateMYR, 0, ',', '.') }}
      </div>
      @endif

      @if($item->discount == 'yes' && $session == 'SGD')
  	<div class="baseline-pricing__value" data-v-23fc334c style="text-decoration: line-through;color: red;">
      	SGD {{ number_format(($item->IDR_awal / $rateIDR) * $rateSGD, 0, ',', '.') }}
      </div>
      @endif

      @if($item->discount == 'yes' && $session == 'EUR')
  	<div class="baseline-pricing__value" data-v-23fc334c style="text-decoration: line-through;color: red;">
      	 € {{ number_format(($item->IDR_awal / $rateIDR) * $rateEUR, 0, ',', '.') }}
      </div>
      @endif
  <div class="baseline-pricing__value" data-v-23fc334c>
  <p class="baseline-pricing__from" data-v-23fc334c>From</p>
      
        @if($session == 'USD') 
      US$ {{number_format ($item->IDR/$rateIDR,1)}}
      @endif 

      @if($session == 'IDR') 
      @currency($item->IDR)
      @endif 

      @if($session == 'MYR') 
      MYR {{ number_format(($item->IDR / $rateIDR) * $rateMYR, 0, ',', '.') }}
      @endif

      @if($session == 'SGD') 
      SGD {{ number_format(($item->IDR / $rateIDR) * $rateSGD, 0, ',', '.') }}
      @endif

      @if($session == 'EUR') 
      € {{ number_format(($item->IDR / $rateIDR) * $rateEUR, 0, ',', '.') }}
      @endif
      </div> 
    <p class="baseline-pricing__category" data-v-23fc334c>
        {{$item->kategories}} @if($item->kategories == 'Per Group') up to {{$item->capacity}} @endif
      </p>

    </div>
    </div>
    </footer> 
    <div class="vertical-activity-card__bottom"><!---->
    </div>
    </div>
    </a> 
    <div class="vertical-activity-card__wishlist">
    </div>
    </div>
    </article>
    @endforeach

    </div>
    </div>
    </div>
    </section> <!---->
    </div>
    </main>
    </div>
    </div>
	
	<div class="gtco-section"  style="margin-top:-80px;margin-bottom:-80px;">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<form action="/alltours" method="get">
					<button class="btn btn-info" style="font-size: 20px;">Discover all tours</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	

    <div id="gyg" data-server-rendered="true">
  <div class="main-wrapper  partner-left-layout" data-v-5120f7ad><!----> <!----> <!----> <!----> 
  <a href="#main-content" class="skip-link">Skip to content</a> 
  <main id="main-content">
    <section layout="vertical" class="grid-wrapper container grid-wrapper--list">
      <div class="collection-header" data-v-76e871e0><div class="collection-header--title-container" data-v-76e871e0>
    <span data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
        Other Popular Tours
      </span> <!---->
    </div> <!---->
    </div>
@foreach($other as $item)
  <div class="activity-card-block--grid" style="margin-bottom: 0px;">
  <article data-test-id="horizontal-activity-card" class="activity-card horizontal-activity-card companion-inactive activity-card-block__card--grid activity-card-block--desktop" data-v-a1084d9e>
  <a href="{{'/item/'.$item->slug}}" role="contentinfo" target="_blank" rel="noopener" data-activity-id="412877" class="activity-card__container gtm-trigger__card-interaction" data-v-a1084d9e>
  <div class="activity-card__image" data-v-a1084d9e> 
  <div class="activity-card__image-info align-end" data-v-a1084d9e><!----></div> 
  <picture data-v-a1084d9e>
  <source srcset="{{ url('public/img/'.$item->image) }}" type="image/webp"> 
  <img src="{{ url('public/img/'.$item->image) }}" alt="{{$item->namawisata}}"></picture>
  </div> 
  <div class="activity-card__details" data-v-a1084d9e>
  <div class="activity-card__details-main" data-v-a1084d9e>
  <div class="activity-card__details-left" data-v-a1084d9e><!----> 
  <h2 class="activity-card__title" data-v-a1084d9e>{{$item->namawisata}}</h2> 
  <div class="activity-card__attributes" data-v-a1084d9e>
  <ul class="activity-attributes__container" data-v-67560657 data-v-a1084d9e>
  <li class="activity-attributes__attribute" data-v-67560657>
  <span data-v-67560657>
    <span data-v-67560657>{{$item->durasi}}</span>
  </span>
</li>
  </ul> <!---->
  </div> <!----> 
  <div class="activity-card__badges__container" data-v-a1084d9e><!----> <!----> <!---->
  </div>
  </div> 
  <div class="activity-card__details-right" data-v-a1084d9e>
  <div class="rating-overall__container" data-v-a1084d9e>
  <div class="rating-overall__rating">
  
  <div class="rating-star rating-overall__rating-stars">
 <div class="small-ratings">
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
              </div>

</div> <!----> <!----> 
</div> 
</div> 
<div class="activity-card__pricing" data-v-a1084d9e><div class="baseline-pricing" data-v-24caa43d data-v-a1084d9e><div class="baseline-pricing__container" data-v-24caa43d><div class="baseline-pricing__value" data-v-24caa43d><p class="baseline-pricing__from" data-v-24caa43d>From</p>
        @if($session == 'USD')
        US$ {{number_format ($item->IDR/$rateIDR,1)}}
        @endif

        @if($session == 'MYR')
        MYR {{ number_format(($item->IDR / $rateIDR) * $rateMYR, 0, ',', '.') }}
        @endif

        @if($session == 'EUR')
        € {{ number_format(($item->IDR / $rateIDR) * $rateEUR, 0, ',', '.') }}
        @endif

        @if($session == 'SGD')
       SGD {{ number_format(($item->IDR / $rateIDR) * $rateSGD, 0, ',', '.') }}
        @endif

        @if($session == 'IDR')
        @currency($item->IDR)
        @endif
      </div> <p class="baseline-pricing__category" data-v-24caa43d>
        {{$item->kategories}}
      </p></div></div></div> <!---->
    </div> <!---->
    </div>
    </div>
    </a>
    </article>
    </div>
    @endforeach
  </section>
</main>
</div>
</div>


	<div id="gtco-subscribe" style="background-color: white;" >
<div class="gtco-container"  style="margin-top:-50px; ">
  <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
          <span data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
        Choose Your Destination
      </span>
        </div>
    @foreach($destination as $item)
    <div class="col-lg-4 col-md-4 col-sm-6">
    <a href="{{'/category-destination/' .$item->id}}">
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 container_foto ">
         <article class="text-left">
            <h2>{{$item->destination}}</h2>
            <h4>{!! $item->shortdescription !!}</h4>
         </article>
         <img src="{{ url('public/img/'.$item->image) }}" alt="{{$item->destination}}">
      </div>
      </a>
      </div>
      @endforeach
</div>
</div>

	
	<div id="gtco-features" style="background-color:white;">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="feature-center">
						
							<img class="img" src="{{asset('traveler')}}/images/free-cancellation.svg" style="margin-bottom: 20px;">
						
						<h3 style="color:#ff4c04;">FLEXIBLE</h3>
						<p style="color:#ff4c04;">Easy to modify your booking</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center">
						<img class="img" src="{{asset('traveler')}}/images/discover-experiences.svg" style="margin-bottom: 20px;">
						<h3 style="color:#ff4c04;">RELIABLE</h3>
						<p style="color:#ff4c04;">We provide valid information</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center">
						<img class="img" src="{{asset('traveler')}}/images/itinerary.svg" style="margin-bottom: 20px;">
						<h3 style="color:#ff4c04;">RESPONSIBLE</h3>
						<p style="color:#ff4c04;">We deliver qualified services</p>
					</div>
				</div>
				

			</div>
		</div>
	</div>



	



	
	<!-- <div id="gtco-subscribe" style="background-color: white;" >
		<div class="gtco-container">
			<div class="row">
				<div class="row gx-1 ">

    <div class="col-md-6" style="padding-left: 20px;">
    	<h1 class="" style="font-weight: bold;color: black;font-size: 28px;">Unforgettable Travel Experiences</h1>
    	<p class="" style="font-weight: 30px;">Go beyond the surface of the world’s must-see travel destinations. Discover our authentic, unforgettable experiences and explore the world for real.</p>
    </div>

    <div class="col-md-6">
<iframe width="560" height="315" src="https://www.youtube.com/embed/24-gX9tKUsY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
  </div>
			</div>
		</div>
	</div> -->
	<div id="gtco-section border-bottom" style="background-color: white;margin-bottom: 80px;" >
		<div class="gtco-container">
			<div class="row">
			</div>
		</div>
	</div>

	<div id="gtco-section border-bottom" style="background-color: white;margin-top:-50px; margin-bottom: 30px;" >
		<div class="gtco-container">
			<span data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
       Read our blog
      </span>
      <br>
      <br>
			<div class="row">
				@foreach($blog as $item)
				<div class="col-lg-4 col-md-4 col-sm-6" style="margin-bottom: 10px;">
				<a href="{{'/blog/'.$item->slug}}" target="_blank">
			<div class="carde swiper-slide" style="border-radius: 19px 19px 19px 19px;margin-bottom: 20px;">
            <div class="image-box">
              <img src="{{ url('public/img/'.$item->image) }}" alt="" />
            </div>
            <div class="profile-details">
              <div class="name-job">
				<h2 class="activity-card__title" data-v-a1084d9e>{{$item->judulblog}}</h2>
				<br>
        <h4 class="job">{{ Str::limit($item->shortdescription, 120) }}</h4>
        <br>
				<h3 class="name">{{\Carbon\Carbon::parse($item->created_at)->format('d/m/Y') ?? ''}}</h3>
				<br>
				<button type="submit" class="c-button c-button--medium c-button--filled-standard billing-form__validate-billing-details-and-sri__button" type="button" data-test-id="checkout-submit-btn" id="tess">Read now</button>
				<!-- <span class="label" style="background-color:#ff4c04;color:white;">{{$item->label}}</span> -->
              </div>
			</div>
		  </div>
		  </a>
				</div>
        <br>
				@endforeach
				<br>
			</div>
      
		</div>
    <div role="navigation" aria-label="List" class="w-pagination-wrapper pagination-wrap" style="margin-top: 40px;">
  <a href="/jogjaborobudurblog" data-a-button="border-grey" fs-cmsload-mode="load-under" href="?e8c9590c_page=2" aria-label="Next Page" class="w-pagination-next button is-border-grey">
  <div class="w-inline-block">Show more</div>
  </a>
  </div>
	</div>
	

	
	<!-- </div> -->
@endsection