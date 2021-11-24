<?php require('../config/config.php'); ?>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST["title"])) {
		echo "Please fill all the area.";
	}else{
		$title = $_POST["title"];
		$content = $_POST["content"];
		$dateCreated = date("Y-m-d H:i:s");
		$dateDue = $_POST["dateDue"];
		$uid = $_POST["uid"];
		$lid = $_POST["lid"];
		$cid = $_POST["cid"];
		global $conn;
		$sql = "INSERT INTO post (Title, Content, DateCreated, DateModified, DateDue, UID, LID, CID)
						   VALUES('$title', '$content', '$dateCreated', '$dateCreated', '$dateDue', '$uid', '$lid', '$cid')";
		
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
			header('location: /admin');
		} else {
			echo "Error: " . $sql . "<br/>" . $conn->error;
		}
	}
}		
?>