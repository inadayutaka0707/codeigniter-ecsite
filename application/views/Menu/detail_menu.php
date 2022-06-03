<div class="container">
	<div class="row justify-content-center">
		<div class="col-5 detail_menu_style_image">
			<?= img('images/' . $item['image_path']); ?>
		</div>
		<div class="col-5 d-flex align-items-center justify-content-center">
			<?= $item['description']; ?>
		</div>
	</div>
	<?= form_open('cart/insert') ?>
	<input type="hidden" name="id" value="<?= $item['id'] ?>">
	<div class="row justify-content-center">
		<div class="col-5 detail_menu_style_sizeM">
			<label for="size_m">Mサイズ:<?= $item["price_m"] ?>円</label>
			<input checked type="radio" id="size_m" name="size" value="m" onclick="insertPrice()">
			<input type="hidden" id="m_price" value="<?= $item['price_m'] ?>">
		</div>
		<div class="col-5 detail_menu_style_sizeL">
			<label for="size_l">Lサイズ:<?= $item["price_l"] ?>円</label>
			<input type="radio" id="size_l" name="size" value="l" onclick="insertPrice()">
			<input type="hidden" id="l_price" value="<?= $item['price_l'] ?>">
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-12">
			<div class="row">
				<?php foreach ($toppings as $topping) : ?>
					<div class="col-4">
						<label for="<?= $topping['id'] ?>"><?= $topping['name'] ?></label>
						<input type="checkbox" id="<?= $topping['id'] ?>" name="toppings[]" value="<?= $topping['id'] ?>" onchange="insertPrice()">
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-6 text-center">
			<b>合計金額:<span id="total_price"></span>円</b>
			<input type="hidden" name="total_price" id="hidden_total_price" value="">
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-3 text-center">
			<input type="submit" value="カートに追加">
		</div>
	</div>
	</form>
</div>

<script type="text/javascript" src="<?= base_url() ?>js/detail_menu.js">
</script>
