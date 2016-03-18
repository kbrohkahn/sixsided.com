<h1><?php echo $title; ?></h1>

<p><a class="btn btn-primary" href="/admin/create_sheet">Create a sheet item</a></p>

<table class="table-striped full-width">
	<thead>
		<tr>
			<th>Name</th>
			<th>Era</th>
			<th>Cost</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($sheets as $sheet_item): ?>
			<tr>
				<td><?php echo $sheet_item['title']; ?></td>
				<!-- <td><a href="<?php echo $sheet_item['link']; ?>"><?php echo $sheet_item['link'];?></a></td> -->
				<td class="right">
					<a class="btn btn-default" href="<?php echo site_url('sheets/'.$sheet_item['slug']); ?>">
						View
					</a>

					<a class="btn btn-default" href='/admin/edit_sheet/<?php echo $sheet_item['slug']; ?>'>
						Edit
					</a>
					<a class="btn btn-danger" href='/admin/delete_sheet/<?php echo $sheet_item['slug']; ?>'>
						Delete
					</a>
				</td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>