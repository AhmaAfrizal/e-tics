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
                            <form action="/superadmin/addtiket" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group mt-3 mb-4">
                                    <select name="acara_id" id="acara_id" class="form-control text-center py-2" style="background-color: #eff0f6; color:#767676; border:none; font-weight:500;">
                                        <option value="">--- Pilih Acara ---</option>
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
                                        <option value="">--- Pilih Jenis ---</option>
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
                                            <input type="number" min="1" name="harga" placeholder="Harga tiket" class="w-100 ps-3">
                                            @if ($errors -> has('harga'))
                                            <div class="text-danger">
                                                {{$errors -> first('harga')}}
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-6">
                                            <input type="number" min="1" name="jumlah" placeholder="Jumlah tiket" class="w-100 ps-3">
                                            @if ($errors -> has('jumlah'))
                                            <div class="text-danger">
                                                {{$errors -> first('jumlah')}}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <input type="submit" class="btn w-100" style="background-color: #0061f7; font-weight:600; color:#d6d7e3;" value="tambah tiket">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="data">
        <h2 class="main-title">Data</h2>
        <div class="row">
            <div class="col-lg-12">
              <div class="users-table table-wrapper">
                <table class="posts-table">
                  <thead>
                    <tr class="users-table-info">
                      <th>
                        <label class="users-table__checkbox ms-20">
                          <input type="checkbox" class="check-all">Event
                        </label>
                      </th>
                      <th>Venue</th>
                      <th>Harga</th>
                      <th>Waktu acara</th>
                      <th>Jumlah</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($tikets as $tiket)
                        <tr>
                            <td>
                                <label class="users-table__checkbox">
                                    <input type="checkbox" class="check">
                                    <div class="categories-table-text">
                                        {{$tiket->acara->nama_acara}}
                                    </div>
                                </label>
                            </td>
                            <td>
                                <span 
                                @if ($tiket->venue->venue == 'gold')
                                    class="badge-pending"
                                @elseif ($tiket->venue->venue == 'silver')
                                    class="badge-active"
                                @else
                                    class="badge-success"
                                @endif
                                >
                                    {{$tiket->venue->venue}}
                                </span>
                            </td>
                            <td>Rp.{{number_format($tiket->harga)}}</td>
                            <td>{{$tiket->acara->tanggal}}</td>
                            <td>{{$tiket->jumlah}}</td>
                            <td>
                                <span class="p-relative">
                                    <button class="dropdown-btn transparent-btn" type="button" title="More info">
                                        <div class="sr-only">More info</div>
                                        <i data-feather="more-horizontal" aria-hidden="true"></i>
                                    </button>
                                    <ul class="users-item-dropdown dropdown">
                                        <li><a href="/superadmin/tiket/edit/{{$tiket->id}}">Edit</a></li>
                                        <li><a href="/superadmin/delltiket/{{$tiket->id}}" onclick="return confirm('Yakin mau hapus, tiket {{$tiket->acara->nama_acara}} ?')">Hapus</a></li>
                                    </ul>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="d-flex mt-2">
                    <div class="data ms-auto me-5">
                      {{$tikets->links()}}
                    </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
@endsection