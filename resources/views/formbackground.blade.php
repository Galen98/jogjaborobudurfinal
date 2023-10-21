@extends('index')
@extends('navadmin')
@section('content')
<div class="card">
                <div class="card-body">
                  <p class="card-description">
                    Background Landing Page
                  </p>
                  @if(count($background) == null)
                  <form class="forms-sample" method="POST" action="{{url('insertimagelanding')}}" enctype="multipart/form-data">
                  @csrf
                  @method('post')
                    <div class="form-group">
                      <label for="exampleInputName1">Image Text Header</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="teks" placeholder="Masukan Header">
                    </div>   
                    <div class="form-group">
                      <label>Insert Background</label>
                        <input type="file" name="image" class="form-control" placeholder="Upload Gambar">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="/background/change">Cancel</a>
                  </form>
                  @else
                  @foreach($background as $item)
                  <form class="forms-sample" method="POST" action="{{url('editimagelanding/' .$item->id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('patch')
                  <img src="{{ url('public/img/'.$item->image) }}" alt="" width="1000">
                  <input type="hidden" name="namagambar" value="{{$item->image}}">
                  <br/>
                  <br/>
                    <div class="form-group">
                      <label for="exampleInputName1">Image Text Header</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="teks" placeholder="Masukan Header" value="{{$item->header}}">
                    </div>
                    
                    
                    <div class="form-group">
                      <label>Change Background</label>
                        <input type="file" name="image" class="form-control" placeholder="Upload Gambar">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="/background/change">Cancel</a>
                  </form>
                @endforeach
                @endif
                </div>
              </div>
@endsection