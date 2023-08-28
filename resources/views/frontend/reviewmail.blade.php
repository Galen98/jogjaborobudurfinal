<!DOCTYPE html>
<html>
<head>
<title>Was your tour of {{ $booking->namawisata }} as good as expected? </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    .awesome-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.awesome-button:hover {
    background-color: #0056b3;
}
    </style>
</head>

<body>
<div class="container">
        <div class="row">
            <div class="col-md-6 text-center">
                <h1 style="text-align: center;">Was your tour of {{ $booking->namawisata }} as good as expected?</h1>
    <p style="text-align: center;">Hello {{ $booking->name }}, lets review</p>
    <h1 style="text-align: center;">{{ $booking->namawisata }}</h1>
    
    <center> <button class="awesome-button">Click this link for review!</button>
    <p style="text-align: center;">Share your trip experience with our team (driver/guide), mention their name, and tell the world. Others count your review
        to find the right tour for their trip!
    </p >
    <br>
    <br>
    <p style="text-align: center;">Thank you for choosing Jogja Borobudur Tour & Travel for your trip!</p>
    <br>
    <br>
    <hr>
    <p style="text-align: center;">This email is intended for {{ $booking->name }}, because you made a trip booking through Jogja Borobudur Tour & Travel</p>
</div>
</div>
</div>

</body>
</html>
