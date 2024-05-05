<?php
// Mulai sesi
session_start();

// Unset semua variabel sesi
$_SESSION = array();

// Hapus sesi dari server
session_destroy();

// Alihkan pengguna ke halaman login setelah logout
header("location: login.php");
exit;
?>
