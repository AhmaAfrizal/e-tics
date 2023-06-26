@extends('layouts.app')
@section('content')

<style>
    .submenu .card{
        z-index: 1;
        border:none;
        color:#ffffff;
        background-color: #0b0434;
    }
    .submenu .card .jdl{
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 5px;
    }
    .submenu .card .item .btn{
        width: 150px;
        border:none;
    }


    .submenu .card .scrollmenu {
        display: flex;
        overflow-x: scroll;
        padding-bottom:0px;
        margin: 0;
    }

    ::-webkit-scrollbar {
      width: 0px;
      height: 0px;
    }

    .submenu .card .item .gld{
        background-color: rgba(255, 179, 1, 0.545);
    }
    .submenu .card .item .slvr{
        background-color: rgba(192, 192, 192, 0.612);
    }
    .submenu .card .item .fstvl{
        background-color: rgba(222, 184, 135, 0.649);
    }
    .submenu .card .cari .blok{
        border-radius: 20px;
        border: none;
        background-color: #eff0f6;
        color: #0b0434;
        font-weight: 600;
    }
    .submenu .card .cari .btn{
        background-color: #7848F4;
        border-radius: 50px;
        color: #0b0434;
    }
</style>
<section class="hero">
    <div class="container">
    <section class="carousel">
            <div class="carousel">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" style="border-radius:20px; height:500px;">
                        <div class="carousel-item active">
                        <img src="{{asset('img/sld/sld1.png')}}" class="d-block w-100" alt="slide1">
                        </div>
                        <div class="carousel-item">
                        <img src="{{asset('img/sld/sld2.jpg')}}" class="d-block w-100" alt="slide2">
                        </div>
                        <div class="carousel-item">
                        <img src="{{asset('img/sld/sld3.jpg')}}" class="d-block w-100" alt="slide3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
    </section>
    <section class="submenu" style="margin-top:-50px;">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="card px-4" style="heigh">
                        <div class="card-body">
                            <div class="row h-100">
                                <div class="col-7 my-auto scrollbar">
                                        <p class="jdl">Jenis Tiket</p>
                                        <div class="scrollmenu">
                                            @foreach ($venue as $item)
                                                        <p class="text-center item my-0">
                                                            <a href="/tikets/{{$item->id}}" class="btn me-3
                                                            @if ($item->id % 2 == 0)
                                                                gld
                                                            @elseif ($item->id % 2 == 1)
                                                                slvr
                                                            @else
                                                            @endif
                                                            btn-success">{{$item->venue}}</a>
                                                        </p>
                                            @endforeach
                                        </div>
                                </div>
                                <div class="col-5 my-auto">
                                    <div class="cari ms-3">
                                        <form class="d-flex" action="\search">
                                            <input class="blok form-control me-2 px-3" name="search" value="{{request('search')}}" type="search" placeholder="telusuri acara..." aria-label="Search">
                                            <button class="btn srch rounded-circle" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    </div>
</section>

<style>
    .content .title{
        color: #131315;
        font-size: 34px;
        font-weight: 800;
    }
    .tiket .card:hover{
        background-color: rgba(195, 168, 168, 0.305);
        transition: 700ms;
        -webkit-filter: opacity(85%);
        filter: opacity(85%);
        border: 1px solid rgb(32, 32, 32);
    }
    .font .jdl{
        font-size: 20px;
        margin: 0;
        color: #131315;
        font-weight: 700;
    }
    .font .menu{
        font-size: 14px;
        color: #616161;
        font-weight: 500;
    }
    .font .menu .icon{
        color: #7848F4;
    }
</style>

<section class="content mt-5 py-4" style="background-color: #f8f4f47e;">
    <div class="container">
        <div class="container">
            <div class="container">
                <div class="content mx-4">
                    <div class="title">
                        <p>Acara Terbaru</p>
                    </div>
                    <div class="body mt-4">
                        <div class="row justify-content-center">
                            @foreach ($acaras as $acara)    
                                <div class="col-md-4 col-6 my-3">
                                    <a href="/acara/{{$acara->id}}" class="tiket text-decoration-none link-dark">
                                        <div class="card shadow" style="border:none; height:320px;">
                                            <img src="{{asset('/storage/img/acara/'. $acara->foto)}}" style="height: 180px" class="card-img-top" alt="{{$acara->foto}}">
                                            <div class="card-body p-1 pb-0">
                                                <div class="row h-100">
                                                    <div class="col-12 my-auto">
                                                        <div class="font mx-3 my-2">
                                                            <p class="jdl card-title mb-2 my-0">{{$acara->nama_acara}}</p>
                                                            <div class="menu d-flex mb-3">
                                                                <p class="lok card-text my-0" ><i class="icon me-1 fa-sharp fa-solid fa-location-dot"></i><strong>{{$acara->tempat}}</strong></p>
                                                                <p class="tgl card-text ms-auto"><i class="icon me-1 fa-solid fa-calendar-days"></i><strong> {{date('d M, y', strtotime($acara->tanggal))}}</strong></p>
                                                            </div>
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
                    <div class="d-flex mt-4">
                        <div class="link mx-auto">
                            {{$acaras->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection