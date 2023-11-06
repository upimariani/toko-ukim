<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mChatting extends CI_Model
{
    public function chat()
    {
        $this->db->select('*');
        $this->db->from('chatting');
        $this->db->where('id_pelanggan', $this->session->userdata('id'));

        return $this->db->get()->result();
    }
    public function pelanggan_send($data)
    {
        $this->db->insert('chatting', $data);
    }
}

/* End of file mChatting.php */
