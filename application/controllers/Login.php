<?php
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->helper('url_helper');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('users/login');
		$this->load->view('template/footer');
	}
}
