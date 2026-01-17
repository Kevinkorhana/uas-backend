<?php
include 'koneksi.php';

$id     = $_POST['id'];
$nama   = trim($_POST['nama']);
$email  = trim($_POST['email']);
$password = trim($_POST['password']);

// UPDATE NAMA & EMAIL
mysqli_query($conn,
    "UPDATE users SET nama='$nama', email='$email' WHERE id='$id'"
);

// UPDATE PASSWORD HANYA JIKA DIISI
if (!empty($password)) {
    $hash = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn,
        "UPDATE users SET password='$hash' WHERE id='$id'"
    );
}

echo json_encode([
    "status" => "success",
    "message" => "Profil berhasil diperbarui"
]);
