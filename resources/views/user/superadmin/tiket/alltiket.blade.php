@extends('layouts.dashboard.main')
@section('content')
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