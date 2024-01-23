<?php
session_start();

if (isset($_SESSION["loogin"])) {
    echo "<script>
    window.location = 'dashboard.php';
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


if (isset($_POST['simpan'])) {
    $nisn       = $_POST['nisn'];
    $password   = $_POST['password'];

    $sql = mysqli_query($koneksi, "SELECT * FROM calonsiswa WHERE nisn = '$_POST[nisn]' OR nik = '$_POST[nisn]'");
    $cek = mysqli_fetch_assoc($sql);

    if (mysqli_num_rows($sql) > 0) {
        if ($password == $cek["password"]) {
            $_SESSION['loogin'] = true;
            echo "<script> alert('Berhasil Login');
            window.location = 'dashboard.php';
            </script>";
        } else {
            echo "<script> alert('Password Salah');
            window.location = 'login.php';
            </script>";
        }
    } else {
        echo "<script> alert('NISN/NIK dan Password nya Salah !!!');
        window.location = 'login.php';
        </script>";
    }
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
    <link rel="stylesheet" href="../css/styleregistrasi.css">

    <title>Form Login</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">

                <div class="card p-4 shadow-lg border-3 position-absolute top-50 start-50 translate-middle">
                    <h4 class="text-success fw-bold">Masuk Akun</h4>
                    <p class="small">Bagi calon siswa yang telah terdaftar, silahkan Masuk menggunakan akun yang telah
                        di daftarkan</p>
                    <form action="" method="POST" class="ms-0">
                        <div class="form-group mb-3">
                            <input type="text" placeholder="NISN/NIK" class="form-control rounded" name="nisn">
                        </div>
                        <div class="form-group mb-4">
                            <input type="password" placeholder="Password" class="form-control rounded" name="password">
                        </div>
                        <div class="form-group">
                            <button class="form-control rounded-pill btn-block btn btn-success" name="simpan">MASUK</button>
                        </div>

                        <hr class="border border-dark">
                        <p class="ms-1 small">Belum Punya akun? <a href="register.php" class="text-success">Daftar
                                disini</a></p>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>