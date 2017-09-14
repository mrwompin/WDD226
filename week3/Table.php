<?php 
	/**
	 * TO DO:
	 * - Make String Manip its own class
	 * - Comment functions
	 * - Learn Get/Set
	 * - DocBLock explaining script
	 * - Reformat output HTML to use returned strings from functions for better readability
	 * - Comment added test
	*/

	$trans = new Transaction;
	$strtBal = 55.75;
	$log = array(
		array("Purchase: Clothing", -40),
		array("ATM Deposit", 20),
		array("Check Number: 12345", -17.88),
		array("Purchase: Gas", -.55),
		array("ATM Deposit", 50)
		);
	$trans->MakeTable($strtBal,$log);
	
/**
	 * Class Transaction is used for creating a Transaction Log Table
	 * 
	 * The table is created using the public function MakeTable which requires two arguments, a starting balance ($strBal) and a multidimensional array that contains multiple transaction arrays, characterised as a description and cost. Transaction then plugs those into private variables which will have get/set functions added at a later release. Then through a series of private function calls and variable passing the html is printed with computed entries as well as a final available balance total.
	 * 
	*/
	class Transaction 
	{
		public $availBal;
		public $log; 

		public function MakeTable($strBal,$log) {
			$this->log = $log;
			$this->HtmlStart();
			$this->availBal = $this->LogEntry($strBal,$log);
			$this->HtmlEnd();
		}

		private function HtmlStart() {
			$myString = <<<EOT
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
EOT;
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
				font-size: 12pt;

			}

			
			#wrapper {
				width: 70%;
				padding: .75%;
				margin-left: auto;
				margin-right: auto;
				padding-bottom: 5%;
				border-radius: 2%;
				background-color: #E5F8F5;
				border: solid 20px #302D29;
				box-shadow: 5px 5px 2px #1E1D1D;
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
				margin-right: auto;
			}
			
			.blurb {
				width: 80%;
				margin-left: auto;
				margin-right: auto;

			}


			table {
				width: 70%;
				max-width: 600px;
				min-width: 305px;
				margin-left: auto;
				margin-right: auto;
				border: dashed black 1pt;
				padding: 1%;
				padding-left: 5%;

			}

			th {
				font-weight: normal;
				text-align: center;
				font-size: 1.5em;

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
				border-bottom: .5pt dashed black;
				
			}
			
			#available {
				text-align: right;
				font-size: 1.5em;

			}
			
			#available td {
			padding-top: 2.5%;
		}
			#available .label {
				text-align: left;
			}
		</style>
	</head>
	<body>
		<div id="wrapper">
			
		
EOT;
	echo $myString;
		}

	private function HtmlEnd() {
		echo <<<EOT
		</div>
	</body>
</html>
EOT;
	}
		
	private function LogEntry($bal,$log) {
		echo <<<EOT
<h2>Number Manipulation</h2>
		<table>
			<tr><th colspan="2">Joe's Account</th></tr>
EOT;
		
		foreach($log as $entry) { 
			$desc = $entry[0];
			$trans = $entry[1];
			$bal += $trans;
			$trans = $this->FormatCurrency($trans);

			echo <<<EOT
<tr class="transactions">
	<td class="description">$desc</td>
	<td class="charge">$trans</td>
</tr>
<tr class="balance">		
	<td colspan="2">$bal</td>
</tr>

EOT;
		}

		echo <<<EOT
<tr id="available">
					<td class="label">Available Balance:</td>
				<td>$bal</td>
			</tr>
		</table>
EOT;
		return $bal;
	}

	public function FormatCurrency($x){
		return sprintf("$%.2f", $x);
	}
}	
?>