@extends('frontend.forindex')
@section('nav')
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
  @endsection
  @section('content')
  <div class="gtco-section">
		<div class="container">
			<div class="row">
    <div class="col-lg-4 col-md-12">
        
    </div>
    <div class="col-lg-4 col-md-6">
   <center> 
    <div class="d-none d-sm-block">
    <span data-test-id="collection-title" class="collection-header_title" style="font-size:40px;font-weight:bolder;">
   Page Not Found
   </span>
    </div>

    <div class="d-block d-sm-none">
    <span data-test-id="collection-title" class="collection-header_title" style="font-size:30px;font-weight:bolder;">
   Page Not Found
   </span>
    </div>
    </center>
    <div class="d-none d-sm-block" style="margin-top:50px;"> 
            <div class="search-box" id="tess">
            <input type="text" id="searchInput" class="form-control search-input" placeholder="Where would you like to go?" name="query">
            <button type="button" class="c-button c-button--medium billing-form__validate-billing-details-and-sri__button filbtn searchprovince" style="margin-right:5px;">
              <i class="fas fa-search"> </i> Search
            </button>
          </div>
          <div id="searchSuggestions"></div>
          </div>

          <div class="d-block d-sm-none" style="margin-top:50px;"> 
            <div class="search-box-mobile" id="tess" style="background-color:white;">
              <i class="fas fa-search" style="margin-left:20px;margin-bottom:2px;"></i>
            <input id="openModalBtn" class="form-control search-input" style="background-color:white;" placeholder="Where would you like to go?" readonly>
          </div>
          <!-- <div id="searchSuggestions1"></div> -->
          </div>

          <div id="myModal" class="modals">
    <div class="modals-content">
    <span class="close">&times;</span>
    <div class="search-box-mobiles" id="tess">
    <input type="text" id="searchInput1" class="form-control search-input" placeholder="Where would you like to go?" name="query">
            <button type="button" class="c-button c-button--medium billing-form__validate-billing-details-and-sri__button filbtn searchprovince1" style="margin-right:5px;">
              <i class="fas fa-search"></i>
            </button>
</div>
<div id="searchSuggestions1"></div>
  </div>
  </div>

    </div>
    <div class="col-lg-4 col-md-6">
    </div>
  </div>
  </div>
</div>
<br>
<br>

<div class="wrapper container" style="overflow:hidden; margin-top:20px;">
<span data-test-id="collection-title" class="collection-header_title" data-v-76e871e0 style="font-size:28px;">
        Our top tours & activities
      </span>
<ul class="horizontal-list" style="margin-bottom:50px;">
  @foreach($province as $item)
 <li><a href="/location/{{$item->slugprovince}}/{{$item->id}}" style="color:#233351;">{{$item->namaprovince}}</a></li> 
  @endforeach
  @foreach($season as $item)
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
@section('scripts')
<script>
$('#searchInput').on('input', function() {
    var query = $(this).val();

    if (query === '') {
        $('#searchSuggestions').empty(); // Clear suggestion list when input is empty
        return;
    }
    
    
    $.ajax({
        url: '/get-search-results', // Change the URL to match your new endpoint
        method: 'GET',
        data: { query: query },
        success: function(data) {
            var results = data.results;
            var suggestionList = '';

            if (results.length === 0) {
                suggestionList = '<div class="suggestion">Destination does not exist</div>';
            } else {
              
                $.each(results, function(index, result) {
                  var icon = '';
                  if (result.type === 'province') {
                    icon = '<i class="fa fa-map-marker" aria-hidden="true"></i> '; 
                  } else if (result.type === 'region') {
                    icon = '<i class="fa fa-map-marker" aria-hidden="true"></i> '; 
                  } else if (result.type === 'destination') {
                    icon = '<i class="fa fa-map-marker" aria-hidden="true"></i> '; 
                  }
                  else if (result.type === 'trip') {
                    icon = '<i class="fa-regular fa-map"></i> '; 
                  }
                    suggestionList += '<div class="suggestion">'  + icon + result.name + '</div>';
                });
            }

            $('#searchSuggestions').html(suggestionList);
        }
    });    
});


$(document).on('click', '.suggestion', function() {
    var suggestionText = $(this).text();
    if (suggestionText !== 'Destination does not exist') {
        $('#searchInput').val(suggestionText);
    }
    $('#searchSuggestions').empty(); // Clear suggestion list
});
</script>

<script>
$('#searchInput1').on('input', function() {
    var query = $(this).val();

    if (query === '') {
        $('#searchSuggestions1').empty(); // Clear suggestion list when input is empty
        return;
    }
    
    $.ajax({
        url: '/get-search-results', // Change the URL to match your new endpoint
        method: 'GET',
        data: { query: query },
        success: function(data) {
            var results = data.results;
            var suggestionList = '';

            if (results.length === 0) {
                suggestionList = '<div class="suggestion1">Destination does not exist</div>';
            } else {
              $.each(results, function(index, result) {
                  var icon = '';

                  // Add icons based on the 'type' value
                  if (result.type === 'province') {
                    icon = '<i class="fa fa-map-marker" style="color:#fc2c04; aria-hidden="true"></i> '; 
                  } else if (result.type === 'region') {
                    icon = '<i class="fa fa-map-marker" style="color:#fc2c04; aria-hidden="true"></i> '; 
                  } else if (result.type === 'destination') {
                    icon = '<i class="fa fa-map-marker" style="color:#fc2c04; aria-hidden="true"></i> '; 
                  }
                  else if (result.type === 'trip') {
                    icon = '<i class="fa-regular fa-map" style="color:#fc2c04;"></i> '; 
                  }
                    suggestionList += '<div class="suggestion1">'  + icon + result.name + '<hr/>' + '</div>';
                });
            }

            $('#searchSuggestions1').html(suggestionList);
        }
    });    
});

$(document).on('click', '.suggestion1', function() {
    var suggestionText = $(this).text();
    if (suggestionText !== 'Destination does not exist') {
        $('#searchInput1').val(suggestionText);
    }
    $('#searchSuggestions1').empty(); // Clear suggestion list
});

$('.searchprovince').on('click', function () {
var query = $('#searchInput').val();

if (query !== '') {
    $.ajax({
        url: '/check-destination',
        method: 'GET',
        data: { query: query },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
        },
        success: function (data) {
            if (data.exists) {
                var redirectUrl = '';
                switch (data.type) {
                    case 'province':
                        redirectUrl = '/location/' + data.slugprovince + '/' + data.idprovince;
                        break;
                    case 'region':
                        redirectUrl = '/city/' + data.slugregion;
                        break;
                    case 'destination':
                        redirectUrl = '/category-destination/' + data.iddestination;
                        break;
                        case 'trip':
                        redirectUrl = '/item/' + data.slugtrip;
                        break;
                    default:
                        break;
                }

                if (redirectUrl !== '') {
                    // Redirect to the determined URL
                    window.location.href = redirectUrl;
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Destination does not exist',
                    text: 'Please check your input and try again.'
                });
            }
        }
    });
}
});

$('.searchprovince1').on('click', function () {
  var query = $('#searchInput1').val();

if (query !== '') {
    $.ajax({
        url: '/check-destination',
        method: 'GET',
        data: { query: query },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data.exists) {
                var redirectUrl = '';
                switch (data.type) {
                    case 'province':
                        redirectUrl = '/location/' + data.slugprovince + '/' + data.idprovince;
                        break;
                    case 'region':
                        redirectUrl = '/city/' + data.slugregion;
                        break;
                    case 'destination':
                        redirectUrl = '/category-destination/' + data.iddestination;
                        break;
                        case 'trip':
                        redirectUrl = '/item/' + data.slugtrip;
                        break;
                    default:
                        break;
                }

                if (redirectUrl !== '') {
                    // Redirect to the determined URL
                    window.location.href = redirectUrl;
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Destination does not exist',
                    text: 'Please check your input and try again.'
                });
            }
        }
    });
}
});


function showModal() {
  $("#myModal").css("display", "block");
  $("body").addClass("body-lock");
 
}

function hideModal() {
  $("#myModal").css("display", "none");
  $("body").removeClass("body-lock");
  
}

$(".close").click(hideModal);
$("#openModalBtn").click(showModal);
$(window).click(function(event) {
  if (event.target == document.getElementById("myModal")) {
    hideModal();
  }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection