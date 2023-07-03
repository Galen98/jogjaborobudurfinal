@extends('index')
@extends('navadmin')
@section('content')
<div class="card">
    @foreach($region as $item)
                <div class="card-body">
                  <p class="card-description">
                    Edit City
                  </p>
                  <form class="forms-sample" method="POST" action="{{url('updateregion/' .$item->id)}}" enctype="multipart/form-data">
                  @method('patch')
                  @csrf
                  <input type="hidden" name="regionid" value="{{$item->id}}">
                  <input type="hidden" name="namaregion" id="namaregion" value="{{$item->namaregion}}"> 
                    <div class="form-group">
                      <label for="exampleInputName1">Nama City</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="namaregions" placeholder="Masukan City" required value="{{$item->namaregion}}">
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">Short Description</label>
                      <textarea class="form-control" style="height:400px" name="shorts" placeholder="Short Description" id="formregion">{{$item->shortdescription}}</textarea>
                    </div>
                    <input type="hidden" name="namagambar" value="{{$item->image}}">
                  <img src="{{ url('public/img/'.$item->image) }}" alt="" width="500">
                    <div class="form-group">
                      <label>Update Thumbnail</label>
                        <input type="file" name="image" class="form-control" id="files" placeholder="Upload Gambar">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="/destination-category">Cancel</a>
                  </form>
                </div>
              </div>
              @endforeach
@endsection
@section('scripts')
<script>
  $('#formregion').keyup(function () {
           var maxLength = 120;
           var text = $(this).val();
           var textLength = text.length;
           if (textLength > maxLength) {
               $(this).val(text.substring(0, (maxLength)));
               swal("Ulangi!", "Maksimal karakter 120!", "error");
           }
           else {
               //alert("Required Min. 500 characters");
           }
       });
</script>
<script>
  var uploadField5 = document.getElementById("files");
uploadField5.onchange = function() {
    if(this.files[0].size > 1999999){
		swal("Ulangi!", "File terlalu besar", "error");
       this.value = "";
    };
};
</script>
@endsection