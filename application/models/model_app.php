<?php

class Model_app extends CI_Model{
    function __construct(){
        parent::__construct();
    }

//  ================= AUTOMATIC CODE ==================

    public function insert_data($data,$table)
    {
      return $this->db->insert($table,$data);
    }

    public function edit_data($where,$data,$table)
    {
      $this->db->where($where);
      return $this->db->update($table,$data);
    }

    public function getpemeriksaansblmskrg()
    {
      $query = $this->db->query('SELECT tpemeriksaan.idpemeriksaan,tpemeriksaan.nosurattugas,tpemeriksaan.idkegiatan,tkegiatan.namakegiatan,tkegiatan.keterangan,tpemeriksaan.idkabkota,tkabkota.namakabkota,tpemeriksaan.tglpemeriksaan,tpemeriksaan.tglsurattugas from tpemeriksaan,tkegiatan,tkabkota where tpemeriksaan.idkegiatan=tkegiatan.idkegiatan and tpemeriksaan.idkabkota=tkabkota.idkabkota and tpemeriksaan.tglpemeriksaan >= now()');
      return $query->result();
    }

    public function datakegiatan()
    {
    $query = $this->db->query('SELECT * FROM tkegiatan');
    return $query->result();
    }

    public function dataemail1()
    {
    $query = $this->db->query('SELECT * FROM tuser');
    return $query->result();
    }

    public function dataemail2()
    {
    $query = $this->db->query('SELECT * FROM tuser WHERE idjabatan = 1 OR idjabatan = 2 ');
    return $query->result();
    }

    public function datajenissarana()
    {
    $query = $this->db->query('SELECT * FROM tjenissarana');
    return $query->result();
    }

    public function datasarana()
    {
    $query = $this->db->query('SELECT tsarana.idsarana,tsarana.namasarana,tsarana.alamat,tsarana.namapemilik,tsarana.idkabkota,tkabkota.namakabkota,tsarana.idjenissarana,tjenissarana.namajenissarana FROM tjenissarana,tsarana,tkabkota WHERE tsarana.idjenissarana=tjenissarana.idjenissarana and tsarana.idkabkota=tkabkota.idkabkota');
    return $query->result();
    }

    public function datahasilperiksalap($awal,$akhir)
    {
    $query = $this->db->query("SELECT
      thasilpemeriksaan.tglinput,thasilpemeriksaan.idpemeriksaan,tpemeriksaan.nosurattugas,tpemeriksaan.idkegiatan,tkegiatan.namakegiatan,thasilpemeriksaan.idsarana,tsarana.namasarana,tsarana.alamat,tsarana.namapemilik,tsarana.idkabkota,tkabkota.namakabkota,tsarana.idjenissarana,tjenissarana.namajenissarana,thasilpemeriksaan.hasil,thasilpemeriksaan.keterangan,thasilpemeriksaan.tglinput FROM tjenissarana,tsarana,tkabkota,thasilpemeriksaan,tpemeriksaan,tkegiatan WHERE thasilpemeriksaan.idpemeriksaan=tpemeriksaan.idpemeriksaan
       AND tpemeriksaan.idkegiatan=tkegiatan.idkegiatan AND thasilpemeriksaan.idsarana=tsarana.idsarana and tsarana.idkabkota=tkabkota.idkabkota AND tsarana.idjenissarana=tjenissarana.idjenissarana AND
       thasilpemeriksaan.tglinput BETWEEN '$awal' AND '$akhir'");
    return $query->result();
    }

    public function datahasilperiksa()
    {
    $query = $this->db->query("SELECT
      thasilpemeriksaan.tglinput,thasilpemeriksaan.idpemeriksaan,tpemeriksaan.nosurattugas,tpemeriksaan.idkegiatan,tkegiatan.namakegiatan,thasilpemeriksaan.idsarana,tsarana.namasarana,tsarana.alamat,tsarana.namapemilik,tsarana.idkabkota,tkabkota.namakabkota,tsarana.idjenissarana,tjenissarana.namajenissarana,thasilpemeriksaan.hasil,thasilpemeriksaan.keterangan,thasilpemeriksaan.tglinput,thasilpemeriksaan.foto FROM tjenissarana,tsarana,tkabkota,thasilpemeriksaan,tpemeriksaan,tkegiatan WHERE thasilpemeriksaan.idpemeriksaan=tpemeriksaan.idpemeriksaan
       AND tpemeriksaan.idkegiatan=tkegiatan.idkegiatan AND thasilpemeriksaan.idsarana=tsarana.idsarana and tsarana.idkabkota=tkabkota.idkabkota AND tsarana.idjenissarana=tjenissarana.idjenissarana");
    return $query->result();
    }

    public function datahasilperiksa_bulan($bulan,$tahun)
    {
    $query = $this->db->query("SELECT
      thasilpemeriksaan.tglinput,thasilpemeriksaan.idpemeriksaan,tpemeriksaan.nosurattugas,tpemeriksaan.idkegiatan,tkegiatan.namakegiatan,thasilpemeriksaan.idsarana,tsarana.namasarana,tsarana.alamat,tsarana.namapemilik,tsarana.idkabkota,tkabkota.namakabkota,tsarana.idjenissarana,tjenissarana.namajenissarana,thasilpemeriksaan.hasil,thasilpemeriksaan.keterangan,thasilpemeriksaan.tglinput FROM tjenissarana,tsarana,tkabkota,thasilpemeriksaan,tpemeriksaan,tkegiatan WHERE thasilpemeriksaan.idpemeriksaan=tpemeriksaan.idpemeriksaan
       AND tpemeriksaan.idkegiatan=tkegiatan.idkegiatan AND thasilpemeriksaan.idsarana=tsarana.idsarana AND tsarana.idkabkota=tkabkota.idkabkota AND tsarana.idjenissarana=tjenissarana.idjenissarana AND MONTH(thasilpemeriksaan.tglinput)='$bulan'
       AND YEAR(thasilpemeriksaan.tglinput)='$tahun'");
    return $query->result();
    }

    public function dataperiksa_petugas($bulan,$tahun,$petugas)
    {
    $query = $this->db->query("SELECT tpetugaspemeriksa.iduser,tuser.nip,tuser.nama,tuser.email,tjabatan.namajabatan,
    tpemeriksaan.nosurattugas,tkegiatan.namakegiatan,tkegiatan.keterangan,tpemeriksaan.tglpemeriksaan,tkabkota.namakabkota,tpemeriksaan.tglsurattugas
    FROM tpetugaspemeriksa,tuser,tjabatan,tpemeriksaan,tkegiatan,tkabkota
    WHERE
    tpetugaspemeriksa.iduser=tuser.iduser
    AND  tuser.idjabatan=tjabatan.idjabatan
    AND tpetugaspemeriksa.idpemeriksaan=tpemeriksaan.idpemeriksaan
    AND tpemeriksaan.idkegiatan=tkegiatan.idkegiatan
    AND tpemeriksaan.idkabkota=tkabkota.idkabkota
    AND MONTH(tpemeriksaan.tglsurattugas)='$bulan'
    AND YEAR(tpemeriksaan.tglsurattugas)='$tahun'
    AND tpetugaspemeriksa.iduser='$petugas'");
    return $query->result();
    }


    public function datauser()
    {
    $query = $this->db->query('SELECT tuser.iduser,tuser.nip,tuser.nama,tuser.email,tuser.idjabatan,tjabatan.namajabatan,tuser.username,tuser.status FROM tuser,tjabatan where tuser.idjabatan=tjabatan.idjabatan');
    return $query->result();
    }

    public function datapemeriksaan()
    {
    $query = $this->db->query('SELECT tpemeriksaan.idpemeriksaan,tpemeriksaan.nosurattugas,tpemeriksaan.idkegiatan,tkegiatan.namakegiatan,tpemeriksaan.tglpemeriksaan,tpemeriksaan.idkabkota,tkabkota.namakabkota,tpemeriksaan.tglsurattugas FROM tpemeriksaan,tkegiatan,tkabkota where tpemeriksaan.idkegiatan=tkegiatan.idkegiatan and tpemeriksaan.idkabkota=tkabkota.idkabkota');
    return $query->result();
    }

    public function dropdown_aktif()
    {
        $value[''] = '--PILIH--';
        $value[1] = 'YA';
        $value[0] = 'TIDAK';

            return $value;
    }

    public function dropdown_hasilpemeriksaan()
    {
        $value[''] = '--PILIH--';
        $value['MK'] = 'MEMENUHI KETENTUAN';
        $value['TMK'] = 'TIDAK MEMENUHI KETENTUAN';

            return $value;
    }

    public function dropdown_level()
    {
        $value[''] = '--PILIH--';
        $value['1'] = 'Admin';
        $value['2'] = 'Pimpinan';
        $value['3'] = 'Staff';
            return $value;
    }

    public function dropdown_kabkota()
    {
        $sql = "SELECT * FROM tkabkota ORDER BY idkabkota";
        $query = $this->db->query($sql);

        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->idkabkota] = $row->namakabkota;
        }
        return $value;
    }

    public function dropdown_jenissarana()
    {
        $sql = "SELECT * FROM tjenissarana ORDER BY idjenissarana";
        $query = $this->db->query($sql);

        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->idjenissarana] = $row->namajenissarana;
        }
        return $value;
    }

    public function dropdown_kegiatan()
    {
        $sql = "SELECT * FROM tkegiatan ORDER BY idkegiatan";
        $query = $this->db->query($sql);

        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->idkegiatan] = $row->namakegiatan;
        }
        return $value;
    }

    public function dropdown_petugas()
    {
        $sql = "SELECT * FROM tuser ORDER BY iduser";
        $query = $this->db->query($sql);

        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->iduser] = $row->nama;
        }
        return $value;
    }

    public function dropdown_pemeriksaan()
    {
        $sql = "SELECT * FROM tpemeriksaan ORDER BY idpemeriksaan";
        $query = $this->db->query($sql);

        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->idpemeriksaan] = $row->nosurattugas ;
        }
        return $value;
    }

    public function dropdown_sarana()
    {
        $sql = "SELECT * FROM tsarana ORDER BY idsarana";
        $query = $this->db->query($sql);

        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
        $value[$row->idsarana] = $row->namasarana ;
        }
        return $value;
    }

}
