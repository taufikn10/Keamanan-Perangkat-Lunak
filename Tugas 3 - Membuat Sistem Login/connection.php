<?php
// mengkoneksikan ke database
$con = mysqli_connect("localhost", "root", "", "db_kpl");

//time
date_default_timezone_set('Asia/Jakarta');

// session
session_start();


// registrasi
function _register($data) {
  global $con;

  $username = strtolower(stripslashes( $data["username"]));
  $email = strtolower(stripcslashes($data["email"]));
  $password = mysqli_real_escape_string($con, $data["password"]);
  $password2 = mysqli_real_escape_string($con, $data["password2"]);

  // usernname
  $result = mysqli_query($con, "SELECT username FROM users WHERE username = '$username' ");

  // usernname
  if (mysqli_fetch_assoc($result)) {
      echo "<script>
      alert('Username Sudah Ada! gunakan username yang belum ada!');
      </script>";

      return false;
  }

  // email
  $result = mysqli_query($con, "SELECT email FROM users WHERE email = '$email' ");

  // email
  if (mysqli_fetch_assoc($result)) {
      echo "<script>
      alert('Email Sudah Ada! gunakan email yang belum ada!');
      </script>";

      return false;
  }

  // confirm password
  if ( $password != $password2) {
      echo " <script> 
      alert('konfirmasi password tidak sesuai!');
      </script>";
    return false;
  } 

  // enkripsi password
  $pass = password_hash($password2, PASSWORD_DEFAULT);

  // menambahkan user
  mysqli_query($con, "INSERT INTO users VALUES('', '$username', '$email', '$pass')");

  return mysqli_affected_rows($con);

}


// cookie
function _cookie(){
  global $con;
  // cookie set
  if (isset($_COOKIE['yo']) && isset($_COOKIE['no'])) {
    $yo = $_COOKIE['yo'];
    $no = $_COOKIE['no'];
  
    // ambil emaile bedasarkan id
    $hasil = mysqli_query($con, "SELECT email FROM users WHERE id = $yo");
    $pass = mysqli_fetch_assoc($hasil);
  
    // cek cookie dan email
    if ($no === hash('sha256', $pass['email'])) {
      $_SESSION['login'] = true;
    }
  }
}


// login
function _login(){
  global $con;
  
  if (isset ($_POST["login"])) {

    $email = $_POST ["email"];
    $password = $_POST ["password"];
  
    $hasil = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
  
    // cek username
    if( mysqli_num_rows($hasil) === 1){
        // password
        $pass = mysqli_fetch_assoc($hasil);
        if (password_verify($password, $pass["password"])){
          // session  
          $_SESSION["login"] = true;
          
          // cek remember me
          if (isset($_POST['remember'])) {
            // cookie
            setcookie('yo', $pass['id'], time()+60 );
            setcookie('no', hash('sha256', $pass['username']), time()+60);
          }
          header("Location: index.php");
          exit;
        }
    }
  } 
}

// jika password salah
if (isset($_POST["login"])) {
  try {
      if (_login($_POST) == false) {
        //throw exception if email is not valid
          throw new Exception("Email atau password Salah");
      }
      header('location: index.php');
      exit;
  } catch (Exception $noValid) {
      echo "<script>
      alert ('" . $noValid->getMessage() . "');
          document.location.href = 'login.php';
      </script>";
  }
}


?>