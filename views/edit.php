<?php
include_once "../controllers/MuridController.php";
$controller = new MuridController();

$id = $_GET['id'];
$data = $controller->model->getById($id);
$row = $data->fetch_assoc();
$jurusan_data = $controller->model->getJurusan();

if(isset($_POST['update'])) {
    $controller->model->update($id, $_POST['nama'], $_POST['ekskul'], $_POST['jurusan']);
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa - SMA N 12 MEDAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #1e3a8a; 
            background-image: linear-gradient(rgba(15, 23, 42, 0.75), rgba(30, 58, 138, 0.85)), url('https://images.pexels.com/photos/256431/pexels-photo-256431.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        .input-glass {
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
        }
        .input-glass:focus {
            background: rgba(0, 0, 0, 0.4);
            border-color: #facc15; /* Warna border fokus kuning/amber untuk edit */
            outline: none;
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
        <a href="../index.php" class="inline-flex items-center gap-2 text-gray-300 hover:text-white mb-6 transition-colors group bg-black/20 px-4 py-2 rounded-full border border-white/10 backdrop-blur-sm w-fit">
            <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i> Kembali
        </a>

        <div class="glass-card rounded-[2rem] p-8 md:p-10">
            <div class="mb-8 border-b border-white/10 pb-4">
                <h2 class="text-3xl font-bold text-white tracking-tight">Edit Data Siswa</h2>
                <p class="text-gray-300 mt-2 text-sm">Perbarui informasi profil murid ini.</p>
            </div>

            <form method="POST" class="space-y-6">
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-200 ml-1">Nama Lengkap Siswa</label>
                    <input type="text" name="nama" value="<?= $row['nama']; ?>" required 
                        class="w-full input-glass rounded-xl px-5 py-3 transition-all">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-200 ml-1">Ekstrakurikuler Pilihan</label>
                    <input type="text" name="ekskul" value="<?= $row['ekstrakulikuler']; ?>" required 
                        class="w-full input-glass rounded-xl px-5 py-3 transition-all">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-200 ml-1">Jurusan / Peminatan</label>
                    <div class="relative">
                        <select name="jurusan" class="w-full input-glass rounded-xl px-5 py-3 appearance-none cursor-pointer">
                            <?php while($jur = $jurusan_data->fetch_assoc()) : 
                                $selected = ($jur['id'] == $row['jurusan_id']) ? "selected" : "";
                            ?>
                                <option value="<?= $jur['id'] ?>" <?= $selected ?> class="bg-slate-800 text-white"><?= $jur['nama_jurusan'] ?></option>
                            <?php endwhile; ?>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                            <i class="fas fa-chevron-down text-sm"></i>
                        </div>
                    </div>
                </div>

                <button type="submit" name="update" class="w-full bg-yellow-500 hover:bg-yellow-400 text-slate-900 font-bold py-4 rounded-xl shadow-lg shadow-yellow-500/30 transition-all active:scale-[0.98] mt-6">
                    Update Data Siswa
                </button>
            </form>
        </div>
    </div>
</body>
</html>
