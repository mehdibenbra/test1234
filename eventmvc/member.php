<?php 
session_start();
if(!isset($_SESSION["sess_name"])){
	header("location:member.php");
} else {}
$today = date("Y-m-d")
?>
<!doctype html>
<html>
<head>
<title>Welcome</title>
</head>
<body>
<h2>Welcome, <?=$_SESSION['sess_name'];?>! <a href="logout.php">Logout</a></h2>
<p>
Bien ouej fiston ta fais 1% du projet
<?php
    echo "$today"
    ?>
</p>
</body>
</html>
<?php

?>


