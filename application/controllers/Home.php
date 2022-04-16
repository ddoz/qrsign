<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(empty($this->session->userdata('userId'))) {
			redirect(base_url());
		}
	}
	
	public function index()
	{

        $grafik = $this->db->query("select count(*)as jumlah,year(waktu_pendaftaran)as tahun from pekerja group by year(waktu_pendaftaran)")->result();
        
        $data = array(
            'script'    => 'script/js_home',
            'page'      => 'home/index',
			'link'      => 'home',
            'grafik'    => $grafik
        );
		$this->load->view('layout/template',$data);
	}

	public function detail() {
        $id = $this->uri->segment(3);
        if(is_numeric($id)) {
            $detail = $this->Model_upload->getById($id);
            if($detail['status']) {
                $data = array(
                    'script'    => 'script/js_home',
                    'page'      => 'home/detail',
                    'link'      => 'home',
                    'table'     => $detail['output']
                );
                $this->load->view('layout/template',$data);
            }else {
                $this->session->set_flashdata('status','Data Tidak Ditemukan');
                redirect(base_url().'home');
            }
        }else {
            $this->session->set_flashdata('status','Data Tidak Ditemukan');
            redirect(base_url().'home');
        }
    }

}
