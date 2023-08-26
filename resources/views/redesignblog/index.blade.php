<!doctype html>
<html lang="en-US" default-lang="en-US">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('redesign-blog')}}/styles.css">
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('spica')}}/images/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('spica')}}/images/favicon.png">
    <title>Jogjaborobudur Tour & Travel - Blog</title>
     <!-- primary tag SEO -->
  <meta name="title" content="jogja Borobudur | Tour & Travel" />
  <meta name="robots" content="index, follow">
    <meta name="keywords" content="blog travel, travel, wisata, borobudur, prambanan, yogyakarta, explore">
  <meta name="description" content="Start your journey with us, and explore the world. Jogja Borobudur Tour & Travel Blog"/>
  <!-- facebook tag -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="www.jogjaborobudur.com" />
  <meta property="og:title" content="jogja borobudur tour & travel" />
  <meta property="og:description"
    content="Jogja Borobudur tour & travel Explore borobudur, prambanan, and many more free cancellation." />
	<meta property="og:image" content="{{ asset('traveler/images/gambarseo2.jpg') }}"/>
  </head>
  <body>
<div class="container-fluid" id="header">
	@yield('nav')
	  <!-- hero section -->
      @yield('herosection')
</div>
<!-- hero ends -->

<!-- Article Grid -->

<div class="container mt-2 mb-2 pt-5 pb-5" id="article-grid">
	<div class="row justify-content-center">
    @yield('artikelcontent')
	@yield('sectionallblog')
	</div> <!-- Article Grid Row Ends -->
</div> <!-- Article Grid Container Ends -->

<!-- More articles button -->

<div class="container text-center pb-3 mb-5">
	@yield('pagination')
</div>


<!-- Footer section  -->

@yield('footer')


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>