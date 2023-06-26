@extends('layouts.dashboard.main')
@section('content')
<div class="add mb-5">
    <h2 class="main-title">Tambah Venue</h2>
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
                        <form action="/superadmin/venue/update/{{$venue->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group mt-3 mb-4">
                                <input type="text" name="venue" value="{{$venue->venue}}" class="w-100 ps-3" placeholder="Nama venue">
                                @if ($errors -> has('venue'))
                                <div class="text-danger">
                                    {{$errors -> first('venue')}}
                                </div>
                                @endif
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