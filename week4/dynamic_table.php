<<<<<<< HEAD
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
	function addRows($num) {
		$rowStart = 0;
		$cellID = null;
		$rows = null;
		for($i = 0; $i < $num; $i++) {
			$cellID = increment($rowStart);
			$rows .= <<<ROWS

		<tr>
			<td>$cellID[0]</td>
			<td>$cellID[1]</td>
			<td>$cellID[2]</td>
			<td>$cellID[3]</td>
		</tr>

ROWS;
		}
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
=======
<?php
#DOC: Assignment Script
	/** 
	 * Script executes creating 3 dynamic tables
	 *
	 * Dynamic tables are created by sending arguments to the 
	 * class week_4. Week_4 uses a static function called run_assignment
	 * to execute the necessary scripts to interact with class table.
	 * by passing the number of rows, columns, and start value as 
	 * arguments, the tables can be created dynamicall in all sizes.
	 * the css is achieved by adding a class id to everyother row in the
	 * table class, would like to figure out how to make this dynamic as well
	 * in the future.
	 * 
	*/
 #/*TOGGLE
	Week_4::html_open();
	Week_4::Run_Assignment(4,3,1);
	echo "		<br>\n";
	Week_4::Run_Assignment(5,5,-10);
	echo "		<br>\n";
	Week_4::Run_Assignment(10,10,10);
	echo "		<br>\n";
	#for($i=0;$i<=10;$i++){
	#Week_4::Run_Assignment(1,10,$i);
	#}
	Week_4::html_end(); 	
#*/

#DOC: Class Week_4
	/** 
	 * creates a table with dynamically generated numbered input as data
	 *
	 * creates a new instance of class table, sets an initial 
	 * variable $cellNum to the number the function should start
	 * the cell count on. the table loops through creating 4 rows
	 * of output and using post incremented $cellNum variables to 
	 * set the number for each cell. these rows are added using the 
	 * table classes addrow() function which adds arrays of input to
	 * the table $rows property which itself is an array. Then the 
	 * build() function is called which creates opeing and closing tags
	 * for the table and any rows in the $rows property.
	 * 
	*/
 # /*TOGGLE
	class Week_4 {
	#DOC: Run_Assignment()
		/** 
		 * creates rows with incremented values in the cells
		 *
		 * Takes 3 parameters, the number of rows, the number of columns
		 * and what number to start the incremented value on. The function
		 * uses two for loops to acomplish the construction of rows with
		 * cell values. The first loop merely adds the row created with the
		 * second loop and resets the row variable. When the row loop is
		 * finished executing the function runs the build() function from
		 * the table class.  
		*/
	 #/*TOGGLE
		//YOUR CODE HERE:
		 static function Run_Assignment($numRows, $numCols, $start){
			$table = new Table; //new instance of class table;
		 	$cellNum = $start; //used for naming cells
		 	$row = [];
			for($x=0;$x<$numRows;$x++) {
				for($y=0;$y<$numCols;$y++) {
					$row[$y]=$cellNum++;
				}
				$table->addRow($row);
				unset($row);
			}	
			echo $table->build();
		}	
	#*/
		
	#DOC: html_Open/End
		/** 
		 * Functions echo out the frame and style of my php document
		 *
		*/
	 #/*TOGGLE
		//YOUR CODE HERE:
		public static function html_open() {
				echo "<!DOCTYPE html>\n";
				echo "<html>\n";
				echo "	<head>\n";
				echo "		<title>Dynamic Table</title>\n";
				echo "<style>\n";
				echo "	table, th, td {\n";
				echo "		text-align: center;\n";
				echo "		border-collapse: collapse;\n";
				echo "		border: 1px gray solid;\n";
				echo "	}\n";
				echo "	td {\n";
				echo " 		width: 100px;\n";
				echo "	}\n";
				echo "	tr.color {\n";
				echo "		background-color: lightblue;\n";
				echo "	}\n";
				echo "</style>\n";
				echo "	</head>\n";
				echo "	<body>\n";	
			}
			public static function html_end() {
				echo "	</body>\n"; // end my closing tags
				echo "</html>\n";	
			}	
	#*/
 }
#*/

#DOC: Class Table 
	/** 
	 * Table creates a table object
	 *
	 * Table allows the programmer to create a dynamic
	 * table by sending arrays of data to be formatted
	 * into rows.
	*/
 # /* TOGGLE
	class Table {
		static $rows = [];
		private $numRows; //note in this context numRows refers only to 'numbered' rows, not the total number of rows

	#DOC: addHeader, addRow
	 	/** 
		 * Following methods are used add values to the $rows property.
		 * 
		 * The addRow function adds rows to the $rows property.
		 * These additions are created by by calling the property
		 * with a key of count($rows)-2 which will return the
		 * proper place for a row to be added.
		 * 
		 * @since 9/14/17
		 * @author Matt Markwald <mmarkwald01@gmail.com>
		 * 
		*/
	 # /* TOGGLE
		public function addRow(array $row, $keyword = null) {
			#var_dump($row);
			if(isset($keyword)){
				self::$rows[$keyword] = $row;
			}
			else{
			self::$rows[] = $row;
			$this->numRows++;
			}
		}
	#*/

	#DOC: Build()
		/**
		 * constructs a table out of $rows
		 * 
		 * Build() sets in motion a series of methods that 
		 * separate the $rows variable into different sections
		 * before formatting each section according to their
		 * own specifications. These sections are converted to
		 * strings and stored in $build before being used to 
		 * set the $htmlString property.
		 * 
		 * @since 9/15/17
		 * @author Matt Markwald <mmarkwald01@gmail.com>
		*/
 	 #	 /*TOGGLE
		public function build(){
			$this->htmlString = "		<table>\n";
			$this->htmlString .= $this->constructHeader();
			$this->htmlString .= $this->constructRow();
			$this->htmlString .= "		</table>\n";
			$return = $this->htmlString;
			self::$rows = [];
			$this->numRows = null;
			return $return;
		}
	#*/
 
	#DOC: constructHeader()
		/** 
		 * builds the header row
		 *
		 * checks if there is a row with key value "header"
		 * if there is constructs the row with <th> tags
		 * instead of <td> tags. Hopefull this function will
		 * not be needed when I figure out how to use one
		 * constructRow function
		*/
	 #/*TOGGLE
			private function constructHeader() {
				if (isset(self::$rows["header"])) {
					$header = self::$rows["header"];
					$return = "			<tr>\n";
					foreach($header as $th) {
						$return .= "				<th>$th</th>\n";
					}
					$return .= "			</tr>\n";
					return $return;
				}
			} 
	#*/
  
	#DOC: constructRow()
		/** 
		 * Creates rows for the body of the table
		 *
		 * Function uses a for loop to create an opeing and closing tag for each
		 * numbered key in $rows. Within the for loop is a foreach loop that
		 * iterates and adds to the $return variable the values of the $row[]
		 * these values are each enclosed by <td> tags. By keeping track of 
		 * the number of rows without keywords, the function can create the body
		 * separate from the header using <td> tags. Currently there is a test
		 * to see whether a row should have a preset class of 'color'. My hope
		 * is that in later implementations this will not be needed.
		 * 
		 * @var $return return holds the html code of rows created by constructRow
		 * @return $return returns an html string of rows 
		*/
	#/*TOGGLE
		private function constructRow() {
				$return = null;
				for($i = 0; $i < $this->numRows; $i++) { 
					if($i%2==0){
						$return .= "			<tr>\n";
						foreach(self::$rows[$i] as $td) { //creates the <td></td> tags for the row values
						$return .= "				<td>$td</td>\n";
						}
					}	
					else{
						$return .= "			<tr class=\"color\">\n";
						foreach(self::$rows[$i] as $td) { //creates the <td></td> tags for the row values
						$return .= "				<td>$td</td>\n";
						}
					}
					$return .= "			</tr>\n";
				}
				return $return;
			} //Your Code Here	
	#*/
 } 
>>>>>>> no-header
#*/
?>