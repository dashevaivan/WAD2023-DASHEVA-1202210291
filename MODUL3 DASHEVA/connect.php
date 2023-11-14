<!-- File ini berisi koneksi dengan database yang telah di import ke phpMyAdmin kalian -->


<?php
// Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin

// 
$koneksi = mysqli_connect("localhost:3308", "root", "", "wad_modul3_dasheva");
  
// Buatlah perkondisian jika tidak bisa terkoneksi ke database maka akan mengeluarkan errornya
if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
  }
  echo "Koneksi Berhasil";
// 
?>