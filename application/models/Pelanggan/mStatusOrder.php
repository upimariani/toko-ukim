<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mStatusOrder extends CI_Model
{
	public function pesanan()
	{
		$data['deliv'] = $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan WHERE type_order='1' AND pelanggan.id_pelanggan=" . $this->session->userdata('id'))->result();
		$data['dinein'] = $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan WHERE type_order='2' AND pelanggan.id_pelanggan=" . $this->session->userdata('id'))->result();
		return $data;
	}
	public function detail_pesanan($id)
	{
		$data['pesanan'] = $this->db->query("SELECT * FROM transaksi JOIN detail_transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi JOIN diskon ON detail_transaksi.id_diskon = diskon.id_diskon JOIN produk ON diskon.id_produk = produk.id_produk WHERE transaksi.id_transaksi='" . $id . "'")->result();
		$data['transaksi'] = $this->db->query("SELECT * FROM transaksi JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE transaksi.id_transaksi='" . $id . "'")->row();
		return $data;
	}
	public function pembayaran($id, $data)
	{
		$this->db->where('id_transaksi', $id);
		$this->db->update('transaksi', $data);
	}
	public function pelanggan($id)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('id_pelanggan', $id);
		return $this->db->get()->row();
	}
	public function update_point($id, $data)
	{
		$this->db->where('id_pelanggan', $id);
		$this->db->update('pelanggan', $data);
	}
	public function kritik_saran($data)
	{
		$this->db->insert('kritik_saran', $data);
	}
	public function review_all()
	{
		$this->db->select('*');
		$this->db->from('kritik_saran');
		$this->db->join('pelanggan', 'kritik_saran.id_pelanggan = pelanggan.id_pelanggan', 'left');
		return $this->db->get()->result();
	}

	//transaksi langsung
	// public function detail_pesanan_langsung($id)
	// {
	// 	$data['pesanan'] = $this->db->query("SELECT * FROM transaksi JOIN detail_transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi JOIN diskon ON detail_transaksi.id_diskon = diskon.id_diskon JOIN produk ON diskon.id_produk = produk.id_produk WHERE transaksi.id_transaksi='" . $id . "'")->result();
	// 	$data['transaksi'] = $this->db->query("SELECT * FROM transaksi JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE transaksi.id_transaksi='" . $id . "'")->row();
	// 	return $data;
	// }
}

/* End of file mStatusOrder.php */
