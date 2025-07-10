<!-- app/Views/admin/kelolaumkm.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola UMKM - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
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

<body class="bg-lightgreen text-darkgreen font-sans">
    <div class="flex w-full">
        <!-- Sidebar -->
        <div class="sticky top-0 h-screen w-[215px] shrink-0">
            <?= view('admin/sidebar') ?>
        </div>

        <!-- Main Content -->
        <!-- Main Content -->
        <main class="flex-grow px-2 py-5 space-y-5 overflow-x-auto">

            <!-- Header -->
            <div>
                <h1 class="text-2xl font-bold text-primary mb-1">Kelola UMKM</h1>
                <p class="text-xs text-gray-700">Lihat dan kelola data UMKM yang sudah terdaftar.</p>
            </div>

            <!-- Tombol & Filter -->
            <div class="flex flex-wrap justify-between items-center gap-3">
                <a href="<?= base_url('admin/umkm/tambah') ?>"
                    class="inline-flex items-center gap-2 bg-primary hover:bg-green-700 text-white px-3 py-1.5 rounded shadow text-sm">
                    <i class="bi bi-plus-circle-fill text-base"></i>
                    <span>Tambah</span>
                </a>

                <form action="" method="get" class="flex flex-wrap items-center gap-2">
                    <input type="text" name="search" placeholder="Cari Nama / NIK"
                        class="px-3 py-1.5 border border-gray-300 rounded-md text-sm focus:ring-1 focus:ring-primary focus:outline-none" />
                    <select name="kategori" class="px-3 py-1.5 border border-gray-300 rounded-md text-sm">
                        <option value="">Semua Kategori</option>
                        <?php foreach ($kategori as $k): ?>
                            <option value="<?= $k['id'] ?>"><?= esc($k['nama_kategori']) ?></option>
                        <?php endforeach ?>
                    </select>
                    <select name="rw" class="px-3 py-1.5 border border-gray-300 rounded-md text-sm">
                        <option value="">Semua RW</option>
                        <?php foreach (range(1, 20) as $rw): ?>
                            <option value="<?= $rw ?>">RW <?= $rw ?></option>
                        <?php endforeach ?>
                    </select>
                    <button type="submit"
                        class="px-3 py-1.5 bg-primary text-white text-sm rounded hover:bg-green-700 transition">
                        <i class="bi bi-search mr-1"></i> Cari
                    </button>
                </form>
            </div>

            <!-- Flash Message -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded shadow-sm text-sm">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <!-- Tabel -->
            <div class="overflow-x-auto rounded-xl shadow bg-white">
                <table class="min-w-full text-sm table-auto">
                    <thead class="bg-softgreen text-darkgreen">
                        <tr>
                            <th class="px-3 py-2">Nama</th>
                            <th class="px-3 py-2">Jenis</th>
                            <th class="px-3 py-2">Kategori</th>
                            <th class="px-3 py-2">NIB/SKU</th>
                            <th class="px-3 py-2">NIK</th>
                            <th class="px-3 py-2">Alamat</th>
                            <th class="px-3 py-2">Keterangan</th>
                            <th class="px-3 py-2">Logo</th>
                            <th class="px-3 py-2">Gambar</th>
                            <th class="px-3 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-gray-800">
                        <?php foreach ($umkm as $row): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 py-2"><?= esc($row['nama']) ?></td>
                                <td class="px-3 py-2"><?= esc($row['jenis_usaha']) ?></td>
                                <td class="px-3 py-2"><?= esc($row['nama_kategori']) ?></td>
                                <td class="px-3 py-2"><?= esc($row['nib_sku']) ?></td>
                                <td class="px-3 py-2"><?= esc($row['nik']) ?></td>
                                <td class="px-3 py-2">
                                    <?= esc($row['alamat']) ?>, RT <?= esc($row['rt']) ?>/RW <?= esc($row['rw']) ?>,
                                    <?= esc($row['kelurahan']) ?>, <?= esc($row['kecamatan']) ?>
                                </td>
                                <td class="px-3 py-2"><?= esc($row['keterangan']) ?></td>
                                <td class="px-3 py-2">
                                    <?php if (!empty($row['logo'])): ?>
                                        <img src="<?= base_url('logo/' . $row['logo']) ?>" alt="Logo"
                                            class="w-9 h-9 rounded-full border object-cover" />
                                    <?php else: ?>
                                        <span class="text-gray-400 italic">-</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-3 py-2">
                                    <?php if (!empty($row['gambar'])): ?>
                                        <img src="<?= base_url('uploads/' . $row['gambar']) ?>" alt="Gambar"
                                            class="w-16 h-12 rounded border object-cover" />
                                    <?php else: ?>
                                        <span class="text-gray-400 italic">-</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-3 py-2">
                                    <div class="flex flex-wrap gap-2">
                                        <a href="<?= base_url('admin/umkm/edit/' . $row['id']) ?>"
                                            class="text-blue-600 hover:text-blue-800 text-xs flex items-center gap-1">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="<?= base_url('admin/umkm/hapus/' . $row['id']) ?>" method="post"
                                            onsubmit="return confirm('Yakin ingin menghapus UMKM ini?')">
                                            <?= csrf_field() ?>
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-800 text-xs flex items-center gap-1">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </main>

    </div>
</body>

</html>