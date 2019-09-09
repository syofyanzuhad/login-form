

require('Controller log.php');
if (isset($_POST['Daftar'])) {
  $nama = $_POST['Name'];
  $password = sha1($_POST['Password']);
  $email = $_POST['Email'];
  $gender = $_POST['Gender'];

  $daftar = new Controller();
  $register = $daftar->register($nama, $password, $email, $gender);
  if ($register == "Success") {
    header('Location: index.php');
  }
} elseif (isset($_POST['masuk'])) {
  $namain = $_POST['nama'];
  $passin = $_POST['password'];

  $login = new Controller();
  $masuk = $login->logname($namain);
  $result = $masuk->fetch(PDO::FETCH_OBJ);
  // print_r($result->username);

  if ($result->username == $namain) {
    if ($result->pass == $passin) {
      header('Location: Beranda.php');
    } else {
      echo "" ?> <div class="alert alert-danger fixed-top text-center" role="alert">LOGIN FAILED ! (wrong password !)</div> <?php
    }
  } else {
    echo "" ?> <div class="alert alert-danger fixed-top text-center" role="alert">LOGIN FAILED ! (wrong username !)</div> <?php
  }
} elseif (isset($_POST['message'])) {
  $namestr = $_POST['namestr'];
  $emailstr = $_POST['emailstr'];
  $messagestr = $_POST['pesan'];

  $to = "sofyanzuhad2@gmail.com";
  $subject = "Message From Stranger";
  $message = "Name : ".$namestr."\n"."SEND YOU A MESSAGE !"."\n".$messagestr;
  $headers = "From: ". $emailstr . "\r\n";
  echo $headers;

    if (mail($to, $subject, $message, $headers)) {
      echo "" ?> <div class="alert alert-success fixed-top text-center" role="alert">EMAIL SENDED ! Thank You !</div> <?php
    } else {
      echo "" ?> <div class="alert alert-danger  text-center" role="alert">EMAIL FAILED ! (correct your email !)</div> <?php
      echo  $headers;
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
          <div class="card text-center">
            <div class="card-header">
              <div class="card-body text-left ">
                <!-- Navbar -->
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Register</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                  </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">

                  <!-- LOGIN -->
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <form method="post" action="index.php">
                      <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="name" name="nama" class="form-control" id="nama" placeholder="Enter Your Name">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                      </div>
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="akun">
                        <label class="form-check-label" for="akun">Ingat Akun Ini</label>
                      </div>
                      <button type="submit" name="masuk" value="submit" class="btn btn-primary mt-2">Masuk</button>
                    </form>
                  </div>
                  <!-- Akhir LOGIN -->

                  <!-- Pendaftaran -->
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <form method="post" action="index.php">
                      <div class="form-group ">
                        <label for="Name">Nama</label>
                        <input type="name" class="form-control" name="Name" id="Name" placeholder="Enter Your Name">

                        <label for="Email">Email address</label>
                        <input type="email" class="form-control" name="Email" id="Email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                        <label for="Password">Password</label>
                        <input type="password" class="form-control" name="Password" id="Password" placeholder="Password">

                        <label>Jenis Kelamin :</label>
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

                  <!-- CONTACT -->
                  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <form method="post" action="index.php">
                      <div class="form-group ">
                        <label for="name">Nama</label>
                        <input type="name" class="form-control" name="namestr" id="name" placeholder="Enter your name">
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="emailstr" id="email" aria-describedby="emailHelp" placeholder="Enter your email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                      </div>
                      <div class="form-group ">
                        <label for="pesan">Pesan</label>
                        <textarea name="pesan" id="pesan" class="form-control" placeholder="Write Massage"></textarea>
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
