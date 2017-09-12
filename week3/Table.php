<?php 
	$trans = new Transaction;
	$available = $trans->available = 55.75;
	$trans->HtmlStart();
	$balance = $trans->LogEntry($available);
	$trans->HtmlEnd($balance);

	class Transaction {
		public $available;
		static  $log = array(
		array("Purchase: Clothing", -40),
		array("ATM Deposit", 20),
		array("Check Number: 12345", -17.88),
		array("Purchase: Gas", -.55)
	);

		public function HtmlStart() {
			echo <<<EOT
			<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Manipulation</title>
		<style>
			table {
					width: 600px;
				}

				#t_header {
					font-weight: bold;
					text-align: center;
				}

				.transactions {
					background-color: ;
					width: 100%;

				}

				.description {
					width: 60%;
				}

				.charge {
					font-size: .75em;
					width: 40%;
					text-align: right;
				}

				tr.balance td{
					text-align: right;
					border-bottom: 1pt solid black;
					
				}
				
				#available {
					text-align: right;
					font-size: 1.5em;
				}

				#available .label {
					text-align: left;
				}
		</style>
	</head>
	<body>
		
EOT;
		}

	Public function HtmlEnd($x) {
		echo <<<EOT
	</body>
</html>
EOT;
	}

	public function LogEntry($x) {
		/** Creates a table for Log Entries

		*	This function is designed to create a table with dynamically added rows called entries. 
		*	It acomplishes this by receiving as an argument the starting value of the account.
		*	from there it iterates through the array calle $log that contains all the transactions and creates an entry for them.

		*/
		echo <<<EOT
<h2>Number Manipulation</h2>
		<table>
			<th>Joe's Account</th>
EOT;
		
		foreach(self::$log as $entry) {
			$desc = $entry[0];
			$trans = $entry[1];
			$x += $trans;
			$trans = $this->FormatCurrency($trans);

			echo <<<EOT
<tr class="transactions">
	<td class="description">$desc</td>
	<td class="charge">$trans</td>
</tr>
<tr class="balance">		
	<td colspan="2">$x</td>
</tr>

EOT;
		}
		echo <<<EOT
<tr id="available">
					<td class="label">Available Balance:</td>
				<td>$x</td>
			</tr>
		</table>
EOT;
		return $x ;
	}

	public function FormatCurrency($x){
		return sprintf("$%.2f", $x);
	}
}
	
?>