<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?= link_tag('css/bootstrap.min.css') ?>
	<?= link_tag('css/style.css') ?>
	<title>Document</title>
</head>

<body>
	<div>
	</div>
	<nav class="navbar navbar-light bg-light justify-content-between">
		<a class="navbar-brand" href="<?= site_url("menu") ?>"><?= img('images/header_logo.png') ?></a>
		<a href="<?= site_url("cart") ?>">shopping cart</a>
		<?php if (isset($_SESSION['user'])) {
			echo "<a href=" . site_url("user/logout") . ">logout</a>";
		} else {
			echo "<a href=" . site_url("user/login") . ">login</a>";
		}
		?>
	</nav>
