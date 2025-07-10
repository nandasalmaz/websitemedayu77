<nav class="bg-white shadow-sm sticky-top">
    <div class="container px-4 px-lg-5 d-flex flex-wrap align-items-center justify-content-between py-2">
        <!-- Logo -->
        <a href="<?= base_url('/') ?>"
            class="d-flex align-items-center text-green-700 fw-bold text-lg text-decoration-none">
            <img src="<?= base_url('/picture/gambar/sby.png') ?>" alt="Logo SBY" width="30" height="30" class="me-2">
            <img src="<?= base_url('/picture/gambar/logokkn.png') ?>" alt="Logo KKN" width="50" height="50"
                class="me-2">
            UMKM Medokan Ayu
        </a>

        <!-- Menu Items -->
        <ul class="nav gap-1">
            <li class="nav-item">
                <a class="nav-link px-3 <?= uri_string() === '' ? 'text-green-700 fw-bold' : 'text-gray-600' ?>"
                    href="<?= base_url('/') ?>">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 <?= uri_string() === 'umkm' ? 'text-green-700 fw-bold' : 'text-gray-600' ?>"
                    href="<?= base_url('umkm') ?>">UMKM</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 <?= uri_string() === 'login' ? 'text-green-700 fw-bold' : 'text-gray-600' ?>"
                    href="<?= base_url('login') ?>">Administrator</a>
            </li>
        </ul>
    </div>
</nav>