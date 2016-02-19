<h1><?php echo $title; ?></h1>

<?php foreach ($videos as $video_item): ?>

	<h3><?php echo $video_item['title']; ?></h3>
	<div class="main">
		<?php echo $video_item['text']; ?>
	</div>
	<p><a href="<?php echo site_url('videos/'.$video_item['slug']); ?>">View video</a></p>

<?php endforeach;?>
