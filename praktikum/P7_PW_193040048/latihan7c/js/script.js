// ..pemanggilan class

const tombolCari = document.querySelector('.tombol-cari');
const keyword = document.querySelector('.keyword');
const awal = document.querySelector('.awal');


//hilangkan tombol cari
tombolCari.style.display = 'none';




//event ketika kita menuliskan keyword
keyword.addEventListener('keyup', function () {
  //ajax

  // fetch()
  fetch('ajax/ajax_cari.php?keyword=' + keyword.value)
    .then((response) => response.text())
    .then((response) => (awal.innerHTML = response));
});












// previewimage 
function previewImage() {
  const gambardefault = document.querySelector('.gambardefault');
  const imgPreview = document.querySelector('.img-preview');


  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambardefault.files[0]);

  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result;
  };
}