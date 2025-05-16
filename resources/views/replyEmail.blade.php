<!DOCTYPE html>
<html>
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
<style type="text/css">   
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
    <div style='border-top:1px solid #ccc; border-bottom:1px solid #ccc; padding:15px; margin:15px 0;'>
        <p>On {{ $date }}, {{ $name }} {{ $to }} wrote:</p>
    
        <blockquote style='background:#f9f9f9;padding:10px;border-left:5px solid #ccc;margin:10px 0;'>
            {{ $visitorMessage }}
        </blockquote>
    </div>

    <p>{!! $messagereply !!}</p>
    <section class="footer" style="background-color: #fc2c04;color: white;">
        <div class="social">
          <a href="https://wa.me/628562862504"><img src="https://www.freepnglogos.com/uploads/whatsapp-png-image-9.png" height="40" width="40"></a>
          <a href="https://www.tripadvisor.com/Attraction_Review-g14782503-d25132575-Reviews-Jogja_Borobudur_Tour_Travel-Yogyakarta_Yogyakarta_Region_Java.html"><img src="https://www.freepnglogos.com/uploads/tripadvisor-logo-png/file-tripadvisor-logo-svg-wikipedia-3.png" height="40" width="40"></a>
          <a href="https://www.facebook.com/jogjaborobudur"><img src="https://www.freepnglogos.com/uploads/facebook-logo-icon/facebook-logo-icon-facebook-icon-png-images-icons-and-png-backgrounds-1.png" height="40" width="40"></a>
          <a href="https://www.instagram.com/masheru__/"><img src="https://www.freepnglogos.com/uploads/instagram-icon-png/wait-considerations-make-before-switching-instagram-logo-icon-4.png" height="40" width="40"></a>
          <a href="https://www.getyourguide.com/jogja-borobudur-tour-travel-s27125/">
          <img src="https://play-lh.googleusercontent.com/QMg0LWwb9Ki67eLcIcFpZxvCvBrW0aefn6BmXBJq3zj1G5Z_LYxcPdGKs_WWx8R5Gw" height="40" width="40"></a>
        </div>
        <ul class="list">
        </ul>
        <p class="copyright" style="color: white;">Jogja Borobudur Tour & Travel</p>
      </section>
</body>
</html>
