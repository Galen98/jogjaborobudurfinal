<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete payment</title>
    <style>
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
<p>
Hi {!! $body->name !!}, please click the link below to complete your payment.
</p>
<br>
<a href="https://jogjaborobudur.com/payment/{!! $body->token !!}"> 
<button class="awesome-button">Pay Now!</button>
</a>
<hr>
<p style="text-align: center;">Best regrads, <br> Jogja Borobudur Tour & Travel</p>
</body>
</html>