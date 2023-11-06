<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mCheckout extends CI_Model
{
    public function detail_transaksi($data)
    {
        $this->db->insert('detail_transaksi', $data);
    }
    public function transaksi($data)
    {
        $this->db->insert('transaksi', $data);
    }
    public function stok($id, $data)
    {
        $this->db->where('id_produk', $id);
        $this->db->update('produk', $data);
    }
    public function pengiriman($data)
    {
        $this->db->insert('pengiriman', $data);
    }
}

/* End of file mCheckout.php */
