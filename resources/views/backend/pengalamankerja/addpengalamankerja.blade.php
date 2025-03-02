@extends('backend.layouts.template')

@section('content-admin')
    <div class="pagetitle">
        <h1>Pengalaman Kerja Page</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a>Home</a></li>
                <li class="breadcrumb-item"><a>Riwayat hidup</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pengalamankerja.backend') }}">Pengalaman Kerja</a></li>
                <li class="breadcrumb-item active">Tambah Pengalaman Kerja</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pengalaman Kerja Form</h5>

                        <form action="{{ route('pengalamankerja.store') }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" value="{{ old('nama') }}">
                                    @if ($errors->has('nama'))
                                        <div class="text-danger mt-1">{{ $errors->first('nama') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                        id="jabatan" name="jabatan" value="{{ old('jabatan') }}">
                                    @if ($errors->has('jabatan'))
                                        <div class="text-danger mt-1">{{ $errors->first('jabatan') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tahun_masuk" class="col-sm-2 col-form-label">Tahun Masuk</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('tahun_masuk') is-invalid @enderror"
                                        id="tahun_masuk" name="tahun_masuk" value="{{ old('tahun_masuk') }}">
                                    @if ($errors->has('tahun_masuk'))
                                        <div class="text-danger mt-1">{{ $errors->first('tahun_masuk') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tahun_keluar" class="col-sm-2 col-form-label">Tahun Keluar</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('tahun_keluar') is-invalid @enderror"
                                        id="tahun_keluar" name="tahun_keluar" value="{{ old('tahun_keluar') }}">
                                    @if ($errors->has('tahun_keluar'))
                                        <div class="text-danger mt-1">{{ $errors->first('tahun_keluar') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
