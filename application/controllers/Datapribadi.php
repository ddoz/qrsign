<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapribadi extends CI_Controller {

	public function __construct() {
    parent::__construct();
    if(empty($this->session->userdata('userId'))) {
			redirect(base_url());
		}
	}

	
	public function index()	{
    $rowData = $this->db->get_where("pekerja",array("id_user"=>$this->session->userdata("userId")));
    $exist = $rowData->num_rows() > 0 ? true : false;
    $data = array(
      'script'    => 'script/js_pekerja',
      'page'      => 'datapribadi/form',
      'link'      => 'datapribadi',
      'exist'     => $exist,
      'profil'    => $rowData->row()
    );
    $this->load->view('layout/template',$data);
  }
    
    public function kartukuning() {
      $id = $this->uri->segment(3);

      $this->db->select("users.name,kartu_kuning.*");
      $this->db->join("users","users.id=kartu_kuning.signed_by",'left');
      $kartu = $this->db->get_where('kartu_kuning',array('md5(id_pekerja)'=>$id))->result();
      
      $data = array(
          'script'    => 'script/js_pekerja',
          'page'      => 'pekerja/kartukuning',
          'link'      => 'pekerja',
          'pekerja'   => $this->db->get_where('pekerja',array('md5(id)'=>$id))->row(),
          'kartukuning'   => $kartu,
      );
      $this->load->view('layout/template',$data);
  }

  public function cetakkartukuning() {
    $id = $this->uri->segment(3);

    $this->db->select("pekerja.*,kartu_kuning.*,users.*,kartu_kuning.id as id_kk");
    $this->db->join("pekerja","pekerja.id=kartu_kuning.id_pekerja");
    $this->db->join("users","users.id=kartu_kuning.signed_by");
    $k = $this->db->get_where("kartu_kuning",array("md5(kartu_kuning.id)"=>$id))->row();
    $data = [
      "kartu" => $k
    ];
    $this->load->view('cetakkartukuning',$data);
  }
  public function ajukankartu() {
    $id = $this->uri->segment(3);
    
    $row = $this->db->get_where("kartu_kuning",array("md5(id_pekerja)"=>$id));
    $pekerja = $this->db->get_where("pekerja",array("md5(id)"=>$id))->row();
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
    redirect(base_url()."pekerja/kartukuning/".$id);
}

    public function edit() {
        $id = $this->uri->segment(3);
        
        $data = array(
            'script'    => 'script/js_pekerja',
            'page'      => 'pekerja/edit',
            'link'      => 'pekerja',
            'pekerja'      => $this->db->get_where('pekerja',array('md5(id)'=>$id))->row(),
        );
		$this->load->view('layout/template',$data);
    }


    public function save() {
        $this->load->helper('data');
        $data = array(
            "no_pendaftaran"              => autonumberpekerja(),
            "nama_lengkap"              => $this->input->post('nama_lengkap'),
            "nik"              => $this->input->post('nik'),
            "tempat_lahir"              => $this->input->post('tempat_lahir'),
            "tanggal_lahir"              => date('Y-m-d',strtotime($this->input->post('tanggal_lahir'))),
            "jenis_kelamin"              => $this->input->post('jenis_kelamin'),
            "status_menikah"              => $this->input->post('status_menikah'),
            "agama"              => $this->input->post('agama'),
            "alamat"              => $this->input->post('alamat'),
            "pendidikan_terakhir"              => $this->input->post('pendidikan_terakhir'),
            "tahun_lulus"              => $this->input->post('tahun_lulus'),
            "keterampilan"              => $this->input->post('keterampilan'),
            "tahun_keterampilan"              => $this->input->post('tahun_keterampilan'),
            "keterampilan_2"              => $this->input->post('keterampilan_2'),
            "tahun_keterampilan2"              => $this->input->post('tahun_keterampilan2'),
            "keterampilan_3"              => $this->input->post('keterampilan_3'),
            "tahun_keterampilan3"              => $this->input->post('tahun_keterampilan3'),
            'id_user'             => $this->session->userdata('userId')
        );

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 1024; //1MB
        $config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        $rowData = $this->db->get_where("pekerja",array("id_user"=>$this->session->userdata("userId")));
        if($rowData->num_rows()>0) {
          if($this->upload->do_upload("foto")) {
            $data['foto'] = $this->upload->data('file_name');
          }

          if($this->upload->do_upload("ijazah")) {
            $data['ijazah'] = $this->upload->data('file_name');
          }
  
          if($this->upload->do_upload("scan_ktp")) {
            $data['scan_ktp'] = $this->upload->data('file_name');
          }
  
          $this->db->where('id_user',$this->session->userdata('userId'));
          if($this->db->update('pekerja',$data)) {
              $this->session->set_flashdata('status_crud','<div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success!</strong> Berhasil simpan data.
            </div>');
          }else {
              $this->session->set_flashdata('status_crud','<div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Fail!</strong> Gagal simpan data.
            </div>');
          }
        }else {
          if(!$this->upload->do_upload("foto")) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('status_crud','<div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Fail!</strong> Gagal simpan data. Pas Poto tidak valid. "'.$error.'"
            </div>');
            redirect(base_url()."datapribadi");
          }
  
          $data['foto'] = $this->upload->data('file_name');
  
          if(!$this->upload->do_upload("scan_ktp")) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('status_crud','<div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Fail!</strong> Gagal simpan data. Scan KTP Tidak Valid. "'.$error.'"
            </div>');
            redirect(base_url()."datapribadi");
          }
  
          $data['scan_ktp'] = $this->upload->data('file_name');
          $data["id_user"] = $this->session->userdata('userId');
          if($this->db->insert('pekerja',$data)) {
              $this->session->set_flashdata('status_crud','<div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success!</strong> Berhasil simpan data.
            </div>');
          }else {
              $this->session->set_flashdata('status_crud','<div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Fail!</strong> Gagal simpan data.
            </div>');
          }
        }
        redirect(base_url()."datapribadi");
    }

}
