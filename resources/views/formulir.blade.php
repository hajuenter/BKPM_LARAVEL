<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Request dengan input Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <div class="card shadow-sm p-4" style="max-width: 400px; margin: auto;">
            <h4 class="text-center mb-3">Formulir</h4>
            <form action="{{ route('proses.formulir') }}" method="POST">
                @csrf
                <!-- Input Nama -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama"
                        class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Alamat -->
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="4">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary w-100">SIMPAN</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
