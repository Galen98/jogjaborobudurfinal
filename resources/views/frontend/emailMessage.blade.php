<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</style>
</head>

<body>
<h2 style="text-align:center;">Message from {{ $head['head'] }}</h2>
<br>
@foreach($messages as $item)
<h3>Email:{{$item->email}}</h3>
<h3>Message:{{$item->message}}</h3>
@endforeach
<a href="https://jogjaborobudur.com/message/{{ $link['link'] }}"> 
<button class="awesome-button">Pay now!</button>
</a>
</body>
</html>