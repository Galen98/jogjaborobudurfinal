@extends('frontend.forindex')
@section('header')
@foreach($background as $item)
	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)) ,url({{ url('public/img/'.$item->image) }});height: 643px;overflow: hidden;">
    <div>
      <div>
        @endforeach
    <div class="page-header__content" data-v-3a2bcacc >
  <a href="/" data-test-id="page-header-logo" class="page-header__logo-link" data-v-3a2bcacc style="margin-top: 10px;">
  <img src="{{asset('spica')}}/images/logomini.png" alt="logo" height="50" width="100" style="margin-left:5px;"/>
  </a> 
  <nav data-test-id="page-header-nav" class="navigation page-header__navigation light" data-v-3a2bcacc >
  <ul class="navigation__list">
    
  <li data-test-id="header-navigation-search" class="navigation__list-item-parent item__search">
  <!-- <div class="dropdown drops">
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
          </div> -->
            <div class="dropdown drops">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" style="background-color:#fc2c04;color: white;border-color:#fc2c04;" >
            @if($sessions == 'Bahasa')
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3 2" height="20px" style="margin-bottom:3px;"><path fill="#fff" d="M0 0h3v2H0z"/><path fill="red" d="M0 0h3v1H0z"/></svg>
            @endif
            @if($sessions == 'English')
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="20px" style="margin-bottom:3px;" viewBox="0 0 7410 3900"><path fill="#b22234" d="M0 0h7410v3900H0z"/><path d="M0 450h7410m0 600H0m0 600h7410m0 600H0m0 600h7410m0 600H0" stroke="#fff" stroke-width="300"/><path fill="#3c3b6e" d="M0 0h2964v2100H0z"/><g fill="#fff"><g id="d"><g id="c"><g id="e"><g id="b"><path id="a" d="M247 90l70.534 217.082-184.66-134.164h228.253L176.466 307.082z"/><use xlink:href="#a" y="420"/><use xlink:href="#a" y="840"/><use xlink:href="#a" y="1260"/></g><use xlink:href="#a" y="1680"/></g><use xlink:href="#b" x="247" y="210"/></g><use xlink:href="#c" x="494"/></g><use xlink:href="#d" x="988"/><use xlink:href="#c" x="1976"/><use xlink:href="#e" x="2470"/></g></svg>
            @endif
            @if($sessions == 'Malay')
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13440 6720" height="20px" style="margin-bottom:3px;"><g transform="scale(480)"><path fill="#fff" d="m0 0h28v14H0z"/><path stroke="#c00" d="m1 .5h27m0 2H1m0 2h27m0 2H1"/><path fill="#006" d="m0 0h14v8.5H0z"/><path stroke="#c00" d="m0 8.5h28m0 2H0m0 2h28"/></g><path fill="#fc0" d="m4200 720 107 732 414-613-222 706 639-373-506 540 738-59-690 267 690 267-738-59 506 540-639-373 222 706-414-613-107 732-107-732-414 613 222-706-639 373 506-540-738 59 690-267-690-267 738 59-506-540 639 373-222-706 414 613zm-600 30a1280 1280 0 1 0 0 2340 1440 1440 0 1 1 0-2340z"/></svg>
            @endif
            </button>
            <div class="dropdown-menu">
              @foreach($bahasa as $item)
              <a class="dropdown-item" href="/change-language/{{$item->bahasa}}">{{$item->bahasa}}</a>
              @endforeach
            </div>
          </div>
  </li> 

  <!-- <li data-test-id="header-navigation-search" class="navigation__list-item-parent item__search" style="margin-left:-35px;" >
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
  </li> -->

  <li data-test-id="header-navigation-search" class="navigation__list-item-parent item__search" style="margin-left:-35px;margin-right:-15px;" >
  <!-- <div class="dropdown drops">
            <button class="btn btn-sm btn-secondary" type="button" data-toggle="dropdown" aria-expanded="false" style="background-color:#fc2c04;color: white;border-color:#fc2c04;" >
            <span class="material-symbols-outlined">
            travel_explore
            </span>
            </button>
            <div class="dropdown-menu">
            @foreach($season as $item)
            <a class="dropdown-item" href="{{'/season/' .$item->id}}">{{$item->namaseason}}</a>
            @endforeach
            </div>
          </div> -->
          <div class="dropdown drops" >
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" style="background-color:#fc2c04;color: white;border-color:#fc2c04;">
             {!! $session !!}
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
  

  <li tabindex="0" data-test-id="header-navigation-pickers" class="item__dropdown item__dropdown--language js-navigation-language-dropdown hide-language">
     <div class="dropdown drops">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" style="background-color:#fc2c04;color: white;border-color:#fc2c04;" >
            @if($sessions == 'Bahasa')
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3 2" height="20px" style="margin-bottom:5px;"><path fill="#fff" d="M0 0h3v2H0z"/><path fill="red" d="M0 0h3v1H0z"/></svg>
            @endif
            @if($sessions == 'English')
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="20px" style="margin-bottom:5px;" viewBox="0 0 7410 3900"><path fill="#b22234" d="M0 0h7410v3900H0z"/><path d="M0 450h7410m0 600H0m0 600h7410m0 600H0m0 600h7410m0 600H0" stroke="#fff" stroke-width="300"/><path fill="#3c3b6e" d="M0 0h2964v2100H0z"/><g fill="#fff"><g id="d"><g id="c"><g id="e"><g id="b"><path id="a" d="M247 90l70.534 217.082-184.66-134.164h228.253L176.466 307.082z"/><use xlink:href="#a" y="420"/><use xlink:href="#a" y="840"/><use xlink:href="#a" y="1260"/></g><use xlink:href="#a" y="1680"/></g><use xlink:href="#b" x="247" y="210"/></g><use xlink:href="#c" x="494"/></g><use xlink:href="#d" x="988"/><use xlink:href="#c" x="1976"/><use xlink:href="#e" x="2470"/></g></svg>
            @endif
            @if($sessions == 'Malay')
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13440 6720" height="20px" style="margin-bottom:5px;"><g transform="scale(480)"><path fill="#fff" d="m0 0h28v14H0z"/><path stroke="#c00" d="m1 .5h27m0 2H1m0 2h27m0 2H1"/><path fill="#006" d="m0 0h14v8.5H0z"/><path stroke="#c00" d="m0 8.5h28m0 2H0m0 2h28"/></g><path fill="#fc0" d="m4200 720 107 732 414-613-222 706 639-373-506 540 738-59-690 267 690 267-738-59 506 540-639-373 222 706-414-613-107 732-107-732-414 613 222-706-639 373 506-540-738 59 690-267-690-267 738 59-506-540 639 373-222-706 414 613zm-600 30a1280 1280 0 1 0 0 2340 1440 1440 0 1 1 0-2340z"/></svg>
            @endif
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
             {!! $session !!}
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
     <div>
      <form action="/contact/contacts-us" method="GET">
            <button class="btn btn-secondary" type="submit" style="background-color:transparent !important;color: white;border-color:transparent !important;">
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
		@foreach($background as $item)
		<div class="gtco-container">
			<div class="row">
				<div class="row-mt-15em" style="margin-top:100px; ">
						<div class="col-md-7 mt-text" style="margin-top:-10px;margin-left:0px;">
							<h1>{{$item->header}}</h1><br>
              <form action="/alltours" method="GET">
              <!-- <button type="submit" class="js-check-availability gtm-trigger__adp-check-availability-btn avoid-close-dropdown-on-click c-button c-button--medium filbtn" data-test-id="checkout-submit-btn" id="tess">Learn More</button> -->
              <div class="d-none d-sm-block"> 
            <div class="search-box" id="tess">
            <input type="text" class="form-control search-input" placeholder="Where are you going?">
            <button class="c-button c-button--medium c-button--filled-standard billing-form__validate-billing-details-and-sri__button" style="margin-right:5px;">
              <i class="fas fa-search"></i>
            </button>
          </div>
          </div>
          <div class="d-block d-sm-none"> 
            <div class="search-box-mobile" id="tess">
            <input type="text" class="form-control search-input" placeholder="Where are you going?">
            <button class="c-button c-button--medium c-button--filled-standard billing-form__validate-billing-details-and-sri__button" style="margin-right:5px;">
              <i class="fas fa-search"></i>
            </button>
          </div>
          </div>
            </form>
						</div>
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight" style="margin-top: -180px;">
						</div>
					</div>
				</div>
			</div>
      @endforeach
	</header>
	@endsection
 
	@section('content')
@include('sweetalert::alert')
   <div class="wrapper container">
   <br>
  <br>
   <div class="d-none d-sm-block">
      <div class="icon"><i id="left" class="fa-solid fa-angle-left"></i></div>
      <ul class="tabs-box">
        @foreach($season as $item)
        <a href="{{'/season/' .$item->id}}" class="tabhref"><li class="tab">{{$item->namaseason}}</li></a>
        @endforeach
      </ul>
      <div class="icon"><i id="right" class="fa-solid fa-angle-right"></i></div>
      </div>


      <div class="d-block d-md-none">
  <ul class="custom-horizontal-list">
  @foreach($season as $item)
  <li class=""><a href="{{'/season/' .$item->id}}" class="btn btn-outline-dark" style="color:#233351;border-radius:20px;">{{$item->namaseason}}</a></li>
  @endforeach
  </ul>
  </div>
    </div>


  <div id="gyg" data-server-rendered="true"> 
  <div class="new-homepage-layout main-wrapper  partner-left-layout" data-v-1e9f5217>
  <a href="#main-content" class="skip-link">Skip to content</a> 
  <main id="main-content" class="home-page">
<div class="activities" data-v-680034d2 data-v-1e9f5217>
    <section data-test-id="activity-picks" class="collection-container container activities__cards" data-v-76e871e0 data-v-680034d2>
    <div class="collection-header" data-v-76e871e0><div class="collection-header--title-container" data-v-76e871e0>
    <span data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
        Our Top Tour 
      </span> 
    </div>
    </div> 
    <div class="collection-body" data-v-76e871e0>
    <div class="collection-body--horizontal" data-v-76e871e0>
    <div class="vertical-activity-cards__grid" data-v-76e871e0>
      @foreach($traveltop as $item)
      <!-- <article class="custom-card">
    <img src="{{ url('public/img/'.$item->image) }}" alt="Card Image">
    <div class="card-content">
        <h2>Card Title</h2>
        <p>This is a sample card content. Lorem ipsum dolor sit amet...</p>
    </div>
</article> -->

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
    <div class="vertical-activity-card__badge">
    </div>
    </div> 
    <header class="vertical-activity-card__header">
    <div class="vertical-activity-card__activity-type-wrapper">
      </div> 
      <p data-test-id="activity-card-title" class="vertical-activity-card__title">
            {{$item->namawisata}} 
          </p> </header> 
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
            </span> 
      </span>
      @elseif($item->label == 'Bestseller')
      <span class="vertical-activity-card__badges">
      <span class="vertical-activity-card__ltso-badge c-marketplace-badge c-marketplace-badge--primary" style="background-color: green;">
              Bestseller
            </span> 
      </span>
      @endif
      </div>
      </div> 
      <div class="vertical-activity-card__details">
      <footer class="vertical-activity-card__footer">
      <div class="rating-overall__container">
      <div class="rating-overall__rating"> 
      <div class="rating-star rating-overall__rating-stars">
        <div class="" style="margin-bottom: 10px;">
              <div class="small-ratings">
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
    <div class="vertical-activity-card__bottom">
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
    </section> 
    </div>
    </main>
    </div>
    </div>
	
	<div class="gtco-section"  style="margin-top:-80px;margin-bottom:-80px;">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<form action="/alltours" method="get">
					<button class="btn btn-light" style="font-size: 20px;border-color:#f0f0f0;border-radius:20px;">Discover all tours</button>
					</form>
				</div>
			</div>
		</div>
	</div>

  <div class="wrapper container d-block d-md-none" style="overflow:hidden;margin-bottom:100px;margin-top:50px;">
  <div class="d-block d-md-none">
  <span data-test-id="collection-title" class="collection-header_title" data-v-76e871e0 style="font-size:28px;">
        Other Popular Tours
      </span>
      <br>
      <br>
  <ul class="custom-horizontal-list">
  @foreach($other as $item)
  <li class="">
  <div class="activity-card-block--grid border rounded" style="margin-bottom: 0px;">
  <article data-test-id="horizontal-activity-card" class="activity-card horizontal-activity-card companion-inactive activity-card-block__card--grid activity-card-block--desktop" data-v-a1084d9e>
  <a href="{{'/item/'.$item->slug}}" role="contentinfo" target="_blank" rel="noopener" data-activity-id="412877" class="activity-card__container gtm-trigger__card-interaction" data-v-a1084d9e>
  <div class="activity-card__image" data-v-a1084d9e> 
  <div class="activity-card__image-info align-end" data-v-a1084d9e></div> 
  <picture data-v-a1084d9e>
  <source srcset="{{ url('public/img/'.$item->image) }}" type="image/webp"> 
  <img src="{{ url('public/img/'.$item->image) }}" alt="{{$item->namawisata}}"></picture>
  </div> 
  <div class="activity-card__details" data-v-a1084d9e>
  <div class="activity-card__details-main" data-v-a1084d9e>
  <div class="activity-card__details-left" data-v-a1084d9e> 
  <h3 class="activity-card__title text-capitalize" data-v-a1084d9e style="font-size:14px;">{{Str::limit($item->namawisata, 25)}}</h3> 
  <div class="activity-card__attributes" data-v-a1084d9e>
  <ul class="activity-attributes__container" data-v-67560657 data-v-a1084d9e>
  <li class="activity-attributes__attribute" data-v-67560657>
  <span data-v-67560657>
    <span data-v-67560657 class="small">{{$item->durasi}}</span>
  </span>
</li>
  </ul> 
  </div>  
  <div class="activity-card__badges__container" data-v-a1084d9e>  
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

</div>   
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
      </p></div></div></div> 
    </div> 
    </div>
    </div>
    </a>
    </article>
    </div>
</li>
  @endforeach
  </ul>
  </div>
</div>


    <div id="gyg" data-server-rendered="true" class="d-none d-sm-block">
  <div class="main-wrapper  partner-left-layout" data-v-5120f7ad>
  <a href="#main-content" class="skip-link">Skip to content</a> 
  <main id="main-content">
    <section layout="vertical" class="grid-wrapper container grid-wrapper--list">
      <div class="collection-header" data-v-76e871e0 style="margin-bottom:-3px;">
        <div class="collection-header--title-container" data-v-76e871e0>
    <span data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
        Other Popular Tours
      </span> 
    </div> 
    </div>
@foreach($other as $item)
  <div class="activity-card-block--grid border rounded d-none d-sm-block" style="margin-bottom: 0px;">
  <article data-test-id="horizontal-activity-card" class="activity-card horizontal-activity-card companion-inactive activity-card-block__card--grid activity-card-block--desktop" data-v-a1084d9e>
  <a href="{{'/item/'.$item->slug}}" role="contentinfo" target="_blank" rel="noopener" data-activity-id="412877" class="activity-card__container gtm-trigger__card-interaction" data-v-a1084d9e>
  <div class="activity-card__image" data-v-a1084d9e> 
  <div class="activity-card__image-info align-end" data-v-a1084d9e></div> 
  <picture data-v-a1084d9e>
  <source srcset="{{ url('public/img/'.$item->image) }}" type="image/webp"> 
  <img src="{{ url('public/img/'.$item->image) }}" alt="{{$item->namawisata}}"></picture>
  </div> 
  <div class="activity-card__details" data-v-a1084d9e>
  <div class="activity-card__details-main" data-v-a1084d9e>
  <div class="activity-card__details-left" data-v-a1084d9e> 
  <h2 class="activity-card__title" data-v-a1084d9e>{{$item->namawisata}}</h2> 
  <div class="activity-card__attributes" data-v-a1084d9e>
  <ul class="activity-attributes__container" data-v-67560657 data-v-a1084d9e>
  <li class="activity-attributes__attribute" data-v-67560657>
  <span data-v-67560657>
    <span data-v-67560657>{{$item->durasi}}</span>
  </span>
</li>
  </ul> 
  </div>  
  <div class="activity-card__badges__container" data-v-a1084d9e>  
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

</div>   
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
      </p></div></div></div> 
    </div> 
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

<div class="wrapper container" style="overflow:hidden;">
<span data-test-id="collection-title" class="collection-header_title" data-v-76e871e0 style="font-size:28px;">
        Our top tours & activities
      </span>
<ul class="horizontal-list" style="margin-bottom:50px;">
  @foreach($province as $item)
 <li><a href="/location/{{$item->slugprovince}}/{{$item->id}}" style="color:#233351;">{{$item->namaprovince}}</a></li> 
  @endforeach
  @foreach($season as $item)
  <li><a href="{{'/season/' .$item->id}}" style="color:#233351;">{{$item->namaseason}}</a></li>
  @endforeach
  @foreach($destinate as $item)
  <li><a href="{{'/category-destination/' .$item->id}}" style="color:#233351;">{{$item->destination}}</a></li>
  @endforeach
  @foreach($city as $item)
  <li><a href="{{'/city/' .$item->slugregion}}" style="color:#233351;">{{$item->namaregion}}</a></li>
  @endforeach
</ul>
</div>

	<!-- <div id="gtco-subscribe" style="background-color: white;" >
<div class="gtco-container"  style="margin-top:-50px; ">
  <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
          <span data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
        Choose Your Destination
      </span>
        </div>
    @foreach($provinces as $item)
    <div class="col-lg-4 col-md-4 col-sm-6" style="margin-bottom:10px;max-height:300px;"> -->
    <!-- <a href="/location/{{$item->slugprovince}}/{{$item->id}}">
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 container_foto">
         <article class="text-left">
            <h2>{{$item->namaprovince}}</h2>
            <h4>{!! $item->shortdescription !!}</h4>
         </article>
         <img src="https://i0.wp.com/www.mediainfo.id/wp-content/uploads/2022/01/Travel-Pekalongan-Jogja.webp" alt="{{$item->province}}">
      </div>
      </a> -->
      <!-- <a href="/location/{{$item->slugprovince}}/{{$item->id}}">
      <div class="hover hover-2 text-white rounded"><img src="{{ url('public/img/'.$item->image) }}" alt="{{$item->namaprovince}}"/>
          <div class="hover-overlay"></div>
          <div class="hover-2-content px-5 py-4">
            <h4 class="hover-2-title text-capitalize font-weight-bold mb-0" style="font-size:24px;color:white;"> {{$item->namaprovince}}</h4>
          </div>
        </div>
        </a>
      </div>
      
      @endforeach
</div>
</div> -->		
	<!-- </div> -->
@endsection