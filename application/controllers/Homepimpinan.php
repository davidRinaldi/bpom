<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepimpinan extends CI_Controller {


	function __construct(){
        parent::__construct();
        $this->load->model('model_app');

        if(!$this->session->userdata('iduser'))
       {
        $this->session->set_flashdata("msg", "<div class='alert alert-info'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Silahkan login terlebih dahulu.
       </div>");
        redirect('login');
        }
    }

function index()
    {
        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar2";
        $data['body'] = "body/dashboard";

		$data['data']=$this->model_app->getpemeriksaansblmskrg();
		$listData = [];

		foreach ( $this->model_app->datapemeriksaan() as $key => $value) {
			$listData[$key]['idpemeriksaan'] = $value->idpemeriksaan;
			$listData[$key]['nosurattugas'] = $value->nosurattugas;
			$listData[$key]['namakegiatan'] = $value->namakegiatan;
			$listData[$key]['tglpemeriksaan'] = $value->tglpemeriksaan;
			$listData[$key]['namakabkota'] = $value->namakabkota;
			$listData[$key]['tglsurattugas'] = $value->tglsurattugas;

			$q = "SELECT tuser.nip, tuser.nama FROM tpetugaspemeriksa,tuser WHERE tpetugaspemeriksa.iduser = tuser.iduser and tpetugaspemeriksa.idpemeriksaan= '".$value->idpemeriksaan."'";
			$x = $this->db->query($q)->result();
			$count = count($x);

			$listData[$key]['count'] = $count;
			// var_dump($count);
			foreach ($x as $key2 => $value2) {
							$listData[$key]['detail'][$key2]['nip'] = $value2->nip;
							$listData[$key]['detail'][$key2]['nama'] = $value2->nama;
						}
			}
			$data['listData'] = $listData;

		$this->load->view('template',$data);
	}
}
