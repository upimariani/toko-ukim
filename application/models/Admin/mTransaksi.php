<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mTransaksi extends CI_Model
{
	public function transaksi()
	{
		$data['pesanan_masuk'] = $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE status_order='0' AND type_order='1'")->result();
		$data['konfirmasi'] = $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE status_order='1' AND type_order='1'")->result();
		$data['diproses'] = $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE status_order='2' AND type_order='1'")->result();
		$data['dikirim'] = $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE status_order='3' AND type_order='1'")->result();
		$data['selesai'] = $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE status_order='4' AND type_order='1'")->result();
		return $data;
	}
	public function detail_pesanan($id)
	{
		$data['pesanan'] = $this->db->query("SELECT * FROM detail_transaksi JOIN transaksi ON detail_transaksi.id_transaksi=transaksi.id_transaksi JOIN diskon ON detail_transaksi.id_diskon=diskon.id_diskon JOIN produk ON diskon.id_produk=produk.id_produk WHERE transaksi.id_transaksi='" . $id . "';")->result();
		$data['transaksi'] = $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON pelanggan.id_pelanggan=transaksi.id_pelanggan WHERE transaksi.id_transaksi='" . $id . "';")->row();
		return $data;
	}
	public function produk()
	{
		return $this->db->query("SELECT * FROM `produk` JOIN diskon ON produk.id_produk = diskon.id_produk WHERE diskon.member='3'")->result();
	}

	//transaksi langsung
	public function transaksi_langsung()
	{
		$data['pesanan'] = $this->db->query("SELECT * FROM transaksi JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE type_order='2' AND status_order='0'")->result();
		$data['selesai'] = $this->db->query("SELECT * FROM transaksi JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE type_order='2' AND status_order='4'")->result();
		return $data;
	}
	public function detail_transaksi_langsung($id)
	{
		$data['pesanan'] = $this->db->query("SELECT * FROM detail_transaksi JOIN transaksi ON detail_transaksi.id_transaksi=transaksi.id_transaksi JOIN diskon ON detail_transaksi.id_diskon=diskon.id_diskon JOIN produk ON diskon.id_produk=produk.id_produk WHERE transaksi.id_transaksi='" . $id . "';")->result();
		$data['transaksi'] = $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON pelanggan.id_pelanggan=transaksi.id_pelanggan WHERE transaksi.id_transaksi='" . $id . "';")->row();
		return $data;
	}
}

/* End of file mTransaksi.php */
