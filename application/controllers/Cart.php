<?php
class Cart extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('cart_model');
		$this->load->helper('url_helper');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('cart_service');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->helper('form');
		$this->load->helper('html');
		if (isset($_SESSION['user'])) {
			$user_id = (int)$_SESSION['user']['id'];
		} else if (isset($_SESSION['temporary'])) {
			$user_id = (int)$_SESSION['temporary'];
		} else {
			$user_id = 0;
		}
		$cart_items['items'] = $this->cart_model->get_items($user_id);
		if (count($cart_items['items']) !== 0) {
			$cart_items['cart_items'] = $this->cart_service->edit_array($cart_items['items']);
		}
		$this->load->view('template/header');
		$this->load->view('cart/shopping_cart', $cart_items);
		$this->load->view('cart/pending_cart', $cart_items);
		$this->load->view('template/footer');
	}

	public function insert()
	{
		$id = $this->input->post('id');
		$size = $this->input->post('size');
		$toppings = $this->input->post('toppings');
		$total_price = $this->input->post('total_price');
		if (isset($_SESSION['user'])) {
			$user_id = (int)$_SESSION['user']['id'];
		} else if (isset($_SESSION['temporary'])) {
			$user_id = (int)$_SESSION['temporary'];
		} else {
			$user_id = rand();
			$this->session->set_userdata('temporary', $user_id);
		}
		$data['order'] = $this->cart_model->get_items($user_id);
		if (count($data['order']) === 0) {
			$order_status = array(
				$user_id, 0, $total_price
			);
			$order_id = $this->cart_model->order_insert($order_status);
		} else {
			foreach ($data['order'] as $order) {
				$total_price = (int)$total_price + (int)$order['oTotalPrice'];
				$order_status = array(
					$order['oUserId'],
					$order['oStatus'],
					$total_price,
					$order['oOrderDate'],
					$order['oDestinationName'],
					$order['oDestinationEmail'],
					$order['oDestinationZipcode'],
					$order['oDestinationAddress'],
					$order['oDestinationTel'],
					$order['oDeliveryTime'],
					$order['oPaymentMethod'],
					$order['oId']
				);
				$this->cart_model->order_update($order_status);
				$order_id = $order['oId'];
			}
		}
		$order_item_status = array(
			$id, $order_id, 1, $size
		);
		$order_item_id = $this->cart_model->order_item_insert($order_item_status);
		foreach ($toppings as $topping) {
			$order_topping_status = array(
				$topping, $order_item_id
			);
			$this->cart_model->order_topping_insert($order_topping_status);
		}

		redirect(base_url() . "cart");
	}

	public function confirmation()
	{
		$user = $_SESSION['user'];
		echo "test";
	}
}
