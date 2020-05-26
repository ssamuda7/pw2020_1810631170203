<?php

session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php';
          </script>";
  } else {
    echo "<script>
            alert('data gagal ditambahkan!');
          </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Hewan Ternak</title>
</head>

<body>
  <h3>Form Tambah Data Hewan Ternak</h3>
  <form action="" method="POST">
    <ul>
      <li>
        <label>
          Nama :
          <input type="text" name="nm_barang" autofocus required>
        </label>
      </li>
      <li>
        <label>
          Kode :
          <input type="text" name="kd_barang" required>
        </label>
      </li>
      <li>
        <label>
          Jumlah Tersedia :
          <input type="text" name="jml" required>
        </label>
      </li>
      <li>
        <label>
          Harga :
          <input type="text" name="harga" required>
        </label>
      </li>
      <li>
        <label>
          Gambar :
          <input type="text" name="gambar" required>
        </label>
      </li>
      <li>
        <button type="submit" name="tambah">Tambah data!</button>
      </li>
    </ul>
  </form>
</body>

</html>