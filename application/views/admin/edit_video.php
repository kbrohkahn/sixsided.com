<h1><?php echo $title; ?></h1>

<?php echo validation_errors(); ?>

<?php echo form_open('admin/edit_video/'.$video_item['slug']); ?>
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" class="form-control" name="title" required value="<?php echo $video_item['title']?>">
	</div>
	<div class="form-group">
		<label for="link">Link</label>
		<input type="text" class="form-control" name="link" required value="<?php echo $video_item['link']?>">
	</div>
	<div class="form-group">
		<label for="text">Summary</label>
		<textarea type="text" class="form-control" name="text" required ><?php echo $video_item['text']?></textarea>
	</div>

	<button type="submit" name="submit" value="Save video item"class="btn btn-primary">Save</button>
</form>
