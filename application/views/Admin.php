<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()."asset/CustomCSSJS/ModalJavascript.js"?>"></script>
    <script type="text/javascript" src="<?php echo base_url()."asset/CustomCSSJS/DataTabelJavascript.js"; ?>"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <script type="text/javascript" src="<?php echo base_url()."asset/CustomCSSJS/disablingInput.js"?>"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url()."asset/CustomCSSJS/HeaderStyle.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/CustomCSSJS/BodyCustomStyle.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/FA/fontawesome/css/all.css" ?>">
    <link rel="icon" href="<?php echo base_url()."asset/Icon&IllustrationKRMS/favicon.ico"; ?>">
    <title>Reimbursement Management System</title>
  </head>
  <body>
    <!--Header-->
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
                <li><a class="dropdown-item" id="dropdownItemNavbar" href="#"><i class="fas fa-key me-2"></i>Ubah Password</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url()."index.php/AdminController/logout" ?>"><i class="fas fa-sign-out-alt me-2"></i>Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--Body-->
    <div class="container-fluid ms-auto me-auto" id="bodyContent">
      <h1 class="h3">Daftar Pengguna</h1>
      <!--Button Upper-->
      <div class="d-flex">
        <button type="button" class="btn btn-outline-primary me-2 shadow mb-2 rounded" name="button" data-bs-toggle="modal" data-bs-target="#karyawanModal"><i class="fas fa-plus me-2"></i>Buat Pengguna Baru</button>
        <div class="dropdown" id="buttonContentUpper">
          <button type="button" class="btn btn-outline-primary dropdown-toggle shadow mb-2 rounded" name="button" data-bs-toggle="dropdown" data-bs-target="#byRole"><i class="fas fa-filter me-2"></i>Filter By Role</button>
          <ul class="dropdown-menu" id="#byRole">
            <li>
              <a class="dropdown-item" href="#">Karyawan</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Finance</a>
            </li>
          </ul>
        </div>
        <div class="dropdown ms-auto" id="buttonContentUpper">
          <button type="button" class="btn btn-outline-primary dropdown-toggle ms-auto shadow mb-2 rounded" name="button" data-bs-toggle="dropdown">Urut Berdasarkan</button>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="#">Nomor Pegawai</a>
            </li>
          </ul>
        </div>
      </div>
      <!--List-->
      <div class="container-fluid" id="listContent">
        <table class="table table-hover mt-5 table-custom" id="tableDataKaryawan">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">ID User</th>
              <th scope="col">Username</th>
              <th scope="col">Role</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; ?>
            <?php $id_user_selected; ?>
            <?php foreach ($dataResult as $dataUser) : ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><a href="<?php echo base_url()."index.php/AdminController/viewUser/".$dataUser->id_user; ?>"><?php echo $dataUser->id_user; ?></a></td>
                <td><?php echo $dataUser->username; ?></td>
                <td><?php echo $dataUser->role; ?></td>
                <td><a href="<?php echo $id_user_selected = $dataUser->id_user; ?>" data-bs-toggle="modal" data-bs-target="#modalConfirmDelete"><i class="fa fa-trash-alt trash-button" aria-hidden="true"></i></a></td>
                <!--Modal Alert Hapus-->
                  <div class="modal fade" id="modalConfirmDelete">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                      <div class="modal-content rounded-4">
                        <div class="modal-body" id="confirmAction">
                          <p class="text-centered h5">Anda yakin ingin menghapus karyawan?</p>
                        </div>
                        <div class="modal-footer">
                          <div class="d-flex">
                            <button type="button" class="btn btn-confirmation btn-outline-primary ms-auto me-2 shadow mb-2 rounded" data-bs-dismiss="modal" name="button"><i class="fas fa-times me-2"></i>BATAL</button>
                            <a href="<?php echo "AdminController/hapusUser/".$id_user_selected; ?>"><button type="button" class="btn btn-confirmation btn-outline-primary me-2 shadow mb-2 rounded" name="button"><i class="fas fa-check me-2"></i>YA, LANJUTKAN</button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!--Modal Buat Karyawan-->
      <form class="" action="<?php echo base_url().'index.php/AdminController/createUser'; ?>" method="post">
        <div class="modal fade" id="karyawanModal">
          <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content rounded-4">
              <div class="modal-header" id="modalHeader">
                <h5 class="modal-title ms-3">Buat Pengguna Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="d-flex">
                  <div class="container">
                    <div class="mb-3">
                      <label for="RoleKaryawan" class="col-md col-form-label">Role <span class="red-star">*</span></label>
                      <select class="form-select" name="role_karyawan" id="RoleKaryawan" onchange="opsi(this)">
                        <option value="Karyawan">Karyawan</option>
                        <option value="Finance">Finance</option>
                        <option value="Admin">Admin</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="IDKaryawan" class="col-md col-form-label">ID Karyawan <span class="red-star">*</span></label>
                      <div class="col-md">
                        <input type="text" name="id_karyawan" value="" class="form-control" id="IDKaryawan" placeholder="Masukkan ID karyawan">
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="NamaKaryawan" class="col-md col-form-label">Nama Karyawan <span class="red-star">*</span></label>
                      <div class="col-md">
                        <input type="text" name="nama_karyawan" value="" class="form-control" id="NamaKaryawan" placeholder="Masukkan nama karyawan">
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="UnitKerja" class="col-md col-form-label">Unit Kerja <span class="red-star">*</span></label>
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
                      <label for="NoTeleponKaryawan" class="col-md col-form-label">No Telepon <span class="red-star">*</span></label>
                      <div class="col-md">
                        <input type="text" name="no_telp_karyawan" value="" class="form-control" id="NoTeleponKaryawan" placeholder="Masukkan no telepon">
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="TanggalLahir" class="col-md col-form-label">Tanggal Lahir <span class="red-star">*</span></label>
                      <div class="col-md">
                        <input type="date" name="tanggal_lahir" value="" id="TanggalLahir">
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="JenisKelamin" class="col-md col-form-label">Jenis Kelamin <span class="red-star">*</span></label>
                      <div class="col-md">
                        <select class="form-select" name="jenis_kelamin" id="JenisKelamin">
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="Alamat" class="col-md col-form-label">Alamat <span class="red-star">*</span></label>
                      <div class="col-md">
                        <textarea name="alamat_karyawan" id="Alamat" rows="6" cols="42"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="container">
                    <div class="mb-3">
                      <label for="EmailKaryawan" class="col-md col-form-label">Email <span class="red-star">*</span></label>
                      <div class="col-md">
                        <input type="text" name="email_karyawan" value="" class="form-control" id="EmailKaryawan" placeholder="Masukkan email">
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="UsernameKaryawan" class="col-md col-form-label">Username <span class="red-star">*</span></label>
                      <div class="col-md">
                        <input type="text" name="username_karyawan" value="" class="form-control" id="UsernameKaryawan" placeholder="Masukkan username">
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="PasswordKaryawan" class="col-md col-form-label">Password <span class="red-star">*</span></label>
                      <div class="col-md">
                        <input type="text" name="password_karyawan" value="" class="form-control" id="PasswordKaryawan" placeholder="Masukkan password">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="d-flex">
                  <button type="button" class="btn btn-confirmation btn-outline-primary ms-auto me-2 shadow mb-2 rounded" data-bs-dismiss="modal" name="button"><i class="fas fa-times me-2"></i>Batal</button>
                  <button type="submit" class="btn btn-confirmation btn-outline-primary me-2 shadow mb-2 rounded" name="button"><i class="fas fa-check me-2"></i>Simpan</button>
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
    <!-- footer -->
  </body>
</html>
