<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
{

  public function index()
  {

    $this->load->model('guru/Guru_model', 'GM');

    $id_kelas = $this->session->userdata('id_kelas');

    $this->load->library('pagination');

    $config['base_url']     = base_url('guru/tugas/index/');
    $config['total_rows']   = count($this->Crud_model->listingOneAll('tbl_tug_tugas', 'id_kelas', $id_kelas));
    $config['per_page']     = 1;

    $from = $this->uri->segment(4);
    $this->pagination->initialize($config);
    $tugas = $this->GM->listByKelas('tbl_tug_tugas', $id_kelas, $config['per_page'], $from);

    $data = [
      'tugas'           => $tugas,
      'pagination'        => $this->pagination->create_links(),
      'content_belajar'   => 'guru/tugas/index',
      'content'           => 'home/layout/wrapper_user'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }



  public function add()
  {

    $this->load->helper('string');

    $id_user = $this->session->userdata('id_user');
    $id_kelas = $this->session->userdata('id_kelas');


    $valid = $this->form_validation;

    $valid->set_rules(
      'nama_tugas',
      'Nama Paket',
      'required',
      array('required' => ' %s harus diisi')
    );
    if ($valid->run()) {
      if (!empty($_FILES['lampiran']['name'])) {
        $config['upload_path']   = './assets/uploads/pdf/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = '24000'; // KB 
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('lampiran')) {
          $data = [
            'error'             => $this->upload->display_errors(),
            'content_belajar'   => 'guru/tugas/add',
            'content'  => 'home/layout/wrapper_user'
          ];
          $this->load->view('home/layout/wrapper', $data, FALSE);
        } else {
          $upload_data = ['uploads' => $this->upload->data()];

          $i = $this->input;

          $data = [
            'id_tug_tugas'   => random_string(),
            'id_user'     => $id_user,
            'id_kelas'     => $id_kelas,
            'nama_tugas'   => $i->post('nama_tugas'),
            'deskripsi'   => $i->post('deskripsi'),
            'is_active'   => $i->post('is_active'),
            'batas_waktu'   => $i->post('batas_waktu'),
            'lampiran'          => $config['upload_path'] . $upload_data['uploads']['file_name']
          ];
          $this->Crud_model->add('tbl_tug_tugas', $data);
          $this->session->set_flashdata('msg', ' Paket telah ditambah');
          redirect('guru/tugas', 'refresh');
        }
      }
    }
    $data = [
      'content_belajar'   => 'guru/tugas/add',
      'content'  => 'home/layout/wrapper_user'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  function edit($id_tug_tugas)
  {

    $tugas = $this->Crud_model->listingOne('tbl_tug_tugas', 'id_tug_tugas', $id_tug_tugas);


    $valid = $this->form_validation;
    $i = $this->input;

    $valid->set_rules(
      'nama_tugas',
      'Nama Paket',
      'required',
      array('required' => ' %s harus diisi')
    );
    if ($valid->run()) {
      if (!empty($_FILES['lampiran']['name'])) {
        $config['upload_path']   = './assets/uploads/images/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = '24000'; // KB 
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('lampiran')) {
          $data = [
            'tugas'             => $tugas,
            'error'             => $this->upload->display_errors(),
            'content_belajar'   => 'guru/tugas/add',
            'content'  => 'home/layout/wrapper_user'
          ];
          $this->load->view('home/layout/wrapper', $data, FALSE);
        } else {

          if ($tugas->lampiran != '') {
            unlink($tugas->lampiran);
          }
          $upload_data = ['uploads' => $this->upload->data()];
          $upload = $config['upload_path'] . $upload_data['uploads']['file_name'];
        }
      } else {
        $upload = $tugas->lampiran;
      }
      $data = [
        'id_tug_tugas'    => $id_tug_tugas,
        'id_user'     => $tugas->id_user,
        'id_kelas'    => $tugas->id_kelas,
        'nama_tugas'  => $i->post('nama_tugas'),
        'deskripsi'   => $i->post('deskripsi'),
        'lampiran'  => $upload
      ];
      $this->Crud_model->edit('tbl_tug_tugas', 'id_tug_tugas', $id_tug_tugas, $data);
      $this->session->set_flashdata('msg', ' Paket telah ditambah');
      redirect('guru/tugas', 'refresh');
    }
    $data = [
      'tugas'             => $tugas,
      'content_belajar'   => 'guru/tugas/add',
      'content'  => 'home/layout/wrapper_user'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  function delete($id_tug_tugas)
  {
    $tugas = $this->Crud_model->listingOne('tbl_tug_tugas', 'id_tug_tugas', $id_tug_tugas);
    if ($tugas->lampiran != '') {
      unlink($tugas->lampiran);
    }
    $this->Crud_model->delete('tbl_tug_tugas', 'id_tug_tugas', $id_tug_tugas);
    $this->session->set_flashdata('msg', ' Paket dihapus');
    redirect('guru/tugas', 'refresh');
  }
  function is_active($id_tug_tugas, $value)
  {
    __is_boolean('tbl_tug_tugas', 'id_tug_tugas', $id_tug_tugas, 'is_active', $value);
    $this->session->set_flashdata('msg', ' Status diubah');
    redirect('guru/tugas', 'refresh');
  }
}
