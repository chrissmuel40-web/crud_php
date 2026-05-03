<?php
include_once "controllers/MuridController.php";
$controller = new MuridController();
$data = $controller->model->getAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa - SMA N 12 MEDAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #0f172a; 
            /* GAMBAR BARU: Suasana Ruang Kelas Belajar (Sama dengan form) */
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
        .neo-button {
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
        }
        .neo-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.6);
        }
    </style>
</head>
<body class="text-gray-200 font-sans min-h-screen pb-10 relative">

    <nav class="border-b border-white/10 bg-slate-900/40 sticky top-0 z-50 backdrop-blur-xl">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <!-- Pemanggilan logo untuk halaman utama (index) -->
                <img src="views/logo.png" alt="Logo Pendidikan" class="h-10 w-auto opacity-100 drop-shadow-md">
                <div class="h-8 w-px bg-white/20 hidden sm:block"></div>
                <div>
                    <span class="text-xl font-bold tracking-tighter text-white block leading-tight">DATA SISWA <span class="text-blue-400">SMA N 12 MEDAN</span></span>
                    <span class="text-[10px] text-gray-300 font-medium tracking-widest uppercase">Portal Akademik Sekolah</span>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-6 mt-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="glass-card p-6 rounded-3xl relative overflow-hidden group">
                <div class="absolute -right-6 -top-6 text-white/10 group-hover:text-white/20 transition-colors">
                    <i class="fas fa-users text-8xl"></i>
                </div>
                <div class="relative z-10">
                    <p class="text-gray-300 text-sm font-medium tracking-wider uppercase">Total Siswa</p>
                    <h3 class="text-4xl font-bold text-white mt-2"><?= $data->num_rows ?> <span class="text-base font-normal text-gray-400">Orang Terdaftar</span></h3>
                </div>
            </div>
            <div class="md:col-span-2 flex justify-end items-center">
                <a href="views/tambah.php" class="neo-button bg-blue-600 hover:bg-blue-500 text-white px-8 py-4 rounded-2xl font-bold flex items-center gap-3 shadow-[0_0_20px_rgba(37,99,235,0.4)] hover:shadow-[0_0_25px_rgba(59,130,246,0.6)]">
                    <i class="fas fa-user-plus"></i> Tambah Data Siswa
                </a>
            </div>
        </div>

        <div class="glass-card rounded-3xl overflow-hidden shadow-2xl">
            <div class="p-6 border-b border-white/10 flex flex-col md:flex-row justify-between gap-4 bg-black/20">
                <h2 class="text-xl font-semibold text-white flex items-center gap-3">
                    <div class="p-2 bg-blue-500/30 rounded-lg">
                        <i class="fas fa-list-ul text-blue-300"></i>
                    </div>
                    Daftar Murid Aktif
                </h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-gray-300 text-xs uppercase tracking-widest bg-black/30">
                            <th class="py-5 px-6 text-left font-semibold">Profil Siswa</th>
                            <th class="py-5 px-6 text-left font-semibold">Jurusan</th>
                            <th class="py-5 px-6 text-left font-semibold">Ekstrakurikuler</th>
                            <th class="py-5 px-6 text-center font-semibold">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/10">
                        <?php while($row = $data->fetch_assoc()) : ?>
                        <tr class="hover:bg-white/5 transition-all group">
                            <td class="py-5 px-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center border border-white/20 transition-all overflow-hidden">
                                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($row['nama']); ?>&background=2563EB&color=fff" alt="Avatar">
                                    </div>
                                    <div>
                                        <div class="text-white font-semibold text-lg"><?= $row['nama']; ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-5 px-6">
                                <span class="bg-blue-500/20 text-blue-200 border border-blue-400/30 px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-wider">
                                    <?= $row['nama_jurusan'] ? $row['nama_jurusan'] : 'Belum Ditentukan'; ?>
                                </span>
                            </td>
                            <td class="py-5 px-6 text-gray-200 text-sm font-medium">
                                <i class="fas fa-running text-yellow-400 mr-2"></i> <?= $row['ekstrakulikuler']; ?>
                            </td>
                            <td class="py-5 px-6">
                                <div class="flex justify-center gap-3">
                                    <a href="views/edit.php?id=<?= $row['id']; ?>" class="w-10 h-10 rounded-xl bg-white/10 border border-white/20 text-yellow-400 flex items-center justify-center hover:bg-yellow-500 hover:text-white transition-all">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    <a href="index.php?hapus=<?= $row['id']; ?>" onclick="return confirm('Hapus siswa ini dari database sekolah?')" class="w-10 h-10 rounded-xl bg-white/10 border border-white/20 text-red-400 flex items-center justify-center hover:bg-red-500 hover:text-white transition-all">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>