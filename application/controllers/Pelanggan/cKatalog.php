<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKatalog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan/mKatalog');
    }


    public function index()
    {
        $data = array(
            'best' => $this->mKatalog->produk_best(),
            'menu' => $this->mKatalog->menu_paket()
        );
        $this->load->view('Pelanggan/Layout/head');
        $this->load->view('Pelanggan/Layout/header');
        $this->load->view('Pelanggan/katalog', $data);
        $this->load->view('Pelanggan/Layout/footer');
    }
}

/* End of file cKatalog.php */
