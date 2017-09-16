<?php
namespace HTML_TOOL_LIBRARY;
#DOC: TOOL CLASS
	/**
	 *  Class Tool holds the global attributes for it's extensions
	 * 
	 * The main function of Tool is to house the global
	 * properties that tool extensions use. These are the 
	 * properties that all html elements have available.
	 * 
	 * @since 9/14/17
	 * @author Matt Markwald <mmarkwald01@gmail.com>
	 * 
	*/
# /* TOGGLE
	class Tool {
	public $globals = array(
	"id"=>NULL,
	"class"=>NULL,
	"style"=>NULL,
	"accesskey"=>NULL,
	"contextMenu"=>NULL,
	"dataGet"=>NULL,
	"dir"=>NULL,
	"draggable"=>NULL,
	"dropzone"=>NULL,
	"hidden"=>NULL,
	"lang"=>NULL,
	"spellcheck"=>NULL,
	"tabindex"=>NULL,
	"title"=>NULL,
	"translate"=>NULL);
	} 
#*/


#DOC: Table Extension
	/** 
	 * Table is an extension of Tool
	 *
	 * Table allows the programmer to create a dynamic
	 * table by sending arrays of data to be formatted
	 * into rows.
	*/
# /* TOGGLE
	class Table extends Tool {
		static $rows = ["header"=>null];
		

	#DOC: addHeader, addFooter, addRow
	 	/** 
		 * Following methods are used add values to the $rows property.
		 * 
		 * Values are added by first calling the static property 
		 * including the key value and setting it equal to the
		 * input. In the cases of the addHeader and addFooter 
		 * Functions the key values "header" and footer" are 
		 * overwritten, however with the addRow function 
		 * additional rows are added to the $rows property.
		 * These additions are created by by calling the property
		 * with a key of count($rows)-2 which will return the
		 * proper place for a row to be added.
		 * 
		 * @since 9/14/17
		 * @author Matt Markwald <mmarkwald01@gmail.com>
		 * 
		*/
	# /* TOGGLE
		public function addHeader(array $header) {
			self::$rows["header"] = $header;
		}
		public function addRow(array $row) {
			self::$rows[count(self::$rows)-1] = $row;
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
			$this->clearProperties();
			return $return;
		}

#  /*TOGGLE
		private function getHeadString() {
			$id = $this->globals["id"];
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
			$numRows = count(self::$rows)-1;
			for($i = 0; $i < $numRows; $i++) {
				$return .= "	<tr>\n";
				foreach(self::$rows[$i] as $td) {
					$return .= "		<td>$td</td>\n";
				}
				$return .= "	</tr>\n";
			}
			return $return;
		}

		private function clearProperties(){
			$this->globals = array(
			"id"=>NULL,
			"className"=>NULL,
			"style"=>NULL,
			"accesskey"=>NULL,
			"contextMenu"=>NULL,
			"dataGet"=>NULL,
			"dir"=>NULL,
			"draggable"=>NULL,
			"dropzone"=>NULL,
			"hidden"=>NULL,
			"lang"=>NULL,
			"spellcheck"=>NULL,
			"tabindex"=>NULL,
			"title"=>NULL,
			"translate"=>NULL);
			self::$rows = ["header"=>null];
}
	#*/	
} 
#*/

#DOC: Build()
	/** 
	 * Build() creates an html table string
	 *
	 * Build uses a for loop within a for loop to write
	 * the html frame as well as to populate the table
	 * with the supplied user data. The first loop writes
	 * a <tr> tag for each row in the array of rows. The
	 * second loop checks for a header row by boolean checking 
	 * for a non-numeric key value.
	 * 
	 * Since header is a named key value and by 
	 * default rows are added numerically, the if test can
	 * check for key value "header" by checking for a 
	 * non-numeric number. This may also come in hand later
	 * when I try to implement a way to write inline class/id
	 * 
	 * Using result of the if test the html string is updated. 
	 * If the result of the if test is non-numeric (the key value
	 * of the row) then the test will result in true (the key value
	 * is not a numeric number) and therefore the html string is
	 * appended with <th>$cell_Value</th> for the header row. If the 
	 * result is false and the key value is numeric the table is appended
	 * with 
	*/
#/*TOGGLE
	 //Your Code Here	
#*/

#DOC: Row Interface
	/** 
	 * The Row Interface implements method addRow
	 *
	 * Method addRow takes in user input and formats
	 * it according to specifications of the tool
	 * that is implementing it.
	 * 
	 * @since ?
	*/
# /* TOGGLE
	//Your Code Here	
#*/

// FOLLOWING AREA IS FOR TESTS //

#Test 001	
	/**
	 * Test 001
	 * 
	 * Test adding a header, row, and footer to a new
	 * instance of class table.
	 * 
	 * Test 001 is a success.
	 * 
	*/
 /*TOGGLE
	$table = new Table;
	$table->addHeader(["Name","DOB","email"]); 
	$table->addRow(["Matt","1/27/1991","mmarkwald01@gmail.com"]);
	$table->addFooter(["Total","","test"]);
	var_dump($table::$rows);
#*/


#Test 002 
	/**
	 * Test 002
	 * 
	 * Testing to see if the build function will return a fully
	 * usable html table. Table is dynamic, meaning more rows can
	 * be added with additional addRow commands.
	 * 
	 * Success!
	 * 
	*/
 /*TOGGLE
	
	$petTable = new \HTML_TOOL_LIBRARY\Table;
	$petTable->addHeader(["Name","Type","Last Visit"]); 
	$petTable->addRow(["Barkley","Dog","9/15/2016"]);
	$petTable->addRow(["Jynx", "Cat", "8/10/2014"]);
	$petTable->addRow(["Sparky", "Bird", "02/24/2013"]);
	$petTable->addRow(["Socks", "Cat", "10/23/2011"]);
	$petTable->addRow(["Sonic", "hedgehog", "04/11/2015"]);
	echo $petTable->build();

		
#*/ 

#Test 003
	/** 
	 * Week 4 assignment
	 *
	 * This test is to determine if my library can currently
	 * pass the assignment from week 4, dynamically generating
	 * a table with values 1-*
	 * 
	*/
# /*TOGGLE
	 $table = new \HTML_TOOL_LIBRARY\Table;
	 $x=1;
	 for($i=0;$i<4;$i++) {
	 	$table->addRow([$x++, $x++, $x++]);
	 }
	 echo $table->build();


#*/
?>