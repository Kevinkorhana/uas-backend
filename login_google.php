<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include 'koneksi.php';

if (!isset($_POST['email']) || !isset($_POST['nama'])) {
    echo json_encode([
        "status" => "error",
        "message" => "Data tidak lengkap"
    ]);
    exit;
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$nama  = mysqli_real_escape_string($conn, $_POST['nama']);

$cek = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

if(mysqli_num_rows($cek) > 0){

    $user = mysqli_fetch_assoc($cek);

    echo json_encode([
        "status" => "success",
        "id_user" => $user['id_user'],
        "nama" => $user['nama'],
        "email" => $user['email'],
        "role" => $user['role']
    ]);

} else {

    $insert = mysqli_query($conn, "INSERT INTO users (nama, email, password, role) 
                                   VALUES ('$nama', '$email', 'google', 'user')");

    if($insert){
        $id = mysqli_insert_id($conn);

        echo json_encode([
            "status" => "success",
            "id_user" => $id,
            "nama" => $nama,
            "email" => $email,
            "role" => "user"
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Gagal simpan user"
        ]);
    }
}
?>
