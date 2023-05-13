<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('tailblog')}}/src/css/fontawesome-all.min.css">
    <link href="https://fonts.cdnfonts.com/css/gt-eesti-display-trial" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('tailblog')}}/src/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('spica')}}/images/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('spica')}}/images/favicon.png">
    @foreach($blog as $item)
    <title>{{$item->judulblog}}</title>
     <!-- primary tag SEO -->
  <meta name="title" content="{{$item->judulblog}}" />
  <meta name="robots" content="index, follow">
  <meta name="keywords" content="blog travel, travel, wisata, borobudur, prambanan, yogyakarta, explore">
  <meta name="description" content="{{$item->shortdescription}}"/>
  <!-- facebook tag -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="www.jogjaborobudur.com" />
  <meta property="og:title" content="{{$item->judulblog}}" />
  <meta property="og:description"
    content="{{$item->shortdescription}}" />
  <meta property="og:image" content="{{asset('spica')}}/images/logomini.png" />
  <!-- end tag -->
  @endforeach
    <style type="text/css">
        .dropdown:hover .dropdown-menu {
  display: block;
}
@import url('https://fonts.cdnfonts.com/css/gt-eesti-display-trial');
body{
font-family: 'GT Eesti Display Trial';
font-family: 'GT Eesti Text Trial';    
}

    </style>


<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/> <!-- jQuery --> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> <!-- Share JS --> <script src="{{ asset('js/share.js') }}"></script> <style> #social-links ul{ padding-left: 0; } #social-links ul li { display: inline-block; } #social-links ul li a { padding: 6px; border: 1px solid #ccc; border-radius: 5px; margin: 1px; font-size: 25px; } #social-links .fa-facebook{ color: #0d6efd; } #social-links .fa-twitter{ color: deepskyblue; } #social-links .fa-whatsapp{ color: #25D366 } #social-links .fa-telegram{ color: #0088cc; } </style>
</head>

<body class="text-gray-600">
    <!-- navbar -->
    <nav class="" style="background-color:#fc2c04;color:white;">
        <div class="container px-4 mx-auto flex items-center py-3 shadow-sm">
            <!-- logo -->
            <div class="lg:w-14 w-16">
                <a href="/blog">
                    <img src="{{asset('tailblog')}}/src/images/logomini.png" alt="logo" class="w-full">
                </a>
            </div>
            <!-- logo end -->

            <!-- navlinks -->
            <div class="ml-12 lg:flex space-x-5  hidden">
                <a href="/blog"
                    class="flex items-center  text-sm  transition hover:text-blue-500">
                    <span class="mr-2">
                        
                    </span>
                    Home
                </a>
                <a href="/about-us"
                    class="flex items-center  text-sm  transition hover:text-blue-500">
                    <span class="mr-2">
                        
                    </span>
                    About
                </a>
                <a href="/contact/contacts-us"
                    class="flex items-center  text-sm  transition hover:text-blue-500">
                    <span class="mr-2">
                        
                    </span>
                    Contact
                </a>

                <div class="p-10">

                </div>
            </div>
            <!-- navlinks end -->

            <!-- searchbar -->
            <div class="relative lg:ml-auto hidden lg:block">
                <span class="absolute left-3 top-2 text-sm text-gray-500">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text"
                    class="block w-full shadow-sm border-none rounded-3xl  pl-11 pr-2 py-2 focus:outline-none bg-gray-50 text-sm text-gray-700 placeholder-gray-500"
                    placeholder="Search">
            </div>


            <div class="lg:ml-5 ml-auto">
               <div class="dropdown inline-block relative">
    <button class="flex items-center  text-sm  transition hover:text-blue-500">
      <span class="mr-1">Language</span>
      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
    </button>
    <ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
        @foreach($language as $item)
      <li class=""><a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="/change-bahasa/{{$item->bahasa}}">{{$item->bahasa}}</a>
      </li>
      @endforeach
    </ul>
  </div>
            </div>
            <div class="text-xl text-gray-700 cursor-pointer ml-4 xl:hidden block hover:text-blue-500 transition" id="open_sidebar">
                <i class="fas fa-bars" style="color:white;"></i>
            </div>
            <!-- searchbar end -->

        </div>
    </nav>
    @yield('breadscrumb')


    <!-- main -->
    <main class="pt-12 bg-gray-100 pb-12">
        @yield('content')            
    </main>

    <!-- mobile menu -->
    <div class="fixed w-full h-full bg-black bg-opacity-25 left-0 top-0 z-10 opacity-0 invisible transition-all duration-500 xl:hidden" id="sidebar_wrapper">
        <div class="fixed top-0 w-72 h-full bg-white shadow-md z-10 flex flex-col transition-all duration-500 -left-80" id="sidebar">

            <!-- search and menu -->
            <div class="lg:hidden">
                <!-- searchbar -->
                <div class="relative mx-3 mt-3 shadow-sm">
                    <span class="absolute left-3 top-2 text-sm text-gray-500">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text"
                        class="block w-full shadow-sm border-none rounded-3xl  pl-11 pr-2 py-2 focus:outline-none bg-gray-50 text-sm text-gray-700 placeholder-gray-500"
                        placeholder="Search">
                </div>
        
                <!-- navlink -->
                <h3 class="text-xl font-semibold text-gray-700 mb-1  pl-3 pt-3">Menu</h3>
                <div class="">
                    <a href="/jogjaborobudurblog"
                        class="flex px-4 py-1 uppercase items-center font-semibold text-sm  transition hover:text-blue-500">
                        <span class="w-6">
                        </span>
                        Home
                    </a>
                    <a href="/about-us"
                        class="flex px-4 py-1 uppercase items-center font-semibold text-sm  transition hover:text-blue-500">
                        <span class="w-6">
                        </span>
                        About
                    </a>
                    <a href="/contact/contacts-us"
                        class="flex px-4 py-1 uppercase items-center font-semibold text-sm  transition hover:text-blue-500">
                        <span class="w-6">
                        </span>
                        Contact
                    </a>
                </div>
                <!-- navlinks end -->
            </div>
    
            <!-- categories -->
            <div class="w-full mt-3 px-4 ">
                
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer class="border-t py-4 shadow-md" style="background-color:white;color:#182c4c;">
        <p class=" text-sm text-center">Copyright © 2023 <span class="font-semibold">Jogjaborobudur Tour & Travel</span>
            All Rights Reserved</p>
    </footer>

    <script>
        document.querySelector('#open_sidebar').addEventListener('click', function(){
            document.querySelector('#sidebar').classList.remove('-left-80')
            document.querySelector('#sidebar').classList.add('left-0')
            document.querySelector('#sidebar_wrapper').classList.remove('opacity-0')
            document.querySelector('#sidebar_wrapper').classList.remove('invisible')
        })

        document.body.addEventListener('click', function(e){
            if(e.target.id==='sidebar_wrapper'){
                document.querySelector('#sidebar').classList.add('-left-80')
                document.querySelector('#sidebar').classList.remove('left-0')
                document.querySelector('#sidebar_wrapper').classList.add('opacity-0')
                document.querySelector('#sidebar_wrapper').classList.add('invisible')
            }
        })
    </script>
</body>
</html>