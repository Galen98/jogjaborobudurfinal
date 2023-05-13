@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Kelola Rating</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr >
                          <th style="font-weight: bold;">
                            No.
                          </th>
                          <th style="font-weight: bold;">
                            Travel Name
                          </th>
                          <th style="font-weight: bold;">
                            Check
                          </th>
                        </tr>
                      </thead>
                      <tbody>

                        @if(count($travel) === 0)
                      <tr>
                      <th colspan="3" class="text-center">No data</th>
                      </tr>
                      @else
                      @foreach($travel as $item)
                        <tr>
                          <td>
                          {{ $loop->iteration }}
                          </td>
                          <td>
                         {{$item->namawisata ?? ''}}
                          </td>
                          <td>
                          <a href="{{'rating/' .$item->wisata_id}}">Check it!</a>
                          </td>
                        </tr>
                        
                        @endforeach
                        @endif
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