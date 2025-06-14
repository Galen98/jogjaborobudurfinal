@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="card border-0 bg-transparent">
<div class="card-body">
@foreach($travel as $item)
<h3 class="card-title">{{$item->namawisata}}</h3>
<br>
<form method="post" action="{{url('editwisata/' .$item->wisata_id)}}" enctype="multipart/form-data">
@method('patch')
@csrf
<div class="form-group">
<label for="exampleInputName1">Availability</label>
<div class="form-check form-switch ml-5">
  @if($item->status == true)
  <input class="form-check-input" type="checkbox" name="status" role="switch" id="flexSwitchCheckChecked" checked style="height:22px;width:50px;">
  @elseif($item->status == false)
  <input class="form-check-input" type="checkbox" name="status" role="switch" id="flexSwitchCheckChecked" style="height:22px;width:50px;">
  @else
  <input class="form-check-input" type="checkbox" name="status" role="switch" id="flexSwitchCheckChecked" checked style="height:22px;width:50px;">
  @endif
</div>
</div>
<div class="form-group">
<label for="exampleInputName1">Judul Wisata</label>
<input type="text" class="form-control" id="exampleInputName1" name="namawisata" placeholder="Masukan Judul Artikel" value="{{$item->namawisata}}">
</div>
<div class="form-group">
<label for="exampleInputName1">Duration</label>
<input type="text" class="form-control" id="exampleInputName1" name="duration" placeholder="duration" value="{{$item->durasi}}">
</div>

<!-- <div class="col-md-6">
           <label>For Child</label>
           @if($item->child == 'yes')
                        <div class="form-group row">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="child" id="membershipRadios1" value="yes" checked>
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="child" id="membershipRadios2" value="no">
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                        @elseif($item->child == 'no')
                        <div class="form-group row">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="child" id="membershipRadios1" value="yes">
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="child" id="membershipRadios2" value="no" checked>
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                        @endif
                      </div> -->

                      


<div class="form-group">
<label for="exampleInputPassword4">Label</label>
<select name="label" class="form-control">
<option value="{{$item->label}} ">{{$item->label}}</option>
<option value="Bestseller">Bestseller</option>
<option value="Likely to sell out">Likely to sell out</option>
</select>
</div>

<div class="form-group">
<label for="exampleTextarea1">Short Description</label>
<textarea  class="form-control" style="height:150px" name="shortdescription" placeholder="Content">{{ $item->shortdescription}}</textarea>
</div>

<div class="form-group">
<label for="exampleTextarea1">Full Description</label>
<textarea id="mytextarea"  class="form-control" style="height:300px" name="isieng" placeholder="Content">{{$item->deskripsi_english}}</textarea>
</div>



<div class="col-md-6">
					 <label>Pickup</label>
					 @if($item->pickup == 'yes')
                        <div class="form-group row">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="airport" id="membershipRadios1" value="yes" checked>
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="airport" id="membershipRadios2" value="no">
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                        @elseif($item->pickup == 'no')
                        <div class="form-group row">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="airport" id="membershipRadios1" value="yes">
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="airport" id="membershipRadios2" value="no" checked>
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                        @else
                        <div class="form-group row">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="airport" id="membershipRadios1" value="yes">
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="airport" id="membershipRadios2" value="no">
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                        @endif
                      </div> 
                      <div class="form-group">
                      <label for="exampleInputPassword4">Bahasa</label>
                      <select name="bahasa" class="form-control" required="">
                    <option value="{{$item->bahasa}}">{{$item->bahasa}}</option>
                    @foreach($bahasa as $item)
                    <option value="{{$item->bahasa}}">{{$item->bahasa}}</option>
                    @endforeach
                    </select>
                    </div>
                      <div class="form-group">
<label for="exampleInputName1">Pickup Location</label>
<input type="text" class="form-control" id="exampleInputName1" name="wherepickup" placeholder="Masukan Lokasi Pickup" value="{{$item->wherepickup}}">
<br>
<button type="submit" class="btn btn-primary mr-2">Submit</button>
<br>
<br>
</form>
<br>
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Destination  </h4>
                  <br>
                  <button type="button" class="tambahdestination btn btn-sm btn-primary btn-rounded btn-fw"><i class="mdi mdi-plus"></i> Tambah</button>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            No.
                          </th>
                          <th>
                            Destination
                          </th>
                          <th>
                            Edit
                          </th>
                          <th>
                            Hapus
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($destination as $item)
                        <tr style="color: black;">
                          <td >
                          {{ $loop->iteration }}
                          </td>
                          <td>
                          {{$item->destination ?? ''}}
                          </td>
                          <td>
                          <button type="button" class="btneditdestination btn btn-sm btn-info btn-rounded btn-fw" style="color: white;" value="{{$item->id}}"><i class="mdi mdi-pencil-box" style="color: white;"></i> Edit</button>
                          </td>
                          <td> 
                          <form action="{{url('hapusdestination/'.$item->id)}}" method="POST">
                              @csrf
                              @method('DELETE')
                         <button type="submit" class="hapusbtn btn btn-sm btn-danger btn-rounded btn-fw">
                          <i class="mdi mdi-delete"></i> Hapus</button>
                       </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
<br>
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Season  </h4>
                  <br>
                  <button type="button" class="tambahseason btn btn-sm btn-primary btn-rounded btn-fw"><i class="mdi mdi-plus"></i> Tambah</button>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            No.
                          </th>
                          <th>
                            Season
                          </th>
                          <th>
                            Edit
                          </th>
                          <th>
                            Hapus
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($season as $item)
                        <tr style="color: black;">
                          <td >
                          {{ $loop->iteration }}
                          </td>
                          <td>
                          {{$item->namaseason ?? ''}}
                          </td>
                          <td>
                          <button type="button" class="btneditseason btn btn-sm btn-info btn-rounded btn-fw" style="color: white;" value="{{$item->id}}"><i class="mdi mdi-pencil-box" style="color: white;"></i> Edit</button>
                          </td>
                          <td>
                          <form action="{{url('hapusseason/'.$item->id)}}" method="POST">
                              @csrf
                              @method('DELETE')
                         <button type="submit" class="hapusbtn btn btn-sm btn-danger btn-rounded btn-fw"><i class="mdi mdi-delete"></i> Hapus</button>
                       </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
<br>
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Include  </h4>
                  <br>
                  <button type="button" class="tambahinclude btn btn-sm btn-primary btn-rounded btn-fw"><i class="mdi mdi-plus"></i> Tambah</button>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            No.
                          </th>
                          <th>
                            Include
                          </th>
                          <th>
                            Edit
                          </th>
                          <th>Hapus</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($include as $item)
                        <tr style="color: black;">
                          <td >
                          {{ $loop->iteration }}
                          </td>
                          <td>
                          {{$item->include ?? ''}}
                          </td>
                          <td>
                          <button type="button" class="btneditinclude btn btn-sm btn-info btn-rounded btn-fw" style="color: white;" value="{{$item->id}}"><i class="mdi mdi-pencil-box" style="color: white;"></i> Edit</button>
                          </td>
                          <td>
                             <form action="{{url('hapusinclude/'.$item->id)}}" method="POST">
                              @csrf
                              @method('DELETE')
                         <button type="submit" class="hapusbtn btn btn-sm btn-danger btn-rounded btn-fw"><i class="mdi mdi-delete"></i> Hapus</button>
                       </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
      <br>
<br>
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Exclude </h4>
                  <br>
                  <button type="button" class="tambahexclude btn btn-sm btn-primary btn-rounded btn-fw" value=""><i class="mdi mdi-plus"></i> Tambah</button>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            No.
                          </th>
                          <th>
                            Exclude
                          </th>
                          <th>
                            Edit
                          </th>
                          <th>Hapus</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($exclude as $item)
                        <tr style="color: black;">
                          <td >
                          {{ $loop->iteration }}
                          </td>
                          <td>
                          {{$item->exclude ?? ''}}
                          </td>
                          <td>
                          <button type="button" class="btneditexclude btn btn-sm btn-info btn-rounded btn-fw" style="color: white;" value="{{$item->id}}"><i class="mdi mdi-pencil-box" style="color: white;"></i> Edit</button>
                          </td>
                          <td>
                            <form action="{{url('hapusexclude/'.$item->id)}}" method="POST">
                              @csrf
                              @method('DELETE')
                         <button type="submit" class="hapusbtn btn btn-sm btn-danger btn-rounded btn-fw"><i class="mdi mdi-delete"></i> Hapus</button>
                       </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
    <br>
<br>
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Highlights</h4>
                  <br>
                    <button type="button" class="tambahhighlight btn btn-sm btn-primary btn-rounded btn-fw" value=""><i class="mdi mdi-plus"></i> Tambah</button>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            No.
                          </th>
                          <th>
                            Highlight
                          </th>
                          <th>
                            Edit
                          </th>
                          <th>Hapus</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($highlight as $item)
                        <tr style="color: black;">
                          <td >
                          {{ $loop->iteration }}
                          </td>
                          <td>
                          {{$item->highlight ?? ''}}
                          </td>
                          <td>
                          <button type="button" class="btnedithighlight btn btn-sm btn-info btn-rounded btn-fw" style="color: white;" value="{{$item->id}}"><i class="mdi mdi-pencil-box" style="color: white;"></i> Edit</button>
                          </td>
                          <td>
                         <form action="{{url('hapushighlight/'.$item->id)}}" method="POST">
                              @csrf
                              @method('DELETE')
                         <button type="submit" class="hapusbtn btn btn-sm btn-danger btn-rounded btn-fw"><i class="mdi mdi-delete"></i> Hapus</button>
                         </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <br>
<br>
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Important</h4>
                  <br>
                    <button type="button" class="tambahimportant btn btn-sm btn-primary btn-rounded btn-fw" value=""><i class="mdi mdi-plus"></i> Tambah</button>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            No.
                          </th>
                          <th>
                            Important information
                          </th>
                          <th>
                            Edit
                          </th>
                          <th>Hapus</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($important as $item)
                        <tr style="color: black;">
                          <td >
                          {{ $loop->iteration }}
                          </td>
                          <td>
                          {{$item->importantinformation ?? ''}}
                          </td>
                          <td>
                          <button type="button" class="btneditimportant btn btn-sm btn-info btn-rounded btn-fw" style="color: white;" value="{{$item->id}}"><i class="mdi mdi-pencil-box" style="color: white;"></i> Edit</button>
                          </td>
                          <td>
                         <form action="{{url('hapusimportant/'.$item->id)}}" method="POST">
                              @csrf
                              @method('DELETE')
                         <button type="submit" class="hapusbtn btn btn-sm btn-danger btn-rounded btn-fw"><i class="mdi mdi-delete"></i> Hapus</button>
                         </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <br>
<br>
<div class="col-lg-12 grid-margin stretch-card" >
              <div class="card">
              <div class="card-body">
              <h4 class="card-title">Location</h4>
              @foreach($travel as $item)<form action="{{'/paketwisata/edit/buatlocation/' .$item->wisata_id}}" method="GET">@endforeach 
              <button type="submit" class="btn btn-sm btn-danger mr-2"><i class="mdi mdi-plus"></i> Add new location</button>
              </form>
              </div>
                  @foreach($pilihan as $item) 
                <div class="card-body" style="border-bottom: 5px solid #e0e0de;margin-top:20px;">
                 <h4 class="card-title" style="font-size:18px;">{{$item->namaprovince}}</h4>
                <table>
              <tbody>
              <tr>
              <td><button type="button" class="btneditprovince btn btn-sm btn-info btn-rounded btn-fw" style="color: white;" value="{{$item->id}}"><i class="mdi mdi-pencil-box" style="color: white;"></i> Edit</button></td>
              <td>&nbsp;&nbsp;</td>
              <td><form action="{{url('deletetambahprovince/'.$item->id)}}" method="POST" enctype="multipart/form-data">
                @method('delete')
                @csrf
                 <button type="submit" class="hapusbtn btn btn-sm btn-danger btn-rounded btn-fw" style="color: white;"><i class="mdi mdi-delete" style="color: white;"></i> Delete</button>
                 </form></td>
              </tr>
              </tbody>
              </table>
                 <br>
                 <br>
                 <br>
                 <h4 class="card-title">City:</h4>
                  <button type="button" class="tambahcity btn btn-sm btn-primary btn-rounded btn-fw" value="{{$item->id}}"><i class="mdi mdi-plus"></i> Tambah</button>
                  <div class="table-responsive pt-3">
                  <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            City
                          </th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($item->province as $p)
                        <tr style="color: black;">
                          <td >
                          {{$p->namaregion ?? ''}}
                          </td>
                          <td>
                          <button type="button" class="btneditregion btn btn-sm btn-info btn-rounded btn-fw" style="color: white;" value="{{$p->id}}"><i class="mdi mdi-pencil-box" style="color: white;"></i></button>
                          </td>
                          <td>
                          <form action="{{url('deletetambahlocation/'.$p->id)}}" method="POST" enctype="multipart/form-data">
                          @method('delete')
                          @csrf  
                          <button type="submit" class="btn btn-sm btn-danger btn-rounded btn-fw"><i class="mdi mdi-delete"></i></button>
                          </form>
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
</div>
@endforeach
</div>

            
</div>

<a href="/paketwisata">Cancel</a>
@endforeach
</div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Include</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('updateinclude')}}" action="POST" enctype="multipart/form-data" id="formedit">
        @csrf
      <div class="form-group">
        <label>Include</label>
        @foreach($travel as $item)<input type="hidden" id="idtravel" name="idtravel" value="{{$item->wisata_id}}">@endforeach
        <input type="hidden" name="idinclude" id="idinclude" readonly=""> 
        <input type="text" name="include" class="form-control" id="include">
        </div>
        <button type="button" class="btn btn-primary btnupdateinclude">Update</button>
        </form>
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="editModalexclude" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Exclude</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('updateexclude')}}" action="POST" enctype="multipart/form-data" id="formeditexclude">
        @csrf
      <div class="form-group">
        <label>Exclude</label>
        @foreach($travel as $item)<input type="hidden" id="idtravel" name="idtravel" value="{{$item->wisata_id}}">@endforeach
        <input type="hidden" name="idexclude" id="idexclude" readonly=""> 
        <input type="text" name="exclude" class="form-control" id="exclude">
        </div>
        <button type="button" class="btn btn-primary btnupdateexclude">Update</button>
        </form>
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="editModalhighlight" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Highlight</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('updatehighlight')}}" action="POST" enctype="multipart/form-data" id="formedithighlight">
        @csrf
      <div class="form-group">
        <label>Highlight</label>
        @foreach($travel as $item)<input type="hidden" id="idtravel" name="idtravel" value="{{$item->wisata_id}}">@endforeach
        <input type="hidden" name="idhighlight" id="idhighlight" readonly=""> 
        <input type="text" name="highlight" class="form-control" id="highlight">
        </div>
        <button type="button" class="btn btn-primary btnupdatehighlight">Update</button>
        </form> 
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="editModalimportant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Important</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('updateimportant')}}" action="POST" enctype="multipart/form-data" id="formeditimportant">
        @csrf
      <div class="form-group">
        <label>Important information</label>
        @foreach($travel as $item)<input type="hidden" id="idtravel" name="idtravel" value="{{$item->wisata_id}}">@endforeach
        <input type="hidden" name="idimportant" id="idimportant" readonly=""> 
        <input type="text" name="important" class="form-control" id="important">
        </div>
        <button type="button" class="btn btn-primary btnupdateimportant">Update</button>
        </form> 
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="editModaldestination" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Destination</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('updatedestinasi')}}" action="POST" enctype="multipart/form-data" id="formeditdestinasi">
        @csrf
      <div class="form-group">
        <input type="hidden" name="iddestination" id="iddestination" readonly="">
        <select class="form-control" name="destinasi">
          @foreach($destinasi as $item)<option class="form-control" value="{{$item->id}}">{{$item->destination}}</option>@endforeach
        </select> 
        </div>
        <button type="button" class="btn btn-primary btnupdatedestinasi">Update</button>
        </form> 
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="editModalseason" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Season</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('updateseason')}}" action="POST" enctype="multipart/form-data" id="formeditseason">
        @csrf
      <div class="form-group">
        <input type="hidden" name="idseason" id="idseason" readonly="">
        <select class="form-control" name="season">
          @foreach($seasonadd as $item)<option class="form-control" value="{{$item->id}}">{{$item->namaseason}}</option>@endforeach
        </select> 
        </div>
        <button type="button" class="btn btn-primary btnupdateseason">Update</button>
        </form> 
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="editModaltime" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Waktu</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('updatetime')}}" action="POST" enctype="multipart/form-data" id="formedittime">
        @csrf
      <div class="form-group">
        <label>Waktu</label>
        @foreach($travel as $item)<input type="hidden" id="idtravel" name="idtravel" value="{{$item->wisata_id}}">@endforeach
        <input type="hidden" name="idtime" id="idtime" readonly=""> 
        <input type="time" name="time" class="form-control" id="time">
        </div>
        <button type="button" class="btn btn-primary btnupdatetime">Update</button>
        </form> 
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="Modalinclude" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Include</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('addinclude')}}" action="POST" enctype="multipart/form-data" id="forminclude">
        @csrf
      <div class="form-group">
        <label>Include</label>
        @foreach($travel as $item)<input type="hidden" id="idtravel" name="idtravel" value="{{$item->wisata_id}}">@endforeach
        <input type="text" name="include" class="form-control" id="include"> 
        </div>
        <button type="button" class="btn btn-primary btninclude">Post</button>
        </form> 
        <br>
        </div>
    </div>
</div>
</div>
</div>


<div class="modal fade" id="Modalexclude" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Exclude</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('addexclude')}}" action="POST" enctype="multipart/form-data" id="formexclude">
        @csrf
      <div class="form-group">
        <label>Exclude</label>
        @foreach($travel as $item)<input type="hidden" id="idtravel" name="idtravel" value="{{$item->wisata_id}}">@endforeach
        <input type="text" name="exclude" class="form-control" id="exclude"> 
        </div>
        <button type="button" class="btn btn-primary btnexclude">Post</button>
        </form> 
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="Modaltime" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Exclude</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('addtime')}}" action="POST" enctype="multipart/form-data" id="formtime">
        @csrf
      <div class="form-group">
        <label>Waktu</label>
        @foreach($travel as $item)<input type="hidden" id="idtravel" name="idtravel" value="{{$item->wisata_id}}">@endforeach
        <input type="time" name="time" class="form-control" id="time"> 
        </div>
        <button type="button" class="btn btn-primary btntime">Post</button>
        </form> 
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="Modalhighlight" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Highlight</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('addhighlight')}}" action="POST" enctype="multipart/form-data" id="formhighlight">
        @csrf
      <div class="form-group">
        <label>Highlight</label>
        @foreach($travel as $item)<input type="hidden" id="idtravel" name="idtravel" value="{{$item->wisata_id}}">@endforeach
        <input type="text" name="highlight" class="form-control" id="highlight"> 
        </div>
        <button type="button" class="btn btn-primary btnhighlight">Post</button>
        </form> 
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="Modalimportant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Important</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('addimportant')}}" action="POST" enctype="multipart/form-data" id="formimportant">
        @csrf
      <div class="form-group">
        <label>Important information</label>
        @foreach($travel as $item)<input type="hidden" id="idtravel" name="idtravel" value="{{$item->wisata_id}}">@endforeach
        <input type="text" name="important" class="form-control" id="important"> 
        </div>
        <button type="button" class="btn btn-primary btnimportant">Post</button>
        </form> 
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="editModalProvince" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('updatetambahprovince')}}" action="POST" enctype="multipart/form-data" id="formeditprovince">
        @csrf
      <div class="form-group">
        <input type="hidden" name="idprovince" id="idprovince" readonly="">
        <input type="hidden" name="idtravels" id="idtravels" readonly="">
        </div>
        <div class="form-group">
        <select name="tambahprovince" class="form-control">
          @foreach($provinceadd as $item)
          <option value="{{$item->namaprovince}}" class="form-control">{{$item->namaprovince}}</option>
          @endforeach
        </select>
        </div>
        <button type="button" class="btn btn-primary btnupdateprovince">Update</button>
        </form>
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="editModalCity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('updatetambahlocation')}}" action="POST" enctype="multipart/form-data" id="formeditcity">
        @csrf
      <div class="form-group">
        <input type="hidden" name="idcity" id="idcity" readonly="">
        <input type="hidden" name="idtravell" id="idtravell" readonly="">
        </div>
        <div class="form-group">
        <select name="tambahlocation" class="form-control">
          @foreach($regionadd as $item)
          <option value="{{$item->namaregion}}" class="form-control">{{$item->namaregion}}</option>
          @endforeach
        </select>
        </div>
        <button type="button" class="btn btn-primary btnupdatecity">Update</button>
        </form>
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="addModalCity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('addcity')}}" action="POST" enctype="multipart/form-data" id="formaddcity">
        @csrf
      <div class="form-group">
        <input type="hidden" name="idtambahprovinces" id="idtambahprovinces" readonly="">
        <input type="hidden" name="idwisatas" id="idwisatas" readonly="">
        </div>
        <div class="form-group">
        <select name="tambahcity" class="form-control">
          @foreach($regionadd as $item)
          <option value="{{$item->namaregion}}" class="form-control">{{$item->namaregion}}</option>
          @endforeach
        </select>
        </div>
        <button type="button" class="btn btn-primary btnaddcity">Add</button>
        </form>
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="Modalseason" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Season</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('addseason')}}" action="POST" enctype="multipart/form-data" id="formseasonadd">
        @csrf
      <div class="form-group">
        <label>Season</label>
        @foreach($travel as $item)<input type="hidden" id="idtravel" name="idtravel" value="{{$item->wisata_id}}">@endforeach
        <select class="form-control" name="season">
          @foreach($seasonadd as $item)<option class="form-control" value="{{$item->id}}">{{$item->namaseason}}</option>@endforeach
        </select>
        </div>
        <button type="button" class="btn btn-primary btnseason">Post</button>
        </form> 
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="Modaldestination" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Season</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('adddestination')}}" action="POST" enctype="multipart/form-data" id="formdestinationadd">
        @csrf
      <div class="form-group">
        <label>Destination</label>
        @foreach($travel as $item)<input type="hidden" id="idtravel" name="idtravel" value="{{$item->wisata_id}}">@endforeach
        <select class="form-control" name="destinasi">
          @foreach($destinasi as $item)
          <option class="form-control" value="{{$item->id}}">{{$item->destination}}</option>
          @endforeach
        </select>
        </div>
        <button type="button" class="btn btn-primary btndestination">Post</button>
        </form> 
        <br>
        </div>
    </div>
</div>
</div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $(document).on('click', '.btneditinclude', function(){
            var idinclude=$(this).val();
            $('#editModal').modal('show');
            const dateFormat="dddd, MMMM Do YYYY, h:mm";

            $.ajax({
                
                type: "GET",
                url:"/showeditinclude/"+idinclude,
                success:function(response){
                    //onsole.log(response.Rate.id);
                     //$('#orderid').val(response.Order.OrderID);
                     $('#idinclude').val(response.Include.id); 
                    $('#include').val(response.Include.include);  
                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModal").modal('hide');
        });
    });

    $(document).on('click', '.btnupdateinclude', function(){
            var idtravel=$('#formedit').find('#idtravel').val()
            var orid=$('#formedit').find('#idinclude').val()
            let formData=$('#formedit').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/updateinclude/${idinclude}',
                method:"PATCH",
                data:formData,
                success:function(data){
                    $('#editModal').modal('hide')
                    window.location.assign('/paketwisata/edit/'+idtravel);
                }
            })
        });
        </script>

        <script>
    $(document).ready(function(){
        $(document).on('click', '.btneditexclude', function(){
            var idexclude=$(this).val();
            $('#editModalexclude').modal('show');
            const dateFormat="dddd, MMMM Do YYYY, h:mm";
            $.ajax({
                
                type: "GET",
                url:"/showeditexclude/"+idexclude,
                success:function(response){
                    //onsole.log(response.Rate.id);
                     //$('#orderid').val(response.Order.OrderID);
                     $('#idexclude').val(response.Exclude.id); 
                    $('#exclude').val(response.Exclude.exclude);  
                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModalexclude").modal('hide');
        });
    });

    $(document).on('click', '.btnupdateexclude', function(){
            var idtravel=$('#formeditexclude').find('#idtravel').val()
            var idexclude=$('#formeditexclude').find('#idexclude').val()
            let formData=$('#formeditexclude').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/updateexclude/${idexclude}',
                method:"PATCH",
                data:formData,
                success:function(data){
                    $('#editModal').modal('hide')
                    window.location.assign('/paketwisata/edit/'+idtravel);
                }
            })
        });
        </script>

      <script>
        $(document).ready(function(){
        $(document).on('click', '.btneditimportant', function(){
            var idimportant=$(this).val();
            $('#editModalimportant').modal('show');
            $.ajax({
                
                type: "GET",
                url:"/showeditimportant/"+idimportant,
                success:function(response){
                    //onsole.log(response.Rate.id);
                     //$('#orderid').val(response.Order.OrderID);
                     $('#idimportant').val(response.Important.id); 
                    $('#important').val(response.Important.importantinformation);  
                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModalimportant").modal('hide');
        });
    });

    $(document).on('click', '.btnupdateimportant', function(){
            var idtravel=$('#formeditimportant').find('#idtravel').val()
            var idimportant=$('#formeditimportant').find('#idimportant').val()
            // var orid=$('#formedit').find('#idrate').val()
            let formData=$('#formeditimportant').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/updateimportant/${idimportant}',
                method:"PATCH",
                data:formData,
                success:function(data){
                    $('#editModal').modal('hide')
                    window.location.assign('/paketwisata/edit/'+idtravel);
                }
            })
        });
        </script>


        <script>
    $(document).ready(function(){
        $(document).on('click', '.btnedithighlight', function(){
            var idhighlight=$(this).val();
            $('#editModalhighlight').modal('show');
            const dateFormat="dddd, MMMM Do YYYY, h:mm";
            $.ajax({
                
                type: "GET",
                url:"/showedithighlight/"+idhighlight,
                success:function(response){
                    //onsole.log(response.Rate.id);
                     //$('#orderid').val(response.Order.OrderID);
                     $('#idhighlight').val(response.Highlight.id); 
                    $('#highlight').val(response.Highlight.highlight);  
                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModalhighlight").modal('hide');
        });
    });

    $(document).on('click', '.btnupdatehighlight', function(){
            var idtravel=$('#formedithighlight').find('#idtravel').val()
            var idhighlight=$('#formedithighlight').find('#idhighlight').val()
            var orid=$('#formedit').find('#idrate').val()
            let formData=$('#formedit').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/updatehighlight/${idhighlight}',
                method:"PATCH",
                data:formData,
                success:function(data){
                    $('#editModal').modal('hide')
                    window.location.assign('/paketwisata/edit/'+idtravel);
                }
            })
        });
        </script>

        <script>
    $(document).ready(function(){
        $(document).on('click', '.btnedittime', function(){
            var idtime=$(this).val();
            $('#editModaltime').modal('show');
           
            $.ajax({
                
                type: "GET",
                url:"/showeditjam/"+idtime,
                success:function(response){
                    //onsole.log(response.Rate.id);
                     //$('#orderid').val(response.Order.OrderID);
                     $('#idtime').val(response.Jam.id); 
                    $('#time').val(response.Jam.time);  
                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModaltime").modal('hide');
        });
    });

    $(document).on('click', '.btnupdatetime', function(){
            var idtravel=$('#formedittime').find('#idtravel').val()
            var idtime=$('#formedittime').find('#idtime').val()
            
            let formData=$('#formedittime').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/updatetime/${idtime}',
                method:"PATCH",
                data:formData,
                success:function(data){
                    $('#editModaltime').modal('hide')
                    window.location.assign('/paketwisata/edit/'+idtravel);
                }
            })
        });
        </script>

        <script>
    $(document).ready(function(){
        $(document).on('click', '.btneditdestination', function(){
            var iddestination=$(this).val();
            $('#editModaldestination').modal('show');
           
            $.ajax({
                
                type: "GET",
                url:"/showeditdestinasi/"+iddestination,
                success:function(response){
                    //onsole.log(response.Rate.id);
                     //$('#orderid').val(response.Order.OrderID);
                     $('#iddestination').val(response.Destinasi.id); 
                     
                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModaldestination").modal('hide');
        });
    });

    $(document).on('click', '.btnupdatedestinasi', function(){
            var iddestination=$('#formeditdestinasi').find('#iddestination').val()
            
            let formData=$('#formeditdestinasi').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/updatedestinasi/${iddestination}',
                method:"PATCH",
                data:formData,
                success:function(data){
                    $('#editModaldestination').modal('hide')
                    window.location.reload();
                }
            })
        });
        </script>

        <script>
    $(document).ready(function(){
        $(document).on('click', '.btneditseason', function(){
            var idseason=$(this).val();
            $('#editModalseason').modal('show');
           
            $.ajax({
                
                type: "GET",
                url:"/showeditseason/"+idseason,
                success:function(response){
                    //onsole.log(response.Rate.id);
                     //$('#orderid').val(response.Order.OrderID);
                     $('#idseason').val(response.Season.id); 
                     
                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModalseason").modal('hide');
        });
    });

    $(document).on('click', '.btnupdateseason', function(){
            var idseason=$('#formeditseason').find('#idseason').val()
            
            let formData=$('#formeditseason').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/updateseason/${idseason}',
                method:"PATCH",
                data:formData,
                success:function(data){
                    $('#editModaldestination').modal('hide')
                    window.location.reload();
                }
            })
        });
        </script>

        <!-- Post -->
      <script>
    $(document).ready(function(){
        $(document).on('click', '.tambahinclude', function(){
            $('#Modalinclude').modal('show');
          
        });

        $(".btn-close").click(function(){
            $("#Modalinclude").modal('hide');
        });
    });

    $(document).on('click', '.btninclude', function(){
            var idtravel=$('#forminclude').find('#idtravel').val()
            let formData=$('#forminclude').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'{{url('addinclude')}}',
                method:"POST",
                data:formData,
                success:function(data){
                    $('#Modalinclude').modal('hide')
                    window.location.assign('/paketwisata/edit/'+idtravel);
                }
            })
        });
        </script>

        <script>
    $(document).ready(function(){
        $(document).on('click', '.tambahtime', function(){
            $('#Modaltime').modal('show');
          
        });

        $(".btn-close").click(function(){
            $("#Modaltime").modal('hide');
        });
    });

    $(document).on('click', '.btntime', function(){
            var idtravel=$('#formtime').find('#idtravel').val()
            let formData=$('#formtime').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'{{url('addtime')}}',
                method:"POST",
                data:formData,
                success:function(data){
                    $('#Modaltime').modal('hide')
                    window.location.assign('/paketwisata/edit/'+idtravel);
                }
            })
        });
        </script>


        <script>
    $(document).ready(function(){
        $(document).on('click', '.tambahexclude', function(){
            $('#Modalexclude').modal('show');
          
        });

        $(".btn-close").click(function(){
            $("#Modalexclude").modal('hide');
        });
    });

    $(document).on('click', '.btnexclude', function(){
            var idtravel=$('#formexclude').find('#idtravel').val()
            let formData=$('#formexclude').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'{{url('addexclude')}}',
                method:"POST",
                data:formData,
                success:function(data){
                    $('#Modalexclude').modal('hide')
                    window.location.assign('/paketwisata/edit/'+idtravel);
                }
            })
        });
        </script>

        <script>
    $(document).ready(function(){
        $(document).on('click', '.tambahhighlight', function(){
            $('#Modalhighlight').modal('show');
          
        });

        $(".btn-close").click(function(){
            $("#Modalhighlight").modal('hide');
        });
    });


    $(document).on('click', '.btnhighlight', function(){
            var idtravel=$('#formhighlight').find('#idtravel').val()
            let formData=$('#formhighlight').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'{{url('addhighlight')}}',
                method:"POST",
                data:formData,
                success:function(data){
                    $('#Modalhighlight').modal('hide')
                    window.location.assign('/paketwisata/edit/'+idtravel);
                }
            })
        });
        </script>

        <script> 
      $(document).ready(function(){
        $(document).on('click', '.tambahimportant', function(){
            $('#Modalimportant').modal('show');
          
        });

        $(".btn-close").click(function(){
            $("#Modalimportant").modal('hide');
        });
    });

    $(document).on('click', '.btnimportant', function(){
            var idtravel=$('#formimportant').find('#idtravel').val()
            let formData=$('#formimportant').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'{{url('addimportant')}}',
                method:"POST",
                data:formData,
                success:function(data){
                    $('#Modalimportant').modal('hide')
                    window.location.assign('/paketwisata/edit/'+idtravel);
                }
            })
        });
      </script>

      <script> 
    $(document).ready(function(){
        $(document).on('click', '.tambahdestination', function(){
            $('#Modaldestination').modal('show');
          
        });

        $(".btn-close").click(function(){
            $("#Modaldestination").modal('hide');
        });

        $(document).on('click', '.btndestination', function(){
            var idtravel=$('#formdestinationadd').find('#idtravel').val()
            let formData=$('#formdestinationadd').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'{{url('adddestination')}}',
                method:"POST",
                data:formData,
                success:function(data){
                    $('#Modaldestination').modal('hide')
                    window.location.assign('/paketwisata/edit/'+idtravel);
                }
            })
        });
    });
      </script>

      <script> 
      $(document).ready(function(){
        $(document).on('click', '.tambahseason', function(){
            $('#Modalseason').modal('show');
          
        });

        $(".btn-close").click(function(){
            $("#Modalseason").modal('hide');
        });

        $(document).on('click', '.btnseason', function(){
            var idtravel=$('#formseasonadd').find('#idtravel').val()
            let formData=$('#formseasonadd').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'{{url('addseason')}}',
                method:"POST",
                data:formData,
                success:function(data){
                    $('#Modalseason').modal('hide')
                    window.location.assign('/paketwisata/edit/'+idtravel);
                }
            })
        });
    });
      </script>

<script>
    $(document).ready(function(){
        $(document).on('click', '.btneditprovince', function(){
            var idprovince=$(this).val();
            $('#editModalProvince').modal('show');
            // const dateFormat="dddd, MMMM Do YYYY, h:mm";
            $.ajax({
                
                type: "GET",
                url:"/showedittambahprovince/"+idprovince,
                success:function(response){
                    //console.log(response.Rate.id);
                     //$('#orderid').val(response.Order.OrderID);
                     $('#idprovince').val(response.Province.id);
                     $('#idtravels').val(response.Province.wisata_id); 
                  
                  
                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModalProvince").modal('hide');
        });

        $(document).on('click', '.btnupdateprovince', function(){
            var idprovince=$('#formeditprovince').find('#iprovince').val()
            var idtravels=$('#formeditprovince').find('#idtravels').val()
            let formData=$('#formeditprovince').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/updatetambahprovince/${idprovince}',
                method:"PATCH",
                data:formData,
                success:function(data){
                    $('#editModalProvince').modal('hide')
                    window.location.reload();
                    
                }
            })
        });
    });
    </script>

<script>
    $(document).ready(function(){
     

        $(document).on('click', '.tambahcity', function(){
            var idtambahprovinces=$(this).val();
            $('#addModalCity').modal('show');
            // const dateFormat="dddd, MMMM Do YYYY, h:mm";
            $.ajax({
                
                type: "GET",
                url:"/showedittambahprovince/"+idtambahprovinces,
                success:function(response){
                    //console.log(response.Rate.id);
                     //$('#orderid').val(response.Order.OrderID);
                     $('#idtambahprovinces').val(response.Province.id);
                     $('#idwisatas').val(response.Province.wisata_id); 
                }
            });
        });

        $(".btn-close").click(function(){
            $("#addModalCity").modal('hide');
        });

        $(document).on('click', '.btnaddcity', function(){
            var idwisatas=$('#formaddcity').find('#idwisatas').val()
            let formData=$('#formaddcity').serialize()
            // console.log(formData);

            $.ajax({
                url:'{{url('addcity')}}',
                method:"POST",
                data:formData,
                success:function(data){
                    $('#Modalchild').modal('hide')
                    window.location.assign('/paketwisata/edit/'+idwisatas);
                }
            })
        });
    });
    </script>

<script>
    $(document).ready(function(){
        $(document).on('click', '.btneditregion', function(){
            var idcity=$(this).val();
            $('#editModalCity').modal('show');
            // const dateFormat="dddd, MMMM Do YYYY, h:mm";
            $.ajax({
                
                type: "GET",
                url:"/showedittambahlocation/"+idcity,
                success:function(response){
                    //console.log(response.Rate.id);
                     //$('#orderid').val(response.Order.OrderID);
                     $('#idcity').val(response.City.id);
                     $('#idtravell').val(response.City.wisata_id); 
                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModalCity").modal('hide');
        });

        $(document).on('click', '.btnupdatecity', function(){
            var idcity=$('#formeditcity').find('#idcity').val()
            let formData=$('#formeditcity').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/updatetambahlocation/${idcity}',
                method:"PATCH",
                data:formData,
                success:function(data){
                    $('#editModalCity').modal('hide')
                    window.location.reload();
                    
                }
            })
        });
    });
    </script>
@endsection