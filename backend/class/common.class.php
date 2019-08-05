<?php 
	class Common{
		protected $conn;

		function set($attribute,$value)
		{
			$this->$attribute = $value;
		}
		function get($attribute)
		{
			return $this->$attribute;
		}
		function connect()
		{
			$this->conn = new mysqli('localhost','root','','db_php_37_news');
	   
			if ($this->conn->connect_errno != 0)
			{
				die('Database Connection Error'); 
			}
	}
	function insert($sql)
	{
		$this->connect();
 		$this->conn->query($sql);
 		if($this->conn->affected_rows == 1 && $this->conn->insert_id > 0)
 		{
 			return true;
 		}
 		else{
 			return false;
 			}
	}
	function select($sql)
	{
		 $this->connect();
	 	 $result = $this->conn->query($sql);
	 	 $data = [];
	 	 if($result -> num_rows > 0){
	 	 	while($row = $result->fetch_object())
	 	 		array_push($data, $row); 
	 	 }
	 	 return $data;
	}
	 	
	function delete($sql)
	{
		$this->connect();
		$this->conn->query($sql);
		if($this->conn->affected_rows == 1)
		{
 			return true;
 		}
 		else{
 			return false;
 			}
	}

	function update($sql)
	{
		$this->connect();
		$this->conn->query($sql);
		if($this->conn->affected_rows == 1)
		{
 			return true;
 		}
 		else{
 			return false;
 			}
	}
}
 ?>