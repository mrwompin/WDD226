<?php 
	$currentBalance = 55.75;	
	$trnsLog = array(
		array("Purchase: Clothing", -40),
		array("ATM Deposit", 20),
		array("Check Number: 12345", -17.88),
		array("Purchase: Gas", -.55),
		array("ATM Deposit", 35)
	);

	function makeTrans($desc, $amnt, $crnt) {
	//Function creates transaction logs to add to table
		$trnsDesc = $desc;
		$trnsAmnt = $amnt;
		$trnsCrnt = $crnt; 
		$trnsRslt = $crnt + $amnt;

		foreach ($trnsLog as $log) {
			echo <<<ENTRY
<tr class="transactions">
	<td class="description">$trnsDesc</td>
	<td class="charge">$trnsAmnt</td>
</tr>
<tr class="balance">		
	<td colspan="2">$trnsRslt</td>
</tr>
ENTRY;
			$trnsCrnt = $trnsRslt; 
		}
	}


echo <<<MYHTML
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
	<h1>String and Number Manipulation</h1>
	<h2>String Manipulation</h2>
	<h2>Number Manipulation</h2>
	<table>
		<th>Joe's Account</th>
		{makeTrans}
	</table>

	</body>
</html>
MYHTML;
?>