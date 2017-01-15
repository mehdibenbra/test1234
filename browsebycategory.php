<?php

$hostname = "localhost";
$username = "root";
$password = "root";
$databaseName = "userr";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);



session_start();
$id = $_SESSION['sess_id'];
?> 

<!doctype html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<head>
<title>Browse By Category</title>
</head>
<body>

<h2>My Event Website</h2>                 
  <ul class="nav nav-pills" role="tablist">
    <li><a href="createEvent.php">Create Event</a></li>
    <li><a href="myevents.php">Events I created</a></li>
    <li><a href="allevents.php">All events</a></li>
    <li class="active"><a href="browsebycategory.php">Browse (category)</a></li>
    <li><a href="browsebydate.php">Browse (date)</a></li>
    <li> <a href="ticket.php"> Book ticket </a></li>
    <li><a href="feedback.php">Give feedback</a></li> 
    <li><a href="seefeedback.php">See feedback</a></li>
    <li> <a href="host.php"> Hosted events and Guest List </a></li>
    <li> <a href="joinedevents.php"> Events I attend </a></li>
    <li><a href="logout.php">Logout</a></li>
    </ul>  

<form action="" method="POST">
 Categorisation:   <select name="categorisation">
  <option value="Tennis">Tennis event</option>
  <option value="Football">Football event</option>
  <option value="Basket-ball">Basket-ball event</option>
  <option value="Tournament">Tournament</option>
</select> 
    
<input type="submit" name="submit" value="submit">
    </form>
    
<?php  if(isset($_POST["submit"])):;
    
$categorisation=$_POST['categorisation'];   
    
$sql="SELECT * FROM events WHERE categorisation='$categorisation'";  
    
$result=mysqli_query($connect,$sql);
       
$numrows=mysqli_num_rows($result);
    
  if ($numrows==0){
      
        echo "No events in the category ";
      
    } else{

while($row = mysqli_fetch_array($result)){ 
 
        
   echo "Title of the event: " . $row['title'] . " @ " . $row['location'] . "</td> <td>" . " on the " . $row['startdate']."<br />". "Description: " .  $row['description']."<br />". "Type of event: " .  $row['categorisation']."<br />" . "</td><br /></tr>" ;
}
   
    }

endif; 
?>       

</body>
</html>