<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo base_url()."asset/CustomCSSJS/ModalJavascript.js"?>"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url()."asset/CustomCSSJS/HeaderStyle.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/CustomCSSJS/BodyCustomStyle.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/FA/fontawesome/css/all.css" ?>">
    <link rel="icon" href="<?php echo base_url()."asset/Icon&IllustrationKRMS/favicon.ico"; ?>">
    <title>Reimbursement Management System</title>
  </head>
  <body>
    <!--Header-->
    <?php $tanggal_lahir_karyawan; ?>
    <?php foreach ($dataKaryawan as $karyawan) : ?>
    <nav class="navbar navbar-expand-lg navbar-light" id="navbarHeader">
      <div class="container-fluid">
        <a class="navbar-brand ms-2" id="logoColor" href="#"><img src="<?php echo base_url()."asset/Icon&IllustrationKRMS/Logo_KRMS.svg"; ?>" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarCollapseContent"
        aria-controls="navbarCollapseContent" aria-expanded="false"
        aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapseContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link text-light" href="#"><i class="far fa-user"></i></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $this->session->userdata('role'); ?>, <?php echo $this->session->userdata('username'); ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#"><i class="fas fa-key me-2"></i>Ubah Password</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url()."index.php/AdminController/logout"; ?>"><i class="fas fa-sign-out-alt me-2"></i>Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--body-->
    <div class="container-fluid ms-auto me-auto" id="bodyContent">
      <!--Upper Navbar Content-->
      <div class="d-flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb ms-2 mt-2" id="breadcrumbs">
            <a href="<?php echo base_url()."index.php/KaryawanController/"; ?>"><button type="button" name="button" class="btn me-1 mb-1 rounded" id="btnBack"><i class="fas fa-arrow-left"></i></button></a>
            <li class="breadcrumb-item"><a href="<?php echo base_url()."index.php/KaryawanController/"; ?>"><?php echo $karyawan->id_user; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Password</li>
          </ol>
        </nav>
        <button type="button" class="btn btn-outline-primary shadow ms-auto me-1 mb-2 rounded" name="button" id="btnHapusFilter"><i class="fas fa-trash-alt me-2"></i>HAPUS REIMBURSEMENT</button>
      </div>
      <!--Detail Karyawan-->
      <?= isset($_SESSION['p']) ? $_SESSION['p'] : "" ?>
      <form class="" action="<?php echo base_url()."index.php/KaryawanController/changePass/". $karyawan->id_user/ ?>" method="post">
        <div class="container-fluid" id="detailBodyContent">
          <div class="d-flex mb-4">
            <h1 class="h3 mt-1">Ubah Password</h1>
            <button type="button" class="btn rounded btn-outline-primary btn-confirmation ms-auto me-2 mb-2 shadow" name="button" data-bs-toggle="modal" data-bs-target="#modalEditKaryawan"><i class="far fa-edit me-2"></i>UBAH DETAIL</button>
          </div>
          <div class="d-flex">
            <div class="container-fluid">
              <div class="mb-3">
                <label for="inputNamaReimbursement" class="col-sm-2 col-form-label">Password Lama <span class="red-star">*</span></label>
                <div class="col-sm">
                  <input type="password" name="pass_lama" value="" class="form-control" id="PasswordLama" placeholder="<?php echo $detail->nama_reimbursement; ?>">
                  <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
              </div>
              <div class="mb-3">
                <label for="inputNamaReimbursement" class="col-sm-2 col-form-label">Password Baru <span class="red-star">*</span></label>
                <div class="col-sm">
                  <input type="password" name="pass_baru" value="" class="form-control" id="PasswordBaru" placeholder="<?php echo $detail->nama_reimbursement; ?>">
                  <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
              </div>
              <div class="mb-3">
                <label for="inputNamaReimbursement" class="col-sm-2 col-form-label">Ulangi Password Baru <span class="red-star">*</span></label>
                <div class="col-sm">
                  <input type="password" name="konfirmasi_pass_baru" value="" class="form-control" id="KonfirmasiPasswordBaru" placeholder="<?php echo $detail->nama_reimbursement; ?>">
                  <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex">
          <button type="button" class="btn btn-confirmation rounded btn-outline-primary me-2 mb-2 shadow" data-bs-dismiss="modal" name="button"><i class="fas fa-times me-2"></i>Batal</button>
          <button type="submit" class="btn btn-confirmation rounded btn-outline-primary me-2 mb-2 shadow" name="button"><i class="fas fa-check me-2"></i>Simpan</button>
        </div>
      </form>
    </div>
    <!-- footer -->
    </br></br></br>
    <footer>
      <div class="container text-center mb-3">
        <div class="row">
          <div class="col-sm-12">
            <p>&copy; Copyright 2021 | KRMS All Right Reserved</p>
          </div>
        </div>
      </div>
    </footer>
  <?php endforeach; ?>
    <!-- footer -->
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script>
	$(".toggle-password").click(function() {
		$(this).toggleClass("fa-eye fa-eye-slash");
		var input = $($(this).attr("toggle"));
		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});
</script>
</html>
