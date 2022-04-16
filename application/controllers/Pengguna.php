<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct() {
    parent::__construct();
    if(empty($this->session->userdata('userId'))) {
			redirect(base_url());
		}
    $this->load->model(array('Model_pengguna'));
	}
	
	public function index()
	{
    $user = $this->Model_pengguna->get();
        $data = array(
            'script'    => 'script/js_pengguna',
            'page'      => 'pengguna/index',
            'link'      => 'pengguna',
            'link_t'    => 'master',
            'table'     => $user
        );
		$this->load->view('layout/template',$data);
    }
    
    public function form() {
        $data = array(
            'script'    => 'script/js_pengguna',
            'page'      => 'pengguna/form',
            'link'      => 'pengguna',
            'link_t'    => 'master',
        );
		  $this->load->view('layout/template',$data);
    }

    public function ubahpassword() {
      $data = array(
          'script'    => 'script/js_pengguna',
          'page'      => 'pengguna/ubahpassword',
      );
    $this->load->view('layout/template',$data);
  }

    public function save() {
        $data = array(
            "email"              => $this->input->post('email'),
            "password"          => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
            "name"       => $this->input->post('name'),
            "nip"       => $this->input->post('nip'),
            "user_level"            => $this->input->post('level'),
            "email_verified_at"     => date('Y-m-d H:i:s'),
            "created_at"     => date('Y-m-d H:i:s'),
            "updated_at"     => date('Y-m-d H:i:s'),
        );

        if($this->db->insert('users',$data)) {
            $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Berhasil simpan data.
          </div>');
            redirect(base_url()."pengguna");
        }else {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Fail!</strong> Gagal simpan data.
          </div>');
            redirect(base_url()."pengguna");
        }
    }

    public function updatepassword() {
      $data = array(
          "old"              => $this->input->post('old'),
          "new"       => $this->input->post('new')
      );

      $cek = $this->db->get_where("users",array("id"=>$this->session->userdata("userId")))->row();
      if(password_verify($data['old'],$cek->password)) {

        $up = ["password"=>password_hash($data['new'],PASSWORD_DEFAULT)];
        $this->db->where("id",$this->session->userdata("userId"));
        $this->db->update("users",$up);
        $this->session->set_flashdata('status_crud','<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Berhasil simpan data.
      </div>');
      }else {
        $this->session->set_flashdata('status_crud','<div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Fail!</strong> Gagal simpan data. Periksa Password lama anda
      </div>');
      }

      redirect(base_url()."pengguna/ubahpassword");
  }


    public function delete() {
        $id = $this->uri->segment(3);
        $this->db->where('id', $id);
        if($this->db->delete('users')) {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Berhasil hapus data.
          </div>');
        }else {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Fail!</strong> Gagal hapus data.
          </div>');
        }
        redirect(base_url()."pengguna");
    }

    public function resetpassword() {
        $id = $this->uri->segment(3);
        $this->db->where('id', $id);
        if($this->db->update('users',array('password'=>password_hash("12345678",PASSWORD_BCRYPT)))) {
            $this->session->set_flashdata('status','<div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Berhasil reset password.
          </div>');
        }else {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Fail!</strong> Gagal reset password.
          </div>');
        }
        redirect(base_url().'pengguna');
    }

    public function aktivasi() {
      $id = $this->uri->segment(3);
      $this->db->where('id',$id);
			$up = $this->db->update('users',array('email_verified_at'=>date('Y-m-d H:i:s')));

			if($up) {
				$this->session->set_flashdata('status','<div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Berhasil aktivasi akun.
          </div>');
			}else {
				$this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Fail!</strong> Gagal aktivasi akun.
          </div>');
			}
      redirect(base_url().'pengguna');
    }


}
