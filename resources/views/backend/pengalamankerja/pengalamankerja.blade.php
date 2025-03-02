@extends('backend.layouts.template')

@section('content-admin')
    <div class="pagetitle">
        <h1>Pengalaman Kerja Page</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a>Home</a></li>
                <li class="breadcrumb-item"><a>Riwayat Hidup</a></li>
                <li class="breadcrumb-item active">Pengalaman Kerja</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pengalaman Kerja Form Elements</h5>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- tabel --}}
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card mb-0">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex p-3 justify-content-between align-items-center flex-wrap">
                                            <h4 class="card-title">Data Pengalaman Kerja</h4>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('pengalamankerja.backend.add') }}"
                                                    class="btn btn-primary">Tambah
                                                    Pengalaman Kerja</a>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Nama</th>
                                                        <th>Jabatan</th>
                                                        <th>Tahun Masuk</th>
                                                        <th>Tahun Keluar</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($dataPengalamanKerja as $value)
                                                        <tr>
                                                            <th>{{ $value->id }}</th>
                                                            <td>{{ $value->nama }}</td>
                                                            <td>{{ $value->jabatan }}</td>
                                                            <td>{{ $value->tahun_masuk }}</td>
                                                            <td>{{ $value->tahun_keluar }}</td>
                                                            <td class="text-center">
                                                                <div class="d-flex flex-column gap-2">
                                                                    <a href="{{ route('pengalamankerja.edit', $value->id) }}"
                                                                        class="btn btn-success w-100">
                                                                        <i class="bi bi-pencil-square"></i>
                                                                    </a>
                                                                    <form
                                                                        action="{{ route('pengalamankerja.delete', $value->id) }}"
                                                                        method="POST" class="w-100">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger w-100">
                                                                            <i class="bi bi-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="7">Data tidak ditemukan !!!</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- tabel end --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
