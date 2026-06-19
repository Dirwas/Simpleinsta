<?php

session_start();

include 'config/koneksi.php';

if(!isset($_SESSION['id'])){
    header("Location: login.php");
}

if(isset($_POST['upload'])){

    $caption = $_POST['caption'];
    $lokasi = $_POST['lokasi'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    move_uploaded_file(
        $tmp,
        "uploads/".$gambar
    );

    mysqli_query($conn,"
    INSERT INTO posts(
        user_id,
        caption,
        lokasi,
        latitude,
        longitude,
        gambar
    )
    VALUES(
        '".$_SESSION['id']."',
        '$caption',
        '$lokasi',
        '$latitude',
        '$longitude',
        '$gambar'
    )
    ");

    header("Location: dashboard.php");

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Upload - Foodstagram</title>

<link rel="stylesheet"
href="assets/css/style.css">

</head>
<body>

<div class="navbar">

    <div class="logo">
        Foodstagram
    </div>

    <div>
        <a href="dashboard.php">
            Home
        </a>

        <a href="logout.php">
            Logout
        </a>
    </div>

</div>

<div class="container">

<div class="form-card">

<h2>
Upload Makanan
</h2>

<form
method="POST"
enctype="multipart/form-data">

<input
type="text"
name="caption"
placeholder="Caption makanan..."
required>

<input
type="text"
name="lokasi"
placeholder="Lokasi"
required>

<input
type="file"
name="gambar"
required>

<button
class="btn"
type="submit"
name="upload">

Upload Postingan

</button>

</form>

</div>

</div>

</body>
</html>