@extends('layouts.app')
@section('content')
<style>
    .hero{
        border-radius: 20px;
        height: 550px;
        background-image: linear-gradient(rgba(0, 0, 0, 0.615), rgba(0, 0, 0, 0.746)), url({{ URL::asset('/storage/img/acara/'. $acara->foto) }});
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }

    .hero .link{
        font-size: 20px;
    }
    .hero .link a:hover .icon{
        color: #7848F4;
        transition: 300ms;
    }

    .hero .font .jdl{
        font-size: 36px;
        font-weight: 700;
    }
    .hero .font .tmpt{
        font-size: 15px;
        font-weight: 500;
    }
    .hero .font .tgl{
        font-size: 15px;
        font-weight: 500;
    }
    .hero .font .icon{
        color: #7848F4;
    }

    .tiket .card:hover{
        background-color: rgba(195, 168, 168, 0.305);
        transition: 700ms;
        -webkit-filter: opacity(85%);
        filter: opacity(85%);
        border: 1px solid rgb(32, 32, 32);
    }
    
    .card .font .jdl{
        font-size: 20px;
        margin: 0;
        color: #131315;
        font-weight: 700;
    }
    .card .font .menu{
        font-size: 14px;
        color: #616161;
        font-weight: 500;
    }
    .card .font .menu .icon{
        color: #7848F4;
    }

    .content .isi .jdl-top{
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 40px
    }
    .content .isi .jdl-btm{
        font-size: 28px;
        font-weight: 700;
        margin-top: 20px;
        margin-bottom: 40px
    }
    .content .isi .tkt .detil p{
        font-size: 15px;
        font-weight: 600;
    }
    .content .isi .tkt .detil .hrg{
        color: orange;
    }
    .content .isi .tkt .detil .btn{
        font-size: 15px;
        border: none;
        font-weight: 600;
    }
    .content .isi .tkt .detil .btn:hover{
        color: yellow;
        transition: 300ms;
        background-color: green;
    }
</style>

<div class="container">
    <section class="hero py-5 px-5">
        <div class="container h-100">
            <p class="link"><a href="{{ url()->previous() }}" class="text-decoration-none link-light"><i class="icon fa-solid fa-arrow-left me-1"></i><span class="l">kembali</span></a></p>
            <div class="row h-100 justify-content-between">
                <div class="col-6 my-auto">
                    <div class="font">
                        <p class="jdl my-auto" style="color: #ffffff;">{{$acara->nama_acara}}</p>
                        <hr style="color:#ffffff; height:2px;">
                        <div class="d-flex">
                            <p class="tmpt my-auto" style="color: #ffffff;"><i class="icon me-2 fa-sharp fa-solid fa-location-dot"></i>{{$acara->tempat}}</p>
                            <p class="tgl my-auto ms-auto" style="color: #ffffff;"><i class="icon me-2 fa-solid fa-calendar-days"></i>{{date('d M, y' , strtotime($acara->tanggal))}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-3 me-4 mt-5">
                    <p class="tmpt" style="color: #ffffff">Venue</p>
                    <img src="{{asset('img/sld/venue.jpg')}}" class="img-fluid rounded opacity-50" alt="venue">
                </div>
            </div>
        </div>
    </section>
</div>

    <section class="content my-5 py-5" style="background-color: #f8f4f47e; ">
        <div class="container px-4">
            <div class="isi mx-5">
                <div class="row">
                    <div class="col-7">
                        <p class="jdl-top">Deskripsi</p>
                        <div class="deskripsi">
                            {!!$acara->deskripsi!!}
                        </div>
                        <hr>
                        <p class="jdl-btm">Kategori tiket</p>
                            @foreach ($tiket as $tiket)
                                    <div class="jumbotron tkt shadow rounded pe-3 my-3" style="background-color: #ffffff;">
                                        <div class="row my-auto">
                                            <div class="col-5 my-auto">
                                                <img src="{{asset('/storage/img/acara/'. $tiket->acara->foto)}}" class="rounded img-fluid w-100" style="height: 130px" alt="">
                                            </div>
                                            <div class="col-7 my-auto">
                                                <div class="detil p-0 m-0 my-1">
                                                    <p class="jdl p-0 m-0">{{$tiket->acara->nama_acara}}</p>
                                                    <p class="kat p-0 m-0">{{$tiket->venue->venue}} tiket</p>
                                                    @if ($tiket->jumlah == 0)     
                                                        <p class="jmlh p-0 m-0">stok : Habis</p>
                                                    @else
                                                        <p class="jmlh p-0 m-0">stok : {{$tiket->jumlah}}</p>
                                                    @endif
                                                    <div class="act d-flex mt-1">
                                                        <p class="hrg p-0 m-0 my-auto">IDR.{{number_format($tiket->harga)}}</p>
                                                        {{-- <a href="" class="btn btn-warning ms-auto py-1 px-4 link-light my-auto">purchase</a> --}}
                                                        @if ($tiket->jumlah == 0)
                                                            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-warning ms-auto py-1 px-4 link-light ms-auto my-auto">habis</button>
                                                            {{-- modal --}}
                                                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                            <h5 class="modal-title" id="staticBackdropLabel">oops!!</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="container">
                                                                                    <div class="text-center">
                                                                                        <p>
                                                                                            "maaf tiket ini sudah habis terjual"
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                            <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-primary">Close</button>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        @else    
                                                            <form action="/pesan/{{$tiket->id}}" method="post" class="ms-auto">
                                                                @csrf
                                                                <button type="submit" class="btn btn-warning ms-auto py-1 px-4 link-light my-auto">pesan</button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                    </div>
                    <div class="col-4 offset-1">
                        <p class="jdl-top">Acara lain</p>
                        @foreach ($allacara as $acara)    
                                    <a href="/acara/{{$acara->id}}" class="tiket text-decoration-none link-dark">
                                        <div class="card my-3 shadow" style="border:none; height:320px;">
                                            <img src="{{asset('/storage/img/acara/'. $acara->foto)}}" style="height: 180px" class="card-img-top" alt="{{$acara->foto}}">
                                            <div class="card-body p-1 pb-0">
                                                <div class="row h-100">
                                                    <div class="col-12 my-auto">
                                                        <div class="font mx-3 my-2">
                                                            <p class="jdl card-title mb-2 my-0">{{$acara->nama_acara}}</p>
                                                            <div class="menu d-flex mb-3">
                                                                <p class="lok card-text my-0" ><i class="icon me-1 fa-sharp fa-solid fa-location-dot"></i><strong>{{$acara->tempat}}</strong></p>
                                                                <p class="tgl card-text ms-auto"><i class="icon me-1 fa-solid fa-calendar-days"></i><strong> {{date('d M, y',strtotime($acara->tanggal))}}</strong></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <h1>{{$acara->nama_acara}}</h1>
    @foreach ($allacara as $acara)
    <h1>{{$acara->nama_acara}}</h1>
    @endforeach
    @foreach ($tiket as $tiket)
    <h1>{{$tiket->venue->venue}}</h1>
    @endforeach --}}
@endsection