<?php
class Menu_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_items()
	{
		$sql = 'SELECT id,name,description,price_m,price_l,image_path FROM items;';
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function get_detail_item($id)
	{
		$sql = 'SELECT id,name,description,price_m,price_l,image_path FROM items WHERE id=?;';
		$result = $this->db->query($sql, $id);
		return $result->row_array();
	}

	public function get_toppings()
	{
		$sql = 'SELECT id,name,price_m,price_l FROM toppings;';
		$result = $this->db->query($sql);
		return $result->result_array();
	}
}
