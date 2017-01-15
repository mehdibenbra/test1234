<?php 

$hostname = "localhost";
$username = "root";
$password = "root";
$databaseName = "userr";
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
session_start();
?>

<!doctype html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<head>
<title>Create Event</title>
</head>
<body>

 <h2>My Event Website</h2>                 
  <ul class="nav nav-pills" role="tablist">
    <li class="active"><a href="createEvent.php">Create Event</a></li>
    <li><a href="myevents.php">My events</a></li>
    <li><a href="allevents.php">All events</a></li>
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
    

	

	$query= "SELECT * FROM events WHERE title='".$title."'";
    $result = mysqli_query($connect, $query);
    
	$numrows=mysqli_num_rows($result);
	if($numrows==0)
	{
        
	$sql="INSERT INTO events(title,description,location,startdate,enddate,categorisation,tickets,userid) VALUES('$title','$description','$location','$startdate','$enddate','$categorisation','$tickets','$id')";

	$result2= mysqli_query($connect,$sql);

    if($result2){
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