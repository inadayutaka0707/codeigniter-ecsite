<?php
class Cart_service
{
	public function __construct()
	{
	}

	public function edit_array($array)
	{
		$order_items = [];
		$order_toppings = [];
		$order = array(
			'id' 					=> $array[0]['oId'],
			'user_id' 				=> $array[0]['oUserId'],
			'status'				=> $array[0]['oStatus'],
			'total_price'			=> $array[0]['oTotalPrice'],
			'order_date'			=> $array[0]['oOrderDate'],
			'destination_name'		=> $array[0]['oDestinationName'],
			'destination_email'		=> $array[0]['oDestinationEmail'],
			'destination_zipcode'	=> $array[0]['oDestinationZipcode'],
			'destination_address'	=> $array[0]['oDestinationAddress'],
			'destination_tel'		=> $array[0]['oDestinationTel'],
			'delivery_time'			=> $array[0]['oDeliveryTime'],
			'payment_method'		=> $array[0]['oPaymentMethod']
		);
		foreach ($array as $item) {
			$order_items[$item['oiId']] = array(
				'id' => $item['oiId'],
				'item_id' => $item['oiItemId'],
				'order_id' => $item['oiOrderId'],
				'quantity' => $item['oiQuantity'],
				'size' => $item['oiSize'],
				'item_name' => $item['iName'],
				'item_description' => $item['iDescription'],
				'item_price' => $item['oiSize'] === 'm' ? $item['iPriceM'] : $item['iPriceL'],
				'item_image_path' => $item['iImagePath'],
				'order_toppings' => []
			);
			$order_toppings[$item['otId']] = array(
				'id' => $item['otId'],
				'topping_id' => $item['otToppingId'],
				'order_item_id' => $item['otOrderItemId'],
				'topping_name' => $item['tName'],
				'topping_price' => $item['oiSize'] === 'm' ? $item['tPriceM'] : $item['tPriceL']
			);
		}

		foreach ($order_items as $item) {
			foreach ($order_toppings as $topping) {
				if ($item['id'] === $topping['order_item_id']) {
					$item['order_toppings'][$topping['id']] = array(
						$topping
					);
					$order_items[$item['id']] = $item;
				}
			}
		}
		$order['order_items'] = $order_items;
		return $order;
	}
}
