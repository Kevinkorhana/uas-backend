<?php
header('Content-Type: application/json');
include 'koneksi.php';

$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');

// validasi input
if(empty($email) || empty($password)){
    echo json_encode([
        "status" => "error",
        "message" => "Email dan password harus diisi"
    ]);
    exit;
}

// --- cek admin hardcode ---
if($email === 'admin@ajib.com' && $password === '123456'){
    echo json_encode([
        "status" => "success",
        "id_user" => 1,
        "nama" => "Admin Ajib",
        "email" => "admin@ajib.com",
        "role" => "admin"
    ]);
    exit;
}

// --- cek user biasa di database ---
$query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
if(mysqli_num_rows($query) > 0){
    $user = mysqli_fetch_assoc($query);
    if(password_verify($password, $user['password'])){
        echo json_encode([
            "status" => "success",
            "id_user" => $user['id_user'],
            "nama" => $user['nama'],
            "email" => $user['email'],
            "role" => $user['role']
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Password salah"
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Email tidak terdaftar"
    ]);
}

exit;
