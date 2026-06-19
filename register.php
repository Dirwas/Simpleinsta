<?php
include 'config/koneksi.php';

if(isset($_POST['register'])){

    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    mysqli_query($conn,"
    INSERT INTO users
    (nama,email,password)
    VALUES
    ('$nama','$email','$password')
    ");

    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Register - Foodstagram</title>

<link rel="stylesheet"
href="assets/css/style.css">

</head>
<body>

<div class="auth-container">

    <div class="auth-title">
        Foodstagram
    </div>

    <form method="POST">

        <input
        type="text"
        name="nama"
        placeholder="Nama Lengkap"
        required>

        <input
        type="email"
        name="email"
        placeholder="Email"
        required>

        <input
        type="password"
        name="password"
        placeholder="Password"
        required>

        <button
        class="btn"
        type="submit"
        name="register">
            Register
        </button>

    </form>

    <br>

    <center>
        Sudah punya akun?
        <a href="login.php">
            Login
        </a>
    </center>

</div>

</body>
</html>