<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cShopGrid extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan/mKatalog');
    }
    public function index()
    {
        $data = array(
            'produk' => $this->mKatalog->katalog()
        );
        $this->load->view('Pelanggan/Layout/head');
        $this->load->view('Pelanggan/Layout/header');
        $this->load->view('Pelanggan/shopgrid', $data);
        $this->load->view('Pelanggan/Layout/footer');
    }
}

/* End of file cShopGrid.php */
