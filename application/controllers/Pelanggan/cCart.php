<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cCart extends CI_Controller
{

    public function index()
    {
        $this->protect->protect();
        $this->load->view('Pelanggan/Layout/head');
        $this->load->view('Pelanggan/Layout/header');
        $this->load->view('Pelanggan/cart');
        $this->load->view('Pelanggan/Layout/footer');
    }
    public function add_cart()
    {
        $this->protect->protect();
        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'qty' => $this->input->post('qty'),
            'picture' => $this->input->post('picture'),
            'stok' => $this->input->post('stok'),
            'disc' => $this->input->post('diskon'),
        );
        $this->cart->insert($data);
        $this->session->set_flashdata('success', 'Data Produk Berhasil Disimpan Dikeranjang!');
        redirect('Pelanggan/cShopGrid');
    }
    public function update_cart()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid'  => $items['rowid'],
                'qty'    => $this->input->post($i . '[qty]')
            );
            $this->cart->update($data);
            $i++;
        }
        redirect('Pelanggan/cCart');
    }
    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('Pelanggan/cCart');
    }
}

/* End of file cCart.php */
