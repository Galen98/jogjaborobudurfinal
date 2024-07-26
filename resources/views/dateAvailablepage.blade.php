@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="card border-0 bg-transparent">
<div class="card-body">
<h3 class="card-title">{{$namaWisata}}</h3>
<button onclick="goBack()" class="btn rounded-pill btn-outline-dark btn-sm mt-2"><i class="mdi mdi-keyboard-backspace"></i> Back</button>
</div>
</div>

<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Travel Option</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            No.
                          </th>
                          <th>
                            Option name
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($travelOption) == null)
                        <tr>
                        <th colspan="3" class="text-center">Option kosong</th>    
                        </tr>
                        @else
                        @foreach($travelOption as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td class="text-capitalize">{{$item->judulsub}}</td>
                            <td><a href="/dateavailable/item/{{$slug}}/manage/{{$item->id}}">Manage it!</a></td>
                        </tr>
                        @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection

@section('scripts')
<script>
        function goBack() {
          location.href = '/dateavailable';
        }
</script>
@endsection