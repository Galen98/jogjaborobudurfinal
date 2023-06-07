@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="card">
                <div class="card-body">
                  <p class="card-description">
                    Image 1
                  </p>
                  @foreach($gambar as $item)<form class="forms-sample" method="POST" action="{{url('editimagetravel/' .$item->wisata_id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('patch')
                  <input type="hidden" name="img" value="{{$item->image}}">
                  <input type="hidden" name="img2" value="{{$item->image2}}">
                  <input type="hidden" name="img3" value="{{$item->image3}}">
                  <input type="hidden" name="img4" value="{{$item->image4}}">
                  <input type="hidden" name="img5" value="{{$item->image5}}">
                 <center> <img src="{{ url('public/img/'.$item->image) }}"  alt="" class="img-fluid" width="500"/></center>
                  <br/>
                  <br/>
                    <div class="form-group">
                      <label>Change Image</label>
                        <input id="file1" type="file" name="image" class="form-control" placeholder="Upload Gambar">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <!-- <a href="/paketwisata">Cancel</a> -->
                  </form>
                @endforeach
                </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <p class="card-description">
                    Image 2
                  </p>
                  @foreach($gambar as $item)<form class="forms-sample" method="POST" action="{{url('editimagetravel/' .$item->wisata_id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('patch')
                  <input type="hidden" name="img" value="{{$item->image}}">
                  <input type="hidden" name="img2" value="{{$item->image2}}">
                  <input type="hidden" name="img3" value="{{$item->image3}}">
                  <input type="hidden" name="img4" value="{{$item->image4}}">
                  <input type="hidden" name="img5" value="{{$item->image5}}">
                 <center> <img src="{{ url('public/img/'.$item->image2) }}" alt="" class="img-fluid" width="500"/></center>
                  <br/>
                  <br/>
                    <div class="form-group">
                      <label>Change Image 2</label>
                        <input id="file2" type="file" name="image2" class="form-control" placeholder="Upload Gambar">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                @endforeach
                </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <p class="card-description">
                    Image 3
                  </p>
                  @foreach($gambar as $item)<form class="forms-sample" method="POST" action="{{url('editimagetravel/' .$item->wisata_id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('patch')
                  <input type="hidden" name="img" value="{{$item->image}}">
                  <input type="hidden" name="img2" value="{{$item->image2}}">
                  <input type="hidden" name="img3" value="{{$item->image3}}">
                  <input type="hidden" name="img4" value="{{$item->image4}}">
                  <input type="hidden" name="img5" value="{{$item->image5}}">
                 <center> <img src="{{ url('public/img/'.$item->image3) }}" alt="" class="img-fluid" width="500"/></center>
                  <br/>
                  <br/>
                    <div class="form-group">
                      <label>Change Image 3</label>
                        <input id="file3" type="file" name="image3" class="form-control" placeholder="Upload Gambar">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <!-- <a href="/paketwisata">Cancel</a> -->
                  </form>
                @endforeach
                </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <p class="card-description">
                    Image 4
                  </p>
                  @foreach($gambar as $item)<form class="forms-sample" method="POST" action="{{url('editimagetravel/' .$item->wisata_id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('patch')
                  <input type="hidden" name="img" value="{{$item->image}}">
                  <input type="hidden" name="img2" value="{{$item->image2}}">
                  <input type="hidden" name="img3" value="{{$item->image3}}">
                  <input type="hidden" name="img4" value="{{$item->image4}}">
                  <input type="hidden" name="img5" value="{{$item->image5}}">
                 <center> <img src="{{ url('public/img/'.$item->image4) }}" alt="" class="img-fluid" width="500"/></center>
                  <br/>
                  <br/>
                    <div class="form-group">
                      <label>Change Image 4</label>
                        <input id="file4" type="file" name="image4" class="form-control" placeholder="Upload Gambar">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <!-- <a href="/paketwisata">Cancel</a> -->
                  </form>
                @endforeach
                </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <p class="card-description">
                    Image 5
                  </p>
                  @foreach($gambar as $item)<form class="forms-sample" method="POST" action="{{url('editimagetravel/' .$item->wisata_id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('patch')
                  <input type="hidden" name="img" value="{{$item->image}}">
                  <input type="hidden" name="img2" value="{{$item->image2}}">
                  <input type="hidden" name="img3" value="{{$item->image3}}">
                  <input type="hidden" name="img4" value="{{$item->image4}}">
                  <input type="hidden" name="img5" value="{{$item->image5}}">
                 <center> <img src="{{ url('public/img/'.$item->image5) }}" alt="" class="img-fluid" width="500"/></center>
                  <br/>
                  <br/>
                    <div class="form-group">
                      <label>Change Image 5</label>
                        <input id="file5" type="file" name="image5" class="form-control" placeholder="Upload Gambar">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <!-- <a href="/paketwisata">Cancel</a> -->
                  </form>
                @endforeach
                <br>
                <br>
                <a class="btn btn-sm btn-light" href="/paketwisata">Cancel</a>
                </div>
              </div>
@endsection
@section('scripts')
<script>
  var uploadField = document.getElementById("file1");
uploadField.onchange = function() {
    if(this.files[0].size > 1999999){
		swal("Ulangi!", "File terlalu besar", "error");
       this.value = "";
    };
};
</script>
<script>
  var uploadField = document.getElementById("file2");
uploadField.onchange = function() {
    if(this.files[0].size > 1999999){
		swal("Ulangi!", "File terlalu besar", "error");
       this.value = "";
    };
};
</script>
<script>
  var uploadField = document.getElementById("file3");
uploadField.onchange = function() {
    if(this.files[0].size > 1999999){
		swal("Ulangi!", "File terlalu besar", "error");
       this.value = "";
    };
};
</script>
<script>
  var uploadField = document.getElementById("file4");
uploadField.onchange = function() {
    if(this.files[0].size > 1999999){
		swal("Ulangi!", "File terlalu besar", "error");
       this.value = "";
    };
};
</script>
<script>
  var uploadField = document.getElementById("file5");
uploadField.onchange = function() {
    if(this.files[0].size > 1999999){
		swal("Ulangi!", "File terlalu besar", "error");
       this.value = "";
    };
};
</script>
@endsection