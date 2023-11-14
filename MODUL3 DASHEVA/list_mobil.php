<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>List Mobil</title>
</head>
<body>
    <?php include("navbar.php") ?>
    <center>
        <div class="container">
            <h1>List Mobil</h1>
            <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Mobil</th>
                <th scope="col">Brand Mobil</th>
                <th scope="col">Warna</th>
                <th scope="col">Tipe Mobil</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <?php
            include("connect.php");

            // Buatlah query untuk mengambil data dari database (gunakan query SELECT)
            $query = "SELECT * from showroom_mobil";
            $hasil = $koneksi->query($query);
            
            

            // Buatlah perkondisian dimana: 
            // 1. a. Apabila ada data dalam database, maka outputnya adalah semua data dalam database akan ditampilkan 
            //       (gunakan num_rows > 0, while, dan mysqli_fetch_assoc())
            //    b. Untuk setiap data yang ditampilkan, buatlah sebuah button atau link yang akan mengarahkan web ke halaman 
            //       form_detail_mobil.php dimana halaman tersebut akan menunjukkan seluruh data dari satu mobil berdasarkan id
            // 2. Apabila tidak ada data dalam database, maka outputnya adalah pesan 'tidak ada data dalam tabel'

            //<!--  **********************  1  **************************     -->
            if ($hasil->num_rows > 0){
                while($baris = $hasil->fetch_assoc()){
                    ?>
        
                    <tbody>
                    <tr>
                      <th><?php echo $baris['id'] ?></th>
                      <th><?php echo $baris['nama_mobil']?></th>
                      <th><?php echo $baris['brand_mobil']?></th>
                      <th><?php echo $baris['warna_mobil']?></th>
                      <th><?php echo $baris['tipe_mobil']?></th>
                      <th><?php echo $baris['harga_mobil']?></th>
                      <th><a href="form_detail_mobil.php?id=<?= $baris['id']?>">
                        <button type="button" class="btn btn-primary">
                            Detail
                        </button>
                      </a></th>
                    </tr>
                  </tbody>
            <?php   
             }
            } else {
                echo "tidak ada data dalam tabel";
            };
            
            







            //<!--  **********************  1  **************************     -->

            //<!--  **********************  2  **************************     -->

            
            

            
            
            //<!--  **********************  2  **************************     -->
            ?>
        </div>
    </center>
</table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
