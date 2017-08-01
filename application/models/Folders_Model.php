<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Folders_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}

    public function get_user_folders($param_emp_id){
        $query = $this->db->query("
                SELECT
                    folder_id
                    ,folder_name
                    ,IFNULL(mc.message_count, 0) AS message_count
                FROM (
                    SELECT
                        folder_id
                        ,folder_name
                    FROM
                        folders AS f
                    WHERE
                        1 = 1
                        AND f.emp_id = $param_emp_id
                        AND f.is_active = 1
                ) AS f
    
                LEFT JOIN (
                    SELECT
                        mc.folder
                        ,COUNT(*) AS message_count
                    FROM
                        messages AS mc
                    WHERE
                        1 = 1
                        AND folder <> 0
                    GROUP BY
                        folder
                )AS mc
                ON f.folder_id = mc.folder
                
                ORDER BY
                  folder_name
        ");
        $result = $query->result_array();
        return $result;
    }

    public function delete_user_folders($param_folder_id){
        $this->db->where('folder_id', $param_folder_id);
        $this->db->delete('folders');
    }
}