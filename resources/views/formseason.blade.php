@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Theme</h4>
                  <p class="card-description">
                  </p>
                  <form class="forms-sample" method="POST" action="{{url('insertseason')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                      <label for="exampleInputName1">Nama Theme</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="namaseason" placeholder="Nama Season">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
              </form>
          </div>
      </div>


@endsection