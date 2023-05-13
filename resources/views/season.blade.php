@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                  	<form action="/formseason" method="GET">
					<button type="submit" class="btnadd btn btn-danger mr-2">Tambah Theme</button>
					</form>
					</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr >
                          <th style="font-weight: bold;">
                            No.
                          </th>
                          <th style="font-weight: bold;">
                            Theme
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

                        @if(count($season) === 0)
                      <tr>
                      <th colspan="4" class="text-center">No data</th>
                      </tr>
                      @else
                      @foreach($season as $item)
                        <tr>
                          <td>
                          {{ $loop->iteration }}
                          </td>
                          <td>
                         {{$item->namaseason}}
                          </td>
                          <td><button type="button" class="editbtn btn btn-sm btn-info btn-rounded btn-fw" value="{{$item->id}}" style="color: white;"><i class="mdi mdi-pencil-box" style="color: white;"></i> Edit</button></td>
                          <td>
                          <form action="{{url('deletetheme/'.$item->id)}}" method="POST" enctype="multipart/form-data">
                          @method('delete')
                          @csrf
                          <button type="submit" class="hapusbtn btn btn-sm btn-danger btn-rounded btn-fw"><i class="mdi mdi-delete"></i> Hapus</button>
                          </form>
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
            <h5 class="modal-title" id="exampleModalLabel">Edit Theme</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <div class="form-group">
      <form action="{{url('updatetheme')}}" action="POST" enctype="multipart/form-data" id="formedit">
        @csrf
      <div class="form-group">
        <label>Theme</label>
        <input type="hidden" name="idtheme" id="idtheme" readonly=""> 
        <input type="text" name="theme" class="form-control" id="theme">
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
        $(document).on('click', '.editbtn', function(){
            var idtheme=$(this).val();
            $('#editModal').modal('show');
          
            $.ajax({
                type: "GET",
                url:"/showedittheme/"+idtheme,
                success:function(response){
                    console.log(response.Theme.id);
                     //$('#orderid').val(response.Order.OrderID);
                     $('#idtheme').val(response.Theme.id); 
                     $('#theme').val(response.Theme.namaseason);   
                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModal").modal('hide');
        });
    });

    $(document).on('click', '.btnupdate', function(){
            var orid=$('#formedit').find('#idtheme').val()
            let formData=$('#formedit').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/updatetheme/${idtheme}',
                method:"PATCH",
                data:formData,
                success:function(data){
                    $('#editModal').modal('hide')
                    window.location.assign('season');
                }
            })
        });
        </script>
@endsection