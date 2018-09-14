<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('model_app');

    }


function index()
    {
        $data = "";

        $this->load->view('login', $data);
    }


  function login_akses()
  {

  	$username = trim($this->input->post('username'));
  	$password = md5(trim($this->input->post('password')));

	$akses = $this->db->query("select * FROM tuser
	 WHERE username = '$username' AND password = '$password'");

    if($akses->num_rows() == 1)
	{

	foreach($akses->result_array() as $data)
	{
	$session['iduser'] = $data['iduser'];
	$session['nama'] = $data['nama'];
	$session['idjabatan'] = $data['idjabatan'];
	$session['status'] = $data['status'];
	if($data['status'] == 1){
		if ($data['idjabatan'] == 1){
			$this->session->set_userdata($session);
				redirect('home');
			}
		else if ($data['idjabatan'] == 2){
			$this->session->set_userdata($session);
				redirect('homepimpinan');
			}
		else if ($data['idjabatan'] == 3){
			$this->session->set_userdata($session);
			redirect('homestaff');
			}
		}
	else{
		$this->session->set_flashdata("msg", "
		<div class='alert alert-warning alert-dismissible' role='alert'>
		<button type='button' class='close' data-dismiss='alert' aria-label='close'>
			<span aria-hidden='true'>&times;</span></button>
			<strong> Warning!</strong>
			Akun Tidak Aktif.
			</div>");
		redirect('login');
			}
	}

	}
	else
	{
	$this->session->set_flashdata("msg", "
	<div class='alert alert-warning alert-dismissible' role='alert'>
	<button type='button' class='close' data-dismiss='alert' aria-label='close'>
		<span aria-hidden='true'>&times;</span></button>
		<strong> Warning!</strong>
		username / password salah.
		</div>");
	redirect('login');
	}


  }


  public function logout() {

  $this->session->sess_destroy();

  redirect('login');



}



}
