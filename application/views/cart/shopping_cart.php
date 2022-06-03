<?php if (count($items) !== 0) { ?>
	<table>
		<tr>
			<th>商品</th>
			<th>サイズ</th>
			<th>トッピング</th>
			<th>値段</th>
		</tr>
		<?php foreach ($cart_items['order_items'] as $item) { ?>
			<tr>
				<td><?= img('images/' . $item['item_image_path']) ?></td>
				<td><?= $item['size'] ?></td>
				<td>
					<?php foreach ($item['order_toppings'] as $topping) { ?>
						<span><?= $topping[0]["topping_name"] ?></span><br>
					<?php }; ?>
				</td>
				<td>
					<?= $item['item_price'] + ($item['size'] === 'm' ? count($item['order_toppings']) * 200 : count($item['order_toppings']) * 300) ?>
				</td>
			</tr>
		<?php }; ?>
	</table>
<?php }; ?>
