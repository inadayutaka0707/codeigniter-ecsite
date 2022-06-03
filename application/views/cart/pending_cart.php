<div>
	<?php
	if (count($items) === 0) {
		echo "<a href=" . site_url('') . " class='btn btn-primary'>商品一覧へ</a>";
	} else if (isset($_SESSION['user'])) {
		echo "<a href=" . site_url('confirmation') . " class='btn btn-primary'>注文確認</a>";
	} else {
		$_SESSION['url'] = site_url('confirmation');
		echo "<a href=" . site_url('user/login') . " class='btn btn-primary'>注文確認</a>";
	}
	?>
</div>
