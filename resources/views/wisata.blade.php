@extends('index')
@extends('navadmin')

@section('content')
@include('sweetalert::alert')
<div class="container">
<div class="row">
<div class="card-body">
<form action="/paketwisata/form" method="GET" >
<button class="btn btn-danger btn-icon-text">
<i class="mdi mdi-upload btn-icon-prepend"></i>                                                    
Create New Tour
</button>
</form>
</div>
</div>
</div>

<div class="container">
<div class="row">
<div class="card-body">
<table>
                            <div>
                            <h5 class="card-title">Filter By Language:</h5>
                            <tbody>
                            <tr class="control-group">
                              <td>
                            <td><form action="/paketwisata/filter" method="GET">
                            <div class="wrapper">
                            <td><div class="form-group">
                            <select name="bahasa" class="form-control" required="">
                          <option value=" ">Pilih salah satu</option>
                          @foreach($bahasa as $item)
                          <option value="{{$item->bahasa}}">{{$item->bahasa}}</option>
                          @endforeach
                          </select>
                          </div></td>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                          </div>
                            <td><button class="btn btn-primary" type="submit">Filter</button></td>
                        </form>
                   			 </td>
                            </td>  
                            </tr>    
                            </tbody>
                            </div>
                        </table>
</div>
</div>
</div>



<div class="container">
<div class="row">
  

  <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Hapus Travel</h5>
        <button type="button" class="batal close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
      @foreach($travel as $item)<form action="{{url('hapuswisata/'.$item->wisata_id)}}" method="POST" enctype="multipart/form-data" id="formhapus">
          @endforeach
      @csrf
        <p>Apakah anda yakin ingin menghapus?</p> 
        <input type="hidden" name="idwisata" id="idwisata">
      <div class="modal-footer">
      <button type="button" class="batal btn btn-secondary">Tidak</button>
        <button type="submit" class="btn btn-danger btnhapus">Ya</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div> 
</div>
</div>

@if(count($travel) === 0)
   <h1 style="text-align: center;margin-top: 100px;">Data is empty!</h1>
   @else
<div id="gyg" data-server-rendered="true">
  <div class="main-wrapper  partner-left-layout" data-v-5120f7ad>
  <a href="#main-content" class="skip-link">Skip to content</a> 
  <main id="main-content">
    <section layout="vertical" class="grid-wrapper container grid-wrapper--list">
@foreach($travel as $item)
  <div class="activity-card-block--grid d-block d-md-none" style="margin-bottom: 0px;">
  <article data-test-id="horizontal-activity-card" style="overflow-x: auto; white-space: nowrap;" class="activity-card horizontal-activity-card companion-inactive activity-card-block__card--grid activity-card-block--desktop" data-v-a1084d9e>
  <div style="width: 250%;">
  <a role="contentinfo" target="_blank" rel="noopener" data-activity-id="412877" class="activity-card__container gtm-trigger__card-interaction" data-v-a1084d9e>
  <div class="activity-card__image" data-v-a1084d9e> 
  <div class="activity-card__image-info align-end" data-v-a1084d9e>
  </div> 
  <picture data-v-a1084d9e>
  <source srcset="{{ url('public/img/'.$item->image) }}" type="image/webp"> 
  <img src="{{ url('public/img/'.$item->image) }}" alt="{{$item->namawisata}}">
  </picture>
  </div> 
  <div class="activity-card__details" data-v-a1084d9e>
  <div class="activity-card__details-main" data-v-a1084d9e>
  <div class="activity-card__details-left" data-v-a1084d9e>
  <h2 class="activity-card__title" data-v-a1084d9e>{{$item->namawisata}}</h2> 
  <div class="activity-card__attributes" data-v-a1084d9e>
  <ul class="activity-attributes__container" data-v-67560657 data-v-a1084d9e>
  <li class="activity-attributes__attribute" data-v-67560657>
  <span data-v-67560657>
    <span data-v-67560657>{{$item->durasi}}</span>
  </span>
</li>
  </ul> 
  </div> 
  <div class="activity-card__badges__container" data-v-a1084d9e>
  </div>
  </div> 
  <div class="activity-card__details-right" data-v-a1084d9e>
  <div class="rating-overall__container" data-v-a1084d9e>
  <div class="rating-overall__rating">
  <form action="{{'/item/'.$item->slug}}" method="get" target="_blank">
  <button type="submit" class="btn-sm btn btn-outline-info" style="margin-right: 10px;"><i class="mdi mdi-eye-outline btn-icon-prepend"></i> Check it!</button>
  </form>
  <form action="{{'paketwisata/editimage/'.$item->wisata_id}}" method="get">
  <button type="submit" class="btn-sm btn btn-outline-dark" style="margin-right: 10px;"><i class="mdi mdi-image-multiple btn-icon-prepend"></i> Image</button>
  </form>
  <form action="{{'paketwisata/diskon/'.$item->wisata_id}}" method="get">
  <button type="submit" class="btn-sm btn btn-outline-primary" style="margin-right: 10px;"><i class="mdi mdi-coin btn-icon-prepend"></i> Edit harga</button>
  </form>
  <form action="{{'paketwisata/edit/'.$item->wisata_id}}" method="get">
  <button type="submit" class="btn-sm btn btn-outline-primary" style="margin-right: 10px;"><i class="mdi mdi-pencil-box btn-icon-prepend"></i> Edit travel</button>
  </form>
  <button type="button" class="hapusbtn btn-sm btn btn-outline-danger" value="{{$item->wisata_id}}"><i class="mdi mdi-delete btn-icon-prepend"></i> Delete</button>
</div> 
</div> 
<div class="activity-card__pricing" data-v-a1084d9e><div class="baseline-pricing" data-v-24caa43d data-v-a1084d9e><div class="baseline-pricing__container" data-v-24caa43d><div class="baseline-pricing__value" data-v-24caa43d><p class="baseline-pricing__from" data-v-24caa43d>From</p>
        @currency($item->IDR)
      </div> <p class="baseline-pricing__category" data-v-24caa43d>
        {{$item->kategories}}
      </p></div></div></div> 
    </div> 
    </div>
    </div>
    </a>
  </div>
    </article>
    </div>

    <div class="activity-card-block--grid d-none d-sm-block" style="margin-bottom: 0px;">
  <article data-test-id="horizontal-activity-card" class="activity-card horizontal-activity-card companion-inactive activity-card-block__card--grid activity-card-block--desktop" data-v-a1084d9e>
  <a role="contentinfo" target="_blank" rel="noopener" data-activity-id="412877" class="activity-card__container gtm-trigger__card-interaction" data-v-a1084d9e>
  <div class="activity-card__image" data-v-a1084d9e> 
  <div class="activity-card__image-info align-end" data-v-a1084d9e>
  </div> 
  <picture data-v-a1084d9e>
  <source srcset="{{ url('public/img/'.$item->image) }}" type="image/webp"> 
  <img src="{{ url('public/img/'.$item->image) }}" alt="{{$item->namawisata}}">
  </picture>
  </div> 
  <div class="activity-card__details" data-v-a1084d9e>
  <div class="activity-card__details-main" data-v-a1084d9e>
  <div class="activity-card__details-left" data-v-a1084d9e>
  <h2 class="activity-card__title" data-v-a1084d9e>{{$item->namawisata}}</h2> 
  <div class="activity-card__attributes" data-v-a1084d9e>
  <ul class="activity-attributes__container" data-v-67560657 data-v-a1084d9e>
  <li class="activity-attributes__attribute" data-v-67560657>
  <span data-v-67560657>
    <span data-v-67560657>{{$item->durasi}}</span>
  </span>
</li>
  </ul> 
  </div> 
  <div class="activity-card__badges__container" data-v-a1084d9e>
  </div>
  </div> 
  <div class="activity-card__details-right" data-v-a1084d9e>
  <div class="rating-overall__container" data-v-a1084d9e>
  <div class="rating-overall__rating">
  <form action="{{'/item/'.$item->slug}}" method="get" target="_blank">
  <button type="submit" class="btn-sm btn btn-outline-info" style="margin-right: 10px;"><i class="mdi mdi-eye-outline btn-icon-prepend"></i> Check it!</button>
  </form>
  <form action="{{'paketwisata/editimage/'.$item->wisata_id}}" method="get">
  <button type="submit" class="btn-sm btn btn-outline-dark" style="margin-right: 10px;"><i class="mdi mdi-image-multiple btn-icon-prepend"></i> Image</button>
  </form>
  <form action="{{'paketwisata/diskon/'.$item->wisata_id}}" method="get">
  <button type="submit" class="btn-sm btn btn-outline-primary" style="margin-right: 10px;"><i class="mdi mdi-coin btn-icon-prepend"></i> Edit harga</button>
  </form>
  <form action="{{'paketwisata/edit/'.$item->wisata_id}}" method="get">
  <button type="submit" class="btn-sm btn btn-outline-primary" style="margin-right: 10px;"><i class="mdi mdi-pencil-box btn-icon-prepend"></i> Edit travel</button>
  </form>
  <button type="button" class="hapusbtn btn-sm btn btn-outline-danger" value="{{$item->wisata_id}}"><i class="mdi mdi-delete btn-icon-prepend"></i> Delete</button>
</div> 
</div> 
<div class="activity-card__pricing" data-v-a1084d9e><div class="baseline-pricing" data-v-24caa43d data-v-a1084d9e><div class="baseline-pricing__container" data-v-24caa43d><div class="baseline-pricing__value" data-v-24caa43d><p class="baseline-pricing__from" data-v-24caa43d>From</p>
        @currency($item->IDR)
      </div> <p class="baseline-pricing__category" data-v-24caa43d>
        {{$item->kategories}}
      </p></div></div></div> 
    </div> 
    </div>
    </div>
    </a>
    </article>
    </div>
    @endforeach
  </section>
  @endif
</main>
</div>
</div>



<div class="col-lg-12">
  {{ $travel->links() }}
  </div>
@endsection

@section('scripts')
<script>
       $(document).ready(function(){ 
        $(document).on('click', '.hapusbtn', function(){
            var idwisata=$(this).val();
            $('#hapus').modal('show');
            $.ajax({
                type: "GET",
                url:"/showhapuswisata/hapus/"+idwisata,
                success:function(response){
                    $('#idwisata').val(response.Travel.wisata_id);
                }
            });
          
        });

    $(document).on('click', '.btnhapus', function(){
            var wisataid=$('#formhapus').find('#idwisata').val()
            let formData=$('#formhapus').serialize()
            //console.log(progid);
            console.log(formData)

            $.ajax({
                url:'/hapuswisata/${idwisata}',
                method:"DELETE",
                data:formData,
                success:function(data){
                    $('#hapus').modal('hide')
                     window.location.assign('paketwisata');
                }
            });
        });
        $(".batal").click(function(){
            $("#hapus").modal('hide');
        });
       });
            
        </script>
@endsection