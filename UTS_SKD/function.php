<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "skd_uts";

$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($conn));
$connection = new mysqli($server, $user, $pass, $database);

function regist()
{
    global $connection;
    $nama = mysqli_escape_string($connection, $_POST["nama"]);
    $password = mysqli_escape_string($connection, $_POST["password"]);
    $password2 = mysqli_escape_string($connection, $_POST["password2"]);
    $nisn = mysqli_escape_string($connection, $_POST["nisn"]);
    $no_hp = mysqli_escape_string($connection, $_POST["no_hp"]);

    $result = mysqli_query($connection, "SELECT nama FROM user 
                                    WHERE nama = '$nama'");
    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
            alert('Nama sudah digunakan');
        </script>
        ";
        return false;
    }
    if ($password != $password2) {
        echo "
        <script>
            alert('password tidak sesuai');
        </script>
        ";
    } else {
        $password = md5($password);
        $nisn = base64_encode($nisn);
        $no_hp = base64_encode($no_hp);
        $saved = mysqli_query($connection, "INSERT INTO user (nama, pass, nisn, no_hp)
                            VALUES ('$nama','$password','$nisn','$no_hp')");
        return mysqli_affected_rows($connection);
    }
}

function edit($data)
{
    global $connection;

    $id = $_GET["id"];
    $nama = $data['nama'];
    $nisn = base64_encode($data['nisn']);
    $no_hp = base64_encode($data['no_hp']);

    $query1 = "UPDATE user SET
            nama = '$nama',
            nisn = '$nisn',
            no_hp = '$no_hp'
            WHERE id = $id
            ";

    mysqli_query($connection, $query1);

    return mysqli_affected_rows($connection);
}


function delete($id)
{
    global $connection;
    $query = "DELETE FROM user WHERE id=$id";

    mysqli_query($connection, $query);


    return mysqli_affected_rows($connection);
}