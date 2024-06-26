@extends('payment.index')
@section('content')
<div class="customer-information__container customer-information__order-summary--mweb customer-information--mweb-only">
	<div class="order-summary-collapsible" data-test-id="order-summary" style="">
	<div class="order-summary-collapsible__container">
	<div class="isCollapsed order-summary-collapsible__controllers">
	<div>
    <!-- summary in phone -->
	<ul>
	<li>Your order summary :<br></li>
	<li><br></li>
	<li>{!! $data->paketwisata !!}</li>
	<li><br></li>
	<li><i class="fas fa-map"></i> {!! $data->wisata->namawisata !!}</li>
	<li><i class="fa-regular fa-calendar"></i> Travel Date: {!!$data->traveldate !!}</li>
	<li><i class="fa-regular fa-clock"></i> Pickup time: {!! $data->time !!}</li>
	@if($data->adult > 0)
	<li><i class="fa-solid fa-user-group"></i> Participant : {!! $data->adult !!} (Adult)</li>
	@else<p></p>@endif
	@if($data->child > 0)
	<li><i class="fa-solid fa-user-group"></i> Participant : {!! $data->child !!} (Child)</li>
	@else<p></p>@endif
	@if($data->group > 0)
	<li><i class="fa-solid fa-user-group"></i>Participant : {!! $data->group !!} (Person)</li>
	@else<p></p>@endif
	<li><p style="margin-bottom:10px;"></p></li>
	@if($data->total > 0)
	<li>Total: {!! $data->total !!}</li>
	@else<p></p>@endif

	@if($data->totalgroup > 0)
	<li>Total: {!! $data->totalgroup !!}</li>
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
	<li id="step-item-checkout" class="step-navigation__list--step" data-v-5a727b98>
    Detail Information</li>
    <li id="step-item-checkout" class="step-navigation__list--step--active step-navigation__list--step" data-v-5a727b98>
    Payment Method</li>
	</ul>
	</div>
    <div class="alert alert-warning m-3" role="alert">
    Your payment due {{ \Carbon\Carbon::parse($data->cust_time)->isoFormat('DD MMMM YYYY [at] h:mm A')}}
    </div>
	</section>
	</div>

  <div class="customer-information__container" data-test-id="checkout-section">
	<section class="customer-information__content">
	<div style="" class="billing-form"><h2>Choose payment methods</h2>
	<div class="billing-form__container">
 
  <div class="method">
  <div class="card">
  <div class="card-body">
  <div class="form-check">
  <input class="form-check-input" type="radio" value="bank" name="method" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Bank transfer <i class="far fa-credit-card"></i> 
  </label>
</div>
  </div>
  </div>
  <div class="card mb-4 border-top-0" id="bank">
  <div class="card-body">
  <form action="{{route('paymenttransfer')}}" method="post" id="formbank">
    <input type="hidden" name="idBooking" value="{{$data->id}}" id="">
    @csrf
      <p class="text-muted">
      You will receive an email from us to complete the payment.</p>
      <button type="submit" class="btnbank btn rounded-pill btn-dark mt-3 w-75">
		<p id="textbank">Confirm</p>
		<div id="spinersbank" class="spinner-border text-white" style="width: 1.5rem; height: 1.5rem;"></div>
		</button>
    </form>
  </div>
</div>

  <div class="card mt-3">
  <div class="card-body">
  <div class="form-check">
  <input class="form-check-input" type="radio" value="paypal" name="method" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Credit card (PayPal) <i class="fab fa-paypal"></i>
  </label>
</div>
  </div>
  </div>
  <div class="card mb-4 border-top-0" id="paypal">
  <div class="card-body">
    <form action="{{route('payment')}}" method="post" id="formpp">
      @csrf
    <input type="hidden" name="amount" value="{!! $data->amount !!}">
    <input type="hidden" name="bookingId" value="{!! $data->id !!}">
    <input type="hidden" name="currency" value="{!! $data->currency !!}">
    <p class="text-muted">You will be redirected in a new window to PayPal to complete payment.</p>
    <button type="submit" class="btnpp btn btn-dark rounded-pill mt-3 w-75">
	<p id="textpp">Confirm</p>
	<div id="spinerspp" class="spinner-border text-white" style="width: 1.5rem; height: 1.5rem;"></div>
	</button>
    </form>
  </div>
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
	<div class="cart-item__activity-container--main-info--title" data-v-039efa20>{!! $data->wisata->namawisata !!}</div>
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
	<div data-v-039efa20><i class="fas fa-map"></i> {!! $data->paketwisata !!}</div>
	</div>
	<div class="cart-item__description--details--entry" data-v-039efa20>
	<div data-v-039efa20><i class="fa-regular fa-calendar"></i> Travel date: {!!$data->traveldate!!}</div>
	<div data-v-039efa20><i class="fa-regular fa-clock"></i> Pickup time: {!! $data->time !!}</div>
	</div>
	<div class="cart-item__description--details--entry" data-v-039efa20>
	<div data-v-039efa20>
	@if($data->adult > 0)
	<div data-v-039efa20><i class="fa-solid fa-user-group"></i> Participants: {!! $data->adult !!} Adult </div>
	@else<p></p>@endif
	@if($data->child > 0)
	<div data-v-039efa20><i class="fa-solid fa-user-group"></i> Participants: {!! $data->child !!} Child </div>
	@else<p></p>@endif
	@if($data->group > 0)
	<div data-v-039efa20><i class="fa-solid fa-user-group"></i> Participants: {!! $data->group !!} Person</div>
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
	@if($data->total > 0)
	<div class="order-summary-collapsible__total--price--total-price">{!! $data->total !!}</div>
	@endif
	@if($data->totalgroup > 0)
	<div class="order-summary-collapsible__total--price--total-price">{!! $data->totalgroup !!}</div>
	@endif
	<div class="order-summary-collapsible__total--price--no-fees">All taxes and fees included</div>
	</div>
	</div>
	</section>
	</div>
	</div>
	</section>
  </div>
@endsection

@section('script')
<script>
  $(document).ready(function(){
  $('#spinersbank').hide()
  $('#spinerspp').hide()
  $("#bank").css("display","none"); 
  $("#paypal").css("display","none"); 
  $(".method").click(function(){
  if ($("input[name='method']:checked").val() == "bank" ) { 
    $("#bank").slideDown("fast");
    $("#paypal").slideUp("fast");
  } else {
    $("#paypal").slideDown("fast");
    $("#bank").slideUp("fast");
  }
  });
  
  $('#formpp').submit(function(){
	$('#textpp').hide()
	$('#spinerspp').show()
	$('.btnpp').attr('disabled','disabled')
	$('.btnpp').css('text-decoration','none')
  })

  $('#formbank').submit(function(){
	$('#textbank').hide()
	$('#spinersbank').show()
	$('.btnbank').attr('disabled','disabled')
	$('.btnbank').css('text-decoration','none')
  })
  })
</script>
@endsection