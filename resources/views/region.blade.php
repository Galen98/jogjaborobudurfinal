@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')

    <div class="card-body">
      <form action="/region/form" method="GET" >
        <button class="btn btn-danger btn-icon-text">
          <i class="mdi mdi-upload btn-icon-prepend"></i>                                                    
          Create New City
        </button>
      </form>
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
                           City
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

                        @if(count($region) === 0)
                      <tr>
                      <th colspan="3" class="text-center">No data</th>
                      </tr>
                      @else
                      @foreach($region as $item)
                        <tr>
                          <td>
                          {{ $loop->iteration }}
                          </td>
                          <td>
                         {{$item->namaregion ?? ''}}
                          </td>
                          <td>
                          <form action="{{'region/edit/'.$item->id}}" method="GET">
                          <button type="submit" class="btn btn-sm btn-info btn-rounded btn-fw" style="color: white;" value="{{$item->id}}">
                          <i class="mdi mdi-pencil-box" style="color: white;"></i> Edit</button>
                          </form>
                          </td>
                          <td>
                    
                          <button type="button" class="hapusbtn btn btn-sm btn-danger btn-rounded btn-fw" style="color: white;" value="{{$item->id}}"><i class="mdi mdi-delete" style="color: white;"></i> Delete</button>

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

            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit City</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('updateregion')}}" action="POST" enctype="multipart/form-data" id="formedit">
        @csrf
      <div class="form-group">
        <label>Nama City</label>
        <input type="hidden" name="regionid" id="regionid" readonly=""> 
        <input type="hidden" name="namaregion" id="namaregion" readonly=""> 
        <input type="text" name="namaregions" class="form-control" id="namaregions">
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

<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Hapus City</h5>
        <button type="button" class="batal close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
      @foreach($region as $item)<form action="{{url('hapusregion/'.$item->id)}}" method="POST" enctype="multipart/form-data" id="formhapus">@endforeach
      @csrf
        Apakah anda yakin ingin menghapus?
        <input type="hidden" name="idregions" id="idregions">
        <input type="hidden" name="namaregiones" id="namaregiones">
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
        $(document).on('click', '.editbtn', function(){
            var regionid=$(this).val();
            $('#editModal').modal('show');
          
            $.ajax({
                
                type: "GET",
                url:"/showdeleteregion/"+regionid,
                success:function(response){
                    $('#regionid').val(response.City.id);
                    $('#namaregions').val(response.City.namaregion);
                    $('#shorts').val(response.City.shortdescription);
                    $('#namaregion').val(response.City.namaregion);
                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModal").modal('hide');
        });
    });

    $(document).on('click', '.btnupdate', function(){
            var regionid=$('#formedit').find('#regionid').val()
            let formData=$('#formedit').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/updateregion/${regionid}',
                method:"PATCH",
                data:formData,
                success:function(data){
                    $('#editModal').modal('hide')
                    window.location.assign('/region');
                }
            })
        });
        </script>  

<script>
       $(document).ready(function(){ 
        $(document).on('click', '.hapusbtn', function(){
            var idregions=$(this).val();
            $('#hapus').modal('show');
            $.ajax({
                type: "GET",
                url:"/showdeleteregion/"+idregions,
                success:function(response){
                    $('#idregions').val(response.City.id);
                    $('#namaregiones').val(response.City.namaregion);
                    
                }
            });
          
        });

    $(document).on('click', '.btnhapus', function(){
            var region=$('#formhapus').find('#idregions').val()
            let formData=$('#formhapus').serialize()
            //console.log(progid);
            console.log(formData)
            $.ajax({
                url:'/hapusregion/${idregions}',
                method:"DELETE",
                data:formData,
                success:function(data){
                    $('#hapus').modal('hide')
                    window.location.assign('/region');
                }
            });
        });
        $(".batal").click(function(){
            $("#hapus").modal('hide');
        });
       });
            
        </script>
@endsection