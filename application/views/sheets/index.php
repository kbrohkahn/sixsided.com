<h1><?php echo $title; ?></h1>

<?php foreach ($sheets as $sheet_item): ?>

	<h3><?php echo $sheet_item['title']; ?></h3>
	<div class="main">
		<?php echo $sheet_item['text']; ?>
	</div>
	<p><a href="<?php echo site_url('sheets/'.$sheet_item['slug']); ?>">View sheet</a></p>

<?php endforeach;?>
