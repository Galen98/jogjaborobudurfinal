@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="card-body">
<form action="/rating/createreview/form/{{$wisataid->wisata_id}}" method="GET" >
<button class="btn btn-danger btn-icon-text">
<i class="mdi mdi-upload btn-icon-prepend"></i>                                                    
Add Review
</button>
</form>
</div>

<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">{{$namatravel->namawisata}}</h2>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr >
                          <th style="font-weight: bold;">
                            Cust. Name
                          </th>
                          <th style="font-weight: bold;">
                            Comment
                          </th>
                          <th style="font-weight: bold;">
                            Rating
                          </th>
                          <th style="font-weight: bold;">
                            Edit
                          </th>
                          <th style="font-weight: bold;">
                            Delete
                          </th>
                        </tr>
                      </thead>
                      <tbody>

                        @if(count($travel) === 0)
                      <tr>
                      <th colspan="5" class="text-center">No data</th>
                      </tr>
                      @else
                      @foreach($travel as $item)
                        <tr>
                          <td>
                          <!-- {{ $loop->iteration }} -->
                          {{ $item->name }}
                          </td>
                          <td>
                         {{$item->comments}}
                          </td>
                          <td>
                          {{$item->star_rating}} Rating
                          </td>
                          <td> 
                          <form action="{{'/rating/edit/'.$item->id}}" method="get">
                          <button type="submit" class="btn btn-sm btn-info btn-rounded btn-fw" style="color: white;"><i class="mdi mdi-pencil-box" style="color: white;"></i> Edit</button>
                          </form>
                          </td>
                          <td>
                          	<form action="{{url('deleterating/'.$item->id)}}" method="POST">
                          		@csrf
                          		@method('DELETE')
                          	<button type="submit" class="hapusbtn btn btn-sm btn-danger btn-rounded btn-fw"><i class="mdi mdi-delete"></i> Delete</button>
                          	</form>
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