<div class="top_menu_style">
	<?php foreach ($items as $item_group) : ?>
		<div class="container">
			<div class="row">
				<?php foreach ($item_group as $item) : ?>
					<div class="col-4 top_menu_style_grid">
						<a href='javascript:item<?= $item['id'] ?>.submit()'>
							<?= form_open('detail', 'name=item' . $item['id']) ?>
							<p><?= $item['name'] ?></p>
							<?= img('images/' . $item['image_path'], TRUE) ?>
							<p><?= $item['description'] ?></p>
							<input type="hidden" name="id" value="<?= $item['id'] ?>">
						</a>
						</form>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endforeach; ?>
</div>
