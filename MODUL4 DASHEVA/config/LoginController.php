<?php

require 'connect.php';

// function untuk melakukan login
function login($input) {

    // (1) Panggil variabel global $db dari file config
    global $koneksi;
    // 

    // (2) Ambil nilai input dari form login
        // a. Ambil nilai input email
        
        // b. Ambil nilai input password
    $email = $_POST['email'];
    $password = $_POST['password'];
        
    // 

    // (3) Buat dan lakukan query untuk mencari data dengan email yang sama
    $query1 = "SELECT * FROM users WHERE email='$email'";
    $hasil = mysqli_query($koneksi, $query1);
    // 

    // (4) Buatlah perkondisian ketika email ditemukan ( gunakan mysqli_num_rows == 1 )
    if(mysqli_num_rows($hasil) == 1){

        // a. Simpan hasil query menjadi array asosiatif menggunakan fungsi mysqli_fetch_assoc
        $data = mysqli_fetch_assoc($hasil);
        // 
        
        // b. Lakukan verifikasi password menggunakan fungsi password_verify
        if(password_verify($password, $data['password'])){

            
            // c. Set variabel session dengan key login untuk menyimpan status login
            $_SESSION['login'] = true;
            // d. Set variabel session dengan key id untuk menyimpan id user
            $_SESSION['id'] = $data['id'];
            //
            
            // e. Buat kondisi untuk mengecek apakah checkbox "remember me" terisi kemudian set cookie dan isi dengan id
            if(isset($_POST['remember'])){
                setcookie("id", $data['id'], time() + 3600);
            }
            // 
        }else{
            // f. Buat kondisi else dan isi dengan variabel session dengan key message untuk meanmpilkan pesan error ketika password tidak sesuai
            $_SESSION['message'] = 'Password Salah';
            $_SESSION['color'] = 'danger';
        }
    }else{
        // (5) Buat kondisi else, kemudian di dalamnya
        //     Buat variabel session dengan key message untuk menampilkan pesan error ketika email tidak ditemukan
        
    $_SESSION['message'] = "Email tidak ditemukan";
    $_SESSION['color'] = 'danger';
    }

}
// 

// function untuk fitur "Remember Me"
function rememberMe($cookie)
{
    // (6) Panggil variabel global $db dari file config
    global $koneksi;
    // 

    // (7) Ambil nilai cookie yang ada
    $id = $cookie['id'];
    // 

    // (8) Buat dan lakukan query untuk mencari data dengan id yang sama
    $query2 = "SELECT * FROM users WHERE id='$id'";
    $hasil2 = mysqli_query($koneksi,$query2);
    // 

    // (9) Buatlah perkondisian ketika id ditemukan ( gunakan mysqli_num_rows == 1 )
    if(mysqli_num_rows($hasil2) == 1){

        // a. Simpan hasil query menjadi array asosiatif menggunakan fungsi mysqli_fetch_assoc
        
        // b. Set variabel session dengan key login untuk menyimpan status login
        
        // c. Set variabel session dengan key id untuk menyimpan id user
        $data2 = mysqli_fetch_assoc($hasil2);

        $_SESSION['login'] = true;
        $_SESSION['id'] = $data2['id'];
        
    }
    // 
}
// 

?>