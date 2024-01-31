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
                            Action
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
                          <th>{{ \Carbon\Carbon::parse($item->date)->formatLocalized('%d %B %Y') }}</th>
                          <th><a href="">edit availability!</a></th>
                        </tr>
                        @endforeach
                    @endif
                      </tbody>
                    </table>
                  </div>
</div>
</div>

@endsection