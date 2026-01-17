<?php
include '../koneksi.php';

$id_user = $_POST['id_user'];
$total = $_POST['total'];

$tanggal = date('Y-m-d');

$query = mysqli_query($conn, "
    INSERT INTO jual (id_user, tanggal, total)
    VALUES ('$id_user', '$tanggal', '$total')
");

if ($query) {
    echo json_encode([
        "status" => "success",
        "message" => "Transaksi berhasil disimpan"
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Gagal simpan transaksi"
    ]);
}
?>
