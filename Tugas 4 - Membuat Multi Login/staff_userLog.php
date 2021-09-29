<?php 

require 'connection.php';

 // set cookies
 _cookie();

 // set session
 if (!isset($_SESSION["Staff"])) {
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

<?php
// KONFIGURASI PAGINATION
$jumlahDataPerHalaman = 10;
$jumlahData = count(query("SELECT * FROM tb_users"));
$jumlahHalaman =  ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

//QUERY :
$data_user = query("SELECT * FROM tb_users LIMIT $awalData, $jumlahDataPerHalaman");

$data_log = query("SELECT tb_users.username, tb_users.email, tb_log.waktu_log FROM tb_log INNER JOIN tb_users ON tb_log.id_users = tb_users.id_users LIMIT $awalData, $jumlahDataPerHalaman");
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Log</title>

	<link href="staff/css/app.css?v=<?php echo time(); ?>" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<!-- Side Bar -->
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="staff_dasboard.php">
          <span class="align-middle">Halaman Staff</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="staff_dasboard.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>
					
					<li class="sidebar-item ">
						<a class="sidebar-link" href="staff_dataUser.php">
              <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Data User</span>
            </a>
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="staff_userLog.php">
              <i class="align-middle" data-feather="list"></i> <span class="align-middle">User Log</span>
            </a>
					</li>


			</div>
		</nav>

		<div class="main">
			<!-- navbar -->
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">

						<!-- profile -->
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                <img src="staff/img/avatars/avatar.jpg" class="avatar img-fluid rounded mr-1" alt="staff" /> 
								<span class="text-dark">
								<?= $user["username"] ?>
							</span>
              </a>

							<div class="dropdown-menu dropdown-menu-right mt-4">
							<a class="dropdown-item" href="logout.php" onclick="return confirm('Yakin ingin Logout?')">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<!-- Table -->
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">User Log</h1>

					<div class="row">

						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title text-center">Riwayat Login</h5>
									<hr>
								</div>
								<div class="table-responsive">
									<table class="table mb-0">
										<thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col">Username</th>
												<th scope="col">Email</th>
												<th scope="col">Proses Login</th>
												<!-- <th scope="col">Heading</th> -->
											</tr>
										</thead>
										<tbody>
										<?php $no = 1; ?>
                            <?php foreach ($data_log as $dl) : ?>

                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $dl["username"]; ?></td>
                                    <td><?= $dl["email"]; ?></td>
                                    <td><?= $dl["waktu_log"]; ?></td>
                                </tr>

                                <?php $no++ ?>
                            <?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>
				        <!-- start pagination -->
								<div class="justify-content-center">
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">

              <!-- satrt tanda panah menurun -->
              <li class="page-item" style="cursor: pointer;">
                <?php if ($halamanAktif > 1) : ?>
                  <a class="page-link" href="staff_dataUser.php?halaman=<?= $halamanAktif - 1; ?>#content" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <?php else : ?>
                    <a class="page-link" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">Previous</span>
                    </a>
                  <?php endif; ?>
                </li>
                <!-- end tanda panah menurun-->

                <!-- start pagination menampilkan halaman -->
                <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                  <?php if ($i == $halamanAktif) : ?>
                    <li class="page-item active">
                      <a class="page-link" href="staff_dataUser.php?halaman=<?= $i; ?>#content">
                        <span><?= $i; ?></span>
                      </a>
                    </li>
                    <?php else : ?>
                      <li class="page-item">
                        <a class="page-link" href="staff_dataUser.php?halaman=<?= $i; ?>#content">
                          <span><?= $i; ?></span>
                        </a>
                      </li>
                    <?php endif; ?>
                  <?php endfor; ?>
                  <!-- end pagination menampilkan halaman -->

                  <!-- start tanda panah tambah -->
                  <li class="page-item" style="cursor: pointer;">
                    <?php if ($halamanAktif < $jumlahHalaman) : ?>
                      <a class="page-link" href="staff_dataUser.php?halaman=<?= $halamanAktif + 1; ?>#content" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                      </a>
                      <?php else : ?>
                        <a class="page-link" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                          <span class="sr-only">Next</span>
                        </a>
                      <?php endif; ?>
                    </li>

                  </ul>
                </nav>
              </div>
              <!-- end pagination -->
			</main>
			</div>
			</div>

			<script src="staff/js/app.js"></script>

</body>

</html>
