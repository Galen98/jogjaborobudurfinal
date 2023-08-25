@extends('redesignblog.forcontent')
@extends('redesignblog.nav')
@extends('redesignblog.footer')

@section('herosection')
@foreach($blog as $item)
<div class="container" id="hero">
	  	<div class="row justify-content-end">
	  		<div class="col-lg-6 hero-img-container">
	  			<div class="hero-img">
	  				<!-- hero img -->
	  				<img src="{{ url('public/img/'.$item->image) }}">
	  			</div>
	  		</div>	  		

	  		<div class="col-lg-9">
	  			<div class="hero-title">
	  				<h1>{{$item->judulblog}}</h1>
                      
	  			</div>

	  		</div>
	  		<!-- hero meta -->
	  		<div class="col-lg-6">
	  			<div class="hero-meta">
	  				<div class="author">
	  					<div class="author-meta">
	  					<span class="author-name">{{$item->author}}</span>
	  					<span class="author-tag">Blogger</span>
	  					</div>	
	  				</div>
	  				<span class="date mt-2">{{\Carbon\Carbon::parse($item->created_at)->format('d/m/Y') ?? ''}}</span>
	  				<div class="tags mt-2">
                      @foreach($tagblog as $item)
							<a href="{{'/blog/tag/'.$item->tags}}"><span class="badge badge-pill p-2 badge-light">#{{$item->tags}}</span></a>
                        @endforeach
                       
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	  </div>
      @endforeach
      @endsection
      @section('artikelcontent')
      <h3 id="font500" style="font-weight:700;">Overview</h3>
      @foreach($blog as $item)
      <p class="lead">{{$item->shortdescription}}</p>
      {!! $item->deskripsi !!}
      @endforeach
      @endsection
      
      
      @section('related')
      
      @foreach($randomArticles as $item)
      <div class="col-xl-6 col-lg-12 text-center">
			<a href="{{'/blog/'.$item->slug}}">
			<div class="article-card">
			<div class="article-img">
				<img src="{{ url('public/img/'.$item->image) }}">
			</div>

				<div class="article-meta text-left">
					<h2>{{$item->judulblog}}</h2>
					<p>{{Str::limit($item->shortdescription, 100)}}...</p>
				</div>
			</div>
			</a>
		</div>
        @endforeach
      @endsection
      
