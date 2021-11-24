<?php 
	session_start();
	if((!isset ($_SESSION['username']) == true) and (!isset ($_SESSION['password']) == true)){
		unset($_SESSION['username']);
		unset($_SESSION['password']);
	}
	else {
		header("Location: calendar.php");
	}
?>
<html>
<head>
<title>Welcome!</title>
<style>
.container {margin: 0px auto; max-width: 300px;}
#login-box {
    border: 1px solid #ebe7e7;
    background: #fff;
    width: 100%;
	padding-top: 20px;
}
#login-box input {
    line-height: 2em;
    border: 1px solid #eee;
    padding: 5px 10px;
    font-size: 15px;
    margin: 10px 15px;
    width: 90%;
}
#login-box button {
    line-height: 1.8em;
    font-size: 16px;
    background-color: #578bff;
    border: 0px;
    color: #fff;
    width: 90%;
    margin: 10px 15px;
	cursor: pointer;
}
.container h2{  
	color: #757575;
    font-weight: normal;
    margin: 5px;
    text-align: center;
}
</style>
</head>
<body style="background-color: #f1f1f1;">
<div class="container">
<h2>Login</h2>
<section id="login-box">
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<input type="text" name="username" placeholder="username"></input><br/>
		<input type="password" name="password" placeholder="password"></input><br/>
		<button type="submit" name="submit">Login</button>
	</form>
</section>	
<a href="#" style="padding-top: 20px; text-decoration: none;">Lost your password?</a>
</div>
</body>
</html>
<?php 
$string = $_POST['username'];
// check for special characters
if (!(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $string)))
{
	if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	require('config/config.php');
	global $conn;
	if($conn == TRUE){
		$result = mysqli_query($conn,"SELECT * FROM Users WHERE UserName='$username' AND PassWord='$password'");
		if($row = mysqli_fetch_array($result)){
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			header('Location: calendar.php');
		}
		else {
			echo "Please enter valid username and password!";
		}
	}
	else {
		echo 'connection error';
	}
	}
}
else{
	echo "Username or password incorrect!";
}
?>