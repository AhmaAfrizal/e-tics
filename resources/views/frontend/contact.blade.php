@extends('layouts.app')
@section('content')
<section class=" my-lg-4">
    <div class="container h-custom pb-5 shadow" style="border-radius:20px;">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5 my-auto">
  
          <img src="{{asset('img/sld/contc.png')}}" class="img-fluid"
            alt="Sample image">
  
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 my-auto">
          <form action="/kirim" method="POST">
            @csrf
            <div class="divider text-center my-4">
              <h2  class="fw-bold mb-4" style="font-weight: 700; color:#767676; left:232px;">Contact us</h2>
            </div>
  
            <!-- memasukkan nama -->
            <div class="form-outline mb-3">
              <input type="nama" name="nama" style="background-color:#ebebeb; border-radius: 30px;  font-weight: 600; font-size: 20px; padding-left: 26px; padding-top: 10px; padding-bottom: 10px;" class="form-control form-control-lg"
                placeholder="Nama" />
                @if ($errors -> has('nama'))
                <div class="text-danger">
                    {{$errors -> first('nama')}}
                </div>
                @endif
            </div>
  
            <!-- memasukkan email -->
            <div class="form-outline mb-3">
              <input type="email" name="email" style="background-color:#ebebeb; border-radius: 30px; font-weight: 600; font-size: 20px; padding-left: 26px; padding-top: 10px; padding-bottom: 10px;" class="form-control form-control-lg"
                placeholder="Email" />
                @if ($errors -> has('email'))
                <div class="text-danger">
                    {{$errors -> first('email')}}
                </div>
                @endif
            </div>
            <!-- masukkan pesan -->
            <div class="form-outline mb-2">
              <textarea name="pesan" id="pesan" cols="40" rows="5" style="background-color:#ebebeb; border-radius: 20px;  font-weight: 600; font-size: 20px; padding-left: 26px; padding-top: 19px; padding-bottom: 19px;" class="form-control form-control-lg" placeholder="pesan"></textarea>
              @if ($errors -> has('pesan'))
              <div class="text-danger">
                  {{$errors -> first('pesan')}}
              </div>
              @endif
          </div>
  
            <div class="d-flex justify-content-between align-items-center">
            </div>
            <!-- ini adalah tombol -->
            <div class="text-center text-lg-start mt-2 pt-2">
              <button type="submit" class="btn btn-success btn-lg"
                style="padding-left: 40px; padding-right: 40px; padding-top:7px; padding-bottom: 7px ; border-radius:30px; font-size: 16px; font-weight:600;">Kirim</button>
            </div>
  
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
