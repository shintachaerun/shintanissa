<?php
include './config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Foto</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <style>
        *{
    margin:0;
    padding:0;
    box-sizing: border-box;

}
body{
    width: 100%;
    height: 100vh;
    background-image: url(bg3.jpg);
    background-size: 100%;
    border: 2px solid;
}

.wrap-card span{
    /* border: 1px solid black; */
    text-align: center;
}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-warning">
  <div class="container">
    <a class="navbar-brand" href="index.php">Gallery Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNav">
        <div class="navbar-nav me-auto">

        </div>
        <a href="register.php" class="btn btn-outline-primary m-1">Daftar</a>
        <a href="login.php" class="btn btn-outline-success m-1">Masuk</a>
    </div>
  </div>
</nav>

<div class="container" mt-2>
  <div class="row">
    <?php 
  $query = mysqli_query($koneksi, "SELECT * FROM foto INNER JOIN user ON foto.userid=user.userid");
while($data = mysqli_fetch_array($query)){
    ?>
    <div class="col-md-3">
    <a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>">

            <div class="card mb-2">
                <img src="./assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>" style="height: 12rem;">
                <div class="card-footer text-center">                   
                    <?php
                    $fotoid = $data['fotoid'];
                    $ceksuka = mysqli_query($koneksi, "SELECT * FROM like_foto WHERE fotoid='$fotoid'");
                    if (mysqli_num_rows($ceksuka) == 1) { ?>
                        <a href="../config/proseslike.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="batalsuka"><i class="fa fa-heart"></i></a>
                    <?php }else{ ?>
                        <a href="../config/proseslike.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="suka"><i class="fa-regular fa-heart"></i></a>
                    <?php }
                    $like = mysqli_query($koneksi, "SELECT * FROM like_foto WHERE fotoid='$fotoid'");
                    echo mysqli_num_rows($like). ' Suka';
                    ?>

                    <a style="text-decoration:none" type="button" class="ms-5" data-bs-toggle="modal" data-bs-target="#komentar<?= $data['fotoid'] ?>"><i class="fa-regular fa-comment"></i></a>
                    <?php
                    $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentar_foto WHERE fotoid='$fotoid'");
                    echo mysqli_num_rows($jmlkomen).' komentar';
                    ?>
                </div>
            </div>
            </a>
            
            <!-- Modal -->
<div class="modal fade" id="komentar<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8">
          <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
          </div>
          <div class="col-md-4">
            <div class="m-2">
              <div class="overflow-auto">
                <div class="sticky-top">
                  <strong><?php echo $data['judulfoto'] ?></strong><br>
                  <span class="badge bg-secondary"><?php echo $data['namalengkap'] ?></span>
                  <span class="badge bg-secondary"><?php echo $data['tanggalunggah'] ?></span>
                </div>
                <hr>
                <p align="left">
                  <?php echo $data['deskripsifoto'] ?>
                </p>
                <hr>
                <?php
                $fotoid = $data['fotoid'];
                $komentar = mysqli_query($koneksi,"SELECT * FROM komentar_foto INNER JOIN user ON komentar_foto.userid=user.userid WHERE komentar_foto.fotoid='$fotoid'");
                while($row = mysqli_fetch_array($komentar)){
                ?>
                <p align="left">
                  <strong><?php echo $row['namalengkap'] ?></strong>
                  <?php echo $row['isikomentar'] ?>
                </p>
                <?php } ?>
                <hr>
                <div class="sticky-bottom">
                  <form action="../config/proseskomentar.php" method="POST">
                    <div class="input-group">
                      <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                      <input type="text" name="isikomentar" class="form-control" placeholder="Tambah Komentar">
                      <div class="input-ground-prepend">
                        <button type="submit" name="kirimkomentar" class="btn btn-outline-primary">Kirim</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

        </div>
        <?php } ?>
  </div>
</div>



<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>&copy; UKK RPL 2024 |  Shinta Chaerun Nissa</p>
</footer>
    

<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>