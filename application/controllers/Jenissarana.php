<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenissarana extends CI_Controller {

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


 function jenissarana_list()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/jenissarana";

        $id = trim($this->session->userdata('iduser'));

        $data['link'] = "jenissarana/hapus";

        $datajenissarana = $this->model_app->datajenissarana();
	    $data['datajenissarana'] = $datajenissarana;

        $this->load->view('template', $data);

 }

 function hapus()
 {
 	$id = $_POST['id'];

 	$this->db->trans_start();

 	$this->db->where('idjenissarana', $id);
 	$this->db->delete('tjenissarana');

 	$this->db->trans_complete();

 }

 function add()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_jenissarana";

        $this->load->view('template', $data);

 }

 function save()
 {
 	$namajenissarana = strtoupper(trim($this->input->post('namajenissarana')));

 	$data['namajenissarana'] = $namajenissarana;

 	$this->db->trans_start();

 	$this->db->insert('tjenissarana', $data);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('jenissarana/jenissarana_list');
			} else
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
			    </div>");
				redirect('jenissarana/jenissarana_list');
			}

 }

 function edit($id)
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_ejenissarana";

    $sql = "SELECT * FROM tjenissarana WHERE idjenissarana = '$id'";
		$row = $this->db->query($sql)->row();

    $data['idjenissarana'] = $id;
		$data['namajenissarana'] = $row->namajenissarana;

    $this->load->view('template', $data);

 }

 function update()
 {

 	$id= strtoupper(trim($this->input->post('idjenissarana')));
  $namajenissarana= strtoupper(trim($this->input->post('namajenissarana')));

  $data['namajenissarana'] = $namajenissarana;

 	$this->db->trans_start();

 	$this->db->where('idjenissarana', $id);
 	$this->db->update('tjenissarana', $data);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('jenissarana/jenissarana_list');
			} else
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
			    </div>");
				redirect('jenissarana/jenissarana_list');
        //echo '<pre>'; print_r($data); echo '</pre>';
			}

 }



}
