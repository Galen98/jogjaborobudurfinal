@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
					<button type="button" class="btnadd btn btn-danger mr-2">Tambah Bahasa</button>
					</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr >
                          <th style="font-weight: bold;">
                            No.
                          </th>
                          <th style="font-weight: bold;">
                            Bahasa
                          </th>
                          <th style="font-weight: bold;">
                            Delete
                          </th>
                        </tr>
                      </thead>
                      <tbody>

                        @if(count($bahasa) === 0)
                      <tr>
                      <th colspan="3" class="text-center">No data</th>
                      </tr>
                      @else
                      @foreach($bahasa as $item)
                        <tr>
                          <td>
                          {{ $loop->iteration }}
                          </td>
                          <td>
                         {{$item->bahasa ?? ''}}
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
            <button type="button" class="btn-close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('addbahasa')}}" action="POST" enctype="multipart/form-data" id="formedit">
        @csrf
      <div class="form-group">
        Bahasa 
        <input type="text" name="bahasa" class="form-control" id="bahasa">
        </div>
        <button type="button" class="btn btn-primary btnsubmit">Submit</button>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Hapus Bahasa</h5>
        <button type="button" class="batal close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
      @foreach($bahasa as $item)<form action="{{url('hapusbahasa/'.$item->id)}}" method="POST" enctype="multipart/form-data" id="formhapus">
          @endforeach
          @method('delete')
      @csrf
        Apakah anda yakin ingin menghapus?
        <input type="hidden" name="idlanguage" id="idlanguage">
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
        $(document).on('click', '.btnadd', function(){
            var idharga=$(this).val();
            $('#editModal').modal('show');
          
        });

        $(".btn-close").click(function(){
            $("#editModal").modal('hide');
        });
    });

    $(document).on('click', '.btnsubmit', function(){
            let formData=$('#formedit').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'addbahasa',
                method:"POST",
                data:formData,
                success:function(data){
                    $('#editModal').modal('hide')
                    window.location.reload();
                }
            })
        });
        </script>

        <script>
       $(document).ready(function(){ 
        $(document).on('click', '.hapusbtn', function(){
            var idlanguage=$(this).val();
            $('#hapus').modal('show');
            $.ajax({
                type: "GET",
                url:"/showhapuslanguage/"+idlanguage,
                success:function(response){
                    $('#idlanguage').val(response.Language.id);
                }
            });
          
        });

    $(document).on('click', '.btnhapus', function(){
            var id=$('#formhapus').find('#idlanguage').val()
            let formData=$('#formhapus').serialize()
            //console.log(progid);
            console.log(formData)
            $.ajax({
                url:'/hapusbahasa/${idlanguage}',
                method:"DELETE",
                data:formData,
                success:function(data){
                    $('#hapus').modal('hide')
                    window.location.assign('bahasa');
                }
            });
        });
        $(".batal").click(function(){
            $("#hapus").modal('hide');
        });
       });
            
        </script>
@endsection