<?php

require 'connection.php'; 

_cookie();

// _regisrasi();

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load PHP Mailer
require 'asset/PHPMailer/src/Exception.php';
require 'asset/PHPMailer/src/OAuth.php';
require 'asset/PHPMailer/src/PHPMailer.php';
require 'asset/PHPMailer/src/POP3.php';
require 'asset/PHPMailer/src/SMTP.php';



// JIKA SUDAH LOGIN MASUKKAN KEDALAM INDEX
if (isset($_SESSION["Mahasiswa"])) {
  header('location: mhs_dashboard.php');
  exit;
} elseif (isset($_SESSION["Dosen"])) {
  header('location: dosen_dashboard.php');
  exit;
} elseif (isset($_SESSION["Staff"])) {
  header('location: Staff_Dashboard.php');
  exit;
}
?>


<?php
// APABILA TOMBOL CONFIRM DITEKAN
if (isset($_POST["register"])) {
  if (_register($_POST) > 0) {

      global $con;
      $emailTo = $_POST["email"];

      $hasil = mysqli_query($con, "SELECT * FROM tb_users WHERE email = '$emailTo' ");

      if (mysqli_num_rows($hasil) === 1) {

          $pass = mysqli_fetch_assoc($hasil);
          $kode = uniqid();

          //Instantiation and passing `true` enables exceptions
          $mail = new PHPMailer(true);

          try {
              $mail->SMTPDebug = 0;
              $mail->isSMTP();
              //Server settings
              $mail->isSMTP();                                          //Send using SMTP
              $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                 //Enable SMTP authentication
              $mail->Username   = 'keamanan.perangakat@gmail.com';     //SMTP username
              $mail->Password   = 'potensi081';               //SMTP password
              $mail->SMTPSecure = 'ssl';                                //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
              $mail->Port       = 465;                                  //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

              //Recipients
              $mail->setFrom('keamanan.perangakat@gmail.com', 'Keamanan Perangkat Lunak');
              $mail->addAddress($emailTo);                     //Add a recipient
              $mail->addReplyTo('no-reply@gmail.com', 'No Reply');

              //Content
              $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/registerVerif.php?kode=$kode&email=$emailTo";
              $mail->isHTML(true);                              //Set email format to HTML
              $mail->Subject = 'Verifikasi Akun KPL';
              $mail->Body    = "<h1>Silahkan klik link dibawah ini untuk verifikasi akun</h1><br>
                  Klik<a href='$url'> Link Berikut </a>untuk memverifikasi";
              $mail->AltBody = 'Welcome to our site.';

              $mail->send();
          } catch (Exception $e) {
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }
      }

      echo "<script>
    alert ('Silahkan lakukan verifikasi yang telah dikirimkan ke email anda.');
     document.location.href = 'login.php';
      </script>";
  } else {
      echo mysqli_error($con);
  }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <!-- Style Bootstrap -->
  <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.css">
  <!-- Style Css -->
  <link rel="stylesheet" href="asset/style/register.css?v=<?php echo time(); ?>">
</head>
<body>
  <div class="container px-4 py-4 mx-auto">

    <div class="card card0">
        <div class="d-flex flex-lg-row flex-column-reverse">
            <div class="card card-kiri">

                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-10 my-3">
                        <h3 class="info text-center">Buat Akun Untuk Masuk</h3>
                        
                        <form action=" " method="POST" enctype="multipart/form-data">
                        <div class="form-group"> 
                          <label class="nyetting-label ">Username</label> 
                          <input 
                          autocomplete="off"
                          type="text" 
                          id="username"
                          placeholder="username" 
                          name="username" 
                          class="form-control" 
                          required
                          minlength="5" 
                          maxlength="20"
                          > 
                        </div>

                        <div class="form-group"> 
                          <label class="nyetting-label mt-2">Email</label> 
                          <input 
                          autocomplete="off"
                          type="email" 
                          id="email"
                          name="email" 
                          placeholder="email.example@gmail.com" 
                          class="form-control" 
                          required
                          minlength="5" 
                          maxlength="50"
                          oninvalid="InvalidMsg(this);" 
                          oninput="InvalidMsg(this);"
                          > 
                        </div>

                        <div class="form-group"> 
                          <label class="nyetting-label mt-2">Password</label> 
                          <input 
                          type="password" 
                          id="password" 
                          name="password" 
                          class="form-control"
                          placeholder="password" 
                          required
                          minlength="3" 
                          maxlength="20"
                          > 
                        </div>

                        <div class="form-group"> 
                          <label class="nyetting-label mt-2">Konfirmasi Password</label> 
                          <input 
                          type="password" 
                          id="password2" 
                          name="password2" 
                          class="form-control"
                          placeholder="konfirmasi password" 
                          required
                          minlength="3" 
                          maxlength="20"
                          > 
                        </div>

                        <div class="row justify-content-center my-2 px-2"> 
                          <button class="btn btn-warna" type="submit" id="register" name="register">Register</button>
                        </div>
                        </form>

                    </div>
                </div>

                
                <div class="bottom text-center mb-2">
                    <p class="sm-text mx-auto mb-3">Already have Accout?
                      <a href="login.php" class="register">Login</a>
                    </p>
                </div>
            </div>
            

            <div class="card card-kanan">
                <div class="my-auto mx-md-5 px-md-5 text-center text-responsive">
                    <h3 class="text-white">Keamanan Perangkat Lunak</h3>
                    <h5 class="text-white">Tugas - 3</h5>
                    <p class="text-white">Enkripsi registrasi, login, dan logout</p>
                </div>
            </div>

        </div>
    </div>
    
</div>
  

<!-- background animasi -->
<div class="area">
    <ul class="circles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
  

  <!-- Popper Script-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <!-- Bootstrap Script -->
  <script src="asset/bootstrap/js/bootstrap.js"></script>
  <!-- javascript -->
  <script>
      function InvalidMsg(textbox) {
  
  if    (textbox.value === '') {
      textbox.setCustomValidity
            ('Silahkan Masukkan Email!');
  }     else if (textbox.validity.typeMismatch) {
      textbox.setCustomValidity
            ('Silahkan Masukkan Email Dengan Benar!');
  }     else    {
      textbox.setCustomValidity('');
  }

  return true;
}
  </script>

</body>
</html>