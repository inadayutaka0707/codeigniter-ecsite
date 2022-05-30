<?php
class Menu_service
{
	public function __construct()
	{
	}

	public function items_array_edition($data)
	{
		$array_items = [];
		for ($i = 1; $i <= count($data); $i++) {
			$array_item[] = $data[$i - 1];
			if ($i % 3 === 0) {
				$array_items[] = $array_item;
				$array_item = [];
			}
		}
		if (count($data) % 3 === 1 || count($data) % 3 === 2) {
			$array_items[] = $array_item;
		}
		return $array_items;
	}
}
