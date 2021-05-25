<?php
/**
 *
 */
class FinanceModel extends CI_Model
{

  function __construct()
  {
    $this->load->database();
  }

  //Read All List REIMBURSEMENT from All Karyawan
  public function readListReimbursement()
  {
    // code...
    $q = "SELECT * FROM reimbursement WHERE is_deleted = 0";
    $query = $this->db->query($q);
    return $query->result();
  }

  //Edit Reimbursement
  public function viewReimbursement($id_reimbursement)
  {
    // code...
    $query = $this->db->get_where('reimbursement', array('id_reimbursement' => $id_reimbursement));
    return $query->result();
  }

  //Update Status REIMBURSEMENT
  public function updateReimbursement($id_reimbursement, $dataUpdateReimbursement)
  {
    // code...
    //where id =?
    $this->db->where('id_reimbursement', $id_reimbursement);
    $this->db->update('reimbursement', $dataUpdateReimbursement);
    redirect('FinanceController');
  }

  public function validateFinance($username, $password)
  {
    // code...
    $d = array('username' => $username, 'password' => md5($password), 'role' => 'Finance', 'is_deleted' => 0 );
    $query = $this->db->get_where('user', $d);
    if ($query->num_rows()>0) {
      $this->session->set_userdata('username', $username);
      $this->session->set_userdata('role', 'Finance');
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function deleteReimbursement($id_reimbursement)
  {
    // code...
    $d = array('is_deleted' => 1);
     $this->db->where('id_reimbursement', $id_reimbursement);
     $this->db->update('reimbursement', $d);
    redirect('FinanceController');
  }

  public function getFinanceIdFinance($id_user_finance)
  {
    // code...
    $this->db->select('id_finance');
    $this->db->where('id_user', $id_user_finance);
    $query = $this->db->get('finance');
    $return = $query->row_array();
    return $return;
  }

  public function getFinanceIdUser($username)
  {
    // code...
    $this->db->select('id_user');
    $this->db->where('username', $username);
    $this->db->where('role', 'Finance');
    $query = $this->db->get('user');
    $return = $query->row_array();
    return $return;
  }

  public function getValidCount()
  {
    // code...
    $this->db->where('status_reimbursement', 'Valid');
    return $this->db->count_all_results('reimbursement');
  }

  public function getTidakValidCount()
  {
    // code...
    $this->db->where('status_reimbursement', 'Tidak Valid');
    return $this->db->count_all_results('reimbursement');
  }

  public function getPendingCount()
  {
    // code...
    $this->db->where('status_reimbursement', 'Pending');
    return $this->db->count_all_results('reimbursement');
  }

  public function getMenungguVerifikasiCount()
  {
    // code...
    $this->db->where('status_reimbursement', 'Menunggu Verifikasi');
    return $this->db->count_all_results('reimbursement');
  }

  public function getSelesaiCount()
  {
    // code...
    $this->db->where('status_reimbursement', 'Selesai');
    return $this->db->count_all_results('reimbursement');
  }

  public function search($nama_reimbursement)
  {
    // code...
    $searchQuery = array('nama_reimbursement' => $nama_reimbursement);
    $this->db->like($searchQuery);
    $queryResult = $this->db->get('reimbursement');
    return $queryResult->result();
  }
}


?>
