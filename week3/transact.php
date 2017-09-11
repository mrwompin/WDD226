<?php 

class TransactionTable {
	
	static $crntAmnt;
 const CSS = <<<STYLESHEET
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
STYLESHEET;

	public function makeTrans($desc, $trns, $crnt) {
		//Function 
		$trnsDesc = $desc;
		$trnsAmnt = $this->frmtCurrency($trns);
		$trnsAdded =  $crnt + $trns;
		$trnsResult = $this->frmtCurrency($trnsAdded);
		self::$crntAmnt = $trnsAdded;
		echo <<<EOT
<tr class="transactions">
			<td class="description">$trnsDesc</td>
			<td class="charge">$trnsAmnt</td>
		</tr>
		<tr class="balance">		
			<td colspan="2">$trnsResult</td>
		</tr>
EOT;
		return self::$crntAmnt;
	}	

	public function frmtCurrency($x) {
		return sprintf("$%.2f", $x);
}

}



?>