<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coba payment paypal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        html,
        body {
        height: 100%
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
<div class="h-100 d-flex align-items-center justify-content-center">
<div class="">
<h2 class="mb-5 fw-bold">Coba Bayar Pakai Paypal JIBITI Tour</h2>
<form action="{{route('payment')}}" method="post">
    @csrf
    <div class="mb-3">
    <select name="currency" id="currency" class="form-control">
        <option value="">Pilih currency IDR MYR no support</option>
        <option value="MYR">MYR</option>
        <option value="USD">USD</option>
        <option value="EUR">EUR</option>
        <option value="SGD">SGD</option>
    </select>
    </div>

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Input amount</label>
    <input type="number" name="amount" class="form-control" id="amount">
    </div>

<span class="price"></span>
<div class="mb-3">
<button type="submit" class="mt-3 btn btn-dark rounded-pill">Bayar</button>
</div>
</form>

<p><b>Akun untuk testing:</b></p>
<p>email: <b>sb-o2pyp29020005@personal.example.com</b></p>
<p>password: <b>$v!s@M{7</b></p>

<p>expected real alur: customer isi data booking, dikasih pilihan manual transfer or via paypal,<br> kalau pilih paypal otomatis redirect ke
halaman paypal dan data berhasil atau tidak nanti terintegrasi dgn data bookings.</p>

@if($dataPay->isEmpty())
<p></p>
@else
<div class="mt-4">
Data pembayaran 
<table class="table">
    <thead>
        <th>id_trans</th>
        <th>id_payer</th>
        <th>email</th>
        <th>total</th>
        <th>currency</th>
        <th>status</th>
    </thead>
    <tbody>
        @foreach($dataPay as $item)
        <tr style="font-size:12px;">
            <td>{{$item->payment_id}}</td>
            <td>{{$item->payer_id}}</td>
            <td>{{$item->payer_email}}</td>
            <td>{{$item->amount}}</td>
            <td>{{$item->currency}}</td>
            <td>{{$item->payment_status}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<p>Sebenere data masih banyak tapi sek tak ambil sek penting2 aja</p>
</div>
@endif
</div>
</div>
<script>
    $(document).ready(function() {
        $('#amount, #currency').on('input', function() {
        var amount = $('#amount').val();
        var currency = $('#currency').val();
        var totalPrice = amount + ' ' + currency;
        $('.price').text(totalPrice);
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>