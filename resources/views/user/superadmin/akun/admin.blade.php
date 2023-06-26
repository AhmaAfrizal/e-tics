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
                            <form action="/superadmin/simpan" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group my-3">
                                    <input type="text" name="name" class="w-100 ps-3" placeholder="Username">
                                    @if ($errors -> has('name'))
                                    <div class="text-danger">
                                        {{$errors -> first('name')}}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group my-3">
                                    <input type="email" name="email" class="w-100 ps-3" placeholder="Email">
                                    @if ($errors -> has('email'))
                                    <div class="text-danger">
                                        {{$errors -> first('email')}}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group my-3">
                                    <input type="password" name="password" class="w-100 ps-3" placeholder="Password">
                                    @if ($errors -> has('password'))
                                    <div class="text-danger">
                                        {{$errors -> first('password')}}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group mt-3">
                                    <input type="submit" class="btn w-100" style="background-color: #0061f7; font-weight:600; color:#d6d7e3;" value="simpan">
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
                          <input type="checkbox" class="check-all">Username
                        </label>
                      </th>
                      <th>E-mail</th>
                      <th>Role</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($user as $user)
                        <tr>
                        <td>
                            <label class="users-table__checkbox">
                            <input type="checkbox" class="check">
                            <div class="categories-table-text">
                                {{$user->name}}
                            </div>
                            </label>
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            {{-- <span class="badge-pending">Pending</span> --}}
                            <span class="badge-active">Admin</span>
                        </td>
                        <td>{{$user->created_at->format('Y-m-d')}}</td>
                        <td>
                            <span class="p-relative">
                            <button class="dropdown-btn transparent-btn" type="button" title="More info">
                                <div class="sr-only">More info</div>
                                <i data-feather="more-horizontal" aria-hidden="true"></i>
                            </button>
                            <ul class="users-item-dropdown dropdown">
                                <li><a href="/superadmin/edit/{{$user->id}}">Edit</a></li>
                                {{-- <li><a href="/superadmin/hapus/{{$user->id}}" onclick="return confirm('Yakin mau hapus, {{$user->name}} ?')">Hapus</a></li> --}}
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