<?php
session_start();

if (isset($_SESSION['nama'])) {
  if (!empty($_SESSION['nama'])) {
    header('Location: Beranda.php');
  }
}

require('Controller log.php');
if (isset($_POST['Daftar'])) {
  if (!empty($_POST['Name']) || !empty($_POST['Password'])) {
    session_start();

    $nama = $_POST['Name'];
    $password = password_hash(($_POST['Password']), PASSWORD_DEFAULT);
    $email = $_POST['Email'];
    $gender = $_POST['Gender'];

    $daftar = new Controller();
    $register = $daftar->register($nama, $password, $email, $gender);
    if ($register == "Success") {
      echo "" ?> <div class="alert alert-success  text-center" role="alert">REGISTRATION SUCCESS !</div> <?php
    // header('Location: index.php');
    } else {
        echo "" ?> <div class="alert alert-danger  text-center" role="alert">FAILED (Correct your email !) !</div> <?php
      }
  } else {
    echo "" ?> <div class="alert alert-danger  text-center" role="alert">FAILED ! (every element must be writed !)</div> <?php
  }
}

if (isset($_POST['masuk'])) {
  if (!empty($_POST['nama']) || !empty($_POST['password'])) {
    $namain = $_POST['nama'];
    $passin = $_POST['password'];

    if (isset($_POST['ingat'])) {
      setcookie("user", $namain, time() + 60);
    }


    $login = new Controller();
    $masuk = $login->logname($namain);
    $result = $masuk->fetch(PDO::FETCH_OBJ);
    // print_r($result->pass);

    if ($result->username == $namain) {
      if (password_verify($passin, $result->pass)) {
        $_SESSION['nama'] = $_POST['nama'];
        header('Location: Beranda.php');
      } else {
        echo "" ?> <div class="alert alert-danger  text-center" role="alert">LOGIN FAILED ! (wrong password !)</div> <?php
        }
      } else {
        echo "" ?> <div class="alert alert-danger fixed-top text-center" role="alert">LOGIN FAILED ! (wrong username !)</div> <?php
        }
  } else {
    echo "" ?> <div class="alert alert-danger  text-center" role="alert">FAILED ! (every element must be writed !)</div> <?php
      }
}

if (isset($_POST['message'])) {
  if (!empty($_POST['namestr']) || !empty($_POST['emailstr']) || !empty($_POST['pesan'])) {
    $namestr = $_POST['namestr'];
    $emailstr = $_POST['emailstr'];
    $messagestr = $_POST['pesan'];

    $to = "sofyanzuhad2@gmail.com";
    $subject = "Message From Stranger";
    $message = "Name : " . $namestr . "\n" . "SEND YOU A MESSAGE !" . "\n" . "Message :" . "\n" . $messagestr;
    $headers = "From: " . $emailstr . "\r\n";
    if (mail($to, $subject, $message)) {
      echo "" ?> <div class="alert alert-success fixed-top text-center" role="alert">EMAIL SENDED ! Thank You !</div> <?php
  } else {
    echo "" ?> <div class="alert alert-danger  text-center" role="alert">FAILED ! (correct your email !)</div> <?php
    }
  } else {
    echo "" ?> <div class="alert alert-danger  text-center" role="alert">FAILED ! (every element must be writed !)</div> <?php
    }
}

?>

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
      margin-top: 7%;
      margin-bottom: 50px;
    }

    .header {
      margin-bottom: 50px;
    }
  </style>

</head>

<body>

  <section class="login " id="main-page">
    <!-- Container -->
    <div class="container text-center">
      <h1 class="header ">Selamat Datang !</h1>
      <!-- ROW -->
      <div class="row justify-content-center ">
        <div class="col-md-5 ">
          <!-- Card -->
          <div class="card shadow mb-5 bg-white rounded text-center ">
            <div class="card-header">
              <div class="card-body text-left ">
                <!-- Navbar -->
                <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#home" role="tab" aria-controls="pills-home" aria-selected="true">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="pills-profile" aria-selected="false">Register</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                  </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">

                  <!-- LOGIN -->
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <form method="post" action="index.php">
                      <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="name" name="nama" class="form-control" id="nama" placeholder="Enter Your Name" required autofocus>
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                      </div>
                      <div class="form-group form-check">
                        <input name="ingat" type="checkbox" class="form-check-input" id="akun">
                        <label class="form-check-label" for="akun">Ingat Akun Ini</label>
                      </div>
                      <button type="submit" name="masuk" value="submit" class="btn btn-primary mt-2">Masuk</button>
                    </form>
                  </div>
                  <!-- Akhir LOGIN -->

                  <!-- Pendaftaran -->
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <form method="post" action="index.php">
                      <div class="form-group ">
                        <label for="Name">Nama</label>
                        <input type="name" class="form-control" name="Name" id="Name" placeholder="Enter Your Name" required>

                        <label for="Email">Email address</label>
                        <input type="email" class="form-control" name="Email" id="Email" aria-describedby="emailHelp" placeholder="Enter email" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                        <label for="Password">Password</label>
                        <input type="password" class="form-control" name="Password" id="Password" placeholder="Password" required>

                        <label>Jenis Kelamin :</label>
                        <div class="form-check form-check-inline ">
                          <input class="form-check-input" type="radio" name="Gender" id="man" value="M">
                          <label class="form-check-label" for="man">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline ">
                          <input class="form-check-input" type="radio" name="Gender" id="woman" value="F">
                          <label class="form-check-label" for="woman">Perempuan</label>
                        </div>
                        <div>
                          <button type="submit" class="btn btn-primary mt-2" name="Daftar" value="submit">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- Akhir PENDAFTARAN -->

                  <!-- CONTACT -->
                  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <form method="post" action="index.php">
                      <div class="form-group ">
                        <label for="name">Nama</label>
                        <input type="name" class="form-control" name="namestr" id="name" placeholder="Enter your name" required>
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="emailstr" id="email" aria-describedby="emailHelp" placeholder="Enter your email" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                      </div>
                      <div class="form-group ">
                        <label for="pesan">Pesan</label>
                        <textarea name="pesan" id="pesan" class="form-control" placeholder="Write Massage" required></textarea>
                      </div>
                      <button type="submit" name="message" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                  <!-- Akhir CONTACT -->
                </div>
                <!-- Akhir Navbar -->
              </div>
            </div>
          </div>
          <!-- Akhir Card -->
        </div>
      </div>
      <!-- Akhir ROW -->
    </div>
    <!-- Akhir Container -->
  </section>


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>
