@extends('layouts.dashboard.main')
@section('content')
<div class="data">
    <h2 class="main-title">Coments</h2>
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
                  <th>Pengirim</th>
                  <th>e-mail</th>
                  <th>Ditulis pada</th>
                  <th>Coment</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($comentss as $index => $coments)
                    <tr>
                    <td>
                        <label class="users-table__checkbox">
                        <input type="checkbox" class="check">
                        <div class="categories-table-text">
                            <p>{{$index + $comentss->firstItem()}}</p>
                        </div>
                        </label>
                    </td>
                    <td>
                        {{$coments->user->name}}
                    </td>
                    <td>
                        {{$coments->user->email}}
                    </td>
                    <td>{{$coments->created_at->format('Y-m-d')}}</td>
                    <td>
                        <p>
                            <a class="btn btn-sm btn-primary" type="button" href="#staticBackdrop{{$coments->id}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$coments->id}}" aria-expanded="false" aria-controls="staticBackdrop{{$coments->id}}">
                            lihat
                            </a>
                        </p>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop{{$coments->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <p style="font-size: 19px" class="my-3">Nama : {{$coments->nama}}</p>
                                    <p style="font-size: 19px" class="my-3">Email : {{$coments->email}}</p>
                                    <p style="font-size: 19px" class="mt-3">Pesan :</p>
                                    <p style="font-size: 19px" class="mt-2">{{$coments->pesan}}</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">tutup</button>
                                    {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
                                    </div>
                                </div>
                                </div>
                            </div>
                    </td>
                    <td>
                        <span class="p-relative">
                        <button class="dropdown-btn transparent-btn" type="button" title="More info">
                            <div class="sr-only">More info</div>
                            <i data-feather="more-horizontal" aria-hidden="true"></i>
                        </button>
                        <ul class="users-item-dropdown dropdown">
                            <li><a href="hapuscom/{{$coments->id}}" onclick="return confirm('Yakin mau hapus, komentar {{$coments->user->name}} ?')">hapus</a></li>
                        </ul>
                        </span>
                    </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
            <div class="d-flex mt-2">
              <div class="data ms-auto me-5">
                {{$comentss->links()}}
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection