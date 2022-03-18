<?php
include './connection.php';
if (isset($_POST["simpan_anggota"])) {
    #proses simpan new data 
    // tampung data input anggota dari user
    $id_anggota = $_POST["id_anggota"];

$alamat = $_POST["alamat"];
$nomor_hp = $_POST["nomor_hp"];
$tanggal_lahir = $_POST["tanggal_lahir"];
$nama_anggota = $_POST["nama_anggota"];


// membuat perintah sql untuk insert data ke table anggota

$sql = "insert into anggota values ('$id_anggota','$nama_anggota','$alamat','$nomor_hp','$tanggal_lahir')";

//eksekusi perintah SQL
mysqli_query($connect, $sql);
echo $sql;

// direct ke halaman list anggota

 header("location:list-anggota.php");
}
if (isset($_POST["edit_anggota"])) {
    #tampung data yang akan diupdate
    $id_anggota = $_POST["id_anggota"];

    $alamat = $_POST["alamat"];
    $nomor_hp = $_POST["nomor_hp"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $nama_anggota = $_POST["nama_anggota"];
    #membuat perintah sql update ke table anggota
    $sql ="update anggota set nama_anggota = '$nama_anggota', nomor_hp ='$nomor_hp', alamat ='$alamat' , tanggal_lahir = '$tanggal_lahir'
    where id_anggota = '$id_anggota' ";

    mysqli_query($connect, $sql);
    header("location:list-anggota.php");
}

?>