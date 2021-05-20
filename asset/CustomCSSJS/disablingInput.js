function opsi(valueRole) {
  var role = valueRole.value;
  if (role == 'Admin') {
    document.getElementById('IDKaryawan').disabled = true;
    document.getElementById('NamaKaryawan').disabled = true;
    document.getElementById('UnitKerja').disabled = true;
    document.getElementById('NoTeleponKaryawan').disabled = true;
    document.getElementById('TanggalLahir').disabled = true;
    document.getElementById('JenisKelamin').disabled = true;
    document.getElementById('Alamat').disabled = true;
    document.getElementById('EmailKaryawan').disabled = true;
  } else if(role == 'Karyawan'){
    document.getElementById('IDKaryawan').disabled = false;
    document.getElementById('NamaKaryawan').disabled = false;
    document.getElementById('UnitKerja').disabled = false;
    document.getElementById('NoTeleponKaryawan').disabled = false;
    document.getElementById('TanggalLahir').disabled = false;
    document.getElementById('JenisKelamin').disabled = false;
    document.getElementById('Alamat').disabled = false;
    document.getElementById('EmailKaryawan').disabled = false;
  } else if (role == 'Finance') {
    document.getElementById('IDKaryawan').disabled = false;
    document.getElementById('NamaKaryawan').disabled = false;
    document.getElementById('UnitKerja').disabled = true;
    document.getElementById('NoTeleponKaryawan').disabled = true;
    document.getElementById('TanggalLahir').disabled = true;
    document.getElementById('JenisKelamin').disabled = true;
    document.getElementById('Alamat').disabled = true;
    document.getElementById('EmailKaryawan').disabled = true;
  }
}
