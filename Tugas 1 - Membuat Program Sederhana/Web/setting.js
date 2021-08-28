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


function fetchgo() {
  // (A) GET FORM DATA
  let data = new URLSearchParams();
  data.append("panjang", document.getElementById("panjang1").value);
  data.append("lebar", document.getElementById("lebar1").value);
  data.append("tinggi", document.getElementById("tinggi1").value);

  // (B) FETCH
  fetch("luas-volume.php", {
      method: 'POST',
      body: data
    })
    .then(function (response) {
      return response.text();
    })
    .then(function (text) {
      console.log(text);
    })
    .catch(function (error) {
      console.log(error)
    });

  // (C) PREVENT HTML FORM SUBMIT
  return false;
}