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
                <li><a class="dropdown-item" href="<?php echo base_url()."index.php/KaryawanController/logout"; ?>"><i class="fas fa-sign-out-alt me-2"></i>Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--body-->
    <?php foreach ($detailReimbursement as $detail) : ?>
    <?php $datePengajuan; ?>
    <?php $datePembelian; ?>
    <div class="container-fluid ms-auto me-auto" id="bodyContent">
      <!--Upper Navbar Content-->
      <div class="d-flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb ms-2 mt-2" id="breadcrumbs">
            <a href="<?php echo base_url()."index.php/KaryawanController"; ?>"><button type="button" name="button" class="btn me-1 mb-1 rounded" id="btnBack"><i class="fas fa-arrow-left"></i></button></a>
            <li class="breadcrumb-item"><a href="<?php echo base_url()."index.php/KaryawanController"; ?>">Daftar Reimbursement</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $detail->id_reimbursement; ?></li>
          </ol>
        </nav>
        <button type="button" class="btn btn-outline-primary shadow ms-auto me-1 mb-2 rounded" name="button" id="btnHapusFilter" data-bs-toggle="modal" data-bs-target="#modalHapusReimbursement"><i class="fas fa-trash-alt me-2"></i>HAPUS REIMBURSEMENT</button>
      </div>
      <!--Detail Reimbursement-->
      <div class="d-flex">
        <div class="container me-2" id="detailBodyContent">
          <div class="d-flex mb-4">
            <script type="text/javascript">
              var getStatus = "<?php echo $details->status_reimbursement; ?>"
              var buttonUbah = document.getElementById('ubahDetail')
              var buttonSelesai = document.getElementById('selesaiButton')
              if (getStatus == "Tidak Valid") {
                buttonSelesai.disabled = true
                buttonSelesai.style.visibility = 'hidden'
                buttonUbah.disabled = true
              } else if (getStatus == "Valid") {
                buttonSelesai.enabled = true
                buttonSelesai.style.visibility = 'visible'
                buttonUbah.disabled = true
                buttonUbah.style.visibility = 'hidden'
              }
            </script>
            <h1 class="h3 mt-1">Detail Reimbursement</h1>
            <button type="button" class="btn rounded btn-outline-primary btn-confirmation shadow ms-auto me-2 mb-2" name="button" data-bs-toggle="modal" data-bs-target="#modalEditReimbursement" id="ubahDetail"><i class="far fa-edit me-2"></i>UBAH DETAIL</button>
          </div>
          <div class="d-flex">
            <div class="container-fluid">
                <p>ID Reimbursement     : <?php echo $detail->id_reimbursement; ?></p>
                <p>Nama Reimbursement   : <?php echo $detail->nama_reimbursement; ?></p>
                <?php $datePengajuan = date_create($detail->tanggal_pengajuan); ?>
                <p>Tanggal Pengajuan    : <?php echo date_format($datePengajuan, "l, d F Y"); ?></p>
                <p>Kategori Pembelian   : <?php echo $detail->jenis_reimbursement; ?></p>
                <p>Deskripsi Pembelian  : <?php echo $detail->deskripsi_reimbursement; ?></p>
                <?php $datePembelian = date_create($detail->tanggal_pembelian); ?>
                <p>Tanggal pembelian    : <?php echo date_format($datePembelian, "l, d F Y"); ?></p>
                <?php if ($detail->status_reimbursement == "Menunggu Verifikasi") {
                  // code...
                  echo '<p>Status : <span class="badge rounded-pill bg-primary" id="textMenungguVerifikasi">';
                  echo $detail->status_reimbursement;
                  echo '</span></p>';
                } else if ($detail->status_reimbursement == "Pending"){
                  echo '<p>Status : <span class="badge rounded-pill bg-secondary" id="textPending">';
                  echo $detail->status_reimbursement;
                  echo '</span></p>';
                } else if ($detail->status_reimbursement == "Tidak Valid"){
                  echo '<p>Status : <span class="badge rounded-pill bg-danger" id="textTidakValid">';
                  echo $detail->status_reimbursement;
                  echo '</span></p>';
                } else if ($detail->status_reimbursement == "Valid"){
                  echo '<p>Status : <span class="badge rounded-pill bg-success" id="textValid">';
                  echo $detail->status_reimbursement;
                  echo '</span></p>';
                } else if ($detail->status_reimbursement == "Selesai"){
                  echo '<p>Status : <span class="badge rounded-pill bg-info" id="textSelesai">';
                  echo $detail->status_reimbursement;
                  echo '</span></p>';
                }
                ?>
            </div>
            <div class="container-fluid">
              <p>Nominal pembelian    : <?php echo $detail->jumlah_reimbursement; ?></p>
              <p>Bukti : </p>
              <div class="d-flex">
                 <a href="#" data-bs-target="#modalLihatFoto1" data-bs-toggle="modal"><img src="<?php echo base_url()?>asset/Pict/<?php echo $detail->bukti_reimbursement;?>" alt="" width="80px" height="80px" class="me-2 rounded"></a>
                 <a href="#" data-bs-target="#modalLihatFoto2" data-bs-toggle="modal"><img src="<?php echo base_url()?>asset/Pict/<?php echo $detail->bukti_reimbursement2;?>" alt="" width="80px" height="80px" class="me-2 rounded"></a>
                 <a href="#" data-bs-target="#modalLihatFoto3" data-bs-toggle="modal"><img src="<?php echo base_url()?>asset/Pict/<?php echo $detail->bukti_reimbursement3;?>" alt="" width="80px" height="80px" class="me-2 rounded"></a>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid ms-auto col" id="detailBodyContent">
          <h1 class="h3 mt-1 mb-4">Riwayat Status</h1>
          <?php if ($detail->status_reimbursement == "Menunggu Verifikasi") {
            // code...
            echo "<div>";
            echo '<h5 id="textMenungguVerifikasi">Menunggu Verifikasi</h5>';
            echo '<p id="tanggalRiwayat" class="mt-1">';
            $datePengajuan = date_create($detail->tanggal_pengajuan);
            echo date_format($datePengajuan, "l, d F Y");
            echo "</p>";
            echo "</div>";
          } else if ($detail->status_reimbursement == "Pending") {
            echo "<div>";
            echo '<h5 id="textMenungguVerifikasi">Menunggu Verifikasi</h5>';
            echo '<p id="tanggalRiwayat" class="mt-1">';
            $datePengajuan = date_create($detail->tanggal_pengajuan);
            echo date_format($datePengajuan, "l, d F Y");
            echo "</p>";
            echo "</div>";
            if ($detail->tanggal_pending != NULL) {
              // code...
              echo "<div>";
              echo '<h5 id="textPending">Pending</h5>';
              echo '<p id="tanggalRiwayat" class="mt-1">';
              $datePending = date_create($detail->tanggal_pending);
              echo date_format($datePending, "l, d F Y");
              echo "</p>";
              echo "</div>";
            } else
              echo "";
          } else if ($detail->status_reimbursement == "Tidak Valid") {
            // code...
            echo "<div>";
            echo '<h5 id="textMenungguVerifikasi">Menunggu Verifikasi</h5>';
            echo '<p id="tanggalRiwayat" class="mt-1">';
            $datePengajuan = date_create($detail->tanggal_pengajuan);
            echo date_format($datePengajuan, "l, d F Y");
            echo "</p>";
            echo "</div>";
            if ($detail->tanggal_pending != NULL) {
              // code...
              echo "<div>";
              echo '<h5 id="textPending">Pending</h5>';
              echo '<p id="tanggalRiwayat" class="mt-1">';
              $datePending = date_create($detail->tanggal_pending);
              echo date_format($datePending, "l, d F Y");
              echo "</p>";
              echo "</div>";
            } else {
              echo "";
            }
            echo "<div>";
            echo '<h5 id="textTidakValid">Tidak Valid</h5>';
            echo '<p id="tanggalRiwayat" class="mt-1">';
            $dateTidakValid = date_create($detail->tanggal_tidak_valid);
            echo date_format($dateTidakValid, "l, d F Y");
            echo "</p>";
            echo "</div>";
            } else if ($detail->status_reimbursement == "Valid") {
            // code...
            echo "<div>";
            echo '<h5 id="textMenungguVerifikasi">Menunggu Verifikasi</h5>';
            echo '<p id="tanggalRiwayat" class="mt-1">';
            $datePengajuan = date_create($detail->tanggal_pengajuan);
            echo date_format($datePengajuan, "l, d F Y");
            echo "</p>";
            echo "</div>";
            if ($detail->tanggal_pending != NULL) {
              // code...
              echo "<div>";
              echo '<h5 id="textPending">Pending</h5>';
              echo '<p id="tanggalRiwayat" class="mt-1">';
              $datePending = date_create($detail->tanggal_pending);
              echo date_format($datePending, "l, d F Y");
              echo "</p>";
              echo "</div>";
            } else {
              echo "";
            }
            echo "<div>";
            echo '<h5 id="textValid">Valid</h5>';
            echo '<p id="tanggalRiwayat" class="mt-1">';
            $dateValid = date_create($detail->tanggal_valid);
            echo date_format($dateValid, "l, d F Y");
            echo "</p>";
            echo "</div>";
          } else if ($detail->status_reimbursement == "Selesai") {
            // code...
            echo "<div>";
            echo '<h5 id="textMenungguVerifikasi">Menunggu Verifikasi</h5>';
            echo '<p id="tanggalRiwayat" class="mt-1">';
            $datePengajuan = date_create($detail->tanggal_pengajuan);
            echo date_format($datePengajuan, "l, d F Y");
            echo "</p>";
            echo "</div>";
            if ($detail->tanggal_pending != NULL) {
              // code...
              echo "<div>";
              echo '<h5 id="textPending">Pending</h5>';
              echo '<p id="tanggalRiwayat" class="mt-1">';
              $datePending = date_create($detail->tanggal_pending);
              echo date_format($datePending, "l, d F Y");
              echo "</p>";
              echo "</div>";
            } else {
              echo "";
            }
            echo "<div>";
            echo '<h5 id="textValid">Valid</h5>';
            echo '<p id="tanggalRiwayat" class="mt-1">';
            $dateValid = date_create($detail->tanggal_valid);
            echo date_format($dateValid, "l, d F Y");
            echo "</p>";
            echo "</div>";
            echo "<div>";
            echo '<h5 id="textSelesai">Selesai</h5>';
            echo '<p id="tanggalRiwayat" class="mt-1">';
            $dateSelesai = date_create($detail->tanggal_selesai);
            echo date_format($dateSelesai, "l, d F Y");
            echo "</p>";
            echo "</div>";
          }
          ?>
        </div>
      </div>
    </div>
    <!--Modal Alert-->
    <div class="modal fade" id="modalHapusReimbursement">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">
          <div class="modal-body mt-2" id="confirmAction">
            <p class="text-centered h5">Anda yakin ingin menghapus reimbursement?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-confirmation btn-outline-primary ms-auto me-2 shadow mb-2 rounded" data-bs-dismiss="modal" name="button"><i class="fas fa-times me-2"></i>BATAL</button>
            <a href="<?php echo base_url()."index.php/KaryawanController/deleteReimbursement/".$detail->id_reimbursement; ?>"><button type="button" class="btn btn-confirmation btn-outline-primary me-2 shadow mb-2 rounded" name="button"><i class="fas fa-check me-2"></i>YA, LANJUTKAN</button></a>
          </div>
          </div>
        </div>
      </div>
      <!--Create Reimbursement-->
       <form action="<?php echo base_url()."index.php/KaryawanController/editReimbursement/".$detail->id_reimbursement;?>" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="modalEditReimbursement">
          <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content rounded-4">
              <div class="modal-header" id="modalHeader">
                <h5 class="modal-title ms-3">Edit Reimbursement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="d-flex">
                  <div class="container">
                    <div class="mb-3">
                      <label for="inputNamaReimbursement" class="col-sm-2 col-form-label">Nama Reimbursement</label>
                      <div class="col-sm">
                        <input type="text" name="nama_reimbursement" value="<?php echo $detail->nama_reimbursement; ?>" class="form-control" id="NamaReimbursement" placeholder="<?php echo $detail->nama_reimbursement; ?>">
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="inputKategoriPengajuan" class="col-sm-2 col-form-label">Kategori Reimbursement</label>
                      <div class="col-sm">
                        <select class="form-select" aria-label="Default select example" name="kategori_reimbursement">
                          <option value="Makanan">Makanan</option>
                          <option value="Kuota Internet">Kuota Internet</option>
                          <option value="Inventaris">Barang Elektronik</option>
                          <option value="Transportasi">Transportasi</option>
                        </select>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="inputDeskripsiReimbursement" class="col-sm-2 col-form-label">Deskripsi Reimbursement</label>
                      <div class="col-sm">
                        <textarea name="deskripsi_reimbursement" rows="6" class="form-control" id="DeskripsiReimbursement" placeholder="<?php echo $detail->deskripsi_reimbursement; ?>"><?php echo $detail->deskripsi_reimbursement; ?></textarea>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="inputTanggalPembelian" class="col-sm-2 col-form-label">Tanggal Pembelian</label>
                      <div class="col-sm">
                        <input type="date" name="tanggal_pembelian" value="<?php echo date_format($datePembelian, "Y-m-d"); ?>" class="form-control" id="TanggalPembelian" placeholder="<?php echo $detail->tanggal_pembelian; ?>">
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="inputNominalPembelian" class="col-sm-2 col-form-label">Nominal Pembelian</label>
                      <div class="col-sm">
                        <input type="text" name="nominal_pembelian" value="<?php echo $detail->jumlah_reimbursement; ?>" class="form-control" id="NominalPembelian" placeholder="<?php echo $detail->jumlah_reimbursement; ?>">
                      </div>
                    </div>
                    <div class="mb-3" id="inputFotoCustom">
                      <label for="formFile" class="col-sm-2 col-form-label">Upload Bukti</label>
                      <div class="col-sm">
                        <input class="form-control" type="file" id="formFilePhoto1" placeholder="Upload struk" name="filePhoto1">
                      </div>
                    </div>
                    <div class="mb-3" id="inputFotoCustom">
                      <div class="col-sm">
                        <input class="form-control" type="file" id="formFilePhoto2" placeholder="Upload struk" name="filePhoto2">
                      </div>
                    </div>
                    <div class="mb-3" id="inputFotoCustom">
                      <div class="col-sm">
                        <input class="form-control" type="file" id="formFilePhoto3" placeholder="Upload struk" name="filePhoto3">
                      </div>
                    </div>
                  </div>
                  <div class="container">
                    <div class="mb-3 mt-3">
                      <div class="col-sm">
                        <p>ID Reimbursement     : <?php echo $detail->id_reimbursement; ?></p>
                      </div>
                    </div>
                    <div class="mb-3 mt-3">
                      <div class="col-sm">
                        <p>Tanggal Pengajuan    : <?php echo $detail->tanggal_pengajuan; ?></p>
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
      <!--Modal Foto Resize-->
      <div class="modal fade" id="modalLihatFoto1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content rounded-4">
            <div class="modal-body text-center">
              <img src="<?php echo base_url()?>asset/Pict/<?php echo $detail->bukti_reimbursement?>" alt="" width="550px" height="550px" class="me-2 rounded">
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="modalLihatFoto2">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content rounded-4">
            <div class="modal-body text-center">
              <img src="<?php echo base_url()?>asset/Pict/<?php echo $detail->bukti_reimbursement2?>" alt="" width="550px" height="550px" class="me-2 rounded">
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="modalLihatFoto3">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content rounded-4">
            <div class="modal-body text-center">
              <img src="<?php echo base_url()?>asset/Pict/<?php echo $detail->bukti_reimbursement2?>" alt="" width="550px" height="550px" class="me-2 rounded">
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
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
