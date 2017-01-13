<?php
mysql_connect("localhost", "root","") or die(mysql_error());
mysql_select_db("user-registration") or die(mysql_error());
$query = "SELECT * FROM events";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");
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
    
<form action="" method="POST">
<select name='filston'>

    <?php 
        while($row1 = mysql_fetch_array($result)):;?>
            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
            <?php endwhile;?>
         
        ?> 

  </select>     
    <input type="submit" value="go" name="submit"> 

</form>
<?php
if(isset($_POST["submit"]))
{
$event=$_POST['filston'];
echo "$event";
}
?>
<h2> option created </h2> 
    </body>
</html>




