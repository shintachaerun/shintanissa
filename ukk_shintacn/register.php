<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galleryi Foto</title>
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

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="text-center">
                        <h5>Daftar Akun Baru</h5>
                    </div>
                    <form action="config/aksiregister.php" method="POST">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required>
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="namalengkap" class="form-control" required>
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                        <div class="d-grid mt-2">
                            <button class="btn btn-primary" type="submit" name="kirim">DAFTAR</button>
                        </div>
                    </form>
                    <hr>
                    <p>Sudah punya akun? <a href="login.php">Login disini ya!</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>&copy; UKK RPL 2024 | Shinta Chaerun Nissa</p>
</footer>
    
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>