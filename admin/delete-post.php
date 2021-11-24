<?php require('../config/config.php'); ?>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST["deletePid"])) {
		echo "Please fill all the area.";
	}else{
		$pid = $_POST["deletePid"];
		global $conn;

		$sql = "DELETE FROM post where pid = ".$pid; 
		
		if ($conn->query($sql) === TRUE) {
			header("Location: index.php");
		} else {
			echo "Error: " . $sql . "<br/>" . $conn->error;
		}
	}
}		
?>