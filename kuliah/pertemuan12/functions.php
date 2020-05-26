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

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();

  mysqli_query($conn, "DELETE FROM peternakan WHERE id = $id") or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();

  $id = $data['id'];
  $gambar = htmlspecialchars($data['gambar']);
  $kd_barang = htmlspecialchars($data['kd_barang']);
  $nm_barang = htmlspecialchars($data['nm_barang']);
  $jml = htmlspecialchars($data['jml']);
  $harga = htmlspecialchars($data['harga']);

  $query = "UPDATE peternakan SET
            gambar = '$gambar',
            kd_barang = '$kd_barang',
            nm_barang = '$nm_barang',
            jml = '$jml',
            harga = '$harga'
            WHERE id = $id";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM peternakan
              WHERE 
            nm_barang LIKE '%$keyword%' OR
            kd_barang LIKE '%$keyword%' OR
            ";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function login($data)
{
  $conn = koneksi();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  if ($user = query("SELECT * FROM user WHERE username = '$username'")) {
    if (password_verify($password, $user['password'])) {
      $_SESSION['login'] = true;

      header("Location: index.php");
      exit;
    }
  }
  return [
    'error' => true,
    'pesan' => 'Username / Password salah!!'
  ];
}

function registrasi($data)
{
  $conn = koneksi();

  $username = htmlspecialchars(strtolower($data['username']));
  $password1 = mysqli_real_escape_string($conn, $data['password1']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);

  //username atau password tidak boleh kosong
  if (empty($username) || empty($password1) || empty($password2)) {
    echo "<script>
            alert('username / password tidak boleh kosong!');
            document.location.href = 'registrasi.php';
          </script";
    return false;
  }

  //username tidak boleh sama
  if (query("SELECT * FROM user WHERE username = '$username'")) {
    echo "<script>
            alert('username sudah terdaftar!');
            document.location.href = 'registrasi.php';
          </script";
    return false;
  }

  //jika konfirmasi pass tidak sesuai
  if ($password1 !== $password2) {
    echo "<script>
            alert('Konfirmasi password tidak sesuai!');
            document.location.href = 'registrasi.php';
          </script";
    return false;
  }

  //jika password < 5 digit
  if (strlen($password1) < 5) {
    echo "<script>
            alert('Password terlalu pendek!');
            document.location.href = 'registrasi.php';
          </script";
    return false;
  }

  //jika username dan password sudah sesuai
  //enkripsi password
  $password = password_hash($password1, PASSWORD_DEFAULT);

  $query = "INSERT INTO user
              VALUES
            (null, '$username', '$password')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}
