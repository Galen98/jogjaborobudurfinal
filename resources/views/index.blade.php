<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>JogjaBorobudur Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{asset('spica')}}/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{asset('spica')}}/vendors/css/vendor.bundle.base.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://fonts.cdnfonts.com/css/gt-eesti-display-trial" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('spica')}}/css/style.css">
   <link rel="preload" href="{{asset('traveler')}}/css/new.css" as="style">
  <link rel="stylesheet" href="{{asset('traveler')}}/css/new2.css">
  <link rel="stylesheet" href="{{asset('traveler')}}/css/grids.css">
  <link rel="stylesheet" href="{{asset('traveler')}}/css/activity.css">
  <link rel="stylesheet" href="{{asset('traveler')}}/css/location.css">
  <link rel="shortcut icon" href="{{asset('spica')}}/images/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/blitzer/jquery-ui.min.css" integrity="sha512-ibBo2Ns078qm7xZNTPbIrg5XP4pZ+Aujfmz0QFsce2f4LYpCnF1Esy6FkIRFBgXC9cY30XiS7Ui9+RpN8K7ICg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.tiny.cloud/1/u2xw6yackdc61xx9e7q9zfuoioxbk0b4gxo0rnuc2dl0r5nv/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" ></script>
  <link rel="stylesheet" href="{{asset('traveler')}}/css/bootstrap-datepicker.min.css">
  <script>
    tinymce.init({
      selector: '#replymail',
      plugins: 'link code lists',
      toolbar: 'undo redo | bold italic | alignleft aligncenter | link | code',
      height: 300
    });
  </script>
  <script>
	tinymce.init({
  selector: 'textarea#mytextarea',
  plugins: 'image code link',
  default_link_target: '_blank',
  toolbar: 'undo redo | link image | code',
  /* enable title field in the Image dialog*/
  image_title: true,
  /* enable automatic uploads of images represented by blob or data URIs*/
  automatic_uploads: true,
  /*
    URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
    images_upload_url: 'postAcceptor.php',
    here we add custom filepicker only to Image dialog
  */
  file_picker_types: 'image',
  /* and here's our custom image picker*/
  file_picker_callback: (cb, value, meta) => {
    const input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');

    input.addEventListener('change', (e) => {
      const file = e.target.files[0];

      const reader = new FileReader();
      reader.addEventListener('load', () => {
        /*
          Note: Now we need to register the blob in TinyMCEs image blob
          registry. In the next release this part hopefully won't be
          necessary, as we are looking to handle it internally.
        */
        const id = 'blobid' + (new Date()).getTime();
        const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        const base64 = reader.result.split(',')[1];
        const blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        /* call the callback and populate the Title field with the file name */
        cb(blobInfo.blobUri(), { title: file.name });
      });
      reader.readAsDataURL(file);
    });

    input.click();
  },
  content_style: 'body { font-family:GT Eesti Display Trial; font-size:16px }',
  
});
  </script>
  
  <script>
		tinymce.init({
			selector: '#mytextarea2',
      menubar: false,
      toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
      content_style: 'body { font-family:GT Eesti Display Trial; font-size:16px }',
		});
	</script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.css" integrity="sha512-FA9cIbtlP61W0PRtX36P6CGRy0vZs0C2Uw26Q1cMmj3xwhftftymr0sj8/YeezDnRwL9wtWw8ZwtCiTDXlXGjQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.css" integrity="sha512-/Jsoj+nRoCkEHw4HnymLk48dWblqtN+0rW+UMAanfbHZjzgphJipQOEuuOEdZ0IzSEYgK0NXCNda8r+4juGbPg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
  <div class="container-scroller d-flex">
    <!-- partial:./partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color:  #182c4c; ">
      <ul class="nav">
        <li class="nav-item sidebar-category">
          <p>Menu</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/home">
            <i class="mdi mdi-view-quilt menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
       @yield('nav')
      </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
         
         
          <ul class="navbar-nav navbar-nav-right">  
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="navbar-brand-wrapper">
            <a class="navbar-brand brand-logo" href="/home">
              <img src="{{asset('spica')}}/images/logomini.png" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="/home"><img src="{{asset('spica')}}/images/logomini.png" alt="logo"/></a>
          </div>
        </div>
        <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center" style="background-color: transparent;">
          <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
              <!-- <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Here..." aria-label="search" aria-describedby="search">
              </div> -->
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown text-dark">
              <a class="nav-link dropdown-toggle btn btn-light rounded-lg" href="#" data-toggle="dropdown" id="profileDropdown">
                <span class="nav-profile-name text-dark text-capitalize">{{ Auth::user()->name }}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown text-dark" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="mdi mdi-logout text-primary"></i>
                  Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        @yield('content')
        @yield('blog')
          <div class="row">
            
          </div>
          <!-- row end -->
          <div class="row">
            
          </div>
          <!-- row end -->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:./partials/_footer.html -->
        <!-- <footer class="footer">
          <div class="card">
            <div class="card-body">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © JogjaBorobudur 2022</span>
              </div>
            </div>
          </div>
        </footer> -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="{{asset('spica')}}/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{asset('spica')}}/vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('spica')}}/js/off-canvas.js"></script>
  <script src="{{asset('spica')}}/js/hoverable-collapse.js"></script>
  <script src="{{asset('spica')}}/js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="{{asset('spica')}}/js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
  <script src="{{asset('traveler')}}/js/bootstrap-datepicker.min.js"></script>  
  <!-- Main -->
  <script> 
  var dateForm = function() {
		$('#date-start').datepicker({
			format: 'yyyy-mm-dd',
			startDate: new Date(),
			todayHighlight: true,
            autoclose: true,
            orientation: 'bottom',		
		});
	};
  $(function(){
    dateForm();
  });
</script> 
<script>
  $(document).ready(function(){
    $('.underdev').click(function(){
      swal("Error", "This feature under development", "error");
    })
  })
</script>
@yield('scripts')
</body>

</html>