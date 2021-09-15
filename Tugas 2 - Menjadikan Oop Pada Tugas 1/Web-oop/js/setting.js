// Setting Konversi Nilai
function tAngka(event) {
  var angka = (event.which) ? event.which : event.keyCode
  if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
    return false;
  return true;
}

function tNama(evt) {
  var nama = (evt.which) ? evt.which : event.keyCode
  if ((nama < 65 || nama > 90) && (nama < 97 || nama > 122) && nama > 32)
    return false;
  return true;
}