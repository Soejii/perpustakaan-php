<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Buku</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4c class="text-white">
                    Daftar Buku
                </h4>
            </div>

            <div class="card-body">
                <form action="list-buku.php" method="get">
                    <input type="text" name="search" 
                    class="form-control mb-2"
                    placeholder="Masukan Keyword Pencarian" />
                </form>

                <ul class="list-group">
                    <?php
                    include "connection.php";
                    if(isset($_GET["search"])) {
                        $cari = $_GET["search"];
                        $sql = "select * from buku where nama_buku like '%$cari%'
                        or penulis like '%$cari%'
                        or penerbit like '%$cari%'
                        or genre like '%$cari%'";
                    }
                    else {
                        $sql = "select * from buku";
                    }

                    # eksekusi
                    $hasil = mysqli_query($connect, $sql);
                    while ($buku = mysqli_fetch_array($hasil)) {
                        ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-4">
                                    <!-- untuk gambar -->
                                    <img src="cover/<?=$buku["cover"]?>"
                                    width="300" />
                                </div>
                                <div class="col-lg-6">
                                    <!-- untuk deskripsi buku -->
                                    <h5>Genre :<?=$buku["genre"]?></h5>
                                    <h5>Judul : <?=$buku["nama_buku"]?></h5>
                                    <h5>Penulis :<?=$buku["penulis"]?></h5>
                                    <h5>Penerbit :<?=$buku["penerbit"]?></h5>
                                    <h5>Halaman :<?=$buku["jumlah_halaman"]?></h5>
                                </div>
                                <div class="col-lg-2">
                                    <a href="form-buku.php?isbn=<?=$buku["isbn"]?>">
                                    <button class="btn btn-info btn-block">
                                    Edit
                                </button>
                                    </a>
                                    
                                    <a href="process-buku.php?isbn=<?=$buku["isbn"]?>"
                                    onclick="return confirm ('are you sure')">
                                    <button class="btn btn-danger btn-block">
                                        Delete
                                    </button>
                                    </a>
                                    
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    
                    ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>