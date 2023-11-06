<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAnalisis_member extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/mLaporan');
	}


	public function index()
	{
		$data = array(
			'lap' => $this->mLaporan->member()
		);
		$this->load->view('Pemilik/Layout/head');
		$this->load->view('Pemilik/Layout/aside');
		$this->load->view('Pemilik/Layout/navbar');
		$this->load->view('Pemilik/Laporan/lap_pelanggan', $data);
		$this->load->view('Pemilik/Layout/footer');
	}
	public function kelola_pelanggan($id)
	{
		$data = array(
			'nm_pel' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_tlpon' => $this->input->post('no_hp'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$this->db->where('id_pelanggan', $id);
		$this->db->update('pelanggan', $data);
		redirect('Pemilik/cPelanggan');
	}
	public function tambah_pelanggan()
	{
		$data = array(
			'nm_pel' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_tlpon' => $this->input->post('no_hp'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email')
		);
		$this->db->insert('pelanggan', $data);
		redirect('Pemilik/cPelanggan');
	}
	public function hapus_pelanggan($id)
	{
		$this->db->where('id_pelanggan', $id);
		$this->db->delete('pelanggan');
		redirect('Admin/cPelanggan');
	}
}

/* End of file cAnalisis_member.php */
