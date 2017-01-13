
<?php
$connection = mysql_connect('localhost', 'root', 'root'); //The Blank string is the password
mysql_select_db('userr');

$query = "SELECT * FROM events"; //You don't need a ; like you do in SQL
$result = mysql_query($query);

session_start();
 $id = $_SESSION['sess_id'];
 $name = $_SESSION['sess_name'];
?>

<html>
<head>
<title>My events</title>
</head>
<body>
<p> <a href="createEvent.php"> Create Event</a> | <a href="myevents.php">My events</a> | <a href="allEvents.php">All events</a> | <a href="ticket.php">Book Ticket </a> | <a href="browseByDate.php"> Browse events by date </a> | <a href="joinedEvents.php">Joined events </a>  | <a href="host.php">Hosted events </a>  | <a href="logout.php">Logout </a></p>
    
     <h4> Created events by <?=$_SESSION['sess_name'];?> </h4>
   
    <div>
    <?php


while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
 if ($id==$row['userid']) {
     
    echo "Title of the event: " . $row['title'] . " @ " . $row['location'] . "</td> <td>" . " on the " . $row['startdate']."<br />". "Description: " .  $row['description']. "<br /> Type of event: " .  $row['categorisation']."<br />". "Number of tickets left: " .  $row['tickets']."<br />" . "</td><br /></tr>" ;  
 }

      //$row['index'] the index here is a field name
}

echo "</events>"; //Close the table in HTML

mysql_close(); //Make sure to close out the database connection
    ?>
        
    </div>

</body>
</html>