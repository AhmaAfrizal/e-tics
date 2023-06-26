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
                          <input type="checkbox" class="check-all">No
                        </label>
                      </th>
                      <th>Thumbnail</th>
                      <th>Author</th>
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
                            <td>
                                @if (auth()->user()->id == $acara->user_id)
                                    me
                                @else
                                    {{$acara->user->name}}
                                @endif
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