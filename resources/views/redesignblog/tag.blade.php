@extends('redesignblog.index')
@extends('redesignblog.nav')
@extends('redesignblog.footer')

@section('herosection')
<br>
@foreach($tags as $item)<div class="hero-title pt-5 pb-5"  id="article-grid"><h3 id="font500" style="font-weight:700;">Result of: #{{$item->tags}}</h3><div>@endforeach
    @endsection

    @section('sectionallblog')
    @if(count($similarblog) === 0)
    <img src="{{asset('traveler')}}/images/nodata.png">
    @else
    @foreach($similarblog as $item)
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
    @endif
	  				</div>
    @endsection

    @section('pagination')
<div class="pagination-container">
        {{ $similarblog->links() }}
    </div>
<div class="tags mt-2">
        Other popular tags: 
        @foreach($tagx as $item)
							<a href="{{'/blog/tag/'.$item->tags}}"><span class="badge badge-pill p-2 badge-light">#{{$item->tags}}</span></a>
                            @endforeach
                        
	  				</div>
@endsection