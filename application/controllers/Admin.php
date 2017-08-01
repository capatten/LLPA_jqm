<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->library('user_agent');
		$this->load->helper('url');
		/*$this->load->helper('url');

		$this->load->model('Movies_Model');

		$data['activePage'] = "Home";

		$this->load->view('templates/header', $data);

		$data['pageDataArray'] = array(
				'test' => 'First Test'
				,'test1' => 'Second Test'
		);

		//$data['Qresult'] = $this->db->query("select * from movies;");

		$test['allMovies']= $this->Movies_Model->get_all_movies();

		$this->load->view('movies/components/moviesList', $test );*/


		if ($this->agent->is_mobile())
		{
			redirect( '/Mobile/');
		}else{
			redirect( '/Desktop/');
		}
	}
}
