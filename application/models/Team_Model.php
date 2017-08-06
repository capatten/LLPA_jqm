<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Team_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}

	public function get_user_team($param_department_id){
		$query = $this->db->query("
			SELECT
                e.emp_id
                ,e.emp_name
                ,es.status_desc
                ,title_desc
            FROM (
                SELECT
                    e.emp_id
                    ,CONCAT(e.first_name,' ', e.last_name) AS emp_name
                FROM
                    emp AS e
                WHERE
                    1 = 1
                    AND emp_id IN (
                        SELECT
                            emp_id 
                        FROM
                            emp_department AS ed
                        WHERE
                            1 = 1
                            AND ed.department_id = $param_department_id
                    )
            ) AS e
            
            LEFT JOIN (
                SELECT
                    emp_id
                    ,status_desc
                FROM
                    emp_status AS es
                    
                LEFT JOIN (
                    SELECT
                        status_id
                        ,status_desc
                    FROM
                        ref_status AS rs
                    WHERE
                        1 = 1 
                        AND rs.is_active = TRUE
                ) AS rs
                ON es.status_id = rs.status_id
            
                WHERE
                    1 = 1
                    AND start_dt <= CAST(NOW() AS DATE)
                    AND end_dt > CAST(NOW() AS DATE)
            )AS es
            ON es.emp_id = e.emp_id
            
            LEFT JOIN (
                SELECT
                    emp_id
                    ,title_desc
                FROM
                    emp_title AS et
                    
                LEFT JOIN (
                    SELECT
                        rt.title_id
                        ,rt.title_desc
                    FROM
                        ref_title AS rt
                    WHERE
                        1 = 1 
                        AND rt.is_active = TRUE
                )AS rt
                ON rt.title_id = et.title_id
            
                WHERE
                    1 = 1
                    AND start_dt <= CAST(NOW() AS DATE)
                    AND end_dt > CAST(NOW() AS DATE)
            ) AS et
            ON et.emp_id = e.emp_id
            
            WHERE
                1 = 1
                AND es.status_desc = 'Active'
            ORDER BY
                FIELD(title_desc,'Admin') DESC, emp_name
		");

        $result = $query->result_array();
        return $result;
	}
}