<?php

	/*Transaction
	This class is designed to house data for a table row class called a transaction
	the transaction requires 3 arguments, a description of the transaction, '$description' as well as a charge, '$charge'
	*/


class transaction 
{

	public $currentBalance

	$css = <<<STYLESHEET
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
		</style>\n
STYLESHEET;

	public function makeEntry($a,$b,$c) {
		$description = $a;
		$charge = sprintf("$%.2f",$b);
		$balance = sprintf("$%.2f", $c + $b);

		
		$entry = <<<EOT
<tr class="transactions">
			<td class="description">$description</td>
			<td class="charge">$charge</td>
		</tr>
		<tr class="balance">		
			<td colspan="2">$balance</td>
		</tr>\n\n
EOT;
//echo $balance;
echo $entry;
return $charge;
	}
}

/*USED FOR TESTING
$obj1 = new transaction();

echo "<table>\n" . $obj1->makeHtml("dog",-10,50) . "\n

</table>";
*/
?>	
	