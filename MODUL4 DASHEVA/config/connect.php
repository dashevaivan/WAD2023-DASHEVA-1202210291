<!-- File ini berisi koneksi dengan database MySQL -->
<?php 

// (1) Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
$koneksi = mysqli_connect("localhost:3308", "root", "", "wad_modul4");

// 

// (2) Buatlah perkondisian untuk menampilkan pesan error ketika database gagal terkoneksi
if (!$koneksi){
    die("Koneksi gagal : " . mysqli_connect_error());
}
// 
?>