<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/mLogin');
	}


	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Admin/login');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$data = $this->mLogin->login($username, $password);
			if ($data) {
				$id_user = $data->id_user;
				$level_user = $data->level_user;

				$this->session->set_userdata('id', $id_user);
				$this->session->set_userdata('level', $level_user);

				if ($level_user == '1') {
					redirect('Admin/cDashboard');
				} else if ($level_user == '2') {
					redirect('Pemilik/cAnalisis_member');
				}
			} else {
				$this->session->set_flashdata('error', 'Username dan Password Anda Salah!');
				redirect('');
			}
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('level');
		$this->session->set_flashdata('success', 'Anda Berhasil LogOut!');
		redirect('');
	}
}

/* End of file cLogin.php */
