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
                        <h3 class="fw-bold mb-3">Tambah Data Pegawai</h3>
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
                            <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Tambah Data Pegawai</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Tambah Data Pegawai</h4>
                                    <a href="{{ route('pegawai') }}" class="btn btn-primary">Kembali</a>
                                </div>
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('pegawai.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="foto" class="form-label">Foto</label>
                                            <input type="file" class="form-control" name="photo" id="foto"
                                                aria-describedby="fileHelpId" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" id="nama"
                                                aria-describedby="helpId" placeholder="Masukkan Nama" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email"
                                                aria-describedby="helpId" placeholder="Masukkan Email" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Telp</label>
                                            <input type="number" class="form-control" value="{{ old('phone') }}" name="phone" maxlength="15"
                                                id="phone" aria-describedby="helpId"
                                                placeholder="Masukkan Nomor Telp" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">Tanggal Lahir</label>
                                            <input type="text" value="{{ old('birthdate') }}" name="birthdate" class="form-control" />
                                            <script>
                                                $(function() {
                                                    $('input[name="birthdate"]').daterangepicker({
                                                        singleDatePicker: true,
                                                        showDropdowns: true,
                                                        minYear: 1901,
                                                        maxYear: parseInt(moment().format('YYYY'), 10)
                                                    }, function(start, end, label) {
                                                        var years = moment().diff(start, 'years');
                                                        alert("Kamu berumur " + years + " tahun!");
                                                    });
                                                });
                                            </script>
                                        </div>

                                        <div class="mb-3">
                                            <label for="address" class="form-label">Alamat</label>
                                            <textarea class="form-control" name="address" id="address" rows="5">{{ old('address') }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="position" class="form-label">Posisi</label>
                                            <select class="form-select" name="position" id="position">
                                                <option selected disabled>Pilih Posisi</option>
                                                <option value="manager" @selected(old('position') == 'manager')>Manager</option>
                                                <option value="administrasi" @selected(old('position') == 'administrasi')>Administrasi</option>
                                                <option value="supervisor" @selected(old('position') == 'supervisor')>Supervisor</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="salary" class="form-label">Gaji</label>
                                            <input type="number" value="{{ old('salary') }}" class="form-control" name="salary" id="salary"
                                                placeholder="Masukkan Gaji Pegawai" />
                                        </div>

                                        <script>
                                            new AutoNumeric('#salary', {
                                                decimalPlaces: 0,
                                                digitGroupSeparator: '.',
                                                decimalCharacter: ',',
                                                unformatOnSubmit: true
                                            });
                                        </script>


                                        <div class="mb-3">
                                            <label for="" class="form-label">Tanggal Bergabung</label>
                                            <input type="text" value="" name="hire_date" class="form-control" />
                                            <script>
                                                $(function() {
                                                    $('#hire_date').val(moment().format('MM/DD/YYYY'));

                                                    $('input[name="hire_date"]').daterangepicker({
                                                        singleDatePicker: true,
                                                        showDropdowns: true,
                                                        minYear: 1901,
                                                        maxYear: parseInt(moment().format('YYYY'), 10),
                                                        maxDate: moment(),
                                                        locale: {
                                                            format: 'MM/DD/YYYY'
                                                        }
                                                    });
                                                });
                                            </script>
                                        </div>

                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-select" name="employment_status" id="status">
                                                <option selected disabled>Pilih Status</option>
                                                <option value="Kontrak" @selected(old('employment_status') == 'Kontrak')>Kontrak</option>
                                                <option value="Tetap" @selected(old('employment_status') == 'Tetap')>Tetap</option>
                                                <option value="Paruh-waktu" @selected(old('employment_status') == 'Paruh-waktu')>Paruh Waktu</option>
                                                <option value="Magang" @selected(old('employment_status') == 'Magang')>Magang</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary form-control">Kirim</button>
                                    </form>
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
