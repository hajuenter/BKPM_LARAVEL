<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File Dengan Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="col-md-6 mx-auto">
            <h2 class="text-center mb-4">Upload File Dengan Laravel</h2>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm p-4">
                <form action="{{ route('upload.proses.resize') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Input File Gambar -->
                    <div class="mb-3">
                        <label for="file" class="form-label fw-bold">File Gambar</label>
                        <input type="file" name="file" id="file"
                            class="form-control @error('file') is-invalid @enderror">
                        @error('file')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Keterangan -->
                    <div class="mb-3">
                        <label for="keterangan" class="form-label fw-bold">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                            rows="4">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
