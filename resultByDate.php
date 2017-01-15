<!doctype html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<head>
<title> Result By Date </title>
</head>
<body>

<h2>My Event Website</h2>                 
<ul class="nav nav-pills" role="tablist">
    <li><a href="createEvent.php">Create Event</a></li>
    <li><a href="myevents.php">Events I created</a></li>
    <li><a href="allevents.php">All events</a></li>
    <li><a href="browsebycategory.php">Browse (category)</a></li>
    <li class="active"><a href="browsebydate.php">Browse (date)</a></li>
    <li> <a href="ticket.php"> Book ticket </a></li>
    <li><a href="feedback.php">Give feedback</a></li> 
    <li><a href="seefeedback.php">See feedback</a></li>
    <li> <a href="host.php"> Hosted events and Guest List </a></li>
    <li> <a href="joinedevents.php"> Events I attend </a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>

<h2>Filtered events: </h2>
<?php 
    $today = date("Y-m-d");
    $dateone=$_POST["date1"];
    $datetwo=$_POST["date2"];

$connect=mysqli_connect('localhost','root','root','userr');    
$query = "SELECT * FROM events WHERE startdate >= '$dateone' AND startdate <= '$datetwo' ";
$result = mysqli_query($connect,$query);
$numrows=mysqli_num_rows($result);
?>

<?php
    if($numrows == 0){
        
        echo 'No events available on the selected dates';
    }else{
echo "<events>"; // start a table tag in the HTML
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
        
         echo "Title of the event: " . $row['title'] . " @ " . $row['location'] . "</td> <td>" . " on the " . $row['startdate']."<br />". "Description: " .  $row['description']."<br />". "Type of event: " .  $row['categorisation']."<br />" . "</td><br /></tr>" ;  
    }

echo "</events>"; //Close the table in HTML
mysqli_close($connect); //Make sure to close out the database connection
        
    }
    

?>
</body>
</html>