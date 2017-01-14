<!doctype html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<head>
<title>Register</title>
</head>
<body>

<p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>
<h3>Registration Form</h3>
<form action="" method="POST">
Username: <input type="text" name="user"><br />
Password: <input type="password" name="pass"><br />	
First Name: <input type="text" name="fname"><br />
Last Name: <input type="text" name="lname"><br />
Email: <input type="em" name="email"><br />
Adress: <input type="text" name="adress"><br />
Age: <input type="text" name="age"><br />
Phone number: <input type="number" name="phone"><br />
<input type="submit" value="Register" name="submit" />
</form>
    
    

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    
if(isset($_POST["submit"])){

if(!empty($_POST['user']) && !empty($_POST['pass'])  && !empty($_POST['fname'])  && !empty($_POST['lname'])  && !empty($_POST['email'])  && !empty($_POST['adress'])  && !empty($_POST['age']) && !empty($_POST['phone']) ) {
$user=$_POST['user'];
$pass=$_POST['pass'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$adress=$_POST['adress'];
$age=$_POST['age'];
$phone=$_POST['phone'];
    
$connect=mysqli_connect('localhost','root','root','userr');
$query="SELECT * FROM members WHERE username='".$user."'";
$result = mysqli_query($connect, $query);
$numrows=mysqli_num_rows($result);
	if($numrows==0)
	{


	$sql="INSERT INTO members(fname,lname,email,adress,age,phone,username,password) VALUES('$fname','$lname','$email','$adress','$age','$phone','$user','$pass')";

	
    $result = mysqli_query($connect, $sql);

	if($result){
	echo "Account Successfully Created";
	} else {
	echo "Failure!";
	}

	} else {
	echo "That username already exists! Please try again with another.";
	}

} else {
	echo "All fields are required!";
}
}

    
?>

</body>
</html>