<?php

include 'config/koneksi.php';

$id=$_GET['id'];

$data=mysqli_query($conn,"
SELECT *
FROM posts
WHERE id='$id'
");

$d=mysqli_fetch_assoc($data);

?>

<h2>
<?= $d['caption']; ?>
</h2>

<img
src="uploads/<?= $d['gambar']; ?>"
width="400">

<p>
<?= $d['lokasi']; ?>
</p>

<iframe
width="100%"
height="400"
src="https://maps.google.com/maps?q=<?= $d['latitude']; ?>,<?= $d['longitude']; ?>&z=15&output=embed">
</iframe>