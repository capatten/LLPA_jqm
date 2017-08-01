<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

class Mobile extends CI_Controller {
	public function __construct()
    {
            parent::__construct();
			/************************ LOAD LIBRARIES AND HELPERS ************************/
			$this->load->library('session');
           	$this->load->library('user_agent');
			$this->load->helper('url');

			/************************ HEAD ************************/
			$this->load->view('mobile/template/head');

			if($this->session->userdata("logged_in") == null){
			    $this->_getUserSessionVariables($userEmailAddress ='pattenchada@gmail.com');
			}

			/************************ NAVIGATION ************************/
			$this->load->view('mobile/template/navigation');
    }

	/************************************************ INDEX ************************************************/
	public function index(){
		/************************ MENU ************************/
		$this->load->model('Menu_Model');
		$menu['menuOptions']= $this->Menu_Model->get_menu_options( $param_menu_template = 1, $param_display_type = 1 );
		$menu['activePage'] = "Messages";
		$this->load->view('mobile/messages/menu', $menu);

		/************************ ADDITIONAL VIEWS ************************/
		$this->load->model('Messages_Model');
		$messages['userMessages']= $this->Messages_Model->get_user_messages( $param_emp_id = $_SESSION["department_id"] );
		//$this->load->view('mobile/folders/folders_list', $folders);

		$this->load->view('mobile/messages/messages', $messages);
	}

	/************************************************ ADDNEW MESSAGE ************************************************/
	public function addNew(){
		/************************ MENU ************************/
		$menu['activePage'] = "New Message";
		$menu['backPath'] = "Mobile/";
		$this->load->view('mobile/add_new_message/menu', $menu);

		/************************ NEW MESSAGE ************************/
		$newMessage['userID'] = "default";
		$newMessage['department'] = "Marketing";
		$this->load->view('mobile/add_new_message/create_new_message', $newMessage);

	}

	/************************************************ ADDNEW MESSAGE ************************************************/
	public function viewMessage(){
		/************************ MENU ************************/
		$menu['activePage'] = "View Message";
		$menu['backPath'] = "Mobile/";
		$this->load->view('mobile/add_new_message/menu', $menu);

		/************************ VIEW MESSAGE ************************/
		var_dump($_POST);
		$test['testData'] = $_POST;
		$this->load->view('mobile/messages/view_message', $test);

	}

	/************************************************ FOLDERS ************************************************/
	public function folders(){
		/************************ MENU ************************/
		$this->load->model('Menu_Model');
		$menu['menuOptions']= $this->Menu_Model->get_menu_options( $param_menu_template = 2, $param_display_type = 1 );
		$menu['activePage'] = "Folders";
		$menu['backPath'] = "Mobile/";
		$this->load->view('mobile/folders/menu', $menu);

		/************************ FOLDERS ************************/
		$this->load->model('Folders_Model');
		$folders['userFolders']= $this->Folders_Model->get_user_folders( $param_emp_id = 1 );
		$this->load->view('mobile/folders/folders_list', $folders);
	}

	/************************************************ PROFILE ************************************************/
	public function profile(){
		/************************ MENU ************************/
		$this->load->model('Menu_Model');
		$menu['menuOptions']= $this->Menu_Model->get_menu_options( $param_menu_template = 2, $param_display_type = 1 );
		$menu['activePage'] = "Profile";
		$menu['backPath'] = "Mobile/";
		$this->load->view('mobile/profile/menu', $menu);

		/************************ PROFILE ************************/
		$this->load->model('Profile_Model');
		$profile['profileData']= $this->Profile_Model->get_user_profile( $param_emp_id = $_SESSION['emp_id'] );
		$this->load->view('mobile/profile/profile', $profile);
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
