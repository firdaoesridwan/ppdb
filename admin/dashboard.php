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
                    <a class="nav-link text-light" href="datacs2.php">Data Calon Siswa</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link text-light" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Jumbotron -->
    <section class="jumbotron text-center position-absolute top-50 start-50 translate-middle">
        <h1 class="fs-1 fw-bold">Selamat Datang AdminKu</h1>

    </section>
    <!-- Akhir Jumbotron -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>