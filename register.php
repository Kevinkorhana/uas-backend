<?php
header('Content-Type: application/json'); // wajib

include 'koneksi.php';

// ambil input dari Flutter
$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');

if(empty($nama) || empty($email) || empty($password)){
    echo json_encode([
        "status" => "error",
        "message" => "Nama, email, dan password harus diisi"
    ]);
    exit;
}

// cek apakah email sudah terdaftar
$check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
if(mysqli_num_rows($check) > 0){
    echo json_encode([
        "status" => "error",
        "message" => "Email sudah digunakan"
    ]);
    exit;
}

// hash password
$hash = password_hash($password, PASSWORD_DEFAULT);

// insert ke DB
$query = mysqli_query($conn,
    "INSERT INTO users (nama, email, password, role)
     VALUES ('$nama', '$email', '$hash', 'user')"
);

if($query){
    echo json_encode([
        "status" => "success",
        "message" => "Registrasi berhasil"
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Registrasi gagal: " . mysqli_error($conn)
    ]);
}
exit;
