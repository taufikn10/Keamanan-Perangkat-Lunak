<?php
require 'connection.php';

 // set cookies
_cookie();

// loogin
_login();

// set session
if (isset($_SESSION["Mahasiswa"])) {
  header('location: mhs_dashboard.php');
  exit;
} elseif (isset($_SESSION["Dosen"])) {
  header('location: dosen_dashboard.php');
  exit;
} elseif (isset($_SESSION["Staff"])) {
  header('location: staff_dasboard.php');
  exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <!-- Style Bootstrap -->
  <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.css">
  <!-- Style Css -->
  <link rel="stylesheet" href="asset/style/login.css?v=<?php echo time(); ?>">
</head>
<body>


  <div class="container px-4 py-5 mx-auto">
    <div class="card">
        <div class="d-flex flex-lg-row flex-column-reverse">
            <div class="card card-kiri">
                <div class="row justify-content-center my-auto">


                    <div class="col-md-8 col-10 my-4">
                        <h3 class="info text-center">Silahkan Login Untuk Masuk</h3>
                        <form action="" method="POST" enctype="multipart/form-data" >
                        <div class="form-group"> 
                          <label class="nyetting-label">Email</label> 
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
                          placeholder="password" 
                          class="form-control"
                          required
                          minlength="3" 
                          maxlength="20"
                          >  
                        </div>

                        <div class="row justify-content-center my-2 mt-4"> 
                          <div class="form-group col-8">
                            <input name="remember" type="checkbox" id="cbx" class="inp-cbx" style="display: none;" />
                            <label class="cbx" for="cbx">
                              <span>
                                <svg width="12px" height="10px" viewbox="0 0 12 10">
                                  <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                </svg>
                              </span>
                              <span>Remember me</span>
                            </label>
                          </div>
                          <div class="col-4 col-sm-4">
                          <a href="forgot.php" class="text-muted forgot">
                            <small>Forgot Password?</small>
                          </a> 
                        </div>
                        </div>
                        
                        <div class="row justify-content-center my-2 px-2"> 
                          <button class="btn btn-warna" type="submit" id="login" name="login">Login</button>
                        </div>
                        </form>
                    </div>
                </div>
                
                <div class="bottom text-center mb-4">
                    <p class="sm-text mx-auto mb-3">Don't have an account?
                      <a href="register.php" class="register">Register</a>
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
<div class="stars">
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
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