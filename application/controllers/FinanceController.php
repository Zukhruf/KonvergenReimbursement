<?php
/**
 *
 */
class FinanceController extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('FinanceModel');
  }

  public function index()
  {
    // code...
    $data['reimbursements'] = $this->FinanceModel->readListReimbursement();
    //Get Finance ID User
    $idUserFinance = $this->FinanceModel->getFinanceIdUser($this->session->userdata('username'));
    $id_user_finance = $idUserFinance['id_user'];

    //Get Finance ID Finance
    $idFinance = $this->FinanceModel->getFinanceIdFinance($id_user_finance);
    $id_finance = $idFinance['id_finance'];
    $this->session->set_userdata('id_finance',$id_finance);

    //Get count Valid
    $data['validCount'] = $this->FinanceModel->getValidCount();
    //Get count Tidak Valid
    $data['tidakValidCount'] = $this->FinanceModel->getTidakValidCount();
    //Get count Pending
    $data['pendingCount'] = $this->FinanceModel->getPendingCount();
    //Get count Menunggu Verifikasi
    $data['menungguVerifikasiCount'] = $this->FinanceModel->getMenungguVerifikasiCount();
    //Get count Selesai
    $data['selesaiCount'] = $this->FinanceModel->getSelesaiCount();

    //View Finance Page
    $this->load->view('Finance', $data);
  }

  public function hapusReimbursement($id_reimbursement)
  {
    // code...
    $this->FinanceModel->deleteReimbursement($id_reimbursement);
    redirect('FinanceController');
  }

  public function updateReimbursement($id_reimbursement)
  {
    // code...
    $nama_reimbursement = $this->input->post('nama_reimbursement');
    $kategori_reimbursement = $this->input->post('kategori_reimbursement');
    $deskripsi_reimbursement = $this->input->post('deskripsi_reimbursement');
    $tanggal_pembelian = $this->input->post('tanggal_pembelian');
    $nominal_pembelian = $this->input->post('nominal_pembelian');
    $status_reimbursement = $this->input->post('status_reimbursement');
    $id_finance = $this->session->userdata('id_finance');

    $tanggal_valid = NULL;
    $tanggal_tidak_valid = NULL;
    $tanggal_pending = NULL;
    $tanggal_selesai = NULL;

    date_default_timezone_set('Asia/Bangkok');
    $tanggal_now = date("Y-m-d H:i:s");

    if ($status_reimbursement == 'Valid') {
      // code...
      $tanggal_valid = date("Y-m-d H:i:s");
    }

    if ($status_reimbursement == 'Tidak_valid'){
      $tanggal_tidak_valid = date("Y-m-d H:i:s");
    }

    $dataUpdateReimbursement = array('nama_reimbursement' => $nama_reimbursement,
      'jenis_reimbursement' => $kategori_reimbursement,
      'deskripsi_reimbursement' => $deskripsi_reimbursement,
      'tanggal_pembelian' => $tanggal_pembelian,
      'jumlah_reimbursement' => $nominal_pembelian,
      'status_reimbursement' => $status_reimbursement,
      'id_finance' => $id_finance,
      'tanggal_selesai' => $tanggal_selesai,
      'tanggal_pending' => $tanggal_pending,
      'tanggal_valid' => $tanggal_valid,
      'tanggal_tidak_valid' => $tanggal_tidak_valid
    );

    $this->FinanceModel->updateReimbursement($id_reimbursement, $dataUpdateReimbursement);
  }

  public function viewReimbursement($id_reimbursement)
  {
    // code...
    $result['reimbursement'] = $this->FinanceModel->viewReimbursement($id_reimbursement);
    $this->load->view('DetailReimbursementFinance', $result);
  }

  public function logout()
  {
    // code...
    session_destroy();
    redirect('LoginController');
  }

  public function generateLaporan()
  {
    $data['reimbursements'] = $this->FinanceModel->readListReimbursement();
    $this->load->view('ExportLaporan', $data);
  }

  public function search()
  {
    // code...
    $nama_reimbursement = $this->input->post('search_query');
    $result['reimbursementList'] = $this->FinanceModel->search($nama_reimbursement);
    $result['validCount'] = $this->FinanceModel->getValidCount();
    //Get count Tidak Valid
    $result['tidakValidCount'] = $this->FinanceModel->getTidakValidCount();
    //Get count Pending
    $result['pendingCount'] = $this->FinanceModel->getPendingCount();
    //Get count Menunggu Verifikasi
    $result['menungguVerifikasiCount'] = $this->FinanceModel->getMenungguVerifikasiCount();
    //Get count Selesai
    $result['selesaiCount'] = $this->FinanceModel->getSelesaiCount();
    $this->load->view('FinanceSearch', $result);
  }
}


?>
