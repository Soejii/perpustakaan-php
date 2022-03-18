<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Anggota</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-reader bg-info">
                <h4 class="text-white">Form Anggota</h4>
                <div class="card-body">
                   <?php
                   include("connection.php");
                   if(isset($_GET["id_anggota"])){
                   // memeriksa ketika load file ini apakah membwawa data GET dengan nama id_anggota
                   // jika true,maka form anggota digunakan untuk edit 
                   # mengakses dara anggota dari id_anggota yang dikirim
                   
                   $id_anggota =  $_GET["id_anggota"];
                   $sql = "select * from anggota where id_anggota='$id_anggota'";

                   // eksekusi
                
                   $hasil = mysqli_query($connect ,$sql);
                   // konversi hasil query ke bentuka array
                   $anggota = mysqli_fetch_array($hasil);
                   ?>
                   <form action="process-anggota.php" method="post">
                    ID Anggota
                    <input type="text"  name="id_anggota"
                    class="form-control mb-2" required
                    value="<?=$anggota["id_anggota"];?>"readonly/>
                    

                    Nama Anggota
                    <input type="text"  name="nama_anggota"
                    class="form-control mb-2" required
                    value="<?=$anggota["nama_anggota"];?>">

                    Alamat Anggota
                    <input type="text"  name="alamat"
                    class="form-control mb-2" required
                    value="<?=$anggota["alamat"];?>">

                    Nomor Hp Anggota
                    <input type="text"  name="nomor hp"
                    class="form-control mb-2" require
                    value="<?=$anggota["nomor_hp"];?>">

                    Tanggal lahir
                    <input type="date"  name="tanggal_lahir"
                    class="form-control mb-2" required
                    value="<?=$anggota["tanggal_lahir"];?>"/>


                    <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success btn-block"
                    name="edit_anggota">
                        Simpan
                    </button>
                    </div>
                    </form>
                     <?php
                    
                   }else{
                   // jika false, maka form anggota digunakan untuk insert data baru 
                    ?>
                    <form action="process-anggota.php" method="post">
                    ID Anggota
                    <input type="text"  name="id_anggota"
                    class="form-control mb-2" required>

                    Nama Anggota
                    <input type="text"  name="nama_anggota"
                    class="form-control mb-2" required>

                    Alamat Anggota
                    <input type="text"  name="alamat"
                    class="form-control mb-2" required>

                    Nomor Hp Anggota
                    <input type="text"  name="nomor hp"
                    class="form-control mb-2" required>

                    Tanggal lahir
                    <input type="date"  name="tanggal_lahir"
                    class="form-control mb-2" required>
                    <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success btn-block"
                    name="edit_anggota">
                        Simpan
                    </button>
                    </div>
                    </form>
                    <?php
                   }
                   
                   
                   ?>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>