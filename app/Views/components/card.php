<div class="col-md-4 mb-3">
    <div class="card shadow-sm h-100 rounded-4 overflow-hidden">

        <!-- Header Logo dan Nama UMKM -->
        <div class="card-header bg-white border-0 d-flex align-items-center gap-2 py-2 px-3">
            <?php if (!empty($umkm['logo'])): ?>
                <img src="<?= base_url('logo/' . $umkm['logo']) ?>" alt="Logo" width="32" height="32"
                    class="rounded-circle border border-success" style="object-fit: cover;">
            <?php endif; ?>
            <div>
                <h6 class="mb-0 text-success fw-semibold small"><?= esc($umkm['jenis_usaha']) ?></h6>
                <small class="text-muted"><?= esc($umkm['nama']) ?></small>
            </div>
        </div>

        <!-- Gambar UMKM -->
        <?php if (!empty($umkm['gambar'])): ?>
            <img src="<?= base_url('uploads/' . $umkm['gambar']) ?>" alt="Gambar UMKM" class="img-fluid w-100"
                style="height: 160px; object-fit: cover;">
        <?php endif; ?>

        <!-- Isi Detail -->
        <div class="card-body py-2 px-3 small">
            <!-- Badge Info -->
            <div class="mb-2 d-flex flex-wrap gap-2">
                <span class="badge text-white rounded-pill px-2 py-1" style="background-color: #4CAF50;">
                    <?= esc($umkm['nama_kategori']) ?>
                </span>
                <span class="badge text-white rounded-pill px-2 py-1" style="background-color:rgb(193, 178, 15);">
                    Kel. <?= esc($umkm['kelurahan']) ?>
                </span>
                <span class="badge text-dark bg-warning-subtle border border-green rounded-pill px-2 py-1">
                    RT <?= esc($umkm['rt']) ?>/RW <?= esc($umkm['rw']) ?>
                </span>
            </div>

            <!-- Deskripsi -->
            <?php if (!empty($umkm['deskripsi'])): ?>
                <p class="text-muted mb-2" style="min-height: 45px;">
                    <?= character_limiter(esc($umkm['deskripsi']), 100) ?>
                </p>
                <a href="<?= base_url('umkm/detail/' . $umkm['id']) ?>"
                    class="btn btn-sm text-white w-100 rounded-pill fw-medium" style="background-color: #2E7D32;">
                    Lihat Selengkapnya
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>