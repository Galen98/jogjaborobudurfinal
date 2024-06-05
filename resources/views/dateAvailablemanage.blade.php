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
                        <tr class="thead-light">
                          <th>{{$loop->iteration}}</th>
                          <th>{{ $item->date }}</th>
                          <th>
                          <div class="form-check form-switch ml-5">
                        @if($item->status == true)
                        <input class="form-check-input" type="checkbox" name="status{{$item->id}}" role="switch" id="flexSwitchCheckChecked" checked style="height:22px;width:50px;">
                        <input type="hidden" name="avail_date" id="avail_date{{$item->id}}" value="true">
                        @elseif($item->status == false)
                        <input class="form-check-input" type="checkbox" name="status{{$item->id}}" role="switch" id="flexSwitchCheckChecked" style="height:22px;width:50px;">
                        <input type="hidden" name="avail_date" id="avail_date{{$item->id}}" value="false">
                        @endif
                        <input type="hidden" name="iddate{{$item->id}}" value="{{$item->id}}">
                        </div>
                          </th>
                          @foreach($item->tambahAvailable as $availability)
                        <tr>
                          <th></th>
                          <th>{{$availability->waktu->time}}</th>
                          <th>
                          <div class="form-check form-switch ml-5">
                        <input type="hidden" name="idavailability" id="idavailability{{$availability->id}}" value="{{$availability->id}}">
                        @if($availability->available == true)
                        <input class="form-check-input" type="checkbox" name="available" role="switch" id="availables_{{$availability->id}}" checked style="height:22px;width:50px;">
                        <input type="hidden" name="avail_time" id="avail_time{{$availability->id}}" value="true">
                        @elseif($availability->available == false)
                        <input class="form-check-input" type="checkbox" name="available" role="switch" id="availables_{{$availability->id}}" style="height:22px;width:50px;">
                        <input type="hidden" name="avail_time" id="avail_time{{$availability->id}}" value="false">
                        @endif
                        </div>
                          </th>
                        </tr>
                        @endforeach
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
    @foreach($getAvailable as $item)
    $('input[name="status{{$item->id}}"]').change(function() {
      var isChecked = $(this).is(':checked');
      var iddate = $('input[name="iddate{{$item->id}}"]').val();
      var isChecked = $(this).is(':checked');
        if($(this).is(':checked')) {
            var availabledate = $('#avail_date{{$item->id}}').val('true')
        } else {
           var availabledate = $('#avail_date{{$item->id}}').val('false')
        }

      $.ajax({
        url: '/updatedateavailable/' + iddate,
        type: 'POST',
        dataType: 'json',
        data: {
          _token: '{{ csrf_token() }}',
          status: isChecked ? 'true' : 'false'  
        },
        success: function(response) {
          if (response.success) {
            console.log('Status updated successfully');
          } else {
            console.error('Failed to update status');
          }
        }
      });
    });
    @endforeach
  });
</script>

<script>
  $(document).ready(function(){
    @foreach($getAvailable as $item)
      @foreach($item->tambahAvailable as $availability)
    $('#availables_{{$availability->id}}').on('change', function() {
      var id = $('#idavailability{{$availability->id}}').val()
      var isChecked = $(this).is(':checked');
        if($(this).is(':checked')) {
            var available = $('#avail_time{{$availability->id}}').val('true')
        } else {
           var available = $('#avail_time{{$availability->id}}').val('false')
        }
      //alert(available)
      $.ajax({
        url: '/updatetimeavailable/' + id,
        type: 'POST',
        dataType: 'json',
        data: {
          _token: '{{ csrf_token() }}',
          availability: isChecked ? 'true' : 'false' 
        },
        success: function(response) {
          if (response.success) {
            console.log('Status updated successfully');
          } else {
            console.error('Failed to update status');
          }
        },
      })
    })
      @endforeach
    @endforeach
  })
</script>
@endsection