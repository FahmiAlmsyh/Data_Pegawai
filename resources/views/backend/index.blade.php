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
                        <h3 class="fw-bold mb-3">Data Pegawai</h3>
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
                                <a href="#">Data Pegawai</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Data Pegawai</h4>
                                    <a href="{{ route('pegawai.create') }}" class="btn btn-primary">Tambah Data</a>
                                </div>
                                <div class="card-body">
                                    @session('success')
                                        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                                            <strong>{{ session()->get('success') }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endsession
                                    <div class="table" style="overflow-x: auto;">
                                        <table id="multi-filter-select" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Foto</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Telp</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Alamat</th>
                                                    <th>Posisi</th>
                                                    <th>Gaji</th>
                                                    <th>Tanggal Bergabung</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Foto</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Telp</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Alamat</th>
                                                    <th>Posisi</th>
                                                    <th>Gaji</th>
                                                    <th>Tanggal Bergabung</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @forelse ($pegawai as $p)
                                                    <tr>
                                                        <td>
                                                            <div class="avatar">
                                                                <img src="{{ asset('storage/' . $p->photo) }}"
                                                                    alt="Foto Pegawai" class="avatar-img rounded-circle">
                                                            </div>
                                                        </td>
                                                        <td>{{ $p->nama }}</td>
                                                        <td>{{ $p->email }}</td>
                                                        <td>{{ $p->phone }}</td>
                                                        <td>{{ Carbon\Carbon::parse($p->birthdate)->format('m/d/Y') }}</td>
                                                        <td>{{ Str::limit($p->address, 10, '...') }}</td>
                                                        <td>{{ $p->position }}</td>
                                                        <td>{{ number_format($p->salary) }}</td>
                                                        <td>{{ Carbon\Carbon::parse($p->hire_date)->format('m/d/Y') }}</td>
                                                        <td>{{ $p->employment_status }}</td>
                                                        <td>
                                                            <div class="d-flex gap-1">
                                                                <a href="{{ route('pegawai.show', $p->id) }}" class="btn btn-info"><i
                                                                        class="fas fa-info-circle"></i>
                                                                </a>
                                                                <a href="{{ route('pegawai.edit', $p->id) }}"
                                                                    class="btn btn-warning"><i
                                                                        class="fas fa-pencil-alt text-white"></i>
                                                                </a>
                                                                <form action="{{ route('pegawai.destroy', $p->id) }}"
                                                                    method="POST" style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <button type="submit" class="btn btn-danger text-white"
                                                                        onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="11" class="text-center">
                                                            <span class="text-secondary fw-bold">Data Kosong</span>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

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
