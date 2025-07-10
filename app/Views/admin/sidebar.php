<aside class="w-56 bg-white shadow-md px-5 py-6 flex flex-col justify-between min-h-screen text-[15px]">
    <div>
        <!-- Judul Panel -->
        <h2 class="text-lg font-semibold text-green-700 mb-6 tracking-wide">Panel Admin</h2>

        <!-- Navigasi -->
        <ul class="space-y-3">
            <li>
                <a href="<?= base_url('admin/dashboard') ?>"
                   class="flex items-center gap-2 text-gray-700 hover:bg-green-100 hover:text-green-700 px-3 py-[6px] rounded-md transition-all duration-200">
                    <i class="bi bi-speedometer2 text-[16px]"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/umkm') ?>"
                   class="flex items-center gap-2 text-gray-700 hover:bg-green-100 hover:text-green-700 px-3 py-[6px] rounded-md transition-all duration-200">
                    <i class="bi bi-box-seam text-[16px]"></i>
                    <span>UMKM</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Tombol Logout -->
    <div class="pt-5 border-t border-gray-200 mt-5">
        <a href="<?= base_url('logout') ?>"
           class="flex items-center gap-2 text-red-600 hover:bg-red-100 hover:text-red-700 px-3 py-[6px] rounded-md transition-all duration-200 font-medium">
            <i class="bi bi-box-arrow-right text-[16px]"></i>
            <span>Keluar</span>
        </a>
    </div>
</aside>
