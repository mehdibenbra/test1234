<?php

$hostname = "localhost";
$username = "root";
$password = "root";
$databaseName = "userr";
$connect = mysqli_connect($hostname, $username, $password, $databaseName);


?>

<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<title>Login</title>
</head>
<body>

<ul class="nav nav-pills" role="tablist">
    <li><a href="register.php">Register</a></li>
    <li class="active"> <a href="login.php">Login</a> </li>
    </ul>
    
    
    
    
    
    
<h3>Login Form</h3>
<form action="" method="POST">
Username: <input type="text" name="user"><br />
Password: <input type="password" name="pass"><br />	
<input type="submit" value="Login" name="submit" />
</form>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(isset($_POST["submit"])){

if(!empty($_POST['user']) && !empty($_POST['pass'])) {
	$user=$_POST['user'];
	$pass=$_POST['pass'];


	$query="SELECT * FROM members WHERE username='".$user."' AND password='".$pass."'";
    $result = mysqli_query($connect, $query);
    
	$numrows=mysqli_num_rows($result);
	if($numrows!=0)
	{
	while($row=mysqli_fetch_assoc($result))
	{
	$dbusername=$row['username'];
	$dbpassword=$row['password'];
    $userid=$row['id'];
    $name=$row['fname'];
	}

	if($user == $dbusername && $pass == $dbpassword)
	{
	session_start();
	$_SESSION['sess_user']=$user;
    $_SESSION['sess_id']=$userid;
    $_SESSION['sess_name']=$name;
    

	/* Redirect browser */
	header("Location: createEvent.php");
	}
	} else {
	echo "Invalid username or password!";
	}

} else {
	echo "All fields are required!";
}
}
?>

</body>
</html>