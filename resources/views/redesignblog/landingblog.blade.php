@extends('redesignblog.index')
@extends('redesignblog.nav')
@extends('redesignblog.footer')
@section('herosection')

@foreach($banner as $item)
<div class="container" id="hero">
	  	<div class="row justify-content-end">
	  		<div class="col-lg-6 hero-img-container">
	  			<a href="{{'/blog/'.$item->slug}}">
	  			<div class="hero-img">
	  				<img src="{{ url('public/img/'.$item->image) }}" width="500" height="750">
	  			</div>
	  			</a>
	  		</div>	  		

	  		<div class="col-lg-9">
	  			<div class="hero-title">
	  				<a href="{{'/blog/'.$item->slug}}">
	  				<h1>{{$item->judulblog}}</h1>
	  				</a>
	  			</div>

	  		</div>

	  		<div class="col-lg-6">
	  			<div class="hero-meta">
	  				<p>{{Str::limit($item->shortdescription, 100)}}...</p>
	  				<div class="author">
	  					<div class="author-meta">
	  					<span class="author-name">{{$item->author}}</span>
	  					<span class="author-tag">Blogger</span>
	  					</div>	
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	  </div>
      @endforeach
@endsection

@section('artikelcontent')
<br>
@foreach($blog2 as $item)
<div class="col-xl-6 col-lg-12 text-center">
			<a href="{{'/blog/'.$item->slug}}">
			<div class="article-card">
			<div class="article-img">
				<img src="{{ url('public/img/'.$item->image) }}" alt="{{$item->slug}}">
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

        @section('pagination')
        <div class="tags mt-2 mb-3">
        popular tags: 
        @foreach($tags as $item)
							<a href="{{'/blog/tag/'.$item->tags}}"><span class="badge badge-pill p-2 badge-light">#{{$item->tags}}</span></a>
                            @endforeach
	  				</div>
                    
        <a href="/blog/list" class="btn btn-lg btn-light">More Articles</a>
        @endsection
        