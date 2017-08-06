<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Folders_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}

    /************** GET USERS FOLDERS **************/
    public function get_user_folders($param_emp_id){
        $query = $this->db->query("
                SELECT
                    f.folder_id
                    ,f.folder_name
                    ,IFNULL(fm.message_count,0) AS message_count
                FROM
                    folders AS f
                    
                LEFT JOIN (
                    SELECT
                        folder_id
                        ,COUNT(folder_id) AS message_count
                    FROM (
                        SELECT
                            emp_id
                            ,folder_id
                            ,message_id
                        FROM
                            folder_messages AS fm
                        WHERE
                            1 = 1
                            AND fm.emp_id = $param_emp_id
                    ) AS  fm
                    
                    GROUP BY
                        folder_id
                ) AS fm
                ON f.folder_id = fm.folder_id
                
                WHERE
                    1 = 1
                    AND emp_id = $param_emp_id
                    AND is_active = TRUE
        ");
        $result = $query->result_array();
        return $result;
    }

    /************** ADD NEW FOLDERS **************/
    public function add_new_folder($param_folder_name, $param_emp_id){
        $data = array(
            'folder_name' => $param_folder_name
        ,'emp_id' => $param_emp_id
        );

        $this->db->insert('folders', $data);
    }

    /************** DELETE USERS FOLDERS **************/
    public function delete_user_folders($param_folder_id){
        $this->db->where('folder_id', $param_folder_id);
        $this->db->delete('folders');
    }

    /************** ADD NEW FOLDERS **************/
    public function get_folder_messages($param_folder_id, $param_emp_id){
        $query = $this->db->query("
                SELECT
                    m.message_id
                    ,m.emp_id
                    ,TIME_FORMAT(CAST(m.created_on AS TIME), '%l:%i:%S %p') AS created_on
                    ,DATE_FORMAT(CAST(m.created_on AS DATE), '%W %M %D') AS date_header
                    ,IF(LENGTH(m.message) >= 90, CONCAT(LEFT(m.message, 90),'...'),m.message) AS message
                    ,m.attachment
                    ,e.emp_name
                    ,m.message_status
                FROM (
                    SELECT
                        m.message_id
                        ,m.emp_id
                        ,m.created_on
                        ,m.message
                        ,m.attachment
                        ,m.message_status
                    FROM
                        messages AS m
                    WHERE
                        1 = 1
                        AND m.message_id IN (
                            SELECT
                                fm.message_id
                            FROM
                                folder_messages AS fm
                            WHERE
                                1 = 1
                                AND fm.emp_id = $param_emp_id
                                AND fm.folder_id = $param_folder_id
                        )
                ) AS m
    
                LEFT JOIN (
                    SELECT
                        e.emp_id
                        ,CONCAT(e.first_name,' ',e.last_name) AS emp_name
                    FROM
                        emp AS e
                ) AS e
                ON m.emp_id = e.emp_id
    
                ORDER BY
                    created_on ASC
		");
		$result = $query->result_array();
		return $result;
    }

    /************** MOVE TO FOLDER **************/
    public function move_to_folder($param_folder_id, $param_msg_id, $param_emp_id){
        $data = array(
            'emp_id' => $param_emp_id,
            'folder_id' => $param_folder_id,
            'message_id' => $param_msg_id
        );

        $this->db->insert('folder_messages', $data);
    }
}