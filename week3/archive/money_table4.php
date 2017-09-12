<?php 
	//PHP CODE SETS UP THE TABLE
	include 'transact.php';
	$transaction = new TransactionTable;
	$CSS = $transaction::CSS;
	

	echo <<<EOT
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Money Table</title>
		<style>
			$CSS
		</style>
	</head>

	<body>
EOT;

/*TABLE CREATION
THE FOLLOWING CODE CREATES A TABLE USING A FOREACH LOOP TO ITERATE THROUGH THE TRANSACTION LOG
AS THE FOREACH LOOP EXECUTES IT USES THE NESTED ARRAYS TO SET A KEY PAIR BETWEEN THE DESCRIPTION
OF THE TRANSACTION, AS WELL AS THE TRANSACTION AMOUNT. THE CURRENT BALANCE IS THEN SET TO THE RESULT
OF THE MAKETRANS FUNCTION
*/
	echo <<<EOT
	<table>
	<tr id="t_header">
		<th colspan="2">Lemon's Account Balance</th>
	</tr>
EOT;

	foreach ($transLog as $log) {
		$currentBalance = $transaction->makeTrans($log[0], $log[1], $currentBalance);	
	}
	$currentBalance = $transaction->frmtCurrency($currentBalance);
		echo <<<TABLE_END
		<tr id="available">
			<td class="label">Available Balance:</td>
		<td>$currentBalance</td>
	</tr>
	</table>
TABLE_END;

	echo <<<EOT
	</body>
	</html>
EOT;
?>

		
	