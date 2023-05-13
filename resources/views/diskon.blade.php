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
                        <div class="form-group row">
                          <div class="col-sm-4">
                            <div class="form-check">
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
                        <div class="form-group row">
                          <div class="col-sm-4">
                            <div class="form-check">
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
                        <div class="form-group row">
                          <div class="col-sm-4">
                            <div class="form-check">
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
                    <p>in IDR</p>
                    <input type="text" class="form-control" id="exampleInputEmail3" id="idr" name="idr" placeholder="@currency($item->IDR)" value="{{$item->IDR}}" readonly=""> 
                    </div>

                    <div class="form-group">
                    <label for="exampleInputPassword4">Harga Diubah</label>
                    <p>in IDR</p>
                    <input type="text" class="form-control" id="exampleInputEmail3" name="idrdiscount" placeholder="Masukan harga diskon">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
				</form>
				
<br>
<br>
<form action="{{'/paketwisata/diskon/buatoption/' .$item->wisata_id}}" method="GET"> 
<button type="submit" class="btn btn-danger mr-2">Add new option</button>
</form>
@endforeach
<br>
<br>
<div class="col-lg-12 grid-margin stretch-card">

              <div class="card" >
                  @foreach($pilihan as $item) 
                <div class="card-body" style="border-bottom: 1px solid #e0e0de;">
                 <h4 class="card-title">{{$item->judulsub}}</h4>
                 <p>{{$item->short}}</p>
                <i class="mdi mdi-account-multiple"></i> <h5 class="card-title">{{$item->kategories}}</h5>
                 <button type="button" class="btneditoption btn btn-sm btn-info btn-rounded btn-fw" style="color: white;" value="{{$item->id}}"><i class="mdi mdi-pencil-box" style="color: white;"></i> Edit</button>

                 <form action="{{url('deleteoption/'.$item->id)}}" method="POST" enctype="multipart/form-data">
          @method('delete')
          @csrf
          <br>
                 <button type="submit" class="hapusbtn btn btn-sm btn-danger btn-rounded btn-fw" style="color: white;"><i class="mdi mdi-delete" style="color: white;"></i> Delete</button>
                 </form>
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
                          {{$h->harga ?? ''}}
                          </td>
                          <td>
                          
                          <button type="button" class="btnedit btn btn-sm btn-info btn-rounded btn-fw" style="color: white;" value="{{$h->id}}"><i class="mdi mdi-pencil-box" style="color: white;"></i></button>
                          
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <br>
                  <h4 class="card-title">Harga Child</h4>
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
                          {{$hc->harga ?? ''}}
                          </td>
                          <td>
                          
                          <button type="button" class="btn btneditchild btn-sm btn-info btn-rounded btn-fw" style="color: white;" value="{{$hc->id}}"><i class="mdi mdi-pencil-box" style="color: white;"></i></button>
                          
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
            <span aria-hidden="true">&times;</span>
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

<div class="modal fade" id="editModalchild" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="btn-close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('updatehargachild')}}" action="POST" enctype="multipart/form-data" id="formeditchild">
        @csrf
      <div class="form-group">
        <input type="hidden" name="idtravel" id="idtravel" readonly="">
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

<div class="modal fade" id="editModalOption" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="btn-close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
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
        Per Person / Per Group
        <select class="form-control" id="personoption" name="personoption">
          <option class="form-control" value="Per Person">Per Person</option>
          <option class="form-control" value="Per Group">Per Group</option>
        </select>
        
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
                     $('#idtravel').val(response.Child.wisata_id);  
                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModalchild").modal('hide');
        });
    });

    $(document).on('click', '.btnupdatechild', function(){
            var idtravel=$('#formeditchild').find('#idtravel').val()
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
                    window.location.assign('/paketwisata/diskon/'+idtravel);
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

@endsection