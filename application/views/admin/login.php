<h1>Login</h1>

<?php echo form_open('admin/login'); ?>
	<div class="form-group">
		<label for="password">Enter password</label>
		<input type="password" class="form-control" name="password">
	</div>
	<button type="submit" name="submit" value="Login"class="btn btn-primary">Login</button>
</form>