<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Quiz extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('siswa/Siswa_model', 'SM');
  }



  function index()
  {
    $id_user = $this->session->userdata('id_user');
    $id_kelas = $this->session->userdata('id_kelas');
    $quiz = $this->SM->getActive('tbl_qz_quiz', $id_kelas);

    $cek = $this->SM->cekQz($id_user, $quiz->id_qz_quiz);

    $data = [
      'quiz'             => $quiz,
      'cek'             => $cek,
      'content_belajar'   => 'siswa/quiz/index',
      'content'           => 'home/layout/wrapper_user'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  function kirimJawaban($id_qz_quiz)
  {

    $this->load->helper('string');
    $id_user = $this->session->userdata('id_user');

    $quiz = $this->Crud_model->listingOne('tbl_qz_quiz', 'id_qz_quiz', $id_qz_quiz);

    $cek = $this->SM->cekQz($id_user, $id_qz_quiz);

    if ($cek) {
      $this->session->set_flashdata('msg_er', 'Anda telah mengirim jawaban');
      redirect('siswa/quiz', 'refresh');
    } else {
      $quota = $quiz->quota - 1;
      __is_boolean('tbl_qz_quiz', 'id_qz_quiz', $id_qz_quiz, 'quota', $quota);

      $data = [
        'id_qz_jawaban'   => random_string(),
        'id_qz_quiz'      => $id_qz_quiz,
        'id_user'         => $id_user,
        'jawaban'         => $this->input->post('jawaban')
      ];
      $this->Crud_model->add('tbl_qz_jawaban', $data);
      $this->session->set_flashdata('msg', 'Jawaban di kirim');
      redirect('siswa/quiz', 'refresh');
    }
  }
}
