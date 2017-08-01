<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}

	public function get_user_profile($param_emp_id){
		$query = $this->db->query("
			CALL get_emp_details('$param_emp_id')
		");
		$result = $query->result_array();
		return $result;
	}
}