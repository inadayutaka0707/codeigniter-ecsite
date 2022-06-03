<?php
if (isset($_SESSION['url'])) {
	echo form_open($_SESSION['url'],  'class=login_style_form');
	unset($_SESSION['url']);
} else {
	echo form_open('login', 'class=login_style_form');
}
?>
<div class="form-group login_style_input">
	<label for="email">Email address</label>
	<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
</div>
<div class="form-group login_style_input">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="password" id="password" placeholder="Password">
</div>
<div class="login_style_button">
	<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
<div class="login_style_register">
	<a href=<?= site_url('user/register') ?>>register</a>
</div>
