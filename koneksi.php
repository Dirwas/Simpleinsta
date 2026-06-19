<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "foodstagram"
);

if(!$conn){
    die("Koneksi gagal");
}
?>