<?php

/**
 *  Global variable for class Tools
 * 
 * The main function of Tools is to house the global
 * properties that tool extensions use. These are the 
 * properties that all html elements have available
 * 
 * @since 9/14/17
 * @author Matt Markwald <mmarkwald01@gmail.com>
 * 
*/
# /*TOGGLE
class Tools
{
	private $accesskey; 
	private $className; 
	private $contextMenu;
	private $dataGet; 
	private $dir;
	private $draggable;
	private $dropzone; 
	private $hidden;
	private $id; 
	private $lang;
	private $spellcheck;
	private $style;
	private $tabindex;
	private $title;
	private $translate;
}
#*/

class Table extends Tools
{
	private $sortable;
	private $thead;
	private $tbody;
	private $tfoot;

#	/*TEST METHODS
	public function test() {
		echo "test test test test test";
	}
#*/


# /*SET METHODS
	public function set_Thead() {
		$headerRow = func_get_args();
		$this->thead = $this->addTh($headerRow);
	}
	public function set_Tbody() {
		$rows = array(func_get_args());
		// grabs as arrays as array
		// will need a function to change each array into a list

	}
	public function set_Tfoot() {
		$this->thead = array(func_get_args());
	}
#*/
# /*GET METHODS
	public function get_Thead() {
		if (isset($this->thead)) {
			return $this->thead;
		}
		else {
			return "not set";
		}
	}
#*/

/**
 * Construct <th> HTML tags
 * 
 * This function creates a <th> tag for each item
 * in the array it is passed. 
 * 
 * @since 9/14/17
 * @author Matt
 * @param array $headerData Row data 
 * @var string $htmlString holds the html for return 
 * @return string $htmlString Returns formatted html string with data nested in <th></th> 
 * 
*/  
# /* TOGGLE
	private function addTh($headerData) {
		$htmlString = "<tr>\n";
		foreach ($headerData as $th) {
			$htmlString .= "	<th>" . $th . "</th>\n";
		}
		$htmlString .= "</tr>\n";
		return $htmlString;
	}
#*/	 

/**
 * Construct <td> HTML tags
 * 
 * this function creates a <td> tag for each item
 * in the array it is passed
 * 
 * @since 9/14/17
 * @author Matt
 * @param array $headerData Row data 
 * @var string $htmlString holds the html for return 
 * @return string $htmlString Returns formatted html string with data nested in <th></th>
 *  
*/  
# /* TOGGLE
	private function addTd($headerData) {
		$htmlString = "<tr>\n";
		foreach ($headerData as $td) {
			$htmlString .= "	<td>" . $th . "</td>\n";
		}
		$htmlString .= "</tr>\n";
		return $htmlString;
	}
#*/	
}#End Class Table

// TESTS: 
# /*TOGGLE
 # TEST001  
 #
 # Checks the ability to call extension 'Table'
 # Checks set_Thead works with variable args
 # Checks get_Thead()
 # 

$petTable = new Table;
$petTable->set_Thead("Name", "Type", "Age");
echo $petTable->get_Thead(); 
# */

?>