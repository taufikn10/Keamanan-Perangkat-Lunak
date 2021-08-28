<?php  

// Rumus Luas Balok
/*
2(pxt) + 2(pxl) + 2(lxt)
*/

// LUAS
$panjang = @$_POST['panjang'];
$lebar = @$_POST['lebar'];
$tinggi = @$_POST['tinggi'];
$satu = @$_POST['satu'];
$dua = @$_POST['dua'];
$tiga = @$_POST['tiga'];
$luas_balok = @$_POST['luas'];

if (isset($_POST['luas'])) {

  $satu = 2*$panjang*$tinggi;
  $dua = 2*$panjang*$tinggi;
  $tiga = 2*$lebar*$tinggi;

  $luas_balok = 2*$panjang*$tinggi + 2*$panjang*$tinggi + 2*$lebar*$tinggi;
}

// VOLUME
$panjangv = @$_POST['panjangv'];
$lebarv = @$_POST['lebarv'];
$tinggiv = @$_POST['tinggiv'];
$satuv = @$_POST['satuv'];
$duav = @$_POST['duav'];
$tigav = @$_POST['tigav'];
$volume_balok = @$_POST['volume'];


if (isset($_POST['volume'])) {

  $volume_balok = $panjangv * $lebarv * $tinggiv;
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                <input class="form-control" type="text" name="panjang" placeholder="masukan panjang cm"
                  value="<?=$panjang?>" required onkeypress="return tAngka(event)">
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">Lebar</label>
                <input class="form-control" type="text" name="lebar" placeholder="masukan lebar cm" value="<?=$lebar?>"
                  required onkeypress='return tAngka(event)'>
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">Tinggi</label>
                <input class="form-control" type="text" name="tinggi" placeholder="masukan tinggi cm"
                  value="<?=$tinggi?>" required onkeypress='return tAngka(event)'>
              </div>

              <div class="row">
                <div class="col-6">
                  <button class="btn btn-success container" name="luas">Hitung Luas</button>
                </div>
                <div class="col-6">
                  <button class="btn btn-danger container" name="reset" type="reset">Reset</button>
                </div>
              </div>
          </div>
        </div>

        <!-- HASILLLL -->
        <div class="offset-lg-1 card col-lg-5 shadow-sm" style="height: 50%;">
          <div class="mt-3">
            <h4 class="text-center"> Hasil Luas Balok </h4>
            <hr>
            <?php 
             echo "Diketahui : <br>";
             echo "<ul><li> 2(pxt) = $satu cm<sup>2</sup> </li>";
             echo "<li> 2(pxl) = $dua cm<sup>2</sup> </li>";
             echo "<li> 2(lxt) = $tiga cm<sup>2</sup> </li></ul>";
            ?>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Hasil" aria-label="measurement"
                aria-describedby="basic-addon2" readonly disabled value="<?=$luas_balok?>" name="volume">
              <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">cm<sup>2</sup></span>
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
                <input class="form-control" type="text" name="panjangv" placeholder="masukan panjang cm"
                  value="<?=$panjangv?>" required onkeypress="return tAngka(event)">
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">Lebar</label>
                <input class="form-control" type="text" name="lebarv" placeholder="masukan lebar cm"
                  value="<?=$lebarv?>" required onkeypress='return tAngka(event)'>
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">Tinggi</label>
                <input class="form-control" type="text" name="tinggiv" placeholder="masukan tinggi cm"
                  value="<?=$tinggiv?>" required onkeypress='return tAngka(event)'>
              </div>

              <div class="row">
                <div class="col-6">
                  <button class="btn btn-primary container" name="volume">Hitung Volume</button>
                </div>
                <div class="col-6">
                  <button class="btn btn-danger container" name="reset" type="reset">Reset</button>
                </div>
              </div>
          </div>
        </div>

        <!-- HASIl -->
        <div class="offset-lg-1 card col-lg-5 shadow-sm" style="height: 50%;">
          <div class="mt-3">
            <h4 class="text-center"> Hasil Luas Balok </h4>
            <hr>
            <?php 
             echo "Diketahui : <br>";
             echo "<ul><li> Panjang = $panjangv cm </li>";
             echo "<li> Lebar = $lebarv cm </li>";
             echo "<li> Tinggi = $tinggiv cm </li></ul>";
            ?>

            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Hasil" aria-label="measurement"
                aria-describedby="basic-addon2" readonly disabled value="<?=$volume_balok?>" name="volume">
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




  <script src="setting.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
</body>

</html>