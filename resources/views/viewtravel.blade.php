@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')


@foreach($travel as $item)
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block rounded" src="{{ url('public/img/'.$item->image) }}" alt="First slide" style="width: 100%;" height="500" width="400">
    </div>
    <div class="carousel-item">
      <img class="d-block rounded" src="{{ url('public/img/'.$item->image2) }}" alt="Second slide" style="width: 100%;" height="500" width="400">
    </div>
    <div class="carousel-item">
      <img class="d-block rounded" src="{{ url('public/img/'.$item->image3) }}" alt="Third slide" style="width: 100%;" height="500" width="400">
    </div>
    <div class="carousel-item">
      <img class="d-block rounded" src="{{ url('public/img/'.$item->image4) }}" alt="Third slide" style="width: 100%;" height="500" width="400">
    </div>
    <div class="carousel-item">
      <img class="d-block rounded" src="{{ url('public/img/'.$item->image5) }}" alt="Third slide" style="width: 100%;" height="500" width="400">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br>
<h2>{{$item->namawisata }}</h2>
<p style="font-size: 20px;"> <img src="{{asset('traveler')}}/images/duration.png" width="20" height="20"> Duration: {{$item->durasi}}  </p>
<p style="font-size: 20px;"><img src="{{asset('traveler')}}/images/pickup.png" width="20" height="20"> Pickup Included: {{$item->pickup}}  </p>

<br>
<h5>Description :</h5>
<p style="font-size: 20px;">{!! $item->deskripsi_english!!}</p>
<br>
@endforeach
<h5>Highlight :</h5>
<ul style="font-size: 20px;padding:0;margin:0;margin-left: 20px;">
  @foreach($highlight as $item)
  <li>{{$item->highlight}}</li>
  @endforeach
</ul>
<br>
<h5>Include :</h5>
<ul style="font-size: 20px;list-style-type:none;padding:0;margin:0;">
  @foreach($includes as $item)
  <li><i style="color: green;" class=" mdi mdi mdi-check"></i> {{$item->include}}</li>
  @endforeach
</ul>
<br>
<h5>Exclude :</h5>
<ul style="font-size: 20px;list-style-type:none;padding:0;margin:0;">
  @foreach($excludes as $item)
  <li><i style="color: red;" class=" mdi mdi mdi-close "></i> {{$item->exclude}}</li>
  @endforeach
</ul>
<br>
<br>
@foreach($travel as $item)
<h3>@currency($item->IDR)</h3>
@endforeach

<div style="padding-top: 30px;">
  <form action=" {{url('paketwisata')}}" method="get">
    <button type="submit" class="btn btn-sm btn-success btn-rounded btn-fw"><i class="mdi mdi-arrow-left-bold  "></i> Kembali</button>
  </form>
</div>
@endsection