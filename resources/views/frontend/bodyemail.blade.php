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


    <p>
        Hi {!! $body->name !!}, thanks for your order.
    </p>
    <h2>Your Booking: </h2>
    <h3>{!! $body->namawisata !!}</h3>
    <p>Your Option: {!! $body->paketwisata !!}</p>
    @if($body->adult > 0)
    <p>Participants: {!! $body->adult !!} Person</p>
    @endif
    @if($body->child > 0)
    <p>Participants (Child): {!! $body->child !!} Child</p>
    @endif
    @if($body->participants > 0)
    <p>Participants (Group): {!! $body->participants !!} Person</p>
    @endif
    <p>Travel Date: {!! $body->traveldate !!}</p>
    <p>Pickup Time: {!! $body->time !!}</p>
     @if($body->total > 0)
    <p style="font-weight: bolder;">Total Price: {!! $body->total !!}</p>
    @endif
    @if($body->totalgroup > 0)
    <p style="font-weight: bolder;">Total Price: {!! $body->totalgroup !!}</p>
    @endif
    <p>Full name: {!! $body->name !!} {!! $body->surname !!}</p>
    <p>Country: {!! $body->country !!}</p>
    <p>Phone: +{!! $body->code !!}{!! $body->phone !!}</p>
    <p>Email: {!! $body->email !!}</p>
    <p>Pickup location: {!! $body->pickup !!}</p>
    <p>Special request: {!! $body->request !!}</p>

    <p>
        INVOICE#{!! $body->id !!} is now being confirmed. Our customer care will contact you as soon as posible to confirm your order and guide you to the payment options.
        <br>
        <br>
        Best regards,<br>
        The Jogja Borobudur Tour & Travel Team
    </p>
    <section class="footer" style="background-color: #fc2c04;color: white;">
      <div class="social">
        <a href="https://wa.me/628562862504"><img src="https://www.freepnglogos.com/uploads/whatsapp-png-image-9.png" height="40" width="40"></a>
        <a href="https://www.tripadvisor.com/Attraction_Review-g14782503-d25132575-Reviews-Jogja_Borobudur_Tour_Travel-Yogyakarta_Yogyakarta_Region_Java.html"><img src="https://www.freepnglogos.com/uploads/tripadvisor-logo-png/file-tripadvisor-logo-svg-wikipedia-3.png" height="40" width="40"></a>
        <a href="https://www.facebook.com/jogjaborobudur"><img src="https://www.freepnglogos.com/uploads/facebook-logo-icon/facebook-logo-icon-facebook-icon-png-images-icons-and-png-backgrounds-1.png" height="40" width="40"></a>
        <a href="https://www.instagram.com/masheru__/"><img src="https://www.freepnglogos.com/uploads/instagram-icon-png/wait-considerations-make-before-switching-instagram-logo-icon-4.png" height="40" width="40"></a>
        <a href="https://www.getyourguide.com/jogja-borobudur-tour-travel-s27125/"><img src="https://res.cloudinary.com/crunchbase-production/image/upload/c_lpad,f_auto,q_auto:eco,dpr_1/x20bsi73vu9bwkyeo3jq" height="40" width="40"></a>
      </div>
      <ul class="list">
      </ul>
      <p class="copyright" style="color: white;">Jogja Borobudur Tour & Travel</p>
    </section>
</body>
</html>