<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemeriksaan extends CI_Controller {

function __construct(){
        parent::__construct();
        $this->load->model('model_app');
        $this->load->library('email');
    }


 function pemeriksaan_list()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/pemeriksaan";

        $id = trim($this->session->userdata('iduser'));

        $data['link'] = "pemeriksaan/hapus";

        $data['record'] = $this->model_app->datapemeriksaan();
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
// var_dump($data['listData']);
// die();
        $this->load->view('template', $data);

 }

 function hapus()
 {
 	$id = $_POST['id'];

 	$this->db->trans_start();
 	$this->db->where('idpemeriksaan', $id);
 	$this->db->delete('tpemeriksaan,petugaspemeriksa');
 	$this->db->trans_complete();

	// $this->db->trans_start();
  // $this->db->where('idpemeriksaan', $id);
 	// $this->db->delete('tpetugaspemeriksa');
  // $this->db->trans_complete();

 }

 function add()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_pemeriksaan";
        $data['dd_kegiatan'] = $this->model_app->dropdown_kegiatan();
        $data['id_kegiatan'] = "";
        $data['dd_kabkota'] = $this->model_app->dropdown_kabkota();
        $data['id_kabkota'] = "";
        $data['dd_petugas'] = $this->model_app->dropdown_petugas();
        $data['id_petugas'] = "";

        $this->load->view('template', $data);

 }

 function save()
 {
    $count = count($this->input->post('petugas_id'));

    var_dump($this->input->post('petugas_id'));
    $no_surat_tugas = strtoupper(trim($this->input->post('no_surat_tugas')));
    $kegiatan_id = strtoupper(trim($this->input->post('kegiatan_id')));
    $kabkota_id = strtoupper(trim($this->input->post('kabkota_id')));
    $tgl_surat_tugas = strtoupper(trim($this->input->post('tgl_surat_tugas')));
    $tgl_periksa = strtoupper(trim($this->input->post('tgl_periksa')));

  $data8=$this->model_app->dataemail1();
  foreach ($data8 as $row) {
		// kirim email konfirmasi
    $this->email->clear();
    $this->email->from('info.bpomsumbar@gmail.com'); //change it
   $this->email->to($row->email); //change it
   $this->email->subject('Pemberitahuan Jatwal Pemeriksaan Terbaru');
   $this->email->message('Jatwal Pemeriksaan Terbaru Telah Diinputkan,<br /> Silahkan Cek Aplikasi SIPHPSDP Balai Besar Pengawas Obat dan Makanan (BBPOM) di Padang.<br />Terimakasih');
   $this->email->send();
 }

    $data['nosurattugas'] = $no_surat_tugas;
    $data['idkegiatan'] = $kegiatan_id;
    $data['tglpemeriksaan'] = $tgl_periksa;
    $data['idkabkota'] = $kabkota_id;
    $data['tglsurattugas'] = $tgl_surat_tugas;

    $this->db->trans_start();

    $this->db->insert('tpemeriksaan', $data);

    $periksa_id = $this->db->insert_id();

    for ($i = 0; $i < $count; $i++) {
        $data2['idpemeriksaan'] = $periksa_id;
        $data2['iduser'] = $this->input->post('petugas_id')[$i];
        $this->db->insert('tpetugaspemeriksa', $data2);
    }

    $this->db->trans_complete();

    if ($this->db->trans_status() === TRUE)
    {
        $this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan dan notiv email terkirim.
            </div>");
        redirect('pemeriksaan/pemeriksaan_list');
    } else
    {
        $this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan dan notiv email gagal terkirim.
            </div>");
        redirect('pemeriksaan/pemeriksaan_list');
        //echo $this->email->print_debugger(array('headers'));
      }

 }

 function edit($id)
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar2";
        $data['body'] = "body/form_edituser";

    $sql = "SELECT * FROM tuser WHERE iduser = '$id'";
		$row = $this->db->query($sql)->row();

    $data['id'] = $id;
		$data['dd_aktif'] = $this->model_app->dropdown_aktif();
		$data['id_aktif'] = $row->status;

		$data['dd_level'] = $this->model_app->dropdown_level();
		$data['id_level'] = $row->idjabatan;

		$data['passwordlama'] = $row->password;

		$data['nama'] = $row->nama;
    $data['nip'] = $row->nip;
    $data['username'] = $row->username;


        $this->load->view('template', $data);

 }

 function update()
 {

 	$id= strtoupper(trim($this->input->post('id')));
  $passwordlama= strtoupper(trim($this->input->post('passwordlama')));
  $nama= strtoupper(trim($this->input->post('nama')));
  $nip= strtoupper(trim($this->input->post('nip')));
  $username= strtoupper(trim($this->input->post('username')));
  $password= strtoupper(trim($this->input->post('password')));
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
