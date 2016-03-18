<h1><?php echo $title; ?></h1>

<p><?php echo anchor('/admin', 'Back to admin home');?></p>

<?php echo validation_errors(); ?>

<?php echo form_open('admin/create_sheet'); ?>
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" class="form-control" name="title" required placeholder="Video title">
	</div>
	<div class="form-group">
		<label for="link">Link</label>
		<input type="text" class="form-control" name="link" required placeholder="https://player.vimeo.com/sheet/9153533">
	</div>
	<div class="form-group">
		<label for="text">Summary</label>
		<textarea type="text" class="form-control" name="text" required placeholder="Enter summary for sheet"></textarea>
	</div>

	<button type="submit" name="submit" value="Create a sheet item" class="btn btn-primary">Submit</button>
</form>
