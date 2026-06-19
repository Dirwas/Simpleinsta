<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit;
}

include 'config/koneksi.php';

$data = mysqli_query($conn,"
SELECT posts.*,
users.nama
FROM posts
JOIN users
ON posts.user_id = users.id
ORDER BY posts.id DESC
");
?>

<!DOCTYPE html>

<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Foodstagram Feed</title>

<link rel="stylesheet"
href="assets/css/style.css">

</head>

<body>

<div class="navbar">

```
<div class="logo">
    🍜 Foodstagram
</div>

<div>
    <a href="home.php">Home</a>
    <a href="dashboard.php">Feed</a>
    <a href="upload.php">Upload</a>
    <a href="logout.php">Logout</a>
</div>
```

</div>

<div class="container">

<div class="welcome-card">

<h2>
Selamat Datang,
<?= $_SESSION['nama']; ?> 👋
</h2>

<p>
Temukan dan bagikan kuliner terbaik Indonesia.
</p>

</div>

<form
action="search.php"
method="GET"
class="search-box">

<input
type="text"
name="keyword"
placeholder="Cari makanan...">

<button
type="submit"
class="btn">
Cari </button>

</form>

<?php while($d=mysqli_fetch_assoc($data)){ ?>

<div class="card">

```
<div class="card-header">

    <div class="profile-pic">
        👨‍🍳
    </div>

    <div>

        <div class="username">
            <?= $d['nama']; ?>
        </div>

        <small>
            <?= $d['tanggal']; ?>
        </small>

    </div>

</div>

<img
src="uploads/<?= $d['gambar']; ?>"
alt="gambar">

<div class="action">

    <span>❤️</span>

    <span>💬</span>

    <span>📤</span>

</div>

<div class="card-body">

    <div class="caption">

        <strong>
            <?= $d['nama']; ?>
        </strong>

        <?= $d['caption']; ?>

    </div>

    <div class="location">

        📍 <?= $d['lokasi']; ?>

    </div>

    <br>

    <a
    href="detail.php?id=<?= $d['id']; ?>"
    class="btn">

    Detail Lokasi

    </a>

</div>
```

</div>

<?php } ?>

</div>

</body>
</html>
