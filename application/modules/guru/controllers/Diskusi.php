<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Diskusi extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    $this->load->model('guru/Guru_model', 'GM');
  }


  public function index()
  {




    $id_kelas = $this->session->userdata('id_kelas');

    $this->load->library('pagination');

    $config['base_url']     = base_url('guru/diskusi/index/');
    $config['total_rows']   = count($this->Crud_model->listingOneAll('tbl_dis_topik', 'id_kelas', $id_kelas));
    $config['per_page']     = 2;

    $from = $this->uri->segment(4);
    $this->pagination->initialize($config);
    $diskusi = $this->GM->listByKelas('tbl_dis_topik', $id_kelas, $config['per_page'], $from);

    $data = [
      'diskusi'           => $diskusi,
      'pagination'        => $this->pagination->create_links(),
      'content_belajar'   => 'guru/diskusi/index',
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
      'topik',
      'Topik diskusi',
      'required',
      ['required' => ' %s harus diisi']
    );
    $valid->set_rules(
      'deskripsi',
      'Deskripsi',
      'required',
      ['required' => ' %s harus diisi']
    );

    if ($valid->run()) {


      $i = $this->input;

      $data = [
        'id_dis_topik'   => random_string(),
        'id_user'     => $id_user,
        'id_kelas'     => $id_kelas,
        'topik'   => $i->post('topik'),
        'is_active'   => $i->post('is_active'),
        'deskripsi'   => $i->post('deskripsi')
      ];
      $this->Crud_model->add('tbl_dis_topik', $data);
      $this->session->set_flashdata('msg', ' Diskusi telah ditambah');
      redirect('guru/diskusi', 'refresh');
    }

    $data = [
      'content_belajar'   => 'guru/diskusi/add',
      'content'  => 'home/layout/wrapper_user'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  public function edit($id_dis_topik)
  {
    $diskusi = $this->Crud_model->listingOne('tbl_dis_topik', 'id_dis_topik', $id_dis_topik);


    $valid = $this->form_validation;

    $valid->set_rules(
      'topik',
      'Topik diskusi',
      'required',
      ['required' => ' %s harus diisi']
    );
    $valid->set_rules(
      'deskripsi',
      'Deskripsi',
      'required',
      ['required' => ' %s harus diisi']
    );

    if ($valid->run()) {


      $i = $this->input;

      $data = [
        'id_dis_topik'   => $diskusi->id_dis_topik,
        'id_user'     => $diskusi->id_user,
        'id_kelas'     => $diskusi->id_kelas,
        'topik'   => $i->post('topik'),
        'is_active'   => $i->post('is_active'),
        'deskripsi'   => $i->post('deskripsi')
      ];
      $this->Crud_model->edit('tbl_dis_topik', 'id_dis_topik', $id_dis_topik, $data);
      $this->session->set_flashdata('msg', ' Diskusi diubah ditambah');
      redirect('guru/diskusi', 'refresh');
    }

    $data = [
      'diskusi'           => $diskusi,
      'content_belajar'   => 'guru/diskusi/add',
      'content'  => 'home/layout/wrapper_user'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  function delete($id_diskusi)
  {
    $diskusi = $this->Crud_model->listingOne('tbl_dis_topik', 'id_diskusi', $id_diskusi);
    if ($diskusi->file_diskusi != '') {
      unlink($diskusi->file_diskusi);
    }
    $this->Crud_model->delete('tbl_dis_topik', 'id_diskusi', $id_diskusi);
    $this->session->set_flashdata('msg', ' Diskusi dihapus');
    redirect('guru/diskusi', 'refresh');
  }
  function is_active($id_dis_topik, $value)
  {
    __is_boolean('tbl_dis_topik', 'id_dis_topik', $id_dis_topik, 'is_active', $value);
    $this->session->set_flashdata('msg', ' Status diubah');
    redirect('guru/diskusi', 'refresh');
  }

  function detail($id_dis_topik)
  {
    $topik = $this->Crud_model->listingOne('tbl_dis_topik', 'id_dis_topik', $id_dis_topik);
    $data = [
      'topik'           => $topik,
      'content_belajar'   => 'guru/diskusi/detail',
      'content'  => 'home/layout/wrapper_user'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  function postKomentar()
  {

    $this->load->helper('string');
    $i = $this->input;

    $isi = $i->post('isi_komentar');

    $result = '';
    if ($isi == '') {
      $result['pesan'] = "Isikan sesuatu pada kolom komentar";
    } else {
      $data = [
        'id_dis_komentar' => random_string(),
        'id_dis_topik'    => $i->post('id_dis_topik'),
        'id_user'    => $i->post('id_user'),
        'isi_komentar'    => $isi,
        'is_parent'    => $i->post('is_parent')
      ];
      $this->Crud_model->add('tbl_dis_komentar', $data);
    }

    echo json_encode($result);
  }

  function readComment($id_dis_topik)
  {
    $comment = $this->GM->listComment($id_dis_topik);
    // $comment = $this->Crud_model->listing('tbl_dis_komentar');
    echo json_encode($comment);
  }
}
