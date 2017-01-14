
<?php
if(!isset($_SESSION["sess_name"])){
	header("location:login.php");
} else {}
if(!isset($_SESSION["sess_id"])){
	header("location:login.php");
} else {}
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('user-registration');

$query = "SELECT * FROM events"; //You don't need a ; like you do in SQL
$result = mysql_query($query);

session_start();
 $id = $_SESSION['sess_id'];
 $name = $_SESSION['sess_name'];

?>

<html>
<head>
<title>Welcome</title>
</head>
<body>
<p> <a href="createEvent.php"> Create Event</a> | <a href="myevents.php">My events</a> | <a href="allEvents.php">All events</a> | <a href="ticket.php">Book Ticket </a> | <a href="browseByDate.php"> Browse events by date </a> | <a href="joinedEvents.php">Joined events </a>  | <a href="host.php">Hosted events </a>  | <a href="logout.php">Logout </a></p>
    
    
     <h4> Welcome, <?=$_SESSION['sess_name'];?> </h4>
    <?php
echo "<events>"; // start a table tag in the HTML

while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
 if ($id==$row['userid']) {
    
     $eventid = $row['id'];
     $connection1 = mysql_connect('localhost', 'root', ''); //The Blank string is the password
     mysql_select_db('user-registration');
     $query1 = "SELECT * FROM ticket "; //You don't need a ; like you do in SQL
     $result1 = mysql_query($query1);
     
     while($rowk = mysql_fetch_array($result1)){   //Creates a loop to loop through results
  {
        $memberid = $rowk['memberid'];
     $connection2 = mysql_connect('localhost', 'root', ''); //The Blank string is the password
     mysql_select_db('user-registration');

     $query2 = "SELECT * FROM members WHERE id='".$memberid."'"; //You don't need a ; like you do in SQL
     $result2 = mysql_query($query2);
     
     while($rowk1 = mysql_fetch_array($result2)){   //Creates a loop to loop through results
  {
     
   echo "<tr><td>" . $rowk1['fname'] . "</td> <td>" . $rowk1['lname'] . "</td> <td>" . $rowk1['email']."</td> <td>" . "</td><br /></tr>" ;  
 }

      //$row['index'] the index here is a field name
}
 }
}
 }
}

echo "</events>"; //Close the table in HTML

mysql_close(); //Make sure to close out the database connection
    ?>

</body>
</html>