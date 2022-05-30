<?php
class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('menu_model');
		$this->load->library('menu_service');
		$this->load->helper('url_helper');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->helper('html');
		$this->load->helper('form');
		$data['data'] = $this->menu_model->get_items();
		$items['items'] = $this->menu_service->items_array_edition($data['data']);
		$this->load->view('template/header');
		$this->load->view('menu/top_menu', $items);
		$this->load->view('template/footer');
	}

	public function detail()
	{
		$id = htmlspecialchars($this->input->post('id'), ENT_QUOTES, 'UTF-8');
		$this->load->helper('html');
		$this->load->helper('form');
		$data['item'] = $this->menu_model->get_detail_item($id);
		$data['toppings'] = $this->menu_model->get_toppings();
		$this->load->view('template/header');
		$this->load->view('menu/detail_menu', $data);
		$this->load->view('template/footer');
	}
}
