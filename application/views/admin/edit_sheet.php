<h1><?php echo $title; ?></h1>

<?php echo validation_errors(); ?>

<?php echo form_open('admin/edit_sheet/'.$sheet_item['slug']); ?>
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" class="form-control" name="title" required value="<?php echo $sheet_item['title']?>">
	</div>
	<div class="form-group">
		<label for="link">Link</label>
		<input type="text" class="form-control" name="link" required value="<?php echo $sheet_item['link']?>">
	</div>
	<div class="form-group">
		<label for="text">Summary</label>
		<textarea type="text" class="form-control" name="text" required ><?php echo $sheet_item['text']?></textarea>
	</div>

	<button type="submit" name="submit" value="Save sheet item"class="btn btn-primary">Save</button>
</form>
