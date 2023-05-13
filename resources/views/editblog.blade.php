@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="">
<div class="card-body">
@foreach($blog as $item)
<form method="post" action="{{url('editblog/' .$item->id)}}" enctype="multipart/form-data">
@method('patch')
@csrf
<center> <img src="{{ url('public/img/'.$item->image) }}" class="img-fluid" alt="Responsive image" style="padding-bottom: 20px; width:700px;"></center>
<!-- <div class="form-group">
<label>Ganti Gambar</label>
<input type="file" name="image" class="form-control" placeholder="Upload Gambar">
</div> -->
<div class="form-group">
<label for="exampleInputName1">Judul Artikel</label>
<input type="text" class="form-control" id="exampleInputName1" name="judulartikel" placeholder="Masukan Judul Artikel" value="{{$item->judulblog}}">
</div>
<div class="form-group">
<label for="exampleTextarea1">Short Description</label>
<textarea class="form-control" style="height:150px" name="short" placeholder="Content">{{$item->shortdescription}}</textarea>
</div>
<div class="form-group">
<label for="exampleTextarea1">Isi Artikel</label>
<textarea id="mytextarea" class="form-control" style="height:150px" name="isi" placeholder="Content">{!! $item->deskripsi !!}</textarea>
</div>
<button type="submit" class="btn btn-primary mr-2">Submit</button>
<a href="/blog">Cancel</a>
</form>
@endforeach
</div>
</div>
@endsection