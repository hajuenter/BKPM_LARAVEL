@extends('backend.layouts.template')

@section('content-admin')
    <div class="pagetitle">
        <h1>Pendidikan Page</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a>Home</a></li>
                <li class="breadcrumb-item"><a>Riwayat Hidup</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pendidikan.backend') }}">Pendidikan</a></li>
                <li class="breadcrumb-item active">Edit Pendidikan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Pendidikan Form</h5>

                        <form action="{{ route('update.pendidikan', $pendidikan->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Nama -->
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" value="{{ old('nama', $pendidikan->nama) }}" required>
                                    @if ($errors->has('nama'))
                                        <div class="text-danger mt-1">{{ $errors->first('nama') }}</div>
                                    @endif
                                </div>
                            </div>

                            <!-- Tingkatan -->
                            <div class="row mb-3">
                                <label for="tingkatan" class="col-sm-2 col-form-label">Tingkatan</label>
                                <div class="col-sm-10">
                                    <select class="form-control @error('tingkatan') is-invalid @enderror" id="tingkatan"
                                        name="tingkatan" required>
                                        <option value="" disabled>Pilih Tingkatan</option>
                                        @php
                                            $tingkatanList = [
                                                1 => 'TK',
                                                2 => 'SD',
                                                3 => 'SMP',
                                                4 => 'SMA/SMK',
                                                5 => 'D3',
                                                6 => 'D4/S1',
                                                7 => 'S2',
                                                8 => 'S3',
                                            ];
                                        @endphp
                                        @foreach ($tingkatanList as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('tingkatan', $pendidikan->tingkatan) == $key ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('tingkatan'))
                                        <div class="text-danger mt-1">{{ $errors->first('tingkatan') }}</div>
                                    @endif
                                </div>
                            </div>

                            <!-- Tahun Masuk -->
                            <div class="row mb-3">
                                <label for="tahun_masuk" class="col-sm-2 col-form-label">Tahun Masuk</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('tahun_masuk') is-invalid @enderror"
                                        id="tahun_masuk" name="tahun_masuk"
                                        value="{{ old('tahun_masuk', $pendidikan->tahun_masuk) }}" required min="1900"
                                        max="{{ date('Y') }}">
                                    @if ($errors->has('tahun_masuk'))
                                        <div class="text-danger mt-1">{{ $errors->first('tahun_masuk') }}</div>
                                    @endif
                                </div>
                            </div>

                            <!-- Tahun Keluar -->
                            <div class="row mb-3">
                                <label for="tahun_keluar" class="col-sm-2 col-form-label">Tahun Keluar</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('tahun_keluar') is-invalid @enderror"
                                        id="tahun_keluar" name="tahun_keluar"
                                        value="{{ old('tahun_keluar', $pendidikan->tahun_keluar) }}" min="1900"
                                        max="{{ date('Y') }}">
                                    @if ($errors->has('tahun_keluar'))
                                        <div class="text-danger mt-1">{{ $errors->first('tahun_keluar') }}</div>
                                    @endif
                                </div>
                            </div>

                            <!-- Tombol Simpan -->
                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Update Data</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
