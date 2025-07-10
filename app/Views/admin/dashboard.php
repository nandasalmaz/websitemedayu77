<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin - UMKM Medokan Ayu</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2E7D32',
                        softgreen: '#C8E6C9',
                        lightgreen: '#E8F5E9',
                        darkgreen: '#1B5E20'
                    }
                }
            }
        }
    </script>
</head>

<body class="min-h-screen bg-lightgreen text-darkgreen font-sans flex">

    <?= view('admin/sidebar') ?>

    <main class="flex-1 p-10 space-y-8">

        <!-- Judul Halaman -->
        <div>
            <h1 class="text-4xl font-bold text-primary mb-2">Dashboard Admin</h1>
            <p class="text-base text-gray-700">Selamat datang kembali di panel admin UMKM Medokan Ayu.</p>
        </div>

        <!-- Card Sambutan -->
        <section>
            <div class="bg-white rounded-xl shadow p-6 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-semibold text-primary mb-1">Halo, Admin! 👋</h2>
                    <p class="text-gray-600 text-sm">Semangat mengelola data UMKM hari ini!</p>
                </div>
                <div class="text-sm text-gray-500 text-right">
                    <?= date('l, d M Y') ?>
                </div>
            </div>
        </section>

        <!-- Statistik UMKM -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-sm text-gray-500 flex items-center gap-2 mb-1">
                    <i class="bi bi-people-fill text-primary text-base"></i> Total UMKM
                </h3>
                <p class="text-3xl font-bold text-primary"><?= esc($totalUmkm ?? '0') ?></p>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-sm text-gray-500 flex items-center gap-2 mb-1">
                    <i class="bi bi-tags-fill text-primary text-base"></i> Kategori Usaha
                </h3>
                <p class="text-3xl font-bold text-primary"><?= esc($totalKategori ?? '0') ?></p>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-sm text-gray-500 flex items-center gap-2 mb-1">
                    <i class="bi bi-person-badge-fill text-primary text-base"></i> Akun Admin Aktif
                </h3>
                <p class="text-3xl font-bold text-primary">1</p>
            </div>
        </section>

        <!-- Aktivitas Terbaru -->
        <section>
            <h2 class="text-xl font-semibold text-darkgreen mb-3">Aktivitas Terbaru</h2>
            <div class="bg-white rounded-xl shadow divide-y divide-gray-100">
                <?php if (!empty($aktivitasTerbaru)): ?>
                    <?php foreach ($aktivitasTerbaru as $item): ?>
                        <div class="p-4 hover:bg-gray-50 flex justify-between items-center">
                            <span class="text-gray-800"><?= esc($item['aktivitas']) ?></span>
                            <span class="text-sm text-gray-500"><?= date('d M Y, H:i', strtotime($item['waktu'])) ?></span>
                        </div>
                    <?php endforeach ?>
                <?php else: ?>
                    <div class="p-4 text-gray-500 italic text-center">Belum ada aktivitas terbaru.</div>
                <?php endif; ?>
            </div>
        </section>

    </main>
</body>

</html>