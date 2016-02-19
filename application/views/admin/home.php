<h1><?php echo $title; ?></h1>

<p><a class="btn btn-primary" href="/admin/create_video">Create a video item</a></p>

<table class="table-striped full-width">
	<thead>
		<tr>
			<th>Title</th>
			<!-- <th>Link</th> -->
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($videos as $video_item): ?>
			<tr>
				<td><?php echo $video_item['title']; ?></td>
				<!-- <td><a href="<?php echo $video_item['link']; ?>"><?php echo $video_item['link'];?></a></td> -->
				<td class="right">
					<a class="btn btn-default" href="<?php echo site_url('videos/'.$video_item['slug']); ?>">
						View
					</a>

					<a class="btn btn-default" href='/admin/edit_video/<?php echo $video_item['slug']; ?>'>
						Edit
					</a>
					<a class="btn btn-danger" href='/admin/delete_video/<?php echo $video_item['slug']; ?>'>
						Delete
					</a>
				</td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>