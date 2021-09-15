<?php  
// LUAS BALOK
  class luasBalok {
    public $panjang, 
           $lebar, 
           $tinggi;

    public function __construct($panjang, $lebar, $tinggi)
    {
      $this -> panjang = $panjang;
      $this -> lebar = $lebar;
      $this -> tinggi = $tinggi;
    }
    public function luasBalok()
    {
      $luas = 2 * (($this->panjang * $this->lebar) + ($this->panjang * $this->tinggi) + ($this->lebar * $this->tinggi));
      return $luas;
    }

    public function diketLuas(){
      $satu = 2 * ($this->panjang * $this->lebar);
      return $satu;
    }
    public function diketLuas2(){
      $dua = 2 * ($this ->panjang * $this->tinggi);
      return $dua;
    }
    public function diketLuas3(){
      $tiga = 2 * ($this ->lebar * $this->tinggi);
      return $tiga;
    }

  }

  // setting Post
  $panjang = @$_POST['panjang'];
  $lebar = @$_POST['lebar'];
  $tinggi = @$_POST['tinggi'];
  $satu = @$_POST['satu'];
  $dua = @$_POST['dua'];
  $tiga = @$_POST['tiga'];
  $komponenL = new luasBalok($panjang, $lebar, $tinggi);
  $satu = $komponenL -> diketLuas();
  $dua = $komponenL -> diketLuas2();
  $tiga = $komponenL -> diketLuas3();

// tombol untuk menghitung luas
  if (isset($_POST['luas'])) {
    //rumus perhitungan luas balok
    $luas_balok = $komponenL -> luasBalok();
  }

//  VOLUME
class volumeBalok {
  public $panjangv, 
         $lebarv, 
         $tinggiv;

  public function __construct($panjangv, $lebarv, $tinggiv)
  {
    $this -> panjangv = $panjangv;
    $this -> lebarv = $lebarv;
    $this -> tinggiv = $tinggiv;
  }

  public function volumeBalok(){
  
  $volume = $this->panjangv * $this->lebarv * $this->tinggiv;
  return $volume;
  }
}

  // setting Post
  $panjangv = @$_POST['panjangv'];
  $lebarv = @$_POST['lebarv'];
  $tinggiv = @$_POST['tinggiv'];
  $komponenV = new volumeBalok($panjangv, $lebarv, $tinggiv);

  if (isset($_POST['volume'])) {
    //rumus perhitungan volume balok
    $volume_balok = $komponenV -> volumeBalok();
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hitung Luas Dan Volume Balok</title>


  <!-- Style Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>

  <!-- LUAS BALOK -->
  <div class="container-fluid py-5 bg-light">
    <div class="container">
      <h1 class="mb-4">Menghitung Luas Balok</h1>
      <div class=" row">
        <div class="card col-lg-6 shadow-sm">
          <div class="mx-lg-5 py-5">
            <form action="" method="POST" enctype="multipart/form-data">

              <!-- MENGHITUNG -->
              <div class="mb-3">
                <label for="panjang" class="form-label">Panjang</label>
                <input 
                class="form-control" 
                type="text" 
                name="panjang"
                value="<?=$panjang?>"
                placeholder="masukan panjang cm"
                required onkeypress="return tAngka(event)" maxlength="15"
                >
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">Lebar</label>
                <input 
                class="form-control" 
                type="text" 
                name="lebar" 
                value="<?=$lebar?>"
                placeholder="masukan lebar cm" 
                required onkeypress='return tAngka(event)' maxlength="15"
                >
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">Tinggi</label>
                <input 
                class="form-control" 
                type="text" 
                name="tinggi" 
                value="<?=$tinggi?>"
                placeholder="masukan tinggi cm"
                required onkeypress='return tAngka(event)' maxlength="15">
              </div>

              <div class="row">
                <div class="col-4">
                  <button class="btn btn-success container" name="luas">Hitung Luas</button>
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

        <!-- HASILLLL -->
        <div class="offset-lg-1 card col-lg-5 shadow-sm" style="height: 50%;">
          <div class="mt-3">
            <h4 class="text-center"> Hasil Luas Balok </h4>
            <hr>
            <h6>Diketahui : </h6>
            <ul>
              <li>
                2(pxl) = <?php if ( isset($satu)) : ?><?= $satu; ?><?php endif; ?>  cm<sup>2</sup>
              </li>
              <li>
                2(pxt) = <?php if ( isset($dua)) : ?><?= $dua; ?><?php endif; ?>  cm<sup>2</sup>
              </li>
              <li>
                2(lxt) = <?php if ( isset($tiga)) : ?><?= $tiga; ?><?php endif; ?>  cm<sup>2</sup>
              </li>
            </ul>
            
            <div class="input-group mb-3">
              <input 
              type="text" 
              class="form-control" 
              placeholder="Hasil" 
              aria-label="measurement"
              aria-describedby="basic-addon2" 
              readonly disabled 
              value="<?php if ( isset($luas_balok)) : ?><?= $luas_balok; ?><?php endif; ?>"
              name="luas"
              >
              <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">cm<sup>3</sup></span>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- VOLUME BALOK -->
  <div class="container-fluid bg-light">
    <div class="container">
      <h1 class="mb-4">Menghitung Volume Balok</h1>
      <div class=" row">
        <div class="card mb-5 col-lg-6 shadow-sm">
          <div class="mx-lg-5 py-5">
            <form action="" method="POST" enctype="multipart/form-data">

              <!-- MENGHITUNG -->
              <div class="mb-3">
                <label for="panjang" class="form-label">Panjang</label>
                <input 
                class="form-control" 
                type="text" 
                name="panjangv"
                value="<?=$panjangv?>"
                placeholder="masukan panjang cm"
                required onkeypress="return tAngka(event)"
                >
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">Lebar</label>
                <input 
                class="form-control" 
                type="text" 
                name="lebarv" 
                value="<?=$lebarv?>"
                placeholder="masukan lebar cm"
                required onkeypress='return tAngka(event)'
                >
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">Tinggi</label>
                <input 
                class="form-control" 
                type="text" 
                name="tinggiv" 
                value="<?=$tinggiv?>"
                placeholder="masukan tinggi cm"
                required onkeypress='return tAngka(event)'
                >
              </div>

              <div class="row">
                <div class="col-4">
                  <button class="btn btn-primary container" name="volume">Hitung Volume</button>
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

        <!-- HASIl -->
        <div class="offset-lg-1 card col-lg-5 shadow-sm" style="height: 50%;">
          <div class="mt-3">
            <h4 class="text-center"> Hasil Volume Balok </h4>
            <hr>
            <h6>Diketahui : </h6>
            <ul>
              <li>
                Panjang = <?php if ( isset($komponenV->panjangv)) : ?><?= $komponenV->panjangv; ?> <?php endif; ?>  cm
              </li>
              <li>
                Lebar = <?php if ( isset($komponenV->lebarv)) : ?><?= $komponenV->lebarv; ?> <?php endif; ?>  cm
              </li>
              <li>
                Tinggi = <?php if ( isset($komponenV->tinggiv)) : ?><?= $komponenV->tinggiv; ?> <?php endif; ?>  cm
              </li>
            </ul>

            <div class="input-group mb-3">
              <input 
              type="text" 
              class="form-control" 
              placeholder="Hasil" 
              aria-label="measurement"
              aria-describedby="basic-addon2" 
              readonly disabled 
              value="<?php if ( isset($volume_balok)) : ?><?= $volume_balok; ?><?php endif; ?>" 
              name="volume"
              >
              <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">cm<sup>3</sup></span>
              </div>
            </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>







  <!-- Javascript -->
  <script src="js/setting.js"></script>
  <script src="js/bootstrap.js"></script>
</body>

</html>