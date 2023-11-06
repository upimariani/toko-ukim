<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mDiskon extends CI_Model
{
    public function select()
    {
        $this->db->select('*');
        $this->db->from('diskon');
        $this->db->join('produk', 'diskon.id_produk = produk.id_produk', 'left');
        $this->db->where('diskon!=0');

        return $this->db->get()->result();
    }
    public function diskon($id, $level, $data)
    {
        $this->db->where('id_produk', $id);
        $this->db->where('member', $level);
        $this->db->update('diskon', $data);
    }
    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('diskon');
        $this->db->join('produk', 'diskon.id_produk = produk.id_produk', 'left');
        $this->db->where('id_diskon', $id);
        return $this->db->get()->row();
    }
    public function delete($id, $data)
    {
        $this->db->where('id_diskon', $id);
        $this->db->update('diskon', $data);
    }
}

/* End of file mDiskon.php */
