@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="container">
  <div class="row">
    <div class="card-body">
      <form action="/destination-category/form" method="GET" >
        <button class="btn btn-danger btn-icon-text">
          <i class="mdi mdi-upload btn-icon-prepend"></i>                                                    
          Buat Kategori Destinasi
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
                            Category Destination
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

                        @if(count($destination) === 0)
                      <tr>
                      <th colspan="3" class="text-center">No data</th>
                      </tr>
                      @else
                      @foreach($destination as $item)
                        <tr>
                          <td>
                          {{ $loop->iteration }}
                          </td>
                          <td>
                         {{$item->destination ?? ''}}
                          </td>
                          <td>
                          <button type="button" class="editbtn btn btn-sm btn-info btn-rounded btn-fw" style="color: white;" value="{{$item->id}}">
                          <i class="mdi mdi-pencil-box" style="color: white;"></i> Edit</button>
                          </td>
                          <td>
                            <form action="{{url('deletedestination/'.$item->id)}}" method="POST" enctype="multipart/form-data">
                            @method('delete')
                            @csrf
                          <button type="submit" class="hapusbtn btn btn-sm btn-danger btn-rounded btn-fw" style="color: white;"><i class="mdi mdi-delete" style="color: white;"></i> Delete</button>
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
            <h5 class="modal-title" id="exampleModalLabel">Edit Destination</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('updatedestination')}}" action="POST" enctype="multipart/form-data" id="formedit">
        @csrf
      <div class="form-group">
        <label>Destination</label>
        <input type="hidden" name="iddestination" id="iddestination" readonly=""> 
        <input type="text" name="destination" class="form-control" id="destination">
        <label>Short Description</label>
        <input type="text" name="short" class="form-control" id="short">
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
            var iddestination=$(this).val();
            $('#editModal').modal('show');
          
            $.ajax({
                
                type: "GET",
                url:"/showeditdestination/"+iddestination,
                success:function(response){
                    console.log(response.Destination.id);
                     //$('#orderid').val(response.Order.OrderID);
                     $('#iddestination').val(response.Destination.id); 
                      $('#destination').val(response.Destination.destination);  
                     $('#short').val(response.Destination.shortdescription);  
                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModal").modal('hide');
        });
    });

    $(document).on('click', '.btnupdate', function(){
            var orid=$('#formedit').find('#iddestination').val()
            let formData=$('#formedit').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/updatecategory/${iddestination}',
                method:"PATCH",
                data:formData,
                success:function(data){
                    $('#editModal').modal('hide')
                    window.location.assign('destination-category');
                }
            })
        });
        </script>
@endsection