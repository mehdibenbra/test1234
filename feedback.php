
<?php
// php select option value from database


$hostname = "localhost";
$username = "root";
$password = "root";
$databaseName = "userr";
$connect = mysqli_connect($hostname, $username, $password, $databaseName);

session_start();
$id2 = $_SESSION['sess_id'];


$queryfirst= "SELECT * FROM ticket WHERE memberidattending='$id2'" ;
$resultone = mysqli_query($connect,$queryfirst);
    
?>
<!doctype html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<head>
<title> Give Feedback </title>
</head>
<body>

<h2>My Event Website</h2>                 
  <ul class="nav nav-pills" role="tablist">
    <li><a href="createEvent.php">Create Event</a></li>
    <li><a href="myevents.php">Events I created</a></li>
    <li><a href="allevents.php">All events</a></li>
    <li><a href="browsebycategory.php">Browse (category)</a></li>
    <li><a href="browsebydate.php">Browse (date)</a></li>
    <li> <a href="ticket.php"> Book ticket </a></li>
    <li class="active"><a href="feedback.php">Give feedback</a></li> 
    <li><a href="seefeedback.php">See feedback</a></li>
    <li> <a href="host.php"> Hosted events and Guest List </a></li>
    <li> <a href="joinedevents.php"> Events I attend </a></li>
    <li><a href="logout.php">Logout</a></li>
    </ul>
    
<br /><br />
    <form action="" method="POST">
 <select name='filston'>
             <?php      
         while($row = mysqli_fetch_array($resultone)):;
     
            $eventid=$row['eventid'];
     
            $query="SELECT * FROM events WHERE startdate<NOW() AND id ='$eventid'";
            $result = mysqli_query($connect,$query);
     
                while($rowk = mysqli_fetch_array($result)):;
                        if ($eventid==$rowk['id']):;    
            ?>     

            <option 
            value="<?php echo $rowk[0];?>"> 

            <?php echo $rowk[1];?>
            </option>

         <?php 
         endif; 
        endwhile;
        endwhile;
         ?>    
     
</select>
<select name="rate">
            <option name=one>1</option>
            <option name=two>2</option>
            <option name=three>3</option>
            <option name=four>4</option>
            <option name=five>5</option>
    </select>
    
    <br>Comment: <br>
        <input type="text" name="comment">
    
        
        
    <input type="submit" value="submit" name="submit"> 
    </form>
</body>  
<?php  if(isset($_POST["submit"])) 
        {
$rate=$_POST['rate'];
$comment=$_POST['comment'];
$filston=$_POST['filston'];
//$sql="INSERT INTO ticket(usergrade,usercomment) WHERE eventid='$event' AND memberidattending='$id' VALUES($event,'$event')";//

    
    $query55 = "UPDATE ticket SET usergrade='$rate',usercomment='$comment' WHERE memberidattending='$id2' AND eventid='$filston'";
    
            //$sql2="UPDATE ticket SET ";  
$result33 = mysqli_query($connect,$query55);
    
            if ($result33){
                echo "Thank you !";
                } else {
                echo "Feedback failed to be sent..";
            }
            /*$result34=mysql_query($sql2);
                if ($result34){
                echo "Success 2";
                } else {
                echo "Failure 2!";}*/
    }

?>
</html>