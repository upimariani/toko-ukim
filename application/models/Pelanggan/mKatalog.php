<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKatalog extends CI_Model
{
    public function katalog()
    {
        if ($this->session->userdata('member') == '') {
            $data['menu'] = $this->db->query("SELECT * FROM `produk` JOIN diskon ON produk.id_produk = diskon.id_produk WHERE diskon.member='3' AND tipe='1'")->result();
        } else {
            $data['menu'] = $this->db->query("SELECT * FROM `produk` JOIN diskon ON produk.id_produk = diskon.id_produk WHERE tipe='1' AND diskon.member='" . $this->session->userdata('member') . "'")->result();
        }

        return $data;
    }
    public function produk_best()
    {
        return $this->db->query("SELECT SUM(qty) as qty, produk.id_produk, nama_produk, deskripsi, harga, gambar, diskon.id_diskon, stok, diskon FROM `detail_transaksi` JOIN diskon ON detail_transaksi.id_diskon = diskon.id_diskon JOIN produk on produk.id_produk = diskon.id_produk GROUP BY produk.id_produk ORDER BY qty desc")->result();
    }
    public function menu_paket()
    {
        if ($this->session->userdata('member') == '') {
            $data['paket'] = $this->db->query("SELECT * FROM `produk` JOIN diskon ON produk.id_produk = diskon.id_produk WHERE diskon.member='3' AND tipe='2'")->result();
        } else {
            $data['paket'] = $this->db->query("SELECT * FROM `produk` JOIN diskon ON produk.id_produk = diskon.id_produk WHERE tipe='2' AND diskon.member='" . $this->session->userdata('member') . "'")->result();
        }

        return $data;
    }
}

/* End of file mKatalog.php */
