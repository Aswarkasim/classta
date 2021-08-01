<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswa/Siswa_model', 'SM');
    }


    public function index()
    {


        $id_user = $this->session->userdata('id_user');
        $kelas = $this->SM->listKelas($id_user);

        $data = [
            'kelas'    => $kelas,
            'content'  => 'siswa/kelas/index'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
        // $this->load->view('home/index');
    }

    function cari()
    {
        $id_user = $this->session->userdata('id_user');
        $id_kelas = $this->input->post('id_kelas');
        $kelas = $this->Crud_model->listingOneAll('tbl_kelas', 'id_kelas', $id_kelas);
        $daftar = $this->SM->cekKelas($id_user, $id_kelas);

        $data = [
            'kelas'     => $kelas,
            'daftar'     => $daftar,
            'content'   => 'siswa/kelas/cari'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
    }

    function set_kelas($id_kelas)
    {
        // if ($this->session->userdata('id_kelas')) {
        $this->session->unset_userdata('id_kelas');
        $this->session->set_userdata('id_kelas', $id_kelas);
        redirect('siswa/dashboard');
        // } else {
        //   $this->session->set_userdata('id_kelas', $id_kelas);
        // }
    }
}
