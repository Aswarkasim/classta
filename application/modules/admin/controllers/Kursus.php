<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kursus extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // is_logged_in_admin();
  }


  public function index()
  {
    $tombol  = [
      'add'     => 'admin/kursus/add',
      'edit'    => 'admin/kursus/edit/',
      'delete'  => 'admin/kursus/delete/'
    ];

    $kursus = $this->Crud_model->listing('tbl_kursus');
    $data = [

      'kursus' => $kursus,
      'tombol'   => $tombol,
      'content' => 'admin/kursus/index'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  function add()
  {

    $this->load->helper('string');

    $valid = $this->form_validation;
    // $valid->set_rules('id_kursus', 'Kode Kaategori', 'macthes[tbl_kursus.id_kursus]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));
    $valid->set_rules('nama_kursus', 'Nama Kaategori', 'macthes[tbl_kursus.nama_kursus]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));


    if ($valid->run() === TRUE) {
      $this->index();
    } else {
      $i = $this->input;
      $data = [
        'nama_kursus'   => $i->post('nama_kursus'),
        'id_kursus'   => random_string()
      ];
      $this->Crud_model->add('tbl_kursus', $data);
      $this->session->set_flashdata('msg', 'kursus berhasil ditambah');
      redirect('admin/kursus');
    }
  }
  function edit($id_kursus)
  {
    $valid = $this->form_validation;
    // $valid->set_rules('id_kursus', 'Kode Kaategori', 'macthes[tbl_kursus.id_kursus]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));
    // $valid->set_rules('nama_kursus', 'Nama Kaategori', 'macthes[tbl_kursus.nama_kursus]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));


    if ($valid->run() === TRUE) {
      $this->index();
    } else {
      $i = $this->input;
      $data = [
        'nama_kursus'   => $i->post('nama_kursus'),
        'id_kursus'   => $id_kursus
      ];
      $this->Crud_model->edit('tbl_kursus', 'id_kursus', $id_kursus, $data);
      $this->session->set_flashdata('msg', 'kursus berhasil diedit');
      redirect('admin/kursus');
    }
  }

  function delete($id_kursus)
  {
    $this->Crud_model->delete('tbl_kursus', 'id_kursus', $id_kursus);
    $this->session->set_flashdata('msg', 'data telah dihapus');
    redirect('admin/kursus');
  }

  function is_active($id_kursus)
  {
    $kursus = $this->Crud_model->listing('tbl_kursus');

    foreach ($kursus as $row) {
      if ($row->id_kursus != $id_kursus) {
        $data = [
          'is_active' => 0
        ];
        $this->Crud_model->edit('tbl_kursus', 'id_kursus', $row->id_kursus, $data);
      } else {
        $data = [
          'is_active' => 1
        ];
        $this->Crud_model->edit('tbl_kursus', 'id_kursus', $id_kursus, $data);
      }
    }

    $this->index();
  }
}
