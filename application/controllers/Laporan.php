<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

function __construct(){
        parent::__construct();
        $this->load->model('model_app');
        $this->load->helper('bulan_helper');
    }
    function pilih()
    {
    $reqlaporan = strtoupper(trim($this->input->post('ddlaporan')));

    if ($reqlaporan == "PERIODE")
    {
      $idjabatan = trim($this->session->userdata('idjabatan'));
      if ($idjabatan==1){
        $data['sidebar'] = "sidebar/sidebar";
      }
      else if ($idjabatan==2){
        $data['sidebar'] = "sidebar/sidebar2";
      }
      $data['header'] = "header/header";
      $data['navbar'] = "navbar/navbar";
      $data['body'] = "body/konflap_periode";

      $this->load->view('template', $data);
    }
    else if($reqlaporan == "BULAN")
    {
      $idjabatan = trim($this->session->userdata('idjabatan'));
      if ($idjabatan==1){
        $data['sidebar'] = "sidebar/sidebar";
      }
      else if ($idjabatan==2){
        $data['sidebar'] = "sidebar/sidebar2";
      }
      $data['header'] = "header/header";
      $data['navbar'] = "navbar/navbar";
      $data['body'] = "body/konflap_bulan";

      $this->load->view('template', $data);
    }
    else if($reqlaporan == "TAHUN")
    {
      $idjabatan = trim($this->session->userdata('idjabatan'));
      if ($idjabatan==1){
        $data['sidebar'] = "sidebar/sidebar";
      }
      else if ($idjabatan==2){
        $data['sidebar'] = "sidebar/sidebar2";
      }
      $data['header'] = "header/header";
      $data['body'] = "body/konflap_tahunan";
      $data['navbar'] = "navbar/navbar";

      $this->load->view('template', $data);
    }
    else if($reqlaporan == "PETUGAS")
    {
      $idjabatan = trim($this->session->userdata('idjabatan'));
      if ($idjabatan==1){
        $data['sidebar'] = "sidebar/sidebar";
      }
      else if ($idjabatan==2){
        $data['sidebar'] = "sidebar/sidebar2";
      }
      $data['dd_petugas'] = $this->model_app->dropdown_petugas();
      $data['id_petugas'] = "";
      $data['header'] = "header/header";
      $data['body'] = "body/konflap_petugas";
      $data['navbar'] = "navbar/navbar";

      $this->load->view('template', $data);
    }
  }

 function view()
 {
   $idjabatan = trim($this->session->userdata('idjabatan'));
   if ($idjabatan==1){
     $data['sidebar'] = "sidebar/sidebar";
   }
   else if ($idjabatan==2){
     $data['sidebar'] = "sidebar/sidebar2";
   }

 	      $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['body'] = "body/laporanpilih";

        $this->load->view('template', $data);
 }
 function proses_periode()
 {
   $awal = strtoupper(trim($this->input->post('tanggal1')));
   $akhir = strtoupper(trim($this->input->post('tanggal2')));

   $idjabatan = trim($this->session->userdata('idjabatan'));
   if ($idjabatan==1){
     $data['sidebar'] = "sidebar/sidebar";
   }
   else if ($idjabatan==2){
     $data['sidebar'] = "sidebar/sidebar2";
   }

   $data['record'] = $this->model_app->datahasilperiksalap($awal,$akhir);
   $listData = [];

   foreach ( $this->model_app->datahasilperiksalap($awal,$akhir) as $key => $value) {
     $listData[$key]['tglinput'] = $value->tglinput;
     $listData[$key]['nosurattugas'] = $value->nosurattugas;
     $listData[$key]['namakabkota'] = $value->namakabkota;
     $listData[$key]['namakegiatan'] = $value->namakegiatan;
     $listData[$key]['namasarana'] = $value->namasarana;
     $listData[$key]['alamat'] = $value->alamat;
     $listData[$key]['namapemilik'] = $value->namapemilik;
     $listData[$key]['namakabkota'] = $value->namakabkota;
     $listData[$key]['njs'] = $value->namajenissarana;
     $listData[$key]['hasil'] = $value->hasil;
     $listData[$key]['keterangan'] = $value->keterangan;

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

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['body'] = "body/lap";
        $data['awal'] = $awal;
        $data['akhir'] = $akhir;
        $this->load->view('template', $data);
 }

 function proses_bulan()
 {
   $bulan = strtoupper(trim($this->input->post('bln')));
   $tahun = strtoupper(trim($this->input->post('thn')));

   $idjabatan = trim($this->session->userdata('idjabatan'));
   if ($idjabatan==1){
     $data['sidebar'] = "sidebar/sidebar";
   }
   else if ($idjabatan==2){
     $data['sidebar'] = "sidebar/sidebar2";
   }
   $bln = array(
                   '01' => 'JANUARI',
                   '02' => 'FEBRUARI',
                   '03' => 'MARET',
                   '04' => 'APRIL',
                   '05' => 'MEI',
                   '06' => 'JUNI',
                   '07' => 'JULI',
                   '08' => 'AGUSTUS',
                   '09' => 'SEPTEMBER',
                   '10' => 'OKTOBER',
                   '11' => 'NOVEMBER',
                   '12' => 'DESEMBER',
           );
   $data['record'] = $this->model_app->datahasilperiksa_bulan($bulan,$tahun);
   $listData = [];

   foreach ( $this->model_app->datahasilperiksa_bulan($bulan,$tahun) as $key => $value) {
     $listData[$key]['tglinput'] = $value->tglinput;
     $listData[$key]['nosurattugas'] = $value->nosurattugas;
     $listData[$key]['namakabkota'] = $value->namakabkota;
     $listData[$key]['namakegiatan'] = $value->namakegiatan;
     $listData[$key]['namasarana'] = $value->namasarana;
     $listData[$key]['alamat'] = $value->alamat;
     $listData[$key]['namapemilik'] = $value->namapemilik;
     $listData[$key]['namakabkota'] = $value->namakabkota;
     $listData[$key]['njs'] = $value->namajenissarana;
     $listData[$key]['hasil'] = $value->hasil;
     $listData[$key]['keterangan'] = $value->keterangan;

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
     $bulanindo=bulan($bulan);

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['body'] = "body/lap_bulan";
        $data['bln'] = $bulanindo;
        $data['thn'] = $tahun;
        $this->load->view('template', $data);
 }


  function proses_petugas()
  {
    $bulan = strtoupper(trim($this->input->post('bln')));
    $tahun = strtoupper(trim($this->input->post('thn')));
    $petugas = $this->input->post('petugas_id');

    $idjabatan = trim($this->session->userdata('idjabatan'));
    if ($idjabatan==1){
      $data['sidebar'] = "sidebar/sidebar";
    }
    else if ($idjabatan==2){
      $data['sidebar'] = "sidebar/sidebar2";
    }
    $bln = array(
                    '01' => 'JANUARI',
                    '02' => 'FEBRUARI',
                    '03' => 'MARET',
                    '04' => 'APRIL',
                    '05' => 'MEI',
                    '06' => 'JUNI',
                    '07' => 'JULI',
                    '08' => 'AGUSTUS',
                    '09' => 'SEPTEMBER',
                    '10' => 'OKTOBER',
                    '11' => 'NOVEMBER',
                    '12' => 'DESEMBER',
            );
            $sql_datapetugas = "SELECT * FROM tuser WHERE  iduser='$petugas'";
    				$row_datapetugas = $this->db->query($sql_datapetugas)->row();
            $data['namapetugas'] = $row_datapetugas->nama;
            $data['nip'] = $row_datapetugas->nip;
            $dataperiksa_petugas =  $this->model_app->dataperiksa_petugas($bulan,$tahun,$petugas);
            $data['dataperiksa_petugas'] = $dataperiksa_petugas;

    $bulanindo=bulan($bulan);

         $data['header'] = "header/header";
         $data['navbar'] = "navbar/navbar";
         $data['body'] = "body/lap_petugas";
         $data['bln'] = $bulanindo;
         $data['thn'] = $tahun;
         $this->load->view('template', $data);
  }

  function proses_tahunan()
  {
    $tahun = strtoupper(trim($this->input->post('thn')));

    $idjabatan = trim($this->session->userdata('idjabatan'));
    if ($idjabatan==1){
      $data['sidebar'] = "sidebar/sidebar";
    }
    else if ($idjabatan==2){
      $data['sidebar'] = "sidebar/sidebar2";
    }

            $sql_tgudangfarmsi= "SELECT COUNT(idhasilpemeriksaan) AS jml_periksa FROM t_bantuhasil  WHERE year(tglinput)=YEAR('$tahun') AND namajenissarana='GUDANG FARMASI'";
    				$row_tgudangfarmasi = $this->db->query($sql_tgudangfarmsi)->row();

            $sql_mkgudangfarmsi= "SELECT COUNT(idhasilpemeriksaan) AS jml_periksamk FROM t_bantuhasil  WHERE year(tglinput)=YEAR('$tahun') AND hasil='MK' AND namajenissarana='GUDANG FARMASI'";
    				$row_mkgudangfarmasi = $this->db->query($sql_mkgudangfarmsi)->row();

            $sql_tmkgudangfarmsi= "SELECT COUNT(idhasilpemeriksaan) AS jml_periksatmk FROM t_bantuhasil  WHERE year(tglinput)=YEAR('$tahun') AND hasil='TMK' AND namajenissarana='GUDANG FARMASI'";
    				$row_tmkgudangfarmasi = $this->db->query($sql_tmkgudangfarmsi)->row();

            $sql_trs= "SELECT COUNT(idhasilpemeriksaan) AS jml_periksa FROM t_bantuhasil  WHERE YEAR(tglinput)='$tahun' AND namajenissarana='RUMAH SAKIT'";
    				$row_trs = $this->db->query($sql_trs)->row();

            $sql_mkrs= "SELECT COUNT(idhasilpemeriksaan) AS jml_periksamk FROM t_bantuhasil  WHERE YEAR(tglinput)='$tahun' AND hasil='MK' AND namajenissarana='RUMAH SAKIT'";
    				$row_mkrs = $this->db->query($sql_mkrs)->row();

            $sql_tmkrs= "SELECT COUNT(idhasilpemeriksaan) AS jml_periksatmk FROM t_bantuhasil  WHERE YEAR(tglinput)='$tahun' AND hasil='TMK' AND namajenissarana='RUMAH SAKIT'";
    				$row_tmkrs = $this->db->query($sql_tmkrs)->row();

            $sql_tps= "SELECT COUNT(idhasilpemeriksaan) AS jml_periksa FROM t_bantuhasil  WHERE YEAR(tglinput)='$tahun' AND namajenissarana='PUSKESMAS'";
    				$row_tps = $this->db->query($sql_tps)->row();

            $sql_mkps= "SELECT COUNT(idhasilpemeriksaan) AS jml_periksamk FROM t_bantuhasil  WHERE YEAR(tglinput)='$tahun' AND hasil='MK' AND namajenissarana='PUSKESMAS'";
    				$row_mkps = $this->db->query($sql_mkps)->row();

            $sql_tmkps= "SELECT COUNT(idhasilpemeriksaan) AS jml_periksatmk FROM t_bantuhasil  WHERE YEAR(tglinput)='$tahun' AND hasil='TMK' AND namajenissarana='PUSKESMAS'";
    				$row_tmkps = $this->db->query($sql_tmkps)->row();

            $sql_tkl= "SELECT COUNT(idhasilpemeriksaan) AS jml_periksa FROM t_bantuhasil  WHERE YEAR(tglinput)='$tahun' AND namajenissarana='KLINIK'";
    				$row_tkl = $this->db->query($sql_tkl)->row();

            $sql_mkkl= "SELECT COUNT(idhasilpemeriksaan) AS jml_periksamk FROM t_bantuhasil  WHERE YEAR(tglinput)='$tahun' AND hasil='MK' AND namajenissarana='KLINIK'";
    				$row_mkkl = $this->db->query($sql_mkkl)->row();

            $sql_tmkkl= "SELECT COUNT(idhasilpemeriksaan) AS jml_periksatmk FROM t_bantuhasil  WHERE YEAR(tglinput)='$tahun' AND hasil='TMK' AND namajenissarana='KLINIK'";
    				$row_tmkkl = $this->db->query($sql_tmkkl)->row();

            $data['tgudangfarmasi'] = $row_tgudangfarmasi->jml_periksa;
            $data['mkgudangfarmasi'] = $row_mkgudangfarmasi->jml_periksamk;
            $data['tmkgudangfarmasi'] = $row_tmkgudangfarmasi->jml_periksatmk;

            $data['trs'] = $row_trs->jml_periksa;
            $data['mkrs'] = $row_mkrs->jml_periksamk;
            $data['tmkrs'] = $row_tmkrs->jml_periksatmk;

            $data['tps'] = $row_tps->jml_periksa;
            $data['mkps'] = $row_mkps->jml_periksamk;
            $data['tmkps'] = $row_tmkps->jml_periksatmk;

            $data['tkl'] = $row_tkl->jml_periksa;
            $data['mkkl'] = $row_mkkl->jml_periksamk;
            $data['tmkkl'] = $row_tmkkl->jml_periksatmk;

         $data['header'] = "header/header";
         $data['navbar'] = "navbar/navbar";
         $data['body'] = "body/lap_tahunan";
         $data['thn'] = $tahun;
         $this->load->view('template', $data);
  }


}
