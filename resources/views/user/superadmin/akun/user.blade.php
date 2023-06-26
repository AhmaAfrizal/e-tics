@extends('layouts.dashboard.main')
@section('content')
        <h2 class="main-title">Data Pengguna</h2>
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
                            <span class="badge-success">Pengguna</span>
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
                                <li><a href="/superadmin/hapus/{{$user->id}}" onclick="return confirm('Yakin mau hapus, {{$user->name}} ?')">Hapus</a></li>
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