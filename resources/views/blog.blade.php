@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="card-body">
<form action="/blogadmin/formblog" method="GET" >
<button class="btn btn-danger btn-icon-text">
<i class="mdi mdi-upload btn-icon-prepend"></i>                                                    
Posting Blog
</button>
</form>
</div>

<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Daftar Blog</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            No.
                          </th>
                          <th>
                            Judul Blog
                          </th>
                          <th>
                            Waktu Posting
                          </th>
                          <th>
                            Lihat
                          </th>
                          <th>
                            Edit
                          </th>
                          <th>
                            Hapus
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($blog) === 0)
                      <tr>
                      <th colspan="6" class="text-center">No data</th>
                      </tr>
                      @else
                      @foreach($blog as $item)
                        <tr>
                          <td>
                          {{ $loop->iteration }}
                          </td>
                          <td class="font-weight-bold">
                          {{$item->judulblog ?? ''}}
                          </td>
                          <td class="text-secondary">
                          {{\Carbon\Carbon::parse($item->created_at)->format('d/m/Y') ?? ''}}
                          </td>
                          <td>
                          <form action="{{'/blog/'.$item->slug}}" method="get">
                          <button type="submit" class="btn btn-sm btn-info btn-rounded btn-fw"><i class="mdi mdi-eye "></i> Lihat</button>
                          </form>
                          </td>
                          <td>
                          <form action="{{'blogadmin/editblog/'.$item->id}}" method="get">
                          <button type="submit" class="btn btn-sm btn-info btn-rounded btn-fw" style="color: white;"><i class="mdi mdi-pencil-box" style="color: white;"></i> Edit</button>
                          </form>
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
            {{ $blog->links() }}
            </div>

  <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Hapus Blog</h5>
        <button type="button" class="batal close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
      @foreach($blog as $item)<form action="{{url('hapusblog/'.$item->id)}}" method="POST" enctype="multipart/form-data" id="formhapus">
          @endforeach
          @method('delete')
      @csrf
        Apakah anda yakin ingin menghapus?
        <input type="hidden" name="idblog" id="idblog">
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
            var idblog=$(this).val();
            $('#hapus').modal('show');
            $.ajax({
                type: "GET",
                url:"/showhapusblog/"+idblog,
                success:function(response){
                    $('#idblog').val(response.Blog.id);
                }
            });
          
        });

    $(document).on('click', '.btnhapus', function(){
            var paketid=$('#formhapus').find('#idblog').val()
            let formData=$('#formhapus').serialize()
            //console.log(progid);
            console.log(formData)
            $.ajax({
                url:'/hapusblog/${idblog}',
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
