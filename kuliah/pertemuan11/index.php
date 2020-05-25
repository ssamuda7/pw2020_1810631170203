<?php
require "functions.php";

$peternakan = query("SELECT * FROM peternakan");

if (isset($_POST['cari'])) {
  $peternakan = cari($_POST['keyword']);
}

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
  <br>
  <a href="tambah.php">Tambah data hewan ternak</a>
  <br><br>

  <form action="" method="POST">
    <input type="text" name="keyword" size="50" placeholder="..." autocomplete="off" autofocus>
    <button type="submit" name="cari">Cari!</button>
  </form>
  <br>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>Nama</th>
      <th>Aksi</th>
    </tr>

    <?php if (empty($peternakan)) : ?>
      <tr>
        <td colspan="4">
          <p>data tidak ditemukan!</p>
        </td>
      </tr>
    <?php endif; ?>

    <?php $i = 1;
    foreach ($peternakan as $p) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><img src="img/<?= $p['gambar']; ?>"></td>
        <td><?= $p['nm_barang']; ?></td>
        <td>
          <a href="detail.php?id=<?= $p['id']; ?>">lihat detail</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>