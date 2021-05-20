<?php
header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=Rekap_Reimbursement.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<div class="container-fluid" id="listContent">
  <table class="table table-hover table-custom mt-5">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">ID Reimbursement</th>
        <th scope="col">ID User</th>
        <th scope="col">Nama Reimbursement</th>
        <th scope="col">Tanggal Pembelian</th>
        <th scope="col">Tanggal Reimbursement</th>
        <th scope="col">Kategori</th>
        <th scope="col">Nominal</th>
        <th scope="col">Status</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; ?>
      <?php foreach ($reimbursements as $reimbursement) : ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><a href="<?php echo "FinanceController/viewReimbursement/".$reimbursement->id_reimbursement; ?>"><?php echo $reimbursement->id_reimbursement; ?></a></td>
          <td><?php echo $reimbursement->id_user; ?></td>
          <td><?php echo $reimbursement->nama_reimbursement; ?></td>
          <?php $datePembelian = date_create($reimbursement->tanggal_pembelian); ?>
          <td><?php echo date_format($datePembelian, "l, d F Y"); ?></td>
          <?php $datePengajuan = date_create($reimbursement->tanggal_pengajuan); ?>
          <td><?php echo date_format($datePengajuan, "l, d F Y"); ?></td>
          <td><?php echo $reimbursement->jenis_reimbursement; ?></td>
          <td><?php echo $reimbursement->jumlah_reimbursement; ?></td>
          <td><?php echo $reimbursement->status_reimbursement; ?></td>
          <td><a href="<?php echo "FinanceController/hapusReimbursement/".$reimbursement->id_reimbursement; ?>"><i class="fa fa-trash-alt trash-button" aria-hidden="true"></i></a></td>
        </tr>
        <?php $i++; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
