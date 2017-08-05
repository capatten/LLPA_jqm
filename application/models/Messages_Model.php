<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Messages_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}

	/****************************** GET DASHBOARD MESSAGES ******************************/
	public function get_dashboard_messages($param_department, $param_message_status){
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
					AND m.departments LIKE '%$param_department%'
					AND message_status = $param_message_status
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

	/****************************** GET MESSAGE DETAILS ******************************/
	public function get_message_details($param_message_id){
		$query = $this->db->query("
			SELECT
				e.emp_name
				,m.message_id
				,m.emp_id
				,DATE_FORMAT(CAST(m.created_on AS DATE), '%c/%d/%Y') AS created_date
				,TIME_FORMAT(CAST(m.created_on AS TIME), '%l:%i:%S %p') AS created_time
				,m.message
				,m.attachment
				,m.departments
				,m.folder
				,m.msg_status
				,ma.attachment_path
			FROM (
				SELECT
					message_id
					,emp_id
					,created_on
					,message
					,attachment
					,departments
					,folder
					,message_status AS msg_status
				FROM
					pattende_llpa.messages AS m
				WHERE
					1 = 1
					AND m.message_id = '$param_message_id'
			) AS m

			LEFT JOIN (
				SELECT
					ma.message_id
					,ma.attachment_path
				FROM
					message_attachments AS ma
			) AS ma
			ON m.message_id = ma.message_id

			LEFT JOIN (
				SELECT
					e.emp_id
					,CONCAT(e.first_name,' ',e.last_name) AS emp_name
				FROM
					emp AS e
			) AS e
			ON m.emp_id = e.emp_id

			LIMIT 1
		");
		$result = $query->result_array();
		return $result;
	}

	/****************************** PENDING MESSAGE COUNT ******************************/
	public function get_pending_message_count($param_department, $param_message_status){
		$query = $this->db->query("
			SELECT
				COUNT(*) AS pending_count
			FROM (
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
						AND m.departments LIKE '%$param_department%'
						AND message_status = $param_message_status
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
			) AS p
		");
		$result = $query->result_array();
		return $result;
	}

    /****************************** UPDATE MESSAGE STATUS ******************************/
    public function update_message_status( $param_message_id, $param_message_status ){
        $data = array(
            'message_status' => $param_message_status
        );

        $this->db->where('message_id', $param_message_id);
        $this->db->update('messages', $data);
    }

    /****************************** INSERT DECLINE EXPLANATION ******************************/
    public function insert_decline_explanation( $param_message_id, $param_decline_explanation ){
        $data = array(
            'message_id' => $param_message_id
            ,'decline_explanation' => $param_decline_explanation
        );

        $this->db->insert('messages_decline_explanation', $data);
    }

    /****************************** GET ALL DEPARTMENTS ******************************/
    public function get_all_departments(){
        $query = $this->db->query("
			SELECT
                d.department_id
                ,d.department_desc
                ,d.img_path
            FROM
                ref_emp_department AS d
            WHERE
                1 = 1
                AND d.is_active = TRUE
		");
        $result = $query->result_array();
        return $result;
    }
}