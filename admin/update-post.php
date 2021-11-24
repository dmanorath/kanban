<?php require('../config/config.php'); ?>
<?php 
//$pid = $_GET['pid'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST["title"])) {
		echo "Please fill all the area.";
	}else{
		$title = $_POST["title"];
		$content = $_POST["content"];
		$dateModified = date("Y-m-d H:i:s");
		$dateDue = $_POST["dateDue"];
		$pid = $_POST["pid"];
		$uid = $_POST["uid"];
		$lid = $_POST["lid"];
		$cid = $_POST["cid"];
		global $conn;
		$sql = "UPDATE post SET Title = '$title', Content = '$content', DateModified = '$dateModified', DateDue = '$dateDue', UID = '$uid', LID = '$lid', CID= '$cid' 
				WHERE pid =".$pid;
		
		if ($conn->query($sql) === TRUE) {
			header("Location: index.php");
		} else {
			echo "Error: " . $sql . "<br/>" . $conn->error;
		}
	}
}		
?>