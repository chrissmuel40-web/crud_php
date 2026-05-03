<?php
include_once "../controllers/MuridController.php";
$controller = new MuridController();
$jurusan_data = $controller->model->getJurusan();

if(isset($_POST['simpan'])) {
    $controller->model->create($_POST['nama'], $_POST['ekskul'], $_POST['jurusan']);
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa - SMA N 12 MEDAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #0f172a; 
            /* GAMBAR BARU: Suasana Ruang Kelas Belajar */
            /* Warna gradasi biru gelap agar menyatu dengan form */
            background-image: linear-gradient(rgba(17, 24, 39, 0.8), rgba(30, 58, 138, 0.75)), url('https://images.unsplash.com/photo-1580582932707-520aed937b7b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        .input-glass {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
        }
        .input-glass:focus {
            background: rgba(0, 0, 0, 0.5);
            border-color: #3b82f6;
            outline: none;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.3);
        }
    </style>
</head>
<body class="text-gray-200 font-sans min-h-screen flex items-center justify-center p-6 relative">
    
    <!-- Logo Pojok Kiri Atas -->
    <div class="absolute top-6 left-6 md:top-8 md:left-8 flex items-center gap-3 z-50">
        <img src="logo.png" alt="Logo Pendidikan" class="h-10 w-auto opacity-100 drop-shadow-md">
        <div class="hidden sm:block">
            <div class="text-white font-bold tracking-tight leading-none text-sm">SMA N 12 MEDAN</div>
            <div class="text-[9px] text-gray-300 uppercase tracking-widest mt-1">Portal Akademik</div>
        </div>
    </div>

    <!-- Kontainer Utama Form -->
    <div class="max-w-xl w-full z-10 mt-16 md:mt-0">
        <!-- Tombol Kembali -->
        <a href="../index.php" class="inline-flex items-center gap-2 text-gray-300 hover:text-white mb-6 transition-colors group bg-black/30 px-5 py-2.5 rounded-full border border-white/10 backdrop-blur-md w-fit hover:bg-black/50">
            <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i> Kembali
        </a>

        <div class="glass-card rounded-[2rem] p-8 md:p-10">
            <div class="mb-8 border-b border-white/10 pb-5">
                <h2 class="text-3xl font-bold text-white tracking-tight">Formulir Siswa Baru</h2>
                <p class="text-blue-200 mt-2 text-sm opacity-80">Pendaftaran data induk siswa SMA N 12 MEDAN.</p>
            </div>

            <form method="POST" class="space-y-6">
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-300 ml-1">Nama Lengkap Siswa</label>
                    <input type="text" name="nama" required placeholder="Contoh: Budi Santoso" 
                        class="w-full input-glass rounded-xl px-5 py-3 transition-all placeholder:text-gray-500">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-300 ml-1">Ekstrakurikuler Pilihan</label>
                    <input type="text" name="ekskul" required placeholder="Contoh: Paskibra, Basket..." 
                        class="w-full input-glass rounded-xl px-5 py-3 transition-all placeholder:text-gray-500">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-300 ml-1">Jurusan / Peminatan</label>
                    <div class="relative">
                        <select name="jurusan" class="w-full input-glass rounded-xl px-5 py-3 appearance-none cursor-pointer">
                            <?php while($jur = $jurusan_data->fetch_assoc()) : ?>
                                <option value="<?= $jur['id'] ?>" class="bg-slate-800 text-white"><?= $jur['nama_jurusan'] ?></option>
                            <?php endwhile; ?>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                            <i class="fas fa-chevron-down text-sm"></i>
                        </div>
                    </div>
                </div>

                <button type="submit" name="simpan" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-4 rounded-xl shadow-[0_0_20px_rgba(37,99,235,0.4)] hover:shadow-[0_0_25px_rgba(59,130,246,0.6)] transition-all active:scale-[0.98] mt-6">
                    Simpan Data Siswa
                </button>
            </form>
        </div>
    </div>
</body>
</html>