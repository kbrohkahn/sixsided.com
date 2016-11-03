<h1><?php echo $title; ?></h1>
<form method="post" class="form-horizontal sheet-search" action="/sheets/">
	<!-- scale select -->
<!-- 	<div class="form-group">
		<label for="sheet-scale-select" class="col-sm-2 control-label">Scale</label>
		<div class="col-xs-12 col-sm-3">

			<select class="form-control" id="sheet-scale-select">
				<option value=''>All</option>
				
				<?php foreach ($scales as $scale): ?>
					<option><?= $scale['scale'] ?></option>
				<?php endforeach; ?>

			</select>

		</div>
	</div> -->

	<!-- year select -->
	<div class="form-group">
		<label for="sheet-scale-select" class="col-sm-2 control-label">Year</label>
		<div class="col-xs-12 col-sm-3">

			<select class="form-control" id="sheet-year-select">
				<option value=''>All</option>
				
				<?php foreach ($years as $year): ?>
					<option><?= $year['year'] ?></option>
				<?php endforeach; ?>

			</select>

		</div>
	</div>

	<!-- era select -->
	<div class="form-group">
		<label for="sheet-scale-select" class="col-sm-2 control-label">Group</label>
		<div class="col-sm-10">

			<select class="form-control" id="sheet-era-select" onchange="searchSelectChanged()">
				<option value=''>All</option>
				
				<?php foreach ($eras as $era): ?>
					<option value="<?= $era['eraNameKey'] ?>"><?= $era['era'] ?></option>
				<?php endforeach; ?>
				
			</select>

		</div>
	</div>

	<!-- type select -->
	<div class="form-group">
		<label for="sheet-scale-select" class="col-sm-2 control-label">Type</label>
		<div class="col-sm-10">
			<select class="form-control sheet-type-select" disabled="disabled" id="default-type-select">
				<option>Select a group first</option>
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
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Search</button>
		</div>
	</div>
</form>

<table class="table table-striped sortable">
	<thead>
		<tr>
			<th>Year</th>
			<th>Group</th>
			<th>Type</th>
			<th>Scale (mm)</th>
		</tr>
	</thead>
	<tbody>

		<?php foreach ($sheets as $sheet_item): ?>
			<tr>
				<td><?= $sheet_item['year'] ?></td>
				<td><?= $sheet_item['era'] ?></td>
				<td><?= $sheet_item['type'] ?></td>
				<td><?= $sheet_item['scale'] ?></td>
			</tr>
		<?php endforeach; ?>

	</tbody>
</table>
