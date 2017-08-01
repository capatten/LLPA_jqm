<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}

	public function get_user_details($param_email_address){
		$query = $this->db->query("
			SELECT
				e.emp_id
				,e.email_address
				,e.first_name
				,e.last_name
				,e.hire_dt
				,d.department_id
				,d.department_desc
				,t.title_id
				,t.title_desc
			FROM (
				SELECT
					emp_id
					,email_address
					,first_name
					,last_name
					,hire_dt
				FROM
					emp AS e
				WHERE
					1 = 1
					AND e.email_address = '$param_email_address'
			) AS e

			LEFT JOIN (
				SELECT
					d.emp_id
					,d.department_id
					,dr.department_desc
				FROM
					emp_department AS d

				INNER JOIN ref_emp_department AS dr
				ON d.department_id = dr.department_id

				WHERE
				1 = 1
				AND NOW() BETWEEN d.start_dt AND d.end_dt
			) AS d
			ON e.emp_id = d.emp_id

			LEFT JOIN (
				SELECT
					t.emp_id
					,t.title_id
					,t.start_dt
					,t.end_dt
					,tr.title_desc
				FROM
					emp_title AS t

				INNER JOIN ref_title AS tr
				ON t.title_id = tr.title_id

				WHERE
					1 = 1
					AND NOW() BETWEEN t.start_dt AND t.end_dt
			) AS t
			ON e.emp_id = t.emp_id

			LIMIT 1
		");
		$result = $query->result_array();
		return $result;
	}
}