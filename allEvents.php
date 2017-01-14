
<?php
$connection = mysql_connect('localhost', 'root', 'root'); //The Blank string is the password
mysql_select_db('userr');
$query = "SELECT * FROM events"; //You don't need a ; like you do in SQL
$result = mysql_query($query);
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
    
    
    
    
    

     <h4> All events available on the website, <?=$_SESSION['sess_name'];?> </h4>
    
    <div>
    
    
    <?php
    
while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
 
    
   echo "Title of the event: " . $row['title'] . " @ " . $row['location'] . "</td> <td>" . " on the " . $row['startdate']."<br />". "Description: " .  $row['description']."<br />". "Type of event: " .  $row['categorisation']."<br />" . "</td><br /></tr>" ;


      //$row['index'] the index here is a field name
}

echo "</events>"; //Close the table in HTML

mysql_close(); //Make sure to close out the database connection
    ?>
        </div>

</body>
</html>