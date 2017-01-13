<?php

// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "userr";

session_start();
if(!isset($_SESSION["sess_id"])){
	header("location:allEvents.php");
} else {}
if(!isset($_SESSION["sess_name"])){
	header("location:allEvents.php");
} else {}

$id = $_SESSION['sess_id'];
$name = $_SESSION['sess_name'];

$today = date("Y-m-d");





$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
     mysql_select_db('user-registration');
     $query = "SELECT * FROM events"; //You don't need a ; like you do in SQL
     $result = mysql_query($query);

?>

<!DOCTYPE html>

<html>

    <head>

        <title> Events hosted </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
    
   

    <body>
       <p> <a href="createEvent.php"> Create Event</a> | <a href="myevents.php">My events</a> | <a href="allEvents.php">All events</a> | <a href="ticket.php">Book Ticket </a> | <a href="browseByDate.php"> Browse events by date </a> | <a href="joinedEvents.php">Joined events </a>  | <a href="host.php">Hosted events </a>  | <a href="logout.php">Logout </a></p>
        
 <h4> Choose the event for which you would like to see the participants</h4>
       
 <form action="" method="POST">
        <select name="eventlist">

            <?php 
            
            while($row1 = mysql_fetch_array($result)):;
            if ($id==$row1['userid']):;
            
            ?>

            <option value="
                           <?php 
                           echo $row1[0];
                           ?>">
                <?php 
                echo $row1[1];
                
                ?>
            </option>

            <?php 
            
          endif;
            endwhile;
            ?>
            

        </select>
    
       <input type="submit" value="go" name="submit"> 
  
<?php     
if(isset($_POST["submit"]))
{
    $event =$_POST['eventlist'];
    
    
    
     $connection1 = mysql_connect('localhost', 'root', ''); //The Blank string is the password
     mysql_select_db('user-registration') or die("cannot select database");
     $query11 = "SELECT * FROM ticket "; //You don't need a ; like you do in SQL
     $result2 = mysql_query($query11);
     
     while($rowk = mysql_fetch_array($result2)){   //Creates a loop to loop through results
  {
      if ($event == $rowk ['eventid']) {
  
          $memberid = $rowk['memberid'];
          
     $connection2 = mysql_connect('localhost', 'root', ''); //The Blank string is the password
     mysql_select_db('user-registration');

     $query2 = "SELECT * FROM members WHERE id='".$memberid."'"; //You don't need a ; like you do in SQL
     $result3 = mysql_query($query2);
     
     while($rowk1 = mysql_fetch_array($result3)){   //Creates a loop to loop through results
  {
     
   echo  "<br /><br />" ."First Name: ". $rowk1['fname'] . "<br/> </td> <td>" ."Last Name: ".$rowk1['lname'] . "<br /></td> <td>" ."Email : ". $rowk1['email']."</td> <td>" . "</td><br /></tr>" ;  
 }

          
 }
     

 }

    
}
 }
}
     




?>

</form>

    </body>

</html>
