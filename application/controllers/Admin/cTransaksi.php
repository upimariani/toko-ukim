<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/mTransaksi');
        $this->load->model('Pelanggan/mStatusOrder');
    }


    public function pesanan_masuk()
    {
        $data = array(
            'transaksi' => $this->mTransaksi->transaksi()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Layout/navbar');
        $this->load->view('Admin/Transaksi/pesanan_masuk', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function konfirmasi_pembayaran()
    {
        $data = array(
            'transaksi' => $this->mTransaksi->transaksi()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Layout/navbar');
        $this->load->view('Admin/Transaksi/konfirmasi_pembayaran', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function pesanan_diproses()
    {
        $data = array(
            'transaksi' => $this->mTransaksi->transaksi()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Layout/navbar');
        $this->load->view('Admin/Transaksi/pesanan_diproses', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function pesanan_dikirim()
    {
        $data = array(
            'transaksi' => $this->mTransaksi->transaksi()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Layout/navbar');
        $this->load->view('Admin/Transaksi/pesanan_dikirim', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function pesanan_selesai()
    {
        $data = array(
            'transaksi' => $this->mTransaksi->transaksi()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Layout/navbar');
        $this->load->view('Admin/Transaksi/pesanan_selesai', $data);
        $this->load->view('Admin/Layout/footer');
    }

    public function detail_pesanan($id)
    {
        $data = array(
            'detail' => $this->mTransaksi->detail_pesanan($id)
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Layout/navbar');
        $this->load->view('Admin/Transaksi/detail_pesanan', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function konfirmasi($id)
    {
        $data = array(
            'status_order' => '2'
        );
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi', $data);
        $this->session->set_flashdata('success', 'Pesanan Segera Diproses!');
        redirect('Admin/cTransaksi/pesanan_diproses');
    }
    public function dikirim($id)
    {
        $data = array(
            'status_order' => '3'
        );
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi', $data);
        $this->session->set_flashdata('success', 'Pesanan Segera Dikrrim!');
        redirect('Admin/cTransaksi/pesanan_dikirim');
    }
    public function pesanan_diterima_admin($id)
    {
        $id_pelanggan = $this->input->post('pelanggan');
        $pelanggan = $this->mStatusOrder->pelanggan($id_pelanggan);
        $point_sebelumnya = $pelanggan->point;

        $point_update = $point_sebelumnya + $this->input->post('point');
        //update level member
        if ($point_update <= 1000) {
            $member = '3';
        } else if ($point_update >= 1000) {
            $member = '2';
        } else if ($point_update >= 10000) {
            $member = '1';
        }
        $data = array(
            'point' => $point_update,
            'level_member' => $member
        );
        $this->mStatusOrder->update_point($id_pelanggan, $data);

        $status_order = array(
            'status_order' => '4'
        );
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi', $status_order);
        $this->session->set_flashdata('success', 'Pesanan Sudah Diterima');
        redirect('admin/ctransaksi/pesanan_selesai');
    }
}

/* End of file cTransaksi.php */
