<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title><?= isset($umkm['id']) ? 'Edit UMKM' : 'Tambah UMKM' ?></title>
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
                        darkgreen: '#1B5E20',
                        focusring: '#66bb6a'
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.4s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: 0 },
                            '100%': { opacity: 1 }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        input:hover,
        textarea:hover,
        select:hover {
            border-color: #66bb6a;
            background-color: #f9fefb;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #388e3c;
            box-shadow: 0 0 0 3px #a5d6a7;
        }
    </style>
</head>

<body class="bg-gradient-to-r from-lightgreen via-softgreen to-primary min-h-screen text-darkgreen">

    <div class="flex min-h-screen">
        <?= view('admin/sidebar') ?>

        <main class="flex-1 p-10 animate-fade-in space-y-8 max-w-5xl mx-auto">

            <div>
                <h1 class="text-4xl font-bold text-primary mb-2">
                    <?= isset($umkm['id']) ? 'Edit UMKM' : 'Tambah UMKM' ?>
                </h1>
                <p class="text-base text-gray-700">
                    <?= isset($umkm['id']) ? 'Ubah data UMKM yang sudah ada di sistem.' : 'Isi form berikut untuk menambahkan UMKM ke sistem.' ?>
                </p>
            </div>

            <?php if (session()->getFlashdata('errors')): ?>
                <div id="form-error-box" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6"
                    role="alert">
                    <strong class="font-bold">Terjadi Kesalahan!</strong>
                    <ul class="list-disc list-inside mt-2">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form
                action="<?= isset($umkm['id']) ? base_url('admin/umkm/update/' . $umkm['id']) : base_url('admin/umkm/tambah') ?>"
                method="post" enctype="multipart/form-data" class="bg-white p-10 rounded-xl shadow-lg space-y-6"
                novalidate onsubmit="return validateForm(event)">
                <?= csrf_field() ?>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php
                    $fields = [
                        'nama' => 'Nama',
                        'jenis_usaha' => 'Jenis Usaha',
                        'nib_sku' => 'NIB / SKU',
                        'nik' => 'NIK',
                        'alamat' => 'Alamat',
                        'rt' => 'RT',
                        'rw' => 'RW',
                        'kelurahan' => 'Kelurahan',
                        'kecamatan' => 'Kecamatan',
                        'keterangan' => 'Keterangan Tambahan'
                    ];
                    foreach ($fields as $field => $label):
                        $value = old($field, $umkm[$field] ?? ''); ?>
                        <div>
                            <label for="<?= $field ?>" class="block text-base font-medium mb-1"><?= $label ?> <span
                                    class="text-red-600">*</span></label>
                            <input id="<?= $field ?>" type="<?= in_array($field, ['rt', 'rw']) ? 'number' : 'text' ?>"
                                name="<?= $field ?>" value="<?= esc($value) ?>" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 transition-all duration-200" />
                        </div>
                    <?php endforeach; ?>

                    <div>
                        <label for="kategori_id" class="block text-base font-medium mb-1">Kategori Usaha <span
                                class="text-red-600">*</span></label>
                        <select id="kategori_id" name="kategori_id" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 transition-all duration-200">
                            <option value="">Pilih Kategori</option>
                            <?php
                            $selectedKategori = old('kategori_id', $umkm['kategori_id'] ?? '');
                            foreach ($kategori as $k): ?>
                                <option value="<?= $k['id'] ?>" <?= $selectedKategori == $k['id'] ? 'selected' : '' ?>>
                                    <?= esc($k['nama_kategori']) ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label for="deskripsi" class="block text-base font-medium mb-1">Deskripsi <span
                                class="text-red-600">*</span></label>
                        <textarea id="deskripsi" name="deskripsi" rows="4" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 transition-all duration-200"><?= esc(old('deskripsi', $umkm['deskripsi'] ?? '')) ?></textarea>
                    </div>

                    <!-- Upload Gambar -->
                    <div class="md:col-span-2">
                        <label for="gambar" class="block text-base font-medium mb-1">Upload Gambar
                            <?= isset($umkm['id']) ? '(kosongkan jika tidak ingin mengganti)' : '<span class="text-red-600">*</span>' ?>
                        </label>
                        <input type="file" id="gambar" name="gambar" accept="image/*" <?= isset($umkm['id']) ? '' : 'required' ?>
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 transition-all duration-200" />

                        <?php if (isset($umkm['gambar']) && !empty($umkm['gambar'])): ?>
                            <p class="mt-2 text-sm text-gray-600">Gambar saat ini:</p>
                            <img src="<?= base_url('uploads/' . $umkm['gambar']) ?>" alt="Gambar UMKM"
                                class="mt-1 w-48 rounded border border-gray-300 object-contain max-h-48" />
                        <?php endif; ?>
                    </div>

                    <!-- Upload Logo -->
                    <div class="md:col-span-2">
                        <label for="logo" class="block text-base font-medium mb-1">Upload Logo
                            <?= isset($umkm['id']) ? '(opsional)' : '' ?></label>
                        <input type="file" id="logo" name="logo" accept="image/*"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 transition-all duration-200" />

                        <?php if (isset($umkm['logo']) && !empty($umkm['logo'])): ?>
                            <p class="mt-2 text-sm text-gray-600">Logo saat ini:</p>
                            <img src="<?= base_url('logo/' . $umkm['logo']) ?>" alt="Logo UMKM"
                                class="mt-1 w-24 h-24 rounded-full object-cover border border-gray-300" />
                        <?php endif; ?>
                    </div>


                </div>

                <div class="flex justify-between items-center pt-4">
                    <a href="<?= base_url('admin/umkm') ?>"
                        class="text-gray-600 hover:text-primary underline text-sm transition">← Batal & Kembali</a>

                    <button type="submit"
                        formaction="<?= isset($umkm['id']) ? base_url('admin/umkm/update/' . $umkm['id']) : base_url('admin/umkm/save') ?>"
                        formmethod="post"
                        class="flex items-center gap-2 bg-primary hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition">
                        <i class="bi <?= isset($umkm['id']) ? 'bi-pencil-square' : 'bi-plus-circle' ?> text-lg"></i>
                        <?= isset($umkm['id']) ? 'Update UMKM' : 'Simpan UMKM' ?>
                    </button>
                </div>

            </form>
        </main>
    </div>

    <script>
        function validateForm(event) {
            const form = event.target;
            const requiredFields = form.querySelectorAll('[required]');
            let valid = true;
            let firstInvalidField = null;

            requiredFields.forEach(field => {
                const isEmpty = !field.value.trim();
                field.classList.toggle('border-red-600', isEmpty);
                if (isEmpty && !firstInvalidField) {
                    firstInvalidField = field;
                    valid = false;
                }
            });

            if (!valid) {
                firstInvalidField?.focus();
                const errorBox = document.getElementById('form-error-box');
                if (errorBox) {
                    errorBox.textContent = 'Semua field wajib diisi!';
                    errorBox.style.display = 'block';
                } else {
                    alert('Semua field wajib diisi!');
                }
                event.preventDefault();
            }

            return valid;
        }
    </script>

</body>

</html>