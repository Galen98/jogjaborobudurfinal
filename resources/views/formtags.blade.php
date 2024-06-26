@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="card-body">
<h4 class="card-title">
	<button type="button" class="btnadd btn btn-danger mr-2">Add Tag</button>		
</h4>
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
                            Tag
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

                        @if(count($tag) === 0)
                      <tr>
                      <th colspan="4" class="text-center">No data</th>
                      </tr>
                      @else
                      @foreach($tag as $item)
                        <tr>
                          <td>
                          {{ $loop->iteration }}
                          </td>
                          <td>
                         {{$item->tags}}
                          </td>
                          <td><button type="button" class="editbtn btn btn-sm btn-info btn-rounded btn-fw" value="{{$item->id}}" style="color: white;"><i class="mdi mdi-pencil-box" style="color: white;"></i> Edit</button></td>
                          <td>
                          <button type="button" class="hapusbtn btn btn-sm btn-danger btn-rounded btn-fw" value="{{$item->id}}"><i class="mdi mdi-delete"></i> Hapus</button>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Hapus Tag</h5>
        <button type="button" class="batal close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
      @foreach($tag as $item)<form action="{{url('hapustag/'.$item->id)}}" method="POST" enctype="multipart/form-data" id="formhapus">
          @endforeach
      @csrf
        Apakah anda yakin ingin menghapus?
        <input type="hidden" name="idtags" id="idtags">
      <div class="modal-footer">
      <button type="button" class="batal btn btn-secondary">Tidak</button>
        <button type="submit" class="btn btn-danger btnhapus">Ya</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>      

            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add tag</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
          </div>
          <div class="modal-body">
          <div class="form-group">
      <form action="{{url('addtag')}}" action="POST" enctype="multipart/form-data" id="formadd">
        @method('post')
        @csrf
      <div class="form-group">
        <label>Tag name</label> 
        <input type="text" name="tag" class="form-control" id="tag">
        </div>
        <button type="button" class="btn btn-primary btnaddtag">Submit</button>
        </form>
        <br>
        </div>
        </div>
    </div>
    </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Tag</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
          </div>
          <div class="modal-body">
          <div class="form-group">
      <form action="{{url('updatetag')}}" action="POST" enctype="multipart/form-data" id="formedit">
        @csrf
      <div class="form-group">
        <label>Tag</label>
        <input type="hidden" name="idtag" id="idtag" readonly=""> 
        <input type="hidden" name="namatag" class="form-control" id="namatag">
        <input type="text" name="tags" class="form-control" id="tags">
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
        $(document).on('click', '.btnadd', function(){
           
            $('#addModal').modal('show');
          
        });

        $(".btn-close").click(function(){
            $("#addModal").modal('hide');
        });
    });

    $(document).on('click', '.btnaddtag', function(){
            let formData=$('#formadd').serialize()
            //console.log(progid);
            

            $.ajax({
                url:'{{url('addtag')}}',
                method:"POST",
                data:formData,
                success:function(data){
                    $('#editModal').modal('hide')
                    window.location.assign('tag-blog');
                }
            })
        });

</script>

<script>
    $(document).ready(function(){
        $(document).on('click', '.editbtn', function(){
            var idtag=$(this).val();
            $('#editModal').modal('show');
          
            $.ajax({
                type: "GET",
                url:"/showedittag/"+idtag,
                success:function(response){
                     //$('#orderid').val(response.Order.OrderID);
                     $('#idtag').val(response.Tag.id);
                     $('#namatag').val(response.Tag.tags); 
                     $('#tags').val(response.Tag.tags);   
                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModal").modal('hide');
        });
    });

    $(document).on('click', '.btnupdate', function(){
            var idtag=$('#formedit').find('#idtag').val()
            let formData=$('#formedit').serialize()
            //console.log(progid);

            $.ajax({
                url:'/updatetag/${idtag}',
                method:"PATCH",
                data:formData,
                success:function(data){
                    $('#editModal').modal('hide')
                    window.location.assign('tag-blog');
                }
            })
        });
        </script>

<script>
       $(document).ready(function(){ 
        $(document).on('click', '.hapusbtn', function(){
            var idtags=$(this).val();
            $('#hapus').modal('show');
            $.ajax({
                type: "GET",
                url:"/showedittag/"+idtags,
                success:function(response){
                    $('#idtags').val(response.Tag.id);
                }
            });
          
        });

    $(document).on('click', '.btnhapus', function(){
            var idtags=$('#formhapus').find('#idtags').val()
            let formData=$('#formhapus').serialize()
            //console.log(progid);
            console.log(formData)
            $.ajax({
                url:'/hapustag/${idtags}',
                method:"DELETE",
                data:formData,
                success:function(data){
                    $('#hapus').modal('hide')
                    window.location.assign('blog');
                }
            });
        });
        $(".batal").click(function(){
            $("#hapus").modal('hide');
        });
       });
            
        </script>
@endsection