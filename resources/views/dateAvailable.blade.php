@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Travel item</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            No.
                          </th>
                          <th>
                            Activity name
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($travel as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$item->namawisata}}</td>
                            <td><a href="/dateavailable/item/{{$item->slug}}">Check it!</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
            {{ $travel->links() }}
            </div>
@endsection