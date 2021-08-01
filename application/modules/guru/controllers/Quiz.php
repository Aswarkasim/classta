<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Quiz extends CI_Controller
{

  public function index()
  {


    $this->load->model('guru/Guru_model', 'GM');

    $id_kelas = $this->session->userdata('id_kelas');

    $this->load->library('pagination');

    $config['base_url']     = base_url('guru/quiz/index/');
    $config['total_rows']   = count($this->Crud_model->listingOneAll('tbl_qz_quiz', 'id_kelas', $id_kelas));
    $config['per_page']     = 2;

    $from = $this->uri->segment(4);
    $this->pagination->initialize($config);
    $quiz = $this->GM->listByKelas('tbl_qz_quiz', $id_kelas, $config['per_page'], $from);

    $data = [
      'quiz'              => $quiz,
      'pagination'        => $this->pagination->create_links(),
      'content_belajar'   => 'guru/quiz/index',
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
      'nama_quiz',
      'Nama quiz',
      'required',
      ['required' => ' %s harus diisi']
    );

    $valid->set_rules(
      'quota',
      'Quota',
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
        'id_qz_quiz'   => random_string(),
        'id_user'     => $id_user,
        'id_kelas'     => $id_kelas,
        'nama_quiz'   => $i->post('nama_quiz'),
        'quota'   => $i->post('quota'),
        'is_active'   => $i->post('is_active'),
        'batas_waktu'   => $i->post('batas_waktu'),
        'deskripsi'   => $i->post('deskripsi')
      ];
      $this->Crud_model->add('tbl_qz_quiz', $data);
      $this->session->set_flashdata('msg', ' Quiz telah ditambah');
      redirect('guru/quiz', 'refresh');
    }

    $data = [
      'content_belajar'   => 'guru/quiz/add',
      'content'  => 'home/layout/wrapper_user'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  public function edit($id_qz_quiz)
  {
    $quiz = $this->Crud_model->listingOne('tbl_qz_quiz', 'id_qz_quiz', $id_qz_quiz);


    $valid = $this->form_validation;

    $valid->set_rules(
      'nama_quiz',
      'Topik quiz',
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
        'id_qz_quiz'   => $quiz->id_qz_quiz,
        'id_user'     => $quiz->id_user,
        'id_kelas'     => $quiz->id_kelas,
        'nama_quiz'   => $i->post('nama_quiz'),
        'is_active'   => $i->post('is_active'),
        'deskripsi'   => $i->post('deskripsi')
      ];
      $this->Crud_model->edit('tbl_qz_quiz', 'id_qz_quiz', $id_qz_quiz, $data);
      $this->session->set_flashdata('msg', ' Quiz diubah ditambah');
      redirect('guru/quiz', 'refresh');
    }

    $data = [
      'quiz'           => $quiz,
      'content_belajar'   => 'guru/quiz/add',
      'content'  => 'home/layout/wrapper_user'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  function delete($id_quiz)
  {
    $quiz = $this->Crud_model->listingOne('tbl_qz_quiz', 'id_quiz', $id_quiz);
    if ($quiz->file_quiz != '') {
      unlink($quiz->file_quiz);
    }
    $this->Crud_model->delete('tbl_qz_quiz', 'id_quiz', $id_quiz);
    $this->session->set_flashdata('msg', ' Quiz dihapus');
    redirect('guru/quiz', 'refresh');
  }
  function is_active($id_qz_quiz, $value)
  {
    __is_boolean('tbl_qz_quiz', 'id_qz_quiz', $id_qz_quiz, 'is_active', $value);
    $this->session->set_flashdata('msg', ' Status diubah');
    redirect('guru/quiz', 'refresh');
  }
}
