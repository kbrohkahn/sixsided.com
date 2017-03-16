<h1><?php echo $title; ?></h1>

<?php
$attributes = array('class' => 'form-horizontal sheet-search', 'id' => 'form-sheet-search');
echo form_open('sheets/search', $attributes);
?>



	<!-- scale select -->
	
	<div class="row">
		<div class="col-xs-12">
			<div class="col-xs-12 col-sm-4">
				<div class="form-group">
					<label for="sheet-scale-select" class="control-label">Scale</label>
					<select id="sheet-scale-select" class="form-control" name="scale">
						<option>All</option>
						<?php foreach ($scales as $scale): ?>
							<option <?php echo $scaleValue == $scale['scale'] ? " selected" : "" ?>><?= $scale['scale'] ?>mm</option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-2">
			<div class="col-xs-12">
				<!-- century select -->
				<div class="form-group">
					<label for="sheet-century-select" class="control-label">Century</label>
					<select id="sheet-century-select" class="form-control" name="century">
						<option>All</option>
						<?php foreach ($centuries as $century): ?>
							<option <?php echo $centuryValue == $century ? " selected" : "" ?>><?= $century == CENTURY_MINIMUM ? "Pre-".CENTURY_MINIMUM : $century?>th</option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-12">
				<!-- era select -->
				<input type="hidden" name="era" id="sheet-era-input" value="<?= $eraValue ?>" />
				<div class="form-group">
					<label for="sheet-era-select" class="control-label">Group</label>
					<select id="sheet-era-select" class="form-control" onchange="sheetEraSelectChanged()">
						<option>All</option>
						
						<?php foreach ($eras as $era): ?>
							<option value="<?= $era['eraNameKey'] ?>" <?php echo $eraValue == $era['era'] ? " selected" : "" ?> ><?= $era['era'] ?></option>
						<?php endforeach; ?>
						
					</select>
				</div>
			</div>
		</div>


		<div class="col-xs-12 col-sm-4">
			<div class="col-xs-12">
				<!-- type select -->
				<input type="hidden" name="type" id="sheet-type-input" value="<?= $typeValue ?>" />
				<div class="form-group">
					<label for="default-type-select" class="control-label">Type</label>
					<select id="default-type-select" class="form-control sheet-type-select" disabled="disabled"
							<?php echo $eraValue == "All" ? "style='display: inline-block;'" : "" ?> >
						<option>Select a group first</option>
					</select>

					<?php foreach ($eras as $era): ?>

						<select class="form-control sheet-type-select" id="<?= $era['eraNameKey'] ?>" onchange="sheetTypeSelectChanged(this)" 
								<?php echo $eraValue == $era['era'] ? " style='display: inline-block;'" : ""?> >
							<option>All</option>

							<?php foreach ($era['types'] as $type): ?>
								<option <?php echo $eraValue == $era['era'] && $typeValue == $type['type'] ? " selected" : "" ?>><?= $type['type'] ?></option>
							<?php endforeach; ?>

						</select>
					<?php endforeach; ?>

				</div>
			</div>

		</div>
	</div>

	




	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary">Search</button>
			<button type="button" class="btn btn-warning" onclick="resetSearch()">Reset</button>
		</div>
	</div>
</form>

<table class="table table-striped sortable">
	<thead>
		<tr>
			<th>Sheet</th>
			<th>Year</th>
			<th>Group</th>
			<th>Type</th>
			<th>Scale (mm)</th>
		</tr>
	</thead>
	<tbody>

		<?php foreach ($sheets as $sheet_item): ?>
			<tr>
				<td><?= $sheet_item['name'] ?></td>
				<td><?= $sheet_item['year'] == 0 ? "Unknown" : $sheet_item['year'] ?></td>
				<td><?= $sheet_item['era'] ?></td>
				<td><?= $sheet_item['type'] ?></td>
				<td><?= $sheet_item['scale'] ?></td>
			</tr>
		<?php endforeach; ?>

	</tbody>
</table>
