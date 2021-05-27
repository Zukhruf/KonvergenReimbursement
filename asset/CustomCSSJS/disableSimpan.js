$(document).ready(function() {
    $('#submit').prop('disabled', true);
  
    function validateNextButton() {
      var buttonDisabled = $('#NamaReimbursement').val().trim() === '' || $('#TanggalPembelian').val().trim() === '' || $('#NominalPembelian').val().trim() === '' ||
      $('#formFilePhoto1').val().trim() === '';
      $('#submit').prop('disabled', buttonDisabled);
    }
  
    $('#NamaReimbursement').on('keyup', validateNextButton);
    $('#TanggalPembelian').on('input', validateNextButton);
    $('#NominalPembelian').on('keyup', validateNextButton);
    $('#formFilePhoto1').on('input', validateNextButton);
  });