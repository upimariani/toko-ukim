<?php
defined('BASEPATH') or exit('No direct script access allowed');

class claporan_transaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/mLaporan');
	}


	public function index()
	{
		$data = array(
			'grafik' => $this->mLaporan->grafik_transaksi()
		);
		$this->load->view('Pemilik/Layout/head');
		$this->load->view('Pemilik/Layout/aside');
		$this->load->view('Pemilik/Layout/navbar');
		$this->load->view('Pemilik/Laporan/lap_transaksi', $data);
		$this->load->view('Pemilik/Layout/footer');
	}

	public function lap_harian_transaksi()
	{
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'tanggal' => $tanggal,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->mLaporan->lap_harian_transaksi($tanggal, $bulan, $tahun)
		);
		$this->load->view('Pemilik/Layout/head');
		$this->load->view('Pemilik/Layout/aside');
		$this->load->view('Pemilik/Layout/navbar');
		$this->load->view('Pemilik/Laporan/LaporanTransaksi/harian', $data);
		$this->load->view('Pemilik/Layout/footer');
	}
	public function lap_bulanan_transaksi()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->mLaporan->lap_bulanan_transaksi($bulan, $tahun)
		);
		$this->load->view('Pemilik/Layout/head');
		$this->load->view('Pemilik/Layout/aside');
		$this->load->view('Pemilik/Layout/navbar');
		$this->load->view('Pemilik/Laporan/LaporanTransaksi/bulanan', $data);
		$this->load->view('Pemilik/Layout/footer');
	}
	public function lap_tahunan_transaksi()
	{
		$tahun = $this->input->post('tahun');

		$data = array(
			'tahun' => $tahun,
			'laporan' => $this->mLaporan->lap_tahunan_transaksi($tahun)
		);
		$this->load->view('Pemilik/Layout/head');
		$this->load->view('Pemilik/Layout/aside');
		$this->load->view('Pemilik/Layout/navbar');
		$this->load->view('Pemilik/Laporan/LaporanTransaksi/tahunan', $data);
		$this->load->view('Pemilik/Layout/footer');
	}
}

/* End of file claporan.php */
