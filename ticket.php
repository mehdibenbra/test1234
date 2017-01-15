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
    <li class="active"><a href="myevents.php">Events I created</a></li>
    <li><a href="allevents.php">All events</a></li>
    <li><a href="browsebycategory.php">Browse (category)</a></li>
    <li><a href="browsebydate.php">Browse (date)</a></li>
    <li class="active"> <a href="ticket.php"> Book ticket </a></li>
    <li><a href="feedback.php">Give feedback</a></li> 
    <li><a href="seefeedback.php">See feedback</a></li>
    <li> <a href="host.php"> Hosted events and Guest List </a></li>
    <li> <a href="joinedevents.php"> Events I attend </a></li>
    <li><a href="logout.php">Logout</a></li>
    </ul>
       
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
