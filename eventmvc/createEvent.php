<?php 
session_start();
if(!isset($_SESSION["sess_name"])){
	header("location:createEvent.php");
} else {}
?>

<!doctype html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<head>
<title>Create Events</title>
</head>
<body>

 <h2>My Event Website</h2>                 
  <ul class="nav nav-pills" role="tablist">
    <li><a href="home.html">Home</a></li>
    <li><a href="myevents.php">My events</a></li>
    <li><a href=" class=active">All events</a></li>
    <li><a href="createEvent.php">Create an event</a></li>
    <li><a href="browsebycategory.php">Browse (category)</a></li>
    <li><a href="browseByDate.php">Browse (date)</a></li>
    <li><a href="feedback.php">Give feedback</a></li> 
    <li><a href="seefeedback.php">See feedback</a></li>
    <li> <a href="logout.php">Logout</a></li>
  </ul>

<h3>Organize the sports event you want!</h3>
<h4> Welcome, <?=$_SESSION['sess_name'];?> </h4>
<form action="" method="POST">
Title: <input type="text" name="title"><br />
Description & Features : <input type="text" name="description"><br />
Location: <input type="text" name="location"><br />
Date of the event <input type="date" name="startdate"><br />
Categorisation:   <select name="categorisation">
  <option value="Tennis">Tennis event</option>
  <option value="Football">Football event</option>
  <option value="Basket-ball">Basket-ball event</option>
  <option value="Tournament">Tournament</option>
</select> <br />
Tickets: <input type="number" name="tickets"><br />
End Date for ticket sales: <input type="date" name="enddate"><br />
<input type="submit" value="Add event" name="submit" />
</form>
<?php
if(isset($_POST["submit"])){

if(!empty($_POST['title']) && !empty($_POST['description'])) {
	$title=$_POST['title'];
	$description=$_POST['description'];
    $location=$_POST['location'];
    $startdate=$_POST['startdate'];
    $enddate=$_POST['enddate'];
    $categorisation=$_POST['categorisation'];
    $tickets=$_POST['tickets'];
    $id = $_SESSION['sess_id'];
    

	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('userr') or die("cannot select DB");

	$query=mysql_query("SELECT * FROM events WHERE title='".$title."'");
	$numrows=mysql_num_rows($query);
	if($numrows==0)
	{
	$sql="INSERT INTO events(title,description,location,startdate,enddate,categorisation,tickets,userid) VALUES('$title','$description','$location','$startdate','$enddate','$categorisation','$tickets','$id')";

	$result=mysql_query($sql);


	if($result){
	echo "Event Successfully Created";
	} else {
	echo "Failure!";
	}

	} else {
	echo "That title already exists! Please try again with another.";
	}

} else {
	echo "All fields are required!";
}
}
?>

</body>
</html>