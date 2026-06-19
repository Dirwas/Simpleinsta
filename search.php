<?php

include 'config/koneksi.php';

$key=$_GET['keyword'];

$data=mysqli_query($conn,"
SELECT *
FROM posts
WHERE caption
LIKE '%$key%'
");

while($d=mysqli_fetch_assoc($data)){

echo "<h3>".$d['caption']."</h3>";

echo "<img src='uploads/".$d['gambar']."' width='300'>";

}
?>