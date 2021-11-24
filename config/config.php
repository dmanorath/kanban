<?php
class DB 
{
	protected $db_name = 'kanban';
	protected $db_user = 'USERNAME_HERE';
	protected $db_pass = 'PASSWORD_HERE';
	protected $db_host = 'localhost';
	
	var $connect_db;
	public function connect() {
		$this->connect_db = new mysqli( $this->db_host, $this->db_user, $this->db_pass, $this->db_name );
		mysqli_set_charset($this->connect_db,"utf8");
		if ( mysqli_connect_errno() ) {
			echo 'Connection failed: '.mysqli_connect_error();
			exit();
		}
		return $this->connect_db;
	}
}	
?>
