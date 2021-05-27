<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo base_url()."asset/CustomCSSJS/ModalJavascript.js"?>"></script>
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
        <button type="button" name="button" class="btn me-1 mb-1 rounded" id="btnBack"><i class="fas fa-arrow-left"></i></button>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb ms-2 mt-2" id="breadcrumbs">
            <li class="breadcrumb-item"><a href="<?php echo base_url()."index.php/AdminController/"; ?>">Daftar Karyawan</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $karyawan->id_user; ?></li>
          </ol>
        </nav>
        <button type="button" class="btn btn-outline-primary shadow ms-auto me-1 mb-2 rounded" name="button" id="btnHapusFilter"><i class="fas fa-trash-alt me-2"></i>HAPUS REIMBURSEMENT</button>
      </div>
      <!--Detail Karyawan-->
      <div class="container-fluid" id="detailBodyContent">
        <div class="d-flex mb-4">
          <h1 class="h3 mt-1">Detail Karyawan</h1>
          <button type="button" class="btn rounded btn-outline-primary btn-confirmation ms-auto me-2 mb-2 shadow" name="button" data-bs-toggle="modal" data-bs-target="#modalEditKaryawan"><i class="far fa-edit me-2"></i>UBAH DETAIL</button>
        </div>
        <div class="d-flex">
          <div class="container-fluid">
            <p>ID Karyawan          : <?php echo $karyawan->id_user; ?></p>
            <p>Nama karyawan        : <?php echo $karyawan->nama_karyawan; ?></p>
            <p>Unit Kerja           : <?php echo $karyawan->unit_kerja_karyawan; ?></p>
            <p>No. Telepon          : <?php echo $karyawan->no_telp_karyawan; ?></p>
            <?php $tanggal_lahir_karyawan = date_create($karyawan->tanggal_lahir); ?>
            <p>Tanggal Lahir        : <?php echo $karyawan->tanggal_lahir; ?></p>
            <p>Jenis Kelamin        : <?php echo $karyawan->jenis_kelamin; ?></p>
            <p>Alamat               : <?php echo $karyawan->alamat_karyawan; ?></p>
          </div>
          <div class="container-fluid">
            <p>Email                : <?php echo $karyawan->email_karyawan; ?></p>
          </div>
        </div>
      </div>
    </div>
    <!--Modal Foto Resize-->
    <form action="<?php echo base_url()."index.php/KaryawanController/editReimbursement/".$this->session->userdata('id_user');?>" method="post">
      <div class="modal fade" id="modalEditKaryawan">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content rounded-4">
            <div class="modal-header" id="modalHeader">
              <h5 class="modal-title ms-3">Edit Karyawan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="d-flex">
                <div class="container">
                  <div class="mb-3">
                    <label for="NamaKaryawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                    <div class="col-sm">
                      <input type="text" name="nama_karyawan" value="<?php echo $karyawan->nama_karyawan; ?>" class="form-control" id="NamaKaryawan" placeholder="<?php echo $karyawan->nama_karyawan; ?>">
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="UnitKerja" class="col-sm-2 col-form-label">Unit Kerja Karyawan</label>
                    <div class="col-md">
                      <select class="form-select" name="unit_kerja_karyawan" id="UnitKerja">
                        <option value="COO">COO</option>
                        <option value="CEO">CEO</option>
                        <option value="CTO">CTO</option>
                        <option value="Lead Finance">Lead Finance</option>
                        <option value="Lead HR">Lead HR</option>
                        <option value="Sales Representative">Sales Representative</option>
                        <option value="Project Manager">Project Manager</option>
                        <option value="Lead AI">Lead AI</option>
                        <option value="Lead Software">Lead Software</option>
                        <option value="Lead Annotator">Lead Annotator</option>
                        <option value="AI Engineer">AI Engineer</option>
                        <option value="AI Scientist">AI Scientist</option>
                        <option value="Full Stack Engineer">Full Stack Engineer</option>
                        <option value="Front End Engineer">Front End Engineer</option>
                        <option value="Back End Engineer">Back End Engineer</option>
                        <option value="Annotator">Annotator</option>
                      </select>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="NoTeleponKaryawan" class="col-sm-2 col-form-label">No Telp Karyawan</label>
                    <div class="col-sm">
                      <input type="text" name="no_telp_karyawan" value="<?php echo $karyawan->no_telp_karyawan; ?>" class="form-control" id="NoTeleponKaryawan" placeholder="<?php echo $karyawan->no_telp_karyawan; ?>">
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="TanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm">
                      <input type="date" name="tanggal_lahir" value="<?php echo date_format($tanggal_lahir_karyawan, "Y-m-d"); ?>" class="form-control" id="TanggalLahir" placeholder="<?php echo $karyawan->tanggal_lahir; ?>">
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="JenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm">
                      <input type="text" name="jenis_kelamin" value="<?php echo $karyawan->jenis_kelamin; ?>" class="form-control" id="JenisKelamin" placeholder="<?php echo $karyawan->jenis_kelamin; ?>">
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm">
                      <input type="text" name="alamat_karyawan" value="<?php echo $karyawan->alamat_karyawan; ?>" class="form-control" id="Alamat" placeholder="<?php echo $karyawan->alamat_karyawan; ?>">
                    </div>
                  </div>
                </div>
                <div class="container">
                  <div class="mb-3">
                    <label for="EmailKaryawan" class="col-sm-2 col-form-label">Email Karyawan</label>
                    <div class="col-sm">
                      <input type="text" name="email_karyawan" value="<?php echo $karyawan->email_karyawan; ?>" class="form-control" id="EmailKaryawan" placeholder="<?php echo $karyawan->email_karyawan; ?>">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="d-flex">
                <button type="button" class="btn btn-confirmation rounded btn-outline-primary me-2 mb-2 shadow" data-bs-dismiss="modal" name="button"><i class="fas fa-times me-2"></i>Batal</button>
                <button type="submit" class="btn btn-confirmation rounded btn-outline-primary me-2 mb-2 shadow" name="button"><i class="fas fa-check me-2"></i>Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
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
</html>
