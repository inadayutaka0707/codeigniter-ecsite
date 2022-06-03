<?= form_open('insert', 'class=register_style_form') ?>
<div class="form-group register_style_input">
	<label for="name">Name</label><?= form_error('name'); ?>
	<input type="name" class="form-control" name="name" id="name" aria-describedby="nameHelp" placeholder="Name" value="<?= set_value('name'); ?>">
</div>
<div class="form-group register_style_input">
	<label for="email">Email address</label><?= form_error('email'); ?>
	<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?= set_value('email'); ?>">
</div>
<div class="form-group register_style_input">
	<label for="password">Password</label><?= form_error('password'); ?>
	<input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?= set_value('password'); ?>">
</div>
<div class="form-group register_style_input">
	<label for="zipcode">Zipcode</label>&nbsp;<input type="button" value="search address" class="btn btn-primary" onclick="searchAddress()"><?= form_error('zipcode'); ?>
	<input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="zipcode" value="<?= set_value('zipcode'); ?>">
</div>
<div class="form-group register_style_input">
	<label for="address">Address</label><?= form_error('address'); ?>
	<input type="text" class="form-control" name="address" id="address" placeholder="address" value="<?= set_value('address'); ?>">
</div>
<div class="form-group register_style_input">
	<label for="telephone">Telephone</label><?= form_error('telephone'); ?>
	<input type="text" class="form-control" name="telephone" id="telephone" placeholder="telephone" value="<?= set_value('telephone'); ?>">
</div>
<div class="register_style_button">
	<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>

<script type="text/javascript" src="<?= base_url() ?>js/search_address.js"></script>
