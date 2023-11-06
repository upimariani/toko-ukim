<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAnalisis_Produk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/mLaporan');
	}


	public function index()
	{
		$data = array(
			'grafik_produk' => $this->mLaporan->grafik_produk()
		);
		$this->load->view('Pemilik/Layout/head');
		$this->load->view('Pemilik/Layout/aside');
		$this->load->view('Pemilik/Layout/navbar');
		$this->load->view('Pemilik/Laporan/lap_produk', $data);
		$this->load->view('Pemilik/Layout/footer');
	}

	public function lap_harian_produk()
	{
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'tanggal' => $tanggal,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->mLaporan->lap_harian_produk($tanggal, $bulan, $tahun)
		);
		$this->load->view('Pemilik/Layout/head');
		$this->load->view('Pemilik/Layout/aside');
		$this->load->view('Pemilik/Layout/navbar');
		$this->load->view('Pemilik/Laporan/laporanProduk/harian', $data);
		$this->load->view('Pemilik/Layout/footer');
	}
	public function lap_bulanan_produk()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->mLaporan->lap_bulanan_produk($bulan, $tahun)
		);
		$this->load->view('Pemilik/Layout/head');
		$this->load->view('Pemilik/Layout/aside');
		$this->load->view('Pemilik/Layout/navbar');
		$this->load->view('Pemilik/Laporan/laporanProduk/bulanan', $data);
		$this->load->view('Pemilik/Layout/footer');
	}
	public function lap_tahunan_produk()
	{
		$tahun = $this->input->post('tahun');

		$data = array(
			'tahun' => $tahun,
			'laporan' => $this->mLaporan->lap_tahunan_produk($tahun)
		);
		$this->load->view('Pemilik/Layout/head');
		$this->load->view('Pemilik/Layout/aside');
		$this->load->view('Pemilik/Layout/navbar');
		$this->load->view('Pemilik/Laporan/laporanProduk/tahunan', $data);
		$this->load->view('Pemilik/Layout/footer');
	}
}

/* End of file claporan.php */
