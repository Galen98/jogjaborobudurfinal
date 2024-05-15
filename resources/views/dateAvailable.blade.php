@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
              <div class="card">
                <div class="card-body">
                <div class="input-group">
                <form class="form-inline" method="GET" action="/dateavailable/search">
                @csrf
                <input class="form-control mr-sm-2 text-sm" name="search" type="search" placeholder="Search activity" aria-label="Search">
                <button class="btn btn-sm btn-outline-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                </form>
                <br/>
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
                        @if(count($travel) == null)
                        <tr>
                        <td class="text-center" colspan="3">Travel is empty</td>
                        </tr>
                        @else
                        @foreach($travel as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$item->namawisata}}</td>
                            <td><a href="/dateavailable/item/{{$item->slug}}">Check it!</a></td>
                        </tr>
                        @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 mt-3">
            {{ $travel->links() }}
            </div>
@endsection