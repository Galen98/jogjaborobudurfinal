
<!DOCTYPE html>
<html>
<head>
  @foreach($travel as $item)
  <meta charset="utf-8" />
  <link data-vue-meta="ssr" rel="preload" href="{{asset('font')}}/GT-Eesti-Pro-Display-Regular.woff2" as="font" type="font/woff2" crossorigin="true">
  <link data-vue-meta="ssr" rel="preload" href="{{asset('font')}}/GT-Eesti-Pro-Display-Medium.woff2" as="font" type="font/woff2" crossorigin="true">
  <link data-vue-meta="ssr" rel="preload" href="{{asset('font')}}/GT-Eesti-Pro-Display-Bold.woff2" crossorigin="true">
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
<link href="{{asset('traveler')}}/css/blogs2.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="{{asset('traveler')}}/css/blogs.css" />
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
  <link rel="preload" href="{{asset('traveler')}}/css/new.css" as="style">
<link rel="stylesheet" href="{{asset('traveler')}}/css/new2.css">
<link rel="stylesheet" href="{{asset('traveler')}}/css/new3.css">
<link rel="stylesheet" href="{{asset('traveler')}}/css/new4.css">
<link rel="stylesheet" href="{{asset('traveler')}}/css/new5.css">
<link rel="stylesheet" href="{{asset('traveler')}}/css/new6.css">
<link rel="stylesheet" href="{{asset('traveler')}}/css/new7.css">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('spica')}}/images/favicon.png">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('spica')}}/images/favicon.png">
<link rel="shortcut icon" href="favicon.png">
<meta name="viewport"content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"
        />
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
</style>
 
  <!-- google tag -->
  <meta name="title" content="{{$item->namawisata}}" />
  <meta name="description" content="{{$item->shortdescription}}"/>
  <!-- facebook tag -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="www.jogjaborobudur.com" />
  <meta property="og:title" content="{{$item->namawisata}}" />
  <meta property="og:description" content="{{$item->shortdescription}}" />
  <meta property="og:image" content="{{('public/img/'.$item->image) }}" />

  <title>{{$item->namawisata}}</title>  
@endforeach
    </head>

    <body>
      <!-- <div id="page"> -->
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
    <section id="activity-page" data-test-id="activity-page"><!----> 
    <div class="main-wrapper  partner-left-layout"><!----> <!----> <!----> 
  <main id="main-content">
  <aside role="cart-expiration-notification" class="cart-expiration-notification" style="display:none;"></aside> 
  <section class="activity__container js-activity" data-v-c4be1764>
  <section class="container" data-v-c4be1764>
  <section class="activity__breadcrumbs" data-v-c4be1764>
  <ul itemscope="itemscope" itemtype="https://schema.org/BreadcrumbList" class="activity-breadcrumbs" data-v-2833ce42 data-v-c4be1764>
  <li itemprop="itemListElement" itemtype="https://schema.org/ListItem" itemscope="itemscope" class="activity-breadcrumbs__item" data-v-2833ce42>
  <span itemprop="name" data-v-2833ce42><a href="/"> Home</a></span><meta itemprop="position" content="1" data-v-2833ce42>
  </li>  
  <li itemprop="itemListElement" itemtype="https://schema.org/ListItem" itemscope="itemscope" class="activity-breadcrumbs__item" data-v-2833ce42>
  @foreach($destinasi as $item)<span itemprop="name" data-v-2833ce42><a href="{{'/category-destination/' .$item->id}}">{{$item->destination}}</a></span>@endforeach 
  <meta itemprop="position" content="2" data-v-2833ce42>
  </li> 
  <li itemprop="itemListElement" itemtype="https://schema.org/ListItem" itemscope="itemscope" class="activity-breadcrumbs__item" data-v-2833ce42>
  @foreach($season as $item)<span itemprop="name" data-v-2833ce42><a href="{{'/season/' .$item->id}}">{{$item->namaseason}}</a></span>@endforeach 
  <meta itemprop="position" content="2" data-v-2833ce42>
  </li> 
  <li itemprop="itemListElement" itemtype="https://schema.org/ListItem" itemscope="itemscope" class="activity-breadcrumbs__item" data-v-2833ce42>
  @foreach($travel as $item)
  <span itemprop="name" data-v-2833ce42>{{$item->namawisata}}</span>@endforeach
  <meta itemprop="position" content="3" data-v-2833ce42>
  </li> 
  </ul></section> 
  
  <section class="activity__today-tomorrow-badge-container" data-v-c4be1764></section> 
  <section class="activity__header" data-v-c4be1764><div class="activity__header--column" data-v-c4be1764>
  <h1 data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
      {{$item->namawisata}}
    </h1> 
  <div class="activity__header" data-v-c4be1764><!----> 
  <div data-track="activity-rating" data-test-id="activity-rating" class="activity__rating--container" data-v-c4be1764>
  <div class="activity__rating">
  <div class="rating-star">
  <div class="" style="margin-top: 4px;">
              <div class="small-ratings">
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
              </div>
            </div>
          </div> 
  <p class="activity__rating--totals" style="margin-top: 8px;">
   {!! $jumlahreview !!} Review
    </p>
  <p class="activity__rating--count" >
    @foreach($travel as $item)
      <img src="{{asset('traveler')}}/images/duration.png" width="20" height="20" style="margin-top:10px;"> <p style="margin-top: 10px;">Duration: {{$item->durasi}}</p>  
      @endforeach
  <span class="gtm-trigger__adp-total-reviews-btn">
    </span></p></div></div> 
  <section class="activity__supplier-info activity__supplier-info--large" data-v-c4be1764>
  <div data-test-id="activity-provider" class="supplier-name" data-v-5db601b6 data-v-c4be1764>
  <span class="visibility-pixel" data-v-c68e7552 data-v-5db601b6></span> 
  <small class="supplier-name__label" data-v-5db601b6>
   
    </small></div></section></div></div>
  </section> 
  <section data-track="activity-header" data-test-id="activity-photo-gallery" class="activity__row activity__photo-gallery" data-v-c4be1764>
  <div data-v-e0177802 data-v-c4be1764>
  <div class="photo-gallery photo-gallery--has-collage" data-v-e0177802>
  <div class="photo-gallery__blur-outer">
  <div class="photo-gallery__blur-inner">
    @foreach($travel as $item)
  <div class="photo-gallery__blur-image" style="background-image:url({{('public/img/'.$item->image) }});"></div></div></div> <!----> 
  <section class="photo-gallery-slider">
  <div draggable="false" class="gyg-slider" style="--scroll-snap-stop:always;--slide-width:100%;--slides-per-view:1;"> 
  <section id="gyg-slider__aria-6571975" aria-roledescription="carousel" class="gyg-slider__content">
    
  <div id="slide-0" data-slide-id="0" aria-labelledby="slide-button-0" aria-roledescription="slide" class="gyg-slide photo-gallery-slider__slide">
  <picture class="no-lazy-loading">
    <source srcset="{{ url('public/img/'.$item->image) }}" media="(max-width: 767px)"> 
  <source srcset="{{ url('public/img/'.$item->image) }}" media="(min-width: 768px) and (max-width: 1199px)"> 
  <source srcset="{{ url('public/img/'.$item->image) }}" media="(min-width: 1200px)"> 
  <img loading="lazy" src="{{ url('public/img/'.$item->image) }}" class="photo-gallery-slider__slide-image photo-gallery-slider__slide-image--contain" style="object-position:center;">
  </picture>
  </div>
  @endforeach

  @foreach($travel as $item)
  <div id="slide-1" data-slide-id="1" aria-labelledby="slide-button-1" aria-roledescription="slide" class="gyg-slide photo-gallery-slider__slide">
  <picture style="object-position:center;">
  <source data-srcset="{{ url('public/img/'.$item->image2) }}" media="(max-width: 767px)" class="vanilla-lazy-loaded-image">
  <source data-srcset="{{ url('public/img/'.$item->image2) }}" media="(min-width: 768px) and (max-width: 1199px)" class="vanilla-lazy-loaded-image">
  <source data-srcset="{{ url('public/img/'.$item->image2) }}" media="(min-width: 1200px)" class="vanilla-lazy-loaded-image"> 
  <img alt="" data-src="{{ url('public/img/'.$item->image2) }}" src="{{ url('public/img/'.$item->image2) }}" title="" class="vanilla-lazy-loaded-image photo-gallery-slider__slide-image--contain photo-gallery-slider__slide-image"></picture></div>
  @endforeach

  @foreach($travel as $item)
  <div id="slide-2" data-slide-id="2" aria-labelledby="slide-button-2" aria-roledescription="slide" class="gyg-slide photo-gallery-slider__slide">
  <picture style="object-position:center;">
  <source data-srcset="{{ url('public/img/'.$item->image3) }}" media="(max-width: 767px)" class="vanilla-lazy-loaded-image">
  <source data-srcset="{{ url('public/img/'.$item->image3) }}" media="(min-width: 768px) and (max-width: 1199px)" class="vanilla-lazy-loaded-image">
  <source data-srcset="{{ url('public/img/'.$item->image3) }}" media="(min-width: 1200px)" class="vanilla-lazy-loaded-image"> 
  <img alt="" data-src="{{ url('public/img/'.$item->image3) }}" src="{{ url('public/img/'.$item->image3) }}" title="" class="vanilla-lazy-loaded-image photo-gallery-slider__slide-image--contain photo-gallery-slider__slide-image"></picture></div>
  @endforeach

  @foreach($travel as $item)
  <div id="slide-3" data-slide-id="3" aria-labelledby="slide-button-3" aria-roledescription="slide" class="gyg-slide photo-gallery-slider__slide"><picture style="object-position:center;"><source data-srcset="{{ url('public/img/'.$item->image4) }}" media="(max-width: 767px)" class="vanilla-lazy-loaded-image"><source data-srcset="{{ url('public/img/'.$item->image4) }}" media="(min-width: 768px) and (max-width: 1199px)" class="vanilla-lazy-loaded-image">
    <source data-srcset="{{ url('public/img/'.$item->image4) }}" media="(min-width: 1200px)" class="vanilla-lazy-loaded-image"> 
      <img alt="" data-src="{{ url('public/img/'.$item->image4) }}" src="{{ url('public/img/'.$item->image4) }}" title="" class="vanilla-lazy-loaded-image photo-gallery-slider__slide-image--contain photo-gallery-slider__slide-image"></picture></div>
  @endforeach

  @foreach($travel as $item)
  <div id="slide-4" data-slide-id="4" aria-labelledby="slide-button-4" aria-roledescription="slide" class="gyg-slide photo-gallery-slider__slide">
    <picture style="object-position:center;">
    <source data-srcset="{{ url('public/img/'.$item->image5) }}" media="(max-width: 767px)" class="vanilla-lazy-loaded-image">
    <source data-srcset="{{ url('public/img/'.$item->image5) }}" media="(min-width: 768px) and (max-width: 1199px)" class="vanilla-lazy-loaded-image">
    <source data-srcset="{{ url('public/img/'.$item->image5) }}" media="(min-width: 1200px)" class="vanilla-lazy-loaded-image"> 
    <img alt="" data-src="{{ url('public/img/'.$item->image5) }}" src="{{ url('public/img/'.$item->image5) }}" title="" class="vanilla-lazy-loaded-image photo-gallery-slider__slide-image--contain photo-gallery-slider__slide-image"></picture></div>
    @endforeach


  <button aria-label="Previous Slide" aria-controls="gyg-slider__aria-6284019" data-test-id="gyg-slider-previous" class="gyg-slider__arrow gyg-slider__arrow--left" style="display:;">
  <span class="photo-gallery__button-prev gtm-trigger__adp-gallery-interaction"></span></button> 
  <button aria-label="Next Slide" aria-controls="gyg-slider__aria-6284019" data-test-id="gyg-slider-next" class="gyg-slider__arrow gyg-slider__arrow--right" style="display:;">
  <span class="photo-gallery__button-next gtm-trigger__adp-gallery-interaction"></span></button>   
  <div class="gyg-slider__header">
  <ul role="list" class="gyg-slider__bullets"></ul></div>
  </div> <!---->
  </section> 

  <div class="photo-collage photo-gallery-collage">
  @foreach($travel as $item)
  <picture class="photo-collage__image photo-collage__image--0"><source srcset="data:image/gif;base64, R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" media="(max-width: 767px)"> 
    <a href="{{ url('public/img/'.$item->image) }}" data-lightbox="mygallery" data-title="">
  <img src="{{ url('public/img/'.$item->image) }}" loading="lazy" class="photo-collage__image-source">
</a></picture>

  <picture class="photo-collage__image photo-collage__image--1"><source srcset="data:image/gif;base64, R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" media="(max-width: 767px)">
  <a href="{{ url('public/img/'.$item->image2) }}" data-lightbox="mygallery" data-title=""> 
  <img src="{{ url('public/img/'.$item->image2) }}" loading="lazy" class="photo-collage__image-source">
</a></picture>

  <picture class="photo-collage__image photo-collage__image--2"><source srcset="data:image/gif;base64, R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" media="(max-width: 767px)">
  <a href="{{ url('public/img/'.$item->image3) }}" data-lightbox="mygallery" data-title=""> 
  <img src="{{ url('public/img/'.$item->image3) }}" loading="lazy" class="photo-collage__image-source">
</a></picture>
  <picture class="photo-collage__image photo-collage__image--3"><source srcset="data:image/gif;base64, R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" media="(max-width: 767px)">
  <a href="{{ url('public/img/'.$item->image4) }}" data-lightbox="mygallery" data-title=""> 
  <img src="{{ url('public/img/'.$item->image4) }}" loading="lazy" class="photo-collage__image-source">
</a></picture>
  @endforeach 
  <button class="photo-collage__show-all">
      Click to see all images
    </button></div>
  <div class="photo-gallery__overlay"> <!----></div> 
  </div> <!----></div></section> 
  <section class="activity__broadcast" data-v-c4be1764><!----></section>

  <section data-test-id="activity-category" class="activity__category-label activity__category-label--mobile" data-v-c4be1764>
  <span class="c-classifier-badge" data-v-c4be1764>
     
    </span></section>
     <!----> 
     @foreach($travel as $item)
     <p data-test-id="collection-title" class="collection-header_title" data-v-76e871e0 style="font-size:22px;">
      {{$item->namawisata}}
</p> 
    <section class="activity__mobile-header" data-v-c4be1764>
  <section data-v-c4be1764>
  <div data-test-id="activity-provider" class="supplier-name" data-v-5db601b6 data-v-c4be1764>
  <span class="visibility-pixel" data-v-c68e7552 data-v-5db601b6><p style="font-size:9pt;">Duration: {{$item->durasi}}</p></span>
  <br>

  <span style="font-weight:bolder;">Why Book With Us?</span><br>
    <span><i style="color: green;font-weight: bold;" class="ti-check"></i> We are a local business</span><br>
    <span><i style="color: green;font-weight: bold;" class="ti-check"></i> Provide real price</span><br>
    <span><i style="color: green;font-weight: bold;" class="ti-check"></i> No portal commision</span><br>
    <span><i style="color: green;font-weight: bold;" class="ti-check"></i> Instant confirmation</span><br>
     <span><i style="color: green;font-weight: bold;" class="ti-check"></i> Cancellation up to 48 hours</span> 
  <small class="supplier-name__label" data-v-5db601b6>
      
    </small></div> @endforeach
  <div data-track="activity-rating" class="activity__row activity__rating activity__rating--mobile" data-v-c4be1764><div class="rating-star">
  
  </div> 
  <p class="activity__rating--totals">
    
    </p> 
  <p class="activity__rating--count">
  <span class="gtm-trigger__adp-total-reviews-btn">
      
    </span></p>
  </div>
  </section> 
  <section class="activity__price activity__price--mobile" data-v-46d2d245 data-v-c4be1764>
  <div data-test-id="activity-price-block" class="price-block price-block--has-price price-block--persuation-badge" data-v-46d2d245>
  <!----> 
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
  <p class="price-block-display-price" data-v-46d2d245><span class="price-block__from">From</span>
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
    @foreach($travel as $item)<span class="price-block__explanation">{{$item->kategories}}
    @if($item->kategories == 'Per Group') up to {{$item->capacity}} @endif</span>@endforeach<br>
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
    <section id="activity-overview" data-component="overview" class="activity-overview" data-v-bc99966e data-v-c4be1764 style="margin-top:-50px; "><!----> <!----> 
    <p data-test-id="activity-overview-content" class="activity-overview__content" data-v-bc99966e>
        {{$item->shortdescription}}
      </p>
    </section>
    
  </div> <!----> <!----> 
    <div data-track="key-details" data-v-c4be1764>
    <section id="key-details" data-component="key-details" data-test-id="activity-key-details" class="activity-key-details js-section-content" data-v-4a3743c6 data-v-c4be1764>
    <p style="font-size: 24px;font-weight: bolder;margin-top: 15px;">About this tour </p>
    <p style="font-size: 20px;font-weight: bolder;margin-top: 15px;">Highlights </p>
     <br>
     <ul data-test-id="activity-highlights" class="activity-highlights__list" data-v-5234723c>
                  @foreach($highlight as $item)
                  <li class="activity-highlights__list-item" data-v-5234723c> {{$item->highlight}}</li>
                  @endforeach
                </ul>
     <br>
     <br>
    <section class="activity-key-details__container" data-v-4a3743c6>
  
    @foreach($travel as $item)
    @if($item->pickup == 'yes')
    <dl class="activity-key-details__list" data-v-4a3743c6><!----> 
    <div data-v-4a3743c6>
    <dt class="activity-key-details__term" data-v-4a3743c6><span class="activity-key-details__term-icon" data-v-4a3743c6>
    <span aria-label="Free cancellation" class="c-icon activity-key-details__icon" data-v-4a3743c6>
    <span data-v-4a3743c6>
    <img src="{{asset('traveler')}}/images/pickup.png" width="27" height="27">
    </span> <!---->
    </span>
    </span> 
    <span data-v-4a3743c6 style="font-size: 20px;">Pickup included</span>
    </dt> 
    <dd class="activity-key-details__description" data-v-4a3743c6 style="
    font-size: 17px;">
        {{$item->wherepickup}}
        <!----></dd></div>
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
    <section id="booking-assistant" data-test-id="booking-assistant" data-v-a17e5250 data-v-c4be1764 >
    <div is-date-selected="" class="booking-assistant-configurator booking-assistant" data-v-dd428772 data-v-a17e5250 style="background-color: #de1709;">
    <h2 class="booking-assistant-configurator__header" data-v-dd428772><i class="ti-user" style="font-size: 24px;color: white;"></i> Select participants and date</h2> 
    

  <section data-test-id="activity-filters-primary-date-picker" class="ba-dropdown ba-date-picker ba-date-picker--multiple-months ba-date-picker--experimental-theme" data-v-0605f8ac data-v-dd428772>
<input type="text" name="traveldate" id="date-start" class="form-control" style="background-color: white;" placeholder="Select date" required="">
    </section>
    <section data-test-id="activity-filters-primary-people-picker" class="ba-dropdown people-picker" data-v-0605f8ac data-v-7e630b00 data-v-dd428772>
    
      <!-- @if($item->kategories == 'Per Person')
      <input type="number" id="adult" class="form-control" placeholder="Select participant (Adult)" style="background-color: white;" min="0" name="adultquantity">
      @else

      <input type="number" id="group" class="form-control" placeholder="Select participant (Group)" style="background-color: white;" min="0" name="groupquantity">
      @endif
      @if($item->child == 'yes')
      <input type="number" id="child" class="form-control" placeholder="Select participant (Children)" style="background-color: white;" min="0" name="childquantity">
      @else<p></p>
      @endif -->
      <div class="form-control form-control-participants" >
<div class="text d-flex align-items-center participants-control" style="margin-top:5px;;">
<i class="fas fa-user-friends flex-shrink-0 mr-2"></i>
<div class="participant-label-span text-truncate"></div>
</div>
<div class="participants-input-container  bg-light" style="display: none; z-index: 1;padding:10px;">
<div class="border-top mb-2"></div>
@if($item->kategories == 'Per Person')
<div class="d-flex justify-content-between align-items-center my-1">
<div>
<h6>Adults</h6>
</div>
<input type="text" id="adult" value="0" name="adultquantity" data-min="0" data-code="adults" />
</div>
@else
<div class="d-flex justify-content-between align-items-center my-1">
<div>
<h6>Group</h6>
</div>
<input type="text" id="group" value="0" name="groupquantity" data-min="0" data-code="participants" />
</div>
@endif
@if($item->child == 'yes')
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
@endif
  </section>

    <button type="button" id="cekharga" class="cekharga js-check-availability gtm-trigger__adp-check-availability-btn avoid-close-dropdown-on-click c-button c-button--medium filbtn" data-v-dd428772><!---->
    Check availability
  </button>
</div>

</section>

<div><p id="alerts"></p></div>



  @foreach($pilihan as $p)
  <section id="booking-assistant" data-test-id="booking-assistant" data-v-a17e5250 data-v-c4be1764 >
    <form action="{{'/booking/' .$p->id}}" method="GET" enctype="multipart/form-data">
        @csrf
      @foreach($travel as $item) <input type="hidden" name="paketwisata" value="{{$item->namawisata}}">@endforeach
        <input type="hidden" name="idtravel" value="{{$p->wisata_id}}">
        <input type="hidden" name="review" value="{!! $jumlahreview !!}"> 
      <input type="hidden" name="idoption" value="{{$p->id}}">
      <input type="hidden" name="namawisata" value="{{$p->judulsub}}">
    <div is-date-selected="" class="booking-assistant-configurator booking-assistant" data-v-dd428772 data-v-a17e5250 style="background-color: white;border-width: 1px;border-style: solid;border-color: #b80404;border-radius: 10px 10px 10px 10px;" id="totals{{$p->id}}">
      <input type="hidden" name="subid" id="subid{{$p->id}}" value="{{$p->id}}">
    <h2 class="booking-assistant-configurator__header" data-v-dd428772 style="font-weight: bolder;color:#182c4c;text-align:left;"> {{$p->judulsub}}</h2>
    <h3 class="booking-assistant-configurator__header" data-v-dd428772  style="font-size:14px;font-weight: bolder;color:grey;margin-right: 10px;text-align:left;">{{$p->short}}</h3>
    <br>
    <h3 class="booking-assistant-configurator__header" data-v-dd428772 style="font-size:18px;font-weight: bolder;color:#182c4c;text-align:left;">Starting time:
     <select name="waktu" style="font-size:16px;width: 180px;border-radius: 10px 10px 10px 10px;" required="">
        <option >Select a starting time</option>
        @foreach($p->waktu as $w)<option value="{{ Carbon\Carbon::parse($w->time)->format('g:i A') }}">{{ Carbon\Carbon::parse($w->time)->format('g:i A') }}</option>@endforeach
      </select></h3>
      <h2 class="booking-assistant-configurator__header" data-v-dd428772 style="color: #182c4c;font-size:15px;text-align:left;" id="tanggal{{$p->id}}"></h2>
      
      
    <input type="hidden" name="tanggaltravel" id="tanggaltravel{{$p->id}}">
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
      <h3 class="booking-assistant-configurator__header" data-v-dd428772 style="font-size:17px;font-weight: bolder;color:#182c4c;text-align:left;" id="harga{{$p->id}}"></h3>
      <h3 class="booking-assistant-configurator__header" data-v-dd428772 style="font-size:17px;font-weight: bolder;color:#182c4c;text-align:left;" id="totalgroup{{$p->id}}"></h3>
      <input type="hidden" name="totharga" id="totharga{{$p->id}}">
      <input type="hidden" name="tothargagroup" id="tothargagroup{{$p->id}}">
    </section>
     
  <button type="submit" id="cekharga" class="cekharga js-check-availability gtm-trigger__adp-check-availability-btn avoid-close-dropdown-on-click c-button c-button--medium filbtn" data-v-dd428772>  
    Book now
  </button> 
  </form>
    </div>
  </section>
  @endforeach



 

</div>

          </section>
          @endforeach
          <section class="activity-swap-columns" data-v-c4be1764 style="border-top: solid;border-top-color: #e6e8eb;border-top-width: 1pt;">
          <div class="overlay" data-v-c4be1764><!----> 
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
                      <div class="overlay" data-v-c4be1764><!----> 
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
            
            </div> 
            @foreach($travel as $item)
          <aside class="activity__container-columns--side" data-v-c4be1764>
          <section class="activity__price" data-v-46d2d245 data-v-c4be1764>
          <div data-test-id="activity-price-block" class="price-block price-block--has-price price-block--persuation-badge" data-v-46d2d245><!----> 
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
                     <!----></section> 
          <div data-test-id="activity-price-block" class="price-block-display-price-wrapper" data-v-46d2d245>
          <p class="price-block-display-price" data-v-46d2d245><span class="price-block__from">From</span> 
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
              <a href="#books">
            <button type="button" id="btn-booking-header" data-test-id="btn-booking-header" class="gtm-trigger__book-now-price-box-btn c-button c-button--medium filbtn" data-v-46d2d245><!----> 
                        Book now
                      </button>
                      </a>
                    </div></div> 
            <!----></div>
            <div> 
            <ul> 
            <li style="font-weight:bolder;">Why Book With Us?</li>
            <li><p style="font-weight: bolder;font-size: 18px;"><i style="color: green;font-weight: bold;" class="ti-check"></i> We are a local business</p></li>
            <li><p style="font-weight: bolder;font-size: 18px;"><i style="color: green;font-weight: bold;" class="ti-check"></i> Provide real price</p></li>
            <li><p style="font-weight: bolder;font-size: 18px;"><i style="color: green;font-weight: bold;" class="ti-check"></i> No portal commision</p></li>
            <li><p style="font-weight: bolder;font-size: 18px;"><i style="color: green;font-weight: bold;" class="ti-check"></i> Instant confirmation</p></li>
            <li><p style="font-weight: bolder;font-size: 18px;"><i style="color: green;font-weight: bold;" class="ti-check"></i> Cancellation up to 48 hours</p></li>
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

<div id="gyg" data-server-rendered="true">
  <div class="new-homepage-layout main-wrapper  partner-left-layout" data-v-1e9f5217><!----> <!----> <!----> <!----> 
  <a href="#main-content" class="skip-link">Skip to content</a> 
  <main id="main-content" class="home-page">
<div class="activities" data-v-680034d2 data-v-1e9f5217>
    <section data-test-id="activity-picks" class="collection-container container activities__cards" data-v-76e871e0 data-v-680034d2>
    <div class="collection-header" data-v-76e871e0><div class="collection-header--title-container" data-v-76e871e0>
    <span data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
        Other popular tour
      </span> 
    </div> 
    </div> 
    <div class="collection-body" data-v-76e871e0>
    <div class="collection-body--horizontal" data-v-76e871e0>
    <div class="vertical-activity-cards__grid" data-v-76e871e0>

      @foreach($other as $item)
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
      <h1 data-test-id="activity-card-title" class="vertical-activity-card__title">
            {{$item->namawisata}}
</h1> <!----></header> 
      <div class="vertical-activity-card__body">
      <ul class="activity-attributes__container" data-v-33ad6115>
      <li class="activity-attributes__attribute" data-v-33ad6115>
      <span data-v-33ad6115>Duration: {{$item->durasi}}
      </span>
      </li>
      </ul> 
      <span class="vertical-activity-card__badges">
      <span class="vertical-activity-card__ltso-badge c-marketplace-badge c-marketplace-badge--primary">
              Likely to sell out
            </span> <!----> <!----> <!---->
      </span>
      </div>
      </div> 
      <div class="vertical-activity-card__details">
      <footer class="vertical-activity-card__footer">
      <div class="rating-overall__container">
      <div class="rating-overall__rating"><!----> 
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
     <!----> 
  </div> 
  <div class="rating-overall__reviews">
  </div>
  </div> 
  <div class="baseline-pricing" data-v-23fc334c>
  <div class="baseline-pricing__container" data-v-23fc334c>
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

            @if(count($value) === 0)
          <div></div>
          @else
        <div class="container" >
                                 <div class="row">
                                       <div class="col mt-4">
                                       <span data-test-id="collection-title" class="collection-header_title" style="font-size:25px;font-weight:bolder;">
                                            Review from our travelers
                                          </span> 
                                             <br/>
                                             <br/>
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
                                                   <div class="rated" style="margin-left:-15px;margin-bottom:-25px;">
                                                    @for($i=1; $i<=$values->star_rating; $i++)
                                                      {{-- <input type="radio" id="star{{$i}}" class="rate" name="rating" value="" /> --}}
                                                      <label class="star-rating-complete" title="text" >{{$i}} stars</label>
                                                    @endfor
                                                    </div>
                                                </div>
                                             </div>
                                             <div class="form-group row mt-0">
                                                <div class="col">
                                                <div id="activity-experience" class="activity-experience js-section-content" data-v-d21396c2 data-v-c4be1764 style="">
                                                    <p style="font-size: 16px;">"{{ $values->comments }}"</p>
                                                    </div>
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
                                <div class="container" style="margin-bottom:100px;">
                                    <div class="row">
                                       <div class="col mt-4">
                                          <form class="py-2 px-4" action="{{url('insertrating')}}" style="box-shadow: 0 0 10px 0 #ddd;border:solid;border-color: #e6e8eb;border-width: 1pt;" method="POST" autocomplete="off">
                                             @csrf
                                             <div class="form-group row">
                                              <div class="col">
                                                <div class="rate">
                                                  <br>
                                            <span data-test-id="collection-title" class="collection-header_title" style="font-size:18px;font-weight:bolder;">
                                            Insert Review
                                          </span> 
                                         </div>
                                         </div>
                                     </div>
                                             <div class="form-group row">
                                                @foreach($travel as $item)<input type="hidden" name="wisata_id" value="{{ $item->wisata_id }}">@endforeach
                                                <div class="col">
                                                   <div class="rate" >
                                                      <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                                                      <label for="star5" title="text">5 stars</label>
                                                      <input type="radio" id="star4" class="rate" name="rating" value="4"/>
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



    <footer id="gtco-footer" role="contentinfo" style="background-color:#fc2c04;padding:0px;">
    <div class="gtco-container">
      <div class="row row-p b-md">
        <div class="col-md-3"  style="margin-top:50px;">
          <div class="gtco-widget">
            <h1 style="font-weight:bold;color: white;margin-bottom: 15px;font-size: 20px;">Payment Method</h1>
            <img style="margin-bottom: 10px;" src="{{asset('aset')}}/paypal.png">
            <img src="{{asset('spica')}}/images/logomini.png" height="80" width="100">
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
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" style="background-color: white;color: black;">
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
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" style="background-color: white;color: black;">
              Select Currency
            </button>
            <div class="dropdown-menu">
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
            <small class="block" style="color: white;">&copy; 2010 - 2023 JogjaBorobudur Tour. All Rights Reserved.</small> 
          </p>
        </div>
      </div>
          </div>
  </footer>
                      
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
  <script> 
  var dateForm = function() {
		$('#date-start').datepicker({
			format: 'dd/mm/yyyy',
			startDate: new Date(),
			todayHighlight: true,
            autoclose: true,
            orientation: 'bottom'
			
		});
	};
  $(function(){
    dateForm();
  });
</script>  
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

<!-- script total harga/ -->
<script type="text/javascript">


  @foreach($pilihan as $p) $("#totals{{$p->id}}").css("display","none"); @endforeach
  $(document).ready(function(){
     const harganew = {!! $harganew !!}
     const hargachildnew = {!! $hargachildnew !!}
     const harga = {!!$rangeharga!!}
     const jam ={!! $jam !!}
     const hargachild = {!!$hargachild!!}
     const options = {!! $options !!}
     // $(#cekharga).click(function(){

     // })

    $("#cekharga").click(function(){
     @foreach($pilihan as $p) $("#totals{{$p->id}}").slideDown("fast"); 
     let subid{{$p->id}}=$("#subid{{$p->id}}").val()
     let hargaanak{{$p->id}}=0
     let hargadewasa{{$p->id}}=0
     @endforeach
      let date=$("#date-start").val()
      let group=$("#group").val()
      let person=$("#adult").val()
      let personchild=$("#child").val()      
      let hargagroup=0
     

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
            $("#jumlahdewasa{{$p->id}}").text("Participants (in group): " + person+ ' ' + convertrate(item.harga))
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
        $("#harga{{$p->id}}").text("Total Price : " + convertrate(hargadewasa{{$p->id}} + hargaanak{{$p->id}} ))
         $("#totharga{{$p->id}}").val(convertrate(hargadewasa{{$p->id}}  + hargaanak{{$p->id}} ))
      }
      else{
        $("#harga{{$p->id}}").text(" ")
        $("#totharga{{$p->id}}").val("")
      }

      @endforeach 

    })




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

                    </body>
                    </html>
