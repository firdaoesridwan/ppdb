<?php
$host   = "localhost";
$user   = "root";
$pass   = "";
$db     = "ade";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Tidak bisa terkoneksi ke database");
}

$nama           = "";
$nisn           = "";
$nik            = "";
$tempatlahir    = "";
$tanggallahir   = "";
$jeniskelamin   = "";
$agama          = "";
$email          = "";
$nohp           = "";
$password       = "";



if (isset($_POST['simpan'])) {
    $nama           = $_POST['nama'];
    $nisn           = $_POST['nisn'];
    $nik            = $_POST['nik'];
    $tempatlahir    = $_POST['tempatlahir'];
    $tanggallahir   = $_POST['tanggallahir'];
    $jeniskelamin   = $_POST['jeniskelamin'];
    $agama          = $_POST['agama'];
    $email          = $_POST['email'];
    $nohp           = $_POST['nohp'];
    $password       = $_POST['password'];


    if ($nama && $nisn && $nik && $tempatlahir && $tanggallahir && $jeniskelamin && $agama && $email && $nohp && $password) {
        $sql1   = "INSERT INTO calonsiswa(nama,nisn,nik,tempatlahir,tanggallahir,jeniskelamin,agama,email,nohp,password) 
                    values('$nama','$nisn','$nik','$tempatlahir','$tanggallahir','$jeniskelamin','$agama','$email','$nohp','$password')";
        $q1    = mysqli_query($koneksi, $sql1);
        if ($q1) {
            echo "<script> alert('Berhasil Registrasi');
            window.location = 'register.php';
            </script>";
        } else {
            echo "<script> alert('Gagal Registrasi')</script>";
        }
    } else {
        echo "<script> alert('Isikan Semua Form nya!!!')</script>";
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

    <title>Form Registrasi</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">

                <div class="card p-4 shadow-lg border-3 position-absolute top-50 start-50 translate-middle">
                    <h4 class="text-success fw-bold">Registrasi Akun</h4>
                    <p class="small">Silahkan isi data kamu dengan benar, Pastikan Email yang kamu masukkan aktif</p>

                    <form action="" method="POST" class="ms-0">
                        <div class="form-group mb-2">
                            <input type="text" placeholder="Nama Lengkap" class="form-control rounded" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                        <div class="form-group row mb-2 float-xxl-end">
                            <div class="col-md-6 mb-2">
                                <input type="text" placeholder="NISN" class="form-control rounded" id="nisn" name="nisn" value="<?php echo $nisn ?>">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="NIK" class="form-control rounded" id="nik" name="nik" value="<?php echo $nik ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-2 float-xxl-end">
                            <div class="col-md-6 mb-2">
                                <input type="text" placeholder="Tempat Lahir" class="form-control rounded" id="tempatlahir" name="tempatlahir" value="<?php echo $tempatlahir ?>">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Tanggal Lahir" class="form-control rounded" id="tanggallahir" name="tanggallahir" value="<?php echo $tanggallahir ?>">
                            </div>
                        </div>

                        <div class="form-group mb-2">
                            <input type="text" placeholder="Jenis Kelamin L/P" class="form-control rounded" id="jeniskelamin" name="jeniskelamin" value="<?php echo $jeniskelamin ?>">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" placeholder="Agama" class="form-control rounded" id="agama" name="agama" value="<?php echo $agama ?>">
                        </div>
                        <div class="form-group mb-2">
                            <input type="email" placeholder="Email" class="form-control rounded" id="email" name="email" value="<?php echo $email ?>">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" placeholder="No Handphone" class="form-control rounded" id="nohp" name="nohp" value="<?php echo $nohp ?>">
                        </div>
                        <div class="form-group mb-2">
                            <input type="password" placeholder="Password" class="form-control rounded" id="password" name="password" value="<?php echo $password ?>">
                        </div>
                        <div class="form-group">
                            <button class="form-control rounded-pill btn-block btn btn-success" name="simpan" value="simpan data">DAFTAR</button>
                            <p class="mt-1 ms-1 my-4 small">Sudah ada akun? <a href="login.php" class="text-success">Masuk disini</a></p>
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