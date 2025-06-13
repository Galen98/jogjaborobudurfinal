@extends('frontend.fortravel')
@section('content')
<header data-test-id="page-header" class="page-header light" data-v-3a2bcacc style="background-color:#fc2c04;margin-top: 0px;">
<div class="page-header__content" data-v-3a2bcacc >
  <a href="/" data-test-id="page-header-logo" class="page-header__logo-link" data-v-3a2bcacc style="margin-top: 10px;">
  <img src="{{asset('spica')}}/images/logomini.png" alt="logo" height="50" width="100" />
  </a> 

  <nav data-test-id="page-header-nav" class="navigation page-header__navigation light" data-v-3a2bcacc >
  <ul class="navigation__list">
  <li data-test-id="header-navigation-search" class="navigation__list-item-parent item__search">
  <div class="dropdown drops">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" style="background-color:#fc2c04;color: white;border-color:#fc2c04;" >
            @if($sessions == 'Bahasa')
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3 2" width="40px" style="margin-bottom:3px;">
            <path fill="#fff" d="M0 0h3v2H0z"/>
            <path fill="red" d="M0 0h3v1H0z"/>
            <path fill="none" stroke="#fff" stroke-width="0.1" d="M0 0h3v2H0z"/>
          </svg>
            @endif
            @if($sessions == 'English')
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" style="margin-bottom:3px;" viewBox="0 0 7410 3900"><path fill="#b22234" d="M0 0h7410v3900H0z"/><path d="M0 450h7410m0 600H0m0 600h7410m0 600H0m0 600h7410m0 600H0" stroke="#fff" stroke-width="300"/><path fill="#3c3b6e" d="M0 0h2964v2100H0z"/><g fill="#fff"><g id="d"><g id="c"><g id="e"><g id="b"><path id="a" d="M247 90l70.534 217.082-184.66-134.164h228.253L176.466 307.082z"/><use xlink:href="#a" y="420"/><use xlink:href="#a" y="840"/><use xlink:href="#a" y="1260"/></g><use xlink:href="#a" y="1680"/></g><use xlink:href="#b" x="247" y="210"/></g><use xlink:href="#c" x="494"/></g><use xlink:href="#d" x="988"/><use xlink:href="#c" x="1976"/><use xlink:href="#e" x="2470"/></g></svg>
            @endif
            @if($sessions == 'Malay')
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13440 6720" width="40px" style="margin-bottom:3px;"><g transform="scale(480)"><path fill="#fff" d="m0 0h28v14H0z"/><path stroke="#c00" d="m1 .5h27m0 2H1m0 2h27m0 2H1"/><path fill="#006" d="m0 0h14v8.5H0z"/><path stroke="#c00" d="m0 8.5h28m0 2H0m0 2h28"/></g><path fill="#fc0" d="m4200 720 107 732 414-613-222 706 639-373-506 540 738-59-690 267 690 267-738-59 506 540-639-373 222 706-414-613-107 732-107-732-414 613 222-706-639 373 506-540-738 59 690-267-690-267 738 59-506-540 639 373-222-706 414 613zm-600 30a1280 1280 0 1 0 0 2340 1440 1440 0 1 1 0-2340z"/></svg>
            @endif
            </button>
            <div class="dropdown-menu">
              @foreach($bahasa as $item)
              <a class="dropdown-item" href="/change-language/{{$item->bahasa}}">{{$item->bahasa}}</a>
              @endforeach
            </div>
          </div>
  </li> 


  <li data-test-id="header-navigation-search" class="navigation__list-item-parent item__search" style="margin-left:-35px;margin-right:-15px;" >
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
  
  <li tabindex="0" data-test-id="header-navigation-pickers" class="item__dropdown item__dropdown--language js-navigation-language-dropdown d-none d-sm-block">
     <div class="dropdown drops">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" style="background-color:#fc2c04;color: white;border-color:#fc2c04;" >
            @if($sessions == 'Bahasa')
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3 2" width="40px" style="margin-bottom:3px;">
            <path fill="#fff" d="M0 0h3v2H0z"/>
            <path fill="red" d="M0 0h3v1H0z"/>
            <path fill="none" stroke="#fff" stroke-width="0.1" d="M0 0h3v2H0z"/>
          </svg>
            @endif
            @if($sessions == 'English')
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" style="margin-bottom:5px;" viewBox="0 0 7410 3900"><path fill="#b22234" d="M0 0h7410v3900H0z"/><path d="M0 450h7410m0 600H0m0 600h7410m0 600H0m0 600h7410m0 600H0" stroke="#fff" stroke-width="300"/><path fill="#3c3b6e" d="M0 0h2964v2100H0z"/><g fill="#fff"><g id="d"><g id="c"><g id="e"><g id="b"><path id="a" d="M247 90l70.534 217.082-184.66-134.164h228.253L176.466 307.082z"/><use xlink:href="#a" y="420"/><use xlink:href="#a" y="840"/><use xlink:href="#a" y="1260"/></g><use xlink:href="#a" y="1680"/></g><use xlink:href="#b" x="247" y="210"/></g><use xlink:href="#c" x="494"/></g><use xlink:href="#d" x="988"/><use xlink:href="#c" x="1976"/><use xlink:href="#e" x="2470"/></g></svg>
            @endif
            @if($sessions == 'Malay')
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13440 6720" width="40px" style="margin-bottom:5px;"><g transform="scale(480)"><path fill="#fff" d="m0 0h28v14H0z"/><path stroke="#c00" d="m1 .5h27m0 2H1m0 2h27m0 2H1"/><path fill="#006" d="m0 0h14v8.5H0z"/><path stroke="#c00" d="m0 8.5h28m0 2H0m0 2h28"/></g><path fill="#fc0" d="m4200 720 107 732 414-613-222 706 639-373-506 540 738-59-690 267 690 267-738-59 506 540-639-373 222 706-414-613-107 732-107-732-414 613 222-706-639 373 506-540-738 59 690-267-690-267 738 59-506-540 639 373-222-706 414 613zm-600 30a1280 1280 0 1 0 0 2340 1440 1440 0 1 1 0-2340z"/></svg>
            @endif
            </button>
            <div class="dropdown-menu">
              @foreach($bahasa as $item)
              <a class="dropdown-item" href="/change-language/{{$item->bahasa}}">{{$item->bahasa}}</a>
              @endforeach
            </div>
          </div>
  </li> 

  <li tabindex="0" data-test-id="header-navigation-pickers" class="item__dropdown item__dropdown--language js-navigation-language-dropdown d-none d-sm-block" style="margin-left:-36px; ">
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

  <li tabindex="0" data-test-id="header-navigation-pickers" class="item__dropdown item__dropdown--language js-navigation-language-dropdown d-none d-sm-block" style="margin-left:-36px; ">
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
    </header> 


      <div id="gyg" data-server-rendered="true" style="margin-top:-21px;">
    <section id="activity-page" data-test-id="activity-page">
    <div class="main-wrapper  partner-left-layout">
  <main id="main-content">
  <aside role="cart-expiration-notification" class="cart-expiration-notification" style="display:none;"></aside> 
  <section class="activity__container js-activity" data-v-c4be1764>
  <section class="container" data-v-c4be1764>
  <section class="activity__breadcrumbs" data-v-c4be1764>
  <ul itemscope="itemscope" itemtype="https://schema.org/BreadcrumbList" class="activity-breadcrumbs" data-v-2833ce42 data-v-c4be1764>
  <li itemprop="itemListElement" itemtype="https://schema.org/ListItem" itemscope="itemscope" class="activity-breadcrumbs__item" data-v-2833ce42>
 <span itemprop="name" data-v-2833ce42><a href="/" style="color:grey;">Home</a></span>
 <meta itemprop="position" content="1" />
  </li> 
  @foreach($province as $index => $item)
  <li itemprop="itemListElement" itemtype="https://schema.org/ListItem" itemscope="itemscope" class="activity-breadcrumbs__item" data-v-2833ce42>
 <span itemprop="name" data-v-2833ce42><a href="/location/{{$item->slugprovince}}/{{$item->id}}" style="color:grey;">{{$item->namaprovince}}</a></span>
 <meta itemprop="position" content="{{ $index + 2 }}" />
  </li> 
  @endforeach 
  @foreach($region as $index => $item)
  <li itemprop="itemListElement" itemtype="https://schema.org/ListItem" itemscope="itemscope" class="activity-breadcrumbs__item" data-v-2833ce42>
 <span itemprop="name" data-v-2833ce42><a href="/city/{{$item->slugregion}}" style="color:grey;">{{$item->namaregion}}</a></span>
 <meta itemprop="position" content="{{ $index + count($province) + 2 }}" />
  </li> 
  @endforeach 
  <li itemprop="itemListElement" itemtype="https://schema.org/ListItem" itemscope="itemscope" class="activity-breadcrumbs__item" data-v-2833ce42>
  @foreach($destinasi as $index => $item)<span itemprop="name" data-v-2833ce42>
  <a href="{{'/category-destination/' .$item->id}}" style="color:grey;">{{$item->destination}}</a>
  </span>
  <meta itemprop="position" content="{{ $index + count($province) + count($region) + 2 }}" />
  @endforeach 
  </li> 
  </ul>
</section> 
  
  <section class="activity__today-tomorrow-badge-container" data-v-c4be1764></section> 
  <section class="activity__header" data-v-c4be1764><div class="activity__header--column" data-v-c4be1764>
  <h1 data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
  @foreach($travel as $item) {{$item->namawisata}} @endforeach
    </h1> 
  <div class="activity__header" data-v-c4be1764>
  <div data-track="activity-rating" data-test-id="activity-rating" class="activity__rating--container" data-v-c4be1764>
  <div class="activity__rating">
  <div class="rating-star">
  <div class="" style="margin-top: 4px;">
              <div class="small-ratings" style="font-size:17px;">
              @php
            $rating = $jumlahrating;
            $fullStars = floor($rating);
            $halfStar = ceil($rating - $fullStars);
            $emptyStars = 5 - ($fullStars + $halfStar);
        @endphp
        @for ($i = 1; $i <= $fullStars; $i++)
            <i class="fa fa-star rating-color"></i>
        @endfor
        @if ($halfStar)
        <i class="fa fa-star-half rating-color"></i>
        @endif
        @for ($i = 1; $i <= $emptyStars; $i++)
            <!-- <i class="fa fa-star rating-color" style="color:grey !important;"></i> -->
        @endfor
        @if($rating == 0)
        @for ($i = 1; $i <= 5; $i++)
            <i class="fa fa-star rating-color" style="color:grey !important;"></i>
        @endfor
        @endif
        </div>
        </div>
        </div>
      <span class="gtm-trigger__adp-total-reviews-btn" style="margin-left:5px;">
      ({!! number_format($jumlahrating, 1) !!})
      </span> 
  <p class="activity__rating--totals" style="margin-top: 8px;">
   {!! $jumlahreview !!} Review
    </p>
  <p class="activity__rating--count" >
    @foreach($travel as $item)
      <img src="{{asset('traveler')}}/images/duration.png" width="20" height="20" style="margin-top:10px;"> <p style="margin-top: 10px;">Duration: {{$item->durasi}}</p>  
      @endforeach
  </p>
  </div>
</div> 
  <section class="activity__supplier-info activity__supplier-info--large" data-v-c4be1764>
  <div data-test-id="activity-provider" class="supplier-name" data-v-5db601b6 data-v-c4be1764>
  <span class="visibility-pixel" data-v-c68e7552 data-v-5db601b6></span> 
  <small class="supplier-name__label" data-v-5db601b6>
   
    </small>
  </div>
</section>
</div>
</div>
  </section> 
  <section data-track="activity-header" data-test-id="activity-photo-gallery" class="activity__row activity__photo-gallery" data-v-c4be1764>
  <div data-v-e0177802 data-v-c4be1764>
  <div class="photo-gallery photo-gallery--has-collage" data-v-e0177802>
  <div class="photo-gallery__blur-outer">
  <div class="photo-gallery__blur-inner">
    @foreach($travel as $item)
  <div class="photo-gallery__blur-image" style="background-image:url({{('public/img/'.$item->image) }});"></div></div></div> 
  <section class="photo-gallery-slider">
  <div draggable="false" class="gyg-slider" style="--scroll-snap-stop:always;--slide-width:100%;--slides-per-view:1;"> 
  <section id="gyg-slider__aria-6571975" aria-roledescription="carousel" class="gyg-slider__content">
    
  <div id="slide-0" data-slide-id="0" aria-labelledby="slide-button-0" aria-roledescription="slide" class="gyg-slide photo-gallery-slider__slide">
  <picture class="no-lazy-loading">
  <source srcset="{{ url('public/img/'.$item->image) }}" media="(max-width: 767px)"> 
  <source srcset="{{ url('public/img/'.$item->image) }}" media="(min-width: 768px) and (max-width: 1199px)"> 
  <source srcset="{{ url('public/img/'.$item->image) }}" media="(min-width: 1200px)"> 
  <img alt="{{$item->slug}}" loading="lazy" src="{{ url('public/img/'.$item->image) }}" class="photo-gallery-slider__slide-image photo-gallery-slider__slide-image--contain" style="object-position:center;">
  </picture>
  </div>
  @endforeach

  @foreach($travel as $item)
  <div id="slide-1" data-slide-id="1" aria-labelledby="slide-button-1" aria-roledescription="slide" class="gyg-slide photo-gallery-slider__slide">
  <picture style="object-position:center;">
  <source data-srcset="{{ url('public/img/'.$item->image2) }}" media="(max-width: 767px)" class="vanilla-lazy-loaded-image">
  <source data-srcset="{{ url('public/img/'.$item->image2) }}" media="(min-width: 768px) and (max-width: 1199px)" class="vanilla-lazy-loaded-image">
  <source data-srcset="{{ url('public/img/'.$item->image2) }}" media="(min-width: 1200px)" class="vanilla-lazy-loaded-image"> 
  <img alt="{{$item->slug}}" data-src="{{ url('public/img/'.$item->image2) }}" src="{{ url('public/img/'.$item->image2) }}" title="" class="vanilla-lazy-loaded-image photo-gallery-slider__slide-image--contain photo-gallery-slider__slide-image"></picture></div>
  @endforeach

  @foreach($travel as $item)
  <div id="slide-2" data-slide-id="2" aria-labelledby="slide-button-2" aria-roledescription="slide" class="gyg-slide photo-gallery-slider__slide">
  <picture style="object-position:center;">
  <source data-srcset="{{ url('public/img/'.$item->image3) }}" media="(max-width: 767px)" class="vanilla-lazy-loaded-image">
  <source data-srcset="{{ url('public/img/'.$item->image3) }}" media="(min-width: 768px) and (max-width: 1199px)" class="vanilla-lazy-loaded-image">
  <source data-srcset="{{ url('public/img/'.$item->image3) }}" media="(min-width: 1200px)" class="vanilla-lazy-loaded-image"> 
  <img alt="{{$item->slug}}" data-src="{{ url('public/img/'.$item->image3) }}" src="{{ url('public/img/'.$item->image3) }}" title="" class="vanilla-lazy-loaded-image photo-gallery-slider__slide-image--contain photo-gallery-slider__slide-image"></picture></div>
  @endforeach

  @foreach($travel as $item)
  <div id="slide-3" data-slide-id="3" aria-labelledby="slide-button-3" aria-roledescription="slide" class="gyg-slide photo-gallery-slider__slide"><picture style="object-position:center;"><source data-srcset="{{ url('public/img/'.$item->image4) }}" media="(max-width: 767px)" class="vanilla-lazy-loaded-image"><source data-srcset="{{ url('public/img/'.$item->image4) }}" media="(min-width: 768px) and (max-width: 1199px)" class="vanilla-lazy-loaded-image">
    <source data-srcset="{{ url('public/img/'.$item->image4) }}" media="(min-width: 1200px)" class="vanilla-lazy-loaded-image"> 
      <img alt="{{$item->slug}}" data-src="{{ url('public/img/'.$item->image4) }}" src="{{ url('public/img/'.$item->image4) }}" title="" class="vanilla-lazy-loaded-image photo-gallery-slider__slide-image--contain photo-gallery-slider__slide-image"></picture></div>
  @endforeach

  @foreach($travel as $item)
  <div id="slide-4" data-slide-id="4" aria-labelledby="slide-button-4" aria-roledescription="slide" class="gyg-slide photo-gallery-slider__slide">
    <picture style="object-position:center;">
    <source data-srcset="{{ url('public/img/'.$item->image5) }}" media="(max-width: 767px)" class="vanilla-lazy-loaded-image">
    <source data-srcset="{{ url('public/img/'.$item->image5) }}" media="(min-width: 768px) and (max-width: 1199px)" class="vanilla-lazy-loaded-image">
    <source data-srcset="{{ url('public/img/'.$item->image5) }}" media="(min-width: 1200px)" class="vanilla-lazy-loaded-image"> 
    <img alt="{{$item->slug}}" data-src="{{ url('public/img/'.$item->image5) }}" src="{{ url('public/img/'.$item->image5) }}" title="" class="vanilla-lazy-loaded-image photo-gallery-slider__slide-image--contain photo-gallery-slider__slide-image"></picture></div>
    @endforeach


  <button aria-label="Previous Slide" aria-controls="gyg-slider__aria-6284019" data-test-id="gyg-slider-previous" class="gyg-slider__arrow gyg-slider__arrow--left" style="display:;">
  <span class="photo-gallery__button-prev gtm-trigger__adp-gallery-interaction"></span></button> 
  <button aria-label="Next Slide" aria-controls="gyg-slider__aria-6284019" data-test-id="gyg-slider-next" class="gyg-slider__arrow gyg-slider__arrow--right" style="display:;">
  <span class="photo-gallery__button-next gtm-trigger__adp-gallery-interaction"></span></button>   
  <div class="gyg-slider__header">
  <ul role="list" class="gyg-slider__bullets"></ul></div>
  </div> 
  </section> 

  <div class="photo-collage photo-gallery-collage">
  @foreach($travel as $item)
  <picture class="photo-collage__image photo-collage__image--0">
    <source srcset="data:image/gif;base64, R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" media="(max-width: 767px)"> 
    <a href="{{ url('public/img/'.$item->image) }}" data-lightbox="mygallery" data-title="">
  <img src="{{ url('public/img/'.$item->image) }}" loading="lazy" class="photo-collage__image-source" alt="{{$item->slug}}">
</a></picture>

  <picture class="photo-collage__image photo-collage__image--1">
  <source srcset="data:image/gif;base64, R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" media="(max-width: 767px)">
  <a href="{{ url('public/img/'.$item->image2) }}" data-lightbox="mygallery" data-title=""> 
  <img src="{{ url('public/img/'.$item->image2) }}" loading="lazy" class="photo-collage__image-source" alt="{{$item->slug}}">
</a></picture>

  <picture class="photo-collage__image photo-collage__image--2"><source srcset="data:image/gif;base64, R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" media="(max-width: 767px)">
  <a href="{{ url('public/img/'.$item->image3) }}" data-lightbox="mygallery" data-title=""> 
  <img src="{{ url('public/img/'.$item->image3) }}" loading="lazy" class="photo-collage__image-source" alt="{{$item->slug}}">
</a></picture>
  <picture class="photo-collage__image photo-collage__image--3"><source srcset="data:image/gif;base64, R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" media="(max-width: 767px)">
  <a href="{{ url('public/img/'.$item->image4) }}" data-lightbox="mygallery" data-title=""> 
  <img src="{{ url('public/img/'.$item->image4) }}" loading="lazy" class="photo-collage__image-source" alt="{{$item->slug}}">
</a></picture>

<picture class="photo-collage__image photo-collage__image--3">
  <source srcset="data:image/gif;base64, R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" media="(max-width: 767px)">
  <a href="{{ url('public/img/'.$item->image5) }}" data-lightbox="mygallery" data-title=""> 
  <img src="{{ url('public/img/'.$item->image5) }}" loading="lazy" class="photo-collage__image-source" alt="{{$item->slug}}">
</a></picture>
  @endforeach 
  <button class="photo-collage__show-all">
      Click to see all images
    </button></div>
  <div class="photo-gallery__overlay"> 
  </div> 
  </div> 
</div>
</section> 

    <section class="activity__mobile-header" data-v-c4be1764 style="margin-top:10px;margin-bottom:10px;">
    <ul class="breadscrumb-custom-horizontal-list">
  @foreach($province as $item)
 <li itemprop="itemListElement" itemtype="https://schema.org/ListItem" itemscope="itemscope" class="activity-breadcrumbs__item" data-v-2833ce42><a href="/location/{{$item->slugprovince}}/{{$item->id}}" style="color:#233351;">{{$item->namaprovince}}</a></li> 
  @endforeach
  @foreach($region as $item)
  <li itemprop="itemListElement" itemtype="https://schema.org/ListItem" itemscope="itemscope" class="activity-breadcrumbs__item" data-v-2833ce42><a href="{{'/city/' .$item->slugregion}}" style="color:#233351;">{{$item->namaregion}}</a></li>
  @endforeach
  @foreach($destinasi as $item)
  <li itemprop="itemListElement" itemtype="https://schema.org/ListItem" itemscope="itemscope" class="activity-breadcrumbs__item" data-v-2833ce42><a href="{{'/category-destination/' .$item->id}}" style="color:#233351;">{{$item->destination}}</a></li>
  @endforeach
</ul>
</section>

     @foreach($travel as $item)
    <section class="activity__mobile-header" data-v-c4be1764>
  <section data-v-c4be1764 style="margin-bottom:-25px;">
  <p data-test-id="collection-title" class="collection-header_title" data-v-76e871e0 style="font-size:22px;">
      {{$item->namawisata}}
</p> 
  <div data-test-id="activity-provider" class="supplier-name" data-v-5db601b6 data-v-c4be1764>
  <span class="visibility-pixel" data-v-c68e7552 data-v-5db601b6><p style="font-size:9pt;">Duration: {{$item->durasi}}</p></span>
  <br>
  <span style="font-weight:bolder;">Why Book With Us?</span><br>
    <span><i style="color: green;font-weight: bold;" class="ti-check"></i> We are a local business</span><br>
    <span><i style="color: green;font-weight: bold;" class="ti-check"></i> Provide real price</span><br>
    <span><i style="color: green;font-weight: bold;" class="ti-check"></i> No portal commision</span><br>
    <span><i style="color: green;font-weight: bold;" class="ti-check"></i> Instant confirmation</span><br>
  <small class="supplier-name__label" data-v-5db601b6>
    </small>
  </div> @endforeach
  <!-- <div data-track="activity-rating" class="activity__row activity__rating activity__rating--mobile" data-v-c4be1764>
    <div class="rating-star">
  
  </div> 
  <p class="activity__rating--totals">
  </p> 
  <p class="activity__rating--count">
  <span class="gtm-trigger__adp-total-reviews-btn">
      
    </span></p>
  </div> -->
  </section> 
  <section class="activity__price activity__price--mobile" data-v-46d2d245 data-v-c4be1764>
  <div data-test-id="activity-price-block" class="price-block price-block--has-price price-block--persuation-badge" data-v-46d2d245>
  
  @foreach($travel as $item)
  <section class="price-block__persuation-badge-container" data-v-46d2d245>
    @if($item->label == 'Bestseller')
    <span data-test-id="price-block-is-likely-to-sell-out" class="price-block__persuation-badge c-marketplace-badge c-marketplace-badge--primary persuasion-badge--LTSO persuasion-badge--size-R" data-v-46d2d245 style="color: green;">
      Bestseller
    </span>
    @elseif($item->label == 'Likely to sell out')
    <span data-test-id="price-block-is-likely-to-sell-out" class="price-block__persuation-badge c-marketplace-badge c-marketplace-badge--primary persuasion-badge--LTSO persuasion-badge--size-R" data-v-46d2d245>
      Likely to sell out
    </span>@else<span></span>@endif</section> @endforeach
  
  <div data-test-id="activity-price-block" class="price-block-display-price-wrapper" data-v-46d2d245>
  <p class="price-block-display-price" data-v-46d2d245><span class="price-block__from">From        
  </span>
  @if($item->discount == 'yes' && $session == 'IDR')
  <strong class="price-block__price-actual "> <span style="font-size:16px;text-decoration: line-through;color: red;font-weight:bolder;">@currency($item->IDR_awal)</span> </strong>
          @endif
          @if($item->discount == 'yes' && $session == 'EUR')
          <strong class="price-block__price-actual "><span style="font-size:18px;text-decoration: line-through;color: red;font-weight:bolder;"> € {{ number_format(($item->IDR_awal / $rateIDR) * $rateEUR, 0, ',', '.') }}</span> </strong>  
          @endif
          @if($item->discount == 'yes' && $session == 'USD')
          <strong class="price-block__price-actual "><span style="font-size:18px;text-decoration: line-through;color: red;font-weight:bolder;">US$ {{number_format ($item->IDR_awal/$rateIDR,1)}}</span></strong>    
          @endif
          @if($item->discount == 'yes' && $session == 'MYR')
          <strong class="price-block__price-actual "><span style="font-size:18px;text-decoration: line-through;color: red;font-weight:bolder;">MYR {{ number_format(($item->IDR_awal / $rateIDR) * $rateMYR, 0, ',', '.') }}</span></strong> 
          @endif
          @if($item->discount == 'yes' && $session == 'SGD')
          <strong class="price-block__price-actual "><span style="font-size:18px;text-decoration: line-through;color: red;font-weight:bolder;">SGD {{ number_format(($item->IDR_awal / $rateIDR) * $rateSGD, 0, ',', '.') }}</span></strong>   
          @endif

      @if($session == 'USD') 
      <strong class="price-block__price-actual "> <span>US$ {{number_format ($item->IDR/$rateIDR,1)}} </span> </strong>
      @endif 

      @if($session == 'IDR') 
      <strong class="price-block__price-actual "> <span style="font-size:18px;">@currency($item->IDR)</span> </strong>
      @endif 

      @if($session == 'MYR') 
      <strong class="price-block__price-actual "> <span>MYR {{ number_format(($item->IDR / $rateIDR) * $rateMYR, 0, ',', '.') }}</span> </strong>
      @endif

      @if($session == 'SGD') 
      <strong class="price-block__price-actual "> <span>SGD {{ number_format(($item->IDR / $rateIDR) * $rateSGD, 0, ',', '.') }}</span> </strong>
      @endif

      @if($session == 'EUR') 
      <strong class="price-block__price-actual "> <span>€ {{ number_format(($item->IDR / $rateIDR) * $rateEUR, 0, ',', '.') }}</span> </strong>
      @endif   
    @foreach($travel as $item)<span class="price-block__explanation" style="margin-left:38px;">@if($item->kategories == 'Per Person'){{$item->kategories}}@endif</span>@endforeach
    @foreach($travel as $item)<span class="price-block__explanation">@if($item->kategories == 'Per Group'){{$item->kategories}} up to {{$item->capacity}} @endif</span>@endforeach<br/>
    </p> 
    </div>
  </div>
  </section>
</section>   
    <br>  
    <section class="activity__row activity__content" data-v-c4be1764>
    <div class="activity__container-columns" data-v-c4be1764>
    <div id="overview" class="activity__container-columns--main js-section-content" data-v-c4be1764>
    <div data-track="overview" data-v-c4be1764>
    <section id="activity-overview" data-component="overview" class="activity-overview" data-v-bc99966e data-v-c4be1764 style="margin-top:-20px;">
    <p data-test-id="activity-overview-content" class="activity-overview__content" data-v-bc99966e>
        {{$item->shortdescription}}
      </p>
    </section>
  </div> 
    <div data-track="key-details" data-v-c4be1764>
    <section id="key-details" data-component="key-details" data-test-id="activity-key-details" class="activity-key-details js-section-content" data-v-4a3743c6 data-v-c4be1764>
    <p style="font-size: 24px;font-weight: bolder;margin-top: 15px;">About this tour </p>
    <p style="font-size: 20px;font-weight: bolder;margin-top: 15px;">Highlights </p>
     <br>
     <ul data-test-id="activity-highlights" class="activity-highlights__list" data-v-5234723c>
    @foreach($highlight as $item)
    <li class="activity-highlights__list-item" data-v-5234723c> 
    {{$item->highlight}}</li>
    @endforeach
    </ul>
     <br>
     <br>
    <section class="activity-key-details__container" data-v-4a3743c6>
  
    @foreach($travel as $item)
    @if($item->pickup == 'yes')
    <dl class="activity-key-details__list" data-v-4a3743c6>
    <div data-v-4a3743c6>
    <dt class="activity-key-details__term" data-v-4a3743c6><span class="activity-key-details__term-icon" data-v-4a3743c6>
    <span aria-label="Free cancellation" class="c-icon activity-key-details__icon" data-v-4a3743c6>
    <span data-v-4a3743c6>
    <img src="{{asset('traveler')}}/images/pickup.png" width="27" height="27">
    </span> 
    </span>
    </span> 
    <span data-v-4a3743c6 style="font-size: 20px;">Pickup included</span>
    </dt> 
    <dd class="activity-key-details__description" data-v-4a3743c6 style="
    font-size: 17px;">
        {{$item->wherepickup}}
        </dd></div>
    </dl>
    @else
    <p></p>
    @endif
  </section>
</section>
</div>

          <section class="activity-swap-columns" data-v-c4be1764 style="border-top: solid;border-top-color: #e6e8eb;border-top-width: 1pt;">
          <div class="overlay" data-v-c4be1764>
          <div id="activity-experience" class="activity-experience js-section-content" data-v-d21396c2 data-v-c4be1764 style="">
            <p style="font-size: 20px;font-weight: bolder;margin-top: 15px;">Full Description </p>
            <br>
            <p style="font-size: 16px;">{!! $item->deskripsi_english !!}</p>
            </div>
          </div>

    <div data-track="booking-assistant" id="books" data-v-c4be1764>
    <section id="booking-assistant" data-test-id="booking-assistant" data-v-a17e5250 data-v-c4be1764>
    <div is-date-selected="" class="booking-assistant-configurator booking-assistant" data-v-dd428772 data-v-a17e5250 style="background-color: #de1709;">
    <h2 class="booking-assistant-configurator__header" data-v-dd428772 style="font-size:20px;"><i class="ti-user" style="font-size: 20px;color: white;"></i> Select participants and date</h2> 

<section data-test-id="activity-filters-primary-date-picker" class="ba-dropdown ba-date-picker ba-date-picker--multiple-months ba-date-picker--experimental-theme" data-v-0605f8ac data-v-dd428772>
@if($item->status == 0)
<input type="text" name="traveldate" id="date-start" class="form-control" style="background-color: white;" placeholder="Not available" data-code="date-start" required readonly disabled>
@else
<input type="text" name="traveldate" id="date-start" class="form-control" style="background-color: white;" placeholder="Select date" data-code="date-start" required readonly>
@endif
    </section>
    <section data-test-id="activity-filters-primary-people-picker" class="ba-dropdown people-picker " data-v-0605f8ac data-v-7e630b00 data-v-dd428772>


<div class="form-control form-control-participants">
@if($item->status == 0)
<div class="text d-flex align-items-center" 
style="margin-top:5px;height:46px;margin-right:-20px;margin-left:-17px;margin-top:-8px;">
<i class="fas fa-user-friends flex-shrink-0 mr-2 ml-2"></i> Not available
<div class="participant-label-span text-truncate"></div>
</div>
@else
<div class="text d-flex align-items-center participants-control" 
style="margin-top:5px;height:46px;margin-right:-20px;margin-left:-17px;margin-top:-8px;">
<i class="fas fa-user-friends flex-shrink-0 mr-2 ml-2"></i>
<div class="participant-label-span text-truncate"></div>
</div>
@endif

<div id="persontoogle" class="participants-input-container  bg-light" style="display: none; z-index: 1;padding:10px;">
@if($item->kategories == 'Per Person')
<div class="d-flex justify-content-between align-items-center my-1">
<div>
<h6>Adults</h6>
</div>

<input type="text" id="adult" class="adults" value="0" name="adultquantity" data-min="0" data-code="adults" required readonly/>
</div>
@else
<div class="d-flex justify-content-between align-items-center my-1">
<div>
<h6>Group</h6>
</div>
<input type="text" id="group" value="0" name="groupquantity" data-min="0" data-code="participants" readonly/>
</div>
@endif
<!-- @if($item->child == 'yes')
<div class="d-flex justify-content-between align-items-center my-1">
<div>
<h6>Children</h6>
</div>
<input type="text" id="child" value="0" name="childquantity" data-min="0" data-code="children" />
</div>
</div>
</div>
@else
<p></p>
@endif -->
@if(count($childoption) > 0 && ($item->kategories == 'Per Person'))
<div class="d-flex justify-content-between align-items-center my-1">
<div>
<h6>Children</h6>
</div>
<input type="text" id="child" value="0" name="childquantity" data-min="0" data-code="children" readonly/>
</div>
</div>
</div>
@else
<p></p>
@endif
  </section>
  @foreach($travel as $item)
  @if($item->status == 0)
  <button type="button" id="cekharga" class="cekharga js-check-availability gtm-trigger__adp-check-availability-btn avoid-close-dropdown-on-click c-button c-button--medium filbtn" data-v-dd428772>
  Not available
  </button>
  @else
  <button type="button" id="cekharga" class="cekharga p-1 js-check-availability gtm-trigger__adp-check-availability-btn avoid-close-dropdown-on-click 
  c-button c-button--medium filbtn" data-v-dd428772>
  Check availability
  </button>
  @endif
  @endforeach
</div>
</section>

<div><p id="alerts"></p></div>
  @foreach($pilihan as $p)
  <section id="booking-assistant" data-test-id="booking-assistant" data-v-a17e5250 data-v-c4be1764 >
    <form action="{{'/booking/' .$p->id}}" method="GET" enctype="multipart/form-data" id="{{$p->id}}">
        @csrf
      @foreach($travel as $item) <input type="hidden" name="paketwisata" value="{{$item->namawisata}}">@endforeach
        <input type="hidden" name="idtravel" value="{{$p->wisata_id}}">
        <input type="hidden" name="review" value="{!! $jumlahreview !!}"> 
      <input type="hidden" name="idoption" value="{{$p->id}}">
      <input type="hidden" name="namawisata" value="{{$p->judulsub}}">
    <div is-date-selected="" class="booking-assistant-configurator booking-assistant" data-v-dd428772 data-v-a17e5250 style="background-color: white;border-width: 1px;border-style: solid;border-color: #b80404;border-radius: 10px 10px 10px 10px;" 
    id="totals{{$p->id}}">
      <input type="hidden" name="subid" id="subid{{$p->id}}" value="{{$p->id}}">
    <h2 class="booking-assistant-configurator__header" data-v-dd428772 style="font-weight: bolder;color:#182c4c;text-align:left;"> {{$p->judulsub}}</h2>
    <h3 class="booking-assistant-configurator__header" data-v-dd428772  style="font-size:14px;font-weight: bolder;color:grey;margin-right: 10px;text-align:left;">{{$p->short}}</h3>
    <br>
    @if($p->status == true)
    <h3 class="booking-assistant-configurator__header" data-v-dd428772 style="font-size:15px;font-weight: bolder;color:#182c4c;text-align:left;">Select a starting time:
     <select id="waktu_{{$p->id}}" name="waktu" style="font-size:15px;width: 180px;border-radius: 10px 10px 10px 10px;" required>
        @foreach($p->waktu as $w)
        <option value="{{ Carbon\Carbon::parse($w->time)->format('g:i A') }}" data-id = "{{ $w->id }}" required>{{ Carbon\Carbon::parse($w->time)->format('g:i A') }}
        </option>
        @endforeach
    </select>
    </h3>
    <input type="hidden" name="" id="id_waktu_{{$p->id}}">

    <h2 class="booking-assistant-configurator__header" data-v-dd428772 style="color: #182c4c;font-size:15px;text-align:left;" id="tanggal{{$p->id}}"></h2>
    <input type="hidden" name="tanggaltravel" class="tanggalx" id="tanggaltravel{{$p->id}}">

    <section data-test-id="activity-filters-primary-people-picker" class="ba-dropdown people-picker" data-v-0605f8ac data-v-7e630b00 data-v-dd428772>
      <h3 class="booking-assistant-configurator__header" data-v-dd428772 style="font-size:16px;font-weight: bolder;color:#182c4c;text-align:left;" id="jumlahdewasa{{$p->id}}"></h3>
      <input type="hidden" name="dewasa" id="dewasa{{$p->id}}">
      <h3 class="booking-assistant-configurator__header" data-v-dd428772 style="font-size:16px;font-weight: bolder;color:#182c4c;text-align:left;" id="jumlahgroup{{$p->id}}"></h3>
      <input type="hidden" name="groupe" id="groupe{{$p->id}}">
      <h3 class="booking-assistant-configurator__header" data-v-dd428772 style="font-size:16px;font-weight: bolder;color:#182c4c;text-align:left;" id="jumlahchild{{$p->id}}"></h3>
      <input type="hidden" name="anak" id="anak{{$p->id}}">
    </section>
   
    <section data-test-id="activity-filters-primary-people-picker" class="ba-dropdown people-picker" data-v-0605f8ac data-v-7e630b00 data-v-dd428772>
      <!-- <h3 style="font-size:16px;font-weight: bolder;color:#182c4c;text-align:left;margin-left:15px;" id="hargadewasa{{$p->id}}"></h3> -->
      <!-- <h3 style="font-size:16px;font-weight: bolder;color:#182c4c;margin-left:15px;" id="hargagroup{{$p->id}}"></h3> -->
      <!-- <h3 style="font-size:16px;font-weight: bolder;color:#182c4c;margin-left:15px;" id="hargachild{{$p->id}}"></h3> -->
    </section>
    <section data-test-id="activity-filters-primary-date-picker" class="ba-dropdown ba-date-picker ba-date-picker--multiple-months ba-date-picker--experimental-theme" data-v-0605f8ac data-v-dd428772>
    <!-- <h3 class="booking-assistant-configurator__header" data-v-dd428772 style="font-size:17px;font-weight: bolder;color:#182c4c;text-align:left;">Total:</h3> -->
      <h3 class="booking-assistant-configurator__header" data-v-dd428772 style="font-size:17px;font-weight: bolder;color:#182c4c;text-align:left;" id="harga{{$p->id}}"></h3>
      <h3 class="booking-assistant-configurator__header" data-v-dd428772 style="font-size:17px;font-weight: bolder;color:#182c4c;text-align:left;" id="totalgroup{{$p->id}}"></h3>
      <input type="hidden" name="totharga" id="totharga{{$p->id}}">
      <input type="hidden" name="amount" id="amount{{$p->id}}">
      @if($session == 'IDR')
      <input type="hidden" name="currency" id="" value="USD">
      @elseif($session == 'MYR')
      <input type="hidden" name="currency" id="" value="USD">
      @else
      <input type="hidden" name="currency" id="" value="{{$session}}">
      @endif
      <input type="hidden" name="totharganoconvert" id="totharganoconvert{{$p->id}}">
      <input type="hidden" name="tothargagroup" id="tothargagroup{{$p->id}}">
      <input type="hidden" name="tothargagroupnoconvert" id="tothargagroupnoconvert{{$p->id}}">
    </section>
    @endif
    @if($p->status == true)
  <button type="submit" id="bookx" class="btnbook{{$p->id}} p-1 js-check-availability gtm-trigger__adp-check-availability-btn avoid-close-dropdown-on-click c-button c-button--medium filbtn" data-v-dd428772>  
    <p id="bookbtn{{$p->id}}">Book now</p>
    <div id="spiners{{$p->id}}" style="display:none;" class="spinner-border text-white"></div>
  </button>
  @else 
  <h2>This option is not available</h2>
  @endif
  </form>
    </div>
  </section>
  @endforeach
</div>

          </section>
          @endforeach
          <section class="activity-swap-columns" data-v-c4be1764 style="border-top: solid;border-top-color: #e6e8eb;border-top-width: 1pt;">
          <div class="overlay" data-v-c4be1764>
          <div id="activity-experience" class="activity-experience js-section-content" data-v-d21396c2 data-v-c4be1764 style="">
            <p style="font-size: 20px;font-weight: bolder;margin-top: 15px;">Include </p>
            <br>
            <ul style="font-size: 17px;">
              @foreach($includes as $item)
                  <li><i style="color: green;" class="ti-check"></i> {{$item->include}}</li>
                  @endforeach
            </ul>
            </div></div>
          </section>

          <section class="activity-swap-columns" data-v-c4be1764 style="border-top: solid;border-top-color: #e6e8eb;border-top-width: 1pt;">
         <div class="overlay" data-v-c4be1764>
          <div id="activity-experience" class="activity-experience js-section-content" data-v-d21396c2 data-v-c4be1764 style="">
            <p style="font-size: 20px;font-weight: bolder;margin-top: 15px;">Exclude </p>
            <br>
            <ul style="font-size: 17px;">
              @foreach($excludes as $item)
                  <li><i style="color: red;" class="ti-close"></i> {{$item->exclude}}</li>
                  @endforeach
            </ul>
            </div></div>
          </section>

          <section class="activity-swap-columns" data-v-c4be1764 style="border-top: solid;border-top-color: #e6e8eb;border-top-width: 1pt;">
         <div class="overlay" data-v-c4be1764>
          <div id="activity-experience" class="activity-experience js-section-content" data-v-d21396c2 data-v-c4be1764 style="">
            <p style="font-size: 20px;font-weight: bolder;margin-top: 15px;">Important information </p>
            <br>
            <ul data-test-id="activity-highlights" class="activity-highlights__list" data-v-5234723c>
                  @foreach($important as $item)
                  <li class="activity-highlights__list-item" data-v-5234723c> {{$item->importantinformation}}</li>
                  @endforeach
                </ul>
            </div></div>
          </section>
            
            </div> 
            @foreach($travel as $item)
          <aside class="activity__container-columns--side" data-v-c4be1764>
          <section class="activity__price" data-v-46d2d245 data-v-c4be1764>
          <div data-test-id="activity-price-block" class="price-block price-block--has-price price-block--persuation-badge" data-v-46d2d245>
          <section class="price-block__persuation-badge-container" data-v-46d2d245>
            @if($item->label == 'Bestseller')
          <span data-test-id="price-block-is-likely-to-sell-out" class="price-block__persuation-badge c-marketplace-badge c-marketplace-badge--primary persuasion-badge--LTSO persuasion-badge--size-R" data-v-46d2d245 style="background-color: green;">
  Bestseller
</span>
@elseif($item->label == 'Likely to sell out')
<span data-test-id="price-block-is-likely-to-sell-out" class="price-block__persuation-badge c-marketplace-badge c-marketplace-badge--primary persuasion-badge--LTSO persuasion-badge--size-R" data-v-46d2d245>
  Likely to sell out
</span>
@else<span></span>@endif
 </section> 
          <div data-test-id="activity-price-block" class="price-block-display-price-wrapper" data-v-46d2d245>
          <p class="price-block-display-price" data-v-46d2d245><span class="price-block__from">From @if($item->discount == 'yes' && $session == 'USD')
          <span style="font-size:16px;text-decoration: line-through;color: red;font-weight:bolder;">US$ {{number_format ($item->IDR_awal/$rateIDR,1)}}</span>    
          @endif
          @if($item->discount == 'yes' && $session == 'IDR')
          <span style="font-size:16px;text-decoration: line-through;color: red;font-weight:bolder;">@currency($item->IDR_awal)</span>  
          @endif
          @if($item->discount == 'yes' && $session == 'MYR')
          <span style="font-size:16px;text-decoration: line-through;color: red;font-weight:bolder;">MYR {{ number_format(($item->IDR_awal / $rateIDR) * $rateMYR, 0, ',', '.') }}</span> 
          @endif
          @if($item->discount == 'yes' && $session == 'SGD')
          <span style="font-size:16px;text-decoration: line-through;color: red;font-weight:bolder;">SGD {{ number_format(($item->IDR_awal / $rateIDR) * $rateSGD, 0, ',', '.') }}</span>   
          @endif
          @if($item->discount == 'yes' && $session == 'EUR')
          <span style="font-size:16px;text-decoration: line-through;color: red;font-weight:bolder;"> € {{ number_format(($item->IDR_awal / $rateIDR) * $rateEUR, 0, ',', '.') }}</span>   
          @endif
          </span> 

          
      @if($session == 'USD') 
      <strong class="price-block__price-actual "> <span>US$ {{number_format ($item->IDR/$rateIDR,1)}} </span> </strong>
      @endif 

      @if($session == 'IDR') 
      <strong class="price-block__price-actual "> <span>@currency($item->IDR)</span> </strong>
      @endif 

      @if($session == 'MYR') 
      <strong class="price-block__price-actual "> <span>MYR {{ number_format(($item->IDR / $rateIDR) * $rateMYR, 0, ',', '.') }}</span> </strong>
      @endif

      @if($session == 'SGD') 
      <strong class="price-block__price-actual "> <span>SGD {{ number_format(($item->IDR / $rateIDR) * $rateSGD, 0, ',', '.') }}</span> </strong>
      @endif

      @if($session == 'EUR') 
      <strong class="price-block__price-actual "> <span>€ {{ number_format(($item->IDR / $rateIDR) * $rateEUR, 0, ',', '.') }}</span> </strong>
      @endif    
            <span class="price-block__explanation">{{$item->kategories}} @if($item->kategories == 'Per Group') up to {{$item->capacity}} @endif</span></p> 
            <div class="price-block__button" data-v-46d2d245>
              <a href="#books" id="scroll-to-books">
            <button type="button" id="btn-booking-header" data-test-id="btn-booking-header" class="gtm-trigger__book-now-price-box-btn c-button c-button--medium filbtn" data-v-46d2d245>
              Book now
            </button>
            </a>
          </div>
          </div> 
            </div>
            <div> 
            <ul> 
            <li style="font-weight:bolder;">Why Book With Us?</li>
            <li><p style="font-weight: bolder;font-size: 18px;"><i style="color: green;font-weight: bold;" class="ti-check"></i> We are a local business</p></li>
            <li><p style="font-weight: bolder;font-size: 18px;"><i style="color: green;font-weight: bold;" class="ti-check"></i> Provide real price</p></li>
            <li><p style="font-weight: bolder;font-size: 18px;"><i style="color: green;font-weight: bold;" class="ti-check"></i> No portal commision</p></li>
            <li><p style="font-weight: bolder;font-size: 18px;"><i style="color: green;font-weight: bold;" class="ti-check"></i> Instant confirmation</p></li>
            </ul>
            </div>
            </section>
            @endforeach
            </aside>
            </div>
            </section> 
            </section> 
            </div> 
          </section>
        </div>
      </main>
    <br>

    <div class="wrapper container d-block d-md-none" style="overflow:hidden;margin-bottom:100px;margin-top:50px;">
    <div class="d-block d-md-none">
    <span data-test-id="collection-title" class="collection-header_title" data-v-76e871e0 style="font-size:28px;">
        Other Popular Tours
      </span>
      <br>
      <br>
  <ul class="custom-horizontal-list">
  @foreach($other as $item)
  <li class="style=display: flex; flex-direction: row; justify-content: space-between;">
  <div class="activity-card-block--grid rounded" style="flex: 1; max-width: 300px; border: 1px solid #ccc; padding: 0px; margin: 2px;">
  <article data-test-id="horizontal-activity-card" class="activity-card horizontal-activity-card companion-inactive activity-card-block__card--grid activity-card-block--desktop"   data-v-a1084d9e>
  <a href="{{'/item/'.$item->slug}}" role="contentinfo" target="_blank" rel="noopener" data-activity-id="412877"  style="border:none;" class="activity-card__container gtm-trigger__card-interaction"  data-v-a1084d9e>
  <div class="activity-card__image" data-v-a1084d9e> 
  <div class="activity-card__image-info align-end" data-v-a1084d9e></div> 
  <picture data-v-a1084d9e>
  <source srcset="{{ url('public/img/'.$item->image) }}" type="image/webp"> 
  <img src="{{ url('public/img/'.$item->image) }}" alt="{{$item->namawisata}}"></picture>
  </div> 
  <div class="activity-card__details" data-v-a1084d9e>
  <div class="activity-card__details-main" data-v-a1084d9e>
  <div class="activity-card__details-left" data-v-a1084d9e> 
  <h3 class="activity-card__title card-title text-wrap text-capitalize" data-v-a1084d9e style="font-size:14px;">{{$item->namawisata}}</h3>  
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
 @php
            $rating = $item->totalrating;
            $fullStars = floor($rating);
            $halfStar = ceil($rating - $fullStars);
            $emptyStars = 5 - ($fullStars + $halfStar);
            @endphp
            @for ($i = 1; $i <= $fullStars; $i++)
                <i class="fa fa-star rating-color"></i>
            @endfor
            @if ($halfStar)
            <i class="fa fa-star-half rating-color"></i>
            @endif
            @for ($i = 1; $i <= $emptyStars; $i++)
                <!-- <i class="fa fa-star rating-color" style="color:grey !important;"></i> -->
            @endfor
            @if($rating == 0)
            @for ($i = 1; $i <= 5; $i++)
                <i class="fa fa-star rating-color" style="color:grey !important;"></i>
            @endfor
            @endif
              </div>
</div>
<div class="rating-overall__reviews" style="margin-bottom:15px;">
  ({!! number_format($item->totalrating, 1) !!})
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

<div id="gyg" data-server-rendered="true">
  <div class="new-homepage-layout partner-left-layout" data-v-1e9f5217>
  <a href="#main-content" class="skip-link">Skip to content</a> 
  <main id="main-content" class="home-page">
<div class="activities" data-v-680034d2 data-v-1e9f5217>
    <section data-test-id="activity-picks" class="collection-container container activities__cards" data-v-76e871e0 data-v-680034d2>
    @if(count($other) > 0) 
    <div class="collection-header d-none d-sm-block" data-v-76e871e0>
    <div class="collection-header--title-container" data-v-76e871e0>
    <span data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
        Other popular tour
      </span> 
    </div> 
    </div>
    
    <div class="collection-body d-none d-sm-block" data-v-76e871e0>
    <div class="collection-body--horizontal" data-v-76e871e0>
    <div class="vertical-activity-cards__grid" data-v-76e871e0>
      @foreach($other as $item)
    <article data-test-id="vertical-activity-card" class="vertical-activity-card d-none d-sm-block" data-v-76e871e0>
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
              @php
            $rating = $item->totalrating;
            $fullStars = floor($rating);
            $halfStar = ceil($rating - $fullStars);
            $emptyStars = 5 - ($fullStars + $halfStar);
            @endphp
            @for ($i = 1; $i <= $fullStars; $i++)
                <i class="fa fa-star rating-color"></i>
            @endfor
            @if ($halfStar)
            <i class="fa fa-star-half rating-color"></i>
            @endif
            @for ($i = 1; $i <= $emptyStars; $i++)
                <!-- <i class="fa fa-star rating-color" style="color:grey !important;"></i> -->
            @endfor
            @if($rating == 0)
            @for ($i = 1; $i <= 5; $i++)
                <i class="fa fa-star rating-color" style="color:grey !important;"></i>
            @endfor
            @endif
              </div>
            </div>
      </div> 
  </div> 
  <div class="rating-overall__reviews" style="margin-bottom:15px;">
  ({!! number_format($item->totalrating, 1) !!})
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

    <article data-test-id="vertical-activity-card" class="vertical-activity-card d-block d-md-none" data-v-76e871e0>
    <div class="vertical-activity-card__content-wrapper">
    <a href="{{'/item/'.$item->slug}}" role="contentinfo" data-activity-id="62214" target="_blank" class="vertical-activity-card__container gtm-trigger__card-interaction">
    <div class="vertical-activity-card__top-wrapper">
    <div class="vertical-activity-card__top">
    <div class="cobamobile">
    <picture>
    <source srcset="{{ url('public/img/'.$item->image) }}" type="image/webp"> 
    <img class="cobamobile" src="{{ url('public/img/'.$item->image) }}" alt="{{$item->namawisata}}">
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
     </p> 
    </header> 
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
      @endif
    <br>
    <hr>
    @if(count($value) === 0)
          <div></div>
          @else
        <div>
<div class="row">
<div class="col mt-4">
<div class="d-none d-sm-block">
<div style="display: flex; align-items: baseline;">
    <span data-test-id="collection-title" class="collection-header_title" style="font-size:24px;font-weight:bolder;">
        Customer reviews 
    </span>
    <p class="disabled" style="margin-left: 10px;">(Only customers who made bookings can review this experience)</p>
</div>
</div>

<div class="d-block d-md-none">
    <span data-test-id="collection-title" class="collection-header_title" style="font-size:24px;font-weight:bolder;">
        Customer reviews 
    </span>
    <p class="disabled">(Only customers who made bookings can review this experience)</p>
</div>
      <br/>
      <br/>
      </div>
  </div>
  </div>
  @foreach($value as $values)
<div>
 <div class="row">
    <div class="col mt-0">     
          <div class="form-group row">
            @foreach($travel as $item) <input type="hidden" name="wisata_id" value="{{ $item->wisata_id }}">@endforeach
            <div class="col">
                <div class="rated" style="margin-left:-15px;margin-bottom:-25px;">
                @for($i=1; $i<=$values->star_rating; $i++)
                  <!-- {{-- <input type="radio" id="star{{$i}}" class="rate" name="rating" value="" /> --}} -->
                  <i class="fa fa-star rating-color" title="text"></i>
                @endfor
                </div>
            </div>
            <div style="margin-right:15px;">
            <p class="disabled">{{ \Carbon\Carbon::parse($values->updated_at)->formatLocalized('%d %B %Y') }}</p>
          </div>
          </div>
          <div class="form-group row mt-0">
            <div class="col">
            <p style="font-size: 14px;" class="text-capitalize">{{ $values->name }} - {{$values->country}}</p>
            <div id="activity-experience" class="activity-experience js-section-content" style="word-wrap: break-word; overflow-wrap: break-word;" data-v-d21396c2 data-v-c4be1764>
                <p id="comment{{ $values->id }}" style="font-size: 16px;">"{{ $values->comments }}"</p>
                <a href="javascript:void(0);" id="toggleComment{{$values->id}}" style="font-size: 16px;">See More</a>
            </div>
                <div id="photo-preview-container">
                <div class="d-none d-sm-block">
                @if($values->image !== null)
                <a href="{{ url('public/img/review/'.$values->image) }}" data-lightbox="mygallery{{$values->id}}" data-title="">
                <img src="{{ url('public/img/review/'.$values->image) }}" style="width: 250px; height: 180px; object-fit: cover; border-radius: 15px; opacity: 0.5;" />
                </a>
                @endif
               
                @if($values->image2 !== null)
                <a href="{{ url('public/img/review/'.$values->image2) }}" data-lightbox="mygallery{{$values->id}}" data-title="">
                <img src="{{ url('public/img/review/'.$values->image2) }}" style="width: 250px; height: 180px; object-fit: cover; border-radius: 15px; opacity: 0.5;" />
              </a>
                @endif
                <div style="position: relative; display: inline-block;">
                @if($values->image3 !== null)
                <a href="{{ url('public/img/review/'.$values->image3) }}" data-lightbox="mygallery{{$values->id}}" data-title="">
                <img src="{{ url('public/img/review/'.$values->image3) }}" style="width: 250px; height: 180px; object-fit: cover; border-radius: 15px; opacity: 0.5;" />
                <span style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 20px; color: white;">Click to see all images</span>
                </a>
                @endif
                @if($values->image4 !== null)
                <a href="{{ url('public/img/review/'.$values->image4) }}" data-lightbox="mygallery{{$values->id}}" data-title="" style="display:none;">
                <img src="{{ url('public/img/review/'.$values->image4) }}" style="width: 250px; height: 180px; object-fit: cover; border-radius: 15px; opacity: 0.5;" />
                </a>
                @endif
                @if($values->image5 !== null)
                <a href="{{ url('public/img/review/'.$values->image5) }}" data-lightbox="mygallery{{$values->id}}" data-title="" style="display:none;">
                <img src="{{ url('public/img/review/'.$values->image5) }}" style="width: 250px; height: 180px; object-fit: cover; border-radius: 15px; opacity: 0.5;" />
                </a>
                @endif
            </div>
            </div>
    <div class="d-block d-md-none">
  <div id="carouselExampleControls{{$values->id}}" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" style="border-radius:15px;">
  @if($values->image !== null)
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ url('public/img/review/'.$values->image) }}" alt="First slide">
    </div>
    @endif
    @if($values->image2 !== null)
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ url('public/img/review/'.$values->image2) }}" alt="Second slide">
    </div>
    @endif
    @if($values->image3 !== null)
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ url('public/img/review/'.$values->image3) }}" alt="Second slide">
    </div>
    @endif
    @if($values->image4 !== null)
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ url('public/img/review/'.$values->image4) }}" alt="Second slide">
    </div>
    @endif
    @if($values->image5 !== null)
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ url('public/img/review/'.$values->image5) }}" alt="Second slide">
    </div>
    @endif
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls{{$values->id}}" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls{{$values->id}}" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
              </div>
            </div>
          </div>
          </div>
                </div>
             </div>
             <hr>
            @endforeach
            @endif
            <div class="container">
                <div class="row">
            {{$value->links()}}
        </div>
    </div>
    </section> 
    </div>
    </main>
    </div>
    </div>  
    <br>
</div>
</div>
<div class="wrapper container" style="overflow:hidden; margin-top:20px;">
<span data-test-id="collection-title" class="collection-header_title" data-v-76e871e0 style="font-size:28px;">
        Our top tours & activities
      </span>
<ul class="horizontal-list" style="margin-bottom:50px;">
  @foreach($provinces as $item)
 <li><a href="/location/{{$item->slugprovince}}/{{$item->id}}" style="color:#233351;">{{$item->namaprovince}}</a></li> 
  @endforeach
  @foreach($seasones as $item)
  <li><a href="{{'/season/' .$item->id}}" style="color:#233351;">{{$item->namaseason}}</a></li>
  @endforeach
  @foreach($destination as $item)
  <li><a href="{{'/category-destination/' .$item->id}}" style="color:#233351;">{{$item->destination}}</a></li>
  @endforeach
  @foreach($city as $item)
  <li><a href="{{'/city/' .$item->slugregion}}" style="color:#233351;">{{$item->namaregion}}</a></li>
  @endforeach
</ul>
</div>
@endsection
<!-- {!! $cityGet !!} -->
