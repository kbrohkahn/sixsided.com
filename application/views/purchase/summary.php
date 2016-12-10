<h1><?= $title ?></h1>

<div>


<?php
	$result = $data["result"];
	if ($result->success) {
		echo "Successful payment";
	} else {
		# false

		$result->transaction->status
		# "settlement_declined"

		$result->transaction->processorSettlementResponseCode
		# e.g. 4001

		$result->transaction->processorSettlementResponseText
		# e.g. "Settlement Declined"

	}
?>
	
</div>