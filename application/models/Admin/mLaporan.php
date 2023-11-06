<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLaporan extends CI_Model
{

    public function grafik_transaksi()
    {
        $this->db->select('SUM(total_bayar) as total, tgl_transaksi');
        $this->db->from('transaksi');
        $this->db->group_by('tgl_transaksi');
        $this->db->where('status_order=4');
        return $this->db->get()->result();
    }
    public function lap_harian_transaksi($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->join('detail_transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi', 'left');
        $this->db->join('diskon', 'detail_transaksi.id_diskon = diskon.id_diskon', 'left');
        $this->db->join('produk', 'produk.id_produk = diskon.id_produk', 'left');

        $this->db->where('transaksi.status_order=4');
        $this->db->where('DAY(transaksi.tgl_transaksi)', $tanggal);
        $this->db->where('MONTH(transaksi.tgl_transaksi)', $bulan);
        $this->db->where('YEAR(transaksi.tgl_transaksi)', $tahun);
        return $this->db->get()->result();
    }
    public function lap_bulanan_transaksi($bulan, $tahun)
    {

        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->join('detail_transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi', 'left');
        $this->db->join('diskon', 'detail_transaksi.id_diskon = diskon.id_diskon', 'left');
        $this->db->join('produk', 'produk.id_produk = diskon.id_produk', 'left');

        $this->db->where('transaksi.status_order=4');
        $this->db->where('MONTH(transaksi.tgl_transaksi)', $bulan);
        $this->db->where('YEAR(transaksi.tgl_transaksi)', $tahun);
        return $this->db->get()->result();
    }
    public function lap_tahunan_transaksi($tahun)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->join('detail_transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi', 'left');
        $this->db->join('diskon', 'detail_transaksi.id_diskon = diskon.id_diskon', 'left');
        $this->db->join('produk', 'produk.id_produk = diskon.id_produk', 'left');

        $this->db->where('transaksi.status_order=4');
        $this->db->where('YEAR(transaksi.tgl_transaksi)', $tahun);
        return $this->db->get()->result();
    }



    //laporan produk
    public function grafik_produk()
    {
        $this->db->select('SUM(qty) as qty, tgl_transaksi, nama_produk, transaksi.id_transaksi, harga, produk.id_produk');
        $this->db->from('detail_transaksi');
        $this->db->join('transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi', 'left');
        $this->db->join('diskon', 'detail_transaksi.id_diskon = diskon.id_diskon', 'left');
        $this->db->join('produk', 'produk.id_produk = diskon.id_produk', 'left');
        $this->db->group_by('produk.id_produk');
        return $this->db->get()->result();
    }
    public function lap_harian_produk($tanggal, $bulan, $tahun)
    {
        $this->db->select('SUM(qty) as qty, tgl_transaksi, nama_produk, transaksi.id_transaksi, harga, produk.id_produk');
        $this->db->from('detail_transaksi');
        $this->db->join('transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi', 'left');
        $this->db->join('diskon', 'detail_transaksi.id_diskon = diskon.id_diskon', 'left');
        $this->db->join('produk', 'produk.id_produk = diskon.id_produk', 'left');
        $this->db->group_by('produk.id_produk');


        $this->db->where('transaksi.status_order=4');
        $this->db->where('DAY(transaksi.tgl_transaksi)', $tanggal);
        $this->db->where('MONTH(transaksi.tgl_transaksi)', $bulan);
        $this->db->where('YEAR(transaksi.tgl_transaksi)', $tahun);
        return $this->db->get()->result();
    }
    public function lap_bulanan_produk($bulan, $tahun)
    {

        $this->db->select('SUM(qty) as qty, tgl_transaksi, nama_produk, transaksi.id_transaksi, harga, produk.id_produk');
        $this->db->from('detail_transaksi');
        $this->db->join('transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi', 'left');
        $this->db->join('diskon', 'detail_transaksi.id_diskon = diskon.id_diskon', 'left');
        $this->db->join('produk', 'produk.id_produk = diskon.id_produk', 'left');
        $this->db->group_by('produk.id_produk');

        $this->db->where('transaksi.status_order=4');
        $this->db->where('MONTH(transaksi.tgl_transaksi)', $bulan);
        $this->db->where('YEAR(transaksi.tgl_transaksi)', $tahun);
        return $this->db->get()->result();
    }
    public function lap_tahunan_produk($tahun)
    {
        $this->db->select('SUM(qty) as qty, tgl_transaksi, nama_produk, transaksi.id_transaksi, harga, produk.id_produk, nm_pel');
        $this->db->from('detail_transaksi');
        $this->db->join('transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi', 'left');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');

        $this->db->join('diskon', 'detail_transaksi.id_diskon = diskon.id_diskon', 'left');
        $this->db->join('produk', 'produk.id_produk = diskon.id_produk', 'left');
        $this->db->group_by('produk.id_produk');

        $this->db->where('transaksi.status_order=4');
        $this->db->where('YEAR(transaksi.tgl_transaksi)', $tahun);
        return $this->db->get()->result();
    }

    //analisis member pelanggan
    public function member()
    {
        $data['gold'] = $this->db->query("SELECT COUNT(level_member) as jml FROM `pelanggan` WHERE level_member='1'")->row();
        $data['silver'] = $this->db->query("SELECT COUNT(level_member) as jml FROM `pelanggan` WHERE level_member='2'")->row();
        $data['classic'] = $this->db->query("SELECT COUNT(level_member) as jml FROM `pelanggan` WHERE level_member='3'")->row();
        $data['all'] = $this->db->query("SELECT * FROM `pelanggan`")->result();
        return $data;
    }
}

/* End of file mlaporan.php */
