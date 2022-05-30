<?php
class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('menu_model');
		$this->load->helper('url_helper');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('menu/top_menu');
		$this->load->view('template/footer');
	}
}
