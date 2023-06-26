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
                            <form action="/superadmin/addacara" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group my-3">
                                    <input type="text" name="nama_acara" class="w-100 ps-3" placeholder="Nama acara">
                                    @if ($errors -> has('nama_acara'))
                                    <div class="text-danger">
                                        {{$errors -> first('nama_acara')}}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group my-3">
                                    <input type="text" name="tempat" class="w-100 ps-3" placeholder="Tempat">
                                    @if ($errors -> has('tempat'))
                                    <div class="text-danger">
                                        {{$errors -> first('tempat')}}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group my-3">
                                    <input type="date" name="tanggal" class="w-100 ps-3" style="font-weight:500; color: #7b7b7b;">
                                    @if ($errors -> has('tanggal'))
                                    <div class="text-danger">
                                        {{$errors -> first('tanggal')}}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group my-3">
                                    <textarea name="deskripsi" id="konten" rows="3" class="form-control" placeholder="masukkan deskripsi acara..."></textarea>
                                    @if ($errors -> has('deskripsi'))
                                        <div class="text-danger">
                                            {{$errors -> first('deskripsi')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group my-3">
                                    <input class="form-control" type="file" id="formFile" name="foto">
                                    @if ($errors -> has('foto'))
                                    <div class="text-danger">
                                        {{$errors -> first('foto')}}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group mt-3">
                                    <input type="submit" class="btn w-100" style="background-color: #0061f7; font-weight:600; color:#d6d7e3;" value="Tambah acara">
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
                          <input type="checkbox" class="check-all">No
                        </label>
                      </th>
                      <th>Thumbnail</th>
                      <th>Nama acara</th>
                      <th>Tempat</th>
                      <th>Tanggal</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($acaras as $index => $acara)    
                        <tr>
                            <td>
                                <label class="users-table__checkbox">
                                    <input type="checkbox" class="check">
                                        <div class="categories-table-text">
                                            {{$index + $acaras->firstItem()}}
                                        </div>
                                </label>
                            </td>
                            <td>
                                <div class="categories-table-img">
                                    <picture>
                                        <source srcset="{{asset('storage/img/acara/'. $acara->foto)}}" type="image/webp"><img src="{{asset('storage/img/acara'. $acara->foto)}}" alt="category">
                                    </picture>
                                </div>
                            </td>
                            <td>{{$acara->nama_acara}}</td>
                            <td>{{$acara->tempat}}</td>
                            <td>{{$acara->tanggal}}</td>
                            <td>
                                <span class="p-relative">
                                    <button class="dropdown-btn transparent-btn" type="button" title="More info">
                                        <div class="sr-only">More info</div>
                                        <i data-feather="more-horizontal" aria-hidden="true"></i>
                                    </button>
                                    <ul class="users-item-dropdown dropdown">
                                        <li><a href="/superadmin/acara/edit/{{$acara->id}}">Edit</a></li>
                                        <li><a href="/superadmin/dellacara/{{$acara->id}}" onclick="return confirm('Yakin mau hapus, acara {{$acara->nama_acara}} ?')">Hapus</a></li>
                                    </ul>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="d-flex mt-2">
                    <div class="data ms-auto me-5">
                        {{ $acaras->links() }}
                    </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
@endsection