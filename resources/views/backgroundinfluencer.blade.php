@extends('index')
@extends('navadmin')
@section('content')
<div class="card">
                <div class="card-body">
                  <p class="card-description">
                    Background Influencer
                  </p>
                  @foreach($background as $item)<form class="forms-sample" method="POST" action="{{url('editimageinfluencer/' .$item->id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('patch')
                  <input type="hidden" name="namagambar" value="{{$item->image}}">
                  <img src="{{ url('public/img/'.$item->image) }}" alt="" width="1000">
                  <br/>
                  <br/>
                    <div class="form-group">
                      <label for="exampleInputName1">Image Text Header</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="teks" placeholder="Masukan Kategori" value="{{$item->header}}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Image Subheader</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="tekssmall" placeholder="Masukan Kategori" value="{{$item->subheader}}">
                    </div>
                    
                    
                    <div class="form-group">
                      <label>Change Background</label>
                        <input type="file" name="image" class="form-control" placeholder="Upload Gambar">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="/background/change">Cancel</a>
                  </form>
                @endforeach
                </div>
              </div>
            @endsection