<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModel');
		$this->load->model('KaryawanModel');
		$this->load->model('FinanceModel');
	}

	public function index()
  {
    $this->load->view('SignInPage');
  }

  public function checkUser()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

	if(empty($username) || empty($password)){
		$x = '<div class="alert alert-warning" style="margin-top:6px">Silakan Masukan Username dan Password Anda!</div>';
		$this->session->set_flashdata('p', $x);
		redirect('LoginController');
	} else {
		if ($this->AdminModel->validateAdmin($username, $password)) {
		redirect('AdminController');
		} else if ($this->KaryawanModel->checkKaryawan($username, $password)) {
				redirect('KaryawanController');
			} else if ($this->FinanceModel->validateFinance($username, $password)) {
				redirect('FinanceController');
			} else {
				$x = '<div class="alert alert-warning" style="margin-top:6px">Username dan Password Anda Salah!</div>';
				$this->session->set_flashdata('p', $x);
				redirect('LoginController');
				session_destroy();

			}
		}
	}

	public function PassChange($username)
	{
		$queryResult['dataKaryawan'] = $this->AdminModel->getIDUser($username);
		$this->load->view('ChangePassword', $queryResult);
	}
}
