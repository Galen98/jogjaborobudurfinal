@extends('index')
@extends('navadmin')
@section('content')
<div class="card">
                <div class="card-body">
                  <p class="card-description">
                    Buat Kategori Destinasi
                  </p>
                  <form class="forms-sample" method="POST" action="{{url('insertdestinationcategory')}}" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Buat Kategori Baru</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="kategori" placeholder="Masukan Kategori Destinasi">
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">Short Description</label>
                      <textarea class="form-control" style="height:400px" name="shortdescription" placeholder="Short Description" id="formcategory"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Upload Thumbnail</label>
                        <input type="file" name="image" class="form-control formcategory" placeholder="Upload Gambar">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="/destination-category">Cancel</a>
                  </form>
                </div>
              </div>
@endsection
@section('scripts')
<script>
  $('#formcategory').keyup(function () {
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
@endsection