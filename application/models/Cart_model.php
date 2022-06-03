<?php
class Cart_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_items($user_id)
	{
		$sql = "SELECT ";
		$sql .= "o.id as oId, o.user_id as oUserId, o.status as oStatus, o.total_price as oTotalPrice, o.order_date as oOrderDate, o.destination_name as oDestinationName, o.destination_email as oDestinationEmail, o.destination_zipcode as oDestinationZipcode, o.destination_address as oDestinationAddress, o.destination_tel as oDestinationTel, o.delivery_time as oDeliveryTime, o.payment_method as oPaymentMethod, ";
		$sql .= "oi.id as oiId, oi.item_id as oiItemId, oi.order_id as oiOrderId, oi.quantity as oiQuantity, oi.size as oiSize, ";
		$sql .= "ot.id as otId, ot.topping_id as otToppingId, ot.order_item_id as otOrderItemId, ";
		$sql .= "i.id as iId, i.name as iName, i.description as iDescription, i.price_m as iPriceM, i.price_l as iPriceL, i.image_path as iImagePath, ";
		$sql .= "t.id as tId, t.name as tName, t.price_m as tPriceM, t.price_l as tPriceL, ";
		$sql .= "u.id as uId, u.name as uName, u.email as uEmail, u.password as uPassword, u.zipcode as uZipcode, u.address as uAddress, u.telephone as uTelephone ";
		$sql .= "FROM orders as o ";
		$sql .= "LEFT OUTER JOIN order_items as oi ON o.id = oi.order_id ";
		$sql .= "LEFT OUTER JOIN order_toppings as ot ON oi.id = ot.order_item_id ";
		$sql .= "LEFT OUTER JOIN items as i ON oi.item_id = i.id ";
		$sql .= "LEFT OUTER JOIN toppings as t ON ot.topping_id = t.id ";
		$sql .= "LEFT OUTER JOIN users as u ON o.user_id = u.id ";
		$sql .= "WHERE o.user_id = ? ";
		$sql .= "AND o.status = ? ";
		$sql .= "ORDER BY oi.id ASC;";

		$array = array(
			$user_id,
			0
		);
		$result = $this->db->query($sql, $array);

		return $result->result_array();
	}

	public function order_insert($order_status)
	{
		$sql = "INSERT INTO orders(user_id,status,total_price) VALUES(?,?,?);";
		$this->db->query($sql, $order_status);
		$order_id = $this->db->insert_id();
		return $order_id;
	}

	public function order_item_insert($order_item_status)
	{
		$sql = "INSERT INTO order_items(item_id,order_id,quantity,size) VALUES(?,?,?,?);";
		$this->db->query($sql, $order_item_status);
		$order_item_id = $this->db->insert_id();
		return $order_item_id;
	}

	public function order_topping_insert($order_topping_status)
	{
		$sql = "INSERT INTO order_toppings(topping_id,order_item_id) VALUES(?,?);";
		$this->db->query($sql, $order_topping_status);
	}

	public function order_update($order_status)
	{
		$sql = "UPDATE orders SET user_id=?,status=?,total_price=?,order_date=?,destination_name=?,destination_email=?,destination_zipcode=?,destination_address=?,destination_tel=?,delivery_time=?,payment_method=? WHERE id=?;";
		$this->db->query($sql, $order_status);
	}
}
