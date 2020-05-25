<?php

function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'tugas_rpl');
}

function query($query)
{
  //variabel untuk konkesi ke db
  $conn = koneksi();

  //variabel untuk memasukkan query
  $result = mysqli_query($conn, $query);

  //untuk menampilkan data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  $conn = koneksi();
  $gambar = htmlspecialchars($data['gambar']);
  $kd_barang = htmlspecialchars($data['kd_barang']);
  $nm_barang = htmlspecialchars($data['nm_barang']);
  $jml = htmlspecialchars($data['jml']);
  $harga = htmlspecialchars($data['harga']);

  $query = "INSERT INTO
              peternakan
            VALUES
            (null, '$gambar', '$kd_barang', '$nm_barang', '$jml', '$harga')";

  mysqli_query($conn, $query);

  echo mysqli_error($conn);

  return mysqli_affected_rows($conn);
}
