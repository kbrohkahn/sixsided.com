<h1><?php echo $title; ?></h1>
<br>
<table>
	<thead>
		<tr>
			<th>Era</th>
			<th>Type</th>
			<th>Scale</th>
		</tr>
	</thead>
	<tbody>


		<?php foreach ($sheets as $sheet_item): ?>

			<tr>
			<?php
				echo '<td>'.$sheet_item['era'].'</td>';
				echo '<td>'.$sheet_item['type'].'</td>';
				echo '<td>'.$sheet_item['scale'].'</td>';
			?>
			</tr>
		<?php endforeach;?>


	</tbody>
</table>