@extends('layouts.dashboard.main')
@section('content')
    <div class="add mb-5">
        <h2 class="main-title">Tambah Venue</h2>
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
                            <form action="/superadmin/addvenue" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group mt-3 mb-4">
                                    <input type="text" name="venue" class="w-100 ps-3" placeholder="Nama venue">
                                    @if ($errors -> has('venue'))
                                    <div class="text-danger">
                                        {{$errors -> first('venue')}}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group mt-4">
                                    <input type="submit" class="btn w-100" style="background-color: #0061f7; font-weight:600; color:#d6d7e3;" value="tambah venue">
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
                          <input type="checkbox" class="check-all">Id
                        </label>
                      </th>
                      <th>Nama Venue</th>
                      <th>Tanggal ditambahkan</th>
                      <th>Tanggal dubah</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($venue as $venue)
                    <tr>
                        <td>
                            <label class="users-table__checkbox">
                                <input type="checkbox" class="check">
                                    <div class="categories-table-text">
                                        {{$loop->iteration}}
                                    </div>
                            </label>
                        </td>
                        <td>{{$venue->venue}}</td>
                        <td>{{$venue->created_at->format('Y-m-d')}}</td>
                        <td>{{$venue->updated_at->format('Y-m-d')}}</td>
                        <td>
                            <span class="p-relative">
                                <button class="dropdown-btn transparent-btn" type="button" title="More info">
                                    <div class="sr-only">More info</div>
                                    <i data-feather="more-horizontal" aria-hidden="true"></i>
                                </button>
                                <ul class="users-item-dropdown dropdown">
                                    <li><a href="/superadmin/venue/edit/{{$venue->id}}">Edit</a></li>
                                    <li><a href="/superadmin/dellvenue/{{$venue->id}}" onclick="return confirm('Yakin mau hapus, venue {{$venue->venue}} ?')">Hapus</a></li>
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