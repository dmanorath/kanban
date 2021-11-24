<?php 
	session_start();
	session_destroy();
	$endSession = session_destroy();
	if(null == $endSession){
		header("Location: index.php");
	}
?>