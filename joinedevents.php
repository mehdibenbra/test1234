<?php
$connect=mysqli_connect('localhost','root','root','userr');  
$query = "SELECT * FROM ticket"; //You don't need a ; like you do in SQL
$result = mysqli_query($connect,$query);
session_start();
if(!isset($_SESSION["sess_name"])){
	header("location:login.php");
} else {}
if(!isset($_SESSION["sess_id"])){
	header("location:login.php");
} else {}
 $id = $_SESSION['sess_id'];
 $name = $_SESSION['sess_name'];
?>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<head>
<title> Book a ticket </title>
</head>
<body>

<h2>My Event Website</h2>                 
  <ul class="nav nav-pills" role="tablist">
    <li><a href="createEvent.php">Create Event</a></li>
    <li><a href="myevents.php">Events I created</a></li>
    <li><a href="allevents.php">All events</a></li>
    <li><a href="browsebycategory.php">Browse (category)</a></li>
    <li><a href="browsebydate.php">Browse (date)</a></li>
    <li> <a href="ticket.php"> Book ticket </a></li>
    <li><a href="feedback.php">Give feedback</a></li> 
    <li><a href="seefeedback.php">See feedback</a></li>
    <li> <a href="host.php"> Hosted events and Guest List </a></li>
    <li class="active"> <a href="joinedevents.php"> Events I attend </a></li>
    <li><a href="logout.php">Logout</a></li>
    </ul>
       
    
    
<h4> Here are the events you have booked tickets for , <?=$_SESSION['sess_name'];?> </h4>
    <?php
echo "<events>"; // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
 if ($id==$row['memberidattending']) {
    
$eventid = $row['eventid'];     
$query1 = "SELECT * FROM events WHERE id='".$eventid."'"; //You don't need a ; like you do in SQL
$result1 = mysqli_query($connect, $query1);
     
while($rowk = mysqli_fetch_array($result1)){   //Creates a loop to loop through results
  {
     
   echo "Title of the event: " . $rowk['title'] . " @ " . $rowk['location'] . "</td> <td>" . " on the " . $rowk['startdate']."<br />". "Description: " .  $rowk['description']."<br />". "Type of event: " .  $rowk['categorisation']."<br />" . "</td><br /></tr>" ;  
 }

      //$row['index'] the index here is a field name
}
 }
}

echo "</events>"; //Close the table in HTML

mysqli_close($connect); //Make sure to close out the database connection
    ?>

</body>
</html>