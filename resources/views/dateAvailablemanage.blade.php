@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="card border-0 bg-transparent">
<div class="card-body">
<h3 class="card-title">{{$namaOption}}</h3>
<a href="/dateavailable/item/manage/create/{{$ids}}" class="btn btn-md mt-3 btn-danger rounded-lg">Add new</a>
</div>
</div>

<div class="card border-0 bg-transparent">
<div class="card-body">
    
<div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            No.
                          </th>
                          <th>
                            Date
                          </th>
                          <th>
                            Availability
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                       @if(count($getAvailable) == null)
                        <tr>
                           <th colspan="3" class="text-center">No data</th>
                        </tr>
                        @else
                        @foreach($getAvailable as $item)
                        <tr>
                          <th>{{$loop->iteration}}</th>
                          <th>{{ $item->date }}</th>
                          <th>
                          <div class="form-check form-switch ml-5">
                        @if($item->status == true)
                        <input class="form-check-input" type="checkbox" name="status" role="switch" id="flexSwitchCheckChecked" checked style="height:22px;width:50px;">
                        @elseif($item->status == false)
                        <input class="form-check-input" type="checkbox" name="status" role="switch" id="flexSwitchCheckChecked" style="height:22px;width:50px;">
                        @else
                        <input class="form-check-input" type="checkbox" name="status" role="switch" id="flexSwitchCheckChecked" checked style="height:22px;width:50px;">
                        @endif
                        <input type="hidden" name="iddate" value="{{$item->id}}">
                      </div>
                          </th>
                        </tr>
                        @endforeach
                    @endif
                      </tbody>
                    </table>
                  </div>
</div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function() {
    $('input[name="status"]').change(function() {
      var isChecked = $(this).is(':checked');
      var iddate = $(this).siblings('input[name="iddate"]').val();

      $.ajax({
        url: '/updatedateavailable/' + iddate,
        type: 'POST',
        dataType: 'json',
        data: {
          _token: '{{ csrf_token() }}',
          status: isChecked ? 1 : 0 
        },
        success: function(response) {
          if (response.success) {
            console.log('Status updated successfully');
          } else {
            console.error('Failed to update status');
          }
        },
        error: function(xhr, status, error) {
          console.error('Error occurred while updating status:', error);
        }
      });
    });
  });
</script>
@endsection