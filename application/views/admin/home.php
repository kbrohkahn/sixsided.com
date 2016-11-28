<h1><?php echo $title; ?></h1>

<p>
	<a class="btn btn-primary" href="/admin/create_sheet">Create a sheet item</a>
	<a class="btn btn-danger" href="/admin/recreate_database">Recreate database</a>
</p>

<br>

<table class="table-striped full-width">
	<thead>
		<tr>
			<th>Name</th>
			<th>Era</th>
			<th>Type</th>
			<th>Scale</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($sheets as $sheet_item): ?>
			<tr>
				<td><?php echo $sheet_item['name']; ?></td>
				<td><?php echo $sheet_item['era']; ?></td>
				<td><?php echo $sheet_item['type']; ?></td>
				<td><?php echo $sheet_item['scale']; ?></td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>