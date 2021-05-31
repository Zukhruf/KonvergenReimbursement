$(document).ready(
    function() {
    $('#submits').prop('disabled', true);
  
    function validateNextButton() {
      var buttonDisabled = $('#IDKaryawan').val().trim() === '' || $('#NamaKaryawan').val().trim() === '' 
      || $('#NoTeleponKaryawan').val().trim() === '' || $('#TanggalLahir').val().trim() === '' ||
      $('#EmailKaryawan').val().trim() === '' || $('#Alamat').val().trim() === '' ||
      $('#UsernameKaryawan').val().trim() === '' || $('#PasswordKaryawan').val().trim() === '';
      $('#submits').prop('disabled', buttonDisabled);
    }
  
    $('#IDKaryawan').on('keyup', validateNextButton);
    $('#TanggalLahir').on('input', validateNextButton);
    $('#NamaKaryawan').on('keyup', validateNextButton);
    $('#Alamat').on('keyup', validateNextButton);
    $('#NoTeleponKaryawan').on('keyup', validateNextButton);
    $('#PasswordKaryawan').on('keyup', validateNextButton);
    $('#EmailKaryawan').on('keyup', validateNextButton);
    $('#UsernameKaryawan').on('keyup', validateNextButton);
  });