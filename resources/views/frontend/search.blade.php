@extends('layouts.app')
@section('content')
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

<section class="content mt-1 py-4" style="background-color: #f8f4f47e;">
    <div class="container">
        <div class="container">
            <div class="container">
                <div class="content mx-4">
                    <div class="title">
                        <p>Hasil penelusuran "{{request('search')}}"</p>
                    </div>
                    <div class="body mt-4">
                        <div class="row justify-content-center">
                            @foreach ($acara as $acara)    
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
                                                                <p class="tgl card-text ms-auto"><i class="icon me-1 fa-solid fa-calendar-days"></i><strong> {{$acara->tanggal}}</strong></p>
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection