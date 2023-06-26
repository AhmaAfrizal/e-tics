@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          informasi pengguna
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-3 col-4">
              <img
                class="img-team rounded-circle shadow-1-strong ms-lg-5 me-3 img-fluid"
                src="{{asset('img/avatar/avatar-illustrated-02.png')}}"
                alt="avatar"
                style="border: 1px solid grey;"
              />
            </div>
            <div class="col-lg-6 col-8 my-auto">
              <p class="mt-3 ms-lg-5" style="font-size: 20px; margin:0;"><strong>{{ Auth::user()->name }}</strong></p>
              <p class="ms-lg-5 mt-2" style="font-size: 19px;">{{ Auth::user()->email }}</p>
            </div>
          </div>
          <hr class="style1 mt-3"/>
          <p class="text-center" style="margin:0; font-size:16px; font-weight:500;">E-tics : User {{Auth::user()->id}}</p>
        </div>
      </div>
    </div>
    </div>
  </div>
@endsection