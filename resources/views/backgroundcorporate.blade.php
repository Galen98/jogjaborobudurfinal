@extends('index')
@extends('navadmin')
@section('content')
<div class="card">
                <div class="card-body">
                  <p class="card-description">
                    Background Corporate
                  </p>
                  @if(count($background) == null)
                  <form class="forms-sample" method="POST" action="{{url('insertimagecorporate')}}" enctype="multipart/form-data">
                  @csrf
                  @method('post')
                    <div class="form-group">
                      <label for="exampleInputName1">Image Text Header</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="teks" placeholder="Masukan Text">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Image Subheader</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="tekssmall" placeholder="Masukan Text">
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
                  <form class="forms-sample" method="POST" action="{{url('editimagecorporate/' .$item->id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('patch')
                  <input type="hidden" name="namagambar" value="{{$item->image}}">
                  <img src="{{ url('public/img/'.$item->image) }}" alt="" width="1000">
                  <br/>
                  <br/>
                    <div class="form-group">
                      <label for="exampleInputName1">Image Text Header</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="teks" placeholder="Masukan Text" value="{{$item->header}}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Image Subheader</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="tekssmall" placeholder="Masukan Text" value="{{$item->subheader}}">
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