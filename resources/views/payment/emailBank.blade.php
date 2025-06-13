<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Transfer</title>
</head>
<body>
<a href="www.jogjaborobudur.com">
    <img src="https://jogjaborobudur.com/public/1682857946_logojogjaborobudur.png" alt="logo" height="52" width="68" 
    style="margin-bottom:5px;">
    </a>
<p>Hi, {!! $body->name !!}</p>
<p>Please complete your payment</p>
<p style="margin-top:5px;">Booking ID: {!! $body->id !!}</p>
<div style="background-color:#DDF1FA;padding:5px;border-radius:10px;"> 
<strong>
    <b>
      <p>Account Number: 8020237067</p>
      <p>Account Holder: Heru Kristanto</p>
      <p>Bank Name: BCA</p>
      @if($body->total > 0)
    <p>Total Amount: {!! $body->total !!}</p>
    @endif
    @if($body->totalgroup > 0)
    <p>Total Amount: {!! $body->totalgroup !!}</p>
    @endif  
    </b>
</strong>
</div>
<hr>
<b><p>Order Details</p></b>
<p>{!! $body->namawisata !!}</p>
<p>{!! $body->paketwisata !!}</p>
<p>{!! $body->traveldate !!}</p>
@if($body->adult > 0)
    <p>Participants: {!! $body->adult !!} Person</p>
    @endif
    @if($body->child > 0)
    <p>Participants (Child): {!! $body->child !!} Child</p>
    @endif
    @if($body->participants > 0)
    <p>Participants (Group): {!! $body->participants !!} Person</p>
    @endif
    @if($body->total > 0)
    <p style="font-weight: bolder;">{!! $body->total !!}</p>
    @endif
    @if($body->totalgroup > 0)
    <p style="font-weight: bolder;">{!! $body->totalgroup !!}</p>
    @endif 
<hr>
<div style="background-color:#DDF1FA;padding:5px;border-radius:10px;"> 
<center><p>This is not your booking voucher. Once your payment is confirmed.
    we will send your booking voucher to your email.
</p></center>
</div>
</body>
</html>