<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konversi Nilai</title>

  <!-- Style Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.css">
</head>

<?php 

// GRADE NILAI
/*
A = 85 - 100
A- = 85  - 80
B+ = 75 - 80
B = 70 - 75
B- = 65 - 70
C+ = 60 -65
C = 55 - 60
D = 40 - 55
E = 0 - 40
*/

$nim = @$_POST['nim'];
$nama = @$_POST['nama'];
$matakuliah = @$_POST['matakuliah'];
$absen = @$_POST['absen'];
$tugas = @$_POST['tugas'];
$uts = @$_POST['uts'];
$uas = @$_POST['uas'];
$total = @$_POST['total'];
$grade = @$_POST['grade'];

// untuk menampilkan matakuliah
  if (isset($_POST['tampilkan'])) {
  $matakuliah = $_POST['matakuliah'];
  }

  // tombol untuk menampilkan
  if(isset($_POST['tampilkan'])){

  	//rumus perhitungan nilai
  	$total = (2*$absen + 3*$tugas + 2*$uts + 3*$uas) / 10;

  	//grade nilai total 
  	if($total >= 100){
  		$grade = "A" ;
  	}elseif($total >= 85 && $total < 100){
  		$grade = "A" ; 
  	}elseif($total >= 80 && $total < 85){
  		$grade = "A-";
  	}elseif($total >= 75 && $total < 80){
  		$grade = "B+";
  	}elseif($total >= 70 && $total < 75){
  		$grade = "B";
  	}elseif($total >= 65 && $total < 70){
  		$grade = "B-";
  	}elseif($total >= 60 && $total < 65){
  		$grade = "C+";
  	}elseif($total >= 55 && $total < 60){
  		$grade = "C";
  	}elseif($total >= 40 && $total < 55){
  		$grade = "D";
  	}else{
  		$grade = "E" ;
  	}
  }

?>

<body>
  <div class="container-fluid py-5 bg-light">
    <div class="container">
      <h1 class="text-center mb-5">Konversi Nilai Mahasiswa</h1>
      <div class="row">
        <div class="card col-lg-7 shadow-sm mb-2" style="height: 50%;">
          <div class="mx-lg-5 py-5">
            <form method="POST" action="" enctype="multipart/form-data">

              <!-- MENGHITUNG -->
              <div class=" mb-3">
                <label for="nim" class="form-label">Nim</label>
                <input class="form-control" type="text" name="nim" placeholder="masukan nim" value="<?=$nim?>" required
                  onkeypress="return tAngka(event) " maxlength="11">
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input class="form-control" type="text" name="nama" placeholder="masukan nama" value="<?=$nama?>"
                  required maxlength="45" onkeypress='return tNama(event)'>
              </div>

              <div class=" form-group">
                <div class="mb-3">
                  <label class="mb-3">Mata Kuliah</label>
                  <select name="matakuliah" class="form-control" required>
                    <option value="">Pilih Mata Kuliah</option>
                    <option value="Sistem Pendukung Keputusan">Sistem Pendukung Keputusan</option>
                    <option value="Pengembangan Applikasi Permainan">Pengembangan Aplikasi Permainan</option>
                    <option value="Sistem Informasi Geografis">Sistem Informasi Geografis</option>
                    <option value="Keamanan Perangkat Lunak">Keamanan Perangkat Lunak</option>
                    <option value="Analisis Big Data">Analisis Big Data</option>
                  </select>
                </div>
              </div>

              <div class="mb-3">
                <label for="absen" class="form-label">Nilai Partisipasi</label>
                <input class="form-control" type="number" name="absen" placeholder="masukan nilai partisipasi"
                  value="<?=$absen?>" required onkeypress="return tAngka(event)"
                  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                  maxlength="5" min="0" max="100" step="any">
              </div>

              <div class="mb-3">
                <label for="tugas" class="form-label">Nilai Tugas</label>
                <input class="form-control" type="number" name="tugas" placeholder="masukan nilai tugas"
                  value="<?=$tugas?>" required onkeypress="return tAngka(event)"
                  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                  maxlength="5" min="0" max="100" step="any">
              </div>

              <div class="mb-3">
                <label for="uts" class="form-label">Nilai UTS</label>
                <input class="form-control" type="number" name="uts" placeholder="masukan nilai UTS" value="<?=$uts?>"
                  required onkeypress="return tAngka(event)"
                  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                  maxlength="5" min="0" max="100" step="any">
              </div>

              <div class="mb-5">
                <label for="uas" class="form-label">Nilai UAS</label>
                <input class="form-control" type="number" name="uas" placeholder="masukan nilai UAS" value="<?=$uas?>"
                  required onkeypress="return tAngka(event)"
                  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                  maxlength="5" min="0" max="100" step="any">
              </div>
              <div class="row">
                <div class="col-6">
                  <button class="btn btn-primary container" name="tampilkan">Tampilkan Nilai</button>
                </div>
                <div class="col-6">
                  <button class="btn btn-danger container" name="reset" type="reset">Reset</button>
                </div>
                <div class="container mt-3" style="width: 100px;">
                  <a class="btn btn-info" role="button" href="index.php">Kembali</a>
                </div>
              </div>
          </div>
        </div>


        <!-- HASILL -->
        <div class="offset-lg-1 card col-lg-4 shadow-sm">
          <div class="mt-3">
            <h4 class="text-center"> Hasil Nilai </h4>
            <hr>
            <div class="mb-3">
              <label for="nim" class="form-label">Nim</label>
              <input class="form-control" type="text" aria-label="Disabled input example" disabled readonly name="nim"
                value="<?=$nim?>">
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input class="form-control" type="text" aria-label="Disabled input example" disabled readonly name="nama"
                value="<?=$nama?>">
            </div>
            <div class="mb-3">
              <label for="nim" class="form-label">Mata Kuliah</label>
              <input class="form-control" type="text" aria-label="Disabled input example" disabled readonly
                name="matakuliah" value="<?=$matakuliah?>">
            </div>
            <div class="mb-3">
              <label for="nim" class="form-label">Nilai Akhir</label>
              <input class="form-control" type="text" aria-label="Disabled input example" disabled readonly name="total"
                value="<?=$total?>">
            </div>
            <div class="mb-3">
              <label for="nim" class="form-label">Konversi Nilai</label>
              <input class="form-control" type="text" aria-label="Disabled input example" disabled readonly name="grade"
                value="<?=$grade?>">
            </div>
            <hr>
            <h5 class="text-center">Keterangan Nilai</h5>
            <p>Nilai Akhir (NA) dihitung dengan rumus berikut:</p>
            <div class="container offset-lg-1">
              <img src="img/na.png" alt="nilai akhir">
            </div>
            <p class="mt-1">Konversi nilai skala 0–100 menjadi skala 0–4 dan huruf diatur sebagai berikut:</p>
            <img src="img/kn.png" alt="konversi nilai" width="100%">
            <hr>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Javascript -->
  <script src="js/setting.js"></script>
  <script src="js/bootstrap.js"></script>
  <script>
    function changeHandler(val) {
      if (Number(val.value) > 100) {
        val.value = 100
      }
    }
  </script>

</body>

</html>