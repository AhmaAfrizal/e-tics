@extends('layouts.dashboard.main')
@section('content')
<div class="add mb-5">
    <h2 class="main-title">Tambah Acara</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="border: none">
                <div class="card-body">
                    <div class="head">
                        <div class="text-center">
                            <p style="font-weight:700; font-size:20px;">Tambah Data</p>
                        </div>
                    </div>
                    <div class="body">
                        <form action="/superadmin/acara/update/{{$acara->id}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group my-3">
                                <input type="text" name="nama_acara" value="{{$acara->nama_acara}}" class="w-100 ps-3" placeholder="Nama acara">
                                @if ($errors -> has('nama_acara'))
                                <div class="text-danger">
                                    {{$errors -> first('nama_acara')}}
                                </div>
                                @endif
                            </div>
                            <div class="form-group my-3">
                                <input type="text" name="tempat" value="{{$acara->tempat}}" class="w-100 ps-3" placeholder="Tempat">
                                @if ($errors -> has('tempat'))
                                <div class="text-danger">
                                    {{$errors -> first('tempat')}}
                                </div>
                                @endif
                            </div>
                            <div class="form-group my-3">
                                <input type="date" name="tanggal" value="{{$acara->tanggal}}" class="w-100 ps-3" style="font-weight:500; color: #d6d7e3;">
                                @if ($errors -> has('tanggal'))
                                <div class="text-danger">
                                    {{$errors -> first('tanggal')}}
                                </div>
                                @endif
                            </div>
                            <div class="form-group my-3">
                                <textarea name="deskripsi" id="konten" rows="3" class="form-control" placeholder="masukkan deskripsi acara...">{!!$acara->deskripsi!!}</textarea>
                                @if ($errors -> has('deskripsi'))
                                    <div class="text-danger">
                                        {{$errors -> first('deskripsi')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group my-3">
                                <input class="form-control" value="{{$acara->foto}}" type="file" id="formFile" name="foto">
                                @if ($errors -> has('foto'))
                                <div class="text-danger">
                                    {{$errors -> first('foto')}}
                                </div>
                                @endif
                            </div>
                            <div class="form-group mt-3">
                                <input type="submit" class="btn w-100" style="background-color: #0061f7; font-weight:600; color:#d6d7e3;" value="simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection