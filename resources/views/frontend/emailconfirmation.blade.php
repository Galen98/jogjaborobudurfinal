<!DOCTYPE html>
<html>
<head>

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

.star {
    font-size: 20px;
    color: yellow;
        }
    </style>
</head>

<body>
<div class="container">
        <div class="row">
            <div class="col-md-6 text-center">
              <center><img src="www.jogjaborobudur.com/traveler/images/logoabout.JPG" class="imageemail"/></center>
    <h1 style="text-align: center;">Thank you! You have submitted your review.</h1>
    <h2 style="text-align: center;">{{ $reviews->paketwisata }}</h2>
    <p style="text-align: center;"> 
    @for ($i = 1; $i <= $reviews->star_rating; $i++)
    <span class="star">&#9733;</span>
    @endfor
    </p>
    <p style="text-align: center;font-size:15px;">"{{ $reviews->comments }}"</p>
    <p style="text-align: center;"><a href="www.jogjaborobudur.com/item/{{$travel->slug}}">Click here to see your review!</a></p>
    <br>
    <p style="text-align: center;">Thank you for choosing Jogja Borobudur Tour & Travel for your trip!</p>
    <hr>
    <p style="text-align: center;">This email is intended for {{ $reviews->name }}, because you made a trip booking through Jogja Borobudur Tour & Travel</p>
</div>
</div>
</div>

</body>
</html>
