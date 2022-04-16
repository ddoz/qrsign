<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validasikartu extends CI_Controller {

	public function __construct() {
    parent::__construct();
    if(empty($this->session->userdata('userId'))) {
			redirect(base_url());
		}
	}

	
	public function id()	{
    $id = $this->uri->segment(3);

    $this->db->select("pekerja.*,kartu_kuning.*,users.*,kartu_kuning.id as id_kk");
    $this->db->join("pekerja","pekerja.id=kartu_kuning.id_pekerja");
    $this->db->join("users","users.id=kartu_kuning.signed_by");
    $k = $this->db->get_where("kartu_kuning",array("md5(kartu_kuning.id)"=>$id));
    if($k->num_rows()>0) {
      $data = [
        "kartu" => $k->row()
      ];
      $this->load->view('validasikartu',$data);
    }else {
      echo "<center><b>Kartu Kuning Tidak Valid</b></center>";
    }
  }

}
