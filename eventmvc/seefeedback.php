
<?php
$connection = mysql_connect('localhost', 'root', 'root'); //The Blank string is the password
mysql_select_db('user-registration');

$query = "SELECT * FROM events WHERE startdate<NOW()"; //You don't need a ; like you do in SQL
$result = mysql_query($query) or die(mysql_error()."[".$query."]");;

session_start();
 $id = $_SESSION['sess_id'];
?>

<html>
<head>
<title>Welcome</title>
</head>
<body>
<p>
    <a href="myevents.php">My events</a> | <a href="allEvents.php">All events</a> | <a href="ticket.php">Book Ticket </a> | <a href=seefedback.php> See Past Events and Feedack </a>
    </p>
     <h4> Welcome, <?=$_SESSION['sess_id'];?> </h4>
    
     <form action="" method="POST">
 <select name='filston'>
              <?php while($row = mysql_fetch_array($result)):;?>

           <option 
            value="<?php echo $row[0];?>"> 

            <?php echo $row[1];?>
            </option>

            <?php endwhile;?>
     
    </select>
    <input type="submit" name="submit" value="submit">
    </form>

    
</body>
    

</html>
<?php  if(isset($_POST["submit"])):;
    
$filston=$_POST['filston'];
$con=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('userr') or die("cannot select DB");    
$sql="SELECT * FROM ticket";       
$result33=mysql_query($sql);
while($row=mysql_fetch_array($result33)):;
if ($filston==$row['eventid']) {
        echo $row['usercomment'];  
}
endwhile;
endif; 
?>       