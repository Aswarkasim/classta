<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Modul extends CI_Controller
{

  public function index()
  {

    $this->load->model('guru/Guru_model', 'GM');

    $id_kelas = $this->session->userdata('id_kelas');

    $this->load->library('pagination');

    $config['base_url']     = base_url('siswa/modul/index/');
    $config['total_rows']   = count($this->Crud_model->listingOneAll('tbl_modul', 'id_kelas', $id_kelas));
    $config['per_page']     = 2;

    $from = $this->uri->segment(4);
    $this->pagination->initialize($config);
    $modul = $this->GM->listByKelas('tbl_modul', $id_kelas, $config['per_page'], $from);

    $data = [
      'modul'           => $modul,
      'pagination'        => $this->pagination->create_links(),
      'content_belajar'   => 'siswa/modul/index',
      'content'           => 'home/layout/wrapper_user'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  function detail($id_modul)
  {
    $modul = $this->Crud_model->listingOne('tbl_modul', 'id_modul', $id_modul);

    if ($modul->is_active != 1) {
      $this->session->set_flashdata('msg_er', 'Modul belum bisa dibuka');
      redirect('siswa/modul');
    } else {
      $data = [
        'modul'           => $modul,
        'content_belajar'   => 'siswa/modul/detail',
        'content'           => 'home/layout/wrapper_user'
      ];
      $this->load->view('home/layout/wrapper', $data, FALSE);
    }
  }
}
