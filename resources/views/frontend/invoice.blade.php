<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sarjanait.com</title>
</head>
<body>
    <!-- <img src="{{asset('traveler')}}/images/logo hitam.png" alt="logo"/> -->
    @foreach($body as $item)
    <p>
        Hi {{$item->name}}
    </p>
    @endforeach
    <br>
    <p>
        
    </p>
</body>
</html>