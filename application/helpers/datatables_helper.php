<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatables{

 private function QueryDataTables($ci, $column_order, $field, $from, $table, $where, $join_condition){
    $ci->db->select($field);
    $ci->db->from($from);
    if (is_array($table) && $table != null) {
      foreach ($table as $key => $row) {
        $ci->db->join($key, $row, $join_condition);
      }
    }
    if($where != null ) $ci->db->where($where);
    $ci->db->where('1=1', null, false);
    foreach ($column_order as $item => $key)
    {
      if ( !empty($_POST['columns'][$item]['search']['value']) ) {
        $ci->db->like($key, $_POST['columns'][$item]['search']['value']);
      }
    }
    if(isset($_POST['order']))
    {
      $ci->db->order_by($column_order[$_POST['order'][0]['column']], $_POST['order'][0]['dir']);
    }
  }

  public static function GetAllDataTables($ci, $column_order, $field, $from, $table=null, $where=null, $join_condition='LEFT')
  {
    $cls = new Datatables;
    $cls->QueryDataTables($ci, $column_order, $field, $from, $table, $where, $join_condition);
    if($_POST['length'] != -1)
    $ci->db->limit($_POST['length'], $_POST['start']);
    return $ci->db->get()->result_array();
  }

  public static function CountFiltered($ci, $column_order, $field, $from, $table=null, $where=null, $join_condition='LEFT')
  {
    $cls = new Datatables;
    $cls->QueryDataTables($ci, $column_order, $field, $from, $table, $where, $join_condition);
    $query = $ci->db->get();
    return $query->num_rows();
  }
}
