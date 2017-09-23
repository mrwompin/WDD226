<?php 
	include "../libraries/HtmlLib.php";
	
	class Table extends Tools
	{
		public $sortable;
		private $theadContent;
		private $tbodyContent;
		private $tfootContent;

		public function get_Thead() {
			return $this->theadContent;
		}

		public function addTable(array $header = NULL, array $body = array(NULL), array $footer = NULL) {
			
			

			#working code:
			 $this->addThead($header);
		}

		
		private function addThead($header) {
			foreach ($header as $th) {
				$this->theadContent .= "<th>" . $th . "</th>\n";
			}
			
		}
	}

/**
 * Data Set 001
 * 
 * Used for testing the th maker
*/
 /*TOGGLE
	$table = new table;
	$table->addTable("cat","dog","bird");

	include("../templates/template_Table.php");
#*/

/**
 * Data Set 002
 * 
 * Test data for table tool, multi-d array
*/
 /*TOGGLE
	$table = new table;
	$tableData = array
	(
		array("Name", "DOB", "Age"),
		array("Matt", "1/27", "26"),
		array("Doug", "10/23", "34")
	);
	$table->addTable($tableData);

	include("../templates/template_Table.php");
#*/

/**
 * Data Set 002
 * 
 * Test data for table tool, multi-d array
*/
# /*TOGGLE
	$table = new table;
	$tableHead = array("Name", "DOB", "Gender");
	$tableBody = array(
		array("Matt","1/27/1991", "male"),
		array("Doug", "10/24/1983", "male"),
		array("Cindy","3/19/1990", "female")
	); 
	$table->addTable($tableHead,$tableBody);

	include("../templates/template_Table.php");
#*/

?>