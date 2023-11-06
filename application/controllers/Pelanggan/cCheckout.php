<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cCheckout extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelanggan/mAlamat');
		$this->load->model('Pelanggan/mCheckout');
	}

	public function index()
	{
		$this->protect->protect();
		$this->load->view('Pelanggan/checkout');
	}
	// function add_ajax_kec()
	// {
	// 	$id = $this->input->post('id', TRUE);
	// 	$data = $this->mAlamat->kecamatan($id);
	// 	echo json_encode($data);
	// }
	public function pesan()
	{
		$this->protect->protect();

		//menyimpan tabel trasnsaksi
		$data = array(
			'id_transaksi' => $this->input->post('id_transaksi'),
			'id_pelanggan' => $this->session->userdata('id'),
			'tgl_transaksi' => date('Y-m-d'),
			'total_bayar' => $this->input->post('total_bayar'),
			'status_order' => '0',
			'bukti_pembayaran' => '0',
			'grand_total' => $this->cart->total(),
			'provinsi' => $this->input->post('provinsi'),
			'kota' => $this->input->post('kota'),
			'expedisi' => $this->input->post('expedisi'),
			'paket' => $this->input->post('paket'),
			'estimasi' => $this->input->post('estimasi')

		);
		$this->mCheckout->transaksi($data);




		//menyimpan pesanan ke detail transaksi
		$i = 1;
		foreach ($this->cart->contents() as $item) {
			$data_rinci = array(
				'id_transaksi' => $this->input->post('id_transaksi'),
				'id_diskon' => $item['id'],
				'qty' => $this->input->post('qty' . $i++)
			);
			$this->mCheckout->detail_transaksi($data_rinci);
		}

		//mengurangi jumlah stok
		$kstok = 0;
		foreach ($this->cart->contents() as $key => $value) {
			$id = $value['id'];
			$kstok = $value['stok'] - $value['qty'];
			$data = array(
				'stok' => $kstok
			);
			$this->mCheckout->stok($id, $data);
		}


		$this->cart->destroy();
		redirect('Pelanggan/cStatusOrder');
	}
}

/* End of file cCheckout.php */
