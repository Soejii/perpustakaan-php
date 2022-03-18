<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form_buku</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container ">
        <div class="card">
            <div class="card-header bg-dg">
                <h4 class=" text-red">
                    FORM BUKU
                </h4>
            </div>
            <div class="card-body">
                <?php
                if (isset($_GET["isbn"])) {
                    # form untuk edit
                    $isbn = $_GET["isbn"];
                    $sql = "select * from buku
                    where isbn='$isbn'";
                    include "connection.php";

                    # eksekusi
                    $hasil = mysqli_query($connect, $sql);

                    # konversi ke array
                    $buku = mysqli_fetch_array($hasil);
                    ?>

                     <form action="process-buku.php" method="post"
                enctype="multipart/form-data">
                    ISBN
                    <input type="text" name="isbn" 
                    class="form-control mb-2" required
                    value="<?=$buku["isbn"]?> " readonly>

                    Nama Buku
                    <input type="text" name="nama_buku" 
                    class="form-control mb-2" required
                    value="<?=$buku["nama_buku"]?> " >

                    Penulis
                    <input type="text" name="penulis" 
                    class="form-control mb-2" required
                    value="<?=$buku["penulis"]?> ">

                    Penerbit
                    <input type="text" name="penerbit" 
                    class="form-control mb-2" required
                    value="<?=$buku["penerbit"]?> ">

                    Jumlah Halaman
                    <input type="text" name="jumlah_halaman" 
                    class="form-control mb-2" required
                    value="<?=$buku["jumlah_halaman"]?> ">

                    Genre
                    <select name="genre" class="form-control mb-2" required>
                        <option value="<?=$buku["genre"]?>" selected>
                        <?=$buku["genre"]?>
                        </option>
                        <option value="Novel">Novel</option>
                        <option value="Sci-fi">Sci-fi</option>
                        <option value="Fantasi">Fantasi</option>
                        <option value="Romansa">Romansa</option>
                        <option value="Komedi">Komedi</option>
                    </select>

                    Cover <br>
                    
                    <img src="cover/<?=$buku["cover"]?>"
                    width="300 /">
                    <input type="file" name="cover"
                    class="form-control mb-2">

                    <button type="submit" 
                    class="btn btn-info btn-block" name="edit_buku">
                    Simpan edit
                    </button>

                </form>

                    <?php

                } else {
                    # form untuk insert
                    ?>

                     <form action="process-buku.php" method="post"
                enctype="multipart/form-data">
                    ISBN
                    <input type="number" name="isbn" 
                    class="form-control mb-2" required>

                    Nama Buku
                    <input type="text" name="nama_buku" 
                    class="form-control mb-2" required>

                    Penulis
                    <input type="text" name="penulis" 
                    class="form-control mb-2" required>

                    Penerbit
                    <input type="text" name="penerbit" 
                    class="form-control mb-2" required>

                    Jumlah Halaman
                    <input type="Number" name="jumlah_halaman" 
                    class="form-control mb-2" required>

                    Genre
                    <select name="genre" class="form-control mb-2" required>
                        <option value="Novel">Novel</option>
                        <option value="Sci-fi">Sci-fi</option>
                        <option value="Fantasi">Fantasi</option>
                        <option value="Romansa">Romansa</option>
                        <option value="Komedi">Komedi</option>
                    </select>

                    Cover
                    <input type="file" name="cover"
                    class="form-control mb-2 " required>

                    <button type="submit" 
                    class="btn btn-info btn-block" name="simpan_buku">
                    Simpan Form
                    </button>

                </form>

                    <?php
                }
                
                ?>
               
            </div>
        </div>
    </div>
</body>
</html>