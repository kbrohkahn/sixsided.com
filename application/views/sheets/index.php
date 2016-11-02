<h1><?php echo $title; ?></h1>
<form class="form-inline sheet-search">
	<div class="form-group">
		

		<select class="form-control" id="sheet-scale-select">
			<option value=''>All</option>
			
			<?php foreach ($scales as $scale): ?>
				<option><?= $scale['scale'] ?></option>
			<?php endforeach; ?>

		</select>

		<select class="form-control" id="sheet-era-select" onchange="searchSelectChanged()">
			<option value=''>All</option>
			
			<?php foreach ($eras as $era): ?>
				<option value="<?= $era['eraNameKey'] ?>"><?= $era['era'] ?></option>
			<?php endforeach; ?>
			
		</select>

		<?php foreach ($eras as $era): ?>
			<select class="form-control sheet-type-select" id="<?= $era['eraNameKey'] ?>">
				<option value="">All</option>

				<?php foreach ($era['types'] as $type): ?>
					<option><?= $type['type'] ?></option>
				<?php endforeach; ?>

			</select>
		<?php endforeach; ?>

	</div>
	<!-- <button type="submit" class="btn btn-primary">Transfer cash</button> -->
</form>

<table class="table table-striped sortable">
	<thead>
		<tr>
			<th>Era</th>
			<th>Type</th>
			<th>Year</th>
			<th>Scale</th>
		</tr>
	</thead>
	<tbody>

		<?php foreach ($sheets as $sheet_item): ?>
			<tr>
				<td><?= $sheet_item['era'] ?></td>
				<td><?= $sheet_item['type'] ?></td>
				<td><?= $sheet_item['year'] ?></td>
				<td><?= $sheet_item['scale'] ?></td>
			</tr>
		<?php endforeach; ?>

	</tbody>
</table>
