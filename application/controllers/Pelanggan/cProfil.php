<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cProfil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan/mProfil');
    }


    public function index()
    {
        $this->protect->protect();
        $data = array(
            'pelanggan' => $this->mProfil->pelanggan()
        );
        $this->load->view('Pelanggan/Layout/head');
        $this->load->view('Pelanggan/Layout/header');
        $this->load->view('Pelanggan/profil', $data);
        $this->load->view('Pelanggan/Layout/footer');
    }
    public function update_profil()
    {
        $data = array(
            'nm_pel' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'no_tlpon' => $this->input->post('no_hp'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        $this->mProfil->update_profil($this->session->userdata('id'), $data);
        $this->session->set_flashdata('success', 'Data Pelanggan Berhasil Diperhabarui');
        redirect('pelanggan/cprofil');
    }
}

/* End of file cProfil.php */
