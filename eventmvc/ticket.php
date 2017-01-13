<?php

// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "root";
$databaseName = "userr";

session_start();
$id = $_SESSION['sess_id'];

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `events`";

// for method 1

$result1 = mysqli_query($connect, $query);

?>

<!DOCTYPE html>

<html>
        
<head>
 
<link rel="stylesheet" href="style2.css">


<title>Register events</title>
<title> PHP SELECT OPTIONS FROM DATABASE </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
</head>
<body>

<br />
<div id="title" class="wesh">
<img src="">

<nav class="nav">
     <a href="myevents.php"> My Events</a>
    <a href="ticket.php"> Book your ticket </a>
   <a href="myevents.php"> Give your feedback </a>
    <a href="seefeedback.php"> My Events</a>
    <a href="myevents.php"> My Events</a>
    </nav>

   
    
    <h3>Registration Form for events</h3>
    <h4> Welcome, <?=$_SESSION['sess_id'];?> </h4>
</div>



<body>

        <!--Method One-->
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
	mysql_select_db('userr') or die("cannot select DB");
    
    

	$query=mysql_query("SELECT * FROM ticket WHERE memberidattending='".$id."'");
	$numrows=mysql_num_rows($query);
    $result33=mysql_query("SELECT tickets FROM events WHERE id='$event' limit 1");
    $nbtickets = mysql_fetch_array($result33);

    
    if($nbtickets[0] <=0){
        
        echo "No tickets left";
        mysql_close();
        
    }else{
        
        $query2=mysql_query("UPDATE events SET tickets= tickets-1 WHERE id='$event'");
        $sql="INSERT INTO ticket(memberidattending,eventid) VALUES('$id','$event')";

	   $result=mysql_query($sql);
        if($result){
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