<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Distro Terible.co</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="main.js"></script>
</head>

<body>
  <nav>
    <div class="logo p-2">
      <img src="./img/logo.png" alt="logo" width="50px">
      <h1><strong>Terible.co</strong></h1>
    </div>
    <div> <?php include("page/navbar.php") ?> </div>
  </nav>

  <?php include("content.php") ?>

  <div class="footer">
    <p>Copyright &copy; 2023 || Fauzi Pamungkas</p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>