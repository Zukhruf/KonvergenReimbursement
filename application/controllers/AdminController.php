<?php
/**
 *
 */
class AdminController extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('AdminModel');
  }

  public function index()
  {
    $result['dataResult'] = $this->AdminModel->readListUser();
    $this->load->view('Admin', $result);
  }

  public function createUser()
  {
    // code...
    $id_karyawan = $this->input->post('id_karyawan');
    $nama_karyawan = $this->input->post('nama_karyawan');
    $unit_kerja_karyawan = $this->input->post('unit_kerja_karyawan');
    $no_telp_karyawan = $this->input->post('no_telp_karyawan');
    $tanggal_lahir = $this->input->post('tanggal_lahir');
    $jenis_kelamin = $this->input->post('jenis_kelamin');
    $alamat_karyawan = $this->input->post('alamat_karyawan');
    $email_karyawan = $this->input->post('email_karyawan');
    $role_karyawan = $this->input->post('role_karyawan');
    $username_karyawan = $this->input->post('username_karyawan');
    $password = $this->input->post('password_karyawan');
    $password_karyawan = md5($password);

    $dataCreateUser =
      array(
        'id_user' => $id_karyawan,
        'role' => $role_karyawan,
        'password' => $password_karyawan,'username' => $username_karyawan
    );

    $dataCreateKaryawan =
      array('id_user'=> $id_karyawan,'nama_karyawan' => $nama_karyawan,
      'unit_kerja_karyawan' => $unit_kerja_karyawan, 'no_telp_karyawan' => $no_telp_karyawan,
      'tanggal_lahir' => $tanggal_lahir, 'jenis_kelamin' => $jenis_kelamin,
      'alamat_karyawan' => $alamat_karyawan, 'email_karyawan' => $email_karyawan
    );

    $dataCreateFinance =
      array('id_user' => $id_karyawan,'nama' => $nama_karyawan
    );

    if ($role_karyawan == 'Admin') {
      $this->AdminModel->createUser1($dataCreateUser);
    } else if ($role_karyawan == 'Karyawan'){
      $this->AdminModel->createUser1($dataCreateUser);
      $this->AdminModel->createUser2($dataCreateKaryawan);
    } else if ($role_karyawan == 'Finance'){
      $this->AdminModel->createUser1($dataCreateUser);
      $this->AdminModel->createUser3($dataCreateFinance);
    }
    redirect('AdminController');
  }

  public function hapusUser($id_user)
  {
    $this->AdminModel->deleteUser($id_user);
    redirect('AdminController');
  }

  public function viewUser($id_user)
  {
    // code...
    $query['dataKaryawan'] = $this->AdminModel->readUser($id_user);
    $this->load->view('DetailKaryawan', $query);
  }

  public function updateeKaryawan($username_user, $data)
  {
    $data = array(
      'nama_karyawan' => $nama_karyawan,
      'unit_kerja_karyawan' => $unit_kerja,
      'no_telp_karyawan' => $no_telepon,
      'tanggal_lahir' => $tgl_lahir,
      'email_karyawan' => $email_karyawan
    );
  }

  public function checkIdUser()
  {
    if (array_key_exists('id_user',$_POST)) 
        {
          $id_user = $this->input->post('id_user');
         if($this->AdminModel->cekIDUser($id_user) == TRUE ) 
          {
            //echo json_encode(FALSE);
            echo 'false';
        } 
       else 
        {
            //echo json_encode(TRUE);
            echo 'true';
        }
     }
  }
  public function logout()
  {
    // code...
    session_destroy();
    redirect('LoginController');
  }
}


?>
