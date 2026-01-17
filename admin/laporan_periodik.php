<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include '../koneksi.php';

$tgl_awal  = $_GET['tgl_awal'];
$tgl_akhir = $_GET['tgl_akhir'];

$query = mysqli_query($conn, "
    SELECT 
        j.id_jual,
        u.nama,
        j.tanggal,
        j.total
    FROM jual j
    JOIN users u ON j.id_user = u.id_user
    WHERE j.tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir'
    ORDER BY j.tanggal ASC
");

$data = [];

while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}

echo json_encode($data);
?>
