<?php
/**
 *
 */
class KaryawanController extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('KaryawanModel');

    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']     = '100';
    $config['max_width'] = '1024';
    $config['max_height'] = '768';
    $this->load->library('upload', $config);
  }

  public function index()
  {
    // code..
    $result = $this->KaryawanModel->getIDUser($this->session->userdata('username'));
    $id_user = $result['id_user'];
    $this->session->set_userdata('id_user', $id_user);
    $result['reimbursementList'] = $this->KaryawanModel->readReimbursementListFromKaryawan($id_user);
    $this->load->view('Karyawan', $result);
  }



  public function createReimbursement($id_user)
  {
    // code...
    $id_user = $id_user;
    $nama_reimbursement = $this->input->post('nama_reimbursement');
    $deskripsi_reimbursement = $this->input->post('deskripsi_reimbursement');
    $tgl_pembelian = $this->input->post('tanggal_pembelian');
    $kategori_reimbursement = $this->input->post('kategori_reimbursement');
    $nominal_pembelian = $this->input->post('nominal_pembelian');

    //variable
    $ids = $this->KaryawanModel->getidreimbursement();
    $bukti = "".++$ids."-B";

    if (empty($_FILES["filePhoto1"]["tmp_name"])){
      $null = "Foto tidak boleh kosong";
    }else {
      $foto_size1 = getimagesize($_FILES['filePhoto1']['tmp_name']);
      if($foto_size1 == false){
        $alertimage1 = "File yang anda pilih tidak gambar";
        }else{
          $foto_bukti1 = $_FILES['filePhoto1']['tmp_name'];
          #$nama_bukti1 = $_FILES['filePhoto1']['name'];
          $tipe_bukti1 = $_FILES['filePhoto1']['type'];
          if($tipe_bukti1 == 'image/jpeg'){
            $tipe_bukti1 = 'image/jpg';
          }
          $tipebukti1  = preg_split("/\//", $tipe_bukti1);
          $nama_bukti1 = "".$bukti."A.".$tipebukti1[1]."";
          if (empty($_FILES["filePhoto2"]["tmp_name"])){
            $nama_bukti2 = 'noimage.png';
          }else{
            $foto_size2 = getimagesize($_FILES['filePhoto2']['tmp_name']);
              if($foto_size2 == false){
                $alertimage2 = "File yang anda pilih tidak gambar";
              }else {
                $foto_bukti2 = $_FILES['filePhoto2']['tmp_name'];
                $tipe_bukti2 = $_FILES['filePhoto2']['type'];
                if($tipe_bukti2 == 'image/jpeg'){
                  $tipe_bukti2 = 'image/jpg';

                }
                $tipebukti2  = preg_split("/\//", $tipe_bukti2);
                if($tipebukti1[1] == $tipebukti2[1] ){
                  $nama_bukti2 = "".$bukti."A1.".$tipebukti2[1]."";
                }
                if($tipebukti1[1] != $tipebukti2[1] ){
                  $nama_bukti2 = "".$bukti."A.".$tipebukti2[1]."";
                }
              }
            }
          if (empty($_FILES["filePhoto3"]["tmp_name"])){
            $nama_bukti3 = 'noimage.png';
          }else{
            $foto_size3 = getimagesize($_FILES['filePhoto3']['tmp_name']);
              if($foto_size3 == false){
                $alertimage3 = "File yang anda pilih tidak gambar";
              }else {
                $foto_bukti3 = $_FILES['filePhoto3']['tmp_name'];
                $tipe_bukti3 = $_FILES['filePhoto3']['type'];
                if($tipe_bukti3 == 'image/jpeg'){
                  $tipe_bukti3 = 'image/jpg';
                }
                $tipebukti3  = preg_split("/\//", $tipe_bukti3);
                if($tipebukti2[1] == $tipebukti3[1] and $tipebukti1[1] != $tipebukti2[1]){
                  $nama_bukti3 = "".$bukti."A1.".$tipebukti3[1]."";
                }
                if($tipebukti2[1] != $tipebukti3[1] and $tipebukti1[1] != $tipebukti2[1]){
                  $nama_bukti3 = "".$bukti."A1.".$tipebukti3[1]."";
                }
                if($tipebukti2[1] == $tipebukti3[1] and $tipebukti1[1] == $tipebukti2[1]){
                  $nama_bukti3 = "".$bukti."A2.".$tipebukti3[1]."";
                }
                if($tipebukti2[1] != $tipebukti3[1] and $tipebukti1[1] != $tipebukti3[1]){
                  $nama_bukti3 = "".$bukti."A.".$tipebukti3[1]."";
                }

              }
            }
          $dataReimbursement = array('id_user' => $id_user,
            'nama_reimbursement' => $nama_reimbursement, 'jenis_reimbursement' => $kategori_reimbursement,
            'deskripsi_reimbursement' => $deskripsi_reimbursement, 'tanggal_pembelian' => $tgl_pembelian,
            'jumlah_reimbursement' => $nominal_pembelian, 'bukti_reimbursement' => $nama_bukti1,
            'bukti_reimbursement2' => $nama_bukti2, 'bukti_reimbursement3' => $nama_bukti3,
            'status_reimbursement' => 'Menunggu Verifikasi'
          );
          $this->KaryawanModel->createReimbursement($dataReimbursement);

          $namabukti  = preg_split("/\./", $nama_bukti1);
          $configA['upload_path'] = './asset/Pict';
          $configA['allowed_types'] = 'jpeg|jpg|png';
          $configA['max_size']     = '200000';
          $configA['file_name'] = $namabukti[0];
          $this->load->library('upload', $configA);
          $this->upload->initialize($configA);
          // // File upload
          if($this->upload->do_upload('filePhoto1')){
            // Get data about the file
            $a = $this->upload->data();
          }
          $configB['upload_path'] = './asset/Pict';
          $configB['allowed_types'] = 'jpeg|jpg|png';
          $configB['max_size']     = '200000';
          $configB['file_name'] = $namabukti[0];
          $this->load->library('upload', $configB);
          if($this->upload->do_upload('filePhoto2')){
            // Get data about the file
            $b = $this->upload->data();
          }
          $configC['upload_path'] = './asset/Pict';
          $configC['allowed_types'] = 'jpeg|jpg|png';
          $configC['max_size']     = '200000';
          $configC['file_name'] = $namabukti[0];
          $this->load->library('upload', $configC);
          if($this->upload->do_upload('filePhoto3')){
            // Get data about the file
            $c= $this->upload->data();
          }
        }
      }
    redirect('KaryawanController');
  }

  public function editReimbursement($id_reimbursement)
  {
    // code...
    $id_reimbursement = $id_reimbursement;
    $nama_reimbursement = $this->input->post('nama_reimbursement');
    $deskripsi_reimbursement = $this->input->post('deskripsi_reimbursement');
    $tgl_pembelian = $this->input->post('tanggal_pembelian');
    $kategori_reimbursement = $this->input->post('kategori_reimbursement');
    $nominal_pembelian = $this->input->post('nominal_pembelian');

    //variable
    $bukti = "".$id_reimbursement."-B";

    if (empty($_FILES["filePhoto1"]["tmp_name"])){
      $nama_bukti1 = Null;
    }else {
      $foto_size1 = getimagesize($_FILES['filePhoto1']['tmp_name']);
      if($foto_size1 == false){
        $alertimage1 = "File yang anda pilih tidak gambar";
        }else{
          $foto_bukti1 = $_FILES['filePhoto1']['tmp_name'];
          #$nama_bukti1 = $_FILES['filePhoto1']['name'];
          $tipe_bukti1 = $_FILES['filePhoto1']['type'];
          if($tipe_bukti1 == 'image/jpeg'){
            $tipe_bukti1 = 'image/jpg';
          }
          $tipebukti1  = preg_split("/\//", $tipe_bukti1);
          $nama_bukti1 = "".$bukti."A.".$tipebukti1[1]."";
        }
    }
    if (empty($_FILES["filePhoto2"]["tmp_name"])){
      $nama_bukti2 = Null;
    }else{
      $foto_size2 = getimagesize($_FILES['filePhoto2']['tmp_name']);
        if($foto_size2 == false){
          $alertimage2 = "File yang anda pilih tidak gambar";
        }else {
          $foto_bukti2 = $_FILES['filePhoto2']['tmp_name'];
          $tipe_bukti2 = $_FILES['filePhoto2']['type'];
          if($tipe_bukti2 == 'image/jpeg'){
            $tipe_bukti2 = 'image/jpg';
          }
          $tipebukti2  = preg_split("/\//", $tipe_bukti2);
          if($tipebukti1[1] == $tipebukti2[1] ){
            $nama_bukti2 = "".$bukti."A1.".$tipebukti2[1]."";
          }
          if($tipebukti1[1] != $tipebukti2[1] ){
            $nama_bukti2 = "".$bukti."A.".$tipebukti2[1]."";
          }
        }
      }
    if (empty($_FILES["filePhoto3"]["tmp_name"])){
      $nama_bukti3 = Null;
    }else{
      $foto_size3 = getimagesize($_FILES['filePhoto3']['tmp_name']);
        if($foto_size3 == false){
          $alertimage3 = "File yang anda pilih tidak gambar";
        }else {
          $foto_bukti3 = $_FILES['filePhoto3']['tmp_name'];
          $tipe_bukti3 = $_FILES['filePhoto3']['type'];
          if($tipe_bukti3 == 'image/jpeg'){
            $tipe_bukti3 = 'image/jpg';
          }
          $tipebukti3  = preg_split("/\//", $tipe_bukti3);
          if($tipebukti2[1] == $tipebukti3[1] and $tipebukti1[1] != $tipebukti2[1]){
            $nama_bukti3 = "".$bukti."A1.".$tipebukti3[1]."";
          }
          if($tipebukti2[1] != $tipebukti3[1] and $tipebukti1[1] != $tipebukti2[1]){
            $nama_bukti3 = "".$bukti."A1.".$tipebukti3[1]."";
          }
          if($tipebukti2[1] == $tipebukti3[1] and $tipebukti1[1] == $tipebukti2[1]){
            $nama_bukti3 = "".$bukti."A2.".$tipebukti3[1]."";
          }
          if($tipebukti2[1] != $tipebukti3[1] and $tipebukti1[1] != $tipebukti3[1]){
            $nama_bukti3 = "".$bukti."A.".$tipebukti3[1]."";
          }

        }
    }
    if ($nama_bukti1 == Null and $nama_bukti2 != Null and $nama_bukti3 != Null ){
      $d= array('nama_reimbursement' => $nama_reimbursement, 'jenis_reimbursement' => $kategori_reimbursement,
              'deskripsi_reimbursement' => $deskripsi_reimbursement, 'tanggal_pembelian' => $tgl_pembelian,
              'jumlah_reimbursement' => $nominal_pembelian,
              'bukti_reimbursement2' => $nama_bukti2, 'bukti_reimbursement3' => $nama_bukti3 );
    }
    if ($nama_bukti2 == Null and $nama_bukti1 != Null and $nama_bukti3 != Null ){
      $d= array('nama_reimbursement' => $nama_reimbursement, 'jenis_reimbursement' => $kategori_reimbursement,
              'deskripsi_reimbursement' => $deskripsi_reimbursement, 'tanggal_pembelian' => $tgl_pembelian,
              'jumlah_reimbursement' => $nominal_pembelian,
              'bukti_reimbursement' => $nama_bukti1, 'bukti_reimbursement3' => $nama_bukti3 );
    }
    if ($nama_bukti3 == Null and $nama_bukti1 != Null and $nama_bukti2 != Null ){
      $d= array('nama_reimbursement' => $nama_reimbursement, 'jenis_reimbursement' => $kategori_reimbursement,
              'deskripsi_reimbursement' => $deskripsi_reimbursement, 'tanggal_pembelian' => $tgl_pembelian,
              'jumlah_reimbursement' => $nominal_pembelian,
              'bukti_reimbursement' => $nama_bukti1, 'bukti_reimbursement2' => $nama_bukti2 );
    }
    if ($nama_bukti1 == Null and $nama_bukti2 == Null and $nama_bukti3 != Null ){
      $d= array('nama_reimbursement' => $nama_reimbursement, 'jenis_reimbursement' => $kategori_reimbursement,
              'deskripsi_reimbursement' => $deskripsi_reimbursement, 'tanggal_pembelian' => $tgl_pembelian,
              'jumlah_reimbursement' => $nominal_pembelian,
              'bukti_reimbursement3' => $nama_bukti3 );
    }
    if ($nama_bukti2 == Null and $nama_bukti3 == Null and $nama_bukti1 != Null ){
      $d= array('nama_reimbursement' => $nama_reimbursement, 'jenis_reimbursement' => $kategori_reimbursement,
              'deskripsi_reimbursement' => $deskripsi_reimbursement, 'tanggal_pembelian' => $tgl_pembelian,
              'jumlah_reimbursement' => $nominal_pembelian,
              'bukti_reimbursement' => $nama_bukti1 );
    }
    if ($nama_bukti1 == Null and $nama_bukti3 == Null and $nama_bukti2 != Null ){
      $d= array('nama_reimbursement' => $nama_reimbursement, 'jenis_reimbursement' => $kategori_reimbursement,
              'deskripsi_reimbursement' => $deskripsi_reimbursement, 'tanggal_pembelian' => $tgl_pembelian,
              'jumlah_reimbursement' => $nominal_pembelian,
              'bukti_reimbursement2' => $nama_bukti2 );
    }
    if ($nama_bukti1 == Null and $nama_bukti2 == Null and $nama_bukti3 == Null ){
      $d= array('nama_reimbursement' => $nama_reimbursement, 'jenis_reimbursement' => $kategori_reimbursement,
              'deskripsi_reimbursement' => $deskripsi_reimbursement, 'tanggal_pembelian' => $tgl_pembelian,
              'jumlah_reimbursement' => $nominal_pembelian );
    }
    if ($nama_bukti1 != Null and $nama_bukti2 != Null and $nama_bukti3 != Null ){
      $d= array('nama_reimbursement' => $nama_reimbursement, 'jenis_reimbursement' => $kategori_reimbursement,
              'deskripsi_reimbursement' => $deskripsi_reimbursement, 'tanggal_pembelian' => $tgl_pembelian,
              'jumlah_reimbursement' => $nominal_pembelian,'bukti_reimbursement' => $nama_bukti1,
              'bukti_reimbursement2' => $nama_bukti2, 'bukti_reimbursement3' => $nama_bukti3 );
    }
    $this->KaryawanModel->editReimbursement($id_reimbursement,$d);
    $namabukti  = preg_split("/\./", $nama_bukti1);
    $configA['upload_path'] = './asset/Pict';
    $configA['allowed_types'] = 'jpeg|jpg|png';
    $configA['max_size']     = '200000';
    $configA['file_name'] = $namabukti[0];
    $this->load->library('upload', $configA);
    $this->upload->initialize($configA);
    // // File upload
    if($this->upload->do_upload('filePhoto1')){
      // Get data about the file
      $a = $this->upload->data();
    }
    $configB['upload_path'] = './asset/Pict';
    $configB['allowed_types'] = 'jpeg|jpg|png';
    $configB['max_size']     = '200000';
    $configB['file_name'] = $namabukti[0];
    $this->load->library('upload', $configB);
    if($this->upload->do_upload('filePhoto2')){
      // Get data about the file
      $b = $this->upload->data();
    }
    $configC['upload_path'] = './asset/Pict';
    $configC['allowed_types'] = 'jpeg|jpg|png';
    $configC['max_size']     = '200000';
    $configC['file_name'] = $namabukti[0];
    $this->load->library('upload', $configC);
    if($this->upload->do_upload('filePhoto3')){
      // Get data about the file
      $c= $this->upload->data();
    }


    redirect('KaryawanController/readReimbursement/'.$id_reimbursement);

  }

  public function deleteReimbursement($id_reimbursement)
  {
    // code...
    $this->KaryawanModel->deleteReimbursement($id_reimbursement);
    redirect('KaryawanController');
  }

  public function readReimbursement($id_reimbursement)
  {
    // code...
    $result['detailReimbursement'] = $this->KaryawanModel->readReimbursement($id_reimbursement);
    $this->load->view('DetailReimbursement', $result);
  }

  public function search($id_user)
  {
    // code...
    $nama_reimbursement = $this->input->post('search_query');
    $result['reimbursementList'] = $this->KaryawanModel->search($nama_reimbursement, $id_user);
    $this->load->view('Karyawan', $result);
  }



  public function logout()
  {
    // code...
    session_destroy();
    redirect('LoginController');
  }
}


?>
