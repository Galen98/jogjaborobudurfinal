@extends('redesignblog.forAllContent')
@extends('redesignblog.nav')
@extends('redesignblog.footer')

@section('herosection')
<br>
<div class="hero-title text-center"><h3 id="font500" style="font-weight:700;">Featured articles from JogjaBorobudur</h3><div>
    @endsection
@section('sectionallblog')
@if(count($blog) === 0)
    <img src="{{asset('traveler')}}/images/nodata.png">
    @else
@foreach($blog as $item)
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
        @endif
        
@endsection

@section('pagination')
<div class="pagination-container">
        {{ $blog->links() }}
    </div>
<div class="tags mt-2">
        popular tags: 
        @foreach($tagx as $item)
							<a href="{{'/blog/tag/'.$item->tags}}"><span class="badge badge-pill p-2 badge-light">#{{$item->tags}}</span></a>
                            @endforeach
                        
	  				</div>
@endsection