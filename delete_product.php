<?php
include 'koneksi.php';

$id = $_POST['id_produk'];

$query = mysqli_query($conn,
  "DELETE FROM produk WHERE id_produk='$id'"
);

echo json_encode([
  "status" => $query ? "success" : "error"
]);
