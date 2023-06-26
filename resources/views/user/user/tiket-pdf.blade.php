<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"> --}}
</head>
<body style="font-family: rubik;">
    <div class="container">
        <div class="tiket my-4">
            <div class="card p-4 text-light" style="background-color: #0b0434; border-radius: 14px;">
                <div class="head">
                    <div class="d-flex mb-3 mx-5" style="margin: 0;">
                        <p class="" style="margin:0; font-size: 26px; font-weight: 600; color:#ffffff; font-family: sans-serif;">Tiket Konser</p>
                        <p class="ms-auto" style="margin:0; font-size: 26px; font-weight: 600; color:#ffffff; font-family: sans-serif;">E-tics</p>
                    </div>
                    <hr style="margin:0; height: 2px; color:#ffffff;">
                </div>
                <div class="body">
                    <div class="font mx-5 my-3">
                        <p class="" style="margin: 0; font-size: 22px; font-weight: 600; color:#ffffff; font-family: sans-serif;">id : {{$order->id}}</p>
                        <p class="" style="margin:0; font-size: 52px; font-weight: 700; color:#ffffff; font-family: sans-serif;">{{$order->nama_tiket}}</p>
                        <div class="d-flex" style="margin-top:15px; margin-bottom:15px;">
                            <p class="" style="margin:0; font-size: 24px; font-weight: 600; color:#ffffff; font-family: sans-serif;">{{$order->tiket->acara->tanggal}}</p>
                            <p class="ms-auto" style="margin:0; font-size: 24px; font-weight: 600; color:#ffffff; font-family: sans-serif;">{{$order->venue}} tiket</p>
                        </div>
                        <p class="text-center" style="margin: 0; font-size: 36px; font-weight: 700; color:#ffffff; font-family: sans-serif;">IDR.{{number_format($order->total_price)}},00</p>
                        <div class="d-flex" style="margin-top:15px;">
                            <p class="" style="margin: 0; font-size: 22px; font-weight: 600; color:#ffffff; font-family: sans-serif;">licensed to :</p>
                            <p class="ms-auto" style="margin: 0; font-size: 22px; font-weight: 600; color:#ffffff; font-family: sans-serif;">{{$order->user->name}}</p>
                        </div>
                    </div>
                </div>
                <div class="foot">
                    <hr style="margin: 0; height: 2px; color:#ffffff;">
                    <p class="text-center mt-3" style="margin: 0; font-weight:500; color:#ffffff; font-family: sans-serif;">generate by : e-tics.com</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>