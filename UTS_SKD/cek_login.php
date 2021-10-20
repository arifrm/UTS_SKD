<?php
require 'function.php';
global $koneksi;
$pass = md5($_POST['password']);
$nama = mysqli_escape_string($koneksi, $_POST['nama']);
$pass = mysqli_escape_string($koneksi, $pass);

$query = "SELECT * FROM user WHERE nama = '$nama'";
$cek_user = mysqli_query($koneksi, $query);

$user_valid = mysqli_fetch_array($cek_user);
// var_dump($cek_user);

if ($user_valid) {
    if ($pass == $user_valid['pass']) {
        session_start();
        $_SESSION['nama'] = $user_valid['nama'];

        echo "<script>
        alert('Anda Berhasil Login')
        document.location= 'dashboard.php'
        </script>";
    }
    echo "<script>
alert('Password tidak sesuai')
document.location = 'index.php'
</script>";
} else {
    echo "<script>
alert('Username tidak terdaftar')
document.location = 'index.php'
</script>";
}