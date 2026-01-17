<?php
include 'koneksi.php';

$id_user = $_POST['id_user'] ?? null;

if ($id_user == null) {
    echo json_encode([]);
    exit;
}

$query = "SELECT id_jual, tanggal, total 
          FROM jual 
          WHERE id_user = '$id_user'
          ORDER BY id_jual DESC";

$result = mysqli_query($conn, $query);

$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
?>
