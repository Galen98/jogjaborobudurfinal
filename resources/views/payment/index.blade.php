<!DOCTYPE html>
<html lang="en-US" default-lang="en-US" data-theme="light">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.css" integrity="sha512-FA9cIbtlP61W0PRtX36P6CGRy0vZs0C2Uw26Q1cMmj3xwhftftymr0sj8/YeezDnRwL9wtWw8ZwtCiTDXlXGjQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.css" integrity="sha512-/Jsoj+nRoCkEHw4HnymLk48dWblqtN+0rW+UMAanfbHZjzgphJipQOEuuOEdZ0IzSEYgK0NXCNda8r+4juGbPg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('traveler')}}/css/booking1.css">
	<link rel="stylesheet" href="{{asset('traveler')}}/css/booking2.css">
	<link rel="stylesheet" href="{{asset('traveler')}}/css/booking3.css">
	<link rel="stylesheet" href="{{asset('traveler')}}/css/booking4.css">
	<link rel="stylesheet" href="{{asset('traveler')}}/css/booking5.css">
	<link rel="stylesheet" href="{{asset('traveler')}}/css/booking6.css">
	<link rel="stylesheet" href="{{asset('traveler')}}/css/booking7.css">
	<link rel="stylesheet" href="{{asset('traveler')}}/css/booking8.css">
	<link rel="stylesheet" href="{{asset('traveler')}}/css/booking9.css">
	<link data-vue-meta="ssr" rel="preload" href="{{asset('font')}}/GT-Eesti-Pro-Display-Regular.woff2" as="font" type="font/woff2" crossorigin="true">
  	<link data-vue-meta="ssr" rel="preload" href="{{asset('font')}}/GT-Eesti-Pro-Display-Medium.woff2" as="font" type="font/woff2" crossorigin="true">
  	<link data-vue-meta="ssr" rel="preload" href="{{asset('font')}}/GT-Eesti-Pro-Display-Bold.woff2" crossorigin="true">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('spica')}}/images/favicon.png">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('spica')}}/images/favicon.png">
	<link rel="shortcut icon" href="favicon.png">
	<meta name="viewport"content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"
        />
    <title>Booking</title>
	<meta name="description">
	<meta property="og:description">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="www.jogjaborobudur.com">
	<meta property="og:title" content="Booking">
    <link rel="stylesheet" href="{{asset('traveler')}}/css/style.css">
    <meta name="service-name" content="traveler-frontend-checkout" />
    <link rel="stylesheet" href="{{asset('traveler')}}/css/booking10.css">
    <link rel="stylesheet" href="{{asset('traveler')}}/css/booking11.css">
    <script src="{{asset('traveler')}}/js/modernizr-2.6.2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" ></script>
  </head>
  <body>
    <div id="gyg">
	<div>
	<div class="main-wrapper  partner-left-layout customer-information customer-information--gyg-symbol-on-mobile">
    <!-- header -->
	<header class="page-header light" data-test-id="page-header" data-v-36cff088 style="background-color:  #fc2c04;">
	<div class="page-header__content" data-v-36cff088>
	<div class="page-header__logo-image" role="img">
	<img src="{{asset('spica')}}/images/logomini.png" style="margin-top:5px;" height="50" alt="logo"/>
	</div>
	</div>
	</header>

	<a href="#main-content" class="skip-link">Skip to content</a>
	<main id="main-content" class="">
    @yield('content')
    @include('sweetalert::alert')

	</main>

	<footer class="page-footer" style="background-color:  #fc2c04;">
	<div class="page-footer__content">
	<nav class="navigation page-footer__navigation">
	<div class="navigation__directory"><p class="navigation__item navigation__item-section_copyright">
	<span> © <time>2023</time> Jogja Borobudur Tour &amp; Travel</span></p>
	</div>
	</nav>
	</div>
	</footer>

	<div>
	<div style="display:contents;">
	</div>
	</div>
	</div>
	</div>
	</div>
    
    @yield('script')
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="{{asset('traveler')}}/js/jquery.min.js"></script>
  <script src="{{asset('traveler')}}/js/bootstrap.min.js"></script>
  <script src="{{asset('traveler')}}/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="{{asset('traveler')}}/js/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
    var timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
    var time = $('#time').val(timezone);
    });
  </script>
</body>
</html>