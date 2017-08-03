<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {
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
		$menu['activePage'] = "Messages";

		$data['menu'] = $menu;
		$data['menuPage'] ='menus/menu';

		/************************ CONTENT ************************/
		$this->load->model('Messages_Model');
		$messages['userMessages']= $this->Messages_Model->get_dashboard_messages( $param_emp_id = $_SESSION["department_id"], $param_message_status = 1 );

		$data['content'] = $messages;
		$data['contentPage'] ='messages/messages_mobile';

		/************************ NAVIGATION ************************/
		$data['pending_message_count']= $this->Messages_Model->get_pending_message_count( $param_department = $_SESSION["department_id"], $param_message_status = 0 );
		$data['navigation'] = 'navigation/navigation_mobile';

		/***************************** LOAD PAGE *****************************/
		$this->load->view('layout/default_mobile',$data);
	}

	/************************************************ FULL MESSAGE ************************************************/
	public function Full_Message(){
		if(isset($_POST['selected_messageID'])){
			$this->session->set_userdata('selected_message', $_POST['selected_messageID']);
		}

		$data = [];
		/************************ MENU ************************/
		$menu['activePage'] = "View Message";

		$data['menu'] = $menu;
		$data['menuPage'] ='menus/menu';

		/************************ CONTENT ************************/
		$this->load->model('Messages_Model');
		$messages['messageDetails']= $this->Messages_Model->get_message_details( $param_message_id = $_SESSION["selected_message"] );


		$data['content'] = $messages['messageDetails'][0];
		$data['contentPage'] ='messages/full_message_mobile';

		/************************ NAVIGATION ************************/
		$data['pending_message_count']= $this->Messages_Model->get_pending_message_count( $param_department = $_SESSION["department_id"], $param_message_status = 0 );
		$data['navigation'] = 'navigation/navigation_mobile';

		/***************************** LOAD PAGE *****************************/
		$this->load->view('layout/default_mobile',$data);
	}

	/************************************************ INDEX ************************************************/
	public function Pending_Messages(){
		$data = [];

		/************************ MENU ************************/
		$menu['activePage'] = "Pending Messages";

		$data['menu'] = $menu;
		$data['menuPage'] ='menus/menu';

		/************************ CONTENT ************************/
		$this->load->model('Messages_Model');
		$messages['userMessages']= $this->Messages_Model->get_dashboard_messages( $param_emp_id = $_SESSION["department_id"], $param_message_status = 0 );

		$data['content'] = $messages;
		$data['contentPage'] ='messages/pending_messages_mobile';

		/************************ NAVIGATION ************************/
		$data['pending_message_count']= $this->Messages_Model->get_pending_message_count( $param_department = $_SESSION["department_id"], $param_message_status = 0 );
		$data['navigation'] = 'navigation/navigation_mobile';

		/***************************** LOAD PAGE *****************************/
		$this->load->view('layout/default_mobile',$data);
	}

	/************************************************ FULL PENDING MESSAGE ************************************************/
	public function Full_Pending_Message(){
		if(isset($_POST['selected_pending_messageID'])){
			$this->session->set_userdata('selected_message', $_POST['selected_pending_messageID']);
		}

		$data = [];
		/************************ MENU ************************/
		$menu['activePage'] = "View Pending Message";

		$data['menu'] = $menu;
		$data['menuPage'] ='menus/menu';

		/************************ CONTENT ************************/
		$this->load->model('Messages_Model');
		$messages['messageDetails']= $this->Messages_Model->get_message_details( $param_message_id = $_SESSION["selected_message"] );


		$data['content'] = $messages['messageDetails'][0];
		$data['contentPage'] ='messages/full_pending_message_mobile';

		/************************ NAVIGATION ************************/
		$data['pending_message_count']= $this->Messages_Model->get_pending_message_count( $param_department = $_SESSION["department_id"], $param_message_status = 0 );
		$data['navigation'] = 'navigation/navigation_mobile';

		/***************************** LOAD PAGE *****************************/
		$this->load->view('layout/default_mobile',$data);
	}

	/************************************************ NEW MESSAGE ************************************************/
	public function New_Message(){
		$data = [];
		/************************ MENU ************************/
		$menu['activePage'] = "New Message";

		$data['menu'] = $menu;
		$data['menuPage'] ='menus/menu';

		/************************ CONTENT ************************/
		$this->load->model('Messages_Model');
        $departments['departments']= $this->Messages_Model->get_all_departments();

		$data['departments'] = $departments;
		$data['contentPage'] ='messages/new_message_mobile';

		/************************ NAVIGATION ************************/
		$data['pending_message_count']= $this->Messages_Model->get_pending_message_count( $param_department = $_SESSION["department_id"], $param_message_status = 0 );
		$data['navigation'] = 'navigation/navigation_mobile';

		/***************************** LOAD PAGE *****************************/
		$this->load->view('layout/default_mobile',$data);
	}

    /************************************************ APPROVE MESSAGE ************************************************/
    public function Approve_Message(){
        $this->load->model('Messages_Model');
        $this->Messages_Model->update_message_status( $param_message_id = $_POST["message_id"], $param_message_status = "1" );
    }

    /************************************************ DECLINE MESSAGE ************************************************/
    public function Decline_Message(){
        $this->load->model('Messages_Model');
        $this->Messages_Model->update_message_status( $param_message_id = $_POST["message_id"], $param_message_status = "2" );
        $this->Messages_Model->insert_decline_explanation(
            $param_message_id = $_POST["message_id"]
            ,$param_decline_explanation = $_POST["decline_txt"]
        );
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
