<?php 
class utility {
	
	private $dbserver;
	private $dbname;
	private $dbuser;
	private $dbpassword;

	public function __construct($dbserver,$dbname,$dbuser,$dbpassword) {
		
		$this->dbserver = $dbserver;
		$this->dbname = $dbname;
		$this->dbuser = $dbuser;
		$this->dbpassword = $dbpassword;
		
	}

	public function __destruct() {
		 
	}

	// Documentation
   	public function getBusinessCategories(){
		 
		// Make a database connection
		mysql_connect($this->dbserver,$this->dbuser,$this->dbpassword) or die('Could not connect: ' . mysql_error());
		mysql_select_db($this->dbname);
		
		$CategoryQuery = "SELECT ID, Name FROM business_categories WHERE Active = 1";
		
		//echo $CategoryQuery . "<br />";
		
		$BusinessCategories = mysql_query($CategoryQuery) or die('Query failed: ' . mysql_error());		

		return $BusinessCategories;   		
   			
   		}
   		
	}
?>