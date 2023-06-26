@extends('layouts.dashboard.main')
@section('content')
    <div class="data">
        <h2 class="main-title">Tiket Terjual</h2>
        <div class="row">
            <div class="col-lg-12">
              <div class="users-table table-wrapper">
                <table class="posts-table">
                  <thead>
                    <tr class="users-table-info">
                      <th>
                        <label class="users-table__checkbox ms-20">
                          <input type="checkbox" class="check-all">no
                        </label>
                      </th>
                      <th>Nama Pembeli</th>
                      <th>Tiket</th>
                      <th>Venue</th>
                      <th>Total harga</th>
                      <th>status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($porder as $index => $order)
                        <tr>
                            <td>
                                <label class="users-table__checkbox">
                                    <input type="checkbox" class="check">
                                    <div class="categories-table-text">
                                        {{$index + $porder->firstItem()}}
                                    </div>
                                </label>
                            </td>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->nama_tiket}}</td>
                            <td>
                                <span 
                                @if ($order->venue == 'gold')
                                    class="badge-pending"
                                @elseif ($order->venue == 'silver')
                                    class="badge-active"
                                @else
                                    class="badge-success"
                                @endif
                                >
                                    {{$order->venue}}
                                </span>
                            </td>
                            <td>Rp.{{number_format($order->total_price)}}</td>
                            <td>
                                <span 
                                @if ($order->status == 'unpaid')
                                    class="badge-pending"
                                @elseif ($order->status == 'paid')
                                    class="badge-success"
                                @endif
                                >
                                    {{$order->status}}
                                </span>
                            </td>
                            <td>
                                <span class="p-relative">
                                    <button class="dropdown-btn transparent-btn" type="button" title="More info">
                                        <div class="sr-only">More info</div>
                                        <i data-feather="more-horizontal" aria-hidden="true"></i>
                                    </button>
                                    <ul class="users-item-dropdown dropdown">
                                        {{-- <li><a href="/superadmin/tiket/edit/{{$tiket->id}}">Edit</a></li>
                                        <li><a href="/superadmin/delltiket/{{$tiket->id}}" onclick="return confirm('Yakin mau hapus, tiket {{$tiket->acara->nama_acara}} ?')">Hapus</a></li> --}}
                                        <li><a href="/superadmin/dellorder/{{$order->id}}" onclick="return confirm('Yakin mau hapus, pesanan {{$order->user->name}} ?')">Hapus</a></li>
                                    </ul>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="d-flex mt-2">
                  <div class="data ms-auto me-5">
                    {{$porder->links()}}
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="data mt-4">
        <h2 class="main-title">Tiket belum dikonfirmasi</h2>
        <div class="row">
            <div class="col-lg-12">
              <div class="users-table table-wrapper">
                <table class="posts-table">
                  <thead>
                    <tr class="users-table-info">
                      <th>
                        <label class="users-table__checkbox ms-20">
                          <input type="checkbox" class="check-all">no
                        </label>
                      </th>
                      <th>Nama Pembeli</th>
                      <th>Tiket</th>
                      <th>Pay</th>
                      <th>Venue</th>
                      <th>Total harga</th>
                      <th>status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($unporder as $order)
                        <tr>
                            <td>
                                <label class="users-table__checkbox">
                                    <input type="checkbox" class="check">
                                    <div class="categories-table-text">
                                        {{$loop->iteration}}
                                    </div>
                                </label>
                            </td>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->nama_tiket}}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" data-bs-toggle="collapse" href="#collapse{{ $order->id }}qr" role="button" aria-expanded="false" aria-controls="collapse{{ $order->id }}qr">
                                  lihat
                                </a>
                                <div class="collapse collapse-horizontal" id="collapse{{ $order->id }}qr">
                                  <div class="card card-body">
                                    <div class="categories-table-img">
                                            <picture>
                                              <source srcset="{{asset('storage/img/bayar/'. $order->bukti_bayar)}}"type="image"><img class="h-100 mx-auto" style="width: 500px" src="{{asset('storage/img/bayar/'. $order->bukti_bayar)}}" alt="category">
                                            </picture>
                                          </div>
                                      </div>
                                    </div>
                            </td>
                            <td>
                                <span 
                                @if ($order->venue == 'gold')
                                    class="badge-pending"
                                @elseif ($order->venue == 'silver')
                                    class="badge-active"
                                @else
                                    class="badge-success"
                                @endif
                                >
                                    {{$order->tiket->venue->venue}}
                                </span>
                            </td>
                            <td>Rp.{{number_format($order->total_price)}}</td>
                            <td>
                                <span 
                                @if ($order->status == 'unpaid')
                                    class="badge-pending"
                                @elseif ($order->status == 'paid')
                                    class="badge-success"
                                @endif
                                >
                                    {{$order->status}}
                                </span>
                            </td>
                            <td>
                                <span class="p-relative">
                                    <button class="dropdown-btn transparent-btn" type="button" title="More info">
                                        <div class="sr-only">More info</div>
                                        <i data-feather="more-horizontal" aria-hidden="true"></i>
                                    </button>
                                    <ul class="users-item-dropdown dropdown">
                                        {{-- <li><a href="/superadmin/tiket/edit/{{$tiket->id}}">Edit</a></li>
                                        <li><a href="/superadmin/delltiket/{{$tiket->id}}" onclick="return confirm('Yakin mau hapus, tiket {{$tiket->acara->nama_acara}} ?')">Hapus</a></li> --}}
                                        <li>
                                        {{-- <form action="/superadmin/konfirmasi/{{$order->id}}" method="post">
                                        @csrf
                                        </form> --}}
                                        <a href="/superadmin/konfirmasi/{{$order->id}}">Konfirmasi</a>
                                        </li>
                                        <li><a href="/superadmin/dellorder/{{$order->id}}" onclick="return confirm('Yakin mau hapus, pesanan {{$order->user->nama}} ?')">Hapus</a></li>
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
    </div>
@endsection
