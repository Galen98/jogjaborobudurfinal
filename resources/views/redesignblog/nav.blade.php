@section('nav')

<nav class="navbar navbar-expand-md navbar-light">
		<div class="container">
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <a class="navbar-brand" href="/"><img src="{{asset('redesign-blog')}}/img/logo-hitam.png" height="80px" width="100px"></a>


		<div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo03">
			
		                <ul class="navbar-nav" >
		                    <li class="nav-item" >
		                    <a class="nav-link" style="font-weight:500;"  href="/blog">Home</a>
		                  </li>
		                <li class="nav-item" >
		                  <a class="nav-link" style="font-weight:500;"  href="/about-us">About</a>
		                </li>

		                <li class="nav-item" >
		                  <a class="nav-link" style="font-weight:500;"  href="/contact/contacts-us">Contact</a>
		                </li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" style="font-weight:500;"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							  Language
							</a>
							<div class="dropdown-menu" style="color: black;" aria-labelledby="navbarDropdown">
                            @foreach($language as $item)
							  <a class="dropdown-item" style="font-weight:500;"   href="/change-bahasa/{{$item->bahasa}}">{{$item->bahasa}}</a>
                              @endforeach
							</div>
						  </li>
		            </ul>
		  </div>
	  </div>
	  </nav>
      
@endsection
