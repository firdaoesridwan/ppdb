<?php
session_start();

if (isset($_SESSION["loginnn"])) {
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
    $username   = $_POST['username'];
    $password   = $_POST['password'];

    $sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$_POST[username]'");
    $cek = mysqli_fetch_assoc($sql);

    if (mysqli_num_rows($sql) > 0) {
        if ($password == $cek["password"]) {
            $_SESSION['loginnn'] = true;
            echo "<script> alert('Berhasil Login');
            window.location = 'dashboard.php';
            </script>";
        } else {
            echo "<script> alert('Password Salah');
            window.location = 'index.php';
            </script>";
        }
    } else {
        echo "<script> alert('Username dan Password nya Salah !!!');
        window.location = 'index.php';
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

    <title>Login Admin</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card p-5 w-100 shadow-lg border-3 position-absolute top-50 start-50 translate-middle">
                    <img src="../images/logomuhammadiyah.png" alt="Logo" class="d-block mx-auto mb-3">
                    <h4 class="text-success fw-bold mb-4 text-center">Login Admin</h4>
                    <form action="" method="POST" class="ms-0">
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Username" class="form-control rounded" name="username">
                        </div>
                        <div class="form-group mb-4">
                            <input type="password" placeholder="Password" class="form-control rounded" name="password">
                        </div>
                        <div class="form-group">
                            <button class="form-control rounded-pill btn-block btn btn-success" name="simpan">MASUK</button>
                        </div>
                </div>
                </form>
            </div>

        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>