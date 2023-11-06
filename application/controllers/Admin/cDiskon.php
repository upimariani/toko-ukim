<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cDiskon extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/mDiskon');
        $this->load->model('Admin/mProduk');
    }


    public function index()
    {
        $data = array(
            'diskon' => $this->mDiskon->select()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Layout/navbar');
        $this->load->view('Admin/Diskon/diskon', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createDiskon()
    {
        $this->form_validation->set_rules('produk', 'Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga Sebelumnya', 'required');
        $this->form_validation->set_rules('nama_diskon', 'Nama Diskon', 'required');
        $this->form_validation->set_rules('diskon', 'Besar Diskon', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal Selesai', 'required');
        $this->form_validation->set_rules('level', 'Level Member', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'produk' => $this->mProduk->select()
            );
            $this->load->view('Admin/Layout/head');
            $this->load->view('Admin/Layout/aside');
            $this->load->view('Admin/Layout/navbar');
            $this->load->view('Admin/Diskon/createDiskon', $data);
            $this->load->view('Admin/Layout/footer');
        } else {
            $id_produk = $this->input->post('produk');
            $level = $this->input->post('level');
            $data = array(
                'nama_diskon' => $this->input->post('nama_diskon'),
                'tgl_selesai' => $this->input->post('tgl'),
                'diskon' => $this->input->post('diskon')
            );
            $this->mDiskon->diskon($id_produk, $level, $data);
            $this->session->set_flashdata('success', 'Data Diskon Berhasil Ditambahkan!');
            redirect('Admin/cDiskon');
        }
    }
    public function update($id = null)
    {
        $this->form_validation->set_rules('produk', 'Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga Sebelumnya', 'required');
        $this->form_validation->set_rules('nama_diskon', 'Nama Diskon', 'required');
        $this->form_validation->set_rules('diskon', 'Besar Diskon', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal Selesai', 'required');
        $this->form_validation->set_rules('level', 'Level Member', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'produk' => $this->mProduk->select(),
                'diskon' => $this->mDiskon->edit($id)
            );
            $this->load->view('Admin/Layout/head');
            $this->load->view('Admin/Layout/aside');
            $this->load->view('Admin/Layout/navbar');
            $this->load->view('Admin/Diskon/updateDiskon', $data);
            $this->load->view('Admin/Layout/footer');
        } else {
            $id_produk = $this->input->post('produk');
            $level = $this->input->post('level');
            $data = array(
                'nama_diskon' => $this->input->post('nama_diskon'),
                'tgl_selesai' => $this->input->post('tgl'),
                'diskon' => $this->input->post('diskon')
            );
            $this->mDiskon->diskon($id_produk, $level, $data);
            $this->session->set_flashdata('success', 'Data Diskon Berhasil Ditambahkan!');
            redirect('Admin/cDiskon');
        }
    }
    public function delete($id)
    {
        $data = array(
            'nama_diskon' => '0',
            'tgl_selesai' => '0',
            'diskon' => '0'
        );
        $this->mDiskon->delete($id, $data);
        $this->session->set_flashdata('success', 'Data Diskon Berhasil Dihapus!');
        redirect('Admin/cDiskon');
    }
}

/* End of file cDiskon.php */
