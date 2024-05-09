@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="card border-0 bg-transparent">
<div class="card-body">
<h3 class="card-title">Date Availability</h3>
<form action="/dateavailable" method="POST">
    @csrf
<input type="hidden" name="idsub" value="{{$ids}}">
<input type="hidden" name="idtravel" value="{{$idtravel}}">
<table class="table border-0 table-borderless mt-2 text-center">
    <thead>
        <th>Date</th>
        <th>Availability</th>
    </thead>
    <tbody class="text-center">
        <!-- @foreach($jam as $item)
        <tr>
            <td class="h1">{{$item->time}}</td>
            <td>
            <div class="col-md-6"> 
            <div class="form-group row diskoncek1">
            <input type="hidden" name="id[]" value="{{$item->id}}">
            <select class="form-select" name="available[]" aria-label="Default select example">
            <option value="1" selected>Yes</option>
            <option value="0">No</option>
            </select>
            </div> 
            </div>
        </td>
        </tr>
        @endforeach -->
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
    </tbody>
</table>
<button type="submit" class="btn btn-primary rounded-4 mt-2 ml-3">Confirm</button>
</form>
</div>
</div>

@endsection

@section('scripts')
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
    $('form').submit(function () {
        return validateForm();
    });

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
