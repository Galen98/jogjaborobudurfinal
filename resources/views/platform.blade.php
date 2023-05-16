@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Online Booking Platform</h4>
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
                          Official Website
                          </th>
                          <th style="font-weight: bold;">
                          Company Address
                          </th>
                          <th style="font-weight: bold;">
                            Detail
                          </th>
                          <th style="font-weight: bold;">
                            Hapus
                          </th>
                        </tr>
                      </thead>
                      <tbody>

                      @if(count($platform) === 0)
                      <tr>
                      <th colspan="6" class="text-center">No data</th>
                      </tr>
                      @else
                      @foreach($platform as $item)
                        <tr>
                          <td>
                          {{ $loop->iteration }}
                          </td>
                          <td>
                         {{$item->name ?? ''}}
                          </td>
                          <td>
                          {{$item->website ?? ''}}
                          </td>
                          <td>
                          {{$item->address ?? ''}}
                          </td>
                          <td><button type="button" class="editbtn btn btn-sm btn-info btn-rounded btn-fw" value="{{$item->id}}"><i class="mdi mdi-eye "></i> Detail</button></td>
     
                          
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
            {{ $platform->links() }}
            </div>

            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <div class="form-group">
        <label>Official Website</label>
        <input type="text" class="form-control" id="website" readonly>
        </div>
        <br>
        <div class="form-group">
        <label>Corporate Address</label>
        <input type="text" class="form-control" id="address" readonly>
        </div>
            <br>
            <div class="form-group">
        <label>Name</label>
        <input type="text"  class="form-control" id="name" readonly>
        </div>
            <br>
            <div class="form-group">
        <label>Job Title</label>
        <input type="text"  class="form-control" id="job" readonly>
        </div>
            <br>
            <div class="form-group">
        <label>Contact</label>
        <input type="text"  class="form-control" id="contact" readonly>
        </div>
            <br>
            <div class="form-group">
        <label>Email</label>
        <input type="text"  class="form-control" id="email" readonly>
        </div>
        <br>
        <div class="form-group">
        	<label>Message</label>
        <textarea type="textarea" class="form-control" style="height:100px;" id="message" readonly></textarea>
        </div>
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
      @foreach($platform as $item)<form action="{{url('hapusplatform/'.$item->id)}}" method="POST" enctype="multipart/form-data" id="formhapus">
          @endforeach
          @method('delete')
      @csrf
        <p>Apakah anda yakin ingin menghapus?</p> 
        <input type="hidden" name="idplatform" id="idplatform">
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
            var platformid=$(this).val();
            $('#editModal').modal('show');
         
            $.ajax({
                
                type: "GET",
                url:"/detailplatform/"+platformid,
                success:function(response){
                    //console.log(response.Progres.Nama);
                     //$('#orderid').val(response.Order.OrderID);
                    $('#website').val(response.Platform.website);
                    $('#address').val(response.Platform.address);
                    $('#name').val(response.Platform.name);
                    $('#job').val(response.Platform.job);
                    $('#contact').val(response.Platform.phone);
                    $('#email').val(response.Platform.email);
                    $('#message').val(response.Platform.message);
                   
                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModal").modal('hide');
        });
    });
        </script>

        <script>
       $(document).ready(function(){ 
        $(document).on('click', '.hapusbtn', function(){
            var idplatform=$(this).val();
            $('#hapus').modal('show');
            $.ajax({
                type: "GET",
                url:"/detailplatform/"+idplatform,
                success:function(response){
                    $('#idplatform').val(response.Platform.id);
                }
            });
          
        });

    $(document).on('click', '.btnhapus', function(){
            //var paketid=$('#formhapus').find('#idblog').val()
            let formData=$('#formhapus').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/hapusplatform/${idplatform}',
                method:"DELETE",
                data:formData,
                success:function(data){
                    $('#hapus').modal('hide')
                    window.location.assign('message/platform');
                }
            });
        });
        $(".batal").click(function(){
            $("#hapus").modal('hide');
        });
       });
            
        </script>
@endsection

