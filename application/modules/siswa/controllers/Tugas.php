<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    $this->load->model('siswa/Siswa_model', 'SM');
    $this->load->helper('string');
  }


  public function index()
  {
    $this->load->model('siswa/Siswa_model', 'SM');

    $id_kelas = $this->session->userdata('id_kelas');

    $this->load->library('pagination');

    $config['base_url']     = base_url('siswa/tugas/index/');
    $config['total_rows']   = count($this->Crud_model->listingOneAll('tbl_tug_tugas', 'id_kelas', $id_kelas));
    $config['per_page']     = 10;

    $from = $this->uri->segment(4);
    $this->pagination->initialize($config);
    $tugas = $this->SM->listByKelas('tbl_tug_tugas', $id_kelas, $config['per_page'], $from);

    $data = [
      'tugas'           => $tugas,
      'pagination'        => $this->pagination->create_links(),
      'content_belajar'   => 'siswa/tugas/index',
      'content'           => 'home/layout/wrapper_user'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  function detail($id_tug_tugas)
  {
    $id_user  = $this->session->userdata('id_user');
    $tugas = $this->Crud_model->listingOne('tbl_tug_tugas', 'id_tug_tugas', $id_tug_tugas);


    if ($tugas->type == 'resume') {
      $this->detailResume($id_tug_tugas, $id_user);
    } else if ($tugas->type == 'pilihanganda') {
      $this->detailPilihanGanda();
    } else if ($tugas->type == 'essay') {
      $this->detailEssay($id_tug_tugas, $id_user);
    }
  }

  private function detailPilihanGanda()
  {
  }

  private function detailEssay($id_tug_tugas, $id_user)
  {

    $essay = $this->Crud_model->listingOneAll('tbl_tug_essay_soal', 'id_tug_tugas', $id_tug_tugas);
    $jawaban = $this->SM->listJawabanEssay($id_tug_tugas, $id_user);

    if ($jawaban == null) {

      foreach ($essay as $row) {
        $jawaban = [
          'id_tug_essay_jawaban'      => random_string(),
          'id_tug_tugas'              => $id_tug_tugas,
          'id_user'                   => $id_user,
          'id_tug_essay_soal'         => $row->id_tug_essay_soal
        ];
        $this->Crud_model->add('tbl_tug_essay_jawaban', $jawaban);
      }
    }

    $jawaban = $this->SM->listJawabanEssay($id_tug_tugas, $id_user);

    $data = [
      'jawaban'           => $jawaban,
      'content_belajar'   => 'siswa/tugas/essay',
      'content'           => 'home/layout/wrapper_user'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }


  private function detailResume($id_tug_tugas, $id_user)
  {
    $tugas = $this->SM->listJawabanResume($id_tug_tugas, $id_user);

    if ($tugas == null) {

      $jawaban = [
        'id_tug_resume_jawaban'      => random_string(),
        'id_tug_tugas'              => $id_tug_tugas,
        'id_user'                   => $id_user
      ];
      $this->Crud_model->add('tbl_tug_resume_jawaban', $jawaban);
    }

    $tugas = $this->SM->listJawabanResume($id_tug_tugas, $id_user);


    $data = [
      'tugas'             => $tugas,
      'content_belajar'   => 'siswa/tugas/resume',
      'content'           => 'home/layout/wrapper_user'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  function submitEssay($id_tug_essay_jawaban)
  {
    $id_tug_tugas = $this->input->post('id_tug_tugas');
    $data = [
      'jawaban' => $this->input->post('jawaban' . $id_tug_essay_jawaban)
    ];
    $this->Crud_model->edit('tbl_tug_essay_jawaban', 'id_tug_essay_jawaban', $id_tug_essay_jawaban, $data);
    $this->session->set_flashdata('msg', 'Soal dijawab');
    redirect('siswa/tugas/detail/' . $id_tug_tugas);
  }

  function submitResume($id_tug_resume_jawaban)
  {
    $i = $this->input;
    $id_user = $this->session->userdata('id_user');
    $id_tug_tugas = $i->post('id_tug_tugas');

    // print_r($id_tug_tugas);
    // die;
    $tugas = $this->SM->listJawabanResume($id_tug_tugas, $id_user);


    $config['upload_path']   = './assets/uploads/pdf/resume/';
    $config['allowed_types'] = 'pdf';
    $config['max_size']      = '240000'; // KB 
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('dokumen')) {
      $data = [
        'error'             => $this->upload->display_errors(),
        'tugas'             => $tugas,
        'content_belajar'   => 'siswa/tugas/resume',
        'content'           => 'home/layout/wrapper_user'
      ];
      $this->load->view('home/layout/wrapper', $data, FALSE);
    } else {

      if ($tugas->dokumen != '') {
        unlink($tugas->dokumen);
      }
      $upload_data = ['uploads' => $this->upload->data()];

      $data = [
        'deskripsi'                  => $i->post('deskripsi'),
        'dokumen'                    => $config['upload_path'] . $upload_data['uploads']['file_name']
      ];
      $this->Crud_model->edit('tbl_tug_resume_jawaban', 'id_tug_resume_jawaban', $id_tug_resume_jawaban, $data);
      $this->session->set_flashdata('msg', ' Resume di kirim');
      redirect('siswa/tugas/detail/' . $id_tug_tugas, 'refresh');
    }
  }


  function deleteResume($id_tug_resume_jawaban)
  {
    $tugas = $this->Crud_model->listingOne('tbl_tug_resume_jawaban', 'id_tug_resume_jawaban', $id_tug_resume_jawaban);
    unlink($tugas->dokumen);
    __is_boolean('tbl_tug_resume_jawaban', 'id_tug_resume_jawaban', $id_tug_resume_jawaban, 'dokumen', '');
    redirect('siswa/tugas/detail/' . $tugas->id_tug_tugas, 'refresh');
  }

  function downloadResume($id_tug_resume_jawaban)
  {
    $this->load->helper('download');
    $tugas = $this->Crud_model->listingOne('tbl_tug_resume_jawaban', 'id_tug_resume_jawaban', $id_tug_resume_jawaban);
    force_download($tugas->dokumen, null);
  }
}
