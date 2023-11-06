<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan/mLogin');
	}


	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Pelanggan/login');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$data = $this->mLogin->login($username, $password);

			if ($data) {
				$id = $data->id_pelanggan;
				$member = $data->level_member;
				$nm_pel = $data->nm_pel;
				$alamat = $data->alamat;
				$array = array(
					'id' => $id,
					'member' => $member,
					'nm_pel' => $nm_pel,
					'alamat' => $alamat
				);
				$this->session->set_userdata($array);
				redirect('Pelanggan/cKatalog');
			} else {
				$this->session->set_flashdata('error', 'Username dan Password Anda Salah!');
				redirect('Pelanggan/cLogin');
			}
		}
	}
	public function logout()
	{
		$this->cart->destroy();
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('nm_pel');
		$this->session->unset_userdata('member');
		$this->session->unset_userdata('alamat');
		$this->session->set_flashdata('error', 'Anda Berhasil Logout!');
		redirect('Pelanggan/cLogin');
	}
	public function register()
	{
		$this->form_validation->set_rules('nama', 'Nama Pelanggan', 'required');
		$this->form_validation->set_rules('no_hp', 'No Telepon', 'required|min_length[11]|max_length[13]|is_unique[pelanggan.no_tlpon]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[pelanggan.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[pelanggan.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|is_unique[pelanggan.password]');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Pelanggan/register');
		} else {
			$email = $this->input->post('email');
			$data = array(
				'nm_pel' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'no_tlpon' => $this->input->post('no_hp'),
				'username' => $this->input->post('username'),
				'email' => ($email),
				'password' => $this->input->post('password'),
				'level_member' => '3',
				'point' => '0'
			);


			$this->mLogin->register($data);



			$this->session->set_flashdata('success', 'Anda Berhasil Register! Silahkan Login!');
			redirect('Pelanggan/clogin');
		}
	}
	public function lupapassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Pelanggan/masuklupapass');
		} else {
			$email = $this->input->post('email');

			$cek_email = $this->db->query("SELECT * FROM `pelanggan` WHERE email='" . $email . "';")->row();
			if ($cek_email) {
				$id_pelanggan = $cek_email->id_pelanggan;


				$array = array(
					'id_pelanggan' => $id_pelanggan
				);

				$this->session->set_userdata($array);

				redirect('Pelanggan/cLogin/changepass');
			} else {
				$this->session->set_flashdata('error', 'Email Tidak Terdaftar!!!');
				redirect('Pelanggan/cLogin/lupapassword');
			}
		}
	}
	public function changepass()
	{
		$this->form_validation->set_rules('password1', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Pelanggan/changepass');
		} else {
			$data = array(
				'password' => $this->input->post('password2')
			);
			$this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
			$this->db->update('pelanggan', $data);
			$this->session->set_flashdata('success', 'Anda Berhasil Merubah Password!!! Silahkan Login');
			redirect('Pelanggan/cLogin');
		}
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'SMTPHost' => 'ssl://smtp.googlemail.com',
			'SMTPUser' => 'kedaifaizkuningan@gmail.com',
			'SMTPPass' => 'iwtrghyljtbiivhu',
			'SMTPPort' => 465,
			'SMTPCrypto' => 'ssl',
			'mailtype' => 'html',
			'charset' => 'UTF-8',
			'newline' => "\r\n"
		];

		$this->load->library('email', $config);

		$this->email->from('kedaifaizkuningan@gmail.com', 'Kedai Faiz');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			$this->email->subject('Akun verifikasi');
			$this->email->message('Silahkan Klik disini Untuk Aktifasi Akun : <a 
            href="' . base_url() . 'Pelanggan/clogin/verify?email=' . $this->input->post('email') . '& token=' . urlencode($token) . '">Active</a>');
		} elseif ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Silahkan Klik disini Untuk Reset Password Akun Anda : <a 
            href="' . base_url() . 'Pelanggan/clogin/resetPassword?email=' . $this->input->post('email') . '& token=' . urlencode($token) . '">Reset</a>');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('pelanggan', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				if (time() - $user_token['date_created'] <  (60 * 60 * 24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('pelanggan');

					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('success', 'Register Berhasil, Silahkan Untuk Login Akun!!!');
					redirect('Pelanggan/clogin');
				} else {

					$this->db->delete('pelanggan', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('success', 'Expayer');
					redirect('Pelanggan/clogin');
				}
			} else {
				$this->session->set_flashdata('error', 'Register gagal!!!');
				redirect('Pelanggan/clogin');
			}
		} else {
			$this->session->set_flashdata('error', 'Data Error !!!');
			redirect('Pelanggan/clogin');
		}
	}

	public function forgotPassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Pelanggan/forgot');
		} else {
			$email = $this->input->post('email');
			$pelanggan = $this->db->get_where('pelanggan', ['email' => $email, 'is_active' => 1])->row_array();

			if ($pelanggan) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('error', 'Mohon Cek Email anda untuk Reset Password');
				redirect('Pelanggan/clogin');
			} else {
				$this->session->set_flashdata('error', 'Email Tidak Terdaftar Atau Belum Aktivasi Akun');
				redirect('Pelanggan/clogin/forgotPassword');
			}
		}
	}

	public function resetPassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$pelanggan = $this->db->get_where('pelanggan', ['email' => $email])->row_array();

		if ($pelanggan) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('error', 'Reset Password Token Salah');
				redirect('Pelanggan/clogin');
			}
		} else {
			$this->session->set_flashdata('error', 'Reset Password Email anda salah!!!');
			redirect('Pelanggan/clogin');
		}
	}

	public function changePassword()
	{

		if (!$this->session->userdata('reset_email')) {
			redirect('Pelanggan/clogin');
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[7]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[7]|matches[password1]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Pelanggan/changepass');
		} else {
			$password = $this->input->post('password1');
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('pelanggan');

			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('success', 'Reset Password Berhasil');
			redirect('Pelanggan/clogin');
		}
	}

	// public function lupa_password()
	// {
	//     $this->form_validation->set_rules('no_hp', 'No Telepon', 'required');

	//     if ($this->form_validation->run() == FALSE) {
	//         $this->load->view('Pelanggan/lupa_password');
	//     } else {
	//         $no_hp = $this->input->post('no_hp');
	//         $data = $this->mLogin->help($no_hp);

	//         if ($data) {
	//             $id = $data->id_pelanggan;
	//             $member = $data->level_member;
	//             $array = array(
	//                 'id' => $id,
	//                 'member' => $member
	//             );
	//             $this->session->set_userdata($array);
	//             redirect('Pelanggan/cKatalog');
	//         } else {
	//             $this->session->set_flashdata('error', 'No Telepon Anda Salah!');
	//             redirect('Pelanggan/cLogin/lupa_password');
	//         }
	//     }
	// }
}

/* End of file cLogin.php */
