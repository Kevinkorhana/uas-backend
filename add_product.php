<?php
include 'koneksi.php';

$nama = $_POST['nama_produk'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];

$gambar = null;

if (isset($_FILES['gambar'])) {
    $namaFile = time() . '_' . $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp, "uploads/" . $namaFile);
    $gambar = $namaFile;
}

$query = mysqli_query($conn,
  "INSERT INTO produk (nama_produk, harga, deskripsi, gambar)
   VALUES ('$nama', '$harga', '$deskripsi', '$gambar')"
);

echo json_encode([
  "status" => $query ? "success" : "error"
]);
