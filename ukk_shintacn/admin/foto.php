<?php
session_start();
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda belum login!');
    location.href='../index.php';
    </script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Foto</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <style>
        *{
    margin:0;
    padding:0;
    box-sizing: border-box;

}
body{
    width: 100%;
    height: 100vh;
    background-image: url(../bg3.jpg);
    background-size: 100%;
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
            <a href="home.php" class="nav-link">Home</a>
            <a href="foto.php" class="nav-link">Foto</a>
        </div>
        
        <a href="../config/aksilogout.php" class="btn btn-outline-danger m-1">Keluar</a>
    </div>
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mt-2">
                <div class="card-header">Tambah Foto</div>
                <div class="card-body">
                    <form action="../config/aksifoto.php" method="POST" enctype="multipart/form-data">
                        <label class="form-label">Judul foto</label>
                        <input type="text" name="judulfoto" class="form-control" required>
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsifoto" required></textarea>
                            <?php
                            $userid = $_SESSION['userid']; ?>
                        <label class="form-label">File</label>
                        <input type="file" class="form-control" name="lokasifile" reqired>
                        <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header">Data Galeri Foto</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Judul foto</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $userid = $_SESSION['userid'];
                            $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid'");
                            while($data = mysqli_fetch_array($sql)){
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><img src="../assets/img/<?php echo $data['lokasifile'] ?>" width="100"></td>
                                <td><?php echo $data['judulfoto'] ?></td>
                                <td><?php echo $data['deskripsifoto'] ?></td>
                                <td><?php echo $data['tanggalunggah'] ?></td>
                                <td>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['fotoid'] ?>">
  Edit
</button>

<div class="modal fade" id="edit<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../config/aksifoto.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
            <label class="form-label">Judul Foto</label>
                        <input type="text" name="judulfoto" value="<?php echo $data['judulfoto']?>" class="form-control" required>
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsifoto" required><?php echo $data['deskripsifoto']; ?></textarea>
                            <?php
                            $userid = $_SESSION['userid']; ?>
                        </select>
                        <label class="form-label">Foto</label>
                        <div class="row">
                          <div class="col-md-4">
                            <img src="../assets/img/<?php echo $data['lokasifile'] ?>" width="100">
                          </div>
                          <div class="col-md-8">
                            <label class="form-label">Ganti File</label>
                            <input type="file" class="form-control" name="lokasifile" >

                          </div>
                        </div>

        
      </div>
      <div class="modal-footer">
        <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
        </form>
      </div>
    </div>
  </div>
</div>

<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['fotoid'] ?>">
  Hapus
</button>
<div class="modal fade" id="hapus<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../config/aksifoto.php" method="POST">
        <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
        Apakah anda akan yakin anda akan menghapus data <strong> <?php echo $data['judulfoto'] ?></strong> ?
        
      </div>
      <div class="modal-footer">
        <button type="submit" name="hapus" class="btn btn-primary">Hapus Data</button>
        </form>
      </div>
    </div>
  </div>
</div>

                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>&copy; UKK RPL 2024 | Shinta Chaerun Nissa</p>
</footer>
    

<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>