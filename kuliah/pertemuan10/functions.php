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
