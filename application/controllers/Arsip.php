<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip extends CI_Controller {

	public function __construct() {
    parent::__construct();
    if(empty($this->session->userdata('userId'))) {
			redirect(base_url());
		}
	}

	
	public function index()	{

    $this->db->select("pekerja.*,kartu_kuning.*,users.*,kartu_kuning.id as id_kk");
    $this->db->join("pekerja","pekerja.id=kartu_kuning.id_pekerja");
    $this->db->join("users","users.id=kartu_kuning.signed_by");
      $kartu = $this->db->get("kartu_kuning")->result();
        $data = array(
            'script'    => 'script/js_arsip',
            'page'      => 'arsip/index',
            'link'      => 'arsip',
            'kartu'     => $kartu
        );

		$this->load->view('layout/template',$data);
  }
    
    public function form() {
        $data = array(
            'script'    => 'script/js_pekerja',
            'page'      => 'pekerja/form',
            'link'      => 'pekerja',
        );
		$this->load->view('layout/template',$data);
    }


    public function ttd() {
        $id = $this->uri->segment(3);

        $from_date = date("Y-m-d H:i:s");
        $new_date = date('Y-m-d H:i:s', strtotime('+2 years', strtotime($from_date)));

        $update = array(
          "status_pendaftaran" => "signed",
          "signed_date" => $from_date,
          "expired_date" => $new_date,
          "signed_by" => $this->session->userdata('userId')
        );
        $this->db->where("md5(id)",$id);
        $this->db->update('kartu_kuning',$update);
        $this->session->set_flashdata('status_crud','<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Berhasil update data.
      </div>');
		    redirect(base_url()."kartukuning");
    }


}
