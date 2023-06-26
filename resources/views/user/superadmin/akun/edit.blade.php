@extends('layouts.dashboard.main')
@section('content')
<div class="add mb-4">
    <h2 class="main-title">Tambah Admin</h2>
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
                        <form action="/superadmin/update/{{$user->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group my-3">
                                <input type="text" name="name" class="w-100 ps-3" value="{{$user->name}}">
                                @if ($errors -> has('name'))
                                <div class="text-danger">
                                    {{$errors -> first('name')}}
                                </div>
                                @endif
                            </div>
                            <div class="form-group my-3">
                                <input type="email" name="email" class="w-100 ps-3" value="{{$user->email}}">
                                @if ($errors -> has('email'))
                                <div class="text-danger">
                                    {{$errors -> first('email')}}
                                </div>
                                @endif
                            </div>
                            <div class="form-group my-3">
                                <input type="password" name="password" class="w-100 ps-3" value="{{$user->password}}">
                                @if ($errors -> has('password'))
                                <div class="text-danger">
                                    {{$errors -> first('password')}}
                                </div>
                                @endif
                            </div>
                            <div class="form-group mt-3">
                                <input type="submit" class="btn w-100" style="background-color: #0061f7; font-weight:600; color:#d6d7e3;" value="simpan">
                                <a href="{{asset('superadmin/home')}}" class="btn w-100 mt-2" style="background-color: #0061f7; color: #d6d7e3; font-weight:600;">kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection