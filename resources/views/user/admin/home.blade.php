@extends('layouts.dashboard.main')
   
@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    You are Super Admin.
                </div>
            </div>
        </div>
    </div>
</div> --}}

<h2 class="main-title">Dashboard</h2>
        <div class="row stat-cards">
          <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
              <div class="stat-cards-icon primary">
                {{-- <i data-feather="bar-chart-2" aria-hidden="true"></i> --}}
                <i class="fa-solid fa-file"></i>
              </div>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num">{{$acara}}</p>
                <p class="stat-cards-info__title">Acara ditambahkan</p>
              </div>
            </article>
          </div>
          <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
              <div class="stat-cards-icon warning">
                {{-- <i data-feather="file" aria-hidden="true"></i> --}}
                <i class="fa-solid fa-list"></i>
              </div>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num">{{$matiket}}</p>
                <p class="stat-cards-info__title">Tiket ditambahkan</p>
              </div>
            </article>
          </div>
          <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
              <div class="stat-cards-icon purple">
                {{-- <i data-feather="file" aria-hidden="true"></i> --}}
                <i class="fa-solid fa-ticket"></i>
              </div>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num">{{$tiket}}</p>
                <p class="stat-cards-info__title">Total tiket</p>
              </div>
            </article>
          </div>
          {{-- <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
              <div class="stat-cards-icon success">
                <i class="fa-solid fa-rupiah-sign"></i>
              </div>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num">Rp.{{number_format($order)}}</p>
                <p class="stat-cards-info__title">Total pendapatan</p>
              </div>
            </article>
          </div> --}}
        </div>
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
                  @foreach ($acaras as $acara)    
                      <tr>
                          <td>
                              <label class="users-table__checkbox">
                                  <input type="checkbox" class="check">
                                      <div class="categories-table-text">
                                          {{$loop->iteration}}
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
                                    <li><a href="/admin/acaraa/edit/{{$acara->id}}">Edit</a></li>
                                    <li><a href="/admin/dellacara/{{$acara->id}}" onclick="return confirm('Yakin mau hapus, acara {{$acara->nama_acara}} ?')">Hapus</a></li>
                                  </ul>
                              </span>
                          </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
      </div>
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
                                    <li><a href="/admin/tiketa/edit/{{$tiket->id}}">Edit</a></li>
                                    <li><a href="/admin/delltiket/{{$tiket->id}}" onclick="return confirm('Yakin mau hapus, tiket {{$tiket->acara->nama_acara}} ?')">Hapus</a></li>
                                </ul>
                            </span>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
@endsection