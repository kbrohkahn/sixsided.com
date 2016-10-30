<form class="form-inline">
	<div class="form-group">
		<label class="sr-only" for="exampleInputAmount">Select an era, then an era sub-type, then a scale.</label>
		<select class="form-control" id="sheet-era-select">
			<option value=''>All</option>
			<?php foreach ($eras as $era):
				echo '<option id='.$era['eraNameKey'].'>'.$era['era'].'</option';
			?>
		</select>

		<?php foreach ($eras as $era):
			$key = $era['eraNameKey'];

			echo '<select class="form-control sheet-type-select" id="'.$key.'-select">'
				.'<option value=''>All</option>';

			foreach ($data[$key] as $type):
				echo '<option>'.$type['type'].'</option>';
			echo '</select>';
		?>
		<select class="form-control" id="sheet-scale-select">
			<option value=''>All</option>
			<?php foreach ($scales as $scale):
				echo '<option>'.$scale['scale'].'</option';
			?>
		</select>

	</div>
	<button type="submit" class="btn btn-primary">Transfer cash</button>
</form>

<table>
	<thead>
		<tr>
			<!-- <th>Name</th> -->
			<th>Era</th>
			<th>Era type</th>
			<th>Scale</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($sheets as $sheet_item):
			echo '<tr>'
				// .'<td>'.$sheet_item['name'].'</td>';
				.'<td>'.$sheet_item['era'].'</td>';
				.'<td>'.$sheet_item['type'].'</td>';
				.'<td>'.$sheet_item['scale'].'</td>';
				.'</tr>';
		?>
	</tbody>
</table>
</tr>
