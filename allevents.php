
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "root";
$databaseName = "userr";


// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `events`";

// for method 1

$result = mysqli_query($connect, $query);



session_start();
 $id = $_SESSION['sess_id'];
$name = $_SESSION['sess_name'];



?>
<!doctype html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<head>
<title>All events</title>
</head>
<body>

<h2>My Event Website</h2>                 
  <ul class="nav nav-pills" role="tablist">
    <li><a href="createEvent.php">Create Event</a></li>
    <li><a href="myevents.php">Events I created</a></li>
    <li><a href="allevents.php">All events</a></li>
    <li class="active"><a href="browsebycategory.php">Browse (category)</a></li>
    <li><a href="browsebydate.php">Browse (date)</a></li>
    <li> <a href="ticket.php"> Book ticket </a></li>
    <li><a href="feedback.php">Give feedback</a></li> 
    <li><a href="seefeedback.php">See feedback</a></li>
    <li> <a href="host.php"> Hosted events and Guest List </a></li>
    <li> <a href="joinedevents.php"> Events I attend </a></li>
    <li><a href="logout.php">Logout</a></li>
    </ul>  

    
    
    
    
    

     <h4> All events available on the website, <?=$_SESSION['sess_name'];?> </h4>
    
    <div>
    
    
    <?php
    
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
 
    
   echo "Title of the event: " . $row['title'] . " @ " . $row['location'] . "</td> <td>" . " on the " . $row['startdate']."<br />". "Description: " .  $row['description']."<br />". "Type of event: " .  $row['categorisation']."<br />" . "</td><br /></tr>" ;


      //$row['index'] the index here is a field name
}

echo "</events>"; //Close the table in HTML
 //Make sure to close out the database connection
    ?>
        </div>

</body>
</html>