<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cProduk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/mProduk');
		$this->load->model('Admin/mKategori');
	}


	public function index()
	{
		$data = array(
			'produk' => $this->mProduk->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Layout/navbar');
		$this->load->view('Admin/Produk/produk', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function createProduk()
	{
		$this->form_validation->set_rules('nama', 'Nama Produk', 'required');
		$this->form_validation->set_rules('tipe', 'Tipe Produk', 'required');
		$this->form_validation->set_rules('harga', 'Harga Produk', 'required');
		$this->form_validation->set_rules('stok', 'Stok Produk', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'kategori' => $this->mKategori->select()
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/Layout/navbar');
			$this->load->view('Admin/Produk/createProduk', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$config['upload_path']          = './asset/foto-produk';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 50000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				$data = array(
					'error' => $this->upload->display_errors(),
					'kategori' => $this->mKategori->select()
				);

				$this->load->view('Admin/Layout/head');
				$this->load->view('Admin/Layout/aside');
				$this->load->view('Admin/Layout/navbar');
				$this->load->view('Admin/Produk/createProduk', $data);
				$this->load->view('Admin/Layout/footer');
			} else {
				$upload_data = $this->upload->data();
				$data = array(
					'id_produk' => $this->input->post('id'),
					'id_kategori' => $this->input->post('kategori'),
					'nama_produk' => $this->input->post('nama'),
					'harga' => $this->input->post('harga'),
					'stok' => $this->input->post('stok'),
					'deskripsi' => $this->input->post('deskripsi'),
					'tipe' => $this->input->post('tipe'),
					'gambar' => $upload_data['file_name']
				);
				$this->mProduk->insert($data);

				//memasukkan data diskon
				for ($i = 1; $i <= 3; $i++) {
					$diskon = array(
						'id_produk' => $this->input->post('id'),
						'nama_diskon' => '0',
						'diskon' => '0',
						'tgl_selesai' => '0',
						'member' => $i
					);
					$this->mProduk->diskon($diskon);
				}

				$this->session->set_flashdata('success', 'Data Produk Berhasil Ditambahkan!');
				redirect('Admin/cproduk');
			}
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Produk', 'required');
		$this->form_validation->set_rules('tipe', 'Tipe Produk', 'required');
		$this->form_validation->set_rules('harga', 'Harga Produk', 'required');
		$this->form_validation->set_rules('stok', 'Stok Produk', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required');
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path']          = './asset/foto-produk';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 500000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				$data = array(
					'error' => $this->upload->display_errors(),
					'kategori' => $this->mKategori->select(),
					'produk' => $this->mProduk->edit($id)
				);

				$this->load->view('Admin/Layout/head');
				$this->load->view('Admin/Layout/aside');
				$this->load->view('Admin/Layout/navbar');
				$this->load->view('Admin/Produk/updateProduk', $data);
				$this->load->view('Admin/Layout/footer');
			} else {
				$produk = $this->mProduk->select();
				if ($produk->gambar !== "") {
					unlink('./asset/foto-produk/' . $produk->foto);
				}
				$upload_data =  $this->upload->data();
				$data = array(
					'id_kategori' => $this->input->post('kategori'),
					'nama_produk' => $this->input->post('nama'),
					'harga' => $this->input->post('harga'),
					'stok' => $this->input->post('stok'),
					'deskripsi' => $this->input->post('deskripsi'),
					'tipe' => $this->input->post('tipe'),
					'gambar' => $upload_data['file_name']
				);
				$this->mProduk->update($id, $data);
				$this->session->set_flashdata('success', 'Data Produk Berhasil Diperbaharui !!!');
				redirect('Admin/cProduk');
			} //tanpa ganti gambar
			$data = array(
				'id_kategori' => $this->input->post('kategori'),
				'nama_produk' => $this->input->post('nama'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok'),
				'deskripsi' => $this->input->post('deskripsi'),
				'tipe' => $this->input->post('tipe')
			);
			$this->mProduk->update($id, $data);
			$this->session->set_flashdata('success', 'Data Produk Berhasil Diperbaharui !!!');
			redirect('Admin/cProduk');
		}
		$data = array(
			'kategori' => $this->mKategori->select(),
			'produk' => $this->mProduk->edit($id)
		);

		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Layout/navbar');
		$this->load->view('Admin/Produk/updateProduk', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function delete($id)
	{
		$this->mProduk->delete($id);
		$this->session->set_flashdata('success', 'Data Produk Berhasil Dihapus !!!');
		redirect('Admin/cProduk');
	}
}

/* End of file cProduk.php */
