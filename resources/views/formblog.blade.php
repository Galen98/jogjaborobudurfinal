@extends('indexform')
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

                      <!-- <div class="form-group">
                        <label>Pilih kategori</label>
                    <select class="form-control" id=""  name="tags[]" onchange="filter()">
                  <option value="" selected>Silahkan Pilih Item</option> 
                  @foreach($tags as $item)
                  <option value="{{$item->tags}}" >{{$item->tags}} </option>
                    @endforeach
                    </select>
                  </div> -->

                  <table class="form-group">
                    <div class="form-group">
                  <br>
                  <tbody class="tbodytag">
                    <br>
                    <label>Pilih kategori</label>
                    <tr>
                      <tr>
                      <td></td>
                      <td><a  class="btn btn-info addRowtag" style="float: right;">+</a></td>
                      </tr>
                      <td>
                      <select class="form-control" id=""  name="tags[]" onchange="filter()">
                  <option value="" selected>Silahkan Pilih Item</option> 
                  @foreach($tags as $item)
                  <option value="{{$item->tags}}" >{{$item->tags}} </option>
                    @endforeach
                    </select>
                    <td style="text-align:right"><button class="btn btn-danger remove">Delete</button> </td>
                    </td>
                    </tr>
                    <br>
                  </tbody>
                  </div>
                    </table>

                  <div class="form-group">
                        <label>Pilih Bahasa</label>
                    <select class="form-control" id=""  name="bahasa">
                  <option value="" selected>Silahkan Pilih Bahasa</option> 
                  @foreach($bahasa as $item)
                  <option value="{{$item->bahasa}}" >{{$item->bahasa}} </option>
                    @endforeach
                    </select>
                  </div>

                    <!-- <div class="form-group">
                      <label for="exampleInputName1">Buat Kategori Baru</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="kategori" placeholder="Masukan Kategori">
                    </div> -->
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
                      <textarea id="mytextarea" class="form-control" style="height:700px" name="isi" placeholder="Content"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Upload Thumbnail</label>
                        <input id="file" type="file" name="image" class="form-control" placeholder="Upload Gambar" required>
                    </div>
                   
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="/blogadmin">Cancel</a>
                  </form>
                </div>
              </div>
@endsection
@section('scripts')
<script type="text/javascript">
$('.addRowtag').on('click', function(){
    addRowtag();
});

function addRowtag(){
  var tag=
 '<tr>' +
          '<td>'+
          '<select class="form-control" id=""  name="tags[]" onchange="filter()">'+
                  '<option value="" selected>Silahkan Pilih Item</option>'+
                  '@foreach($tags as $item)'+
                  '<option value="{{$item->tags}}" >{{$item->tags}} </option>'+
                    '@endforeach'+
                    '</select>'+
          '<td style="text-align:right"><button class="btn btn-danger remove">delete</button> </td>'+
'</td>'+
'<br>'+
'</tr>'+
'<br>';

$('.tbodytag').append(tag);
};

$('.tbodytag').on('click', '.remove', function(){
$(this).parent().parent().remove();
});
</script>
<script>
  var uploadField = document.getElementById("file");
uploadField.onchange = function() {
    if(this.files[0].size > 1999999){
       alert("File terlalu besar!");
       this.value = "";
    };
};
</script>
@endsection