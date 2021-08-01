<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diskusi extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    $this->load->model('siswa/Siswa_model', 'SM');
  }


  function index()
  {

    $id_kelas = $this->session->userdata('id_kelas');
    $topik = $this->SM->getActive('tbl_dis_topik', $id_kelas);
    $data = [
      'topik'           => $topik,
      'content_belajar'   => 'siswa/diskusi/index',
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
    $comment = $this->SM->listComment($id_dis_topik);
    // $comment = $this->Crud_model->listing('tbl_dis_komentar');
    echo json_encode($comment);
  }
}



/* End of file Controllername.php */
