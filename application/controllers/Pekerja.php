<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerja extends CI_Controller {

	public function __construct() {
    parent::__construct();
    if(empty($this->session->userdata('userId'))) {
			redirect(base_url());
		}
	}

	
	public function index()	{
        $data = array(
            'script'    => 'script/js_pekerja',
            'page'      => 'pekerja/index',
            'link'      => 'pekerja',
            'table'     => $this->db->get("pekerja")->result()
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
        );

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 1024; //1MB
        $config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload("foto")) {
          $this->session->set_flashdata('status_crud','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Fail!</strong> Gagal simpan data. Pas Poto tidak valid.
          </div>');
          redirect(base_url()."pekerja");
        }

        $data['foto'] = $this->upload->data('file_name');

        if(!$this->upload->do_upload("scan_ktp")) {
          $this->session->set_flashdata('status_crud','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Fail!</strong> Gagal simpan data. Scan KTP Tidak Valid
          </div>');
          redirect(base_url()."pekerja");
        }

        $data['scan_ktp'] = $this->upload->data('file_name');

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
        redirect(base_url()."pekerja");
    }

    public function update() {
        $id = $this->input->post('id');
        $data = array(
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
        );

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 1024; //1MB
        $config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        if($this->upload->do_upload("foto")) {
          $data['foto'] = $this->upload->data('file_name');
        }


        if($this->upload->do_upload("scan_ktp")) {
          $data['scan_ktp'] = $this->upload->data('file_name');
        }
        
        $this->db->where('id', $id);
        if($this->db->update('pekerja',$data)) {
            $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Berhasil ubah data.
          </div>');
        }else {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Fail!</strong> Gagal ubah data.
          </div>');
        }
        redirect(base_url()."pekerja");
    }


    public function hapus() {
        $id = $this->uri->segment(3);
        $cek = $this->db->get_where('kartu_kuning', array('md5(id_pekerja)' => $id));
        if($cek->num_rows()>0) {
            $this->session->set_flashdata('status_crud','<div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Fail!</strong> Gagal hapus data. Data sudah ada di Kartu Kuning.
              </div>');
        }else {
            $this->db->where('md5(id)', $id);
            if($this->db->delete('pekerja')) {
                $this->session->set_flashdata('status_crud','<div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Berhasil hapus data.
              </div>');
            }else {
                $this->session->set_flashdata('status_crud','<div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Fail!</strong> Gagal hapus data.
              </div>');
            }
        }

        redirect(base_url()."pekerja");
    }

    public function hapuskartukuning() {
      $idpekerja = $this->uri->segment(3);
      $id = $this->uri->segment(4);
      $cek = $this->db->get_where('kartu_kuning', array('md5(id)' => $id));
      
      $this->db->where('md5(id)', $id);
      if($this->db->delete('kartu_kuning')) {
          $this->session->set_flashdata('status_crud','<div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success!</strong> Berhasil hapus data.
        </div>');
      }else {
          $this->session->set_flashdata('status_crud','<div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Fail!</strong> Gagal hapus data.
        </div>');
      }

      redirect(base_url()."pekerja/kartukuning/".$idpekerja);
    }

    public function proseskartukuning() {
      $idpekerja = $this->uri->segment(3);
      $id = $this->uri->segment(4);
      $cek = $this->db->get_where('kartu_kuning', array('md5(id)' => $id));
      
      $this->db->where('md5(id)', $id);
      if($this->db->update('kartu_kuning',array('status_pendaftaran'=>'process'))) {
          //send notif email  
          $config = [
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'protocol'  => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_user' => 'i.qrsign@gmail.com',  // Email gmail
                'smtp_pass'   => 'QrSign@20',  // Password gmail
                'smtp_crypto' => 'tls',
                'smtp_port'   => 587,
                'newline' => "\r\n"
            ];

            // Load library email dan konfigurasinya
            $this->load->library('email', $config);

            // Email dan nama pengirim
            $this->email->from('i.qrsign@gmail.com', 'Qr Sign');

            // Email penerima
            $this->email->to($data['email']); // Ganti dengan email tujuan

            // Lampiran email, isi dengan url/path file
            // $this->email->attach(base_url()."assets/front/images/logo.png");

            // Subject email
            $this->email->subject('Informasi Kartu Kuning QRSIGN');

            // Isi email
            $this->email->message("Saat ini pengajuan <b>Kartu Kuning</b> anda sedang di proses. Silahkan Cek pada web <a href='".base_url()."'>Klik Disini</a>.");

          $this->session->set_flashdata('status_crud','<div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success!</strong> Berhasil proses data. Selanjutnya akan diproses oleh pimpinan untuk ditandatangani.
        </div>');
      }else {
          $this->session->set_flashdata('status_crud','<div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Fail!</strong> Gagal proses data.
        </div>');
      }

      redirect(base_url()."pekerja/kartukuning/".$idpekerja);
    }


}
