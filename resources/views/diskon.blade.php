@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')

<div class="card">
                <div class="card-body">
                	@foreach($travel as $item)
                  <h5 style="margin-bottom: 24px;">
                    {{$item->namawisata}}
                  </h5>
                  

                  <form method="post" action="{{url('diskonpost/' .$item->wisata_id)}}" enctype="multipart/form-data">
				@method('patch')
				@csrf
				<div class="col-md-6">
					 <label>Discount</label>
					 @if($item->discount == 'yes')
                        <div class="form-group row diskoncek1">
                          <div class="col-sm-4">
                            <div class="form-check ">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="discount" id="membershipRadios1" value="yes" checked>
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="discount" id="membershipRadios2" value="no">
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                        @elseif($item->discount == 'no')
                        <div class="form-group row diskoncek2">
                          <div class="col-sm-4">
                            <div class="form-check ">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="discount" id="membershipRadios1" value="yes">
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="discount" id="membershipRadios2" value="no" checked>
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                        @else
                        <div class="form-group row diskoncek3">
                          <div class="col-sm-4">
                            <div class="form-check ">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="discount" id="membershipRadios1" value="yes">
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="discount" id="membershipRadios2" value="no">
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                        @endif
                      </div>

                    <div class="form-group">
                    <label for="exampleInputPassword4">Harga Sekarang</label>
                    <br>
                    <h1 style="font-size:22px;">@currency($item->IDR)</h1>
                    <input type="hidden" class="form-control" id="exampleInputEmail3" id="idr" placeholder="@currency($item->IDR)" value="{{$item->IDR}}" readonly=""> 
                    </div>
                    <div class="form-group sebelum">
                    <label for="exampleInputPassword4">Harga Coret</label>
                    <h1 style="font-size:20px;">@currency($item->IDR_awal)</h1>
                    <input type="hidden" class="form-control" id="exampleInputEmail3" id="idr" placeholder="@currency($item->IDR_awal)" value="{{$item->IDR_awal}}" readonly=""> 
                    </div>
                    <br/>
                    <div class="col-md-6">
           <label>Per Person / Per Group</label>
           @if($item->kategories == 'Per Person')
                        <div class="form-group row kategoriescek">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="kategories" id="membershipRadios1" value="Per Person" checked>
                                Per Person
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="kategories" id="membershipRadios2" value="Per Group">
                                Per Group
                              </label>
                            </div>
                          </div>
                        </div>
                        @elseif($item->kategories == 'Per Group')
                        <div class="form-group row kategoriescek2">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="kategories" id="membershipRadios1" value="Per Person">
                                Per Person
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="kategories" id="membershipRadios2" value="Per Group" checked>
                                Per Group
                              </label>
                            </div>
                          </div>
                        </div>
                        @endif
                      </div>

<div class="form-group kategoriescapacity">
<label for="exampleTextarea1">Capacity (Group)</label>
<input type="number" name="capacity" class="form-control" value="{{$item->capacity}}" min="0">
</div>
<br>
                    <button type="button" class="btn btn-info mr-2 btneditharga" value="{{$item->wisata_id}}">Ubah Harga</button>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
				</form>
				
<br>
<br>
<form action="{{'/paketwisata/diskon/buatoption/' .$item->wisata_id}}" method="GET"> 
<button type="submit" class="btn btn-danger mr-2"><i class="mdi mdi-plus"></i> Add new option</button>
</form>
@endforeach
<br>
<br>
<div class="col-lg-12 grid-margin stretch-card" >
              <div class="card">
                  @foreach($pilihan as $item) 
                <div class="card-body" style="border-bottom: 5px solid #e0e0de;margin-top:40px;">
                 <h4 class="card-title" style="font-size:18px;">{{$item->judulsub}}</h4>
                 <p>{{$item->short}}</p>
                <h5 class="card-title" style="font-size:14px;margin-top:10px;margin-bottom:20px;">
                <i class="mdi mdi-account-multiple"></i> {{$item->kategories}}</h5>
                <div class="form-group">
                <label for="exampleInputName1">Availability</label>
                <div class="form-check form-switch ml-5 mb-5">
                  @if($item->status == true)
                  <input class="form-check-input" type="checkbox" name="status" role="switch" id="flexSwitchCheckChecked" checked style="height:22px;width:50px;">
                  @elseif($item->status == false)
                  <input class="form-check-input" type="checkbox" name="status" role="switch" id="flexSwitchCheckChecked" style="height:22px;width:50px;">
                  @else
                  <input class="form-check-input" type="checkbox" name="status" role="switch" id="flexSwitchCheckChecked" checked style="height:22px;width:50px;">
                  @endif
                  <input type="hidden" name="idsub" value="{{$item->id}}">
                </div>
                </div>
                <table>
              <tbody>
              <tr>
              <td><button type="button" class="btneditoption btn btn-sm btn-info btn-rounded btn-fw" style="color: white;" value="{{$item->id}}"><i class="mdi mdi-pencil-box" style="color: white;"></i> Edit</button></td>
              <td>&nbsp;&nbsp;</td>
              <td><form action="{{url('deleteoption/'.$item->id)}}" method="POST" enctype="multipart/form-data">
                @method('delete')
                @csrf
                 <button type="submit" class="hapusbtn btn btn-sm btn-danger btn-rounded btn-fw" style="color: white;"><i class="mdi mdi-delete" style="color: white;"></i> Delete</button>
                 </form></td>
              </tr>
              </tbody>
              </table>
                 <br>
                 <br>
                 <br>
                 <h4 class="card-title">Harga Person</h4>
                  <button type="button" class="tambahhargaperson btn btn-sm btn-primary btn-rounded btn-fw" value="{{$item->id}}"><i class="mdi mdi-plus"></i> Tambah</button>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            Jumlah Person
                          </th>
                          <th>
                            Range
                          </th>
                          <th>
                            Harga
                          </th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($item->harga as $h)
                        <tr style="color: black;">
                          <td >
                          {{$h->min?? ''}}
                          </td>
                          <td>
                          {{$h->maks ?? ''}}
                          </td>
                          <td>
                            @currency($h->harga)
                          </td>
                          <td>
                          <button type="button" class="btnedit btn btn-sm btn-info btn-rounded btn-fw" style="color: white;" value="{{$h->id}}"><i class="mdi mdi-pencil-box" style="color: white;"></i></button>
                          </td>
                          <td>
                          <form action="{{url('deletehargaperson/'.$h->id)}}" method="POST" enctype="multipart/form-data">
                          @method('delete')
                          @csrf  
                          <button type="submit" class="btn btn-sm btn-danger btn-rounded btn-fw"><i class="mdi mdi-delete"></i></button>
                          </form>
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <br>
                  <h4 class="card-title">Harga Child</h4>
                  <button type="button" class="tambahhargachild btn btn-sm btn-primary btn-rounded btn-fw" value="{{$item->id}}"><i class="mdi mdi-plus"></i> Tambah</button>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            Jumlah Person
                          </th>
                          <th>
                            Range
                          </th>
                          <th>
                            Harga
                          </th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($item->hargachild as $hc)
                        <tr style="color: black;">
                          <td >
                          {{$hc->min ?? ''}}
                          </td>
                          <td>
                          {{$hc->maks ?? ''}}
                          </td>
                          <td>
                          @currency($hc->harga)
                          </td>
                          <td>
                          <button type="button" class="btn btneditchild btn-sm btn-info btn-rounded btn-fw" style="color: white;" value="{{$hc->id}}"><i class="mdi mdi-pencil-box" style="color: white;"></i></button>
                          </td>
                          <td>
                          <form action="{{url('deletehargachild/'.$hc->id)}}" method="POST" enctype="multipart/form-data">
                          @method('delete')
                          @csrf  
                          <button type="submit" class="btn btn-sm btn-danger btn-rounded btn-fw"><i class="mdi mdi-delete"></i></button>
                          </form>
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <br>
                  <h4 class="card-title">Starting Time</h4>
                  <button type="button" class="tambahtime btn btn-sm btn-primary btn-rounded btn-fw" value="{{$item->id}}"><i class="mdi mdi-plus"></i> Tambah</button>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            Time
                          </th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($item->waktu as $j)
                        <tr style="color: black;">
                          <td >
                          {{$j->time ?? ''}}
                          </td>
                          <td><button type="button" class="btn btnedittime btn-sm btn-info btn-rounded btn-fw" style="color: white;" value="{{$j->id}}"><i class="mdi mdi-pencil-box" style="color: white;"></i></button></td>
                          <td>
                          <form action="{{url('deletetime/'.$j->id)}}" method="POST" enctype="multipart/form-data">
                          @method('delete')
                          @csrf  
                          <button type="submit" class="hapusbtntime btn btn-sm btn-danger btn-rounded btn-fw"><i class="mdi mdi-delete"></i></button>
                          </form>
                        </td>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                 @endforeach
              </div>
              
            </div>
            <br>
<br>

            
              </div>
          </div>

          <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('updateharga')}}" action="POST" enctype="multipart/form-data" id="formedit">
        @csrf
      <div class="form-group">
         <input type="hidden" name="idtravel" id="idtravel" readonly="">
        <input type="hidden" name="idharga" id="idharga" readonly="">
        Person 
        <input type="text" name="person" class="form-control" id="person">
        Range Person
        <input type="text" name="range" class="form-control" id="range">
        Harga
        <input type="text" name="harga" class="form-control" id="harga">
        </div>
        <button type="button" class="btn btn-primary btnupdate">Update</button>
        </form>
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="Modaltime" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Time</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('addtime')}}" action="POST" enctype="multipart/form-data" id="formtime">
        @csrf
      <div class="form-group">
        <label>Waktu</label>
        <input type="hidden" id="idtraveljam" name="idtraveljam">
        <input type="hidden" name="idsubs" class="form-control" id="idsubs">
        <input type="time" name="time" class="form-control" id="time"> 
        </div>
        <button type="button" class="btn btn-primary btntime">Post</button>
        </form> 
        <br>
        </div>
    </div>
</div>
</div>
</div>



<div class="modal fade" id="editModaltime" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Time</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('updatetime')}}" action="POST" enctype="multipart/form-data" id="formedittime">
        @csrf
      <div class="form-group">
        <label>Waktu</label>
        @foreach($travel as $item)<input type="hidden" id="idtravel" name="idtravel" value="{{$item->wisata_id}}">@endforeach
        <input type="hidden" name="idtime" id="idtime" readonly=""> 
        <input type="time" name="jam" class="form-control" id="jam">
        </div>
        <button type="button" class="btn btn-primary btnupdatetime">Update</button>
        </form> 
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="Modalperson" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Harga</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('addhargaperson')}}" action="POST" enctype="multipart/form-data" id="formperson">
        @csrf
      <div class="form-group">
        <label>Harga</label>
        <input type="hidden" id="idtravelperson" name="idtravelperson">
        <input type="hidden" name="idsubperson" class="form-control" id="idsubperson">
        <table>
      <tbody>
      <tr>
      <td><input class="form-control" type="number" name="singlepersonrange" placeholder="Jumlah person" min="0"></td>
      <td>-</td>
      <td><input class="form-control" type="number" name="to" placeholder="Jumlah person" min="0"></td>
      <td>&nbsp;&nbsp;</td>
      <td><input class="form-control"  type="number" name="hargaperson" placeholder="Harga (in IDR)" min="0"></td>
      </tr>
      </tbody>
      </table>
        </div>
        <button type="button" class="btn btn-primary btnaddperson">Post</button>
        </form> 
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="Modalchild" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Harga Child</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('addhargachild')}}" action="POST" enctype="multipart/form-data" id="formchild">
        @csrf
      <div class="form-group">
        <label>Harga</label>
        <input type="hidden" id="idtravelchild" name="idtravelchild">
        <input type="hidden" name="idsubchild" class="form-control" id="idsubchild">
        <table>
      <tbody>
      <tr>
      <td><input class="form-control" type="number" name="singlechildrange" placeholder="Jumlah child" min="0"></td>
      <td>-</td>
      <td><input class="form-control" type="number" name="tochild" placeholder="Jumlah child" min="0"></td>
      <td>&nbsp;&nbsp;</td>
      <td><input class="form-control"  type="number" name="hargachild" placeholder="Harga (in IDR)" min="0"></td>
      </tr>
      </tbody>
      </table>
        </div>
        <button type="button" class="btn btn-primary btnaddchild">Post</button>
        </form> 
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="editModalchild" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('updatehargachild')}}" action="POST" enctype="multipart/form-data" id="formeditchild">
        @csrf
      <div class="form-group">
        <input type="text" name="idtravel" id="idtravels" readonly="">
        <input type="hidden" name="idhargachild" id="idhargachild" readonly="">
        Person 
        <input type="text" name="personchild" class="form-control" id="personchild">
        Range Person
        <input type="text" name="rangechild" class="form-control" id="rangechild">
        Harga
        <input type="text" name="hargachild" class="form-control" id="hargachild">
        </div>
        <button type="button" class="btn btn-primary btnupdatechild">Update</button>
        </form>
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="editModaldiskon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('updatediskon')}}" action="POST" enctype="multipart/form-data" id="formeditdiskon">
        @csrf
      <div class="form-group">
        <input type="hidden" name="idtravell" id="idtravell" readonly="">
        <input type="hidden" name="idr" id="idr" readonly="">
        Ubah Harga 
        <input type="text" name="idrdiscoun" class="form-control" id="idrdiscoun">
        </div>
        <button type="button" class="btn btn-primary btnupdatediskon">Update</button>
        </form>
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="editModalOption" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('updateoption')}}" action="POST" enctype="multipart/form-data" id="formeditoption">
        @csrf
      <div class="form-group">
       
        <input type="hidden" name="idoption" id="idoption" readonly="">
        
        Nama Option 
        <input type="text" name="judulsub" class="form-control" id="judulsub">
        Short Description
        <textarea class="form-control" name="short" id="short" style="height:150px"></textarea>
        <!-- Per Person / Per Group
        <select class="form-control" id="personoption" name="personoption">
          <option class="form-control" value="Per Person">Per Person</option>
          <option class="form-control" value="Per Group">Per Group</option>
        </select> -->
        
        </div>
        <button type="button" class="btn btn-primary btnupdateoption">Update</button>
        </form>
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Hapus</h5>
        <button type="button" class="batal close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" enctype="multipart/form-data" id="formhapus">
        <p>Apakah anda yakin ingin menghapus?</p> 
        <input type="text" name="idoption" id="idoption" readonly="">
      <div class="modal-footer">
      <button type="button" class="batal btn btn-secondary">Tidak</button>
        <button type="submit" class="btn btn-danger btnhapus">Ya</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div> 
          
@endsection

@section('scripts')
<script>
  if ($("input[name='kategories']:checked").val() == "Per Person" ) { 
    $(".kategoriescapacity").css("display","none");
}
  
  $(".kategoriescek").click(function(){ 
if ($("input[name='kategories']:checked").val() == "Per Group" ) { 
$(".kategoriescapacity").slideDown("fast");
} else {
$(".kategoriescapacity").slideUp("fast"); 
}
}); 
$(".kategoriescek2").click(function(){ 
  if ($("input[name='kategories']:checked").val() == "Per Group" ) { 
$(".kategoriescapacity").slideDown("fast");
} else {
$(".kategoriescapacity").slideUp("fast"); 
}
});
</script>
<script>
  if ($("input[name='discount']:checked").val() == "no" ) { 
    $(".sebelum").css("display","none");
}
  $(".diskoncek1").click(function(){ 
if ($("input[name='discount']:checked").val() == "yes" ) { 
$(".sebelum").slideDown("fast");
} else {
$(".sebelum").slideUp("fast"); 
}
}); 
$(".diskoncek2").click(function(){ 
if ($("input[name='discount']:checked").val() == "yes" ) { 
$(".sebelum").slideDown("fast");
} else {
$(".sebelum").slideUp("fast"); 
}
});
$(".diskoncek3").click(function(){ 
if ($("input[name='discount']:checked").val() == "yes" ) { 
$(".sebelum").slideDown("fast");
} else {
$(".sebelum").slideUp("fast"); 
}
});  
</script>
<script>
    $(document).ready(function(){
        $(document).on('click', '.btnedit', function(){
            var idharga=$(this).val();
            $('#editModal').modal('show');
            const dateFormat="dddd, MMMM Do YYYY, h:mm";
            $.ajax({
                
                type: "GET",
                url:"/showeditharga/"+idharga,
                success:function(response){
                    //console.log(response.Rate.id);
                     //$('#orderid').val(response.Order.OrderID);
                     $('#idharga').val(response.Harga.id); 
                    $('#person').val(response.Harga.min);
                    $('#range').val(response.Harga.maks);
                    $('#harga').val(response.Harga.harga); 
                    $('#idtravel').val(response.Harga.wisata_id);  

                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModal").modal('hide');
        });
    });

    $(document).on('click', '.btnupdate', function(){
      var idtravel=$('#formedit').find('#idtravel').val()
            var orid=$('#formedit').find('#idharga').val()
            let formData=$('#formedit').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/updateharga/${idharga}',
                method:"PATCH",
                data:formData,
                success:function(data){
                    $('#editModal').modal('hide')
                    window.location.assign('/paketwisata/diskon/'+idtravel);
                }
            })
        });
        </script>

<script>
    $(document).ready(function(){
        $(document).on('click', '.tambahtime', function(){
            var idsubs=$(this).val();
            $('#Modaltime').modal('show');
            $.ajax({
                
                type: "GET",
                url:"/showaddjam/"+idsubs,
                success:function(response){
                     $('#idsubs').val(response.Sub.id); 
                    $('#idtraveljam').val(response.Sub.wisata_id);  

                }
            });
        });

        $(".btn-close").click(function(){
            $("#Modaltime").modal('hide');
        });
    });

    $(document).on('click', '.btntime', function(){
            var idtraveljam=$('#formtime').find('#idtraveljam').val()
            let formData=$('#formtime').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'{{url('addtime')}}',
                method:"POST",
                data:formData,
                success:function(data){
                    $('#Modaltime').modal('hide')
                    window.location.assign('/paketwisata/diskon/'+idtraveljam);
                }
            })
        });
        </script>

<script>
    $(document).ready(function(){
        $(document).on('click', '.tambahhargaperson', function(){
            var idsubperson=$(this).val();
            $('#Modalperson').modal('show');
            $.ajax({
                
                type: "GET",
                url:"/showaddjam/"+idsubperson,
                success:function(response){
                     $('#idsubperson').val(response.Sub.id); 
                    $('#idtravelperson').val(response.Sub.wisata_id);  

                }
            });
        });

        $(".btn-close").click(function(){
            $("#Modalperson").modal('hide');
        });
    });

    $(document).on('click', '.btnaddperson', function(){
            var idtravelperson=$('#formperson').find('#idtravelperson').val()
            let formData=$('#formperson').serialize()
            console.log(formData);

            $.ajax({
                url:'{{url('addhargaperson')}}',
                method:"POST",
                data:formData,
                success:function(data){
                    $('#Modalperson').modal('hide')
                    window.location.assign('/paketwisata/diskon/'+idtravelperson);
                }
            })
        });
        </script>

<script>
    $(document).ready(function(){
        $(document).on('click', '.tambahhargachild', function(){
            var idsubchild=$(this).val();
            $('#Modalchild').modal('show');
            $.ajax({
                
                type: "GET",
                url:"/showaddjam/"+idsubchild,
                success:function(response){
                     $('#idsubchild').val(response.Sub.id); 
                    $('#idtravelchild').val(response.Sub.wisata_id);  

                }
            });
        });

        $(".btn-close").click(function(){
            $("#Modalchild").modal('hide');
        });
    });

    $(document).on('click', '.btnaddchild', function(){
            var idtravelchild=$('#formchild').find('#idtravelchild').val()
            let formData=$('#formchild').serialize()
            // console.log(formData);

            $.ajax({
                url:'{{url('addhargachild')}}',
                method:"POST",
                data:formData,
                success:function(data){
                    $('#Modalchild').modal('hide')
                    window.location.assign('/paketwisata/diskon/'+idtravelchild);
                }
            })
        });
        </script>

<script>
    $(document).ready(function(){
        $(document).on('click', '.btnedittime', function(){
            var idtime=$(this).val();
            $('#editModaltime').modal('show');
           
            $.ajax({
                
                type: "GET",
                url:"/showeditjam/"+idtime,
                success:function(response){
                    //onsole.log(response.Rate.id);
                     //$('#orderid').val(response.Order.OrderID);
                     $('#idtime').val(response.Jam.id); 
                    $('#jam').val(response.Jam.time);  
                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModaltime").modal('hide');
        });
    });

    $(document).on('click', '.btnupdatetime', function(){
            var idtravel=$('#formedittime').find('#idtravel').val()
            var idtime=$('#formedittime').find('#idtime').val()
            
            let formData=$('#formedittime').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/updatetime/${idtime}',
                method:"PATCH",
                data:formData,
                success:function(data){
                    $('#editModaltime').modal('hide')
                    window.location.assign('/paketwisata/diskon/'+idtravel);
                }
            })
        });
        </script>

        <script>
    $(document).ready(function(){
        $(document).on('click', '.btneditchild', function(){
            var idhargachild=$(this).val();
            $('#editModalchild').modal('show');
            // const dateFormat="dddd, MMMM Do YYYY, h:mm";
            $.ajax({
                
                type: "GET",
                url:"/showedithargachild/"+idhargachild,
                success:function(response){
                    //console.log(response.Rate.id);
                     //$('#orderid').val(response.Order.OrderID);
                     $('#idhargachild').val(response.Child.id); 
                    $('#personchild').val(response.Child.min);
                    $('#rangechild').val(response.Child.maks);
                    $('#hargachild').val(response.Child.harga); 
                     $('#idtravels').val(response.Child.wisata_id);  
                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModalchild").modal('hide');
        });
    });

    $(document).on('click', '.btnupdatechild', function(){
            var idtravels=$('#formeditchild').find('#idtravels').val()
            var orid=$('#formeditchild').find('#idhargachild').val()
            let formData=$('#formeditchild').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/updatehargachild/${idhargachild}',
                method:"PATCH",
                data:formData,
                success:function(data){
                    $('#editModalchild').modal('hide')
                    window.location.assign('/paketwisata/diskon/'+idtravels);
                }
            })
        });
        </script>

<script>
    $(document).ready(function(){
        $(document).on('click', '.btneditharga', function(){
            var idtravell=$(this).val();
            $('#editModaldiskon').modal('show');
            // const dateFormat="dddd, MMMM Do YYYY, h:mm";
            $.ajax({
                
                type: "GET",
                url:"/showeditdiskon/"+idtravell,
                success:function(response){
                    //console.log(response.Rate.id);
                     //$('#orderid').val(response.Order.OrderID);
                     $('#idtravell').val(response.Diskon.wisata_id); 
                     $('#idr').val(response.Diskon.IDR); 
                     $('#idrdiscoun').val(response.Diskon.IDR);  
                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModaldiskon").modal('hide');
        });
    });

    $(document).on('click', '.btnupdatediskon', function(){
            var idtravell=$('#formeditdiskon').find('#idtravell').val()
            let formData=$('#formeditdiskon').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/updatediskon/${idtravell}',
                method:"PATCH",
                data:formData,
                success:function(data){
                    $('#editModaldiskon').modal('hide')
                    window.location.assign('/paketwisata/diskon/'+idtravell);
                }
            })
        });
        </script>

        <script>
  $(function(){
      $("#idr").keyup(function(e){
        $(this).val(format($(this).val()));
      });
      $("#diskon").keyup(function(e){
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

<script>
    $(document).ready(function(){
        $(document).on('click', '.btneditoption', function(){
            var idoption=$(this).val();
            $('#editModalOption').modal('show');
            // const dateFormat="dddd, MMMM Do YYYY, h:mm";
            $.ajax({
                
                type: "GET",
                url:"/showeditoption/"+idoption,
                success:function(response){
                    //console.log(response.Rate.id);
                     //$('#orderid').val(response.Order.OrderID);
                     $('#idoption').val(response.Option.id); 
                    $('#judulsub').val(response.Option.judulsub);
                    $('#short').val(response.Option.short);
                    $('#idtravel').val(response.Option.wisata_id); 
                    

                  
                  
                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModalOption").modal('hide');
        });

        $(document).on('click', '.btnupdateoption', function(){
            var idoption=$('#formeditoption').find('#idoption').val()
            var idtravel=$('#formeditoption').find('#idtravel').val()
            let formData=$('#formeditoption').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/updateoption/${idoption}',
                method:"PATCH",
                data:formData,
                success:function(data){
                    $('#editModalOption').modal('hide')
                    window.location.reload();
                    
                }
            })
        });
    });
    </script>

<script>
  $(document).ready(function() {
    $('input[name="status"]').change(function() {
      var isChecked = $(this).is(':checked');
      var idsub = $(this).siblings('input[name="idsub"]').val();

      $.ajax({
        url: '/updateavailableoption/' + idsub,
        type: 'POST',
        dataType: 'json',
        data: {
          _token: '{{ csrf_token() }}',
          status: isChecked ? 1 : 0 
        },
        success: function(response) {
          if (response.success) {
            console.log('Status updated successfully');
          } else {
            console.error('Failed to update status');
          }
        },
        error: function(xhr, status, error) {
          console.error('Error occurred while updating status:', error);
        }
      });
    });
  });
</script>

@endsection