<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasilperiksa extends CI_Controller {

function __construct(){
        parent::__construct();
        $this->load->model('model_app');

      /*  if(!$this->session->userdata('id_akun'))
       {
        $this->session->set_flashdata("msg", "<div class='alert alert-info'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Silahkan login terlebih dahulu.
       </div>");
        redirect('login');
        }
        */

    }


 function hasilperiksa_list()
 {
   $idjabatan = trim($this->session->userdata('idjabatan'));
   if ($idjabatan==1){
     $data['sidebar'] = "sidebar/sidebar";
   }
   else if ($idjabatan==2){
     $data['sidebar'] = "sidebar/sidebar2";
   }
   else if ($idjabatan==3){
     $data['sidebar'] = "sidebar/sidebar3";
   }
 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['body'] = "body/hasilperiksa";

        $id = trim($this->session->userdata('iduser'));

        $datahasilperiksa = $this->model_app->datahasilperiksa();
	      $data['datahasilperiksa'] = $datahasilperiksa;

        $this->load->view('template', $data);

 }

 function add()
 {
   $idjabatan = trim($this->session->userdata('idjabatan'));
   if ($idjabatan==1){
     $data['sidebar'] = "sidebar/sidebar";
   }
   else if ($idjabatan==3){
     $data['sidebar'] = "sidebar/sidebar3";
   }

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['body'] = "body/form_hasilperiksa";

        $data['dd_pemeriksaan'] = $this->model_app->dropdown_pemeriksaan();
        $data['idpemeriksaan'] = "";
        $data['dd_sarana'] = $this->model_app->dropdown_sarana();
        $data['idsarana'] = "";

        $data['dd_hasil'] = $this->model_app->dropdown_hasilpemeriksaan();
        $data['kodehasil'] = "";

        $this->load->view('template', $data);

 }

 function save()
 {
 	$idpemeriksaan = strtoupper(trim($this->input->post('idpemeriksaan')));
  $idsarana = strtoupper(trim($this->input->post('idsarana')));
  $hasilperiksa = strtoupper(trim($this->input->post('kodehasil')));
  $keterangan = strtoupper(trim($this->input->post('keterangan')));
  $tglinput = strtoupper(trim($this->input->post('tglinput')));

  $data8=$this->model_app->dataemail2();
  foreach ($data8 as $row) {
		// kirim email konfirmasi
    $this->email->clear();
    $this->email->from('info.bpomsumbar@gmail.com'); //change it
   $this->email->to($row->email); //change it
   $this->email->subject('Pemberitahuan Hasil Pemeriksaan Terbaru Untuk Admin/Pimpinan');
   $this->email->message('Hasil Pemeriksaan Terbaru Telah Diinputkan Oleh Petugas ,<br /> Silahkan Cek Aplikasi SIPHPSDP Balai Besar Pengawas Obat dan Makanan (BBPOM) di Padang untuk mengetahui informasi lebih rinci.
   <br />Terimakasih');
   $this->email->send();
 }

 	$data['idpemeriksaan'] = $idpemeriksaan;
  $data['idsarana'] = $idsarana;
  $data['hasil'] = $hasilperiksa;
 	$data['keterangan'] = $keterangan;
  $data['tglinput'] = $tglinput;


 	$this->db->trans_start();

 	$this->db->insert('thasilpemeriksaan', $data);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('hasilperiksa/hasilperiksa_list');
			} else
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
			    </div>");
				redirect('hasilperiksa/hasilperiksa_list');
			}

 }


}
