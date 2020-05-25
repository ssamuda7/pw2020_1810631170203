<?php

if (!isset($_GET['id'])) {
  header('Location: index.php;');
  exit;
}

require 'functions.php';

//ambil id dari url
$id = $_GET['id'];

//query berdasarkan id
$p = query("SELECT * FROM peternakan WHERE id = $id");

if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
            alert('data berhasil diubah!');
            document.location.href = 'index.php';
          </script>";
  } else {
    echo "<script>
            alert('data gagal diubah!');
          </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Ubah Hewan Ternak</title>
</head>

<body>
  <h3>Form Ubah Data Hewan Ternak</h3>
  <form action="" method="POST">
    <input type="hidden" name="id" value="<?= $p['id']; ?>">
    <ul>
      <li>
        <label>
          Nama :
          <input type="text" name="nm_barang" autofocus required value="<?= $p['nm_barang']; ?>">
        </label>
      </li>
      <li>
        <label>
          Kode :
          <input type="text" name="kd_barang" required value="<?= $p['kd_barang']; ?>">
        </label>
      </li>
      <li>
        <label>
          Jumlah Tersedia :
          <input type="text" name="jml" required value="<?= $p['jml']; ?>">
        </label>
      </li>
      <li>
        <label>
          Harga :
          <input type="text" name="harga" required value="<?= $p['harga']; ?>">
        </label>
      </li>
      <li>
        <label>
          Gambar :
          <input type="text" name="gambar" required value="<?= $p['gambar']; ?>">
        </label>
      </li>
      <li>
        <button type="submit" name="ubah">Ubah data!</button>
      </li>
    </ul>
  </form>
</body>

</html>