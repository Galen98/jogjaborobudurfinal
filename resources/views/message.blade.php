@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Message</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr >
                          <th style="font-weight: bold;">
                            No.
                          </th>
                          <th style="font-weight: bold;">
                            Name
                          </th>
                          <th style="font-weight: bold;">
                            Email
                          </th>
                          <th style="font-weight: bold;">
                            Message
                          </th>
                          <th style="font-weight: bold;">
                            Hapus
                          </th>
                        </tr>
                      </thead>
                      <tbody>

                        @if(count($message) === 0)
                      <tr>
                      <th colspan="6" class="text-center">No data</th>
                      </tr>
                      @else
                      @foreach($message as $item)
                        <tr>
                          <td>
                          {{ $loop->iteration }}
                          </td>
                          <td>
                         {{$item->nama ?? ''}}
                          </td>
                          <td>
                          {{$item->email ?? ''}}
                          </td>
                          <td>
                          <button type="button" class="readbtn btn btn-sm btn-info btn-rounded btn-fw" value="{{$item->id}}"><i class="mdi mdi-information-outline"></i> Read</button>
                          </td>  
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
            <div class="col-lg-12">
            {{ $message->links() }}
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
      @foreach($message as $item)<form action="{{url('hapusmessage/'.$item->id)}}" method="POST" enctype="multipart/form-data" id="formhapus">
          @endforeach
          @method('delete')
      @csrf
        <p>Apakah anda yakin ingin menghapus?</p> 
        <input type="hidden" name="idmessage" id="idmessage">
      <div class="modal-footer">
      <button type="button" class="batal btn btn-secondary">Tidak</button>
        <button type="submit" class="btn btn-danger btnhapus">Ya</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="read" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <textarea class="form-control" readonly="" id="idpesan" style="height:400px;"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="close btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 
@endsection

@section('scripts')
        <script>
       $(document).ready(function(){ 
        $(document).on('click', '.hapusbtn', function(){
            var idmessage=$(this).val();
            $('#hapus').modal('show');
            $.ajax({
                type: "GET",
                url:"/showhapusmessage/"+idmessage,
                success:function(response){
                    $('#idmessage').val(response.Message.id);
                }
            });
          
        });

    $(document).on('click', '.btnhapus', function(){
            var paketid=$('#formhapus').find('#idmessage').val()
            let formData=$('#formhapus').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/hapusimessage/${idmessage}',
                method:"DELETE",
                data:formData,
                success:function(data){
                    $('#hapus').modal('hide')
                    window.location.assign('message/message');

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
        $(document).on('click', '.readbtn', function(){
            var idpesan=$(this).val();
            $('#read').modal('show');
            $.ajax({
                type: "GET",
                url:"/showmessage/"+idpesan,
                success:function(response){
                    $('#idpesan').val(response.Message.message);
                }
            });
          
        });

        $(".close").click(function(){
            $("#read").modal('hide');
        });
       });

      </script>


@endsection

