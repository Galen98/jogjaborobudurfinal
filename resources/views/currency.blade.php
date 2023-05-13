@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Custom Rate</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr >
                          <th style="font-weight: bold;">
                            No.
                          </th>
                          <th style="font-weight: bold;">
                            Currency
                          </th>
                          <th style="font-weight: bold;">
                            Rate
                          </th>
                          <th style="font-weight: bold;">
                            Edit
                          </th>
                        </tr>
                      </thead>
                      <tbody>

                    
                        <tr>
                          <td>
                          1.
                          </td>
                          <td>
                         IDR
                          </td>
                          @foreach($rateidr as $item)
                          <td>
                          @currency($item->rate)
                          </td> 
                          <td>
                          <button type="button" class="btnedit btn btn-sm btn-info btn-rounded btn-fw" value="{{$item->id}}"><i class="mdi mdi-pencil-box"></i> Edit</button>
                          </td>
                          @endforeach
                        </tr>
                        <tr>
                        	<td>
                          2.
                          </td>
                          <td>
                         MYR
                          </td>
                          @foreach($ratemyr as $item)
                          <td>
                          MYR. {{number_format($item->rate , 2, ',', '.')}} 
                          </td> 
                          <td>
                          <button type="button" class="btnedit btn btn-sm btn-info btn-rounded btn-fw" value="{{$item->id}}"><i class="mdi mdi-pencil-box"></i> Edit</button>
                          </td>
                          @endforeach
                        </tr>
                        <tr>
                        	<td>
                          3.
                          </td>
                          <td>
                         SGD
                          </td>
                          @foreach($ratesgd as $item)
                          <td>
                          SGD. {{number_format($item->rate , 2, ',', '.')}} 
                          </td> 
                          <td>
                          <button type="button" class="btnedit btn btn-sm btn-info btn-rounded btn-fw" value="{{$item->id}}"><i class="mdi mdi-pencil-box"></i> Edit</button>
                          </td>
                          @endforeach
                        </tr>
                        <tr>
                        	<td>
                          4.
                          </td>
                          <td>
                         EUR
                          </td>
                          @foreach($rateeur as $item)
                          <td>
                          €. {{number_format($item->rate , 2, ',', '.')}} 
                          </td> 
                          <td>
                         <button type="button" class="btnedit btn btn-sm btn-info btn-rounded btn-fw" value="{{$item->id}}"><i class="mdi mdi-pencil-box"></i> Edit</button>
                          </td>
                          @endforeach
                        </tr>
                       
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
            <h5 class="modal-title" id="exampleModalLabel">Edit Rate</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('updatecurrency')}}" action="POST" enctype="multipart/form-data" id="formedit">
      	@csrf
      <div class="form-group">
        <label>Rate</label>
        <input type="hidden" name="idrate" id="idrate" readonly=""> 
        <input type="text" name="rate" class="form-control" id="rate">
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
        $(document).on('click', '.btnedit', function(){
            var idrate=$(this).val();
            $('#editModal').modal('show');
            const dateFormat="dddd, MMMM Do YYYY, h:mm";
            $.ajax({
                
                type: "GET",
                url:"/showeditcurrency/"+idrate,
                success:function(response){
                    console.log(response.Rate.id);
                     //$('#orderid').val(response.Order.OrderID);
                     $('#idrate').val(response.Rate.id); 
                    $('#rate').val(response.Rate.rate);  
                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModal").modal('hide');
        });
    });

    $(document).on('click', '.btnupdate', function(){
            var orid=$('#formedit').find('#idrate').val()
            let formData=$('#formedit').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/updatecurrency/${idrate}',
                method:"PATCH",
                data:formData,
                success:function(data){
                    $('#editModal').modal('hide')
                    window.location.assign('currency');
                }
            })
        });
        </script>
@endsection