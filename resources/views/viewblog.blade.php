@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="">
<div class="card-body">
@foreach($blog as $item)    
<!-- <center> <img src="{{ url('public/img/'.$item->image) }}" class="img-fluid" alt="Responsive image" style="padding-bottom: 20px; width:700px;border-radius: 10px;"></center> -->
<h3 class="align-center" style="text-align:center;">{{$item->judulblog }}</h3>
<br>
<h5 class="align-center" style="text-align:center;">Author: {{$item->author }}</h5>
<br>
                      <p>
                      {!! $item->deskripsi !!}
                      </p>
 @endforeach                     
</div>

</div>

<div style="padding-top: 30px;">
<form action=" {{url('blog')}}" method="get">
<button type="submit" class="btn btn-sm btn-success btn-rounded btn-fw"><i class="mdi mdi-arrow-left-bold  "></i> Kembali</button>
</form>
</div>
@endsection