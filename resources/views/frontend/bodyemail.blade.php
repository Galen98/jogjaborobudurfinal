<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('traveler')}}/css/fontawesome.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Jogja Borobudur Tour & Travel</title>
<style type="text/css">
    p{
        font-size: 17px;
    }
    table{
        border: 1px solid black;
    }
    thead{
        border: 1px solid black;
    }
    tr{
        border: 1px solid black;
    }
    th{
        border: 1px solid black;
    }
    tbody{
        border: 1px solid black;
    }
    td{
        border: 1px solid black;
    }

    .footer {
  padding: 40px 0;
  background-color: #ffffff;
}
.footer .social {
  text-align: center;
  padding-bottom: 25px;
  color: #4b4c4d;
}
.footer .social a {
  font-size: 24px;
  color: inherit;
  width: 40px;
  height: 40px;
  line-height: 38px;
  display: inline-block;
  text-align: center;
  border-radius: 50%;
  margin: 0 8px;
  opacity: 0.75;
}
.footer .social a:hover {
  opacity: 0.9;
}
.footer ul {
  margin-top: 0;
  padding: 0;
  list-style: none;
  text-align: center;
  font-size: 18px;
  line-height: 1.6;
  margin-bottom: 0;
}
.footer ul a {
  color: inherit;
  text-decoration: none;
  opacity: 0.8;
}
.footer ul li {
  display: inline-block;
  padding: 0 15px;
}
.footer ul a:hover {
  opacity: 1;
}
.footer .copyright {
  margin-top: 15px;
  text-align: center;
  font-size: 13px;
  color: #aaa;
}
</style>
</head>
<body>
    <h2 style="font-weight: bolder;">Tour Booking</h2>
    <a href="">
    <img src="https://i.ibb.co/hBbrrfw/logojogjaborobudur.png" alt="logo" height="52" width="68">
    </a>
    @foreach($body as $item)
    <p>
        Hi {{$item->name}}, thanks for your order.
    </p>
    <h2>Your Booking: </h2>
    <h3>{{$item->namawisata}}</h3>
    <p>Your Option: {{$item->paketwisata}}</p>
    <p>Travel Date: {{$item->traveldate}}</p>
    <p>Pickup Time: {{$item->time}}</p>
     @if($item->total > 0)
    <p style="font-weight: bolder;">Total Price: {{$item->total}}</p>
    @endif
    @if($item->totalgroup > 0)
    <p style="font-weight: bolder;">Total Price: {{$item->totalgroup}}</p>
    @endif
    <p>Full name: {{$item->name}} {{$item->surname}}</p>
    <p>Country: {{$item->country}}</p>
    <p>Phone: +{{$item->code}}{{$item->phone}}</p>
    <p>Email: {{$item->email}}</p>
    <p>Pickup location: {{$item->pickup}}</p>
    <p>Special request: {{$item->request}}</p>
    @endforeach
    <p>
        INVOICE#{{$item->id}} is now being confirmed. Our customer care will contact you as soon as posible to confirm your order and guide you to the payment options.
        <br>
        <br>
        Best regards,<br>
        The Jogja Borobudur Tour & Travel Team
    </p>
    <section class="footer" style="background-color: #fc2c04;color: white;">
      <div class="social">
        <a href="#"><img src="https://www.freepnglogos.com/uploads/whatsapp-png-image-9.png" height="40" width="40"></a>
        <a href="#"><img src="https://www.freepnglogos.com/uploads/tripadvisor-logo-png/file-tripadvisor-logo-svg-wikipedia-3.png" height="40" width="40"></a>
        <a href="#"><img src="https://www.freepnglogos.com/uploads/facebook-logo-icon/facebook-logo-icon-facebook-icon-png-images-icons-and-png-backgrounds-1.png" height="40" width="40"></a>
        <a href="#"><img src="https://www.freepnglogos.com/uploads/instagram-icon-png/wait-considerations-make-before-switching-instagram-logo-icon-4.png" height="40" width="40"></a>
        <a href="#"><img src="https://res.cloudinary.com/crunchbase-production/image/upload/c_lpad,f_auto,q_auto:eco,dpr_1/x20bsi73vu9bwkyeo3jq" height="40" width="40"></a>
      </div>
      <ul class="list">
      </ul>
      <p class="copyright" style="color: white;">Jogjaborobudur Tour & Travel</p>
    </section>
</body>
</html>