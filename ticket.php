<?php

// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "root";
$databaseName = "userr";

session_start();
$id = $_SESSION['sess_id'];
$today = date("Y-m-d");


// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `events` WHERE enddate >='$today'";

// for method 1

$result1 = mysqli_query($connect, $query);

?>

<!DOCTYPE html>

<html>

    <head>

        <title> Book ticket! </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>
       <p> <a href="createEvent.php"> Create Event</a> | <a href="myevents.php">My events</a> | <a href="allEvents.php">All events</a> | <a href="ticket.php">Book Ticket </a> | <a href="browseByDate.php"> Browse events by date </a> | <a href="joinedEvents.php">Joined events </a>  | <a href="host.php">Hosted events </a>  | <a href="logout.php">Logout </a></p>
       
        <h4> Choose an event to book a ticket, all of them are free!</h4>
        
 <form action="" method="POST">
        <select name="eventlist">

            <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
            

        </select>
    
       <input type="submit" value="go" name="submit"> 
  
<?php     
if(isset($_POST["submit"]))
{
    $event=$_POST['eventlist'];
        
$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('user-registration') or die("cannot select DB");
    
    

	
    $query2 = "SELECT tickets FROM events WHERE id = '$event' limit 1" ;
    $result2 = mysqli_query($connect, $query2);
    
    $nbtickets = mysqli_fetch_array($result2);

    if($nbtickets[0] <=0){
        
        echo "No tickets left";
        mysqli_close($connect);
        
    }else{
        
        $query3="UPDATE events SET tickets= tickets-1 WHERE id='$event'";
        $result3 = mysqli_query($connect, $query3);
        
        $sql="INSERT INTO ticket(memberidattending,eventid) VALUES('$id','$event')";
        $result4=mysqli_query($connect, $sql);
        
        
        if($result4){
	echo "Event Successfully Booked";
	} else {
	echo "Failure!";
	}
    }
	
    }
	




?>

</form>

    </body>

</html>
