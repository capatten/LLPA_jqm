<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Menu_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}

	public function get_menu_options($param_menu_template, $param_display_type){
		$query = $this->db->query("
			SELECT
				o.menu_option_desc
				,o.menu_option_path
			FROM
				menu_options AS o
			WHERE
				1 = 1
				AND o.menu_template_id = $param_menu_template
				AND o.display_type_id = $param_display_type;
		");
		$result = $query->result_array();
		return $result;
	}
}