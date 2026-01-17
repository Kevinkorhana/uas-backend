<?php
include 'koneksi.php';

$id_user   = $_POST['id_user'];
$id_produk = $_POST['id_produk'];
$qty       = $_POST['qty'];
$harga     = $_POST['harga'];

$subtotal = $qty * $harga;

// simpan ke tabel jual
mysqli_query($conn, "
  INSERT INTO jual (id_user, total)
  VALUES ('$id_user', '$subtotal')
");

$id_jual = mysqli_insert_id($conn);

// simpan ke detail_jual
mysqli_query($conn, "
  INSERT INTO detail_jual (id_jual, id_produk, qty, harga, subtotal)
  VALUES ('$id_jual', '$id_produk', '$qty', '$harga', '$subtotal')
");

echo json_encode([
  "status" => "success",
  "message" => "Transaksi berhasil"
]);
