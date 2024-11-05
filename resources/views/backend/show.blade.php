@extends('backend.layout.app')
@section('main')

    <div class="wrapper">
        @include('backend.components.sidebar')

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    @include('backend.components.logo')
                </div>
                @include('backend.components.navbar')
            </div>

            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">Detail Data Pegawai</h3>
                        <ul class="breadcrumbs mb-3">
                            <li class="nav-home">
                                <a href="#">
                                    <i class="icon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Pages</a>
                            </li>
                            <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pegawai') }}">Data Pegawai</a>
                            </li>
                            <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Detail Data Pegawai</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Detail Data Pegawai</h4>
                                    <a href="{{ route('pegawai') }}" class="btn btn-primary">Kembali</a>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table">
                                        <tbody>
                                                <tr>
                                                    <th class="w-25">Foto</th>
                                                    <td><img src="{{ Storage::url($pegawai->photo) }}"
                                                        style="width: 20%" alt=""></td>
                                                </tr>
                                                <tr>
                                                    <th class="w-25">Nama</th>
                                                    <td>{{$pegawai->nama}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="w-25">Email</th>
                                                    <td>{{$pegawai->email}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="w-25">Phone</th>
                                                    <td>{{$pegawai->phone}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="w-25">Tanggal Lahir</th>
                                                    <td>{{ Carbon\Carbon::parse($pegawai->birthdate)->format('m/d/Y') }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="w-25">Alamat</th>
                                                    <td>{{$pegawai->address}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="w-25">Posisi</th>
                                                    <td>{{$pegawai->position}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="w-25">Gaji</th>
                                                    <td>{{number_format($pegawai->salary)}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="w-25">Tanggal Bergabung</th>
                                                    <td>{{ Carbon\Carbon::parse($pegawai->hire_date)->format('m/d/Y') }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="w-25">Status</th>
                                                    <td>{{ $pegawai->employment_status }}</td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            @include('backend.components.footer')
        </div>

    </div>




@endsection
