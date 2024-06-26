@extends('index')
@extends('navadmin')
@section('content')
<div class="card">
                <div class="card-body">
                  <p class="card-description">
                    Create City
                  </p>
                  <form class="forms-sample" method="POST" action="{{url('insertregion')}}" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Nama City</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="region" placeholder="Masukan City" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">Short Description</label>
                      <textarea class="form-control" style="height:400px" name="shortdescription" placeholder="Short Description" id="formregion"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Upload Thumbnail</label>
                        <input type="file" name="image" class="form-control" id="files" placeholder="Upload Gambar" required>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="/destination-category">Cancel</a>
                  </form>
                </div>
              </div>
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