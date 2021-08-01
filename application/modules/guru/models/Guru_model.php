<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru_model extends CI_Model
{
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
}

/* End of file ModelName.php */
