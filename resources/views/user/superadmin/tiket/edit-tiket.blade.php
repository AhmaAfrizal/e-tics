@extends('layouts.dashboard.main')
@section('content')
<div class="add mb-4">
    <h2 class="main-title">Tambah Tiket</h2>
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
                        <form action="/superadmin/tiket/update/{{$tiket->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group mt-3 mb-4">
                                <select name="acara_id" id="acara_id" class="form-control text-center py-2" style="background-color: #eff0f6; color:#767676; border:none; font-weight:500;">
                                    <option value="{{$tiket->acara->id}}">{{$tiket->acara->nama_acara}}</option>
                                    @foreach ($acara as $acara)
                                        <option value="{{$acara->id}}">{{$acara->nama_acara}}</option>
                                    @endforeach
                                </select>
                                @if ($errors -> has('acara_id'))
                                <div class="text-danger">
                                    {{$errors -> first('acara_id')}}
                                </div>
                                @endif
                            </div>
                            <div class="form-group my-4">
                                <select name="venue_id" id="venue_id" class="form-control text-center py-2" style="background-color: #eff0f6; color:#767676; border:none; font-weight:500;">
                                    <option value="{{$tiket->venue->id}}">{{$tiket->venue->venue}}</option>
                                    @foreach ($venue as $venue)
                                        <option value="{{$venue->id}}">{{$venue->venue}}</option>
                                    @endforeach
                                </select>
                                @if ($errors -> has('venue_id'))
                                <div class="text-danger">
                                    {{$errors -> first('venue_id')}}
                                </div>
                                @endif
                            </div>
                            <div class="form-group my-4">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" name="harga" value="{{$tiket->harga}}" placeholder="Harga tiket" class="w-100 ps-3">
                                        @if ($errors -> has('harga'))
                                        <div class="text-danger">
                                            {{$errors -> first('harga')}}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="jumlah" value="{{$tiket->jumlah}}" placeholder="Jumlah tiket" class="w-100 ps-3">
                                        @if ($errors -> has('jumlah'))
                                        <div class="text-danger">
                                            {{$errors -> first('jumlah')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-4">
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