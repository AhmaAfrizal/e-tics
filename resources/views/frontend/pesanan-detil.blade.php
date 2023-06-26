@extends('layouts.app')
@section('content')
    <style>
        .konten .font{
        font-weight: 700;
        }
        .konten .font .nma{
        font-size: 30px;
        }
        .konten .font .jns{
        font-size: 24px;
        }
        .konten .font .hrg{
        font-size: 24px;
        }

        .konten .font .btn-pay:hover{
        color: yellow;
        transition: 300ms;
        background-color: green;
    }
    </style>
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-10">
        <div class="konten">
        <div class="jumbotron shadow rounded my-5" style="">
            <div class="row">
            <div class="col-6">
                <img src="{{asset('/storage/img/acara/'. $order->foto)}}" class="img-fluid rounded w-100" style="height: 320px" alt="">
            </div>
            <div class="col-6 my-auto">
                <div class="font">
                <p class="nma">{{$order->nama_tiket}}</p>
                <p class="jns">{{$order->venue}} tiket</p>
                <p class="hrg">Rp.{{number_format($order->total_price)}}</p>
                    <!-- Button trigger modal -->
                        {{-- <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn-pay btn btn-warning ms-auto py-1 px-4 link-light my-auto">bayar</button>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form action="/bayar/{{$order->id}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Kirim bukti bayar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="form-group my-3">
                                                        <input class="form-control" value="{{$order->bukti_bayar}}" type="file" id="formFile" name="bukti_bayar">
                                                        @if ($errors -> has('bukti_bayar'))
                                                        <div class="text-danger">
                                                            {{$errors -> first('bukti_bayar')}}
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-sm btn-success">kirim</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}
                        <a href="/pesanans" class="btn btn-success ms-auto py-1 px-4 link-light my-auto"><i class="fa-solid fa-cart-shopping"></i></a>
                        <a href="{{ url()->previous() }}" class="btn btn-primary ms-auto py-1 px-4 link-light my-auto">kembali</a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    </div>
@endsection