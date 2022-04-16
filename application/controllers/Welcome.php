<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Model_login');
	}
	
	public function index()
	{
		if(!empty($this->session->userdata('userId'))) {
			redirect(base_url()."home");
		}
		$this->load->view('login');
	}

	public function register()
	{
		if(!empty($this->session->userdata('userId'))) {
			redirect(base_url()."home");
		}
		$this->load->view('register');
	}

	public function reset()
	{
		if(!empty($this->session->userdata('userId'))) {
			redirect(base_url()."home");
		}
		$this->load->view('reset');
	}


    public function aktivasi($email)
    {
		$d = $this->db->get_where('users',array('md5(email)'=>$email));
		
		if($d->num_rows()>0) {

			$id = $d->row()->id;

			$this->db->where('id',$id);
			$up = $this->db->update('users',array('email_verified_at'=>date('Y-m-d H:i:s')));

			if($up) {
				$this->session->set_flashdata('status','Aktivasi sukses. Silahkan login');
			}else {
				$this->session->set_flashdata('status','Aktivasi gagal. Silahkan ulangi kembali');
			}

		}else {
			$this->session->set_flashdata('status','Aktivasi gagal. Silahkan hubungi kami jika mengalami kendala');
				redirect(base_url().'welcome');
		}

		
        redirect(base_url()."welcome");
    }

	public function reset_password($email,$passnew)
    {
		$d = $this->db->get_where('users',array('md5(email)'=>$email));
		
		if($d->num_rows()>0) {

			$id = $d->row()->id;

			$this->db->where('id',$id);
			$up = $this->db->update('users',array('password'=>password_hash($passnew,PASSWORD_BCRYPT)));

			if($up) {
				$this->session->set_flashdata('status','Reset sukses. Silahkan login');
			}else {
				$this->session->set_flashdata('status','Reset gagal. Silahkan ulangi kembali');
			}

		}else {
			$this->session->set_flashdata('status','Reset gagal. Silahkan hubungi kami jika mengalami kendala');
				redirect(base_url().'welcome');
		}

		
        redirect(base_url()."welcome");
    }

	public function auth() {
		$user = $this->input->post('username');
		$password = $this->input->post('password');

		$login = $this->Model_login->auth($user,$password);
		if($login) {
			$this->session->set_flashdata('status','Login sukses.');
		}else {
			$this->session->set_flashdata('status','Login gagal. Silahkan periksa kembali Username dan Password. Atau Pastikan Akun anda sudah terverifikasi, Silahkan Cek Email atau Spam');
		}
		redirect(base_url()."welcome");

	}

	public function signout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
