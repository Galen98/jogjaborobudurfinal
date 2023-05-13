@extends('index')
@extends('navadmin')
@section('content')
<div class="card">
                <div class="card-body">
                  <p class="card-description">
                    Upload Artikel
                  </p>
                  <form class="forms-sample" method="POST" action="{{url('insertblog')}}" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Judul Artikel</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="judulartikel" placeholder="Masukan Judul Artikel">
                    </div>

                      <div class="form-group">
                        <label>Pilih kategori</label>
                    <select class="form-control" id=""  name="tags[]" onchange="filter()">
                  <option value="" selected>Silahkan Pilih Item</option> 
                  @foreach($tags as $item)
                  <option value="{{$item->tags}}" >{{$item->tags}} </option>
                    @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                        <label>Pilih Bahasa</label>
                    <select class="form-control" id=""  name="bahasa">
                  <option value="" selected>Silahkan Pilih Bahasa</option> 
                  @foreach($bahasa as $item)
                  <option value="{{$item->bahasa}}" >{{$item->bahasa}} </option>
                    @endforeach
                    </select>
                  </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Buat Kategori Baru</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="kategori" placeholder="Masukan Kategori">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Author</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="author" placeholder="Masukan Author">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Short Description</label>
                      <textarea class="form-control" style="height:200px" name="short" placeholder="Content"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Isi Artikel</label>
                      <textarea id="mytextarea" class="form-control" style="height:400px" name="isi" placeholder="Content"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Upload Thumbnail</label>
                        <input type="file" name="image" class="form-control" placeholder="Upload Gambar">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="/blog">Cancel</a>
                  </form>
                </div>
              </div>
@endsection