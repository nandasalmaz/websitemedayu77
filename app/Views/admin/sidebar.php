<aside class="w-52 bg-white shadow-lg p-4 flex flex-col justify-between min-h-screen text-sm">
    <div>
        <!-- Judul Panel -->
        <h2 class="text-lg font-bold text-primary mb-5 tracking-wide">Admin</h2>

        <!-- Navigasi -->
        <ul class="space-y-2">
            <li>
                <a href="<?= base_url('admin/dashboard') ?>"
                    class="flex items-center gap-2 text-darkgreen hover:text-primary font-medium">
                    <i class="bi bi-speedometer2 text-sm"></i>
                    <span class="text-sm">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/umkm') ?>"
                    class="flex items-center gap-2 text-darkgreen hover:text-primary font-medium">
                    <i class="bi bi-box-seam text-sm"></i>
                    <span class="text-sm">UMKM</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/kategori') ?>"
                    class="flex items-center gap-2 text-darkgreen hover:text-primary font-medium">
                    <i class="bi bi-tags text-sm"></i>
                    <span class="text-sm">Kategori</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Tombol Logout -->
    <div class="pt-6 border-t border-gray-200 mt-5">
        <a href="<?= base_url('logout') ?>" class="flex items-center gap-2 text-red-600 hover:underline font-medium">
            <i class="bi bi-box-arrow-right text-sm"></i>
            <span class="text-sm">Keluar</span>
        </a>
    </div>
</aside>
