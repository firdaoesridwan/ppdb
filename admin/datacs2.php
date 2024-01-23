<?php
session_start();
if (!isset($_SESSION["loginnn"])) {
    echo "<script> alert('Login Dulu');
    window.location = 'index.php';
    </script>";
}

$host   = "localhost";
$user   = "root";
$pass   = "";
$db     = "ade";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Tidak bisa terkoneksi ke database");
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../css/admin.css">

    <title>Menu Dasboard PPDB</title>
</head>

<body>
    <!--Navbar  -->
    <nav class="navbar navbar-expand-lg bg-success text-light shadow p-3 mb-5 fw-bold">
        <div class="container">
            <a class="navbar-brand text-light" href="">
                <strong>ADMIN</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav ms-auto text-light  ">
                <li class="nav-item me-3">
                    <a class="nav-link text-light" aria-current="page" href="dashboard.php">Beranda</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link text-light" href="datacs.php">Data Calon Siswa</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link text-light" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Awal Card -->
    <div class="text-center fw-bold fs-4 mb-3">DATA CALON SISWA</div>
    <div class="card mx-auto" style="max-width: 1050px;">
        <div class="card-header bg-success text-white">

            <form method="POST" class="d-flex justify-content-end ms-auto my-4 my-lg-0">
                <input class="form-control me-2 " name="cari" type="search" placeholder="Cari" aria-label="Search" style="width: 200px;">
                <button class="btn btn-light" name="bcari" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>

        </div>
        <div class="card-body text-center align-middle">
            <table class="table table-bordered table-striped table-secondary table-hover">
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Status</th>
                    <th>Verifikasi</th>
                    <th>Aksi</th>
                </tr>

                <?php
                $no = 1;

                // cari
                if (isset($_POST['bcari'])) {
                    $cari = $_POST['cari'];
                    $q = "SELECT * FROM calonsiswa WHERE nisn LIKE '%$cari%' OR nik LIKE '%$cari%' OR nama LIKE '%$cari%' OR _status LIKE '%$cari%'";
                } else {
                    $q = "SELECT * FROM calonsiswa";
                }

                $tampil = mysqli_query($koneksi, $q);
                while ($data = mysqli_fetch_array($tampil)) :

                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['nisn'] ?></td>
                        <td><?= $data['nik'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td>
                            <?php if ($data['_status'] == '1') : ?>
                                <p><?php echo "Terverifikasi" ?></p>
                            <?php endif; ?>

                            <?php if ($data['_status'] == '0') : ?>
                                <p><?php echo "Belum Terverifikasi" ?></p>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($data['_status'] == '0') : ?>
                                <a href="terverifikasi.php?id=<?= $data['id'] ?>" class="btn btn-success">
                                    <i class="fa-solid fa-check"></i>
                                </a>
                            <?php endif; ?>

                            <?php if ($data['_status'] == '1') : ?>
                                <a href="belum_terverifikasi.php?id=<?= $data['id'] ?>" class="btn btn-danger">
                                    <i class="fa-solid fa-xmark"></i>
                                </a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <a href="dsadmin.php?hapus=<?= $data['id'] ?>" class="btn btn-danger" onclick="return confirm ('Apakah Anda yakin akan Menghapus Data ini?')">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
    <!-- Akhir Card -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>