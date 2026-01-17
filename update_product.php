<?php
include 'koneksi.php';

$id = $_POST['id_produk'];
$nama = $_POST['nama_produk'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];

$query = mysqli_query($conn,
  "UPDATE produk SET
    nama_produk='$nama',
    harga='$harga',
    deskripsi='$deskripsi'
   WHERE id_produk='$id'"
);

echo json_encode([
  "status" => $query ? "success" : "error"
]);
