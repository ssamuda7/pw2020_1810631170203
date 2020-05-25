<?php
require "functions.php";

$peternakan = query("SELECT * FROM peternakan");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar hewan ternak</title>
</head>

<body>
  <h2>Daftar Hewan Ternak</h2>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>Kode</th>
      <th>Nama</th>
      <th>Jumlah</th>
      <th>Harga</th>
      <th>Aksi</th>
    </tr>
    <?php $i = 1;
    foreach ($peternakan as $p) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><img src="img/<?= $p['gambar']; ?>"></td>
        <td><?= $p['kd_barang']; ?></td>
        <td><?= $p['nm_barang']; ?></td>
        <td><?= $p['jml']; ?></td>
        <td><?= $p['harga']; ?></td>
        <td>
          <a href="">ubah</a> | <a href="">hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>