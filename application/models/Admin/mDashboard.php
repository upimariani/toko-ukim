<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mDashboard extends CI_Model
{
    public function stok_produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        return $this->db->get()->result();
    }
    public function chatting()
    {
        $this->db->select('*');
        $this->db->from('chatting');
        $this->db->join('pelanggan', 'chatting.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->group_by('chatting.id_pelanggan');
        return $this->db->get()->result();
    }
    public function view_chatting($id)
    {
        $this->db->select('*');
        $this->db->from('chatting');
        $this->db->join('pelanggan', 'chatting.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->where('chatting.id_pelanggan', $id);
        return $this->db->get()->result();
    }
    public function kritik_saran()
    {

        $this->db->select('*');
        $this->db->from('kritik_saran');
        $this->db->join('pelanggan', 'kritik_saran.id_pelanggan = pelanggan.id_pelanggan', 'left');
        return $this->db->get()->result();
    }
}

/* End of file mDashboard.php */
