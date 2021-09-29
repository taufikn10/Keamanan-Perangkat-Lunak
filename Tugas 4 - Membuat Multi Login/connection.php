<?php

// mengkoneksikan ke database
$con = mysqli_connect("localhost", "root", "", "db_kpll");
if (mysqli_connect_errno()) {
  echo mysqli_connect_error();
}

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
  $hasil = mysqli_query($con, "SELECT username FROM tb_users WHERE username = '$username' ");

  // usernname
  if (mysqli_fetch_assoc($hasil)) {
      echo "<script>
      alert('Username Sudah Ada! gunakan username yang belum ada!');
      </script>";

      return false;
  }

  // email
  $hasil = mysqli_query($con, "SELECT email FROM tb_users WHERE email = '$email' ");

  // email
  if (mysqli_fetch_assoc($hasil)) {
      echo "<script>
      alert('Email Sudah Ada! gunakan email yang belum ada!');
      </script>";

      return false;
  }

  // EMAIL MULTI USER
    // Rules :
    // 1. @mhs.unesa.ac.id   => mahasiswa
    // 2. @staff.unesa.ac.id => staff
    // 3. @dosen.unesa.ac.id => dosen
    $check_extension = explode('@', $email);
    $extension_email = strtolower(end($check_extension));
    if ($extension_email == "mhs.unesa.ac.id") {
        $level = "Mahasiswa";
    } else if ($extension_email == "staff.unesa.ac.id") {
        $level = "Staff";
    } else if ($extension_email == "dosen.unesa.ac.id") {
        $level = "Dosen";
    } else {
      echo " <script> 
      alert('email anda bukan bagian dari unesa!');
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
  mysqli_query($con, "INSERT INTO tb_users VALUES('', '$username', '$email', '$pass', '0', '$level')");

  return mysqli_affected_rows($con);

}

// cookie
function _cookie(){
  global $con;
  // cookie set
  if (isset($_COOKIE['id_users']) && isset($_COOKIE['no'])) {
    $id_users = $_COOKIE['id_users'];
    $no = $_COOKIE['no'];
  
    // ambil emaile bedasarkan id
    $hasil = mysqli_query($con, "SELECT * FROM tb_users WHERE id_users = $id_users");
    $pass = mysqli_fetch_assoc($hasil);
  
    // cek cookie dan email
    if ($no === hash('sha256', $pass['email'])) {
      if ($pass['level'] == 'Mahasiswa') {
        $_SESSION['Mahasiswa'] = true;
      } elseif ($pass['level'] == "Dosen") {
          $_SESSION['Dosen'] = true;
      } elseif ($pass['level'] == "Staff") {
        $_SESSION['Staff'] = true;
    } 
    }
  }
}

// login
function _login(){

  if (isset($_POST["login"])) {
    try {
        global $con;

        $email = $_POST["email"];
        $password = $_POST["password"];

        $hasil = mysqli_query($con, "SELECT * FROM tb_users WHERE email = '$email' ") or die(mysqli_error($con));

        //cek username
        if (mysqli_num_rows($hasil) === 1) {

            // pencocokan password 
            $pass = mysqli_fetch_assoc($hasil);

            if (password_verify($password, $pass["password"])) {

                if ($pass["verifikasi"] == "1") {

                    // set session user
                    $_SESSION["id_users"] = $pass["id_users"];

                    if ($pass["level"] == "Mahasiswa") {
                        // set mahasiswa
                        $_SESSION["Mahasiswa"] = true;

                        // log aktifitas
                        $userLog = $pass["id_users"];
                        $waktuLog = date("Y-m-d H:i:s");
                        $query_log = "INSERT INTO tb_log (id_users, waktu_log) VALUES('$userLog', '$waktuLog')";

                        mysqli_query($con, $query_log) or die(mysqli_error($con));

                        // Cek Remember
                        if (isset($_POST['remember'])) {
                            // Buat Cookie
                            setcookie('id_users', $pass['id_users'], time() + 300, '/');
                            setcookie('no', hash('sha256', $pass['email']), time() + 300, '/');
                        }
                        header('location: mhs_dashboard.php');

                    } else if ($pass["level"] == "Dosen") {
                        // sesiion Dosen
                        $_SESSION["Dosen"] = true;

                        // ctatan log
                        $userLog = $pass["id_users"];
                        $waktuLog = date("Y-m-d H:i:s");
                        $query_log = "INSERT INTO tb_log(id_users, waktu_log)	VALUES('$userLog', '$waktuLog')";

                        mysqli_query($con, $query_log) or die(mysqli_error($con));

                        // Cek Remember
                        if (isset($_POST['remember'])) {
                            // Buat Cookie
                            setcookie('id_users', $pass['id_users'], time() + 300, '/');
                            setcookie('no', hash('sha256', $pass['email']), time() + 300, '/');
                        }
                        header('location: dosen_dashboard.php');

                    } else if ($pass["level"] == "Staff") {
                        // session staff
                        $_SESSION["Staff"] = true;

                        // Cek Remember
                        if (isset($_POST['remember'])) {
                            // Buat Cookie
                            setcookie('id_users', $pass['id_users'], time() + 300, '/');
                            setcookie('no', hash('sha256', $pass['email']), time() + 300, '/');
                        }
                        header('location: staff_dasboard.php');

                    } else {
                        throw new Exception("Akun Tidak Terdaftar Silahkan Melakukan Registrasi");
                    }
                } else {
                    throw new Exception("Anda Belum Meverifikasi Akun Cek Email dan Login Kembali");
                }
            } else {
                throw new Exception("Password Salah Silahkan Ulangi lagi");
            }
        } else {
            throw new Exception("Email Tidak Terdaftar Silahkan Melakukan Registrasi");
        }
        exit;
    } catch (Exception $error) {
        echo "<script>
        alert ('" . $error->getMessage() . "');
            document.location.href = 'login.php';
        </script>";
    }
}

}


// Lupa Password
function _forgot_pass($data)
{
	global $con;

	$otp = mysqli_real_escape_string($con, $data["otp"]);
	$new_pass = mysqli_real_escape_string($con, $data["new_pass"]);
	$new_pass2 = mysqli_real_escape_string($con, $data["new_pass2"]);

	$hasil = mysqli_query($con, "SELECT * FROM tb_resetpass WHERE otp = '$otp' ");

  // pencocokan Otp
	if (mysqli_num_rows($hasil) === 0) {
		echo "<script>
		alert('OTP Salah silahkan ulangi Lagi');
		</script>";

		return false;
	}

	// Pencocokan Password
	$row = mysqli_fetch_assoc($hasil); 
	if ($new_pass !== $new_pass2) {
		echo "<script>
		alert('Konfirmasi password salah');
		</script>";

		return false;
	}
	
	// mengengkripsi password
	$newPass = password_hash($new_pass2, PASSWORD_DEFAULT);

    // QUERY
    $query_hapus = "DELETE FROM tb_resetpass WHERE otp = '$otp' ";
    mysqli_query($con, $query_hapus) or die(mysqli_error($con));

    $query_update = "UPDATE tb_users SET password = '$newPass' WHERE id_users = '".$row["id_users"]."' ";
    mysqli_query($con, $query_update) or die(mysqli_error($con));

	// mengembalikan nilai true atau false
	return mysqli_affected_rows($con);
}


// verikasi email
function _verifikasi_email($email)
{
    global $con;

    //query update data tb_user
    $query_update = "UPDATE tb_users SET verifikasi = '1' WHERE email = '$email' ";
    mysqli_query($con, $query_update) or die(mysqli_error($con));

    return mysqli_affected_rows($con);
}



// show data
function query($query)
{
    global $con;

    $hasil = mysqli_query($con, $query) or die(mysqli_error($con));
    $notif = [];

    // arry
    while ($notief = mysqli_fetch_assoc($hasil)) {
        $notif[] = $notief;
    }
    return $notif;
}

//session kedaluarsa
function _timeout()
{
$waktuhabis = 2; 

$waktuhabis = $waktuhabis * 30; 
if (isset($_SESSION['session_mulai'])) {
      $setting = time() - $_SESSION['session_mulai'];
      if ($setting >= $waktuhabis) {
          session_destroy();
          header("Location: login.php");
      }
  }
  $_SESSION['session_mulai'] = time();
}

?>
