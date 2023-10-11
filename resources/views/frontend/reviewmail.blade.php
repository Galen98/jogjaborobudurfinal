<!DOCTYPE html>
<html>
<head>
<title>Was your tour of {{ $booking->namawisata }} as good as expected? </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    @import url('https://fonts.cdnfonts.com/css/gt-eesti-display-trial');
    *{
    font-family: 'GT Eesti Display Trial', sans-serif;
    font-family: 'GT Eesti Text Trial', sans-serif;  
    }
    .awesome-button {
    display: inline-block;
    padding: 10px 20px;
    background-color:#fc2c04;
    color: white;
    border: none;
    border-radius: 50px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.imageemail{
    max-width:120px;
    max-height:120px;
}

.awesome-button:hover {
    background-color: #c72202;
}
    </style>
</head>

<body>
<div class="container">
        <div class="row">
            <div class="col-md-6 text-center">
              <center><img src="www.jogjaborobudur.com//traveler/images/logoabout.JPG" class="imageemail"/></center>
                <h2 style="text-align: center;">Was your tour of {{ $booking->namawisata }} <br>as good as expected?</h2>
    <p style="text-align: center;">Hello {{ $booking->name }}, lets review</p>
    <h3 style="text-align: center;">{{ $booking->namawisata }}</h3>
    
    <center>
    <a href="www.jogjaborobudur.com/reviewtour/{{$reviews->token}}">
    <button class="awesome-button">Click this link for review!</button>
    </a>
    </center>
    <p style="text-align: center;">Share your trip experience with our team (driver/guide),<br> mention their name, and tell the world. Others count your review
        to find the right tour for their trip!
    </p >
    <br>
    <p style="text-align: center;">Thank you for choosing Jogja Borobudur Tour & Travel for your trip!</p>
    <hr>
    <p style="text-align: center;">This email is intended for {{ $booking->name }}, because you made a trip booking through Jogja Borobudur Tour & Travel</p>
</div>
</div>
</div>

</body>
</html>
