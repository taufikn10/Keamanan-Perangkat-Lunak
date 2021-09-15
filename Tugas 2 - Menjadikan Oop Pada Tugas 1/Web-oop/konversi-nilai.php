<?php 
  class konversiNilai {
    public $nim, 
           $nama, 
           $matakuliah,
           $absen,
           $tugas,
           $uts,
           $uas;
    
    public function __construct($nim, $nama, $matakuliah, $absen, $tugas, $uts, $uas)
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->matakuliah = $matakuliah;
        $this->absen = $absen;
        $this->tugas = $tugas;
        $this->uts = $uts;
        $this->uas = $uas;
    }

    public function absen()
    {
        $this->absen = $this->absen;
        return $this->absen;
    }

    public function tugas()
    {
        $this->tugas = $this->tugas;
        return $this->tugas;
    }

    public function uts()
    {
        $this->uts = $this->uts;
        return $this->uts;
    }

    public function Uas()
    {
        $this->uas = $this->uas;
        return $this->uas;
    }

    public function perhitungan()
    {
        $total = (2 * $this->absen + 3 * $this->tugas + 2* $this->uts + 3*$this->uas) / 10;
        return $total;
    }

  }
  
  // setting Post
  $nim = @$_POST['nim'];
  $nama = @$_POST['nama'];
  $matakuliah = @$_POST['matakuliah'];
  $absen = @$_POST['absen'];
  $tugas = @$_POST['tugas'];
  $uts = @$_POST['uts'];
  $uas = @$_POST['uas'];
  $Komponen = new konversiNilai($nim, $nama, $matakuliah, $absen, $tugas, $uts, $uas);

// untuk menampilkan matakuliah
  if (isset($_POST['tampilkan'])) {
  $matakuliah = $_POST['matakuliah'];
  }

// tombol untuk menampilkan
  if(isset($_POST['tampilkan'])){

  	//rumus perhitungan nilai
  	$total = $Komponen->perhitungan();

  	//grade nilai total 
  	if($total >= 100){
  		$grade = 4 ; $index = "A";
  	}elseif($total >= 85 && $total < 100){
  		$grade = 4 ; $index = "A"; 
  	}elseif($total >= 80 && $total < 85){
  		$grade = 3.75 ; $index = "A-";
  	}elseif($total >= 75 && $total < 80){
  		$grade = 3.5 ; $index = "B+";
  	}elseif($total >= 70 && $total < 75){
  		$grade = 3 ; $index = "B";
  	}elseif($total >= 65 && $total < 70){
  		$grade = 2.75 ; $index = "B-";
  	}elseif($total >= 60 && $total < 65){
  		$grade = 2.5 ; $index = "C+";
  	}elseif($total >= 55 && $total < 60){
  		$grade = 2 ; $index = "C";
  	}elseif($total >= 40 && $total < 55){
  		$grade = 1 ; $index = "D";
  	}else{
  		$grade = 0 ; $index = "E";
  	}
  }

?>

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
                <input 
                class="form-control" 
                type="text" name="nim" 
                placeholder="masukan nim" 
                value="<?=$nim?>" 
                required
                onkeypress="return tAngka(event) " 
                maxlength="11"
                >
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input 
                class="form-control"
                type="text" 
                name="nama" 
                placeholder="masukan nama" 
                value="<?=$nama?>"
                required 
                maxlength="45" 
                onkeypress='return tNama(event)'
                >
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
                <input 
                class="form-control" 
                type="number" 
                name="absen" 
                placeholder="masukan nilai partisipasi"
                value="<?=$absen?>" 
                required 
                onkeypress="return tAngka(event)"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                maxlength="5" min="0" max="100" step="any"
                >
              </div>

              <div class="mb-3">
                <label for="tugas" class="form-label">Nilai Tugas</label>
                <input 
                class="form-control" 
                type="number" 
                name="tugas" 
                placeholder="masukan nilai tugas"
                value="<?=$tugas?>" 
                required onkeypress="return tAngka(event)"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                maxlength="5" min="0" max="100" step="any">
              </div>

              <div class="mb-3">
                <label for="uts" class="form-label">Nilai UTS</label>
                <input 
                class="form-control" 
                type="number" 
                name="uts" 
                placeholder="masukan nilai UTS" 
                value="<?=$uts?>"
                required 
                onkeypress="return tAngka(event)"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                maxlength="5" min="0" max="100" step="any"
                >
              </div>

              <div class="mb-5">
                <label for="uas" class="form-label">Nilai UAS</label>
                <input 
                class="form-control" 
                type="number" 
                name="uas" 
                placeholder="masukan nilai UAS" 
                value="<?=$uas?>"
                required onkeypress="return tAngka(event)"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                maxlength="5" min="0" max="100" step="any"
                >
              </div>
              <div class="row">
                <div class="col-4">
                  <button class="btn btn-primary container" name="tampilkan">Tampilkan Nilai</button>
                </div>
                <div class="col-4">
                  <button class="btn btn-danger container" name="reset" type="reset">Hapus</button>
                </div>
                <div class="col-4">
                  <button onClick="window.location.reload();" class="btn btn-warning container">Refresh Page</button>
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
              <input 
              class="form-control" 
              type="text" 
              aria-label="Disabled input example" 
              disabled readonly 
              name="nim"
              value="<?=$nim?>">
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input 
              class="form-control" 
              type="text" 
              aria-label="Disabled input example" 
              disabled readonly 
              name="nama"
              value="<?=$nama?>">
            </div>
            <div class="mb-3">
              <label for="nim" class="form-label">Mata Kuliah</label>
              <input 
              class="form-control" 
              type="text" 
              aria-label="Disabled input example" 
              disabled readonly
              name="matakuliah" value="<?=$matakuliah?>">
            </div>
            <div class="mb-3">
              <label for="nim" class="form-label">Nilai Akhir</label>
              <input 
              class="form-control" 
              type="text" 
              aria-label="Disabled input example" 
              disabled readonly 
              name="total"
              value="<?php if ( isset($total)) : ?><?= $total; ?> <?php endif; ?>">
            </div>
            <div class="mb-3">
              <label for="nim" class="form-label">Konversi Angka</label>
              <input 
              class="form-control" 
              type="text" 
              aria-label="Disabled input example" 
              disabled readonly 
              name="grade"
              value="<?php if ( isset($grade)) : ?><?= $grade ?><?php endif; ?>">
            </div>
            <div class="mb-3">
              <label for="nim" class="form-label">Konversi Huruf</label>
              <input 
              class="form-control" 
              type="text" 
              aria-label="Disabled input example" 
              disabled readonly 
              name="index"
              value="<?php if (isset($index)) : ?><?= $index ?><?php endif; ?>">
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