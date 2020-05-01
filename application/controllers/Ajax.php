<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{

    public function index()
	{
		$this->load->view('ajax');
	}

    public function requestDataTables()
    {
        $this->load->helper('datatables');
        $column_order = array(null, 'UserName');
        $field = 'id,UserName';
        $list = Datatables::GetAllDataTables($this, $column_order, $field, 'USER');
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $row) {
            $nestedData = array();
            $nestedData[] = 1 + $no++;
            $nestedData[] = $row['UserName'];
            $data[] = $nestedData;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => count($list),
            "recordsFiltered" => Datatables::CountFiltered($this, $column_order, $field, 'USER'),
            "data" => $data,
        );
        $this->output->set_status_header(200);
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
}
