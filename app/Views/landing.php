<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang | UMKM Medokan Ayu</title>

    <!-- Bootstrap 5.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6FBF73',     // Hijau lebih soft
                        secondary: '#C8E6C9',   // Hijau pastel
                    }
                }
            }
        }
    </script>

    <!-- Custom style override untuk Bootstrap -->
    <style>
        .btn-primary {
            background-color: #6FBF73;
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background-color: #5aaa60;
        }

        .bg-primary {
            background-color: #6FBF73 !important;
        }

        .text-primary {
            color: #6FBF73 !important;
        }
    </style>
</head>

<body class="bg-white text-gray-500">

    <!-- Navbar -->
    <?= view('components/navbar') ?>

    <!-- Hero Section -->
    <section class="d-flex align-items-center justify-content-center text-white text-center" style="
    min-height: 70vh;
    background: 
        linear-gradient(to right, rgba(46, 125, 50, 0.9), rgba(102, 187, 106, 0.9), rgba(200, 230, 201, 0.9)),
        url('<?= base_url('picture/gambar/surabaya.jpg') ?>');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
">
        <div class="container">
            <h1 class="display-5 fw-bold mb-3">Selamat Datang di Portal UMKM Medokan Ayu</h1>
            <p class="lead mb-4">
                Platform digital yang menampilkan pelaku Usaha Mikro Kecil Menengah<br>
                di wilayah Kelurahan Medokan Ayu, Surabaya
            </p>
            <a href="<?= base_url('umkm') ?>" class="btn text-white px-4 py-2 rounded-pill shadow-sm"
                style="background-color: #388E3C;">
                Lihat Katalog UMKM
            </a>
        </div>
    </section>



    <!-- Info Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-start"> <!-- Ganti dari align-items-center ke start -->
                <!-- Teks -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="pe-md-4"> <!-- Padding end untuk jarak dari gambar -->
                        <h2 class="fs-3 fw-bold mb-3 text-primary">Tentang Kelurahan Medokan Ayu</h2>
                        <p class="mb-0 text-muted">
                            Kelurahan Medokan Ayu merupakan salah satu kelurahan di Kecamatan Rungkut, Kota Surabaya,
                            yang memiliki potensi besar dalam bidang UMKM. Beragam jenis usaha hadir di sini mulai dari
                            kuliner, kerajinan, hingga jasa. Portal ini hadir untuk mendukung promosi dan digitalisasi
                            UMKM warga Medayu.
                        </p>
                    </div>
                </div>

                <!-- Gambar -->
                <div class="col-md-6">
                    <img src="<?= base_url('picture/medokanayu.jpg') ?>" alt="Tentang Medokan Ayu"
                        class="img-fluid rounded shadow-sm w-100"
                        style="max-height: 300px; object-fit: cover; object-position: center;">
                </div>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <?= view('components/footer') ?>

</body>

</html>