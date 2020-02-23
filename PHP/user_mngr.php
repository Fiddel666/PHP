<?php
 
class user_mngr   {
    private $mysqli;
	private $table;
	
    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
        $this->table="users";
    }
	
    function register($color) {
		$date = date("Y-m-d");
		$query  = "INSERT INTO ".$this->table;
		$query .= " (color, date) ";
		$query .= " VALUES ('$color','$date')";
		echo $query;
		$result = mysqli_query($this->mysqli,$query);
		if(!$result) {
			return false;
		}
		return true;
    }
	
	function present($date_start, $date_end) {
		$query  = "SELECT * FROM ".$this->table;
		$query .= " WHERE `date` >= '$date_start'";
		$query .= " AND `date` <= '$date_end'";
		echo $query;
		$result = mysqli_query($this->mysqli,$query);
		
		return $result;
    }
}
?>