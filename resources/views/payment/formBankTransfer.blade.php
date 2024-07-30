@extends('payment.index')
@section('content')
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
    Your payment due {{ \Carbon\Carbon::parse($bookingData->cust_time)->isoFormat('DD MMMM YYYY [at] h:mm A')}}
    </div>
	</section>
</div>

<div class="customer-information__container" data-test-id="checkout-section">
	<section class="customer-information__content">
	<div class="billing-form">
    <h3 class="lead fw-bold mb-3" style="">Hi {!! $bookingData->name !!}, please complete your payment</h3>
    <div class="billing-form__container">
    <div class="card">
    <div class="card-body">
        <form action="transferBankProcess" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="bookingId" id="" value="{!! $bookingId !!}">
            <h5 class="mb-2 fw-normal">Account Number: 8020237067</h5>
            <h5 class="mb-2 fw-normal">Account Holder: Heru Kristanto</h5>
            <h5 class="mb-2 fw-normal">Bank Name: BCA</h5>
            <h5 class="mb-4 fw-normal">Swift Code: CENAIDJA (For International Bank Transfer)</h5>
            <h5 class="mb-4 fw-bolder">Total Amount: {!! $bookingData->total !!}</h5>
            <div class="border-0">
            <label for="proffPay" class="form-label text-muted">Proof of payment</label>
            <input accept="image/*" name="proffPay" onchange="showFiles(this)" class="form-control border-0 text-black" type="file" id="proffPay">
            </div>
            <div class="mt-3"> 
                <div class="row" id="imagePreviews"></div> 
            </div> 
            <button class="btnpay c-button c-button--medium filbtn billing-form__validate-billing-details-and-sri__button" 
            type="submit">
            <p id="txtconfirm">Confirm</p>
            <div id="spiners" style="display:none;width: 1.5rem; height: 1.5rem;" class="spinner-border text-white"></div>
            </button>
        </form>
    </div>
    </div>
    </div>
    </div>
</section>
</div>
@endsection

@section('script')
<script> 
  $('#spiners').hide()
  $('#txtconfirm').show();
  

  if (sessionStorage.getItem('spinnerState') === 'shown') {
    $('#spiners').show()
    $('#txtconfirm').hide();
    $('.btnpay').attr('disabled', true);
    } else {
    $('#spiners').hide()
    $('#txtconfirm').show();
    $('.btnpay').attr('disabled', false);
    }

    $(window).on('beforeunload', function() {
    $('#spiners').show()
    $('#txtconfirm').hide();
    });

    $(window).on('pageshow', function() {
      sessionStorage.removeItem('spinnerState');
      $('#spiners').hide()
      $('#txtconfirm').show();
	  $('.btnpay').attr('disabled', false)
    });

    $('form').submit(function(){
        $('#spiners').show()
        $('#txtconfirm').hide();
        $('.btnpay').css('text-decoration','none')
        $('.btnpay').attr('disabled', true);
        sessionStorage.setItem('spinnerState', 'shown');
    })
  
        function showFiles(input) { 
            const previewsContainer = 
            document.getElementById('imagePreviews'); 
            previewsContainer.innerHTML = ''; 
            const files = input.files; 
            for (let i = 0; i < files.length; i++) { 
                const file = files[i]; 
                const reader = new FileReader(); 
                reader.onload = function (e) { 
                    const preview = document.createElement('div'); 
                    preview.classList.add('col-md-4', 'mb-3'); 
                    preview.innerHTML = ` 
            <img src="${e.target.result}" alt="Preview" class="img-fluid rounded"> 
            <div class="text-center mt-2"> 
            <span class="badge bg-secondary">${file.name}</span> 
            </div> 
        `; 
                    previewsContainer.appendChild(preview); 
                }; 
                reader.readAsDataURL(file); 
            } 
        } 
    </script>
@endsection