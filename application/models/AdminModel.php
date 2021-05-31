<?php
/**
 *
 */
class AdminModel extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  //Check Admin
  public function validateAdmin($username, $password)
  { $d = array('username' => $username, 'password' => md5($password),'role' => 'Admin', 'is_deleted' => 0 );
    $query = $this->db->get_where('user', $d);
    if ($query->num_rows()>0) {
      $this->session->set_userdata('username', $username);
      $this->session->set_userdata('role', 'Admin');
      return TRUE;
    } else {
      return FALSE;
    }
  }

  //Create user Karyawan, Finance, Admin
  public function createUser1($dataCreateUser)
  {
    // code...
    $this->db->insert('user', $dataCreateUser);
  }

  public function createUser2($dataCreateKaryawan)
  {
    // code...
    $this->db->insert('karyawan', $dataCreateKaryawan);
  }

  public function createUser3($dataCreateFinance)
  {
    // code...
    $this->db->insert('finance', $dataCreateFinance);
  }


  //Delete Karyawan
  public function deleteUser($id_user)
  {
    // code...
    $d = array('is_deleted' => 1);
    $this->db->where('id_user', $id_user);
    $this->db->update('user', $d);
  }

  //Edit Karyawan
  public function editKaryawan($id_user, $data)
  {
    // code...
    $this->db->where('id_user', $id_user);
    $this->db->update('karyawan', $data);
    redirect('AdminController');
  }

  //Read List Karyawan
  public function readListUser()
  {
    // code...
    $q = "SELECT * FROM user WHERE is_deleted = 0";
    $query = $this->db->query($q);
    return $query->result();
  }

  public function readUser($id_user)
  {
    // code...
    $query = $this->db->get_where('karyawan', array('id_user' => $id_user));
    return $query->result();
  }

  //untuk validate id user
  public function cekIDUser($id_user)
  {
    $query = $this->$db->get_where('id_user', array('id_user' => $id_user));
    echo $this->db->last_query();
    if($query->num_rows() > 0)
    { return True;
    } else{ return False;}
  }

  public function viewKaryawanOnly()
  {
    // code...
    $q = "SELECT * FROM user WHERE is_deleted = 0 AND role = 'Karyawan'";
    $query = $this->db->query($q);
    return $query->result();
  }

  public function viewAdminOnly()
  {
    // code...
    $q = "SELECT * FROM user WHERE is_deleted = 0 AND role = 'Admin'";
    $query = $this->db->query($q);
    return $query->result();
  }

  public function viewFinanceOnly()
  {
    // code...
    $q = "SELECT * FROM user WHERE is_deleted = 0 AND role = 'Finance'";
    $query = $this->db->query($q);
    return $query->result();
  }
}
?>
