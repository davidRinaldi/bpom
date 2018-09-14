<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

function __construct(){
        parent::__construct();
        $this->load->model('model_app');
    }


 function kegiatan_list()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/kegiatan";

        $id = trim($this->session->userdata('iduser'));


        $data['link'] = "kegiatan/hapus";

        $datakegiatan = $this->model_app->datakegiatan();
	    $data['datakegiatan'] = $datakegiatan;


        $this->load->view('template', $data);

 }

  function hapus()
 {
 	$id = $_POST['id'];

 	$this->db->trans_start();
 	$this->db->where('idkegiatan', $id);
 	$this->db->delete('tkegiatan');

 	$this->db->trans_complete();

 }

 function add()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_kegiatan";

        $id = trim($this->session->userdata('id_user'));
        $this->load->view('template', $data);

 }

 function save()
 {
 	$namakegiatan = strtoupper(trim($this->input->post('namakegiatan')));
 	$keterangan = strtoupper(trim($this->input->post('keterangan')));

 	$data['namakegiatan'] = $namakegiatan;
  $data['keterangan'] = $keterangan;

 	$this->db->trans_start();

 	$this->db->insert('tkegiatan', $data);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('kegiatan/kegiatan_list');
			} else
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data  tersimpan.
			    </div>");
				redirect('kegiatan/kegiatan_list');
			}

 }


 function edit($id)
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_ekegiatan";

        //notification
    $sql = "SELECT * FROM tkegiatan WHERE idkegiatan = '$id'";
		$row = $this->db->query($sql)->row();

		$data['idkegiatan'] = $id;
		$data['namakegiatan'] = $row->namakegiatan;
    $data['keterangan'] = $row->keterangan;
    $this->load->view('template', $data);
 }

 function update()
 {

    $idkegiatan = strtoupper(trim($this->input->post('idkegiatan')));
  	$namakegiatan = strtoupper(trim($this->input->post('namakegiatan')));
  	$keterangan = strtoupper(trim($this->input->post('keterangan')));

   $data['namakegiatan'] = $namakegiatan;
   $data['keterangan'] = $keterangan;

 	$this->db->trans_start();

 	$this->db->where('idkegiatan', $idkegiatan);
 	$this->db->update('tkegiatan', $data);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('kegiatan/kegiatan_list');
			} else
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
			    </div>");
				redirect('kegiatan/kegiatan_list');
			}

 }




}
