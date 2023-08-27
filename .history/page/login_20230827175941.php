<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="../css/loginstyle.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
  <div class="login">
    <h2 class="login-header">LOGIN</h2>
    <form class="login-container" action="login.php" method="post">

      <?php

      include "../lib/koneksi.php";
      session_start();
      if (isset($_POST['submit'])) {
        $user = $_POST['username'];
        $pwd = $_POST['password'];
        $pdo = $conn->prepare("SELECT * FROM tbl_users WHERE username=:a AND password=:b");
        $pdo->execute(array(':a' => $user, ':b' => $pwd));
        $count = $pdo->rowcount();
        $row = $pdo->fetch(PDO::FETCH_OBJ);
        if ($count == 0) {
          echo "<center><a class='tombol-merah'>Login Gagal</a></center>";
        } else {
          $_SESSION['username'] = $user;
          $_SESSION['password'] = $pwd;
          $_SESSION['status'] = $row->title;
          echo "<center><a class='tombol-biru'>Login Berhasil</a></center>";
          echo "<meta http-equiv='refresh' content='1;
                url=../index.php'>";
        }
      }
      ?>

      <p>
        <input type="text" name="username" placeholder="Username" required>
      </p>
      <p>
        <input type="password" name="password" placeholder="Password" required>
      </p>
      <p>
        <input type="submit" name="submit" value="Masuk">
      </p>
      <a href="../index.php" class="btn btn-primary text-center">kembali</a>
      <p>Belum punya akun ? <a href="daftar.php" class="tombol-biru">Yuk Daftar</a></p>
      <br>
     
    </form>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>
