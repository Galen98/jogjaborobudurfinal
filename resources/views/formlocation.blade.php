@extends('index')
@extends('navadmin')
@section('content')
<div class="card">
                <div class="card-body">
                	 <h4 class="card-title">Add new location</h4>
                     <br>
                	 <form class="forms-sample" method="POST" action="{{url('insertlocation')}}" enctype="multipart/form-data">
                  @csrf
                 @foreach($idwisata as $item) <input type="hidden" name="idtravel" value="{{$item->wisata_id}}"> @endforeach
                    <div class="form-group">
                      <label for="exampleInputName1">Province</label>
                      <select name="province" id="" class="form-control">
                      <option class="form-control">Select Province</option>
                        @foreach($province as $item)
                        <option value="{{$item->namaprovince}}" class="form-control">{{$item->namaprovince}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                    <div class="field_wrapper">
    <div>
    <a href="javascript:void(0);" class="btn btn-sm btn-info add_button" title="Add field"><i class="mdi mdi-plus menu-icon"></i></a>
    <br>
    <br>
    <select name="region[]" id="" class="form-control">
                      <option class="form-control">Select Region</option>
                        @foreach($region as $item)
                        <option value="{{$item->namaregion}}" class="form-control">{{$item->namaregion}}</option>
                        @endforeach
                      </select>
       
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>
</form>
</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="style="margin-top:20px;">'+
    '<br>'+
    '<a href="javascript:void(0);"  class="btn btn-sm btn-danger remove_button"><i class="mdi mdi-delete menu-icon"></i></a>'+
    '<br>'+
    '<br>'+
    '<select name="region[]" id="" class="form-control">'+
                      '<option class="form-control">Select Region</option>'+
                        '@foreach($region as $item)'+
                        '<option value="{{$item->namaregion}}" class="form-control">{{$item->namaregion}}</option>'+
                        '@endforeach'+
                      '</select></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
@endsection