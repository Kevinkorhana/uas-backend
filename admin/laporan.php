<?php
include '../koneksi.php';

$query = mysqli_query($conn, "
SELECT 
    j.id_jual,
    j.tanggal,
    u.nama,
    j.total
FROM jual j
JOIN users u ON j.id_user = u.id_user
ORDER BY j.id_jual DESC
");

$data = [];

while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}

echo json_encode($data);
?>
