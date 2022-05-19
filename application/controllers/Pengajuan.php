<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

	public function __construct() {
    parent::__construct();
    if(empty($this->session->userdata('userId'))) {
			redirect(base_url());
		}
	}

	
	public function index()	{

    $this->db->select("kartu_kuning.*,users.name,kartu_kuning.id as id_kk");
    $this->db->from('kartu_kuning');
    $this->db->join("pekerja","pekerja.id=kartu_kuning.id_pekerja");
    $this->db->join("users","users.id=kartu_kuning.signed_by","LEFT")->where("pekerja.id_user",$this->session->userdata('userId'));
      $kartu = $this->db->get()->result();
        $data = array(
            'script'    => 'script/js_arsip',
            'page'      => 'pengajuan/index',
            'link'      => 'pengajuan',
            'kartu'     => $kartu
        );

		$this->load->view('layout/template',$data);
  }
    
  public function ajukankartu() {
      $id = $this->uri->segment(3);
      
      $pekerja = $this->db->get_where("pekerja",array("md5(id_user)"=>$id))->row();
      $row = $this->db->get_where("kartu_kuning",array("md5(id_pekerja)"=>$pekerja->id));
      if($row->num_rows()>0) {
        if($row->row()->signed_by != 0) {
          $insert = array(
            "id_pekerja" => $row->row()->id_pekerja,
            "tahun_cetak" => date('Y'),
            "status_pendaftaran" => 'register',
          );
          $this->db->insert('kartu_kuning',$insert);
        }else {
          $this->session->set_flashdata('status_crud','<div class="alert alert-warning alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Fail!</strong> Data sebelumnya belum divalidasi.
            </div>');
        }
      }else{
        $insert = array(
          "id_pekerja" => $pekerja->id,
          "tahun_cetak" => date('Y'),
          "status_pendaftaran" => 'register',
        );
        $this->db->insert('kartu_kuning',$insert);
      }
      redirect(base_url()."pengajuan");
  }


}
