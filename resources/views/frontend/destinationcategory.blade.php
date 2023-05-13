@extends('frontend.include')
@section('nav')
<header data-test-id="page-header" class="page-header light" data-v-3a2bcacc style="background-color:#fc2c04;margin-top: 0px;">
<div class="page-header__content" data-v-3a2bcacc >
  <a href="/" data-test-id="page-header-logo" class="page-header__logo-link" data-v-3a2bcacc style="margin-top: 10px;">
  <img src="{{asset('spica')}}/images/logomini.png" alt="logo" height="50" width="100" />
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
    </header>
  @endsection
@section('content')
@include('sweetalert::alert')

@if(count($count) === 0)
<div class="gtco-section">
		<div class="container">
			
			<div class="row">
    <div class="col-lg-4 col-md-12">

    </div>

    <div class="col-lg-4 col-md-6">
    	<img src="{{asset('traveler')}}/images/nodata.jpg">
    </div>

    <div class="col-lg-4 col-md-6">

    </div>
  </div>
  </div>
</div>
@endif
@if(count($count) > 0)
<div class="wrapper" style="margin-top:-21px;margin-left: 30px;">
      <div class="icon"><i id="left" class="fa-solid fa-angle-left"></i></div>
      <ul class="tabs-box">
        @foreach($season as $item)
        <a href="{{'/season/' .$item->id}}" class="tabhref"><li class="tab">{{$item->namaseason}}</li></a>
        @endforeach
      </ul>
      <div class="icon"><i id="right" class="fa-solid fa-angle-right"></i></div>
    </div>
    
<div id="gyg" data-server-rendered="true" style="margin-top:-25px;margin-bottom: -40px;">
  <div class="new-homepage-layout main-wrapper  partner-left-layout" data-v-1e9f5217><!----> <!----> <!----> <!----> 
  <!-- <a href="#main-content" class="skip-link">Skip to content</a>  -->
  <main id="main-content" class="home-page">
<div class="activities" data-v-680034d2 data-v-1e9f5217>
    <section data-test-id="activity-picks" class="collection-container container activities__cards" data-v-76e871e0 data-v-680034d2>
    <div class="collection-header" data-v-76e871e0><div class="collection-header--title-container" data-v-76e871e0>
    <span data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
    @foreach($destinasi as $item){{$item->destination}}@endforeach
      </span>
      
    </div> <!---->
    </div> 
    <div class="collection-body" data-v-76e871e0>
    <div class="collection-body--horizontal" data-v-76e871e0>
    <div class="vertical-activity-cards__grid" data-v-76e871e0>
 
      @foreach($destination as $item)
    <article data-test-id="vertical-activity-card" class="vertical-activity-card" data-v-76e871e0>
    <div class="vertical-activity-card__content-wrapper">
    <a href="{{'/item/'.$item->slug}}" role="contentinfo" data-activity-id="62214" target="_blank" class="vertical-activity-card__container gtm-trigger__card-interaction">
    <div class="vertical-activity-card__top-wrapper">
    <div class="vertical-activity-card__top">
    <div class="vertical-activity-card__photo">
    <picture>
    <source srcset="{{ url('public/img/'.$item->image2) }}" type="image/webp"> 
    <img src="{{ url('public/img/'.$item->image2) }}" alt="{{$item->namawisata}}">
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
     <!----> 
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
    @endif



<div class="gtco-section">
		<div class="gtco-container">
			<div class="col-md-8 col-md-offset-2 text-center gtco-heading" style="margin-bottom:-10px; ">
        <span data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
        You might also like other destination
      </span>
          <p style="font-size: 17px;">Other travellers also book these tours</p>
        </div>
			<div class="row">
				<div class="col-md-12">
				<div class="col-md-6 ">
					<div class="container">
		</div>
		</div>
</div>
	</div>
</div>
</div>
	<div id="gyg" data-server-rendered="true">
  <div class="main-wrapper  partner-left-layout" data-v-5120f7ad><!----> <!----> <!----> <!----> 
  <a href="#main-content" class="skip-link">Skip to content</a> 
  <main id="main-content">
    <section layout="vertical" class="grid-wrapper container grid-wrapper--list">
@foreach($other as $item)
  <div class="activity-card-block--grid" style="margin-bottom: 7px;">
  <article data-test-id="horizontal-activity-card" class="activity-card horizontal-activity-card companion-inactive activity-card-block__card--grid activity-card-block--desktop" data-v-a1084d9e>
  <a href="{{'/items/'.$item->slug}}" role="contentinfo" target="_blank" rel="noopener" data-activity-id="412877" class="activity-card__container gtm-trigger__card-interaction" data-v-a1084d9e>
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
@endsection



