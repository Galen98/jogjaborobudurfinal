@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="card border-0 bg-transparent">
<div class="card-body">
<h3 class="card-title">Date Availability</h3>
<form action="/dateavailable" method="POST" id="{{$ids}}">
    @csrf
<input type="hidden" name="idsub" value="{{$ids}}">
<input type="hidden" name="idtravel" value="{{$idtravel}}">
<table class="table border-0 table-borderless mt-2 text-center">
    <thead>
        <th>Date</th>
        <th>Availability</th>
    </thead>
    <tbody class="text-center">
        <tr>
            <td>
            <input type="text" name="date" id="date-start" class="form-control rounded-3" 
            style="background-color:white;width:300px;color:black;" placeholder="Select date" required readonly>
            </td>
            <td>
            <div class="form-check form-switch ml-5">
            <input class="form-check-input" type="checkbox" name="status" role="switch" id="flexSwitchCheckChecked" checked style="height:22px;width:50px;">
            </div>
            </td>
        </tr>
        @foreach($jam as $item)
        <tr>
            <td class="h1">{{$item->time}}</td>
            <td>
            <div class="form-check form-switch ml-5">
            <input type="hidden" name="waktu_id[]" id="" value="{{$item->id}}">
            <input class="form-check-input" id="availables_{{$item->id}}" value="true" type="checkbox" name="available[]" role="switch" id="flexSwitchCheckChecked" checked style="height:22px;width:50px;">
            <input type="hidden" name="avail_time[]" id="avail_time{{$item->id}}" value="true">
            </div> 
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
<button type="submit" class="btn btn-primary rounded-4 mt-2 ml-3">Confirm</button>
</form>
</div>
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    @foreach($jam as $item)
    $('#availables_{{$item->id}}').on('change', function() {
        // if (!$(this).is(':checked')) {
        //         // If the checkbox is not checked, set its value to false
        //         $(this).val('false');
        //     } else {
        //         // If the checkbox is checked, set its value to true
        //         $(this).val('true');
        // }
        if($(this).is(':checked')) {
            $('#avail_time{{$item->id}}').val('true')
        } else {
            $('#avail_time{{$item->id}}').val('false')
        }
        //alert($(this).val())
    })
    @endforeach
 })
</script>

<script> 
  var dateForm = function() {
		$('#date-start').datepicker({
			format: 'dd/mm/yyyy',
			startDate: new Date(),
			todayHighlight: true,
            autoclose: true,
            orientation: 'bottom',		
		});
	};
  $(function(){
    dateForm();
  });
</script>  

<script>
    $(document).ready(function () {
    
        $('#{{$ids}}').submit(function (event) {
        var formId = $(this).attr('id');
        event.preventDefault();
        
        if (validateForm() && validateAvailable(formId)) {
            this.submit();
        } 
});

function validateAvailable(id) {
    var dateAvail = $('input[name="date"]').val();
    var isDateAvailable = true;

    $.ajax({
        type: "GET",
        url: "/checkdateavailability/" + id,
        async: false,
        success: function(response) {
            var dates = response.date.map(index => index.date);

            for (var i = 0; i < dates.length; i++) {
                if (dates[i] === dateAvail) {
                    isDateAvailable = false;
                    swal("Error", "You have already chosen this date before.", "error");
                    break;
                }
            }
        }
    });

    return isDateAvailable;
}

    function validateForm() {
        var date = $('input[name="date"]').val();
        if (date === '') {
            swal("Error", "Date cannot be empty.", "error");
            return false; 
        }
        return true
    }
});
</script>
@endsection
