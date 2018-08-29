function nilaiValue(selTag) {
    var nilai = document.getElementById("nilai");
    var kategori = selTag.options[selTag.selectedIndex].value;
    nilai.value = document.getElementById("nilai_kategori_"+kategori).value;
}
