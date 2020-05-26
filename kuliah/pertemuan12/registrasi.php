<?php

require 'functions.php';

if (isset($_POST['registrasi'])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
            alert('Anda berhasil sign up. Silahkan login.');
            document.location.href = 'login.php';
          </script";
  } else {
    echo "<script>
            alert('Anda gagal registrasi!');
          </script";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h3>Form Registrasi</h3>

  <form action="" method="POST">
    <ul>
      <li>
        <label>
          Username :
          <input type="text" name="username">
        </label>
      </li>
      <li>
        <label>
          Password :
          <input type="password" name="password1">
        </label>
      </li>
      <li>
        <label>
          Konfirmasi Password :
          <input type="password" name="password2">
        </label>
      </li>
      <li>
        <button type="submit" name="registrasi">Sign Up!</button>
      </li>
    </ul>
  </form>
</body>

</html>