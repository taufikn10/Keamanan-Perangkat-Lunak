<?php 
require 'connection.php';

 // set cookies
_cookie();

// set session
if (!isset($_SESSION["Dosen"])) {
    header('location: login.php');
    exit;

} else {
    if (isset($_SESSION['id_users'])) {
        $id_users = $_SESSION['id_users'];
    } else {
        $id_users = $_COOKIE['id_users'];
    }
    $user = query("SELECT * FROM tb_users WHERE id_users = '$id_users' ")[0];
}
 // set timeout
_timeout();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosen Dashboard</title>
    <!-- Style Bootstrap -->
    <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.css">
    <!-- Style Css -->
    <link rel="stylesheet" href="asset/style/dosen.css?v=<?php echo time(); ?>">
</head>
<body>

<section id="nav">
<nav class="navbar navbar-light bg-dark">
  <form class="container-fluid justify-content-start">
  <a class="navbar-brand text-white" href="#">Halaman Dosen</a>
  <a href="logout.php" 
  class="btn btn-logout me-2 mx-auto" 
  onclick="return confirm('Yakin ingin Logout?')">
  <span>logout</span>
</a>
  </form>
</nav>
</section>

<section id = "side">
<div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
      <aside class="col-12 col-md-3 col-xl-2 p-0 bg-dark ">
        <nav class="navbar navbar-expand-md navbar-dark bd-dark flex-md-column flex-row align-items-center py-2 text-center sticky-top " id="sidebar">
          <div class="text-center p-3">
            <img src="asset/img/dosen.png" alt="profile picture" class="img-fluid rounded-circle my-4 p-1 d-none d-md-block shadow"/>
           <a href="#" class="navbar-brand mx-0 font-weight-bold  text-nowrap" >
             <?= $user["username"] ?>
          </a>
          </div>
              <button type="button" class="navbar-toggler border-0 order-1" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse order-last" id="nav">
            <ul class="navbar-nav flex-column w-100 justify-content-center">
            <li class="nav-item">
              <a href="#" class="nav-link active">Dashboard</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Tabel</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Tasks</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Users Info</a>
            </li>
          </ul>
          </div>      
        </nav>   
      </aside>
    </div>
  </div>
</div>
</section>

<!--  -->



  <!-- Popper Script-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <!-- Bootstrap Script -->
  <script src="asset/bootstrap/js/bootstrap.js"></script>
</body>
</html>
