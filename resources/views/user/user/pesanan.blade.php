@extends('layouts.app')
@section('content')
<style>
    .container .txt-head{
        font-size: 28px;
        font-weight: 600;
        margin:0;
    }
    .container .txt-usr{
        font-size: 20px;
        font-weight: 600;
    }
    .tkt .detil{
        font-weight: 600;
    }
    .tkt .detil .hrg{
        color: orange;
    }
    .tiket .tkt:hover{
        background-color: rgba(195, 168, 168, 0.305);
        transition: 700ms;
        -webkit-filter: opacity(85%);
        filter: opacity(85%);
    }
</style>
    <div class="container">
        <div class="text-center mt-2">
            <p class="txt-head">Daftar Transaksi</p>
            <p class="txt-usr">{{Auth::user()->name}}</p>
        </div>
        <div class="row justify-content-center my-4">
            <div class="col-md-10">
                <div class="row justify-content-center">
                    @foreach ($order as $order)
                        <div class="col-md-6 my-auto">
                            <a href="/pesanan/detail/{{$order->id}}" class="tiket text-decoration-none link-dark">
                                <div class="jumbotron tkt shadow rounded pe-3 my-3" style="background-color: #ffffff;">
                                    <div class="row my-auto">
                                        <div class="col-6 my-auto">
                                            <img src="{{asset('/storage/img/acara/'. $order->foto)}}" class="rounded img-fluid w-100" style="height: 140px" alt="">
                                        </div>
                                        <div class="col-6 my-auto">
                                            <div class="detil p-0 m-0 my-1">
                                                <p class="jdl p-0 m-0">{{$order->nama_tiket}}</p>
                                                <p class="kat p-0 m-0">{{$order->venue}} tiket</p>
                                                <div class="act d-flex mt-1">
                                                    <p class="hrg p-0 m-0 my-auto">IDR.{{number_format($order->total_price)}}</p>
                                                    <p class="sts p-0 m-0 my-auto ms-auto">
                                                        @if ($order->status == 'paid')
                                                            <span class="badge bg-success">{{$order->status}}</span>
                                                        @else
                                                        <span class="badge bg-warning text-light">{{$order->status}}</span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection