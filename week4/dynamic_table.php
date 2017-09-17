<?php
#DOC: DYNAMIC TABLE EXAMPLE
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
	$table = new Table; //new instance of class table
	$cellNum = 1; //used for naming cells

	echo "<!DOCTYPE html>\n";
	echo "<html>\n";
	echo "	<head>\n";
	echo "		<title></title>\n";
	echo "<style>";
	
	echo "</style>";
	echo "	</head>\n";
	echo "	<body>\n";
	for($i=0;$i<4;$i++) {
		$table->addRow([$cellNum++, $cellNum++, $cellNum++]); //each row uses the cellNum and increments it for the next one
	}
 #	echo $table->addRow(["Dynamic Table"],"header"); //adds a header, still need to figure out how to pass a colspan argument efficiently
	echo $table->build(); //build function uses the rows it was given to create the table
	echo "	</body>\n";
	echo "</html>\n";
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
		static $rows;
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
			$this->htmlString = "<table>\n";
			$this->htmlString .= $this->constructHeader();
			$this->htmlString .= $this->constructRow();
			$this->htmlString .= "</table>\n";
			$return = $this->htmlString;
			self::$rows = [];
			$this->numRows = null;
			return $return;
		}

#  /*TOGGLE
		private function constructHeader() {
			if (isset(self::$rows["header"])) {
				$header = self::$rows["header"];
				$return = "	<tr>\n";
				foreach($header as $th) {
					$return .= "		<th>$th</th>\n";
				}
				$return .= "	</tr>\n";
				return $return;
			}
		}
 #*/
		#DOC: getBodySting()
			/** 
			 * Creates rows for the body of the table
			 *
			 * Function uses a for loop to create an opeing and closing tag for each
			 * numbered key in $rows. Within the for loop is a foreach loop that
			 * iterates and adds to the $return variable the values of the $row[]
			 * these values are each enclosed by <td> tags. By keeping track of 
			 * the number of rows without keywords, the function can create the body
			 * separate from the header using <td> tags.
			 * 
			 * @var $return return holds the html code of rows created by constructRow
			 * @return $return returns an html string of rows 
			*/
		#/*TOGGLE
			private function constructRow() {
					$return = null;
					for($i = 0; $i < $this->numRows; $i++) { 
						$return .= "	<tr>\n";
						foreach(self::$rows[$i] as $td) { //creates the <td></td> tags for the row values
							$return .= "		<td>$td</td>\n";
						}
						$return .= "	</tr>\n";
					}
					return $return;
				} //Your Code Here	
		#*/

} 
#*/

?>