<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

  public function index()
  {
    $id_user = $this->session->userdata('id_user');
    $id_kelas = $this->session->userdata('id_kelas');
    $user = $this->Crud_model->listingOne('tbl_user', 'id_user', $id_user);
    $kelas = $this->Crud_model->listingOne('tbl_kelas', 'id_kelas', $id_kelas);
    $data = [
      'kelas'      => $kelas,
      'user'      => $user,
      'content'  => 'siswa/dashboard/index'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }
}

/* End of file Controllername.php */
