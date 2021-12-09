<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends CI_Model
{

  public function getAllMaster()
  {
    //$this->db->order_by('account', "ASC");
    return $this->db->get('contact')->result_array();
  }

  public function getDataMaster($limit, $start, $keyword = null)
  {
    if ($keyword) {

      $this->db->like('name', $keyword);
      $this->db->or_like('phone', $keyword);
      $this->db->or_like('email', $keyword);
      $this->db->or_like('address', $keyword);
    }

    return $this->db->get('contact', $limit, $start)->result_array();
  }

  public function CountDataContact()
  {
    return $this->db->get('contact')->count_all_results();
  }

  public function getchangeMenuById($id)
  {
    return $this->db->get_where('contact', ['id' => $id])->row_array();
  }
}
