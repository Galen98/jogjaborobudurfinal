@extends('index')
@extends('navadmin')
@section('content')
@include('sweetalert::alert')
<div class="card-body">
<table>
                            <div>
                            <h5 class="card-title">Filter Travel Date :</h5>
                            <tbody>
                            <tr class="control-group">
                              <td>
                            <td>
                            <form action="/data-booking/filter" method="GET">
                            <div class="wrapper">
                            <td><input type="text" id="from" name="from" class="form-control" placeholder="From"></td>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td><input type="text" id="to" name="to" class="form-control" placeholder="To"></td>
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


  <div id="gyg" data-server-rendered="true">
   @if(count($booking) === 0)
   <h1 style="text-align: center;margin-top: 100px;">Data is empty!</h1>
   @else
  <div class="main-wrapper  partner-left-layout" data-v-5120f7ad>
  <a href="#main-content" class="skip-link">Skip to content</a> 
  <main id="main-content">
    <section layout="vertical" class="grid-wrapper grid-wrapper--list">
  @foreach($booking as $item)
  <div class="activity-card-block--grid d-block d-md-none" style="margin-bottom: 0px;">
  <article style="overflow-x: auto; white-space: nowrap;" data-test-id="horizontal-activity-card" class="activity-card horizontal-activity-card companion-inactive activity-card-block__card--grid activity-card-block--desktop" data-v-a1084d9e>
  <div style="width: 200%;"> 
  <a role="contentinfo" target="_blank" rel="noopener" data-activity-id="412877" class="activity-card__container gtm-trigger__card-interaction" data-v-a1084d9e>
  <div class="activity-card__image" data-v-a1084d9e> 
  <div class="activity-card__image-info align-end" data-v-a1084d9e></div> 
  <picture data-v-a1084d9e>
  <source srcset="{{ url('public/img/'.$item->wisata->image) }}" type="image/webp"> 
  <img src="{{ url('public/img/'.$item->wisata->image) }}">
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
    <span data-v-67560657>
      <span data-v-67560657>Option: {{$item->paketwisata}}</span>
      <br>
      <span data-v-67560657>Travel date: {{$item->traveldate}}</span>
      <br>
      <span data-v-67560657>Name: {{$item->name}} {{$item->surname}}</span>
      <br>
      <span data-v-67560657>Time: {{$item->time}}</span>    
    </span>
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
  <button type="button" class="btn-sm btn btn-outline-info" data-bs-toggle="collapse" href="#collapseExample{{$item->id}}" role="button" aria-expanded="false" aria-controls="collapseExample" style="margin-right: 10px;">Details</button>
  <form action="{{url('/sendlinkreview/'.$item->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
  <button type="submit" class="btn-sm btn btn-outline-primary" style="margin-right: 10px;"><i class="mdi mdi-send btn-icon-prepend"></i> Send link review</button>
  </form>
  @if($item->payment == null)
  <form action="{{route('sendvoucher')}}" method="post">
      <input type="hidden" name="idBooking" value="{{$item->id}}" id="">
      @csrf
  <button type="submit" class="btn-sm btn btn-outline-primary" 
  style="margin-right: 10px;">Send Booking Voucher</button>
  </form>
      @endif
  <button type="button" class="hapusbtn btn-sm btn btn-outline-danger" value="{{$item->id}}"><i class="mdi mdi-delete btn-icon-prepend"></i> Delete</button>
</div> 
</div>
 
<div class="activity-card__pricing" data-v-a1084d9e>
  <div class="baseline-pricing" data-v-24caa43d data-v-a1084d9e>
    <div class="baseline-pricing__container" data-v-24caa43d>
    @if($item->payment !== null)
    <i class="mdi mdi-paypal menu-icon"></i>
    @endif
    @if($item->travelStatus == 'active')
      <span class="badge badge-pill badge-success" style="font-size: 10px; padding: 3px 6px;">ACTIVE</span>
      @else
      <span class="badge badge-pill badge-secondary" style="font-size: 10px; padding: 3px 6px;">DONE</span>
      @endif
      <div class="baseline-pricing__value" data-v-24caa43d>
        <p class="baseline-pricing__from" data-v-24caa43d>Total</p>
        {{$item->total}} {{$item->totalgroup}}
      </div> 
      <p class="baseline-pricing__category" data-v-24caa43d>
        
      </p></div></div></div> 
    </div> 
    </div>
    </div>
    </a>
</div>
    </article>
    <div class="collapse" id="collapseExample{{$item->id}}">
  <div class="card card-body">
  @if($item->payment !== null)
      <span data-v-67560657>Currency: {{$item->payment->currency}}</span>
      <span data-v-67560657>Amount: {{$item->payment->amount}}</span>
      <span data-v-67560657>Payment ID: {{$item->payment->payment_id}}</span>
      <span data-v-67560657>Payer ID: {{$item->payment->payer_id}}</span>
      <span data-v-67560657>Payment status: {{$item->payment->payment_status}}</span>
      <hr>
      @endif
    <span data-v-67560657>Email: {{$item->email}}</span>
    <span data-v-67560657>Phone: +{{$item->code}} {{$item->phone}}</span>
    <span data-v-67560657>Country: {{$item->country}}</span>
     @if(($item->adult) == 0)
     <p></p>
     @elseif(($item->adult) > 0)
     <span data-v-67560657>Participants: {{$item->adult}} Adult</span>
     @endif
     @if(($item->child) == 0)
     <p></p>
     @elseif(($item->child) > 0)
     <span data-v-67560657>Child Participants: {{$item->child}} Child</span>
     @endif
     @if(($item->totalgroup) == 0)
     <p></p>
     @elseif(($item->participants) > 0)
     <span data-v-67560657>Group Participants: {{$item->participants}} Person</span>
     @endif
     <span data-v-67560657>Pickup Location: {{$item->pickup}}</span>
     <span data-v-67560657>Special Request: {{$item->request}}</span>
     @if(($item->proff_of_payment) !== null)
     <span>
     <a href="{{ route('downloadProff', $item->proff_of_payment) }}" class="btn btn-primary btn-sm mt-3"><i class="mdi mdi-download"></i> Proof of payment</a>
     </span>
     @endif
  </div>
</div>
    </div>

  <div class="activity-card-block--grid d-none d-sm-block" style="margin-bottom: 0px;">
  <article style="overflow-x:scroll;white-space:nowrap;" data-test-id="horizontal-activity-card" class="activity-card horizontal-activity-card 
  companion-inactive activity-card-block__card--grid activity-card-block--desktop" data-v-a1084d9e>
  <div> 
  <a role="contentinfo" target="_blank" rel="noopener" data-activity-id="412877" class="activity-card__container gtm-trigger__card-interaction" data-v-a1084d9e>
  <!-- <div class="activity-card__image" data-v-a1084d9e> 
  <div class="activity-card__image-info align-end" data-v-a1084d9e></div> 
  <picture data-v-a1084d9e>
  <source srcset="{{ url('public/img/'.$item->wisata->image) }}" type="image/webp"> 
  <img src="{{ url('public/img/'.$item->wisata->image) }}">
  </picture>
  </div>  -->
  <div class="activity-card__details" data-v-a1084d9e>
  <div class="activity-card__details-main" data-v-a1084d9e>
  <div class="activity-card__details-left" data-v-a1084d9e> 
  <h2 class="activity-card__title" data-v-a1084d9e>{{$item->namawisata}}</h2> 
  <div class="activity-card__attributes" data-v-a1084d9e>
  <ul class="activity-attributes__container" data-v-67560657 data-v-a1084d9e>
  <li class="activity-attributes__attribute" data-v-67560657>
  <span data-v-67560657>
    <span data-v-67560657>
      <span data-v-67560657>Option: {{$item->paketwisata}}</span>
      <br>
      <span data-v-67560657>Travel date: {{$item->traveldate}}</span>
      <br>
      <span data-v-67560657>Name: {{$item->name}} {{$item->surname}}</span>   
      <br>
      <span data-v-67560657>Time: {{$item->time}}</span>   
    </span>
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
  <button type="button" class="btn-sm btn btn-outline-info" data-bs-toggle="collapse" href="#collapseExample{{$item->id}}" role="button" aria-expanded="false" aria-controls="collapseExample" style="margin-right: 10px;">Details</button>
  <form action="{{url('/sendlinkreview/'.$item->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
  <button type="submit" class="btn-sm btn btn-outline-primary" style="margin-right: 10px;"><i class="mdi mdi-send btn-icon-prepend"></i> Send link review</button>
</form>
  @if($item->payment == null)
  <form action="{{route('sendvoucher')}}" method="post">
      <input type="hidden" name="idBooking" value="{{$item->id}}" id="">
      @csrf
  <button type="submit" class="btn-sm btn btn-outline-primary" 
  style="margin-right: 10px;">Send Booking Voucher</button>
  </form>
      @endif
  <button type="button" class="hapusbtn btn-sm btn btn-outline-danger" value="{{$item->id}}"><i class="mdi mdi-delete btn-icon-prepend"></i> Delete</button>
</div> 
</div>
 
<div class="activity-card__pricing" data-v-a1084d9e>
  <div class="baseline-pricing" data-v-24caa43d data-v-a1084d9e>
    <div class="baseline-pricing__container" data-v-24caa43d>
    @if($item->payment !== null)
    <i class="mdi mdi-paypal menu-icon"></i>
    @else
    <i class="far fa-credit-card"></i> 
    @endif
    @if($item->travelStatus == 'active')
      <span class="badge badge-pill badge-success" style="font-size: 10px; padding: 3px 6px;">ACTIVE</span>
      @else
      <span class="badge badge-pill badge-secondary" style="font-size: 10px; padding: 3px 6px;">DONE</span>
      @endif
      <div class="baseline-pricing__value" data-v-24caa43d>
        <p class="baseline-pricing__from" data-v-24caa43d>Total</p>
        {{$item->total}} {{$item->totalgroup}}
      </div> 
      <p class="baseline-pricing__category" data-v-24caa43d>
        
      </p></div></div></div> 
    </div> 
    </div>
    </div>
    </a>
</div>
    </article>
    <div class="collapse" id="collapseExample{{$item->id}}">
  <div class="card card-body">
      @if($item->payment !== null)
      <span data-v-67560657>Currency: {{$item->payment->currency}}</span>
      <span data-v-67560657>Amount: {{$item->payment->amount}}</span>
      <span data-v-67560657>Payment ID: {{$item->payment->payment_id}}</span>
      <span data-v-67560657>Payer ID: {{$item->payment->payer_id}}</span>
      <span data-v-67560657>Payment status: {{$item->payment->payment_status}}</span>
      <hr>
      @endif
    <span data-v-67560657>Email: {{$item->email}}</span>
    <span data-v-67560657>Phone: +{{$item->code}} {{$item->phone}}</span>
    <span data-v-67560657>Country: {{$item->country}}</span>
     @if(($item->adult) == 0)
     <p></p>
     @elseif(($item->adult) > 0)
     <span data-v-67560657>Participants: {{$item->adult}} Adult</span>
     @endif
     @if(($item->child) == 0)
     <p></p>
     @elseif(($item->child) > 0)
     <span data-v-67560657>Child Participants: {{$item->child}} Child</span>
     @endif
     @if(($item->totalgroup) == 0)
     <p></p>
     @elseif(($item->participants) > 0)
     <span data-v-67560657>Group Participants: {{$item->participants}} Person</span>
     @endif
     <span data-v-67560657>Pickup Location: {{$item->pickup}}</span>
     <span data-v-67560657>Special Request: {{$item->request}}</span>
     @if(($item->proff_of_payment) !== null)
     <span>
     <a href="{{ route('downloadProff', $item->proff_of_payment) }}" class="btn btn-primary btn-sm mt-3"><i class="mdi mdi-download"></i> Proof of payment</a>
     </span>
     @endif
  </div>
</div>
    </div>
    @endforeach
  </section>
</main>
</div>
@endif
</div>
            <div class="col-lg-12">
            {{ $booking->links() }}
            </div>
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Booking Date</h5>
            <button type="button" class="btn-close" data-dismiss="modal">
            </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <form action="{{url('updatecurrency')}}" action="POST" enctype="multipart/form-data" id="formedit">
      	@csrf
      <div class="form-group">
        <label></label>
        <input type="hidden" name="idbooking" id="idbooking" readonly="">
        <label>Name</label> 
        <input type="text" name="name" class="form-control" id="name" readonly="">
        <br>
        <label>Country</label>
        <input type="text" name="country" class="form-control" id="country" readonly="">
        <br>
        <label>Email</label>
        <input type="text" name="email" class="form-control" id="email" readonly="">
        <br>
        <label>Travel Date</label>
        <input type="text" name="bookingdate" class="form-control" id="bookingdate" readonly="">
        <br>
        <label>Travel Package</label>
        <input type="text" name="travel" class="form-control" id="travel" readonly="">
        <br>
        <label>Option</label>
        <input type="text" name="paket" class="form-control" id="paket" readonly="">
        <br>
        <label>Time</label>
        <input type="text" name="time" class="form-control" id="time" readonly="">
        
        <br>
        <label>Adult Participants</label>
        <input type="text" name="adult" class="form-control" id="adult" readonly="">
        
        <br>
        <label>Child Participants</label>
        <input type="text" name="child" class="form-control" id="child" readonly="">
         <br>
        <label>Group Participants</label>
        <input type="text" name="group" class="form-control" id="group" readonly="">
        <br>
        <label>Pickup Location</label>
        <input type="text" name="pickup" class="form-control" id="pickup" readonly="">
        <br>
        <label>Special Request</label>
        <textarea name="request" class="form-control" id="request" readonly="" readonly="" style="height: 140px;"></textarea>
        </div>
        <button type="button" class="btn btn-primary btn-close">Close</button>
        </form>
        <br>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data</h5>
        <button type="button" class="batal close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
      	@foreach($booking as $item)<form action="{{url('hapusbooking/'.$item->id)}}" method="POST" enctype="multipart/form-data" id="formhapus">
          @endforeach
          @method('delete')
      @csrf
        Apakah anda yakin ingin menghapus?
        <input type="hidden" name="bookingid" id="bookingid">
      <div class="modal-footer">
      <button type="button" class="batal btn btn-secondary">Tidak</button>
        <button type="submit" class="btn btn-danger btnhapus">Ya</button>
      </div>
  </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $(document).on('click', '.btnedit', function(){
            var idbooking=$(this).val();
            $('#editModal').modal('show');
       		const created_at="dddd, MMMM Do YYYY, h:mm";
            $.ajax({
                type: "GET",
                url:"/showdetailbooking/"+idbooking,
                success:function(response){
                    $('#idbooking').val(response.Booking.id); 
                    $('#name').val(response.Booking.name+' '+response.Booking.surname);
                    $('#country').val(response.Booking.country);
                    $('#email').val(response.Booking.email);
                    $('#bookingdate').val(response.Booking.traveldate); 
                    $('#travel').val(response.Booking.namawisata);
                    $('#paket').val(response.Booking.paketwisata);
                    $('#time').val(response.Booking.time); 
                    if(response.Booking.child > 0){ 
                    $('#child').val(response.Booking.child+' '+'Person');
                    }else{
                    	$('#child').val('0'+' '+'Person');
                    }
                    if(response.Booking.adult > 0){ 
                    $('#adult').val(response.Booking.adult+' '+'Person');
                    }else{
                    	$('#adult').val('0'+' '+'Person');
                    }
                    if(response.Booking.totalgroup > 0){ 
                    $('#group').val(response.Booking.totalgroup+' '+'Person');
                    }else{
                    	$('#group').val('This tour not for group');
                    }
                    $('#pickup').val(response.Booking.pickup);
                    $('#request').val(response.Booking.request);	
                      
                }
            });
        });

        $(".btn-close").click(function(){
            $("#editModal").modal('hide');
        });
    });

        </script>

        <script>
       $(document).ready(function(){ 
        $(document).on('click', '.hapusbtn', function(){
            var bookingid=$(this).val();
            $('#hapus').modal('show');
            $.ajax({
                type: "GET",
                url:"/showdetailbooking/"+bookingid,
                success:function(response){
                    $('#bookingid').val(response.Booking.id);
                }
            });
          
        });

    $(document).on('click', '.btnhapus', function(){
            var bookingid=$('#formhapus').find('#bookingid').val()
            let formData=$('#formhapus').serialize()
            //console.log(progid);
            console.log(formData)
            $.ajax({
                url:'/hapusbooking/${bookingid}',
                method:"DELETE",
                data:formData,
                success:function(data){
                    $('#hapus').modal('hide')
                    window.location.assign('data-booking');
                }
            });
        });
        $(".batal").click(function(){
            $("#hapus").modal('hide');
        });
       });
            
        </script>
        <script>
          $(function() {
        $( "#from" ).datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true
        });
        $( "#to" ).datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true
        });
      });
        </script>
@endsection