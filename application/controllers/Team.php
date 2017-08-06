<?php
	defined('BASEPATH') OR exit('No direct script access allowed');


class Team extends CI_Controller {
	public function __construct()
    {
            parent::__construct();
			/************************ LOAD LIBRARIES AND HELPERS ************************/
			$this->load->library('session');
           	$this->load->library('user_agent');
			$this->load->helper('url');

			/************************ NAVIGATION ************************/
			if($this->session->userdata("logged_in") == null){
			    $this->_getUserSessionVariables($userEmailAddress ='pattenchada@gmail.com');
			}
    }

	/************************************************ INDEX ************************************************/
	public function index(){
		$data = [];

		/************************ MENU ************************/
		$menu['activePage'] = "Team";

		$data['menu'] = $menu;
		$data['menuPage'] ='menus/menu';

		/************************ CONTENT ************************/
		$this->load->model('Team_Model');
		$team['userTeam']= $this->Team_Model->get_user_team( $param_department_id = $_SESSION['department_id'] );

		$data['content'] = $team;
		$data['contentPage'] ='team/team_mobile';

		/************************ NAVIGATION ************************/
        $this->load->model('Messages_Model');
		$data['pending_message_count']= $this->Messages_Model->get_pending_message_count( $param_department = $_SESSION["department_id"], $param_message_status = 0 );
		$data['navigation'] = 'navigation/navigation_mobile';

		/***************************** LOAD PAGE *****************************/
		$this->load->view('layout/default_mobile',$data);
	}

	/**************************************************************** PRIVATE FUNCTIONS ****************************************************************/
	private function _getUserSessionVariables($userEmailAddress){
		$this->load->model('Users_Model');
		$user = $this->Users_Model->get_user_details( $param_email_address = $userEmailAddress );

		$userData = array(
			'logged_in' => TRUE
	        ,'emp_id' => $user[0]["emp_id"]
	        ,'email' => $userEmailAddress
	        ,'first_name' => $user[0]["first_name"]
	        ,'last_name' => $user[0]["last_name"]
	        ,'hire_date' => $user[0]["hire_dt"]
	        ,'department_id' => $user[0]["department_id"]
	        ,'department_desc' => $user[0]["department_desc"]
	        ,'title_id' => $user[0]["title_id"]
	        ,'title_desc' => $user[0]["title_desc"]
		);

		$this->session->set_userdata($userData);
	}
}
