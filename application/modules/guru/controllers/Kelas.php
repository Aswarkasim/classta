<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{

  public function index()
  {
    $id_user = $this->session->userdata('id_user');
    $kelas = $this->Crud_model->listingOneAll('tbl_kelas', 'id_user', $id_user);
    $data = [
      'kelas'    => $kelas,
      'content'  => 'guru/kelas/index'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
    // $this->load->view('home/index');
  }

  function add()
  {

    $this->load->helper('string');
    $id_user = $this->session->userdata('id_user');
    $data = [
      'id_kelas' => random_string(),
      'id_user'   => $id_user,
      'nama_kelas' => $this->input->post('nama_kelas')
    ];
    $this->Crud_model->add('tbl_kelas', $data);
    $this->session->set_flashdata('msg', 'Kelas dibuat');
    redirect('guru/kelas');
  }

  function set_kelas($id_kelas)
  {
    // if ($this->session->userdata('id_kelas')) {
    $this->session->unset_userdata('id_kelas');
    $this->session->set_userdata('id_kelas', $id_kelas);
    redirect('guru/dashboard');
    // } else {
    //   $this->session->set_userdata('id_kelas', $id_kelas);
    // }
  }
}
