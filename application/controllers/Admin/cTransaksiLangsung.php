<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksiLangsung extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/mTransaksi');
		$this->load->model('Pelanggan/mStatusOrder');
		$this->load->model('Pelanggan/mCheckout');
	}

	public function index()
	{
		$data = array(
			'produk' => $this->mTransaksi->produk(),
			'transaksi' => $this->mTransaksi->transaksi_langsung()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Layout/navbar');
		$this->load->view('Admin/Dinein/transaksiLangsung', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function add_to_cart()
	{
		$data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'qty' => $this->input->post('qty'),
			'picture' => $this->input->post('picture'),
			'stok' => $this->input->post('stok'),
			'disc' => $this->input->post('diskon'),
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('success', 'Data Produk Berhasil Disimpan Dikeranjang!');
		redirect('admin/cTransaksiLangsung');
	}
	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('admin/cTransaksiLangsung');
	}
	public function pesan_langsung()
	{
		$data = array(
			'id_transaksi' => $this->input->post('id_transaksi'),
			'id_pelanggan' => $this->input->post('pelanggan'),
			'tgl_transaksi' => date('Y-m-d'),
			'total_bayar' => $this->input->post('total'),
			'status_order' => '4',
			'type_order' => '2',
			'bukti_pembayaran' => '0'
		);
		// var_dump($data);
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
			// var_dump($data_rinci);
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

		$id_pelanggan = $this->input->post('pelanggan');
		$pelanggan = $this->mStatusOrder->pelanggan($id_pelanggan);
		$point_sebelumnya = $pelanggan->point;

		$total_bayar = $this->input->post('total');
		$point = (0.5 / 100) * $total_bayar;
		$point_update = $point_sebelumnya + $point;
		//update level member
		if ($point_update <= 1000) {
			$member = '3';
		} else if ($point_update >= 1000) {
			$member = '2';
		} else if ($point_update >= 10000) {
			$member = '1';
		}
		$data = array(
			'point' => $point_update,
			'level_member' => $member
		);
		$this->mStatusOrder->update_point($id_pelanggan, $data);
		$this->cart->destroy();
		redirect('admin/cTransaksiLangsung');
	}

	public function detail_pesanan_langsung($id)
	{
		$data = array(
			'detail' => $this->mTransaksi->detail_transaksi_langsung($id)
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Layout/navbar');
		$this->load->view('Admin/Dinein/detail_pesanan_langsung', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function selesai()
	{
		$data = array(
			'transaksi' => $this->mTransaksi->transaksi_langsung()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Layout/navbar');
		$this->load->view('Admin/Dinein/transaksiSelesai', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function konfirmasi_selesai($id)
	{
		$id_pelanggan = $this->input->post('pelanggan');
		$pelanggan = $this->mStatusOrder->pelanggan($id_pelanggan);
		$point_sebelumnya = $pelanggan->point;

		$point_update = $point_sebelumnya + $this->input->post('point');
		//update level member
		if ($point_update <= 1000) {
			$member = '3';
		} else if ($point_update >= 1000) {
			$member = '2';
		} else if ($point_update >= 10000) {
			$member = '1';
		}
		$data = array(
			'point' => $point_update,
			'level_member' => $member
		);
		$this->mStatusOrder->update_point($id_pelanggan, $data);

		$status_order = array(
			'status_order' => '4'
		);
		$this->db->where('id_transaksi', $id);
		$this->db->update('transaksi', $status_order);
		$this->session->set_flashdata('success', 'Pesanan Sudah Selesai');
		redirect('admin/cTransaksiLangsung/selesai');
	}
}

/* End of file cTransaksiLangsung.php */
