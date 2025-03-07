<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dropzone Image Upload in Laravel</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Dropzone CSS & JS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="text-center">Dropzone Image Upload in Laravel</h2>

                <!-- Form Dropzone -->
                <form action="{{ route('dropzone.store') }}" method="post" enctype="multipart/form-data"
                    class="dropzone" id="image-upload">
                    @csrf
                    <div class="dz-message text-center">
                        <h3>Seret & Lepas Gambar di Sini atau Klik untuk Mengunggah</h3>
                    </div>
                </form>

                <!-- Tombol Upload -->
                <div class="text-center mt-3">
                    <button type="button" id="upload-button" class="btn btn-primary">Upload Semua Gambar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        Dropzone.options.imageUpload = {
            autoProcessQueue: false, // Tidak langsung upload saat gambar ditambahkan
            parallelUploads: 10, // Upload beberapa file sekaligus
            maxFilesize: 2, // Maksimal 2MB per file
            acceptedFiles: "image/*", // Hanya menerima gambar
            init: function() {
                let myDropzone = this;

                // Ketika tombol upload ditekan, proses semua file dalam antrian
                document.getElementById("upload-button").addEventListener("click", function() {
                    if (myDropzone.getQueuedFiles().length > 0) {
                        myDropzone.processQueue();
                    } else {
                        alert("Silakan tambahkan gambar terlebih dahulu!");
                    }
                });

                // Ketika semua file berhasil diunggah, hapus tampilan gambar
                myDropzone.on("queuecomplete", function() {
                    alert("Semua gambar berhasil diunggah!");
                    myDropzone.removeAllFiles(true); // Hapus semua gambar dari tampilan
                });

                // Jika terjadi error
                myDropzone.on("error", function(file, response) {
                    console.log(response);
                });
            }
        };
    </script>
</body>

</html>
