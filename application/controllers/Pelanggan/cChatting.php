<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cChatting extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mChatting');
    }
    public function index()
    {

        $this->form_validation->set_rules('message', 'Pesan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->protect->protect();
            $data = array(
                'chat' => $this->mChatting->chat()
            );
            $this->load->view('Pelanggan/Layout/head');
            $this->load->view('Pelanggan/Layout/header');
            $this->load->view('Pelanggan/chatting', $data);
            $this->load->view('Pelanggan/Layout/footer');
        } else {
            $data = array(
                'id_pelanggan' => $this->input->post('id_pelanggan'),
                'id_user' => '1',
                'pelanggan_send' => $this->input->post('message')
            );
            $this->mChatting->pelanggan_send($data);
            redirect('pelanggan/cchatting');
        }
    }
}

/* End of file cChatting.php */
