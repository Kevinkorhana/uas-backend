<?php
header('Content-Type: application/json');

// ===== KONFIGURASI DATABASE INFINITYFREE =====
$host = "sql104.infinityfree.com";   // lihat di MySQL Databases
$user = "if0_40926075";               // username database
$pass = "POSQsOKjMFnXCy";         // password database
$db   = "if0_40926075_if0_40926075_warungajib";      // nama database

// =============================================
$conn = mysqli_connect($host, $user, $pass, $db);

// matikan warning PHP agar tidak merusak JSON
error_reporting(0);
ini_set('display_errors', 0);

if (!$conn) {
    echo json_encode([
        "status" => "error",
        "message" => "Koneksi database gagal"
    ]);
    exit;
}
?>
