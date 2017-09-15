<?php 
/**
 * Creates a table dynamically
 * 
 * Table is created using a looping structure. It will 
 * also use an if test with a modulo to alternate a 
 * class name for use with the CSS page. 
 * 
 * @author Matt Markwald
*/ 
# /*TOGGLE
		return $rows;
	}
#*/
/**
 * Increments the value given
 * 
 * The function receives a variable by reference
 * and increments it 4 times and loads it into an
 * array. This array is then sent back to the
 * caller
*/
# /*TOGGLE
	function increment(&$num) {
		$cellID = [];
		$cellID[0] = $num++;
		$cellID[1] = $num++;
		$cellID[2] = $num++;
		$cellID[3] = $num++;
		return $cellID;
	}
#*/
/**
 * PHP Script
 * 
 * This script sends instructions to add four rows to the
 * add rows function then prints a table with the rows.
*/
# /*TOGGLE
	$rows = addRows(4);
	echo <<<EOT
	<table>
		$rows
	</table>
EOT;
#*/
?>