<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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


 function user_list()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/user";

        $id = trim($this->session->userdata('iduser'));

        $data['link'] = "user/hapus";

        $datauser = $this->model_app->datauser();
	    $data['datauser'] = $datauser;

        $this->load->view('template', $data);

 }

 function hapus()
 {
 	$id = $_POST['id'];

 	$this->db->trans_start();

 	$this->db->where('iduser', $id);
 	$this->db->delete('tuser');

 	$this->db->trans_complete();

 }

 function add()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_user";
        $data['dd_jabatan'] = $this->model_app->dropdown_level();
        $data['id_jabatan'] = "";
        $data['dd_aktif'] = $this->model_app->dropdown_aktif();
        $data['id_aktif'] = "";

        $this->load->view('template', $data);

 }

 function save()
 {
 	$nip = strtoupper(trim($this->input->post('nip')));
  $nama = strtoupper(trim($this->input->post('nama')));
  $email = trim($this->input->post('email'));
  $idjabatan = strtoupper(trim($this->input->post('id_jabatan')));
  $username = trim($this->input->post('username'));
 	$password = trim($this->input->post('password'));
  $id_status = strtoupper(trim($this->input->post('id_aktif')));


 	$data['nip'] = $nip;
  $data['nama'] = $nama;
  $data['email'] = $email;
  $data['idjabatan'] = $idjabatan;
 	$data['username'] = $username;
 	$data['password'] = md5($password);
  $data['status'] = $id_status;


 	$this->db->trans_start();

 	$this->db->insert('tuser', $data);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('user/user_list');
			} else
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
			    </div>");
				redirect('user/user_list');
			}

 }

 function edit($id)
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_euser";

    $sql = "SELECT * FROM tuser WHERE iduser = '$id'";
		$row = $this->db->query($sql)->row();

    $data['id'] = $id;
		$data['dd_aktif'] = $this->model_app->dropdown_aktif();
		$data['id_aktif'] = $row->status;

		$data['dd_level'] = $this->model_app->dropdown_level();
		$data['id_level'] = $row->idjabatan;

		$data['passwordlama'] = $row->password;

		$data['nama'] = $row->nama;
    $data['email'] = $row->email;
    $data['nip'] = $row->nip;
    $data['username'] = $row->username;


        $this->load->view('template', $data);

 }

 function update()
 {

 	$id= strtoupper(trim($this->input->post('id')));
  $passwordlama= trim($this->input->post('passwordlama'));
  $nama= strtoupper(trim($this->input->post('nama')));
  $email= trim($this->input->post('email'));
  $nip= strtoupper(trim($this->input->post('nip')));
  $username= trim($this->input->post('username'));
  $password= trim($this->input->post('password'));
  $id_status = strtoupper(trim($this->input->post('id_aktif')));
 	$id_level = strtoupper(trim($this->input->post('id_level')));

  if ($password!=""){
    $passwordok=md5($password);
  }
  else
    {
      $passwordok=$passwordlama;
    }

   	$data['nama'] = $nama;
    $data['email'] = $email;
    $data['nip'] = $nip;
   	$data['username'] = $username;
   	$data['password'] = $passwordok;
   	$data['idjabatan'] = $id_level;
    $data['status'] = $id_status;



 	$this->db->trans_start();

 	$this->db->where('iduser', $id);
 	$this->db->update('tuser', $data);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('user/user_list');
        //echo '<pre>'; print_r($data); echo '</pre>';
			} else
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
			    </div>");
				redirect('user/user_list');
        //echo '<pre>'; print_r($data); echo '</pre>';
			}

 }



}
