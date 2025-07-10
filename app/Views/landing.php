<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang | UMKM Medokan Ayu</title>

    <!-- Bootstrap 5.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


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
        background-repeat: no-repeat;">
        <div class="container px-3 px-md-5"> <!-- Tambahan padding kanan-kiri -->
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
    <!-- Bagian dalam <body> -->
    <section class="py-5 bg-light">
        <div class="container px-3 px-md-5">
            <div class="row align-items-start g-4">
                <!-- Kolom Kiri: Teks -->
                <div class="col-md-6">
                    <div class="pe-lg-5">
                        <h2 class="fs-3 fw-bold mb-3 text-primary">Tentang Kelurahan Medokan Ayu</h2>
                        <p class="mb-4 text-muted">
                            Kelurahan Medokan Ayu merupakan salah satu kelurahan di Kecamatan Rungkut, Kota Surabaya,
                            yang memiliki potensi besar dalam bidang UMKM. Beragam jenis usaha hadir di sini, mulai dari
                            kuliner, kerajinan, hingga jasa. Portal ini hadir untuk mendukung promosi dan digitalisasi
                            UMKM warga Medayu.
                        </p>

                        <!-- Statistik UMKM -->
                        <div class="row text-center mb-5 border-bottom pb-4 gx-2">
                            <div class="col-4">
                                <h4 class="text-success fw-bold mb-1">250+</h4>
                                <p class="small text-muted mb-0">UMKM Terdaftar</p>
                            </div>
                            <div class="col-4">
                                <h4 class="text-success fw-bold mb-1">10</h4>
                                <p class="small text-muted mb-0">Kategori Usaha</p>
                            </div>
                            <div class="col-4">
                                <h4 class="text-success fw-bold mb-1">15 RW</h4>
                                <p class="small text-muted mb-0">Wilayah Terjangkau</p>
                            </div>
                        </div>

                        <!-- Visi & Misi -->
                        <h4 class="fw-bold text-success mb-3">Visi & Misi</h4>
                        <ul class="text-muted ps-1 mb-0" style="font-size: 0.95rem;">
                            <li class="d-flex align-items-center gap-3 mb-3">
                                <i class="bi bi-check-circle-fill text-success fs-5 flex-shrink-0"></i>
                                <span class="flex-grow-1">Meningkatkan kesejahteraan pelaku UMKM di Medokan Ayu</span>
                            </li>
                            <li class="d-flex align-items-center gap-3 mb-3">
                                <i class="bi bi-check-circle-fill text-success fs-5 flex-shrink-0"></i>
                                <span class="flex-grow-1">Mendorong digitalisasi dan promosi usaha secara
                                    berkelanjutan</span>
                            </li>
                            <li class="d-flex align-items-center gap-3">
                                <i class="bi bi-check-circle-fill text-success fs-5 flex-shrink-0"></i>
                                <span class="flex-grow-1">Menjadi sentra UMKM unggulan di Surabaya Timur</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Kolom Kanan: Gambar + Testimoni -->
                <div class="col-md-6">
                    <img src="<?= base_url('/picture/gambar/fotokkn.jpg') ?>" alt="Tentang Medokan Ayu"
                        class="img-fluid rounded shadow-sm w-100 mb-4"
                        style="max-height: 300px; object-fit: cover; object-position: center;">

                    <!-- Testimoni -->
                    <blockquote class="blockquote text-muted mt-3 ps-3 border-start border-3 border-success">
                        <p class="mb-1 fst-italic">"Portal ini sangat membantu usaha saya dikenal lebih luas."</p>
                        <footer class="blockquote-footer text-success">Ibu Sari, Pemilik UMKM Kue Basah</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>




    <!-- Footer -->
    <?= view('components/footer') ?>

</body>

</html>