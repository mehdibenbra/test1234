<?php
// php select option value from database
session_start();
$id = $_SESSION['sess_id'];
 mysql_connect("localhost", "root","") or die(mysql_error());
     mysql_select_db("user-registration") or die(mysql_error());
    $queryfirst="SELECT * FROM ticket WHERE memberidattending='$id'";
    $resultone = mysql_query($queryfirst) or die(mysql_error()."[".$queryfirst."]");
    
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
    <li class=active><a href="feedback.php">Give feedback</a></li> 
    <li><a href="seefeedback.php">See feedback</a></li>
      <li><a> Book ticket</a> </li>
    <li> <a href="logout.php">Logout</a></li>
  </ul>
<br /><br />
    <form action="" method="POST">
 <select name='filston'>
             <?php      
         while($row = mysql_fetch_array($resultone)):;
            $idbis=$row['eventid'];
            $query="SELECT * FROM events WHERE startdate<NOW() AND id=$idbis";
            $result = mysql_query($query) or die(mysql_error()."[".$query."]");
                while($rowk = mysql_fetch_array($result)):;
                        if ($idbis==$rowk['id']):;    
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
            <option name=one>1/5</option>
            <option name=two>2/5</option>
            <option name=three>3/5</option>
            <option name=four>4/5</option>
            <option name=five>5/5</option>
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
$con=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('userr') or die("cannot select DB");
    $sql="UPDATE ticket SET usergrade='$rate',usercomment='$comment' WHERE memberidattending='".$id."' AND eventid='$filston'"; 
            //$sql2="UPDATE ticket SET ";  
$result33=mysql_query($sql);
            if ($result33){
                echo "Thank you !";
                } else {
                echo "Failure 1!";
            }
            /*$result34=mysql_query($sql2);
                if ($result34){
                echo "Success 2";
                } else {
                echo "Failure 2!";}*/
    }

?>
</html>