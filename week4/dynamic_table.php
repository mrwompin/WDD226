<?php

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
		private $numRows;

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
			$this->htmlString .= $this->getHeadString();
			$this->htmlString .= $this->getBodyString();
			$this->htmlString .= "</table>\n";
			$return = $this->htmlString;
			self::$rows = [];
			$this->numRows = null;
			return $return;
		}

#  /*TOGGLE
		private function getHeadString() {
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
		private function getBodyString() {
			$return = null;
			for($i = 0; $i < $this->numRows; $i++) {
				$return .= "	<tr>\n";
				foreach(self::$rows[$i] as $td) {
					$return .= "		<td>$td</td>\n";
				}
				$return .= "	</tr>\n";
			}
			return $return;
		}
	#*/	
} 
#*/

#WEEK 4 ASSIGNEMNT
	/** 
	 * creates a dynamic table with numbered input as data
	 *
	 * creates a new instance of class table, sets an initial 
	 * variable $cellNum to the number the function should start
	 * the cell count on. the table loops through creating 4 rows
	 * of output and using post incremented $cellNum variables to 
	 * set the number for each cell. these rows are added using the 
	 * table classes addrow() function which adds arrays of input to
	 * the table $rows property which itself is an array. Then the 
	 * build() function is called which creates opeing and closing tags
	 * for the table, a header, and any rows in the $rows property.
	 * 
	*/
# /*TOGGLE
	 

	 $table = new Table;
	 $cellNum = 1;
	 for($i=0;$i<4;$i++) {
	 	$table->addRow([$cellNum++, $cellNum++, $cellNum++]);
	 }
	 echo $table->build();


#*/
?>