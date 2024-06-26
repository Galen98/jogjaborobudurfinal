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
    <link rel="stylesheet" href="{{asset('traveler')}}/css/bootstrap.css">
	<link data-vue-meta="ssr" rel="preload" href="{{asset('font')}}/GT-Eesti-Pro-Display-Regular.woff2" as="font" type="font/woff2" crossorigin="true">
  <link data-vue-meta="ssr" rel="preload" href="{{asset('font')}}/GT-Eesti-Pro-Display-Medium.woff2" as="font" type="font/woff2" crossorigin="true">
  <link data-vue-meta="ssr" rel="preload" href="{{asset('font')}}/GT-Eesti-Pro-Display-Bold.woff2" crossorigin="true">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('spica')}}/images/favicon.png">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('spica')}}/images/favicon.png">
<link rel="shortcut icon" href="favicon.png">
<meta name="viewport"content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"
        />
    <title>Lets-Review</title>
    <link rel="stylesheet" href="{{asset('traveler')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('traveler')}}/css/booking10.css">
    <link rel="stylesheet" href="{{asset('traveler')}}/css/booking11.css">
    <link rel="stylesheet" href="{{asset('traveler')}}/css/grids.css">
  <link rel="stylesheet" href="{{asset('traveler')}}/css/activity.css">
  <link rel="stylesheet" href="{{asset('traveler')}}/css/location.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" ></script>
  <style>
    input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
label.success {
    color: green; /* Atau gaya atau warna lain sesuai kebutuhan Anda */
}
</style>
  </head>
  <body>
  <header data-test-id="page-header" class="page-header light" data-v-3a2bcacc style="background-color:#fc2c04;margin-top: 0px;">
  <div class="page-header__content" data-v-36cff088>
	<div class="page-header__logo-image" role="img">
	<img src="{{asset('spica')}}/images/logomini.png" class="logs" alt="logo" style="margin-top:10px;"/>
	</div>
	</div> 
  
  <nav data-test-id="page-header-nav" class="navigation page-header__navigation light" data-v-3a2bcacc >
    </nav>
    </header>
  <div id="gyg">
	<div>
	<div class="main-wrapper  partner-left-layout customer-information customer-information--gyg-symbol-on-mobile">
    <main class="container">
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <br>
    <div>
    <div class="row">
        
<div class="col mt-4">
   <form class="py-2 px-4" id="forms" action="{{url('insertreview')}}" enctype="multipart/form-data" style="" method="POST" autocomplete="off">  
   @csrf
    @method('patch')
    @if(empty($databooking->name))
      <input type="hidden" value="{!! $datareview->name !!}" name="name"/>
    @else
    <input type="hidden" value="{!! $databooking->name !!}" name="name"/>
    @endif
    @if(empty($databooking->traveldate))
    <input type="hidden" name="traveldate">
    @else
      <input type="hidden" value="{!! $databooking->traveldate !!}" name="traveldate"/>
    @endif
    @if(empty($databooking->paketwisata))
    <input type="hidden" name="paketwisata">
    @else
      <input type="hidden" value="{!! $databooking->paketwisata !!}" name="paketwisata"/>
    @endif
      <input type="hidden" value="{!! $datareview->id !!}" name="reviewid"/>
      <input type="hidden" value="{!! $datareview->wisata_id !!}" name="travelid"/>
    @if(empty($databooking->country))
      <input type="hidden" value="{!! $datareview->country !!}" name="country"/>
    @else
    <input type="hidden" value="{!! $databooking->country !!}" name="country"/>
    @endif
      <div class="form-group row">
       <div class="col">
         <div class="rate">
           <br>
     <span data-test-id="collection-title" class="collection-header_title" style="font-size:22px;font-weight:bolder;">
     Rate your experience
   </span> 
  </div>
  </div>
</div>
      <div class="form-group row">
         <div class="col">
            <div class="rate" >
               <input type="radio" id="star5" class="rate" name="rating" value="5" />
               <label for="star5" title="text"></label>
               <input type="radio" id="star4" class="rate" name="rating" value="4"/>
               <label for="star4" title="text"></label>
               <input type="radio" id="star3" class="rate" name="rating" value="3"/>
               <label for="star3" title="text"></label>
               <input type="radio" id="star2" class="rate" name="rating" value="2">
               <label for="star2" title="text"></label>
               <input type="radio" id="star1" class="rate" name="rating" value="1"/>
               <label for="star1" title="text"></label>
            </div>
         </div>
      </div>
      <div class="form-group row mt-4">
         <div class="col">
            <textarea id="myTextarea" class="form-control" name="comment" rows="6" placeholder="Write your review for this experience" maxlength="1000"></textarea>
            <p style="margin-top:15px;" id="textareaLength"></p>
         </div>
      </div>
      <br>
      <div class="form-group row mt-4">
      <div class="rate">
      <span data-test-id="collection-title" class="collection-header_title" style="font-size:18px;font-weight:bolder;">Add some photos</span>
    </div>
    <br>
    <br>
    <br>
  <div style="margin-top:-15px;">
  <div class="col">
  <label for="file-upload-1"  class="custom-file-upload">
    <i id="icon-1" class="fa fa-cloud-upload"></i> Photo 1
</label>
<input id="file-upload-1" type="file" name="images" accept=".jpg, .jpeg, .png, .JPG, .PNG"/>

<label for="file-upload-2" class="custom-file-upload">
    <i id="icon-2" class="fa fa-cloud-upload"></i> Photo 2
</label>
<input id="file-upload-2" type="file" name="images2" accept=".jpg, .jpeg"/>

<label for="file-upload-3" class="custom-file-upload">
    <i id="icon-3" class="fa fa-cloud-upload"></i> Photo 3
</label>
<input id="file-upload-3" type="file" name="images3" accept=".jpg, .jpeg"/>
</div>

<div class="col" style="margin-top:15px;">
<label for="file-upload-4" class="custom-file-upload">
    <i  id="icon-4" class="fa fa-cloud-upload"></i> Photo 4
</label>
<input id="file-upload-4" type="file" name="images4" accept=".jpg, .jpeg"/>

<label for="file-upload-5" class="custom-file-upload">
    <i id="icon-5" class="fa fa-cloud-upload"></i> Photo 5
</label>
<input id="file-upload-5" type="file" name="images5" accept=".jpg, .jpeg"/>
</div>
</div>
    </div>

    <div class="">
    <div class=" col">
    <div id="photo-preview-container" class="d-none d-sm-block">
    <!-- Preview images will be displayed here -->
    </div>
  </div>
</div>

    <hr>
    <div class="mt-3 text-right">
         <button type="submit" class="c-button--medium billing-form__validate-billing-details-and-sri__button filbtn" type="button" data-test-id="checkout-submit-btn">Submit</button>
      </div>  
</form>
</div> 
</div>
</main>
</div>
<footer class="page-footer" style="background-color:  #fc2c04;">
	<div class="page-footer__content">
	<nav class="navigation page-footer__navigation">
	<div class="navigation__directory"><p class="navigation__item navigation__item-section_copyright">
	<span> © <time>{{ now()->year }}</time> Jogja Borobudur Tour &amp; Travel</span></p>
	</div>
	</nav>
	</div>
	</footer>
</div>
</div>
<!-- <script>
$(document).ready(function () {
    const inputPhotos = $('input[name="images"]');
    const photoPreviewContainer = $('#photo-preview-container');
    const maxAllowedPhotos = 5;
    const maxFileSizeMB = 2;

    inputPhotos.on('change', function () {
        PhotoPreview(this.files);
    });

    function PhotoPreview(files) {
        if (files.length > maxAllowedPhotos) {
            swal("Error", "Max allowed photos is 5", "error");
            return;
        }

        // Dapatkan nama file dari gambar-gambar yang sudah ada
        // const existingImageNames = [];

        // // Dapatkan nama file dari gambar-gambar yang sudah ada
        // photoPreviewContainer.find('img').each(function () {
        //     const imageName = $(this).data('filename');
        //     existingImageNames.push(imageName);
        // });

        // Tambahkan gambar-gambar baru ke container
        $.each(files, function (index, file) {
            const reader = new FileReader();
            // Validasi ukuran file
            if (file.size > maxFileSizeMB * 1024 * 1024) {
                swal("Error", "File size exceeds 2MB limit", "error");
                return;
            }
            reader.onload = function (e) {
                const img = $('<img>').attr('src', e.target.result).data('filename', file.name).css({
                    'max-width': '70px',
                    'max-height': '70px',
                    'margin-right': '20px',
                });
                photoPreviewContainer.append(img);
            };

            reader.readAsDataURL(file);
        });
        // const allImageNames = existingImageNames.concat(Array.from(files, file => file.name));
        // inputPhotos.data('existing-images', allImageNames);
    }
});

    </script> -->

    <script>
$(document).ready(function () {
    $('body').on('change', 'input[type="file"]', function () {
        const inputId = $(this).attr('id');
        const iconId = 'icon-' + inputId.split('-')[2];
        $('#' + iconId).removeClass('fa-cloud-upload').addClass('fa-check-circle').css('color', 'green');
    });
});
</script>

<script>
$(document).ready(function() {
  var theCounter = $('#textareaLength'),
    textarea = $('#myTextarea'),
    maxLength = textarea.attr('maxlength');

    theCounter.text('0 / '+maxLength);
    theCounter.css({  
        'top': (textarea.offset().top + textarea.height()) - theCounter.height(),
        'left': (textarea.offset().left + textarea.width()) - theCounter.width()
    });

    textarea.on('keydown', function() {  
        var theLength = $(this).val().length;
        theCounter.text($(this).val().length+' / '+maxLength)
        .css({  
        'left': (textarea.offset().left + textarea.width()) - theCounter.width()
         });
    });

    function validateForm() {
        if (!$('input[name="rating"]:checked').val()) {
            swal("Error", "Please select a rating.", "error");
            return false;
        }

        var comment = $('textarea[name="comment"]').val().trim();
        if (comment === '') {
            swal("Error", "Review cannot be empty.", "error");
            return false; 
        }

        return true;
    }

    $('form').submit(function() {
        return validateForm();
    });
});
</script>
</body>