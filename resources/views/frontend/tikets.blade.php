@extends('layouts.app')
@section('content')
<style>
    .jdl-btm{
        font-size: 30px;
        font-weight: 700;
        margin-top: 20px;
        margin-bottom: 40px
    }
    .tkt .detil p{
        font-size: 15px;
        font-weight: 600;
    }
    .tkt .detil .hrg{
        color: orange;
    }
    .tkt .detil .btn{
        font-size: 15px;
        border: none;
        font-weight: 600;
    }
    .tkt .detil .btn:hover{
        color: yellow;
        transition: 300ms;
        background-color: green;
    }
</style>
    <section class="main">
        <div class="container">
            <p class="jdl-btm">List "{{$venue->venue}}" tiket</p>
                <div class="row justify-content-center">
                @foreach ($tikets as $tiket)
                <div class="col-md-6 my-auto">
                    <div class="jumbotron tkt shadow rounded pe-3 my-3" style="background-color: #ffffff;">
                        <div class="row my-auto">
                            <div class="col-6 my-auto">
                                <img src="{{asset('/storage/img/acara/'. $tiket->acara->foto)}}" class="rounded img-fluid w-100" style="height: 165px" alt="">
                            </div>
                            <div class="col-6 my-auto">
                                <div class="detil p-0 m-0 my-1">
                                    <p class="jdl p-0 m-0">{{$tiket->acara->nama_acara}}</p>
                                    <p class="kat p-0 m-0">{{$tiket->venue->venue}} tiket</p>
                                    <p class="jmlh p-0 m-0">stok : {{$tiket->jumlah}}</p>
                                    <div class="act d-flex mt-1">
                                        <p class="hrg p-0 m-0 my-auto">IDR.{{number_format($tiket->harga)}}</p>
                                        {{-- <a href="" class="btn btn-warning ms-auto py-1 px-4 link-light my-auto">purchase</a> --}}
                                        <form action="/pesan/{{$tiket->id}}" method="post" class="ms-auto">
                                            @csrf
                                            <button type="submit" class="btn btn-warning ms-auto py-1 px-4 link-light my-auto">pesan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
        </div>
    </section>
@endsection