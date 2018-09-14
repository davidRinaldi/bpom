<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sarana extends CI_Controller {

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


 function Sarana_list()
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
        $data['body'] = "body/sarana";
        $id = trim($this->session->userdata('iduser'));

        $data['link'] = "sarana/hapus";

        $datasarana = $this->model_app->datasarana();
	    $data['datasarana'] = $datasarana;
      $data['idjabatan']=$idjabatan;
        $this->load->view('template', $data);

 }

 function hapus()
 {
 	$id = $_POST['id'];

 	$this->db->trans_start();

 	$this->db->where('idsarana', $id);
 	$this->db->delete('tsarana');

 	$this->db->trans_complete();

 }

 function add()
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
        $data['body'] = "body/form_sarana";
        $data['dd_kabkota'] = $this->model_app->dropdown_kabkota();
        $data['idkabkota'] = "";
        $data['dd_jenissarana'] = $this->model_app->dropdown_jenissarana();
        $data['idjenissarana'] = "";

        $this->load->view('template', $data);

 }

 function save()
 {
 	$namasarana = strtoupper(trim($this->input->post('namasarana')));
  $alamat = strtoupper(trim($this->input->post('alamat')));
  $namapemilik = strtoupper(trim($this->input->post('namapemilik')));
  $idjenissarana = strtoupper(trim($this->input->post('idjenissarana')));
  $idkabkota = strtoupper(trim($this->input->post('idkabkota')));


 	$data['namasarana'] = $namasarana;
  $data['alamat'] = $alamat;
  $data['namapemilik'] = $namapemilik;
 	$data['idjenissarana'] = $idjenissarana;
  $data['idkabkota'] = $idkabkota;


 	$this->db->trans_start();

 	$this->db->insert('tsarana', $data);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('sarana/sarana_list');
			} else
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
			    </div>");
				redirect('sarana/sarana_list');
			}

 }

 function edit($id)
 {

 	    $data['header'] = "header/header";
      $data['navbar'] = "navbar/navbar";
      $data['sidebar'] = "sidebar/sidebar";
      $data['body'] = "body/form_esarana";

    $sql = "SELECT tsarana.idsarana,tsarana.namasarana,tsarana.alamat,tsarana.namapemilik,tsarana.idkabkota,tkabkota.namakabkota,tsarana.idjenissarana,tjenissarana.namajenissarana FROM tjenissarana,tsarana,tkabkota WHERE tsarana.idjenissarana=tjenissarana.idjenissarana and tsarana.idkabkota=tkabkota.idkabkota and tsarana.idsarana = '$id'";
		$row = $this->db->query($sql)->row();

    $data['idsarana'] = $id;

		$data['dd_kabkota'] = $this->model_app->dropdown_kabkota();
		$data['idkabkota'] = $row->idkabkota;

		$data['dd_jenissarana'] = $this->model_app->dropdown_jenissarana();
		$data['idjenissarana'] = $row->idjenissarana;

		$data['namasarana'] = $row->namasarana;
    $data['alamat'] = $row->alamat;
    $data['namapemilik'] = $row->namapemilik;

        $this->load->view('template', $data);

 }

 function update()
 {

 	$idsarana= strtoupper(trim($this->input->post('idsarana')));
  $namasarana = strtoupper(trim($this->input->post('namasarana')));
  $alamat = strtoupper(trim($this->input->post('alamat')));
  $namapemilik = strtoupper(trim($this->input->post('namapemilik')));
  $idjenissarana = strtoupper(trim($this->input->post('idjenissarana')));
  $idkabkota = strtoupper(trim($this->input->post('idkabkota')));


   	$data['namasarana'] = $namasarana;
    $data['alamat'] = $alamat;
   	$data['namapemilik'] = $namapemilik;
   	$data['idkabkota'] = $idkabkota;
    $data['idjenissarana'] = $idjenissarana;



 	$this->db->trans_start();

 	$this->db->where('idsarana', $idsarana);
 	$this->db->update('tsarana', $data);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('sarana/sarana_list');
			} else
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
			    </div>");
				redirect('sarana/sarana_list');
        //echo '<pre>'; print_r($data); echo '</pre>';
			}

 }



}
