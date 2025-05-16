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
                            Date Create
                          </th>
                          <th style="font-weight: bold;">
                            Message
                          </th>
                          <th style="font-weight: bold;">
                            Hapus
                          </th>
                          <th style="font-weight: bold;">
                            Status
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
                          {{ \Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %B %Y') }}
                          </td>
                          <td>
                          <button type="button" class="readbtn btn btn-sm btn-info btn-rounded btn-fw" value="{{$item->id}}"><i class="mdi mdi-information-outline"></i> Read</button>
                          </td>  
                          <td>
                          <button type="button" class="hapusbtn btn btn-sm btn-danger btn-rounded btn-fw" value="{{$item->id}}"><i class="mdi mdi-delete"></i> Hapus</button>
                          </td>
                          <td>
                            @if($item->status == 1)
                            <p class="text-success">Unread</p>
                            @else
                            <p class="text-secondary">Read</p>
                            @endif
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
        <i class="fa-solid fa-xmark"></i>
        </button>
      </div>
      <div class="modal-body">
        <textarea class="form-control" readonly="" id="idpesan" style="height:100px;"></textarea>
        <h6 class="modal-title mt-4" id="exampleModalLongTitle">Reply</h6>
        <form action="{{route('reply.email')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <input type="hidden" name="createdAt" id="createdAt">
        <input type="hidden" name="name" id="name">
        <input type="hidden" name="usermessage" id="usermessage">
        <input type="hidden" id="emailto" name="emailto" value="">
        <textarea class="form-control" id="replymail" name="emailreply" style="height:150px;"></textarea>
        <label class="mt-3">Attachments (Image/PDF):</label>
          <input type="file" name="attachments[]" accept="image/*,.pdf" multiple>
        <button type="submit" class="mt-2 btn btn-primary">Submit</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="close btn btn-secondary" data-id="" data-dismiss="modal">Close</button>
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
                    let createdAtRaw = response.Message.created_at;
                    let date = new Date(createdAtRaw + ' UTC'); 

                    let options = { month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit', hour12: true, timeZone: 'UTC' };
                    let formatted = new Intl.DateTimeFormat('en-US', options).format(date);
                    let finalText = `${formatted.replace(',', '')} UTC`;
                    $('#idpesan').val(response.Message.message);
                    $('#createdAt').val(finalText);
                    $('#name').val(response.Message.nama);
                    $('#usermessage').val(response.Message.message);
                    $('#emailto').val(response.Message.email);
                    $('.close').attr('data-id', response.Message.id);
                }
            });          
        });

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

        $(".close").click(function(){
          var idpesan = $(this).data('id');
          $.ajax({
              type: "GET",
              url: "/readmessage/"+idpesan,
              success: function(response) {
                $("#read").modal('hide');
                window.location.reload()
              }
          });
        });
       });

      </script>


@endsection

