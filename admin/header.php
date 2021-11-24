<?php require('session/login_session.php'); ?>
<?php require('functions.php'); ?>
<?php $user = $_SESSION['username'];?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Kanban Board</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="../template/css/style.css" rel="stylesheet"/>
	<style>
		.item, #board{display: none}
		.item, .item a{color: #fff}
		nav {background-color: #303F9F; clear: both; width: 100%; min-height: 40px; line-height: 40px; margin-bottom: 8px}
		nav ul li{float: left; list-style: none}
		nav ul li a{padding: 10px 20px; line-height: 1.3em; color: #fff; text-decoration: none; display: block}
		nav ul li a:hover{background-color: #448AFF}
		section, header,footer {clear: both}
		hr {margin-top: 0px; margin-bottom: 0px;}
	</style>
<script>
$(document).ready(function(){
	$(".loading").append("Loading content..");
	$("#board").delay(100).fadeIn(500);
	$("#content").delay(1000).fadeIn(500);
	$(".item").delay(1500).slideDown(500);
	var tId;
	clearTimeout(tId);
	tId = setTimeout(function(){
		$(".loading").slideUp("slow");        
	}, 1500);
});
</script>
</head>
<body>
<header>

</header>
<nav>
	<ul>
		<li><a href="index.php">Dashboard</a></li>
		<li><a href="../" target="_blank">View Posts</a></li>
		<li><a href="add-post.php">Add </a></li>
		<li style="float: right">
		<form action="../logout.php" style="float: right; color: #000">
			<span class="glyphicon glyphicon-log-out"></span><input type="submit" value="Logout"></input>
		</form>
		</li>
	</ul>
</nav>