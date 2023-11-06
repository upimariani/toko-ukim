<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cStatusOrder extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan/mStatusOrder');
    }


    public function index()
    {
        $this->protect->protect();
        $data = array(
            'status' => $this->mStatusOrder->pesanan()
        );
        $this->load->view('Pelanggan/Layout/head');
        $this->load->view('Pelanggan/Layout/header');
        $this->load->view('Pelanggan/status_order', $data);
        $this->load->view('Pelanggan/Layout/footer');
    }
    public function detail_pesanan($id)
    {
        $data = array(
            'detail' => $this->mStatusOrder->detail_pesanan($id)
        );
        $this->load->view('Pelanggan/Layout/head');
        $this->load->view('Pelanggan/Layout/header');
        $this->load->view('Pelanggan/detail_pesanan', $data);
        $this->load->view('Pelanggan/Layout/footer');
    }
    public function pembayaran($id)
    {
        $config['upload_path']          = './asset/bukti-pembayaran';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5000;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $data = array(
                'detail' => $this->mStatusOrder->detail_pesanan($id),
                'error' => $this->upload->display_errors()
            );
            $this->load->view('Pelanggan/Layout/head');
            $this->load->view('Pelanggan/Layout/header');
            $this->load->view('Pelanggan/detail_pesanan', $data);
            $this->load->view('Pelanggan/Layout/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'status_order' => '1',
                'bukti_pembayaran' => $upload_data['file_name']
            );
            $this->mStatusOrder->pembayaran($id, $data);
            $this->session->set_flashdata('success', 'Pembayaran Berhasil Dikirim!');
            redirect('pelanggan/cStatusOrder/detail_pesanan/' . $id);
        }
    }
    public function diterima($id)
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
        redirect('pelanggan/cStatusOrder');
    }

    public function kritiksaran()
    {
        $data = array(
            'isi_kritik' => $this->input->post('review'),
            'id_pelanggan' => $this->session->userdata('id'),
            'id_user' => '1'
        );
        $this->mStatusOrder->kritik_saran($data);
        redirect('pelanggan/cstatusorder');
    }
    public function all_review()
    {
        $data = array(
            'review' => $this->mStatusOrder->review_all()
        );
        $this->load->view('Pelanggan/Layout/head');
        $this->load->view('Pelanggan/Layout/header');
        $this->load->view('Pelanggan/review', $data);
        $this->load->view('Pelanggan/Layout/footer');
    }

    //transkasi langsung
    public function detail_pesanan_langsung($id)
    {
        $data = array(
            'detail' => $this->mStatusOrder->detail_pesanan_langsung($id)
        );
        $this->load->view('Pelanggan/Layout/head');
        $this->load->view('Pelanggan/Layout/header');
        $this->load->view('Pelanggan/detail_pesananLangsung', $data);
        $this->load->view('Pelanggan/Layout/footer');
    }
}

/* End of file cStatusOrder.php */
