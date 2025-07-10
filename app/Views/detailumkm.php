<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= esc($umkm['nama']) ?> - Detail UMKM</title>

    <!-- Bootstrap & Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2E7D32',
                        secondary: '#C8E6C9',
                    }
                }
            }
        }
    </script>

    <style>
        .badge-custom {
            font-size: 0.85rem;
            padding: 6px 12px;
            border-radius: 999px;
        }

        p.justify {
            text-align: justify;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <?= view('components/navbar') ?>

    <div class="container-xl py-5 px-4 px-md-5">
        <div class="row g-4 justify-content-center align-items-start d-flex align-items-stretch">

            <!-- Gambar -->
            <div class="col-md-6 text-center d-flex align-items-stretch">
                <div class="w-100">
                    <?php if (!empty($umkm['gambar'])): ?>
                        <img src="<?= base_url('uploads/' . $umkm['gambar']) ?>" alt="<?= esc($umkm['nama']) ?>"
                            class="img-fluid rounded shadow-sm w-100 h-100" style="max-height: 500px; object-fit: cover;">
                    <?php else: ?>
                        <div class="text-muted">Tidak ada gambar</div>
                    <?php endif; ?>
                </div>
            </div>


            <!-- Informasi -->
            <div class="col-md-6">
                <div class="bg-white shadow-sm rounded-4 p-4 p-md-5 h-100">

                    <h2 class="text-success fw-bold mb-1"><?= esc($umkm['nama']) ?></h2>
                    <p class="text-muted mb-3"><i class="bi bi-briefcase me-2"></i><?= esc($umkm['jenis_usaha']) ?></p>

                    <!-- Badges -->
                    <div class="mb-3 d-flex flex-wrap gap-2">
                        <span class="badge-custom bg-success text-white"><?= esc($umkm['nama_kategori']) ?></span>
                        <span class="badge-custom bg-secondary text-white">Kel. <?= esc($umkm['kelurahan']) ?></span>
                        <span class="badge-custom bg-white border border-success text-success">
                            RT <?= esc($umkm['rt']) ?>/RW <?= esc($umkm['rw']) ?>
                        </span>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <strong>Alamat:</strong><br>
                        <p class="mb-1"><?= esc($umkm['alamat']) ?></p>
                        <a href="https://www.google.com/maps/search/?api=1&query=<?= urlencode($umkm['alamat']) ?>"
                            target="_blank"
                            class="text-decoration-none text-success d-inline-flex align-items-center gap-1">
                            <i class="bi bi-geo-alt-fill"></i> Lihat di Google Maps
                        </a>
                    </div>

                    <!-- Telepon -->
                    <?php if (!empty($umkm['telepon'])): ?>
                        <div class="mb-3">
                            <strong>No. Telepon:</strong><br>
                            <?= esc($umkm['telepon']) ?>
                        </div>
                    <?php endif; ?>

                    <!-- Deskripsi -->
                    <?php if (!empty($umkm['deskripsi'])): ?>
                        <div>
                            <strong>Deskripsi:</strong>
                            <p class="mt-1 justify"><?= nl2br(esc($umkm['deskripsi'])) ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?= view('components/footer') ?>

</body>

</html>