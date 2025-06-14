
<!DOCTYPE html>
<html lang="en-US" default-lang="en-US" data-theme="light">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.css" integrity="sha512-FA9cIbtlP61W0PRtX36P6CGRy0vZs0C2Uw26Q1cMmj3xwhftftymr0sj8/YeezDnRwL9wtWw8ZwtCiTDXlXGjQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.css" integrity="sha512-/Jsoj+nRoCkEHw4HnymLk48dWblqtN+0rW+UMAanfbHZjzgphJipQOEuuOEdZ0IzSEYgK0NXCNda8r+4juGbPg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <title>{!! $namawisata !!}</title>
	<meta name="description">
	<meta property="og:description">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="www.jogjaborobudur.com">
	<meta property="og:title" content="{!! $namawisata !!}">
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
	<header class="page-header light" data-test-id="page-header" data-v-36cff088 style="background-color:  #fc2c04;">
	<div class="page-header__content" data-v-36cff088>
	<div class="page-header__logo-image" role="img">
	<img src="{{asset('spica')}}/images/logomini.png" class="logs" alt="logo"/>
	</div>
	</div>
	</header>
	<a href="#main-content" class="skip-link">Skip to content</a>
	<main id="main-content" class="">
	<aside style="display:none;" role="cart-expiration-notification" class="cart-expiration-notification">
	<span></span>
	</aside>
	<div class="customer-information__container customer-information__order-summary--mweb customer-information--mweb-only">
	<div class="order-summary-collapsible" data-test-id="order-summary" style="">
	<div class="order-summary-collapsible__container">
	<div class="isCollapsed order-summary-collapsible__controllers">
	<div>
	
	<ul>
	<li>Your order summary :<br></li>
	<li><br></li>
	<li>{!! $paketwisata !!}</li>
	<li><br></li>
	<li><i class="fas fa-map"></i> {!! $namawisata !!}</li>
	<li><i class="fa-regular fa-calendar"></i> Travel Date: {!!$tanggaltravel!!}</li>
	<li><i class="fa-regular fa-clock"></i> Pickup time: {!! $waktu !!}</li>
	@if($adult > 0)
	<li><i class="fa-solid fa-user-group"></i> Participant : {!! $adult !!} (Adult)</li>
	@else<p></p>@endif
	@if($child > 0)
	<li><i class="fa-solid fa-user-group"></i> Participant : {!! $child !!} (Child)</li>
	@else<p></p>@endif
	@if($group > 0)
	<li><i class="fa-solid fa-user-group"></i>Participant : {!! $group !!} (Person)</li>
	@else<p></p>@endif
	<li><p style="margin-bottom:10px;"></p></li>
	@if($total > 0)
	<li>Total: {!! $total !!}</li>
	@else<p></p>@endif

	@if($totalgroup > 0)
	<li>Total: {!! $totalgroup !!}</li>
	@else<p></p>@endif
	<li><p style="color:green;font-weight: lighter;font-size:12px;">All taxes and fees included</p></li>
	</ul>

	<br>
	<br>
	</div>
	
	
	</div>
	</div>
	</div>
	</div>
	<div class="customer-information__container">
	<section class="customer-information__step-navigation">
	<div class="step-navigation" data-v-5a727b98>
	<ul class="step-navigation__list" data-v-5a727b98>
	<li id="step-item-checkout" class="step-navigation__list--step--active step-navigation__list--step" data-v-5a727b98>Booking</li>
	</ul>
	</div>
	</section>
	</div>
	
	<div class="customer-information__container" data-test-id="checkout-section">
	<section class="customer-information__content">
	<div style="" class="billing-form"><h2>Enter your personal details</h2>
	
	
	<div class="billing-form__container">
	<form novalidate data-test-id="customer-information-form" action="{{url('generatepdf')}}" method="POST">
	@csrf
	<div class="billing-form__legend"> * Required fields</div>
	<div class="c-form-field c-form-field--vertical">
	<div class="c-form-field__container">
	<div class="c-input c-input--with-label billing-form__field">
	<div class="c-input__container">
	<label class="c-input__label" for="c-input-3241">First name *</label>
	<input id="c-input-3241" class="c-input__field" value data-test-id="billing-fullname" type="text" name="name" autocomplete="name" required>
	</div>
	<span class="c-input__icon c-input__icon--posticon"></span>
	</div>
	</div>
	</div>

	<div class="c-form-field c-form-field--vertical">
	<div class="c-form-field__container">
	<div class="c-input c-input--with-label billing-form__field">
	<div class="c-input__container">
	<label class="c-input__label" for="c-input-3241">surname *</label>
	<input id="c-input-3241" class="c-input__field" value data-test-id="billing-fullname" type="text" name="surname" autocomplete="surname" modelvalue>
	</div>
	<span class="c-input__icon c-input__icon--posticon"></span>
	</div>
	</div>
	</div>

	<div class="c-form-field c-form-field--vertical">
	<div class="c-form-field__container">
	<div class="c-input c-input--with-label billing-form__field">
	<div class="c-input__container"><label class="c-input__label" for="c-input-3246">Email *</label>
	<input id="c-input-3246" class="c-input__field" value data-test-id="billing-email" type="email" name="email" modelvalue>
	</div>
	<span class="c-input__icon c-input__icon--posticon"></span></div>
	</div>
</div>


	<div class="c-form-field c-form-field--vertical">
	<div class="c-form-field__container">
	<div class="c-input c-input--with-label billing-form__field">
	<div class="c-input__container">
	<label class="c-input__label" for="c-input-3241">Country</label>
	<select name="negaras" class="c-input__field">
	<option class="option" value="">Select Your Country</option>
		@foreach($country as $item)
	<option value="{{$item->nicename}}" id="countrys" class="option">{{$item->nicename}}</option>
	@endforeach
	</select>
	</div>
	<span class="c-input__icon c-input__icon--posticon"></span>
	</div>
	</div>
	</div>

	<div class="c-form-field c-form-field--vertical billing-form__field billing-form__phone-number">
	<div class="c-form-field__container">
	<section class="billing-form__country-phone-picker">
	<span class="select-label">Phone</span>
	<span class="select-mobile-label" id="countrymobile"></span>
	<div class="gyg-select">
	<select value="" class="gyg-select-field" id="countryphone" modelvalue="" name="country" data-test-id="country-form-select" autocomplete="country">
	<option class="option" value="Entercode">Select Phone Number Code</option>
	@foreach($country as $item)
	<option value="{{$item->phonecode}}" class="option" value="+{{$item->phonecode}}">{{$item->nicename}} (+{{$item->phonecode}})</option>
	@endforeach
	</select>
	<span class="gyg-select-icon gyg-select-icon-posticon">
	<span class="gyg-select-caret"></span>
	</span>
	</div>
	<div class="c-input c-input--with-label">
	<div class="c-input__container">
	<label class="c-input__label" for="c-input-1693">Phone number *</label>
	<input id="c-input-1693" class="c-input__field" value data-test-id="billing-phone-nr" autocomplete="tel-national" type="tel" name="phone" modelvalue>
	</div>
	<span class="c-input__icon c-input__icon--posticon"></span>
	</div>
	
	</section>
	</div>
	</div>

	<div class="c-form-field c-form-field--vertical">
	<div class="c-form-field__container">
	<div class="c-input c-input--with-label billing-form__field">
	<div class="c-input__container">
	<label class="c-input__label" for="c-input-3241">Pickup Location *</label>
	<input id="c-input-3241" class="c-input__field" value data-test-id="billing-fullname" type="text" name="pickup" autocomplete="pickup" modelvalue required="">
	</div>
	<span class="c-input__icon c-input__icon--posticon"></span>
	</div>
	</div>
	</div>
	
	<section class="supplier-requested-information-collection">

	<section class="supplier-requested-information supplier-requested-information-collection__supplier-requested-information">
	<div class="supplier-requested-information__booking-level">
	<div class="supplier-requested-information__entry">
	<div class="pickup-location">
	</div>
  	</div>
  	</div>
 	<div class="supplier-requested-information__entry">
 	<div class="fallback-answer">
 	<div class="fallback-answer__label">Special Request</div>
 	<div class="c-form-field c-form-field--vertical">
 	<div class="c-form-field__container">
 	<div class="c-textarea fallback-answer__description">
 	<textarea id="c-textarea-2030" name="request" class="c-textarea__field" rows="5" modelvalue placeholder></textarea>
 	</div>
 	</div>
 	</div>
 	</div>
 	</div>
 	</section>
	</section>
	<input type="hidden" name="idtravel" value="{!! $idtravel !!}">
	<input type="hidden" name="idoption" value="{!! $idoption !!}">
	<input type="hidden" name="namawisata" value="{!! $namawisata !!}">
	<input type="hidden" name="paketwisata" value="{!! $paketwisata !!}">
	<input type="hidden" name="waktu" value="{!! $waktu !!}">
	<input type="hidden" name="tanggal" value="{!!$tanggaltravel!!}">
	<input type="hidden" name="adult" value="{!! $adult !!}">
	<input type="hidden" name="child" value="{!! $child !!}">
	<input type="hidden" name="group" value="{!! $group !!}">
	<input type="hidden" name="total" value="{!! $total !!}">
	<input type="hidden" name="totalgroup" value="{!! $totalgroup !!}">

	<div class="overlay billing-form__loading-overlay">
	<div class="billing-form__validate-billing-details-and-sri">
	<button class="c-button c-button--medium filbtn billing-form__validate-billing-details-and-sri__button" type="submit" data-test-id="checkout-submit-btn" id="tess">Confirm</button>
	</form>
	</div>
	</div>

	
	</div>
	</div>
	</section>
	
	<section class="customer-information__sidebar">
	<div class="order-summary-collapsible customer-information--desktop-only" data-test-id="order-summary" style="">
	<h3 class="order-summary-collapsible__title">Order summary</h3>
	<div class="order-summary-collapsible__container">
	<section>
	<div class="order-summary-collapsible__cart-items">
	<div class="cart-item" data-test-id="cart-item" data-v-039efa20>
	<section class="cart-item__activity-container" data-v-039efa20>
	<div class="cart-item__activity-container--main-info" data-v-039efa20>
	<div class="cart-item__activity-container--main-info--title" data-v-039efa20>{!! $paketwisata !!}</div>
	<br/>
	<div class="cart-item__description--rating" data-v-039efa20>
	<div class="rating-overall__container" data-v-039efa20>
	<div class="rating-overall__rating">
	
	<div class="rating-star rating-overall__rating-stars">
	<div class="small-ratings">
	@php
            $rating = $rating;
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
            @if($rating == null)
            @for ($i = 1; $i <= 5; $i++)
                <i class="fa fa-star rating-color" style="color:grey !important;"></i>
            @endfor
            @endif
              </div>
	</div>
	@if($rating == null)
	<span class="rating-overall__rating-reviews">(0)</span>
	@else
	<span class="rating-overall__rating-reviews">({!! $rating !!})</span>
	@endif
	</div>
	</div>
	</div>
	
	</div>
	<div class="cart-item__description" data-v-039efa20>
	<div class="cart-item__description--details" data-v-039efa20>
	<div class="cart-item__description--details--entry" data-v-039efa20>
	<div data-v-039efa20><i class="fas fa-map"></i> {!! $namawisata !!}</div>
	</div>
	<div class="cart-item__description--details--entry" data-v-039efa20>
	
	<div data-v-039efa20><i class="fa-regular fa-calendar"></i> Travel date: {!!$tanggaltravel!!}</div>
	
	<div data-v-039efa20><i class="fa-regular fa-clock"></i> Pickup time: {!! $waktu !!}</div>
	</div>
	<div class="cart-item__description--details--entry" data-v-039efa20>
	<div data-v-039efa20>
	@if($adult > 0)
	<div data-v-039efa20><i class="fa-solid fa-user-group"></i> Participants: {!! $adult !!} Adult </div>
	
	@else<p></p>@endif
	@if($child > 0)
	<div data-v-039efa20><i class="fa-solid fa-user-group"></i> Participants: {!! $child !!} Child </div>
	
	@else<p></p>@endif
	@if($group > 0)
	<div data-v-039efa20><i class="fa-solid fa-user-group"></i> Participants: {!! $group !!} Person</div>
	
	@else<p></p>@endif
	</div>
	</div>
	</div>
	</div>
	
	</section>
	</div>
	</div>
	
	<div class="order-summary-collapsible__total">
	<div class="order-summary-collapsible__total--items-count">Total</div>
	<div class="order-summary-collapsible__total--price">
	@if($total > 0)
	<div class="order-summary-collapsible__total--price--total-price">{!! $total !!}</div>
	
	@endif
	@if($totalgroup > 0)
	<div class="order-summary-collapsible__total--price--total-price">{!! $totalgroup !!}</div>
	
	@endif
	<div class="order-summary-collapsible__total--price--no-fees">All taxes and fees included</div>
	
	</div>
	</div>
	</section>

	</div>
	<section></section>
	</div>
	</section>
	</div>
	</main>
	<footer class="page-footer" style="background-color:  #fc2c04;">
	<div class="page-footer__content">
	<nav class="navigation page-footer__navigation">
	<div class="navigation__directory"><p class="navigation__item navigation__item-section_copyright">
	<span> © <time>{{ now()->year }}</time> Jogja Borobudur Tour &amp; Travel</span></p>
	
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
    
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
        </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="{{asset('traveler')}}/js/jquery.min.js"></script>
  <script src="{{asset('traveler')}}/js/bootstrap.min.js"></script>
  <script src="{{asset('traveler')}}/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="{{asset('traveler')}}/js/jquery.min.js"></script>
  

<script type="text/javascript">
  $(document).ready(function(){
	const country = {!! $country !!}
	$('#countryphone').on('change', function() {
	let countrymobile=$("#countrymobile").val()
	let countryphone=$("#countryphone").val()
	if (countryphone != null){
		$("#countrymobile").text("+"+countryphone)
	}
	});
  });
  </script>
  <script>
	$(document).ready(function () {
    $('form').submit(function () {
        return validateForm();
    });

    function validateForm() {
        var fullName = $('input[name="name"]').val().trim();
		var phoneCode = $('select[name="country"]').val().trim();
		var surName = $('input[name="surname"]').val().trim();
		var specialReq = $('textarea[name="request"]').val().trim();
		var email = $('input[name="email"]').val().trim();
		var phone = $('input[name="phone"]').val().trim();
		var pickup = $('input[name="pickup"]').val().trim();
		var selectedCountry = $('select[name="negaras"]').val();
        if (fullName === '') {
            swal("Error", "First Name cannot be empty.", "error");
            return false; 
        }

		if (surName === '') {
            swal("Error", "Surname cannot be empty.", "error");
            return false; 
        }


		if (email === '') {
            swal("Error", "Email cannot be empty.", "error");
            return false; 
        }

		if (!selectedCountry) {
            swal("Error", "Please select a country.", "error");
            return false;
        }

		if (phoneCode == 'Entercode') {
            swal("Error", "Please select your country code.", "error");
            return false;
        }

		if (phone === '') {
            swal("Error", "Phone number cannot be empty.", "error");
            return false; 
        }

		if (pickup === '') {
            swal("Error", "Pickup location cannot be empty.", "error");
            return false; 
        }

		if (specialReq === '') {
            swal("Error", "Special request cannot be empty.", "error");
            return false; 
        }

        return true;
    }
});
  </script>

</body>
</html>