<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{

  function listKelas($id_user)
  {
    $this->db->select('tbl_siswa.*,
                            tbl_kelas.*')
      ->from('tbl_siswa')
      ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'LEFT')
      ->where('tbl_siswa.id_user', $id_user)
      ->order_by('tbl_siswa.date_created', 'ASC');
    return $this->db->get()->result();
  }

  function cekKelas($id_user, $id_kelas)
  {
    return $this->db->select('*')
      ->from('tbl_kelas')
      ->where('id_user', $id_user)
      ->where('id_kelas', $id_kelas)
      ->get()->row();
  }
  function getActive($table, $id_kelas)
  {
    return $this->db->select('*')
      ->from($table)
      ->where('id_kelas', $id_kelas)
      ->where('is_active', '1')
      ->get()->row();
  }

  function listComment($id_dis_topik)
  {
    $this->db->select('tbl_dis_komentar.*,
                            tbl_user.namalengkap')
      ->from('tbl_dis_komentar')
      ->join('tbl_user', 'tbl_user.id_user = tbl_dis_komentar.id_user', 'LEFT')
      ->order_by('date_created', 'ASC')
      ->where('tbl_dis_komentar.id_dis_topik', $id_dis_topik);
    return $this->db->get()->result();
  }

  function listByKelas($table, $id_kelas, $limit, $offset)
  {
    $query = $this->db->select('*')
      ->from($table)
      ->where('id_kelas', $id_kelas)
      ->limit($limit)
      ->offset($offset)
      ->get();
    return $query->result();
  }

  function cekQz($id_user, $id_qz_quiz)
  {
    return $this->db->select('*')
      ->from('tbl_qz_jawaban')
      ->where('id_user', $id_user)
      ->where('id_qz_quiz', $id_qz_quiz)
      ->get()->row();
  }


  function listJawabanEssay($id_tug_tugas, $id_user)
  {
    $this->db->select('tbl_tug_essay_jawaban.*,
                            tbl_tug_essay_soal.soal,
                            tbl_tug_essay_soal.no_soal')
      ->from('tbl_tug_essay_jawaban')
      ->join('tbl_tug_essay_soal', 'tbl_tug_essay_soal.id_tug_essay_soal = tbl_tug_essay_jawaban.id_tug_essay_soal', 'LEFT')
      ->order_by('no_soal', 'ASC')
      ->where('tbl_tug_essay_jawaban.id_user', $id_user)
      ->where('tbl_tug_essay_jawaban.id_tug_tugas', $id_tug_tugas);
    return $this->db->get()->result();
  }


  function listJawabanResume($id_tug_tugas, $id_user)
  {
    $this->db->select('tbl_tug_resume_jawaban.*,
                            tbl_tug_tugas.nama_tugas,
                            tbl_tug_tugas.deskripsi as soal')
      ->from('tbl_tug_resume_jawaban')
      ->join('tbl_tug_tugas', 'tbl_tug_tugas.id_tug_tugas = tbl_tug_resume_jawaban.id_tug_tugas', 'LEFT')
      ->where('tbl_tug_resume_jawaban.id_tug_tugas', $id_tug_tugas)
      ->where('tbl_tug_resume_jawaban.id_user', $id_user);
    return $this->db->get()->row();
  }
}

/* End of file ModelName.php */
