<?php
$host = "localhost:3307";
$user = "root";
$pass = "";
$db   ="website";

$koneksi  = mysqli_connect($host, $user, $pass, $db);
if(!$koneksi){
    die("Gagal");
}else{
    echo "berhasil";
}