@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="card">
                <div class="card-body">
                	 <h4 class="card-title">Add new option</h4>
                	 <form class="forms-sample" method="POST" action="{{url('insertoption')}}" enctype="multipart/form-data">
                  @csrf
                 @foreach($idwisata as $item) <input type="hidden" name="idtravel" value="{{$item->wisata_id}}"> @endforeach
                    <div class="form-group">
                      <label for="exampleInputName1">Nama Option</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="namaoption" placeholder="Nama Option">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Short Description</label>
                      <textarea class="form-control" style="height:150px" name="shortoption" placeholder="Content"></textarea>
                    </div>
                    <div class="form-group kategori">
                    <label for="exampleInputPassword4">Per Person / Per Group</label>
                    <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="personoption" id="membershipRadios1" value="Per Person">
                                Per Person
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="personoption" id="membershipRadios2" value="Per Group">
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
                  <input class="form-control" type="number" name="singlepersonrange[]" placeholder="Jumlah person" min="0">
                  <td>-</td>
                  <td><input class="form-control" type="number" name="to[]" placeholder="Jumlah person" min="0"></td>
                  <td><input class="form-control" id="hargaperson" type="text" name="hargarange[]" placeholder="Harga (in IDR)"></td>
                    <td style="text-align:right"><button class="btn btn-danger remove">Delete</button> </td>
                    </td>
                    </tr>
                    <br>
                  </tbody>
                  </div>
                    </table>
                                        <div class="col-md-6 childes">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">For Children</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="childoption" id="membershipRadios1" value="Yes">
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="childoption" id="membershipRadios2" value="No">
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    <table class="form-group rangechild">
                    <div class="form-group rangechild">
                  <br>
                  <tbody class="tbodyrangepechild">
                  	 <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><a  class="btn btn-info addRowrangechild" style="float: right;">+</a></td>
                    </tr>
                    <tr>
                      <td>
                  <input class="form-control" type="number" name="singlechildrange[]" placeholder="Jumlah child" min="0">
                  <td>-</td>
                  <td><input class="form-control" type="number" name="tochild[]" placeholder="Jumlah child" min="0"></td>
                  <td><input class="form-control" type="text" id="hargachild" name="hargachildrange[]" placeholder="Harga (in IDR)"></td>
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
                  <tbody class="tbodytime">
                    <br>
                    <label for="item"  style="font-weight: bold;">Starting time:</label>
                    <tr>
                      <tr>
                      <td></td>
                      <td><a  class="btn btn-info addRowtime" style="float: right;">+</a></td>
                      </tr>
                      <td>
                  <input class="form-control" type="time" name="time[]" placeholder="time" required="" style="width: 300px;">
                    <td style="text-align:right"><button class="btn btn-danger remove">Delete</button> </td>
                    </td>
                    </tr>
                    <br>
                  </tbody>
                  </div>
                    </table>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
                </div>
            </div>



@endsection
@section('scripts')
 <script type="text/javascript">
$('.addRowrangeperson').on('click', function(){
    addRowrangeperson();
});

function addRowrangeperson(){
  var tro=
'<tr>'+
'<td>'+
'<input class="form-control" type="text" name="singlepersonrange[]" placeholder="Jumlah person" min="0">'+
'<td>-</td>'+
'<td><input class="form-control" type="text" name="to[]" placeholder="Jumlah person" min="0"></td>'+
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
'<input class="form-control" type="number" name="singlechildrange[]" placeholder="Jumlah person" min="0">'+
'<td>-</td>'+
'<td><input class="form-control" type="number" name="tochild[]" placeholder="Jumlah person" min="0"></td>'+
'<td><input class="form-control" type="text" name="hargachildrange[]" id="hargachild" placeholder="Harga (in IDR)"></td>'+
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
@endsection