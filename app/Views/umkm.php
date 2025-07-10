<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UMKM Medokan Ayu</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2E7D32',
                        secondary: '#A5D6A7',
                        soft: '#E8F5E9',
                        darkgreen: '#1B5E20',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-white text-gray-800 text-sm">

    <!-- Navbar -->
    <?= view('components/navbar') ?>

    <!-- Hero Section -->
    <section class="text-center py-5 text-white" style="
        background: linear-gradient(to right, rgba(46, 125, 50, 0.85), rgba(102, 187, 106, 0.7)), 
                    url('<?= base_url('/picture/gambar/suroboyo.jpg') ?>');
        background-size: cover;
        background-position: center;
    ">
        <div class="container px-3">
            <h1 class="text-2xl fw-semibold mb-1">Katalog UMKM Medokan Ayu</h1>
            <p class="fs-6 mb-0">Informasi pelaku usaha di Kelurahan Medokan Ayu</p>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="py-2 bg-light">
        <div class="container px-3">
            <form method="GET" action="<?= base_url('umkm') ?>" class="row gy-2 gx-2 align-items-end">
                <!-- Input Search -->
                <div class="col-md-4">
                    <label class="form-label mb-1 text-muted">Cari Nama UMKM</label>
                    <input type="text" name="search" value="<?= esc($_GET['search'] ?? '') ?>"
                        class="form-control form-control-sm rounded" placeholder="Nama UMKM...">
                </div>

                <!-- Filter Kategori -->
                <div class="col-md-3">
                    <label class="form-label mb-1 text-muted">Kategori</label>
                    <select name="kategori" class="form-select form-select-sm rounded">
                        <option value="all">Semua</option>
                        <?php foreach ($kategori_list as $k): ?>
                            <option value="<?= esc($k['id']) ?>" <?= (isset($_GET['kategori']) && $_GET['kategori'] == $k['id']) ? 'selected' : '' ?>>
                                <?= esc($k['nama_kategori']) ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <!-- Filter RW -->
                <div class="col-md-2">
                    <label class="form-label mb-1 text-muted">RW</label>
                    <select name="rw" class="form-select form-select-sm rounded">
                        <option value="all">Semua</option>
                        <?php foreach ($rw_list as $rw): ?>
                            <option value="<?= esc($rw['rw']) ?>" <?= (isset($_GET['rw']) && $_GET['rw'] == $rw['rw']) ? 'selected' : '' ?>>
                                RW <?= esc($rw['rw']) ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <!-- Tombol -->
                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-sm btn-success rounded">Tampilkan</button>
                </div>
                <div class="col-md-1 d-grid">
                    <a href="<?= base_url('umkm') ?>" class="btn btn-sm btn-outline-secondary rounded">Reset</a>
                </div>
            </form>
        </div>
    </section>

    <!-- Katalog UMKM -->
    <section id="katalog" class="py-3">
        <div class="container px-3">
            <h2 class="mb-3 fs-6 fw-semibold text-[color:#2E7D32]">Daftar UMKM</h2>
            <?php if (!empty($umkm)): ?>
                <div class="row g-3">
                    <?php if (!empty($umkm)): ?>
                        <?= view('components/card', ['semua_umkm' => $umkm]) ?>
                    <?php else: ?>
                        <div class="alert alert-warning text-center small py-2">Belum ada data UMKM ditemukan.</div>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <div class="alert alert-warning text-center small py-2">Belum ada data UMKM ditemukan.</div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Footer -->
    <?= view('components/footer') ?>

</body>

</html>