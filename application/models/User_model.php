<?php
class User_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function login($email, $password)
	{
		$sql = "SELECT id,name,email,password,zipcode,address,telephone FROM users WHERE email=? AND password=?;";
		$array = array(
			$email,
			$password
		);
		$result = $this->db->query($sql, $array);
		return $result->row_array();
	}

	public function insert_user($input_array)
	{
		$sql = "INSERT INTO users(name,email,password,zipcode,address,telephone) VALUES(?,?,?,?,?,?);";
		$result = $this->db->query($sql, $input_array);
		var_dump($result);
	}
}
