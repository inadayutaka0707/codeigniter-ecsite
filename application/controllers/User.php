<?php
class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('url_helper');
		$this->load->library('form_validation');
		$this->load->helper(array('html', 'form'));
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('users/login');
		$this->load->view('template/footer');
	}

	public function login()
	{
		$email = htmlspecialchars($this->input->post('email'), ENT_QUOTES, 'UTF-8');
		$password = htmlspecialchars($this->input->post('password'), ENT_QUOTES, 'UTF-8');
		$user = $this->user_model->login($email, $password);
		if ($user != NULL) {
			$this->session->set_userdata('user', $user);
			redirect(base_url());
		} else {
			$this->load->view('template/header');
			$this->load->view('users/login');
			$this->load->view('template/footer');
		}
	}

	public function logout()
	{
		unset($_SESSION['user']);
		$this->load->view('template/header');
		$this->load->view('users/login');
		$this->load->view('template/footer');
	}

	public function register()
	{
		$this->load->view('template/header');
		$this->load->view('users/register');
		$this->load->view('template/footer');
	}

	public function insert()
	{
		$this->form_validation->set_rules('name', '名前', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'email', 'required|min_length[4]');
		$this->form_validation->set_rules('zipcode', 'zipcode', 'required|numeric|exact_length[7]');
		$this->form_validation->set_rules('telephone', 'telephone', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header');
			$this->load->view('users/register');
			$this->load->view('template/footer');
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$zipcode = $this->input->post('zipcode');
			$address = $this->input->post('address');
			$telephone = $this->input->post('telephone');
			$input_array = array(
				$name, $email, $password, $zipcode, $address, $telephone
			);
			$this->user_model->insert_user($input_array);
			$this->session->set_userdata('user', $input_array);
			if (isset($_SESSION['url'])) {
				redirect($_SESSION['url']);
			} else {
				redirect(base_url());
			}
		}
	}
}
