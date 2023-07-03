@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="container">
  <div class="row">
    <div class="card-body">
      <form action="/province/form" method="GET" >
        <button class="btn btn-danger btn-icon-text">
          <i class="mdi mdi-upload btn-icon-prepend"></i>                                                    
          Create Province List
        </button>
      </form>
    </div>
  </div>
</div>

<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr >
                          <th style="font-weight: bold;">
                            No.
                          </th>
                          <th style="font-weight: bold;">
                            Province
                          </th>
                          <th style="font-weight: bold;">
                            Edit
                          </th>
                          <th style="font-weight: bold;">
                            Delete
                          </th>
                        </tr>
                      </thead>
                      <tbody>

                        @if(count($province) === 0)
                      <tr>
                      <th colspan="3" class="text-center">No data</th>
                      </tr>
                      @else
                      @foreach($province as $item)
                        <tr>
                          <td>
                          {{ $loop->iteration }}
                          </td>
                          <td>
                         {{$item->namaprovince ?? ''}}
                         <!-- {{ Str::title(str_replace('-', ' ', $item->slugprovince)) }} -->
                          </td>
                          <td>
                          <button type="button" class="editbtn btn btn-sm btn-info btn-rounded btn-fw" style="color: white;" value="{{$item->id}}">
                          <i class="mdi mdi-pencil-box" style="color: white;"></i> Edit</button>
                          </td>
                          <td>
                          <button type="button" class="hapusbtn btn btn-sm btn-danger btn-rounded btn-fw" style="color: white;"  value="{{$item->id}}"><i class="mdi mdi-delete" style="color: white;"></i> Delete</button>
                          </td>
                        </tr>  
                        @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

  <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Hapus Province</h5>
        <button type="button" class="batal close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
      @foreach($province as $item)<form action="{{url('hapusprovince/'.$item->id)}}" method="POST" enctype="multipart/form-data" id="formhapus">@endforeach
      @csrf
        Apakah anda yakin ingin menghapus?
        <input type="hidden" name="idprovince" id="idprovince">
        <input type="hidden" name="namaprovince" id="namaprovince">
      <div class="modal-footer">
      <button type="button" class="batal btn btn-secondary">Tidak</button>
        <button type="submit" class="btn btn-danger btnhapus">Ya</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Province</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('updateprovince')}}" action="POST" enctype="multipart/form-data" id="formedit">
        @csrf
      <div class="form-group">
        <label>Nama Province</label>
        <input type="hidden" name="provinceid" id="provinceid" readonly=""> 
        <input type="hidden" name="namaprovinsi" id="namaprovinsi" readonly=""> 
        <input type="text" name="namaprovinces" class="form-control" id="namaprovinces">
        <label>Short Description</label>
        <textarea name="shorts" class="form-control" id="shorts" cols="30" rows="10"></textarea>
        </div>
        <button type="button" class="btn btn-primary btnupdate">Update</button>
        </form>
        <br>
        </div>
    </div>
</div>
</div>
</div>
@endsection

@section('scripts')
<script>
       $(document).ready(function(){ 
        $(document).on('click', '.hapusbtn', function(){
            var idprovince=$(this).val();
            $('#hapus').modal('show');
            $.ajax({
                type: "GET",
                url:"/showdeleteprovince/"+idprovince,
                success:function(response){
                    $('#idprovince').val(response.Province.id);
                    $('#namaprovince').val(response.Province.namaprovince);
                    
                }
            });
          
        });

    $(document).on('click', '.btnhapus', function(){
            var province=$('#formhapus').find('#idprovince').val()
            let formData=$('#formhapus').serialize()
            //console.log(progid);
            console.log(formData)
            $.ajax({
                url:'/hapusprovince/${idprovince}',
                method:"DELETE",
                data:formData,
                success:function(data){
                    $('#hapus').modal('hide')
                    window.location.assign('/province');
                }
            });
        });
        $(".batal").click(function(){
            $("#hapus").modal('hide');
        });
       });
            
        </script>

<script>
    $(document).ready(function(){
        $(document).on('click', '.editbtn', function(){
            var provinceid=$(this).val();
            $('#editModal').modal('show');
          
            $.ajax({
                
                type: "GET",
                url:"/showdeleteprovince/"+provinceid,
                success:function(response){
                    $('#provinceid').val(response.Province.id);
                    $('#namaprovinces').val(response.Province.namaprovince);
                    $('#shorts').val(response.Province.shortdescription);
                    $('#namaprovinsi').val(response.Province.namaprovince);
                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModal").modal('hide');
        });
    });

    $(document).on('click', '.btnupdate', function(){
            var provinceid=$('#formedit').find('#provinceid').val()
            let formData=$('#formedit').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/updateprovince/${provinceid}',
                method:"PATCH",
                data:formData,
                success:function(data){
                    $('#editModal').modal('hide')
                    window.location.assign('/province');
                }
            })
        });
        </script>        
@endsection