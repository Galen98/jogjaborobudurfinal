@extends('index')
@extends('navadmin')

@section('content')
<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Buat Paket Wisata</h4>
                  <p class="card-description">
                    Buat Paket Wisata
                  </p>
                  <form class="forms-sample" method="POST" action="{{url('inserttravel')}}" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Nama Wisata</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="namawisata" placeholder="Nama Wisata">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Durasi</label>
                      <input type="text" class="form-control" name="durasi" id="exampleInputEmail3" placeholder="Durasi Wisata">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Bahasa</label>
                      <select name="bahasa" class="form-control" required="">
                    <option value=" ">Pilih salah satu</option>
                    @foreach($bahasa as $item)
                    <option value="{{$item->bahasa}}">{{$item->bahasa}}</option>
                    @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Label</label>
                      <select name="label" class="form-control">
                    <option value=" ">None</option>
                    <option value="Bestseller">Bestseller</option>
                    <option value="Likely to sell out">Likely to sell out</option>
                    </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword4">Lokasi</label>
                      <select name="category[]" class="form-control">
                         <option value=" ">Silahkan Pilih...</option>
                        @foreach($destination as $item)
                    <option value="{{$item->id}}">{{$item->destination}}</option>
                    @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">Full Description (English)</label>
                      <textarea id="mytextarea" class="form-control" style="height:400px" name="isieng" placeholder="Content"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">Short Description</label>
                      <textarea class="form-control" style="height:150px" name="shortdescription" placeholder="Content"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Harga Start From</label>
                      <input type="text" class="form-control" id="idr" name="idr" placeholder="Start from" required>
                    </div>

                    <table class="form-group">
                    <div class="form-group">
                  <br>
                  <tbody class="tbodytime">
                    <br>
                    <label for="item"  style="font-weight: bold;">Starting time:</label>
                    <tr>
                      <tr>
                      <td></td>
                      <td><a  class="btn btn-info addRowtime" style="float: right;">+</a></td>
                      </tr>
                      <td>
                  <input class="form-control" type="time" name="time[]" placeholder="time" required="">
                    <td style="text-align:right"><button class="btn btn-danger remove">Delete</button> </td>
                    </td>
                    </tr>
                    <br>
                  </tbody>
                  </div>
                    </table>

                    <div class="form-group kategori">
                    <label for="exampleInputPassword4">Kategori Harga</label>
                    <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="person" id="membershipRadios1" value="Per Person">
                                Per Person
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="person" id="membershipRadios2" value="Per Group">
                                Per Group
                              </label>
                            </div>
                          </div>
                    </div>

                    

                    <table class="form-group rangeperson">
                    <div class="form-group rangeperson">
                  <br>
                  <br>
                  <tbody class="tbodyrangeperson">
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><a  class="btn btn-info addRowrangeperson" style="float: right;">+</a></td>
                    </tr>
                    <tr>
                      <td>
                  <input class="form-control" type="text" name="singlepersonrange[]" placeholder="Jumlah person">
                  <td>-</td>
                  <td><input class="form-control" type="text" name="to[]" placeholder="Jumlah person"></td>
                  <td><input class="form-control" id="hargaperson" type="text" name="hargarange[]" placeholder="Harga (in IDR)"></td>
                    <td style="text-align:right"><button class="btn btn-danger remove">Delete</button> </td>
                    </td>
                    </tr>
                    <br>
                  </tbody>
                  </div>
                    </table>

                    <table class="form-group rangegroup">
                    <div class="form-group rangegroup">
                  
                  <br>
                  <tbody class="tbodyrangegroup">
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><a  class="btn btn-info addRowrangegroup" style="float: right;">+</a></td>
                      </tr>
                    <tr>
                      <td>
                  <input class="form-control" type="text" name="group[]" placeholder="Jumlah person">
                  <td>-</td>
                  <td><input class="form-control" type="text" name="togroup[]" placeholder="Jumlah person"></td>
                  <td><input class="form-control" id="hargagroup" type="text" name="hargagroup[]" placeholder="Harga (in IDR)"></td>
                    <td style="text-align:right"><button class="btn btn-danger remove">Delete</button> </td>
                    </td>
                    </tr>
                    <br>
                  </tbody>
                  </div>
                    </table>
                    <div class="form-group rangegroup">
                      <label for="exampleInputPassword4">Kapasitas Group</label>
                    <input type="number" name="capacity" class="form-control" placeholder="input capacity group">
                  </div>

                     
                    <div class="col-md-6 childes">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">For Children</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="child" id="membershipRadios1" value="yes">
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="child" id="membershipRadios2" value="no">
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>


                    <table class="form-group rangechild">
                    <div class="form-group rangechild">
                  <a  class="btn btn-info addRowrangechild" style="float: left;">+</a>
                  <br>
                  <tbody class="tbodyrangepechild">
                    <tr>
                      <td>
                  <input class="form-control" type="text" name="singlechildrange[]" placeholder="Jumlah child">
                  <td>-</td>
                  <td><input class="form-control" type="text" name="tochild[]" placeholder="Jumlah child"></td>
                  <td><input class="form-control" type="text" id="hargachild" name="hargachildrange[]" placeholder="Harga (in IDR)"></td>
                    <td style="text-align:right"><button class="btn btn-danger remove">Delete</button> </td>
                    </td>
                    </tr>
                    <br>
                  </tbody>
                  </div>
                    </table>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Student Card</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="student" id="membershipRadios1" value="yes" checked>
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="student" id="membershipRadios2" value="no">
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>

                   <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">KITAS</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="kitas" id="membershipRadios1" value="yes" checked>
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="kitas" id="membershipRadios2" value="no">
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>

                    <div class="col-md-6">
                        <div class="form-group row pickup">
                          <label class="col-sm-3 col-form-label">Include Pickup</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="airport" id="membershipRadios1" value="yes">
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="airport" id="membershipRadios2" value="no">
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>

                    <div class="form-group" id="form-input">
                    <label for="exampleInputPassword4">Location Pickup</label>
                    <input type="text" class="form-control" id="exampleInputEmail3" name="where" placeholder="Location pickup">
                    </div>
                  
                    <table class="form-group">
                    <div class="form-group">
                  <br>
                  <tbody class="tbody2">
                    <br>
                    <label for="item"  style="font-weight: bold;">Include:</label>
                    <tr>
                      <tr>
                      <td></td>
                      <td><a  class="btn btn-info addRow" style="float: right;">+</a></td>
                      </tr>
                      <td>
                  <input class="form-control" type="text" name="include[]" placeholder="include">
                    <td style="text-align:right"><button class="btn btn-danger remove">Delete</button> </td>
                    </td>
                    </tr>
                    <br>
                  </tbody>
                  </div>
                    </table>

                    <table class="form-group">
                    <div class="form-group">
                  <br>
                  <tbody class="tbodys">
                    <br>
                    <label for="item" style="font-weight: bold;">Exclude:</label>
                    <tr>
                      <td></td>
                      <td><a  class="btn btn-info addRows" style="float:right;">+</a></td>
                      </tr>
                    <tr>
                      <td>
                  <input class="form-control" type="text" name="exclude[]" placeholder="exclude">
                    <td style="text-align:right"><button class="btn btn-danger remove">Delete</button> </td>
                    </td>
                    </tr>
                    <br>
                  </tbody>
                  </div>
                    </table>

                    <table class="form-group">
                    <div class="form-group">
                  <br>
                  <tbody class="tbodyx">
                    <br>
                    <label for="item" style="font-weight: bold;">Highlight:</label>
                    <tr>
                      <td></td>
                      <td> <a  class="btn btn-info addRowe" style="float:right;">+</a></td>
                      </tr>
                    <tr>
                      <td>
                  <input class="form-control" type="text" name="highlight[]" placeholder="highlight">
                    <td style="text-align:right"><button class="btn btn-danger remove">Delete</button> </td>
                    </td>
                    </tr>
                    <br>
                  </tbody>
                  </div>
                    </table>

                    <div class="form-group">
                      <label>Upload Gambar</label>
                      <div class="input-group col-xs-12">
                      <input type="file" name="image" class="form-control" placeholder="Upload Gambar">
                      <input type="file" name="image2" class="form-control" placeholder="Upload Gambar">
                      <input type="file" name="image3" class="form-control" placeholder="Upload Gambar">
                      <input type="file" name="image4" class="form-control" placeholder="Upload Gambar">
                      <input type="file" name="image5" class="form-control" placeholder="Upload Gambar">
                      </div>
                    </div>
                    <!-- <div class="form-group">
                      <label for="exampleInputCity1">City</label>
                      <input type="text" name="city" class="form-control" id="exampleInputCity1" placeholder="Location">
                    </div> -->
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div> 
@endsection
@section('scripts')
<script type="text/javascript">
$('.addRow').on('click', function(){
    addRow();
});

function addRow(){
  var tr=
  '<tr>' +
          '<td>'+
          '<input class="form-control" name="include[]" type="text" placeholder="include">'+
          '<td style="text-align:right"><button class="btn btn-danger remove">delete</button> </td>'+
'</td>'+
'<br>'+
'</tr>'+
'<br>';


$('.tbody2').append(tr);
};

$('.tbody2').on('click', '.remove', function(){
$(this).parent().parent().remove();
});
</script>

<script type="text/javascript">
$('.addRows').on('click', function(){
    addRows();
});

function addRows(){
  var trs=
  '<tr>' +
          '<td>'+
          '<input class="form-control" type="text" name="exclude[]" placeholder="exclude">'+
          '<td style="text-align:right"><button class="btn btn-danger remove">delete</button> </td>'+
'</td>'+
'<br>'+
'</tr>'+
'<br>';


$('.tbodys').append(trs);
};


$('.tbodys').on('click', '.remove', function(){
$(this).parent().parent().remove();
});
</script>

<script type="text/javascript">
$('.addRowe').on('click', function(){
    addRowe();
});

function addRowe(){
  var trx=
  '<tr>' +
          '<td>'+
          '<input class="form-control" type="text" name="highlight[]" placeholder="highlight">'+
          '<td style="text-align:right"><button class="btn btn-danger remove">delete</button> </td>'+
'</td>'+
'<br>'+
'</tr>'+
'<br>';


$('.tbodyx').append(trx);
};

$('.tbodyx').on('click', '.remove', function(){
$(this).parent().parent().remove();
});
</script>

<script>
$(document).ready(function(){
$("#form-input").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
$(".pickup").click(function(){ //Memberikan even ketika class pickup di klik (class pick ialah class radio button)
if ($("input[name='airport']:checked").val() == "yes" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
$("#form-input").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
} else {
$("#form-input").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
}
});
});
</script>

<script>
$(document).ready(function(){
$(".singlepersons").css("display","none");
$(".rangeperson").css("display","none");
$(".rangegroup").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
$(".kategori").click(function(){ //Memberikan even ketika class pickup di klik (class pick ialah class radio button)
if ($("input[name='person']:checked").val() == "Per Person" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
$(".singlepersons").slideDown("fast");
$(".rangeperson").slideDown("fast");
$(".rangegroup").slideUp("fast"); //Efek Slide Down (Menampilkan Form Input)
} else {
$(".singlepersons").slideUp("fast");
$(".rangeperson").slideUp("fast");
$(".rangegroup").slideDown("fast"); //Efek Slide Up (Menghilangkan Form Input)
}
});
});
</script>

<script>
$(document).ready(function(){
$(".singlechild").css("display","none");
$(".rangechild").css("display","none");
$(".childes").click(function(){
if ($("input[name='child']:checked").val() == "yes" ) { 
$(".singlechild").slideDown("fast"); 
$(".rangechild").slideDown("fast"); 
} else {
$(".singlechild").slideUp("fast"); 
$(".rangechild").slideUp("fast");  
}
});
});
</script>

<script type="text/javascript">
$('.addRowsingleperson').on('click', function(){
    addRowsingleperson();
});

function addRowsingleperson(){
  var trd=
'<tr>'+
'<td>'+
'<input class="form-control" type="text" name="singleperson[]" placeholder="Jumlah person">'+
'<td><input class="form-control" type="text" name="harga[]" placeholder="Harga (in IDR)"></td>'+
'<td style="text-align:right"><button class="btn btn-danger remove">Delete</button> </td>'+
'</td>'+
'</tr>'+
'<br>';



$('.tbodysingleperson').append(trd);
};


$('.tbodysingleperson').on('click', '.remove', function(){
$(this).parent().parent().remove();
});
</script>


<script type="text/javascript">
$('.addRowrangeperson').on('click', function(){
    addRowrangeperson();
});

function addRowrangeperson(){
  var tro=
'<tr>'+
'<td>'+
'<input class="form-control" type="text" name="singlepersonrange[]" placeholder="Jumlah person">'+
'<td>-</td>'+
'<td><input class="form-control" type="text" name="to[]" placeholder="Jumlah person"></td>'+
'<td><input class="form-control" type="text" name="hargarange[]" id="hargaperson" placeholder="Harga (in IDR)"></td>'+
'<td style="text-align:right"><button class="btn btn-danger remove">Delete</button> </td>'+
'</td>'+
'</tr>'+
'<br>';

$('.tbodyrangeperson').append(tro);
};

$('.tbodyrangeperson').on('click', '.remove', function(){
$(this).parent().parent().remove();
});
</script>

<script type="text/javascript">
$('.addRowrangegroup').on('click', function(){
    addRowrangegroup();
});

function addRowrangegroup(){
  var tre=
'<tr>'+
'<td>'+
'<input class="form-control" type="text" name="group[]" placeholder="Jumlah person">'+
'<td>-</td>'+
'<td><input class="form-control" type="text" name="togroup[]" placeholder="Jumlah person"></td>'+
'<td><input class="form-control" type="text" name="hargagroup[]" id="hargagroup" placeholder="Harga (in IDR)"></td>'+
'<td style="text-align:right"><button class="btn btn-danger remove">Delete</button> </td>'+
'</td>'+
'</tr>'+
'<br>';

$('.tbodyrangegroup').append(tre);
};

$('.tbodyrangegroup').on('click', '.remove', function(){
$(this).parent().parent().remove();
});
</script>

<script type="text/javascript">
$('.addRowsinglechild').on('click', function(){
    addRowsinglechild();
});

function addRowsinglechild(){
  var tri=
'<tr>'+
'<td>'+
'<input class="form-control" type="text" name="singlechild[]" placeholder="Jumlah person">'+
'<td><input class="form-control" type="text" name="hargachild[]" placeholder="Harga (in IDR)"></td>'+
'<td style="text-align:right"><button class="btn btn-danger remove">Delete</button> </td>'+
'</td>'+
'</tr>'+
'<br>';

$('.tbodysinglechild').append(tri);
};

$('.tbodysinglechild').on('click', '.remove', function(){
$(this).parent().parent().remove();
});
</script>

<script type="text/javascript">
$('.addRowtime').on('click', function(){
    addRowtime();
});

function addRowtime(){
  var time=
 '<tr>' +
          '<td>'+
          '<input class="form-control" type="time" name="time[]" placeholder="time" required="">'+
          '<td style="text-align:right"><button class="btn btn-danger remove">delete</button> </td>'+
'</td>'+
'<br>'+
'</tr>'+
'<br>';

$('.tbodytime').append(time);
};

$('.tbodytime').on('click', '.remove', function(){
$(this).parent().parent().remove();
});
</script>

<script type="text/javascript">
$('.addRowrangechild').on('click', function(){
    addRowrangechild();
});

function addRowrangechild(){
  var trq=
'<tr>'+
'<td>'+
'<input class="form-control" style="width: 100px;" type="text" name="singlechildrange[]" placeholder="Jumlah person">'+
'<td>-</td>'+
'<td><input class="form-control" style="width: 100px;" type="text" name="tochild[]" placeholder="Jumlah person"></td>'+
'<td><input class="form-control" style="width: 200px;" type="text" name="hargachildrange[]" id="hargachild" placeholder="Harga (in IDR)"></td>'+
'<td style="text-align:right"><button class="btn btn-danger remove">Delete</button> </td>'+
'</td>'+
'</tr>'+
'<br>';

$('.tbodyrangepechild').append(trq);
};

$('.tbodyrangepechild').on('click', '.remove', function(){
$(this).parent().parent().remove();
});
</script>

<script>
  $(function(){
      $("#idr").keyup(function(e){
        $(this).val(format($(this).val()));
      });
      $("#hargagroup").keyup(function(e){
        $(this).val(format($(this).val()));
      });
      $("#hargaperson").keyup(function(e){
        $(this).val(format($(this).val()));
      });
      $("#hargachild").keyup(function(e){
        $(this).val(format($(this).val()));
      });
    });
    var format = function(num){
      var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
      if(str.indexOf(".") > 0) {
        parts = str.split(".");
        str = parts[0];
      }
      str = str.split("").reverse();
      for(var j = 0, len = str.length; j < len; j++) {
        if(str[j] != ",") {
          output.push(str[j]);
          if(i%3 == 0 && j < (len - 1)) {
            output.push(",");
          }
          i++;
        }
      }
      formatted = output.reverse().join("");
      return("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
    };
</script>
@endsection
