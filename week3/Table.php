<?php 
	$trans = new Transaction;
	$trans->log = array(
		array("Purchase: Clothing", -40),
		array("ATM Deposit", 20),
		array("Check Number: 12345", -17.88),
		array("Purchase: Gas", -.55)
		);
	$trans->MakeTable(55.75);
	/**
	 * Class Transaction is used for managing the Money Table
	 * 
	 * The class conatins 2 public variables $balance and $log
	 * $balance holds the how much money is available as the the transactions are added
	 * $log is an array that holds the Transaction log
	 * In addition there are 2 public function and 3 private functions
	 * 

	*/	
	class Transaction 
	{
		public  $log = array();
		
		public function MakeTable($startAmount) {
			$this->HtmlStart();
			$this->LogEntry($startAmount);
			$this->HtmlEnd();
		}

		private function HtmlStart() {
			echo <<<EOT
			<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Manipulation</title>
		<style>
			html {
				margin: 0;
				padding: 0;
			}
			body {
				background-color:#695942;
				width: 100%;
				max-width: 800px;
				margin-left: auto;
				margin-right: auto;
			}

			
			#wrapper {
				Width: 70%;
				padding: .75%;
				margin-left: auto;
				margin-right: auto;
				padding-bottom: 5%;
				border-radius: 2%;
				background-color: #FFFFFF;
			}
			h2 {
				margin:0;
				margin-left: 5%;
				margin-top: 5%;
				margin-bottom: 2.5%;
			}
			p {
				margin: 0;
			}
		
			#stringmanip {
				width: 65%;
				margin-left: auto;
				Margin-right: auto;
			}
			
			.blurb {
				width: 80%;
				margin-left: auto;
				margin-right: auto;

			}


			table {
				width: 60%;
				max-width: 500px;
				min-width: 305px;
				margin-left: auto;
				margin-right: auto;

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
		<div id="wrapper">
			<div class="stringmanip">
			<h2>String Manipulation</h2>
				<p class="blurb">
					My children were pretending they work at the bank. My daughter said, Pay
					up Mr. O'Doyle, or we will take all of your stuff, even your Mom's shoes.
					my son said How much money do I owe you? to which my daughter replied
					$1,000,000.52. I have told you many times that interest was building up. You
					always said 'I know, but I have to pay for my Mom's shoes first.' but now
					you must pay me or face the consequences.
				</p> 
				<p class=blurb>
					My son replied Sigh...women are always taking my money.
				</p>
			</div>
		
EOT;
		}

	private function HtmlEnd() {
		echo <<<EOT
		</div>
	</body>
</html>
EOT;
	}

	
/**
 * Creates a table for Log Entries
 * 
 * This function is designed to create a table with dynamically added rows called entries. 
 * It acomplishes this by receiving the reference point for current balance.
 * from there it iterates through the array calle $log that contains all the transactions and creates an entry for them.
 * when the function finishes the value of balance will be the same as the ending balance in the function.
 * 
*/		
	private function LogEntry($balance) {
		echo <<<EOT
<h2>Number Manipulation</h2>
		<table>
			<th>Joe's Account</th>
EOT;
		
		foreach($this->log as $entry) {
			$desc = $entry[0];
			$trans = $entry[1];
			$balance += $trans;
			$trans = $this->FormatCurrency($trans);

			echo <<<EOT
<tr class="transactions">
	<td class="description">$desc</td>
	<td class="charge">$trans</td>
</tr>
<tr class="balance">		
	<td colspan="2">$balance</td>
</tr>

EOT;
		}
		echo <<<EOT
<tr id="available">
					<td class="label">Available Balance:</td>
				<td>$balance</td>
			</tr>
		</table>
EOT;
	}

	public function FormatCurrency($x){
		return sprintf("$%.2f", $x);
	}
}
	
?>