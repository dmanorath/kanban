<?php require('session/login_session.php'); ?>
<?php require('functions.php'); ?>
<?php 
$user = $_SESSION['username'];
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
	<title>Welcome, <?php if($user == 'mdhak01' || $user == 'MDHAK01'){echo 'Manorath';} ?>!</title>
	<link href="template/css/style.css" rel="stylesheet"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<style>
.item, #board{display: none}
.item, .item a{color: #fff}
nav {background-color: #303F9F; clear: both; width: 100%; min-height: 40px; line-height: 40px; margin-bottom: 8px}
nav ul li{float: left; list-style: none}
nav ul li a{padding: 10px 20px; line-height: 1.3em; color: #fff; text-decoration: none; display: block}
nav ul li a:hover{background-color: #448AFF}
section, header,footer {clear: both}
#logout input {
    background-color: #fff;
    border: 0;
    padding: 11px 20px;
    font-weight: 600;
    cursor: pointer;
    font-size: 15px;
    color: #303f9f;
}
</style>
<script>
$(document).ready(function(){
	$(".loading").append("Loading content..");
	$("#board").delay(100).fadeIn(500);
	$("#content").delay(500).fadeIn(500);
	$(".item").delay(1000).slideDown(500);
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
		<li><a href="../kanban">Home</a></li>
		<li><a href="cat.php?cid=1">Homework</a></li>
		<li><a href="cat.php?cid=2">Projects</a></li>
		<li><a href="admin">Dashboard</a></li>
		<li style="float: right">
		<form id="logout" action="logout.php" style="float: right; color: #000">
			<span class="glyphicon glyphicon-log-out"></span><input type="submit" value="Logout"></input>
		</form>
		</li>
	</ul>
</nav>
<div class="loading"></div>