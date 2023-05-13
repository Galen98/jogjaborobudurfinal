@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Influencer</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr >
                          <th style="font-weight: bold;">
                            No.
                          </th>
                          <th style="font-weight: bold;">
                            Website
                          </th>
                          <th style="font-weight: bold;">
                            Email
                          </th>
                          <th style="font-weight: bold;">
                            Social Media
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

                      @if(count($influencer) === 0)
                      <tr>
                      <th colspan="6" class="text-center">No data</th>
                      </tr>
                      @else
                      @foreach($influencer as $item)  
                        <tr>
                          <td>
                          {{ $loop->iteration }}
                          </td>
                          <td>
                         {{$item->website ?? ''}}
                          </td>
                          <td>
                          {{$item->email ?? ''}}
                          </td>
                          <td>
                          {{$item->socialmedia ?? ''}}
                          </td>
                          <td>
                          {{$item->message ?? ''}}
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
            {{ $influencer->links() }}
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
      @foreach($influencer as $item)<form action="{{url('hapusinfluencer/'.$item->id)}}" method="POST" enctype="multipart/form-data" id="formhapus">
          @endforeach
          @method('delete')
      @csrf
        <p>Apakah anda yakin ingin menghapus?</p> 
        <input type="hidden" name="idinfluencer" id="idinfluencer">
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
        $(document).on('click', '.hapusbtn', function(){
            var idinfluencer=$(this).val();
            $('#hapus').modal('show');
            $.ajax({
                type: "GET",
                url:"/detailinfluencer/"+idinfluencer,
                success:function(response){
                    $('#idinfluencer').val(response.Influencer.id);
                }
            });
          
        });

    $(document).on('click', '.btnhapus', function(){
            var paketid=$('#formhapus').find('#idblog').val()
            let formData=$('#formhapus').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/hapusinfluencer/${idinfluencer}',
                method:"DELETE",
                data:formData,
                success:function(data){
                    $('#hapus').modal('hide')
                    window.location.assign('message/influencer');
                }
            });
        });
        $(".batal").click(function(){
            $("#hapus").modal('hide');
        });
       });
            
        </script>
@endsection

