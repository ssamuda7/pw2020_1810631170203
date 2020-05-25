<?php

require 'functions.php';

$id = $_GET['id'];

$p = query("SELECT * FROM peternakan WHERE id = $id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Hewan Ternak</title>
</head>

<body>
  <h2>Detail Hewan Ternak</h2>

  <ul>
    <li><img src="img/<?= $p['gambar']; ?>"></li>
    <li>Kode : <?= $p['kd_barang']; ?></li>
    <li>Nama : <?= $p['nm_barang']; ?></li>
    <li>Jumlah Tersedia : <?= $p['jml']; ?></li>
    <li>Harga : <?= $p['harga']; ?></li>
    <li><a href="">ubah</a> | <a href="">hapus</a></li>
    <li><a href="index2.php">Kembali</a></li>
  </ul>
</body>

</html>