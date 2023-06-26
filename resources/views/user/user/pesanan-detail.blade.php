@extends('layouts.app')
@section('content')
    <style>
        .konten .font .sct{
            font-size: 14px;
            font-weight: 450;
        }
        .konten .font .nma{
        font-size: 30px;
        font-weight: 700;
        }
        .konten .font .jns{
        font-size: 24px;
        font-weight: 700;
        }
        .konten .font .hrg{
        font-size: 24px;
        font-weight: 700;
        }

        .konten .font .btn-pay:hover{
        color: yellow;
        font-weight: 700;
        transition: 300ms;
        background-color: green;
    }
    </style>
    <section class="konten" style="height: 400px;">
            <div class="container h-100">
            <div class="row justify-content-center h-100">
            <div class="col-md-10 my-auto">
                <div class="konten">
                <div class="jumbotron shadow rounded pe-3" style="">
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
                        <div class="act">
                            @if ($order->status == 'unpaid')
                            @if ($order->bukti_bayar == '')
                            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn-pay btn btn-warning ms-auto py-1 px-4 link-light my-auto">bayar</button>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form action="/bayar/{{$order->id}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Pembayaran</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <p class="m-0 p-0">transfer pembayaran ke nomer rekening berikut ini :
                                                        <ul class="m-0">
                                                            <li>
                                                                <strong>
                                                                    BCA : 3161523547
                                                                </strong>
                                                            </li>
                                                            <li>
                                                                <strong>
                                                                    BNI : 0345947738
                                                                </strong>
                                                            </li>
                                                            <li>
                                                                <strong>
                                                                    BRI : 763201007520530
                                                                </strong>
                                                            </li>
                                                        </ul>
                                                    </p>
                                                    <p>pastikan nomor rekening yang anda masukkan benar, setelah itu kirim bukti transfer anda ke form dibawah ini lalu tunggu sampai admin mengkonfirmasi pesanan anda</p>
                                                    <p>Terima Kasih telah menggunakan E-tics</p>
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
                            </div>
                            @else
                            <i class="sct my-auto"><span class="text-danger">*</span> menunggu pembayaran dikonfirmasi <span class="text-danger">*</span></i>
                            @endif
                            @else
                            <div class="d-flex">
                                <a href="/exportpdf/{{$order->id}}" class="btn btn-sm btn-primary me-2 my-auto"><i class="fa-solid fa-print"></i></a>
                                <i class="sct my-auto"><span class="text-danger">*</span> download tiket <span class="text-danger">*</span></i>
                            </div>
                            @endif
                        </div>
                        {{-- <a href="" class="btn btn-warning ms-auto py-1 px-4 link-light my-auto">bayar</a> --}}
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            </div>
    </section>
@endsection