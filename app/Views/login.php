<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Admin - UMKM Medokan Ayu</title>

    <!-- Bootstrap 5.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2E7D32',
                        secondary: '#A5D6A7',
                        softgreen: '#E8F5E9',
                        darkgreen: '#1B5E20'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-softgreen" style="
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        background: linear-gradient(to right, rgba(46, 125, 50, 0.9), rgba(102, 187, 106, 0.9), rgba(200, 230, 201, 0.9)),
                    url('<?= base_url('/picture/gambar/surabaya2.jpg') ?>');
        background-size: cover;
        background-position: center
        background-repeat: no-repeat;
    ">

    <!-- Navbar -->
    <?= view('components/navbar') ?>

    <!-- Konten Login -->
    <div class="d-flex align-items-center justify-content-center py-5" style="min-height: calc(100vh - 80px);">
        <div class="card shadow-lg border-0 rounded-5 px-4 py-5"
            style="max-width: 420px; width: 100%; background-color: #ffffffee;">
            <div class="text-center mb-4">
                <img src="<?= base_url('/picture/gambar/sby.png') ?>" alt="Logo" class="mx-auto mb-2 w-10">
                <h4 class="fw-bold text-primary mb-1">Login Administrator</h4>
                <p class="text-muted small mb-0">Portal UMKM Medokan Ayu</p>
            </div>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger rounded-3"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form method="post" action="<?= base_url('login') ?>">
                <div class="mb-3">
                    <label for="username" class="form-label fw-semibold">Username</label>
                    <input type="text" name="username" id="username" class="form-control rounded-4"
                        placeholder="Masukkan username" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" id="password" class="form-control rounded-4"
                        placeholder="Masukkan password" required>
                </div>

                <button type="submit" class="btn w-100 text-white fw-semibold rounded-pill"
                    style="background-color: #2E7D32;">
                    Masuk
                </button>
            </form>
        </div>
    </div>

</body>

</html>