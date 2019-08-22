<html>

<head>
  <!-- Titel Browser -->
  <title>Halaman Login Blog</title>

  <!-- My CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-grid.css">
  <link rel="stylesheet" href="css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="css/bootstrap-reboot.css">
  <link rel="stylesheet" href="css/bootstrap-reboot.min.css">

  <!-- Manual CSS -->
  <style>
    .login {
      position: sticky;
      margin-top: 100px;
      margin-bottom: 50px;
    }

    .header {
      margin-bottom: 50px;
    }
  </style>

</head>

<body>

  <section class="login " id="main-page">
    <div class="container text-center">
      <h1 class="header ">Selamat Datang !</h1>

      <div class="row justify-content-center ">
        <div class="col-md-5 text-left">

                    <form method="post" action="daftar.php">
                      <div class="form-group ">
                        <label for="Name">Nama</label>
                        <input type="name" class="form-control" name="Name" id="Name" placeholder="Enter Your Name">

                        <label for="Email">Email address</label>
                        <input type="email" class="form-control" name="Email" id="Email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                        <label for="Password">Password</label>
                        <input type="password" class="form-control" name="Password" id="Password" placeholder="Password">

                        <label >Jenis Kelamin :</label>
                        <div class="form-check form-check-inline ">
                          <input class="form-check-input" type="radio" name="Gender" value="M">
                          <label class="form-check-label">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline ">
                          <input class="form-check-input" type="radio" name="Gender" value="F">
                          <label class="form-check-label">Perempuan</label>
                        </div>
                        <div>
                          <button type="submit" class="btn btn-primary mt-2" name="Daftar" value="submit">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- Akhir PENDAFTARAN -->

          </div>
        </div>

      </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="js/bootstrap.bundle.js"> </script>
  <script src="js/bootstrap.bundle.min.js"> </script>
  <script src="js/bootstrap.js"> </script>
  <script src="js/bootstrap.min.js"> </script>

</body>

</html>


<?php
require('Controller log.php');
if (isset($_POST['Daftar'])) {
  $nama = $_POST['Name'];
  $password = $_POST['Password'];
  $email = $_POST['Email'];
  $gender = $_POST['Gender'];
  print_r($gender);
  $daftar = new Controller();
  $register = $daftar->register($nama, $password, $email, $gender);
  if ($register == "Success") {
    print_r($gender);
    // header('Location: index.php');
  }
}


// $login = new Controller();
// $masuk = $login->login($Password); {
//   if ($masuk == "Success") {
//     header('Location: Beranda.php');
//   }
// }
