<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desktop extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');

		$this->load->view('desktop/layouts/header');

		$this->load->view('desktop/components/top');

		$this->load->view('desktop/components/left');

		$this->load->view('desktop/components/right');
	}
}
