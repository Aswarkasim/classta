<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Modul extends CI_Controller
{

  public function index()
  {

    $this->load->model('guru/Guru_model', 'GM');

    $id_kelas = $this->session->userdata('id_kelas');

    $this->load->library('pagination');

    $config['base_url']     = base_url('guru/modul/index/');
    $config['total_rows']   = count($this->Crud_model->listingOneAll('tbl_modul', 'id_kelas', $id_kelas));
    $config['per_page']     = 2;

    $from = $this->uri->segment(4);
    $this->pagination->initialize($config);
    $modul = $this->GM->listByKelas('tbl_modul', $id_kelas, $config['per_page'], $from);

    $data = [
      'modul'           => $modul,
      'pagination'        => $this->pagination->create_links(),
      'content_belajar'   => 'guru/modul/index',
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
      'nama_modul',
      'Nama Modul',
      'required',
      array('required' => ' %s harus diisi')
    );
    if ($valid->run()) {
      if (!empty($_FILES['file_modul']['name'])) {
        $config['upload_path']   = './assets/uploads/pdf/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = '24000'; // KB 
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file_modul')) {
          $data = [
            'error'             => $this->upload->display_errors(),
            'content_belajar'   => 'guru/modul/add',
            'content'  => 'home/layout/wrapper_user'
          ];
          $this->load->view('home/layout/wrapper', $data, FALSE);
        } else {
          $upload_data = ['uploads' => $this->upload->data()];

          $i = $this->input;

          $data = [
            'id_modul'   => random_string(),
            'id_user'     => $id_user,
            'id_kelas'     => $id_kelas,
            'nama_modul'   => $i->post('nama_modul'),
            'deskripsi'   => $i->post('deskripsi'),
            'file_modul'          => $config['upload_path'] . $upload_data['uploads']['file_name']
          ];
          $this->Crud_model->add('tbl_modul', $data);
          $this->session->set_flashdata('msg', ' Modul telah ditambah');
          redirect('guru/modul', 'refresh');
        }
      }
    }
    $data = [
      'content_belajar'   => 'guru/modul/add',
      'content'  => 'home/layout/wrapper_user'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  function edit($id_modul)
  {

    $modul = $this->Crud_model->listingOne('tbl_modul', 'id_modul', $id_modul);


    $valid = $this->form_validation;
    $i = $this->input;

    $valid->set_rules(
      'nama_modul',
      'Nama Modul',
      'required',
      array('required' => ' %s harus diisi')
    );
    if ($valid->run()) {
      if (!empty($_FILES['file_modul']['name'])) {
        $config['upload_path']   = './assets/uploads/pdf/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = '24000'; // KB 
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file_modul')) {
          $data = [
            'modul'             => $modul,
            'error'             => $this->upload->display_errors(),
            'content_belajar'   => 'guru/modul/add',
            'content'  => 'home/layout/wrapper_user'
          ];
          $this->load->view('home/layout/wrapper', $data, FALSE);
        } else {

          if ($modul->file_modul != '') {
            unlink($modul->file_modul);
          }
          $upload_data = ['uploads' => $this->upload->data()];
          $upload = $config['upload_path'] . $upload_data['uploads']['file_name'];
        }
      } else {
        $upload = $modul->file_modul;
      }
      $data = [
        'id_modul'    => $id_modul,
        'id_user'     => $modul->id_user,
        'id_kelas'    => $modul->id_kelas,
        'nama_modul'  => $i->post('nama_modul'),
        'deskripsi'   => $i->post('deskripsi'),
        'file_modul'  => $upload
      ];
      $this->Crud_model->edit('tbl_modul', 'id_modul', $id_modul, $data);
      $this->session->set_flashdata('msg', ' Modul telah ditambah');
      redirect('guru/modul', 'refresh');
    }
    $data = [
      'modul'             => $modul,
      'content_belajar'   => 'guru/modul/add',
      'content'  => 'home/layout/wrapper_user'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  function delete($id_modul)
  {
    $modul = $this->Crud_model->listingOne('tbl_modul', 'id_modul', $id_modul);
    if ($modul->file_modul != '') {
      unlink($modul->file_modul);
    }
    $this->Crud_model->delete('tbl_modul', 'id_modul', $id_modul);
    $this->session->set_flashdata('msg', ' Modul dihapus');
    redirect('guru/modul', 'refresh');
  }
  function is_active($id_modul, $value)
  {
    __is_boolean('tbl_modul', 'id_modul', $id_modul, 'is_active', $value);
    $this->session->set_flashdata('msg', ' Status diubah');
    redirect('guru/modul', 'refresh');
  }
}
