<!-- Grid Wrapper -->
<div class="px-2 sm:px-4 md:px-6 lg:px-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php foreach ($semua_umkm as $umkm): ?>
            <div
                class="bg-white shadow-sm rounded-4 overflow-hidden flex flex-col h-full min-h-[440px] transform hover:-translate-y-1 hover:shadow-md transition-all duration-200">

                <!-- Header Logo dan Nama UMKM -->
                <div class="flex items-center gap-2 py-2 px-3">
                    <?php if (!empty($umkm['logo'])): ?>
                        <img src="<?= base_url('logo/' . $umkm['logo']) ?>" alt="Logo"
                            class="w-8 h-8 rounded-full border border-green-600 object-cover">
                    <?php endif; ?>
                    <div class="leading-tight">
                        <h6 class="mb-0 text-green-700 font-semibold text-sm"><?= esc($umkm['jenis_usaha']) ?></h6>
                        <p class="text-xs text-gray-600"><?= esc($umkm['nama']) ?></p>
                    </div>
                </div>

                <!-- Gambar -->
                <?php if (!empty($umkm['gambar'])): ?>
                    <img src="<?= base_url('uploads/' . $umkm['gambar']) ?>" alt="Gambar UMKM" class="w-full object-cover"
                        style="height: 200px;">
                <?php endif; ?>

                <!-- Isi Konten -->
                <div class="p-3 text-sm flex flex-col flex-grow justify-between">
                    <div>
                        <!-- Badge -->
                        <div class="mb-2 flex flex-wrap gap-2 text-xs">
                            <span
                                class="bg-green-600 text-white px-2 py-1 rounded-full"><?= esc($umkm['nama_kategori']) ?></span>
                            <span class="bg-green-100 text-green-800 border border-green-600 px-2 py-1 rounded-full">
                                RT <?= esc($umkm['rt']) ?>/RW <?= esc($umkm['rw']) ?>
                            </span>
                        </div>

                        <!-- Deskripsi -->
                        <?php if (!empty($umkm['deskripsi'])): ?>
                            <p class="text-gray-600 mb-3 leading-snug min-h-[45px]">
                                <?= character_limiter(esc($umkm['deskripsi']), 100) ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- Tombol -->
                    <a href="<?= base_url('umkm/detail/' . $umkm['id']) ?>"
                        class="block text-center bg-green-700 hover:bg-green-800 text-white text-sm font-medium rounded-full py-1.5 transition">
                        Lihat Selengkapnya
                    </a>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>