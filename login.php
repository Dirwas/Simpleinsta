<?php

session_start();

include 'config/koneksi.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = mysqli_query(
    $conn,
    "SELECT * FROM users
    WHERE email='$email'"
    );

    $user = mysqli_fetch_assoc($data);

    if($user){

        if(password_verify(
        $password,
        $user['password']
        )){

            $_SESSION['id'] = $user['id'];
            $_SESSION['nama'] = $user['nama'];

            header("Location: home.php");
            exit;

        }else{

            echo "<script>
            alert('Password salah');
            </script>";

        }

    }else{

        echo "<script>
        alert('Email tidak ditemukan');
        </script>";

    }

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login - Foodstagram</title>

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
        name="login">
            Login
        </button>

    </form>

    <br>

    <center>
        Belum punya akun?
        <a href="register.php">
            Register
        </a>
    </center>

</div>

</body>
</html>